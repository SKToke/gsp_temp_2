@extends('layouts.master')
@section('title','Students | View')
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
            <div class="card">
                <div class="rounded-top text-white d-flex flex-row"
                     style="background-color: #225D84; height:200px;">
                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                        <img src="https://eu.ui-avatars.com/api/?name={{ getUIAvatarName($student->user?->name) }}&size=160"
                             alt="Generic placeholder image"
                             class="img-fluid img-thumbnail mt-4 mb-2"
                             style="width: 150px; z-index: 1">
                    </div>
                    <div class="ms-3" style="margin-top: 130px;">
                        <h5>
                            <span>{{ $student->user?->name }}</span>
                            <span>(GSP ID# {{ $student->gsp_id }})</span>
                        </h5>
                        <p>{{ $student->user?->mobile }}, {{ $student->user?->alternate_mobile }}, {{ $student->user?->email }}</p> ( {{ $student->university }} )
                    </div>
                </div>
                <div class="card-body p-4 text-black">
                    <table class="table table-striped">
                        <tbody>
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
                            <td>{{ $student->zone  }}</td>
                            <th scope="row"> University</th>
                            <td>{{ $student->university  }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Remarks</th>
                            <td colspan="5">{{ $student->remarks }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <tr>
                        @if($student->bank_statement)
                        <td>
                            <a href="{{ asset('storage/'.$student->app_id.'/'.$student->bank_statement) }}" class="btn btn-primary"
                               download>Download Bank Statement (PDF)</a>
                        </td>
                        @endif
                        @if($student->studentship_certificate)
                        <td>
                            <a href="{{ asset('storage/'.$student->app_id.'/'.$student->studentship_certificate) }}" class="btn btn-primary"
                               download>Download Studentship Certificate (PDF)</a>
                        </td>
                            @endif
                                @if($student->award_letter)
                                <td>
                            <a href="{{ asset('storage/'.$student->app_id.'/'.$student->award_letter) }}" class="btn btn-primary"
                               download>Download Award Letter (PDF)</a>
                        </td>
                            @endif
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
@endsection
