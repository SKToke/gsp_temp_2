@extends('layouts.master')
@section('title','Import')
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
                        Import
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
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
                    <form action="{{ route('exim.import') }}" method="post" enctype="multipart/form-data" class="card">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="form-label">File</div>
                                <input type="file" name="file"
                                       accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                       class="form-control">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary ms-auto">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("footer")
@endpush
