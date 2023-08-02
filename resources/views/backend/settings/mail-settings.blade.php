@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
@endsection

@section('content')
    <div class="page-content">

        {{-- breadecrumb Area S t a r t --}}
        @include('backend.ui-components.breadcrumb', [
            'title' => @$data['title'],
            'routes' => [
                route('dashboard') => ___('common.Dashboard'),
                '#' => @$data['title'],
            ],
        
            'buttons' => 1, 
        ])
        {{-- breadecrumb Area E n d --}}

        <div class="card ot-card">
            <div class="card-header">
                <h4>{{ ___('settings.email_settings') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.mail-setting') }}" enctype="multipart/form-data" method="post" id="visitForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="row mb-3">
                                    {{-- Mail drive start --}}
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                        <label for="inputname" class="form-label">{{ ___('settings.mail_host') }} <span
                                                class="fillable">*</span></label>
                                        <input type="text" name="mail_host"
                                            class="form-control ot-input @error('mail_host') is-invalid @enderror"
                                            value="{{ setting('mail_host') }}"
                                            placeholder="{{ ___('settings.mail_host') }}">
                                        @error('mail_host')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Mail drive start --}}

                                    {{-- Mail drive start --}}
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                        <label for="inputname" class="form-label">{{ ___('settings.mail_address') }} <span
                                                class="fillable">*</span></label>
                                        <input type="text" name="mail_address"
                                            class="form-control ot-input @error('mail_address') is-invalid @enderror"
                                            value="{{ Setting('mail_address') }}"
                                            placeholder="{{ ___('settings.mail_address') }}">
                                        @error('mail_address')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Mail drive start --}}

                                    {{-- Mail drive start --}}
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                        <label for="inputname" class="form-label">{{ ___('settings.from_name') }} <span
                                                class="fillable">*</span></label>
                                        <input type="text" name="from_name"
                                            class="form-control ot-input @error('from_name') is-invalid @enderror"
                                            value="{{ Setting('from_name') }}"
                                            placeholder="{{ ___('settings.from_name') }}">
                                        @error('from_name')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Mail drive start --}}

                                    {{-- Mail drive start --}}
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                        <label for="inputname" class="form-label">{{ ___('settings.mail_username') }} <span
                                                class="fillable">*</span></label>
                                        <input type="text" name="mail_username"
                                            class="form-control ot-input @error('mail_username') is-invalid @enderror"
                                            value="{{ Setting('mail_username') }}"
                                            placeholder="{{ ___('settings.mail_username') }}">
                                        @error('mail_username')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Mail drive start --}}

                                    <!-- Mail Password start -->
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label ">{{ ___('settings.mail_password') }} <span
                                                class="fillable"></span></label> <input type="password" name="mail_password"
                                            class="form-control ot-input @error('mail_password') is-invalid @enderror"
                                            id="exampleInputmail_password1"
                                            placeholder="{{ ___('settings.enter_your_mail_password') }}">
                                        @error('mail_password')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- Mail Password end -->
                                    <!-- Mail Password start -->
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label ">{{ ___('settings.mail_port') }} <span
                                                class="fillable">*</span></label> <input type="text" name="mail_port"
                                            value="{{ Setting('mail_port') }}"
                                            class="form-control ot-input @error('mail_port') is-invalid @enderror"
                                            id="exampleInputmail_password1"
                                            placeholder="{{ ___('settings.enter_your_mail_post') }}">
                                        @error('mail_port')
                                            <div id="validationServer04Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- Mail Password end -->

                                    <!-- Encryption start-->
                                    <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                                        <label for="Encryption" class="form-label">{{ ___('settings.encryption') }} <span
                                                class="fillable">*</span></label>
                                        <select name="encryption" id="encryptionId"
                                            class="@error('encryption') is-invalid @enderror niceSelect bordered_style wide">
                                            <option value="">{{ ___('settings.select_encryption') }}</option>
                                            <option value="{{ App\Enums\Encryption::null }}"
                                                {{ setting('encryption') == App\Enums\Encryption::null ? 'selected' : '' }}>
                                                {{ ___('settings.null') }}</option>
                                            <option value="{{ App\Enums\Encryption::tls }}"
                                                {{ setting('encryption') == App\Enums\Encryption::tls ? 'selected' : '' }}>
                                                {{ ___('settings.tls') }}</option>
                                            <option value="{{ App\Enums\Encryption::ssl }}"
                                                {{ setting('encryption') == App\Enums\Encryption::ssl ? 'selected' : '' }}>
                                                {{ ___('settings.ssl') }}</option>
                                        </select>
                                    </div>
                                    <!-- Encryption end-->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="text-end">
                                @if (hasPermission('storage_settings_update'))
                                    <button class="btn btn-lg ot-btn-primary">{{ ___('common.update') }} </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
