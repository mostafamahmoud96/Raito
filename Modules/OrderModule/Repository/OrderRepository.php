<?php

namespace Modules\OrderModule\Repository;

use Illuminate\Support\Facades\DB;
use Modules\OrderModule\Entities\Order;
use Prettus\Repository\Eloquent\BaseRepository;

class OrderRepository extends BaseRepository
{
    function model()
    {
        return Order::class;
    }

    function getByIds($ids)
    {
        return Order::whereIN('id', $ids)->get();
    }

    function getField($id, $field)
    {
        $order =  Order::where('id', $id)->first();
        return $order[$field];
    }

    function findAllWithActions($arr_actions = [])
    {
        // $query = Order::where('orders.id', '>=', 1);
        $query = Order::select('orders.*');

        if (!empty($arr_actions)) {
            //Search By///
            if (key_exists('search_by', $arr_actions)) {
                foreach ($arr_actions['search_by'] as $col => $search_by) {
                    $query->whereRaw('UPPER(' . $col . ') LIKE "%' . strtoupper($search_by) . '%"');
                }
            }
            ////////////
            //Order By///
            if (key_exists('order_by', $arr_actions)) {
                foreach ($arr_actions['order_by'] as $col => $order_by) {
                    $query->orderBy($col, $order_by);
                }
            }
            ////////////
            if (key_exists('filter', $arr_actions)) {
                foreach ($arr_actions['filter'] as $col => $filter) {
                    $query->Where($col, $filter);
                }
            }

            $query->join('customers', 'orders.customer_id', '=', 'customers.id');
        }

        return $query->paginate(20);
    }

    function findAllToCustomer($customer_id)
    {
        // dd($customer_id);
        return Order::where('orders.customer_id','=', $customer_id)->get();
        // dd($query);
        // $query->where('orders.total_amount', '>', 0);
        // $query->orderBy('orders.created_at', 'DESC');

        // return $query->paginate($items);
    }

    function genOrderNu()
    {
        $latestNumber = Order::max('order_nu');
        if ($latestNumber == null) {
            $new_number = 1000;
        } else {
            $new_number = $latestNumber + 1;
        }
        return $new_number;
    }
    public function findHashOrder($order){
       return Order::whereRaw('md5(order_nu) = "' . $order . '"')->first();
    }
    function findCustomerOrders($customer)
    {
        // dd($customer);
        $query = Order::where('orders.customer_id', $customer->id);
    
        return $query->count();
    }

    function getCustomerOrder($customer_id){
        return Order::where('customer_id','=',$customer_id)->get();
    }

    function findUnPaid($customers)
    {
        // dd($customers);
        $query =DB::table('orders')
        ->where('customer_id','=',$customers->id )
        ->where('is_paid','=',0)->get();

    // dd(($query->sum('total')));
        return $query;
    }
}
