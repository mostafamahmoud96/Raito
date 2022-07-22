@extends('layoutmodule::admin.main')

@section('title')
    Update Product
@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left mb-2 breadcrumb-new col">
            <h3 class="content-header-title">
                 edit :: {{ $product->name }}
            </h3>
        </div>
    </div>

    @include('layoutmodule::admin.flash')

    <div class="content-body">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <div class="row">
                            <div class="col-5">
                                <h2> Salon Information</h2>
                            </div>
                        </div>
                    </div> --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-12">


                                <form id="myForm" class="card-form side-form" method="POST"
                                    action='{{ route('admin.products.update', $product->id) }}'
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ old('id', $product->id) }}" id='product_id'>



                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 col-xs-12 col-6">
                                            <label for="name_ar">Product name </label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name', $product->name) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 col-xs-12 col-6">
                                            <label for="email">price</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="price" name="price"
                                                    value="{{ old('price', $product->price) }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">save </button>
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

    @push('scripts')

    <script type="text/javascript">

    </script>
    @endpush

@endsection
