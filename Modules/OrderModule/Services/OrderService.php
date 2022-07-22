<?php

namespace Modules\OrderModule\Services;

use App\Helpers\UploaderHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Modules\CartModule\Services\CartService;
use Modules\ProductModule\Services\ProductService;
use Modules\CustomerModule\Repository\CustomerAddressRepository;
use Modules\OrderModule\Repository\OrderAddressRepository;
use Modules\OrderModule\Repository\OrderProductRepository;
use Modules\OrderModule\Repository\OrderRepository;
use Modules\PickupPointModule\Repository\PickupPointRepository;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Repository\ProductRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class OrderService
{
    private $orderRepository;
    private $orderProductRepository;
    private $productRepository;
    // private $orderAddressRepository;
    // private $customerAddressRepository;
    // private $cartService;
    // private $productService;
    // private $pickupPointRepository;
    public function __construct(OrderRepository $orderRepository, OrderProductRepository $orderProductRepository, ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->orderProductRepository = $orderProductRepository;
    }

    // $products = $request->products;

    public function create($request)
    {
        $request->all();

        $order_data = [
            'order_nu' => $this->orderRepository->genOrderNu(),
            'customer_id' => $request['customer'] ?? Auth::id(),
            'payment_method' => $request['paymentMethod']
        ];
        if ($request->paymentStatus == 0) {
            $order_data['payment_method'] = '';
        }

        $order = $this->orderRepository->create($order_data);

        $order_total_amount = 0;

        if (!empty($request['products'])) {
            foreach ($request['products'] as $product) {
                $product_item = $this->findNewOrderItems($product);

                //if product exists
                if ($product_item) {
                    $order_product_inputs['order_id'] = $order->id;
                    $order_product_inputs['product_id'] = $product_item['id'];
                    $order_product_inputs['product_name'] = $product_item['name'];
                    $order_product_inputs['item_price'] = $product_item['price'];
                    $order_product_inputs['quantity'] = $product['quantity'];
                    $order_product_inputs['total_price'] = $order_product_inputs['quantity'] * $order_product_inputs['item_price'];
                    $order_total_amount += ($order_product_inputs['quantity'] * $order_product_inputs['item_price']);

                    $this->productRepository->update([
                        'items_in_stock' => $product_item->items_in_stock - intval($product['quantity']),
                    ], $product_item->id);
                    $this->orderProductRepository->create($order_product_inputs);
                }
            }
            ////////////////////////
        }

        return $this->orderRepository->update([
            'total' => $order_total_amount,
        ], $order->id);
    }

    public function update($data)
    {
        $order_data = [
            'order_nu' => $data['order_nu'],
            'status_id' => (key_exists('status_id', $data) && !empty($data['status_id'])) ? $data['status_id'] : 1,
            'customer_id' => $data['customer_id'],
            'delivery_name' => (key_exists('name', $data) && !empty($data['name'])) ? $data['name'] : null,
            'delivery_mobile' => (key_exists('mobile', $data) && !empty($data['mobile'])) ? $data['mobile'] : null,
            'order_delivery_type_id' => $data['order_delivery_type_id'],
            'notes' => (key_exists('notes', $data) && !empty($data['notes'])) ? $data['notes'] : '',
        ];

        $order = $this->orderRepository->update($order_data, $data['id']);

        $order_total_amount = $order_net_amount = $order_discount_amount = 0;
        $order_delivery_fees = Config::get('app.DELIVERY_FEES');
        if (key_exists('products', $data)) {
            if (!empty($data['products'])) {
                foreach ($data['products'] as $product_item) {
                    $product = $this->productRepository->findWhere(['id' => $product_item['item_id'], 'deleted_at' => null])->first();

                    //if product not exist
                    if ($product) {

                        $order_product_inputs['order_id'] = $order->id;
                        $order_product_inputs['product_id'] = $product_item['item_id'];
                        $order_product_inputs['product_name'] = $product_item['name'];
                        $order_product_inputs['item_price'] = $this->productRepository->getProductPrice($product_item['item_id']);
                        $order_product_inputs['quantity'] = $product_item['qty'];
                        $order_product_inputs['item_price_after'] = $product->priceOrDiscountValue;
                        $order_product_inputs['total_price'] = $order_product_inputs['quantity'] * $order_product_inputs['item_price_after'];
                        $this->orderProductRepository->create($order_product_inputs);
                        $order_total_amount += ($order_product_inputs['quantity'] * $order_product_inputs['item_price']);
                        $order_discount_amount += ($order_product_inputs['item_price'] - $order_product_inputs['item_price_after']) * $order_product_inputs['quantity'];
                    }
                }
                ////////////////////////
            }
        }
        $order_net_amount = $order_total_amount + $order_delivery_fees - $order_discount_amount;
        if (key_exists('order_delivery_type_id', $data)) {
            if ($data['order_delivery_type_id'] == 1) {
                if (key_exists('customer_address_id', $data)) {
                    $customer_address = $this->customerAddressRepository->findWhere(['id' => $data['customer_address_id']])->first();
                    $address_data = [];
                    $address_data['customer_address_id'] = $data['customer_address_id'];
                    $address_data['street'] = $customer_address['street'];
                    $address_data['complex_details'] = $customer_address['complex_details'];
                    $address_data['suburb'] = $customer_address['suburb'];
                    $address_data['city'] = $customer_address['city'];
                    $address_data['province'] = $customer_address['province'];
                    $address_data['postal_code'] = $customer_address['postal_code'];

                    if ($old_address = $this->orderAddressRepository->findWhere(['id' => $order['order_address_id']])->first()) {
                        $address = $this->orderAddressRepository->update($address_data, $order->order_address_id);
                    } else {
                        $address = $this->orderAddressRepository->create($address_data);
                    }

                    $this->orderRepository->update(['order_address_id' => $address->id, 'delivery_name' => $customer_address['name'], 'delivery_mobile' => $customer_address['mobile']], $order->id);
                }
                $this->orderRepository->update(['order_click_and_collect_address_id' => 0], $order->id);
            }
            if ($data['order_delivery_type_id'] == 2) {
                $this->orderRepository->update(['order_click_and_collect_address_id' => $data['order_click_and_collect_address_id']], $order->id);
                $old_address = $this->orderAddressRepository->findWhere(['id' => $order['order_address_id']])->first();
                if ($old_address) {
                    $old_address->delete();
                }
                $this->orderRepository->update(['order_address_id' => 0], $order->id);
            }
        }

        return $this->orderRepository->update([
            // 'promo_code_id' => $promo_code_id,
            'total_amount' => $order_total_amount,
            'delivery_fees' => $order_delivery_fees,
            'discount_amount' => $order_discount_amount,
            'net_amount' => $order_net_amount,
        ], $order->id);
    }

    public function findAll()
    {
        return $this->orderRepository->all();
    }

    public function findWhere($data)
    {
        return $this->orderRepository->findWhere($data)->first();
    }
    public function findAllToCustomer($customer_id)
    {
        // dd($customer_id);
        return $this->orderRepository->findAllToCustomer($customer_id);
    }


    public function findCustomerOrders($customer)
    {
        return $this->orderRepository->findCustomerOrders($customer);
    }

    public function findOne($id)
    {
        // dd($id);
        // dd($this->orderRepository->find($id));
        return $this->orderRepository->find($id);
    }

    public function deleteOne($id)
    {
        $old_image_name = $this->orderRepository->getField($id, 'image');
        if ($this->orderRepository->delete($id)) {
            /////Delete the old image////
            if ($old_image_name != null) {
                File::delete(public_path('uploads/orders/' . $old_image_name));
            }
            /////////////////////////////
            return true;
        }
        return true;
    }

    public function deleteMany($arr_ids)
    {
        if (!empty($arr_ids)) {
            foreach ($arr_ids as $id) {
                return $this->orderRepository->delete($id);
            }
        }
    }
    public function emptyOrderProducts($order)
    {
        if ($order) {
            $products = $this->orderProductRepository->findWhere(['order_id' => $order->id]);
            if (count($products) > 0) {
                $order->products()->delete();
            }
            $this->orderRepository->update([
                'total_amount' => 0,
                'delivery_fees' => 0,
                'discount_amount' => 0,
                'net_amount' => 0,
                'is_paid' => 0,
                'status_id' => 1,
            ], $order->id);
            return true;
        }
        return false;
    }
    public function updateOne($data, $id)
    {
        $this->orderRepository->update($data, $id);
    }
    public function deleteCartItemsAfterSaveOrder($customer)
    {
        $cart = $customer->cart;
        if ($cart->items()->delete()) {
            return true;
        } else {
            return false;
        }
    }
    public function findHashOrder($order)
    {
        return $this->orderRepository->findHashOrder($order);
    }
    public function updateProductOrder($request)
    {
        $product_data = [];

        if (array_key_exists('rate', $request)) {
            $product_data['rate'] = $request['rate'];
        }
        if (array_key_exists('review', $request)) {
            $product_data['review'] = $request['review'];
        }

        return $this->orderProductRepository->update($product_data, $request['id']);
    }
    public function calculateProductRating($product_id)
    {
        return $this->orderProductRepository->calculateProductRating($product_id);
    }

    public function checkProductsExitsOrNot($check_last_order)
    {
        if (!$check_last_order) {
            return false;
        }
        if ($check_last_order->order_click_and_collect_address_id != 0) {
            if (!$this->pickupPointRepository->findWhere(['id' => $check_last_order->order_click_and_collect_address_id, 'deleted_at' => null, 'is_active' => 1])->first()) {
                return false;
            }
        }

        if (count($check_last_order->products) > 0) {
            foreach ($check_last_order->products as $order_product) {
                $cart_data_arr = $this->cartService->collectCartItemsToClient($check_last_order->customer_id);
                $cart_data_product_arr = $cart_data_arr->pluck('item_id')->toArray();
                if (!in_array($order_product->product_id, $cart_data_product_arr) || !$this->productRepository->findWhere(['id' => $order_product->product_id, 'deleted_at' => null])->first()) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    public function checkAllOrderData($check_last_order)
    {
        if (!$check_last_order) {
            return false;
        }
        if ($check_last_order->order_click_and_collect_address_id != 0) {
            if (!$this->pickupPointRepository->findWhere(['id' => $check_last_order->order_click_and_collect_address_id, 'deleted_at' => null, 'is_active' => 1])->first()) {
                return false;
            }
        }

        if (Session::has('CART')) {
            $arr_cart = json_decode(Session::get("CART"), true);
            $arr_cart_count = [];
            if (count($arr_cart) > 0) {
                foreach ($arr_cart['products'] as $key => $value) {
                    $arr_cart_count[] = $key;
                }
            }
            $cart_data_arr = $this->cartService->collectCartItemsToClient($check_last_order->customer_id);
            $cart_data = $cart_data_arr->toArray();
            $cart_data_product_arr = $cart_data_arr->pluck('item_id')->toArray();
            //dd($cart_data,$arr_cart['products'],$check_last_order->products);
            //exit;
            if (key_exists('products', $arr_cart)) {
                if (
                    count($check_last_order->products) > 0 && count($arr_cart['products']) > 0 && count($cart_data) > 0 &&
                    count($check_last_order->products) == count($arr_cart['products']) &&
                    count($check_last_order->products) == count($cart_data) && count($arr_cart['products']) == count($cart_data)
                ) {
                    foreach ($check_last_order->products as $key => $order_product) {
                        $pro = $this->productRepository->findWhere(['id' => $order_product->product_id, 'deleted_at' => null])->first();
                        if (
                            in_array($order_product->product_id, $cart_data_product_arr) && $pro != null &&
                            in_array($order_product->product_id, $arr_cart_count)
                        ) {
                            if (
                                $order_product->item_price_after != $arr_cart['products'][$order_product->product_id]['price'] || $arr_cart['products'][$order_product->product_id]['price'] != $pro->priceOrDiscountValue ||
                                $order_product->item_price_after != $pro->priceOrDiscountValue ||
                                $order_product->quantity != $arr_cart['products'][$order_product->product_id]['quantity'] || $cart_data[$key]['qty'] != $arr_cart['products'][$order_product->product_id]['quantity'] ||
                                $cart_data[$key]['qty'] != $order_product->quantity ||
                                $check_last_order->total_amount != $arr_cart['total'] ||
                                $check_last_order->delivery_fees != $arr_cart['fees'] || Config::get('app.DELIVERY_FEES') != $arr_cart['fees'] || $check_last_order->delivery_fees != Config::get('app.DELIVERY_FEES') ||
                                $check_last_order->net_amount != $arr_cart['global_total']
                            ) {

                                return false;
                            }
                        } else {

                            return false;
                        }
                    }
                } else {

                    return false;
                }
            } else {

                return false;
            }
            return true;
        } else {

            return false;
        }
    }

    public function findNewOrderItems($products)
    {
        foreach ($products as $one_product) {
            // dd($one_product);
            return $this->productRepository->find($one_product);


            // where([‘branch_id’ => $branch_id, ‘is_available’ => 1])->get();
        }
    }
    public function findOrderItems($products)
    {
        foreach ($products as $one_product) {
            return $this->orderProductRepository->getOrderProductItems($one_product);
        }
    }
    public function findUnPaid($customers)
    {
        return $this->orderRepository->findUnPaid($customers);
    }
    public function pay($order)
    {
        // dd($order);
        return $this->orderRepository->update([
            'is_paid' => 1,
            'payment_method' => 'wallet',
            'paid' => $order->total,
            'remain' => 0
        ], $order->id);
    }

    public function findAllByDateRange($from_date, $to_date)
    {
        return $this->orderRepository->findWhereBetween('created_at', [
            Carbon::parse($from_date)->format('Y-m-d 00:00:00'),
            Carbon::parse($to_date)->format('Y-m-d 23:59:59')
        ]);
    }

    public function findAllByDateRangeForOneCustomer($id, $from_date, $to_date)
    {
        return $this->orderRepository->findAllToCustomer($id)->WhereBetween('created_at', [
            Carbon::parse($from_date)->format('Y-m-d 00:00:00'),
            Carbon::parse($to_date)->format('Y-m-d 23:59:59')
        ]);

        // return $this->orderRepository->find
    }
}
