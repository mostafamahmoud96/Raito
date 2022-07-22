@extends('layoutmodule::admin.main')

@section('title')
New Admin
@endsection

@section('content')

<div class="content-header row">
    <div class="content-header-left mb-2 breadcrumb-new col">
        <h3 class="content-header-title">
            مستخدم جديد
        </h3>
        {{-- <a href="salon.html">salons / Add Salon</a> --}}
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
                            <form class="card-form side-form" method="POST" action='{{ route("admin.customers.store") }}' enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-xs-12 col-6">
                                        <label for="name">الاسم</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-xs-12 col-6">
                                        <label for="email">اسم المستخدم</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-xs-12 col-6">
                                        <label for="password">كلمة المرور</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="password" name="password" value="{{old('password')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-xs-12 col-6">
                                        <label for="role">الوظيفة</label>
                                        <div class="form-group">
                                            <select class="form-control" name="role">

                                                <option value="customert">كاشير</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">انشاء مستخدم</button>
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

@endpush


@endsection
