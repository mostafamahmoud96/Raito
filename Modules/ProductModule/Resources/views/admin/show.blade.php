@extends('layoutmodule::admin.main')

@section('title')
Show Product
@endsection

@section('content')


<div class="content-header row">
    <div class="content-header-left mb-2 breadcrumb-new col">
        <h3 class="content-header-title">
            Show Provider :: {{$provider->name}}
        </h3>
    </div>
</div>
@include('layoutmodule::admin.flash')

<input type="hidden" value={{$provider->id}} name='provider_id' id='provider_id' />

<div class="content-body">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8"></div>
                        <div class="col-lg-4">
                            <a class="btn-sm btn-primary" href="{{ route('admin.branches.indexBranches', $provider->id) }}">Branches</a>
                            <a class="btn-sm btn-primary" href="{{ route('admin.price.index', $provider) }}">Prices</a>

                            @if($provider->deleted_at==null)
                            @if($provider->is_active == 1)
                            <a class="btn-sm btn-danger" href="{{route('admin.providers.active',$provider->id)}}"
                                role="button">deactivate</a>
                            @else
                            <a class="btn-sm btn-green" href="{{route('admin.providers.active',$provider->id)}}"
                                role="button">Activate</a>
                            @endif
                            @if($provider->is_active == 1)
                            <a class="btn-sm btn-warning" href="{{route('admin.offers',$provider->id)}}"
                                role="button">Offers</a>
                            @endif
                            @endif

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card-block">
                        <dl class="row">
                            <dt class="col-sm-12" style="text-align: center;margin-bottom: 20px">
                                <img src="{{$provider->logoProfile}}" style="height:120px;" />
                            </dt>

                            <dt class="col-sm-3">Name</dt>
                            <dd class="col-sm-9">{{$provider->name}}</dd>
                            <dt class="col-sm-3">Phone</dt>
                            <dd class="col-sm-9">{{$provider->phone}}</dd>
                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">{{$provider->email}}</dd>
                            <dt class="col-sm-3">bio</dt>
                            <dd class="col-sm-9">{{$provider->bio}}</dd>
                            <dt class="col-sm-3">Address</dt>
                            <dd class="col-sm-9">{{$provider->address}}</dd>
                            <dt class="col-sm-3">Category</dt>
                            @if($provider->category_id !=0)
                            @if($provider->category->parent_id !=0)
                            <dd class="col-sm-9">{{$provider->category->parent->name.'/'.$provider->category->name}}
                            </dd>
                            @else
                            <dd class="col-sm-9">{{$provider->category->name}}</dd>
                            @endif
                            @else
                            <dd class="col-sm-9"></dd>
                            @endif
                            <dt class="col-sm-3">Active</dt>
                            <dd class="col-sm-9"><i class="fa fa-{{ ($provider->is_active? 'check' : 'times') }}"
                                    aria-hidden="true"></i>
                            </dd>
                        </dl>
                    </div>

                    <div class="card-block">
                        <div class="pt-2">
                            <div class="row content-header">
                                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                    <h4 class="card-title">Transactions List ({{$provider->transactions->count()}})</h4>
                                </div>
                                <div class="content-header-right col-md-4 col-xs-12 text-right"></div>
                                <div class="content-header-right col-md-2 col-xs-12 text-right">

                                </div>
                            </div>
                            <div class="row">
                                &nbsp; &nbsp;
                                <label>Filter</label>
                                <div class="row">
                                    <div class="col-lg-12 dataTables_wrapper">
                                        <div class="row ml- mb-1">
                                            <div class="dataTables_length">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            &nbsp; &nbsp;
                            <div class="table-responsive">
                                <table id="tranasactions_provider_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Transaction No</th>
                                            <th>Customer</th>
                                            <th>Customer Phone</th>
                                            <th>Total Amount</th>
                                            <th>Discount Amount</th>
                                            <th>Net Amount</th>
                                            <th>Date Time</th>
                                            <th style="width:150px">Action</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script>

    $(document).ready(function(){
    var id=$('#provider_id').val();
    route = `{{route('admin.providers.getTransactionsForProvider' , 'Id')}}`,
    url = route.replace('Id' ,id);
    var tranasactions_provider_table= $('#tranasactions_provider_table').DataTable({
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
        ajax: {
            url: url,
            type: "get"
        ,
        /*data:function (d) {

                d.status_id = $('#filter_reservation_status').val();

            }*/

        },
        columns: [
            { data: 'id', name: 'id', 'visible': false},
            {data: 'transaction_nu',name: 'transaction_nu', "searchable":true},
            {data: 'customer_name',name: 'customer_name', "searchable":true},
            {data: 'customer_mobile',name: 'customer_mobile', "searchable":true},
            {data: 'total_amount',name: 'total_amount', "searchable":true},
            {data: 'discount_amount',name: 'discount_amount', "searchable":true},
            {data: 'net_amount',name: 'net_amount', "searchable":true},
            {data: 'trans_datetime',name: 'trans_datetime', "searchable":true},
            {data: 'action', name: 'action', orderable: false},
        ]
    });

    $('#tranasactions_provider_table').on('click', '.DeleteProviderTransaction', function () {
            var ContentOfText;
            var trans_id = $(this).data("id");
            ContentOfText="you want to delete this transaction"
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
                    var url =  '/admin/transactions/delete/'+trans_id;
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {"_token": "{{ csrf_token() }}",},
                        success: function (data) {
                            if(data === "true"){
                                tranasactions_provider_table.draw();
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

@section('vendor-js')
@endsection

@section('page-level-js')
@endsection
