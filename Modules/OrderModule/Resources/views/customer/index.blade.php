@extends('layoutmodule::customer.main')

@section('title')
    Orders List
@endsection


@section('content')
    @include('layoutmodule::customer.flash')

    <div class="content-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="content-header row">
                        </div>
                        <div class="row justify-content-end mx-5">

                            <div class="col-lg-2">

                                <a class="btn btn-success btn-min-width mr-1 mb-1" href="{{ route('customer.order.create') }}"
                                    role="button">New Order </a>

                            </div>
                        </div>

                        &nbsp; &nbsp;


                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <div class="pt-2">
                                <div class="row content-header">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Orders</h2>
                                    </div>
                                    <div class="content-header-right col-md-4 col-xs-12 text-right"></div>
                                    <div class="content-header-right col-md-2 col-xs-12 text-right">
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="orders_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order No</th>
                                                <th>order Nu</th>

                                                <th>Total Order</th>
                                                <th>Order Time/Date</th>
                                                <th style="width:250px">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            $(document).ready(function() {
                // var id=$('#customer_id').val();
                url = "{{ route('customer.orders.index') }}";
                // url = route.replace('Id' ,id);
                var orders_table = $('#orders_table').DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    retrieve: true,
                    pageLength: 100,
                    "order": [
                        [0, "desc"]
                    ],
                    "language": {
                        "decimal": "",
                        "emptyTable": "no data available in table",
                        "emptyTable": "no matching records found",
                        "info": "showing  _START_ To _END_ From _TOTAL_ entries",
                        "infoEmpty": "showing 0 to 0 of 0 entries",
                        "infoFiltered": "(filtered from _MAX_ total entries)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "showing entries",
                        "loadingRecords": "Loading...",
                        "processing": "Processing...",
                        "search": "search",
                        "zeroRecords": "no matching records found",
                        "paginate": {
                            "first": "first",
                            "last": "last",
                            "next": "next",
                            "previous": "previous"
                        },
                    },
                    ajax: {
                        url: url,
                        type: "get",
                        data: function(d) {
                            d.is_paid = $('#filter_order_pay').val()

                            d.filter_customer = $('#filter_customer').val()
                            d.company_id = $('#filter_customer_company').val()

                        }

                    },
                    columns: [{
                            data: 'id',
                            name: 'id',
                            'visible': false,
                            "searchable": false
                        },
                        {
                            data: 'order_nu',
                            name: 'order_nu',
                            "searchable": false
                        },

                        {
                            data: 'total',
                            name: 'total_amount',
                            "searchable": false
                        },

                        {
                            data: 'created_at',
                            name: 'trans_datetime',
                            "searchable": false
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
                        },



                    ]
                });
                // $('#orders_table').on('click', '.showOrder', function() {

                //     var ContentOfText;
                //     var order_id = $(this).data("id");
                //     var order_total = $(this).data("total")
                //     var order_nu = $(this).data("order_nu")
                //     var order_date = $(this).data("trans_datetime")
                //     // alert(order_nu)

                //     route = '{{ route('customer.order.show', 'Id') }}';
                //     url = route.replace('Id', order_id);
                //     $.ajax({
                //         url: url,
                //         type: 'get',
                //         data: {
                //             'order_id': order_id
                //         },

                //         success: function(data) {
                //             var data_str = JSON.stringify(data);
                //             var product_data = JSON.parse(data_str);
                //             var html = "";
                //             html += "<h3>" + product_data[0].created_at + "</h3>";
                //             html +=
                //                 "<table style='border-bottom: 1px solid #ddd; width:100%;font-size:20px'>";
                //             html += "<tr>";
                //             html += "<th style='border:1px solid #ddd; padding:1px'>المنتج</th>"
                //             html += "<th style='border:1px solid #ddd'>السعر</th>"
                //             html += "<th style='border:1px solid #ddd'>الكمية</th>"
                //             html += "<th style='border:1px solid #ddd'>الاجمالي</th>"
                //             html += "</tr>";
                //             html += "<tfoot style='border-top: 1px solid #ddd; '>"
                //             html += "<tr><td colspan=3 style='text-align:left'></td>"
                //             html += "<td><h3><b>" + product_data[0].total + "</b></h3></td>"
                //             html += "</tr></tfoot>"
                //             for (var i = 0; i < product_data.length; i++) {
                //                 html += "<tr>"
                //                 html += "<td>" + product_data[i].product_name + "</td>"
                //                 html += "<td>" + product_data[i].item_price + "</td>"
                //                 html += "<td>" + product_data[i].quantity + "</td>"
                //                 html += "<td>" + product_data[i].total_price + "</td></tr>"
                //             }

                //             Swal.fire({
                //                 title: "طلب_" + product_data[0].order_nu,
                //                 html: html,
                //                 showCancelButton: false,
                //                 confirmButtonColor: 'green',



                //             });
                //         }
                //     })
                // });
                $('#orders_table').on('click', '.deleteOrder', function() {
                    var ContentOfText;
                    var order_id = $(this).data("id");
                    // ContentOfText = "you want to delete this Order"
                    Swal.fire({
                        type: 'warning',
                        title: 'هل تريد حذف الطلب',
                        text: ContentOfText,
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#395474',
                        confirmButtonText: 'نعم',
                        cancelButtonText: 'الغاء'
                    }).then((result) => {
                        if (result.value) {
                            route = '{{ route('admin.order.delete', 'Id') }}';
                            url = route.replace('Id', order_id);
                            $.ajax({
                                url: url,
                                type: 'DELETE',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function(data) {
                                    if (data === "true") {
                                        orders_table.draw();
                                        Swal.fire({
                                            type: 'success',
                                            title: 'تم المسح',
                                            // text: 'deleted successfully.',
                                            showCancelButton: false,
                                            confirmButtonColor: '#395474',
                                        });


                                        return true;
                                    } else {
                                        Swal.fire({
                                            type: 'error',
                                            title: 'error',
                                            text: 'try later',
                                            showCancelButton: false,
                                            confirmButtonColor: '#d33',
                                        });

                                        return false;
                                    }
                                }
                            });
                        }
                    });

                });

                $('#filter_customer ,#filter_order_pay').change(function() {
                    orders_table.draw();
                });


            });
        </script>
    @endpush
@endsection
