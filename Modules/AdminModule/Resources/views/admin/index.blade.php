@extends('layoutmodule::admin.main')

@section('title')
List Admins
@endsection


@section('content')

<div class="content-header row">
    <div class="content-header-left mb-2 breadcrumb-new col">
        <h3 class="content-header-title">
            Admins List
        </h3>
        {{-- <a href="salon.html">الدورات /</a> --}}
    </div>
</div>

@include('layoutmodule::admin.flash')

<div class="content-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        {{-- <div class="col-5">
                                <h2> الدورات</h2>
                            </div> --}}
                        <div class="col-lg-10"></div>
                        <div class="col-lg-2">
                            <a class="btn btn-success btn-min-width mr-1 mb-1"
                                href="{{route('admin.admins.add')}}" role="button">New Admin</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="admin_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
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
    var admin_table=$('#admin_table').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        retrieve: true,
        pageLength: 100,
        "order": [[ 0, "desc" ]],
        "language": {
            "decimal": "",
            "emptyTable": "{{__('messages.no_data_available_in_table')}}",
            "emptyTable": "{{__('messages.no_matching_records_found')}}",
            "info": "{{__('messages.showing')}} _START_ الي _END_ من _TOTAL_ {{__('messages.entries')}}",
            "infoEmpty": "{{__('messages.showing')}} 0 to 0 of 0 {{__('messages.entries')}}",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "{{__('messages.showing')}} _MENU_ {{__('messages.entries')}}",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            "search": "{{__('messages.search')}} ",
            "zeroRecords": "{{__('messages.no_matching_records_found')}}",
            "paginate": {
                "first": "{{__('messages.first')}}",
                "last": "{{__('messages.last')}}",
                "next": "{{__('messages.next')}}",
                "previous": "{{__('messages.previous')}}"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
        },
        ajax: { url: "{{ route('admin.admins.getIndexAdmins') }}",
        },
        columns: [
            { data: 'id', name: 'id', 'visible': false},
            {data: 'name',name: 'name', "searchable":true},
            {data: 'email',name: 'email', "searchable":true},
            {data: 'action', name: 'action', orderable: false},
        ]
        
    });
    $('#admin_table').on('click', '.deleteAdmin', function () {
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
                    var url =  '/admin/admins/delete/'+admin_id;
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