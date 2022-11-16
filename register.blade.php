@extends('frontend.oil.layouts.app')
@section('title', 'Register')
@section('content')

<section
    class="section section-lg section-header position-relative min-vh-100 flex-column d-flex justify-content-center mb-5"
    style="background: url('/frontend/image/slider-bg-1.svg') no-repeat center bottom / cover">
    <div class="container">
        <div class="row align-items-center justify-content-between my-3">
            <div class="col-md-7 col-lg-6">
                <div class="hero-content-left text-white">
                    <h3 class="display-5">@lang('messages.create_your_account')</h3>
                    <p class="lead">
                        @lang('messages.sign_in_text')
                    </p>
                </div>
            </div>
            <div class="col-md-5 col-lg-6">
                <div class="card login-signup-card shadow-lg my-5">
                    <div class="card-body px-md-4 pt-5 pb-3">
                        <div class="mb-5">
                            <h4 class="text-theme">@lang('messages.register')</h4>
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label>@lang('messages.name')
                                            <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend mr-1">
                                                <span class="input-group-text tw-text-gray-400"><i
                                                        class="fas fa-user-alt"></i></span>
                                            </div>
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                                id="name">
                                        </div>

                                        @if($errors->first('name'))
                                        <div class="feedback text-left">
                                            <small class="text text-danger">{{ $errors->first('name') }}</small>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label>@lang('messages.phone')
                                            <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend mr-1">
                                                <span class="input-group-text tw-text-gray-400">09</span>
                                            </div>
                                            <input type="text" name="phone" value="{{old('phone')}}"
                                                class="form-control" id="phone">
                                        </div>

                                        @if($errors->first('phone'))
                                        <div class="feedback text-left">
                                            <small class="text text-danger">{{ $errors->first('phone') }}</small>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label>@lang('messages.password')
                                            <span class="text-danger">*</span></label>

                                        <div class="input-group">
                                            <div class="input-group-prepend mr-1">
                                                <span class="input-group-text tw-text-gray-400"><i
                                                        class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>

                                        <span toggle="#password"
                                            class="fas fa-fw fa-eye fa-lg eye-field-icon toggle-password d-none"></span>

                                        @if($errors->first('password'))
                                        <div class="feedback text-left">
                                            <small class="text text-danger">{{ $errors->first('password') }}</small>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label>@lang('messages.confirm_password') <span
                                                class="text-danger">*</span></label>

                                        <div class="input-group">
                                            <div class="input-group-prepend mr-1">
                                                <span class="input-group-text tw-text-gray-400"><i
                                                        class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" id="password-confirm"
                                                name="password_confirmation">
                                        </div>

                                        <span toggle="#password-confirm"
                                            class="fas fa-fw fa-eye fa-lg eye-field-icon toggle-password-confirm d-none"></span>

                                        @if($errors->first('password_confirmation'))
                                        <div class="feedback text-left">
                                            <small class="text text-danger">{{ $errors->first('password_confirmation')
                                                }}</small>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">@lang('messages.invite_code') (optional)</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend mr-1">
                                                <span class="input-group-text tw-text-gray-400"><i
                                                        class="fas fa-user-plus"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="invite_code"
                                                value="{{old('invite_code')}}">
                                        </div>

                                        <p class="my-1 tw-text-sm text-muted"><i class="fas fa-info-circle"></i>
                                            {{translate('Please fill invite code if you have inviter.', 'Invite code
                                            ရှိပါက ထည့်ပါ။', app()->getLocale())}} ( <a href="#" data-toggle="modal"
                                                data-target="#benefitsModalScrollable">
                                                <i class="fas fa-external-link-alt"></i> @lang('messages.benefits')
                                            </a> )</p>

                                        @if($errors->first('invite_code'))
                                        <div class="feedback text-left">
                                            <small class="text text-danger">{{ $errors->first('invite_code') }}</small>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="term_conditions" class="custom-control-input"
                                        id="term_condition" value="1">
                                    <label class="custom-control-label" for="term_condition">
                                        {{ translate(
                                        'I agree to terms and conditions.',
                                        'စည်းကမ်းသတ်မှတ်ချက်များအား
                                        သဘောတူပါသည်။',
                                        app()->getLocale(),
                                        ) }}
                                        <a href="#" data-toggle="modal" data-target="#termsConditionsModalScrollable">(
                                            <i class="fas fa-external-link-alt"></i> @lang('messages.terms-conditions')
                                            )</a>
                                    </label>
                                </div>
                            </div>

                            <div class="my-4">
                                {!! htmlFormSnippet() !!}
                                @error('g-recaptcha-response')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <button class="btn btn-block btn-theme btn-sm mb-3">@lang('messages.login')</button>
                        </form>
                    </div>
                    <div class="card-footer bg-soft text-center border-top px-md-5">
                        <small>@lang('messages.already_registered')</small>
                        <a href="{{ route('customer.showLoginForm') }}" class="small"> @lang('messages.login')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--  Benefits Modal -->
<div class="modal fade" id="benefitsModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="benefitsModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="benefitsModalScrollableTitle">{{$benefits['title']}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <section class="term-condition py-0">
                    <p>{{$benefits['sub_title']}}</p>

                    @foreach ($benefits['content'] as $content)
                    <h5>{{$content['title']}}</h5>
                    <p class="mb-2">{{$content['sub_title']}}</p>
                    <ul class="mb-4">
                        @foreach ($content['lists'] as $each)
                        <li class="mb-2">{{$each}}</li>
                        @endforeach
                    </ul>
                    @endforeach
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bg-secondary text-white btn-sm"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Terms & Conditions Modal -->
<div class="modal fade" id="termsConditionsModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="termsConditionsModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsConditionsModalScrollableTitle">{{$terms_and_conditions['title']}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <section class="term-condition py-0">
                    <p>{{$terms_and_conditions['sub_title']}}</p>

                    @foreach ($terms_and_conditions['content'] as $content)
                    <h5>{{$content['title']}}</h5>
                    <p class="mb-2">{{$content['sub_title']}}</p>
                    <ul class="mb-4">
                        @foreach ($content['lists'] as $each)
                        <li class="mb-2">{{$each}}</li>
                        @endforeach
                    </ul>
                    @endforeach
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bg-secondary text-white btn-sm"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{!! JsValidator::formRequest('App\Http\Requests\CustomerRegister', '#create'); !!}

<script>
    $(document).ready(function(){
        $('.type').hide();
        $('.type2').show();

        $(document).on('change', '.account_type',function(){
            var account_type = $('.account_type:checked').val();
            $('.type').hide();

            if(account_type == 1 || account_type == 5){
                $('.type1').show();
            }else if(account_type == 2 || account_type == 3 || account_type == 4){
                $('.type2').show();
            }else{
                $('.type2').show();
            }
        });
    });
</script>

@endsection
