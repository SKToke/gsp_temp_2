<section class="h-100 gradient-custom-2">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-10 col-xl-7">
                <div class="card">
                    <div class="rounded-top text-white d-flex flex-row"
                         style="background-color: #225D84; height:200px;">
                        <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                            <img src="{{ asset($student->pictureResource?->full_path) }}"
                                 alt="Generic placeholder image"
                                 class="img-fluid img-thumbnail mt-4 mb-2"
                                 style="width: 150px; z-index: 1">
                        </div>
                        <div class="ms-3" style="margin-top: 130px;">
                            <h5>
                                <span>{{ $student->recipient_name }}</span>
                                <span>(GSP ID# {{ $student->gsp_id }})</span>
                            </h5>
                            <p>{{ $student->primary_mobile }}, {{ $student->secindary_mobile }}
                                , {{ $student->email }}</p> ( {{ $student->institute_id }} )
                        </div>
                    </div>

                    <div class="card-body p-4 text-black">
                        <table class="table table-striped">
                            <tbody>

                            <tr>
                                <th scope="row">Gender</th>
                                <td>{{ $student->gender?->name }}</td>
                                <th scope="row">Religion</th>
                                <td>{{ $student->religion?->name }}</td>
                                <th scope="row">Date of Birth</th>
                                <td>{{ $student->dob }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Blood Group</th>
                                <td>{{ $student->blood_group }}</td>
                                <th scope="row">NID / B.C. Number</th>
                                <td>{{ $student->nid_number }}</td>
                                <th scope="row">Disability</th>
                                <td>{{ $student->studentDisability?->name }}</td>
                            </tr>
                            <tr>
                                <th colspan="2" scope="row">Permanent Address</th>
                                <td colspan="4">{{ $student->permanent_address }}</td>
                            </tr>

                            <tr>
                                <th scope="row">District</th>
                                <td>{{ $student->district?->name }}</td>
                                <th scope="row"> Thana /Upazila</th>
                                <td>{{ $student->upazila?->name }}</td>
                                <th scope="row"> Union</th>
                                <td>{{ $student->union?->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Bank Account Title</th>
                                <td>{{ $student->bank_account_title }}</td>
                                <th scope="row"> Account Number</th>
                                <td>{{ $student->bank_account_number }}</td>
                                <th scope="row"> Bank Name</th>
                                <td>{{ $student->bank?->name  }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Bank Barnch</th>
                                <td>{{ $student->bank_branch }}</td>
                                <th scope="row"> Scholarship Zone</th>
                                <td>{{ $student->zone?->name  }}</td>
                                <th scope="row"> Scholarship Year</th>
                                <td>{{ $student->scholarship_year }}</td>
                            </tr>

                            <tr>
                                <th colspan="2" scope="row">Academic Institute</th>
                                <td colspan="4">{{ $student->institute?->name }}</td>
                            </tr>
                            <tr>
                                <th colspan="2" scope="row">Academic Discipline</th>
                                <td colspan="4">{{ $student->department?->name  }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Running Year</th>
                                <td>{{ $student->running_year }}</td>
                                <th scope="row">Academic Session</th>
                                <td>{{ $student->academicSession?->name }}</td>
                                <th scope="row">Current CGPA</th>
                                <td>{{ $student->cgpa }}</td>
                            </tr>

                            <tr>
                                <th scope="row">SSC Result</th>
                                <td>{{ $student->ssc_result }}</td>
                                <th scope="row">HSC Result</th>
                                <td>{{ $student->hsc_result }}</td>
                                <th scope="row">HSC Year</th>
                                <td>{{ $student->hsc_year }}</td>
                            </tr>

                            <tr>
                                <th scope="row">Father Name</th>
                                <td>{{ $student->father_name }}</td>
                                <th scope="row">Father Living Status</th>
                                <td>{{ $student->father_living_status }}</td>
                                <th scope="row">Father Age</th>
                                <td>{{ \Carbon\Carbon::parse($student->father_dob)?->age }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Father Occupation</th>
                                <td>{{ $student->fatherOccupation?->name  }}</td>
                                <th scope="row">Father Disability</th>
                                <td>{{ $student->fatherDisability?->name  }}</td>
                                <th scope="row">Father Mobile</th>
                                <td>{{ $student->father_mobile }}</td>
                            </tr>

                            <tr>
                                <th scope="row">Mother Name</th>
                                <td>{{ $student->mother_name }}</td>
                                <th scope="row">Mother Living Status</th>
                                <td>{{ $student->mother_living_status }}</td>
                                <th scope="row">Mother Age</th>
                                <td>{{ \Carbon\Carbon::parse($student->mother_dob)?->age }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mother Occupation</th>
                                <td>{{ $student->motherOccupation?->name  }}</td>
                                <th scope="row">Mother Disability</th>
                                <td>{{ $student->motherDisability?->name  }}</td>
                                <th scope="row">Mother Mobile</th>
                                <td>{{ $student->mother_mobile }}</td>
                            </tr>

                            <tr>
                                <th scope="row">Total Family Members</th>
                                <td>{{ $student->number_of_family_member }}</td>
                                <th scope="row">Guardian Mobile</th>
                                <td>{{ $student->other_guardian_mobile }}</td>
                                <th></th>
                                <td></td>
                            </tr>


                            <tr>
                                <th scope="row">Remarks</th>
                                <td colspan="5">{{ $student->remarks }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{asset($student->nidResource?->full_path)}}" class="btn btn-primary"
                                       download>Download NID</a>
                                </td>
                                @if($student->bankResource)
                                <td>
                                    <a href="{{asset($student->bankResource?->full_path)}}" class="btn btn-success"
                                       download>Bank Statement</a>
                                </td>
                                @else
                                    <td></td>
                                @endif
                                @if($student->resultResource)
                                <td>
                                    <a href="{{asset($student->resultResource?->full_path)}}" class="btn btn-secondary"
                                       download>Student
                                        Certificate</a>
                                </td>
                                @else
                                    <td></td>
                                @endif
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
