@extends('layoutmodule::admin.main')

@section('title')
Show Order
@endsection


@section('content')
<div class="col-lg-12 text-right">

    <a class="btn btn-success btn-min-width mr-1 mb-1" href="{{ route('admin.order.create') }}" role="button">New Order</a>

</div>


@include('layoutmodule::admin.flash')

<div class="content-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10"></div>
                        <div class="content-header row ml-2">
                            <div class="content-header-left mb-2  col text-left">
                                <h3 class="content-header-title">
                                  Date/Time: {{ $order->created_at->format('d-m-Y H:i') }}
                                </h3>
                                <h3 class="content-header-title">
                                    Order Nu:: {{ $order->order_nu }}
                                </h3>
                                <h3 class="content-header-title">
                                    Customer:: {{ $customer->name }}
                                </h3>

                            </div>
                        </div>
                    </div>


                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="branches_table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_item as $item)
                                <?php
                                // var_dump($item->);
                                ?>
                                <tr>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->item_price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->total_price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfooter>
                                <tr class='tfoot'>
                                    <th  style='text-align:right'>Total </th>
                                    <th colspan='3'id='totalPrice'  style='text-align:left'>{{ $order->total }}</th>
                                </tr>

                            </tfooter>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')

@endpush




@endsection
