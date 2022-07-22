@extends('layoutmodule::admin.main')

@section('title')
   Products
@endsection


@section('content')


    @include('layoutmodule::admin.flash')

    <div class="content-body">

    <div class="row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Products</h2>
        </div>
        <div class="col-lg-2 offset-4  ">
        <a class="btn btn-success btn-min-width mr-1 mb-1"
                                    href="{{ route('admin.products.add') }}" role="button">New Product</a>
        </div>
    </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">

                        &nbsp; &nbsp;

                    </div>

                    <div class="card-body">
                        {{-- <input type="hidden" name="provider_id" id="provider_id" value="{{ $provider->id }}"> --}}
                        <div class="table-responsive">
                            <table id="products_table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>In Stock</th>
                                        <th width=100px>Actions</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                var products_table = $('#products_table').DataTable({
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
                        url: "{{ route('admin.products.indexProducts') }}",
                        type: "get"
                    },
                    columns: [{
                            data: 'name',
                            name: 'name',
                            "searchable": true
                        },
                        {
                            data: 'price',
                            name: 'price',
                            "searchable": true
                        },

                        {
                            data: 'items_in_stock',
                            name: 'items_in_stock',
                            "searchable": true
                        },

                        {
                            data: 'normal_action',
                            name: 'normal_action',
                            orderable: false
                        },
                    ]

                });
                $('#products_table').on('click', '.addToStock', function() {
                    var ContentOfText;
                    var product_id = $(this).data("id");
                    // ContentOfText = $(this).data("id").t;
                    Swal.fire({
                        type: 'warning',
                        title: 'Add To Stock',
                        html:"<input type='number' id='quantity' autofocus>"+
                        "<input type='hidden' id='pid' value='"+product_id+"'>",
                        // text: ContentOfText,
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#395474',
                        confirmButtonText: 'add',
                        cancelButtonText: 'cancel'

                    }).then((result) => {
                        if (result.value) {

                             route = '{{route("admin.products.stock","Id")}}';
                             url = route.replace('Id', product_id);
                            //  var url =  '/admin/products/delete/'+product_id;

                            $.ajax({
                                url: url,
                                type: 'post',
                                data:
                                // pw_old: document.getElementById('swal-input1').value,
                                {"_token": "{{ csrf_token() }}",
                                "quantity": document.getElementById('quantity').value,
                                "product_id":document.getElementById('pid').value,
                            },

                                success: function (data) {
                                    if (data === "true") {
                                        products_table.draw();
                                        Swal.fire({
                                            type: 'success',
                                            title: 'sucess',
                                            text: 'added successfully.',
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

                $('#products_table').on('click', '.deleteProduct', function() {
                    var ContentOfText;
                    var product_id = $(this).data("id");
                    Swal.fire({
                        type: 'warning',
                        title: 'Delete This Item',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#395474',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'Cancel'

                    }).then((result) => {
                        if (result.value) {
                            var url =  '/admin/products/delete/'+product_id;
                            $.ajax({
                                url: url,
                                type: 'DELETE',
                                data:
                                {"_token": "{{ csrf_token() }}"},

                                success: function (data) {
                                    if (data === "true") {
                                        products_table.draw();
                                        Swal.fire({
                                            type: 'success',
                                            title: 'Deleted Successfully',
                                            showCancelButton: false,
                                            confirmButtonColor: '#395474',
                                        });

                                        return true;
                                    } else {
                                        Swal.fire({
                                            type: 'error',
                                            title: 'Error',
                                            text: 'Try Again    ',
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




            });
        </script>
    @endpush




@endsection
