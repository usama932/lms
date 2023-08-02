@extends('frontend.layouts.auth_master')
@section('title', @$data['title'])
@section('content')
    <!-- login area S t a r t  -->
    <section class="ot-login-area">
        <div class="container">
            <div class="row gutter-x-120 align-items-center">
                <div class="col-lg-6">
                    <div class="ot-login-card">
                        <div class="logo">
                            {{ lightLogo() }}
                        </div>
                        <div class="title">
                            <h4>{{ @$data['title'] }}</h4>
                        </div>
                        @if (session('danger'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('danger') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                        <!-- Form -->
                        <a class="btn-primary-submit w-100" href="{{ $data['url'] }}">{{ $data['button'] }}</a>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="login-image ">
                        <img src="{{ @showImage(gallery('verify-email'), 'frontend/default/login.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End-of Login -->

@endsection
