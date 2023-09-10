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
                        {{ $student->user?->name }} - ({{ $student->gsp_id }}) - &nbsp;
                        @if(2==$student->is_updated)
                            <span class="badge bg-lime">Profile Updated</span>
                        @elseif(1==$student->is_updated)
                            <span class="badge bg-yellow">Award Letter Pending</span>
                        @else
                            <span class="badge bg-red">Profile Not Updated</span>
                        @endif &nbsp; - &nbsp;
                        @if($student->is_verified)
                            <span class="badge bg-primary">Verified</span>
                        @else
                            <span class="badge bg-danger">Not Verified</span>
                            <a href="{{ route('students.verify',$student->id) }}"
                               class="btn btn-success mx-5">Verify</a>
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
                            {{--<div class="row row-cards">
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
                            </div>
                            <hr>--}}
                            <div class="row row-cards">
                                <div class="text-primary">Personal Info</div>
                                <div class="col-md-3">
                                    <label class="form-label">Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name"
                                           value="{{ $student->user?->name }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Email<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="email"
                                           value="{{ $student->user?->email }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Mobile<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mobile"
                                           value="{{ $student->user?->mobile }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Alternate Mobile<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="alternate_mobile"
                                           value="{{ $student->user?->alternate_mobile }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row row-cards">
                                <div class="text-primary">Bank Info</div>
                                <div class="col-md-3">
                                    <label class="form-label">Bank<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control form-select" name="bank_id">
                                        <option value="">Select One</option>
                                        @foreach(\App\Models\Admin\Settings\Bank::all() as $item)
                                            <option value="{{ $item->id }}"
                                                    @if($item->id == $student->bank_id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Bank Account Branch<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="bank_branch"
                                           value="{{ $student->bank_branch }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Bank Account Title<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="bank_account_title"
                                           value="{{ $student->bank_account_title }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Bank Account Number<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="bank_account_number"
                                           value="{{ $student->bank_account_number }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Remarks</label>
                                    <textarea name="remarks" rows="2"
                                              class="form-control">{{ $student->remarks }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row row-cards">
                                <div class="text-primary">Files</div>
                                <div class="col-md-4">
                                    @if($student->bank_statement)
                                        <a id="bs"
                                           href="{{ asset('storage/'.$student->app_id.'/'.$student->bank_statement) }}"
                                           class="btn btn-primary">Bank Statement (PDF)</a>
                                        <label class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox"
                                                   name="delete_bank_statement">
                                            <span class="form-check-label text-danger">Delete Bank Statement</span>
                                        </label>
                                    @else
                                        <label class="form-label">Bank Statement (PDF, Maximum: 300kb)<span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="bank_statement"
                                               accept="application/pdf">
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @if($student->studentship_certificate)
                                        <a id="sc"
                                           href="{{ asset('storage/'.$student->app_id.'/'.$student->studentship_certificate) }}"
                                           class="btn btn-primary">Studentship Certificate (PDF)</a>
                                        <label class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox"
                                                   name="delete_studentship_certificate">
                                            <span
                                                class="form-check-label text-danger">Delete Studentship Certificate</span>
                                        </label>
                                    @else
                                        <label class="form-label">Studentship Certificate (PDF, Maximum: 300kb)<span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="studentship_certificate"
                                               accept="application/pdf">
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @if($student->award_letter)
                                        <a id="al"
                                           href="{{ asset('storage/'.$student->app_id.'/'.$student->award_letter) }}"
                                           class="btn btn-primary">Award Letter (PDF)</a>
                                        <label class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox"
                                                   name="delete_award_letter">
                                            <span class="form-check-label text-danger">Delete Award Letter</span>
                                        </label>
                                    @else
                                        <label class="form-label">Award Letter (PDF, Maximum: 300kb)<span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="award_letter"
                                               accept="application/pdf">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="update_personal_info">
                                <span class="form-check-label text-info">Update Personal Info</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="update_bank_info">
                                <span class="form-check-label text-info">Update Bank Info</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="update_files">
                                <span class="form-check-label text-info">Update Files</span>
                            </label>
                            <button type="submit" class="btn btn-primary ms-auto mt-2">Update</button>
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

        document.getElementById("sc").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default behavior of opening in a new tab.
            window.open(this.href, "_blank", "width=600,height=400"); // Open in a new external window.
        });
        document.getElementById("bs").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default behavior of opening in a new tab.
            window.open(this.href, "_blank", "width=600,height=400"); // Open in a new external window.
        });
        document.getElementById("al").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default behavior of opening in a new tab.
            window.open(this.href, "_blank", "width=600,height=400"); // Open in a new external window.
        });
    </script>
@endpush
