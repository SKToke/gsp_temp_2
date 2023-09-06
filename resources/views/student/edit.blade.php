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
    <base href="./">
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, follow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta name="description" content="Genius Scholarship System (GSP)">
    <meta name="author" content="genius scholarship system, czm">
    <meta name="keyword" content="gsp, genius scholarship system, czm">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
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
    @stack("header")
    @stack("scripts")
</head>
<body class="layout-fluid">
<script src="{{ asset('assets/js/demo-theme.min.js') }}"></script>
<div class="page">
    <header class="navbar navbar-expand-md">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav flex-row order-md-last">
                <!-- User -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                       aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                          style="background-image: url(https://eu.ui-avatars.com/api/?name={{ getUIAvatarName() }}&size=160)"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ auth()->user()->name }}</div>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Search -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="text-danger mx-1">
                    Name: {{ auth()->user()->name }}
                </div>

                <div class="text-warning mx-1">
                    @if(2==$student->is_updated)
                        <span class="badge bg-lime">Profile Updated</span>
                    @elseif(1==$student->is_updated)
                        <span class="badge bg-yellow">Award Letter Pending</span>
                    @else
                        <span class="badge bg-red">Profile Not Updated</span>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <div class="page-wrapper">
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <x-alert-success/>
                <!-- Error Display -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon alert-icon"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                    <path d="M12 8v4"></path>
                                    <path d="M12 16h.01"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="alert-title"> Error!</h4>
                                @foreach($errors->all() as $error)
                                    <div class="text-muted">{{$error}}</div>
                                @endforeach
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif

                @if(2==$student->is_updated)
                    @include('student.updated-profile')
                @else
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">নির্দেশনাঃ </h4>
                        <p>
                            ১। লগইন করার পর প্রথমে দেখেনিন তথ্যগুলো আপনার কি না! যদি আপনার না হয় তবে দ্রুত আমাদেরকে
                            জানান।
                            <br>
                            ২। আপনার মোবাইল নাম্বার সমূহ শুরুর শূন্য ছাড়াই প্রদান করুন <br>
                            ৩। আপনার পাসপোর্ট সাইজের ছবি (সাইডে ১৫০ পিক্সেল বাই লম্বায় ২০০ পিক্সেল ) ১০০ কিলোবাইটের কম
                            সাইজে
                            উপলোড করুন <br>
                            ৪। আপনার NID অথবা জন্মনিবন্ধনের পিডিএফ ফাইল আপলোড করুন (১০০ কিলোবাইটের কম) <br>
                            ৫। আপনার বাবা / মা যদি মৃত হয়ে থাকেন তবে তাদের মৃত্যকালীন বয়স, পেশা ইত্যাদি নির্বাচন করুন
                            এবং
                            বাবা-মায়ের মোবাইল নম্বর এর স্থানে পরিবারের অন্য কারো মোবাইল নম্বর দিন <br>
                            ৬। আপনি যেই ব্যাংক একাউন্টের মাধ্যমে বৃত্তি পাচ্ছেন তার পরিপূর্ন তথ্য দিন (কোনভাবেই যেন ভুল
                            না
                            হয়) <br>
                            ৭। আপনার ব্যাংক স্টেটমেন্ট এর পিডিএফ ফাইল আপলোড করুন (১০০ কিলোবাইটের কম) <br>
                            ৮। Your Current CGPA এর ঘরে আপনার বর্তমান CGPA প্রদান করুন এবং আপনি বর্তমানে কোন বর্ষে
                            অধ্যয়ন
                            করছেন তা নির্বাচন করুন <br>
                            ৯। আপনার ডিপার্টমেন্ট থেকে আপনার বর্তমান CGPA উল্ল্যেখ করে Studentship Certificate সংগ্রহ
                            করে তা
                            আপলোড করুন অথবা সর্বশেষ এ পর্যন্ত প্রকাশিত মার্কশীট এর পিডিএফ ফাইল আপলোড করুন (১০০
                            কিলোবাইটের
                            কম) <br>
                            ১০। যেকোন ধরণের জিজ্ঞাসা অথবা সংশোধনের জন্য আপনার নাম, মোবাইল নম্বর, ইমেইল ও জিনিয়াস আইডি
                            নম্বর
                            উল্ল্যেখ করে ইমেইল করুন "genius@czm-bd.org" অথবা জিনিয়াস এর মোবাইল নম্বর সমূহে যোগাযোগ করুন।
                        </p>
                    </div>

                    <div class="alert" role="alert">
                        <div class="row">
                            <div class="col-md-3">Name: <b class="text-info">{{ auth()->user()->name }};</b></div>
                            <div class="col-md-3">App ID: <b class="text-info">{{ $student->app_id }};</b></div>
                            <div class="col-md-2">GSP ID: <b class="text-info">{{ $student->gsp_id }};</b></div>
                            <div class="col-md-2">Cell 1(SMS): <b class="text-info">{{ $student->user?->mobile }};</b>
                            </div>
                            <div class="col-md-2">Cell 2: <b class="text-info">{{ $student->user?->alternate_mobile }}
                                    ;</b></div>
                            <div class="col-md-4">Department: <b class="text-info">{{ $student->department }};</b></div>
                            <div class="col-md-4">University: <b class="text-info">{{ $student->university }};</b></div>
                        </div>
                    </div>

                    <div class="row row-cards">
                        <div class="col-12">
                            <form class="card" action="{{ route('student.update',$student) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-2">
                                            <label class="form-label">Select Your Bank<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control form-select" name="bank_id" required
                                                    @if(null!=$student->bank_id) disabled @endif">
                                            <option value="">Select One</option>
                                            @foreach(\App\Models\Admin\Settings\Bank::all() as $item)
                                                <option value="{{ $item->id }}"
                                                        @if($item->id == $student->bank_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Bank Account Number<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="bank_account_number"
                                                   @if(null!=$student->bank_account_number) disabled
                                                   @endif value="{{ $student->bank_account_number ?? old('bank_account_number') }}"
                                                   required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Bank Account Title<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="bank_account_title"
                                                   @if(null!=$student->bank_account_title) disabled
                                                   @endif value="{{ $student->bank_account_title ?? old('bank_account_title') }}"
                                                   required>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="form-label">Bank Account Branch<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="bank_branch"
                                                   @if(null!=$student->bank_branch) disabled
                                                   @endif value="{{ $student->bank_branch ?? old('bank_branch') }}"
                                                   required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row row-cards">
                                        <div class="col-md-3">
                                            @if(null==$student->bank_statement)
                                                <label class="form-label">Bank Statement (PDF, Maximum: 300kb)<span
                                                        class="text-danger">*</span></label>
                                                <input type="file" class="form-control" name="bank_statement"
                                                       accept="application/pdf" required>
                                            @else
                                                <a href="{{ asset('storage/'.$student->app_id.'/'.$student->bank_statement) }}"
                                                   class="btn btn-primary"
                                                   download>Download Bank Statement (PDF)</a>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            @if(null==$student->studentship_certificate)
                                                <label class="form-label">Studentship Certificate (PDF, Maximum:
                                                    300kb)<span
                                                        class="text-danger">*</span></label>
                                                <input type="file" class="form-control" name="studentship_certificate"
                                                       accept="application/pdf" required>
                                            @else
                                                <a href="{{ asset('storage/'.$student->app_id.'/'.$student->studentship_certificate) }}"
                                                   class="btn btn-primary"
                                                   download>Download Studentship Certificate (PDF)</a>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            @if(null==$student->award_letter)
                                                <label class="form-label">Award Letter (PDF, Maximum: 300kb)</label>
                                                <input type="file" class="form-control" name="award_letter"
                                                       accept="application/pdf">
                                            @else
                                                <a href="{{ asset('storage/'.$student->app_id.'/'.$student->award_letter) }}"
                                                   class="btn btn-primary"
                                                   download>Download Award Letter (PDF)</a>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Remarks</label>
                                            <textarea name="remarks"
                                                      class="form-control">{{ $student->remarks ?? old('remarks') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-between">
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary ms-auto">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Libs JS -->
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
<script src="{{ asset('assets/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
<script src="{{ asset('assets/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
<script src="{{ asset('assets/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
<!-- Tabler Core -->
<script src="{{ asset('assets/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('assets/js/demo.min.js') }}" defer></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    //Form
    resetForm();

    function resetForm() {
        $('input').removeClass('is-invalid');
        $('form').trigger('reset');
        $('.select2bs4').val(null).trigger('change');
        $(this).find("input,textarea,select")
            .val('')
            .end()
            .find("input[type=checkbox], input[type=radio]", 'select')
            .prop("checked", "")
            .end();
    }

    //Get Upazila,Union Data
    $(document).on('change', '.district', function () {
        $(".upazila").empty().append(new Option('Select Option'));
        var districtId = $("select[name='district_id']").val();
        $.ajax({
            url: '{{route('get_upazila')}}',
            type: 'POST',
            data: {'district_id': districtId},
            dataType: "json",
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']")
                    .attr('content'));
            },
            success: function (data) {
                $.each(data, function (key, value) {
                    $(".upazila").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
            },
            error: function (data) {
                let msg = '';
                if (data.responseJSON.errors) {
                    $.each(data.responseJSON.errors, function (i, error) {
                        msg += '<p>' + error[0] + '</p>';
                    });
                } else {
                    msg = data.responseJSON.message;
                }
                toastr.error(msg);
            }
        });
    });
    $(document).on('change', '.upazila', function () {
        $(".union").empty().append(new Option('Select Option'));
        var upazilaId = $("select[name='upazila_id']").val();
        $.ajax({
            url: '{{route('get_union')}}',
            type: 'POST',
            data: {'upazila_id': upazilaId},
            dataType: "json",
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']")
                    .attr('content'));
            },
            success: function (data) {
                $.each(data, function (key, value) {
                    $(".union").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
            },
            error: function (data) {
                let msg = '';
                if (data.responseJSON.errors) {
                    $.each(data.responseJSON.errors, function (i, error) {
                        msg += '<p>' + error[0] + '</p>';
                    });
                } else {
                    msg = data.responseJSON.message;
                }
                toastr.error(msg);
            }
        });

    });
</script>

</body>
</html>
