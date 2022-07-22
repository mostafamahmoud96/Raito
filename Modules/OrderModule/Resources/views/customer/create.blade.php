@extends('layoutmodule::customer.main')

@section('title')
New Order
@endsection


@section('content')



    @include('layoutmodule::admin.flash')
    <div class="content-body p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="row content-header">
                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                        <h2 class="content-header-title">New Order</h2>
                    </div>
                    <div class="content-header-right col-md-4 col-xs-12 text-right"></div>
                    <div class="content-header-right col-md-2 col-xs-12 text-right">
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-lg-10"></div>
                            <div class="col-lg-2">

                                <a class="btn btn-success btn-min-width mr-1 mb-1" href="{{ route('customer.orders') }}"
                                    role="button">All Orders</a>

                            </div>
                        </div>
                        &nbsp; &nbsp;

                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <!-- Barcode -->
                            <div class="col-lg-2 col-sm-6   col-xs-12 col-6 mx-4">
                                <label for="barcode" style="font-size:x-large;"><i class="fa fa-barcode"
                                        aria-hidden="true"></i>
                                    Product</label>
                                <div class="form-group">

                                    <select class="form-control" name="user" id="selectProduct">

                                        <option value="0"></option>
                                        @if (count($customers) > 0)
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    {{-- <input type="text" class="form-control" id="search" autofocus> --}}
                                </div>
                            </div>
                        </div>
                        <form class="card-form side-form" method="POST" action="{{ route('customer.order.store') }}"
                            id="order_form">
                            @csrf
                            {{-- <div class="row"> --}}
                            {{-- <!-- created By -->
                            <input type="hidden" name='created_by_id' value="{{ $customer->id }}">
                            <input type="hidden" name='created_by_type' value="customer">
                            <!-- User -->
                            <div class="col-lg-4 col-sm-4 col-xs-12 col-6 mx-4 my-3">
                                <label for="user" style="font-size:x-large;"><i class="fa fa-user-circle" aria-hidden="true"></i>
                                    Product</label>
                                <select class="form-control" name="user">

                                    <option value="0"></option>
                                    @if (count($customers) > 0)
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div> --}}
                            <div class="row">


                                <!-- payment method -->
                                <div class="col-lg-4 col-sm-6 col-xs-12 col-6  my-5 px-5 paymentMethod">
                                    <label for="paymentMethod" style="font-size:x-large;"><i class="fa fa-cc-visa"
                                            aria-hidden="true"></i>
                                        Payment Method</label>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='radio' name='paymentMethod' id='cash'
                                            value='cash' checked>
                                        <label class='form-check-label' for='paymentStatus1'>
                                            <label class='form-check-label mr-5' for='paymentStatus1'>Cash</label>
                                            <!-- </div>
                                                <div class='form-check'> -->
                                            <input class='form-check-input' type='radio' name='paymentMethod'
                                                id='credit_card' value='credit_card'>
                                            <label class='form-check-label' for='paymentStatus2'> VISA</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- User -->
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-12 mx-12">
                                    <table class="table table-bordered table-hover" id="orderTable"
                                        style="width:100%; margin-right:0%;margin-top:20px">
                                        <thead>
                                            <tr>
                                                <th width=2% class="px-0 py-1"></th>
                                                <th width=25%>Product</th>
                                                {{-- <th width=25%>الباركود</th> --}}
                                                <th width=2% class="px-1 py-1">Price</th>
                                                <th width=2% class="px-1 py-1">Quantity</th>
                                                <th width=2% class="px-1 py-1">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-bold"></tbody>
                                        <tfoot>
                                            <tr class='tfoot '>
                                                <th colspan=6 style='text-align:center;color:white;padding-top:7%'>

                                                    <div class="alert col-4"
                                                        style="display: inline-block;  background:#2b5e72;padding-top: 17px;">
                                                        Total Order
                                                        <hr>
                                                        <div class="form-group">

                                                            <span id='totalPrice' style="font-size: xx-large;">0</span>
                                                        </div>
                                                    </div>

                                                </th>
                                            </tr>
                        </form>
                        </tfoot>
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
    </div>

    @push('scripts')
        <script type="text/javascript">
            var rowIndex = 1;

            // function to update total order value and number of products
            var calcTotal = function() {
                var sum = 0;
                var item = $("#orderTable tbody tr").length;

                $(".total").each(function() {
                    sum += parseFloat($(this).text());

                });
                $('#totalPrice').text(sum);
                $('#totalItems').text(item);
                if ($('#credit_card').is(':checked')) {
                    $('#totalPaid').val(sum)
                }
            }
            var calcReminder = function() {
                var totalPrice = parseFloat($('#totalPrice').text())
                var totalPaid = $('#totalPaid').val()
                //   console.log ("total" +totalPrice)
                var remainder = totalPaid - totalPrice
                $('#totalRemain').text(remainder);
                $('#hiddenRemain').attr('value', remainder)

            }
            $('#totalPaid').on('change', function() {
                calcReminder();
                $('#totalPaid').keydown(function(event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });
            });


            $('#selectProduct').on('change', function() {
                var value = $("#selectProduct").val();
                var table = document.getElementById("orderTable");
                var tbodyRowCount = table.tBodies[0].rows.length;
                if (tbodyRowCount > 0 && ($('#' + value).attr('id') == value)) {
                    // console.log('repeated')
                    var row = $('#' + value).closest('tr').attr('id');
                    var add = parseInt($('#' + row + ' #quantity').val()) + 1;
                    var quantity = $('#' + row + ' #quantity').val(add);
                    var totalPriceItem = $('#' + row + ' #price').text() * quantity.val();
                    $('#' + row + ' #total').text(totalPriceItem);
                    calcTotal();
                    $('#selectProduct').focus();
                    $('#selectProduct').val('');
                } else {
                    $.ajax({
                        type: 'get',
                        url: '{{ url('customer/orders/search') }}',
                        data: {
                            'search': value,
                        },

                        success: function(data) {
                            // alert(rowIndex)
                            // append new row
                            var tbody = "<tr class='order_table'id='" + data.id + "' id='" + data.id + "'>";
                            tbody += "<input type='hidden' id='" + data.id + "' name='products[" +
                                rowIndex + "][productId]' value ='" + data.id + "'>"
                            tbody +=
                                "<td  class='px-1 py-1' id='remove' style='font-size:larger;font-weight:bolder;color:red' ><i class='fa fa-minus-square' aria-hidden='true'></i></td>";
                            tbody += "<td class='count' id='name'>" + data.name + "</td>";
                            // tbody += "<td id='barcode'>" + data.barcode + "</td>";
                            tbody += "<td id='price'>" + data.price + "</td>";
                            tbody += "<td width=3%><input class='form-control pr-0' name='products[" +
                                rowIndex +
                                "][quantity]' type='number' id='quantity' value='1' min='1' max='" + data
                                .in_stock +
                                "' style='height: 50px;padding: 0px 10px 0px 0px !important;width: 59px;'></td>";
                            tbody += "<td id='total' class='total'>" + data.price + "</td>";
                            tbody += "</tr>";
                            $("tbody").append(tbody);
                            $('#selectProduct').focus()
                            $('#selectProduct').val('')

                            rowIndex++;

                            // append table footer only once if there is row or more
                            if ($("#orderTable tbody tr").length == 1) {

                                var tfoot = "<tr class='tfoot' id='tfoot'>"
                                tfoot +=
                                    "<td colspan=6 style='text-align:center;' class='align-middle' ><button type='submit' class='btn btn-warning' style='font-size:xx-large' id='order'> Submit</button></td>"
                                tfoot += "</tr>"
                                tfoot += "</form>"
                                $('tfoot').append(tfoot)
                            }

                            // change total order when add new items
                            calcTotal();
                            calcReminder()
                            // console.log($('.total').text())


                            // change the quantity of item
                            $('#' + rowIndex + ' #quantity').on('change', function() {
                                var total = data.price * $(this).val()
                                // console.log("total: "+total)
                                if ($(this).val() > data.in_stock) {
                                    swal.fire({
                                        title: "Available Quantity" + data.in_stock,
                                        icon: "error",
                                        showCancelButton: false,
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "Back!",
                                        closeOnConfirm: false
                                    });
                                }
                                var itemId = $(this).parent().parent().attr('id');
                                $('#' + itemId + ' #total').html(total)
                                $('#' + itemId + ' #hiddenTotal').val(total)

                                $('#' + itemId + ' #hiddenTotal').attr('value', total)
                                // console.log("hidden total cell"+ ($('#' + itemId + '#total')).html(total))
                                $('#selectProduct').focus()
                                $('#selectProduct').val('')
                                // console.log($('.total').text())

                                // change total order when change the quantity
                                calcTotal()
                                calcReminder()
                            });



                            // remove item from order
                            $('#' + rowIndex + ' #remove').on('click', function() {
                                // console.log($("#orderTable tbody"))
                                var rowId = $(this).parent().attr('id');
                                $('#' + rowId).remove();
                                if ($("#orderTable tbody tr").length == 0) {
                                    $('#tfoot').remove();
                                }
                                // change total order when item remove
                                calcTotal()
                                calcReminder()
                                $('#selectProduct').focus()
                                $('#selectProduct').val('')
                            });




                        },
                        error: function(data) {
                            //$('tbody').html(data);
                            // console.log(data);
                            //alert(data)
                            swal.fire({
                                title: "Try Again",
                                icon: "error",
                                showCancelButton: false,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "Back!",
                                closeOnConfirm: false
                            });
                            // alert("باركود غير صحيح , برجاء المحاولة مرة اخرى")
                            $('#selectProduct').focus()
                            $('#selectProduct').val('')
                        }
                    });
                }
                return false;
            });
            // });
        </script>
    @endpush


@endsection
