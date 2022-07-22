@extends('layoutmodule::admin.login')

@section('content')


<div class="col-md-4 col-10 box-shadow-2 p-0">
    <div class="card border-grey border-lighten-3 m-0">
        <div class="card-header border-0">
            <div class="card-title text-center">
                <div class="p-1">
                    <a href="{{url('/')}}">
                        <img src="{{url('/assets/images/logo.jpeg')}}" alt="Save" style="width: 100px;">
                    </a>
                </div>
            </div>
            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                <span>Adminstration Login</span></h6>
        </div>
        <div class="card-content">
            <div class="card-body">

                @isset($url)
                <form method="POST" action='{{ url("$url/login") }}' id="form-login">
                    @else
                    <form method="POST" action="{{ route('admin.loginpost') }}" aria-adminel="{{ __('Login') }}">
                        @endisset
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-warning mb-2" role="alert">
                            <strong>Error!</strong>
                            {{$errors->first()}}
                        </div>
                        @endif
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="text" class="form-control form-control-lg input-lg" name="email" id="email"
                                value="{{ old('email') }}" placeholder="Email" required>
                            <div class="form-control-position">
                                <i class="ft-mail"></i>
                            </div>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" id="user-password"
                                name="password" placeholder="Password" required>
                            <div class="form-control-position">
                                <i class="fa fa-key"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                {{-- <fieldset>
                                <input type="checkbox" id="remember-me" class="chk-remember">
                                <label for="remember-me"> Remember Me</label>
                            </fieldset> --}}
                            </div>
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-right">
                                {{-- <a href="recover-password.html" class="card-link">Forgot Password?</a> --}}
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <i class="ft-unlock"></i>
                            {{ __('Login') }}
                        </button>
                    </form>
            </div>
        </div>
        <div class="card-footer">
            {{-- <div class="">
                <p class="float-sm-left text-center m-0"><a href="recover-password.html" class="card-link">Recover
                        password</a></p>
                <p class="float-sm-right text-center m-0">New to Moden Admin? <a href="register-simple.html"
                        class="card-link">Sign Up</a></p>
            </div> --}}
        </div>
    </div>
</div>
@endsection