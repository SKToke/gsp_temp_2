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
    <title>Welcome | {{ config('app.name') }}</title>
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
    <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg">
                <div class="container-tight">
                    <div class="text-center mb-4">
                        <a href="." class="navbar-brand navbar-brand-autodark"><img
                                src="{{ asset('assets/static/logo.svg') }}" height="36"
                                alt=""></a>
                    </div>
                    <h2 class="h2 text-center my-5">Genius Scholarship Program (GSP)</h2>
                    <div class="text-center text-muted mt-3">
                        Already have account? <a href="{{ route('login') }}" tabindex="-1">Log in</a>
                    </div>
                </div>
            </div>
            <div class="col-lg d-none d-lg-block">
                {{--<img src="{{ asset('assets/static/illustrations/undraw_secure_login_pdn4.svg') }}" height="300"
                     class="d-block mx-auto"
                     alt="">--}}
                <img src="{{ asset('assets/static/logo.svg') }}" height="300"
                     class="d-block mx-auto"
                     alt="">
            </div>
        </div>
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="{{ asset('assets/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('assets/js/demo.min.js') }}" defer></script>
</body>
</html>
