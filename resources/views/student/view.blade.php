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
                 Name: {{ auth()->user()->name }};
                </div>
                <div class="text-success mx-1">
                  Scholarship ID: {{ $student->gsp_id }};
                </div>
                <div class="text-indigo mx-1">
                    Mobile: 0{{ $student->primary_mobile }};
                </div>
                 <div class="text-success mx-1">
                  University/Medical College: {{ $student->institute_id }}
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
                    <div class="alert alert-success" role="alert">
                        <div class="d-flex">
                            <div>
                                <!-- SVG icon from http://tabler-icons.io/i/check -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon icon-tabler-check"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="alert-title">Great! Everything is OK!</h4>
                                <div class="text-muted">Your profile has been saved!</div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row row-cards">
                        <div class="col-12">
                            <form class="card" action="{{ route('student.update',$student) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-2">
                                            <label class="form-label">Academic Discipline/Department</label>
                                            <select class="form-control form-select" name="department_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Department::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->department_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Academic Session</label>
                                            <select class="form-control form-select" name="academic_session_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\AcademicSession::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->academic_session_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Primary Mobile</label>
                                            <input type="text" class="form-control" name="primary_mobile"
                                                   value="{{ $student->primary_mobile }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Secondary Mobile</label>
                                            <input type="text" class="form-control" name="secondary_mobile"
                                                   value="{{ $student->secondary_mobile }}">
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
                                        <div class="col-md-2">
                                            <label class="form-label">Blood Group</label>
                                            <select class="form-control form-select" name="blood_group">
                                                <option value="">Select One</option>
                                                @foreach(\App\Enums\BloodGroup::cases() as $item)
                                                    <option value="{{ $item->value }}"
                                                            @if($item->value == $student->blood_group?->value) selected @endif>{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Your Date of Birth<span
                                                    class="text-danger">*</span></label>
                                            <div class="row g-2">
                                                <div class="col-4">
                                                    <select name="dob[day]" class="form-select bg-danger text-white">
                                                        <option value="">Day</option>
                                                        @foreach(range(1,31) as $item)
                                                            <option value="{{ $item }}"
                                                                    @if($student->dob && count(explode('-',$student->dob))==3 && explode('-',$student->dob)[2] == $item) selected @endif>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select name="dob[month]"
                                                            class="form-select bg-danger text-white">
                                                        <option value="">Month</option>
                                                        @foreach(['January','February','March','April','May','June','July','August','September','October','November','December'] as $item)
                                                            <option value="{{ $loop->iteration }}"
                                                                    @if($student->dob && count(explode('-',$student->dob))==3 && explode('-',$student->dob)[1] == $loop->iteration) selected @endif>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select name="dob[year]"
                                                            class="form-select bg-danger text-white">
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
                                            <label class="form-label">Your Personal Email</label>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ $student->email }}" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Your NID or Birth Certificate Number</label>
                                            <input type="text" class="form-control" name="nid_number"
                                                   value="{{ $student->nid_number }}" required>
                                        </div>
                                                <div class="col-md-2">
                                            <label class="form-label">Profile Picture (JPG, PNG, Maximum: 100KB)</label>
                                            <input type="file" class="form-control" name="profile_picture"
                                                   accept=".jpg,.png" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">NID (PDF, Maximum: 100KB)</label>
                                            <input type="file" class="form-control" name="nid_document"
                                                   accept="application/pdf" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Home District</label>
                                            <select class="form-control form-select" name="district_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\District::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->district_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Upazila</label>
                                            <select class="form-control form-select" name="upazila_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Upazila::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->upazila_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Union</label>
                                            <select class="form-control form-select" name="union_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Union::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->union_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Permanent Address (House, Road, Village)</label>
                                            <textarea name="permanent_address" rows="2" required class="form-control"
                                                      value="{{ $student->permanent_address }}"></textarea>
                                        </div>
                                         <div class="col-md-2">
                                            <label class="form-label">Guardian Mobile</label>
                                            <input type="text" class="form-control" name="other_guardian_mobile"
                                                   value="{{ $student->other_guardian_mobile }}" required>
                                        </div>
                                    
                                        

                                    </div>
                                    <hr>
                                    <div class="row row-cards">
                                        <div class="col-md-2">
                                            <label class="form-label">Father Name</label>
                                            <input type="text" class="form-control" name="father_name"
                                                   value="{{ $student->father_name }}" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Father Living Status</label>
                                            <select class="form-control form-select" name="father_living_status" required>
                                                <option value="">Select One</option>
                                                @foreach(\App\Enums\LivingStatus::cases() as $item)
                                                    <option value="{{ $item->value }}"
                                                            @if($item->value == $student->father_living_status?->value) selected @endif>{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Father Age</label>
                                            <input type="number" class="form-control" name="father_age"
                                                   value="{{ old('father_age') }}" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Father Occupation</label>
                                            <select class="form-control form-select" name="father_occupation_id" required>
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Occupation::all() as $item)
                                                    <option value="{{ $item->id }}"
                                                            @if($item->id == $student->father_occupation_id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Father Disability</label>
                                            <select class="form-control form-select" name="father_disability_id" required>
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
                                        <div class="col-md-2">
                                            <label class="form-label">Mother Living Status</label>
                                            <select class="form-control form-select" name="mother_living_status">
                                                <option value="">Select One</option>
                                                @foreach(\App\Enums\LivingStatus::cases() as $item)
                                                    <option value="{{ $item->value }}"
                                                            @if($item->value == $student->mother_living_status?->value) selected @endif>{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Mother Age</label>
                                            <input type="number" class="form-control" name="mother_age"
                                                   value="{{ old('mother_age') }}" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Mother Occupation</label>
                                            <select class="form-control form-select" name="mother_occupation_id">
                                                <option value="">Select One</option>
                                                @foreach(\App\Models\Admin\Settings\Occupation::all() as $item)
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
                                            <label class="form-label">Number Of Family Member</label>
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
                                                   accept="application/pdf">
                                        </div>
                                        <!--<div class="col-md-2">-->
                                        <!--    <label class="form-label">Remarks</label>-->
                                        <!--    <textarea name="remarks" rows="2" class="form-control"-->
                                        <!--              value="{{ $student->remarks }}"></textarea>-->
                                        <!--</div>-->
                                    </div>
                                    <hr>
                                    
                                        
                                    <div class="row row-cards">
                                        <div class="col-md-2">
                                            <label class="form-label">Your HSC Result</label>
                                            <input type="text" class="form-control" name="hsc_result"
                                                   value="{{ $student->hsc_result }}" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Your SSC Result</label>
                                            <input type="text" class="form-control" name="ssc_result"
                                                   value="{{ $student->ssc_result }}" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Your Current CGPA</label>
                                            <input type="text" class="form-control" name="cgpa"
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
                                        <div class="col-md-2">
                                            <label class="form-label">Studentship Certificate or Marksheet (PDF, Maximum 100KB)</label>
                                            <input type="file" class="form-control" name="result_document"
                                                   accept="application/pdf">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Remarks</label>
                                            <textarea name="remarks" rows="2" class="form-control"
                                                      value="{{ $student->result_remarks }}"></textarea>
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
                                                password</label>
                                            <input type="password" class="form-control" name="current_password">
                                        </div>
                                        <div class="col-md-auto align-self-end">
                                            <button type="submit" class="btn btn-primary ms-auto">Update Profile
                                            </button>
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
</body>
</html>
