<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Log in | {{ config('app.name') }}</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/css/tabler.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-flags.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-payments.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-vendors.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/static/logo-small.svg') }}">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body class=" d-flex flex-column">
<script src="{{ asset('assets/js/demo-theme.min.js') }}"></script>
<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/static/logo.svg') }}"
                                                                        height="36" alt=""></a>
        </div>
        <div class="card card-md">
            <div class="card-body">
                <x-alert-success>
                    <x-svg.check/>
                </x-alert-success>
                <h2 class="h2 text-center mb-4">{{ __('Login to your account') }}</h2>
                <form autocomplete="off" novalidate method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('Email') }} or {{ __('Mobile') }}</label> <span>insert email or mobile number without +880</span>
                        <input id="userkey" name="userkey" value="{{ old('userkey') }}" required autofocus
                               autocomplete="userkey" type="text"
                               class="form-control {{ $errors->has('userkey')?'is-invalid':'' }}"
                               placeholder="your@email.com or 1xxxxxxxxx">
                        @foreach ((array) $errors->get('userkey') as $message)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @endforeach
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('Password') }}
                            @if (Route::has('password.request'))
                                <span class="form-label-description">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                       href="{{ route('password.request') }}"> {{ __('I forgot password') }}
                                    </a>
                                </span>
                            @endif
                        </label>
                        <input id="password" name="password" required autocomplete="current-password"
                               type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}"
                               placeholder="{{ __('your password') }}">
                        @foreach ((array) $errors->get('password') as $message)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @endforeach
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input"/>
                            <span class="form-check-label">Remember me on this device</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                            </svg>
                            {{ __('Log in') }}</button>
                    </div>
                </form>
            </div>
            {{--<div class="hr-text">or</div>
            <div class="card-body">
                <div class="row">
                    <div class="col"><a href="#" class="btn w-100">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"/>
                            </svg>
                            Login with Github
                        </a></div>
                    <div class="col"><a href="#" class="btn w-100">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-twitter" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z"/>
                            </svg>
                            Login with Twitter
                        </a></div>
                </div>
            </div>--}}
        </div>

        @if (Route::has('register'))
            <div class="text-center text-muted mt-3">
                Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">{{ __('Register') }}</a>
            </div>
        @endif
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="{{ asset('assets/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('assets/js/demo.min.js') }}" defer></script>
<script>
    window.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.querySelector("#togglePassword");
        togglePassword.addEventListener("click", function (e) {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
        });
    });

</script>
</body>
</html>
