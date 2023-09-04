@extends('layouts.master')
@section('title','Students')
@push('scripts')
@endpush
@section("content")
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    {{--<div class="page-pretitle">
                        Overview
                    </div>--}}
                    <h2 class="page-title">
                        {{ $student->recipient_name }} - ({{ $student->gsp_id }}) - @if($student->is_updated)
                            <span class="badge bg-lime">Profile Updated</span>
                        @else
                            <span class="badge bg-yellow">Profile Not Updated</span>
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    </div>
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
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" action="{{ route('students.update',$student) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row row-cards">
                                <div class="col-md-3">
                                    <div class="form-label">Change Update Status</div>
                                    <div>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_updated" value="0"
                                                   @if(!$student->is_updated) checked @endif>
                                            <span class="form-check-label">Not Updated</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_updated" value="1"
                                                   @if($student->is_updated) checked @endif>
                                            <span class="form-check-label">Updated</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Institute</label>
                                    <select class="form-control form-select" name="institute_id">
                                        <option value="">Select One</option>
                                        @foreach(\App\Models\Admin\Settings\Institute::all() as $item)
                                            <option value="{{ $item->id }}"
                                                    @if($item->id == $student->institute_id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Recipient Name</label>
                                    <input type="text" class="form-control" name="recipient_name"
                                           value="{{ $student->recipient_name }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row row-cards">
                                <div class="col-md-2">
                                    <label class="form-label">Academic Discipline</label>
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
                                    <label class="form-label">Date of birth<span
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
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email"
                                           value="{{ $student->user->email }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">NID</label>
                                    <input type="text" class="form-control" name="nid_number"
                                           value="{{ $student->nid_number }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">District</label>
                                    <select class="form-control district form-select" name="district_id" id="">
                                        <option value="">Select One</option>
                                        @foreach(\App\Models\Admin\Settings\District::all() as $item)
                                            <option value="{{ $item->id }}"
                                                    @if($item->id == $student->district_id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Upazila</label>
                                    <select class="form-control upazila form-select" name="upazila_id" id="">
                                        <option value="">Select One</option>
                                        @foreach(\App\Models\Admin\Settings\Upazila::all() as $item)
                                            <option value="{{ $item->id }}"
                                                    @if($item->id == $student->upazila_id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Union</label>
                                    <select class="form-control union form-select" name="union_id" id="">
                                        <option value="">Select One</option>
                                        @foreach(\App\Models\Admin\Settings\Union::all() as $item)
                                            <option value="{{ $item->id }}"
                                                    @if($item->id == $student->union_id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">HSC Result</label>
                                    <input type="text" class="form-control" name="hsc_result"
                                           value="{{ $student->hsc_result }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">SSC Result</label>
                                    <input type="text" class="form-control" name="ssc_result"
                                           value="{{ $student->ssc_result }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Permanent Address</label>
                                    <textarea name="permanent_address" rows="2"
                                              class="form-control">{{ $student->permanent_address }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row row-cards">
                                <div class="col-md-2">
                                    <label class="form-label">Father Name</label>
                                    <input type="text" class="form-control" name="father_name"
                                           value="{{ $student->father_name }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Father Living Status</label>
                                    <select class="form-control form-select" name="father_living_status">
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
                                           value="{{ old('father_age') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Father Occupation</label>
                                    <select class="form-control form-select" name="father_occupation_id">
                                        <option value="">Select One</option>
                                        @foreach(\App\Models\Admin\Settings\Occupation::all() as $item)
                                            <option value="{{ $item->id }}"
                                                    @if($item->id == $student->father_occupation_id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Father Disability</label>
                                    <select class="form-control form-select" name="father_disability_id">
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
                                           value="{{ old('mother_age') }}">
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
                                    <label class="form-label">Other Guardian Mobile</label>
                                    <input type="text" class="form-control" name="other_guardian_mobile"
                                           value="{{ $student->other_guardian_mobile }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Number Of Family Member</label>
                                    <input type="text" class="form-control" name="number_of_family_member"
                                           value="{{ $student->number_of_family_member }}">
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
                                    <label class="form-label">Bank</label>
                                    <select class="form-control form-select" name="bank_id">
                                        <option value="">Select One</option>
                                        @foreach(\App\Models\Admin\Settings\Bank::all() as $item)
                                            <option value="{{ $item->id }}"
                                                    @if($item->id == $student->bank_id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Bank Account Branch</label>
                                    <input type="text" class="form-control" name="bank_branch"
                                           value="{{ $student->bank_branch }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Profile Picture</label>
                                    <input type="file" class="form-control" name="profile_picture"
                                           accept=".jpg,.png">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">NID</label>
                                    <input type="file" class="form-control" name="nid_document"
                                           accept=".jpg,.png,application/pdf">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Bank Statement</label>
                                    <input type="file" class="form-control" name="bank_statement"
                                           accept=".jpg,.png,application/pdf">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Remarks</label>
                                    <textarea name="remarks" rows="2"
                                              class="form-control">{{ $student->remarks }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row row-cards">
                                <div class="col-md-2">
                                    <label class="form-label">CGPA</label>
                                    <input type="number" class="form-control" name="cgpa" step="0.01"
                                           value="{{ $student->cgpa }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Running Year</label>
                                    <input type="text" class="form-control" name="running_year"
                                           value="{{ $student->running_year }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Result Document</label>
                                    <input type="file" class="form-control" name="result_document"
                                           accept=".jpg,.png,application/pdf">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Result Remarks</label>
                                    <textarea name="result_remarks" rows="2"
                                              class="form-control">{{ $student->result_remarks }}</textarea>
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
                            <button type="submit" class="btn btn-primary ms-auto">Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("footer")
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
@endpush
