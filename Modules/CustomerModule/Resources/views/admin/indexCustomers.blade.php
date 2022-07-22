@extends('layoutmodule::admin.main')

@section('title')
List Customers
@endsection


@section('content')

<div class="content-header row">
<!-- <div class="row"> -->
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Customers</h2>
        </div>
        <div class="col-lg-2 offset-4  ">
        {{-- <a class="btn btn-success btn-min-width mr-1 mb-1"
                                href="{{route('admin.cashers.add')}}" role="button">اضافة مستخدم </a> --}}
        </div>
    </div>

@include('layoutmodule::admin.flash')

<div class="content-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="casher_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Total Orders</th>
                                    <th width="300px;">Action</th>
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
    $(document).ready(function(){
    var admin_table=$('#casher_table').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        retrieve: true,
        pageLength: 100,
        "order": [[ 0, "desc" ]],
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
        ajax: { url: "{{ route('admin.customers.getIndexCustomers') }}",
        },
        columns: [
            { data: 'id', name: 'id', 'visible': false},
            {data: 'name',name: 'name', "searchable":true},
            {data: 'email',name: 'email', "searchable":true},
            {data: 'address',name: 'address', "searchable":true},
            {data: 'orders',name: 'orders', "searchable":true},

            {data: 'action', name: 'action', orderable: false},
        ]

    });
    $('#casher_table').on('click', '.deleteCasher', function () {
            var ContentOfText;
            var admin_id = $(this).data("id");
            ContentOfText="you want to delete this admin"
            Swal.fire({
                type: 'warning',
                title: 'Are you sure',
                text:ContentOfText,
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#395474',
                confirmButtonText: 'yes',
                cancelButtonText: 'close'
            }).then((result) => {
                if (result.value) {
                    var url =  '/admin/delete/'+admin_id;
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {"_token": "{{ csrf_token() }}",},
                        success: function (data) {
                            if(data === "true"){
                                admin_table.draw();
                                Swal.fire({
                                    type: 'success',
                                    title: 'sucess',
                                    text: 'deleted successfully.',
                                    showCancelButton: false,
                                    confirmButtonColor: '#395474',
                                });


                                return true;
                            }else{
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
});


</script>
@endpush

@endsection
