@extends('frontend.oil.layouts.app')
@section('title', __('messages.login'))
@section('content')

<section
    class="section section-lg section-header position-relative min-vh-100 flex-column d-flex justify-content-center mb-5"
    style="background: url('/frontend/image/slider-bg-1.svg') no-repeat center bottom / cover">
    <div class="container">
        <div class="row align-items-center justify-content-between my-3">
            <div class="col-md-7 col-lg-6">
                <div class="hero-content-left text-white">
                    <h3 class="display-5">Welcome Back !</h3>
                    <p class="lead">
                        @lang('messages.sign_in_text')
                    </p>
                </div>
            </div>
            <div class="col-md-5 col-lg-5">
                <div class="card login-signup-card shadow-lg my-5">
                    <div class="card-body px-md-5 py-5">
                        <div class="mb-5">
                            <h4 class="text-theme">@lang('messages.sign_in')</h4>
                            <p class="text-muted">@lang('messages.sign_in_text')</p>
                        </div>

                        @if (count($errors))
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-block px-2" id="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fas fa-ban"></i> {{$error}}
                        </div>
                        @endforeach
                        @endif

                        <!--login form-->
                        <form method="POST" action="{{ route('customer.login') }}" id="create"
                            class="login-signup-form">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">@lang('messages.phone')</label>
                                <div class="input-group">
                                    <div class="input-group-prepend mr-1">
                                        <span class="input-group-text">09</span>
                                    </div>
                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control"
                                        id="phone">
                                </div>

                                @if($errors->first('phone'))
                                <div class="feedback text-left">
                                    <small class="text text-danger">{{ $errors->first('phone') }}</small>
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="font-weight-bold">@lang('messages.password')</label>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('customer.forget-password') }}"
                                            class="form-text small text-muted">
                                            @lang('messages.forget-password')
                                        </a>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-prepend mr-1">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <span toggle="#password"
                                    class="fas fa-fw fa-eye fa-lg eye-field-icon toggle-password d-none"></span>
                            </div>

                            <!-- Submit -->
                            <button class="btn btn-block btn-theme btn-sm mt-5 mb-3">@lang('messages.login')</button>
                        </form>
                    </div>
                    <div class="card-footer bg-soft text-center border-top px-md-5">
                        <small>@lang('messages.not_registered')</small>
                        <a href="{{ route('customer.showRegistrationForm') }}" class="small">
                            @lang('messages.create_account')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
{!! JsValidator::formRequest('App\Http\Requests\CustomerLogin', '#create'); !!}
@endsection
