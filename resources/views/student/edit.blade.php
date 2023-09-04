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
                              style="background-image: url('{{ asset($student->pictureResource?->full_path) }}')"></span>
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
                    @if($student->is_updated)
                        <span class="badge bg-lime">Profile Updated</span>
                    @else
                        <span class="badge bg-yellow">Profile Not Updated</span>
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

                @if($student->is_updated)
                    @include('student.updated-profile')
                @else
                    <div class="alert alert-success" role="alert">
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
                            <div class="col-md-2">GSP ID: <b class="text-info">{{ $student->gsp_id }};</b></div>
                            <div class="col-md-2">Cell: <b class="text-info">0{{ $student->primary_mobile }};</b></div>
                            <div class="col-md-5">Institute: <b class="text-info">{{ $student->institute?->name }}</b>
                            </div>
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
                                            <label class="form-label">Select Your Academic Discipline /
                                                Department</label>
                                            <select class="form-control form-select" name="department_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Department::orderBy('name', 'ASC')->get() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->department_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Admission Session</label>
                                            <select class="form-control form-select" name="academic_session_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\AcademicSession::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->academic_session_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Your Main Mobile</label>
                                            <input type="text" class="form-control" name="primary_mobile"
                                                   value="{{ $student->primary_mobile }}">
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Secondary Mobile</label>
                                            <input type="text" class="form-control" name="secondary_mobile"
                                                   value="{{ $student->secondary_mobile }}">
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Blood Group</label>
                                            <select class="form-control form-select" name="blood_group">
                                                <option value="">Select One</option>
                                                @foreach(\App\Enums\BloodGroup::cases() as $item)
                                                    <option value="{{ $item->value }}"
                                                            @if($item->value == $student->blood_group?->value) selected @endif>{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Disability</label>
                                            <select class="form-control form-select" name="recipients_disability_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Disability::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->recipients_disability_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            {{$student->dob}}
                                            <label class="form-label">Your Date of Birth<span
                                                    class="text-danger">*</span></label>
                                            <div class="row g-2">
                                                <div class="col-4">
                                                    <select name="dob[day]" class="form-select bg-primary text-white">
                                                        <option value="">Day</option>
                                                        @foreach(range(1,31) as $item)
                                                            <option value="{{ $item }}"
                                                                    @if($student->dob && count(explode('-',$student->dob))==3 && explode('-',$student->dob)[2] == $item) selected @endif>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select name="dob[month]"
                                                            class="form-select bg-primary text-white">
                                                        <option value="">Month</option>
                                                        @foreach(['January','February','March','April','May','June','July','August','September','October','November','December'] as $item)
                                                            <option value="{{ $loop->iteration }}"
                                                                    @if($student->dob && count(explode('-',$student->dob))==3 && explode('-',$student->dob)[1] == $loop->iteration) selected @endif>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select name="dob[year]"
                                                            class="form-select bg-primary text-white">
                                                        <option value="">Year</option>
                                                        @foreach(range(1980,now()->year) as $item)
                                                            <option value="{{ $item }}"
                                                                    @if($student->dob && count(explode('-',$student->dob))==3 && explode('-',$student->dob)[0] == $item) selected @endif>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Your Personal Email<span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ $student->user->email }}" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Your NID or Birth Certificate Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nid_number"
                                                   value="{{ $student->nid_number }}" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Passport Size Profile Picture (JPG, PNG, Maximum:
                                                100KB)<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="profile_picture"
                                                   accept=".jpg,.png" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">NID or Online BC (PDF, Maximum: 100KB)<span
                                                    class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="nid_document"
                                                   accept=".jpg,.png,application/pdf" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Home District</label>
                                            <select class="form-control district form-select" name="district_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\District::orderBy('name', 'ASC')->get() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->district_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Upazila</label>
                                            <select class="form-control upazila form-select" name="upazila_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Upazila::orderBy('name', 'ASC')->get() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->upazila_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Union</label>
                                            <select class="form-control union form-select" name="union_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Union::orderBy('name', 'ASC')->get() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->union_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Permanent Address (House, Road, Village)<span
                                                    class="text-danger">*</span></label>
                                            <textarea name="permanent_address" rows="2" required class="form-control"
                                                      value="{{ $student->permanent_address}}">{{ $student->permanent_address}}</textarea>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Guardian Mobile<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="other_guardian_mobile"
                                                   value="{{ $student->other_guardian_mobile }}" required>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row row-cards">
                                        <div class="col-md-2">
                                            <label class="form-label">Father Name<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="father_name"
                                                   value="{{ $student->father_name }}" required>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Father Living Status<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control form-select" name="father_living_status"
                                                    required>
                                                <option value="">Select One</option>
                                                @foreach(\App\Enums\LivingStatus::cases() as $item)
                                                    <option value="{{ $item->value }}"
                                                            @if($item->value == $student->father_living_status?->value) selected @endif>{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Father Age (Years)<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="father_age"
                                                   value="{{$student->father_dob ? \Carbon\Carbon::parse( $student->father_dob )->age : ''}}"
                                                   required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Father Occupation<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control form-select" name="father_occupation_id"
                                                    required>
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Occupation::orderBy('name', 'ASC')->get()  as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->father_occupation_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Father Disability<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control form-select" name="father_disability_id"
                                                    required>
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Disability::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->father_disability_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Father Mobile</label>
                                            <input type="text" class="form-control" name="father_mobile"
                                                   value="{{ $student->father_mobile }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Mother Name</label>
                                            <input type="text" class="form-control" name="mother_name"
                                                   value="{{ $student->mother_name }}">
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Mother Living Status</label>
                                            <select class="form-control form-select" name="mother_living_status">
                                                <option value="">Select One</option>
                                                @foreach(\App\Enums\LivingStatus::cases() as $item)
                                                    <option value="{{ $item->value }}"
                                                            @if($item->value == $student->mother_living_status?->value) selected @endif>{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Mother Age (Years)</label>
                                            <input type="number" class="form-control" name="mother_age"
                                                   value="{{$student->mother_dob ? \Carbon\Carbon::parse( $student->mother_dob )->age :''}}"
                                                   required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Mother Occupation</label>
                                            <select class="form-control form-select" name="mother_occupation_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Occupation::orderBy('name', 'ASC')->get() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->mother_occupation_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Mother Disability</label>
                                            <select class="form-control form-select" name="mother_disability_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Disability::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->mother_disability_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Mother Mobile</label>
                                            <input type="text" class="form-control" name="mother_mobile"
                                                   value="{{ $student->mother_mobile }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row row-cards">
                                        <div class="col-md-2">
                                            <label class="form-label">Total Family Member</label>
                                            <input type="text" class="form-control" name="number_of_family_member"
                                                   value="{{ $student->number_of_family_member }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Select Your Bank</label>
                                            <select class="form-control form-select" name="bank_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Bank::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->bank_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Bank Account Number</label>
                                            <input type="text" class="form-control" name="bank_account_number"
                                                   value="{{ $student->bank_account_number }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Bank Account Title</label>
                                            <input type="text" class="form-control" name="bank_account_title"
                                                   value="{{ $student->bank_account_title }}">
                                        </div>

                                        <div class="col-md-2">
                                            <label class="form-label">Bank Account Branch</label>
                                            <input type="text" class="form-control" name="bank_branch"
                                                   value="{{ $student->bank_branch }}">
                                        </div>

                                        <div class="col-md-2">
                                            <label class="form-label">Bank Statement (PDF, Maximum 100KB)</label>
                                            <input type="file" class="form-control" name="bank_statement"
                                                   accept=".jpg,.png,application/pdf">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row row-cards">
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">HSC Pasing Year</label>
                                            <select class="form-control form-select" name="hsc_year" required>
                                                <option value="">Select One</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                            </select>

                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Your HSC Result</label>
                                            <input type="text" class="form-control" name="hsc_result"
                                                   value="{{ $student->hsc_result }}" required>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Your SSC Result</label>
                                            <input type="text" class="form-control" name="ssc_result"
                                                   value="{{ $student->ssc_result }}" required>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <label class="form-label">Your Current CGPA</label>
                                            <input type="number" class="form-control" name="cgpa" step="0.01"
                                                   value="{{ $student->cgpa }}" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Running Year</label>
                                            <select class="form-control form-select" name="running_year" required>
                                                <option value="">Select One</option>
                                                <option value="1st Year">1st Year</option>
                                                <option value="2nd Year">2nd Year</option>
                                                <option value="3rd Year">3rd Year</option>
                                                <option value="4th Year">4th Year</option>
                                                <option value="5th Year">5th Year</option>
                                            </select>

                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Studentship Certificate or Marksheet (PDF, Maximum
                                                100KB) <span>*</span></label>
                                            <input type="file" class="form-control" name="result_document" required
                                            accept=".jpg,.png,application/pdf">
                                        </div>
                                        <div class="col-md-8">
                                            <label class="form-label">Remarks</label>
                                            <textarea name="remarks" rows="2" class="form-control"
                                                      value="{{$student->remarks}}">{{$student->remarks}}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row row-cards">
                                        <div class="col-md-2">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">New Confirmed Password</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-between">
                                        <div class="col-md-4">
                                            <label class="form-label text-primary">To Make any changes, Provide your
                                                current
                                                password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="current_password">
                                        </div>
                                        <div class="col-md-auto align-self-end m-1">
                                            <button type="submit" class="btn btn-primary ms-auto">Update Profile</button>
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
