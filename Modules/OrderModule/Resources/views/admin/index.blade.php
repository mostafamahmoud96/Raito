@extends('layoutmodule::admin.main')

@section('title')
Orders List
@endsection


@section('content')



@include('layoutmodule::admin.flash')
<div class="content-body">
    <div class="row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Orders</h2>
        </div>
        <div class="col-lg-2 offset-4  ">
            {{-- <a class="btn btn-success btn-min-width mr-1 mb-1 text-left" href="{{ route('admin.order.create') }}" role="button">إضافة طلب جديد</a> --}}
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="content-header ">
                      <!-- Date Filter -->
                      <div class="row justify-content-end">
                                <table class="mb-3">
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <label class="mr-2  font-weight-bold"> From</label>
                                                <div class="input-group-append mr-2">
                                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                    <input type='text' readonly id='search_fromdate' class="datepicker" placeholder='From Data'>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="mr-2 font-weight-bold"> To</label>
                                                <div class="input-group-append mr-2">
                                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                    <input type='text' readonly id='search_todate' class="datepicker" placeholder='To Date'>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    </div>

                    <div class="card-body">
                        <div class="card-block">
                            <div class="pt-2">


                                <div class="table-responsive">
                                    <table id="orders_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order No</th>
                                                <th>Order Nu</th>
                                                <th>Customer Name</th>
                                                <th>Order Date/Time</th>
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
</div>


    @push('scripts')
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker();
            // var id=$('#customer_id').val();
            url = "{{route('admin.orders.index')}}";
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

                        d.date_from = $("#search_fromdate").val()
                        d.date_to = $("#search_todate").val()
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
                        data: 'customer_id',
                        name: 'customer_id',
                        "searchable": true
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
            $('#orders_table').on('click', '.showOrder', function() {

                var ContentOfText;
                var order_id = $(this).data("id");
                var order_total = $(this).data("total")
                var order_nu = $(this).data("order_nu")
                var order_date = $(this).data("trans_datetime")
                // alert(order_nu)

                route = '{{route("admin.order.view","Id")}}';
                url = route.replace('Id', order_id);
                $.ajax({
                    url: url,
                    type: 'get',
                    data: {
                        'order_id': order_id
                    },

                    success: function(data) {
                        var data_str = JSON.stringify(data);
                        var product_data = JSON.parse(data_str);
                        var html = "";
                        html += "<h3>" + product_data[0].created_at + "</h3>";
                        html += "<table style='border-bottom: 1px solid #ddd; width:100%;font-size:20px'>";
                        html += "<tr>";
                        html += "<th style='border:1px solid #ddd; padding:1px'>Product</th>"
                        html += "<th style='border:1px solid #ddd'>Price</th>"
                        html += "<th style='border:1px solid #ddd'>Quantity</th>"
                        html += "<th style='border:1px solid #ddd'>Total</th>"
                        html += "</tr>";
                        html += "<tfoot style='border-top: 1px solid #ddd; '>"
                        html += "<tr><td colspan=3 style='text-align:left'></td>"
                        html += "<td><h3><b>" + product_data[0].total + "</b></h3></td>"
                        html += "</tr></tfoot>"
                        for (var i = 0; i < product_data.length; i++) {
                            html += "<tr>"
                            html += "<td>" + product_data[i].product_name + "</td>"
                            html += "<td>" + product_data[i].item_price + "</td>"
                            html += "<td>" + product_data[i].quantity + "</td>"
                            html += "<td>" + product_data[i].total_price + "</td></tr>"
                        }

                        Swal.fire({
                            title: "Order_" + product_data[0].order_nu,
                            html: html,
                            showCancelButton: false,
                            confirmButtonColor: 'green',



                        });
                    }
                })
            });
            $('#orders_table').on('click', '.deleteOrder', function() {
                var ContentOfText;
                var order_id = $(this).data("id");
                // ContentOfText = "you want to delete this Order"
                Swal.fire({
                    type: 'warning',
                    title: 'Delete Order',
                    text: ContentOfText,
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#395474',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.value) {
                        route = '{{route("admin.order.delete", "Id")}}';
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
                                        title: 'Deleted Successfully',
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
            $('#search_fromdate ,#search_todate').change(function() {
                orders_table.draw();
            });



        });
    </script>



    @endpush


    @endsection
