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
    <title>Forgot password | {{ config('app.name') }}</title>
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

        <form class="card card-md" action="{{ route('password.email') }}" method="POST" autocomplete="off" novalidate>
            @csrf
            <div class="card-body">
                <x-alert-success>
                    <x-svg.send/>
                </x-alert-success>
                <h2 class="card-title text-center mb-4">Forgot password</h2>
                <p class="text-muted mb-4">Enter your email address and your password will be reset and emailed to
                    you.</p>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input id="email" name="email" value="{{ old('email') }}" required
                           autofocus type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                           placeholder="Enter email">
                    @foreach ((array) $errors->get('email') as $message)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @endforeach
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">
                        <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"/>
                            <path d="M3 7l9 6l9 -6"/>
                        </svg>
                        Send me new password
                    </button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Forget it, <a href="{{ route('login') }}">send me back</a> to the sign in screen.
        </div>
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="{{ asset('assets/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('assets/js/demo.min.js') }}" defer></script>
</body>
</html>
