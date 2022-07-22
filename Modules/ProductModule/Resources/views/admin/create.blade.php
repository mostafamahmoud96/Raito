@extends('layoutmodule::admin.main')

@section('title')
New Product
@endsection

@section('content')

<div class="content-header row">
    <div class="content-header-left mb-2 breadcrumb-new col">
        <h3 class="content-header-title">
New Product
        </h3>
    </div>
</div>

@include('layoutmodule::admin.flash')

<div class="content-body">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-12">


                            <form id="myForm" class="card-form side-form" method="POST"
                                action='{{route("admin.products.store")}}' enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" class="form-control" id="barcode" name="barcode"
                                    value="{{old('barcode')}}">

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-xs-12 col-6">
                                        <label for="name_ar">Product Name</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{old('name')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-xs-12 col-6">
                                        <label for="price">Price</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="price" name="price"
                                                value="{{old('price')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-1 col-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@push('scripts')

<script type="text/javascript">

</script>
@endpush


@endsection
