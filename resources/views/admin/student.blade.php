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
                        Students
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <x-alert-success/>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="inputState10" class="czm-xs">Items</label>
                                <select id="inputState10" class="form-control form-select" name="items">
                                    <option value="" @if('' == request('items')) selected @endif>10</option>
                                    <option value="50" @if(50 == request('items')) selected @endif>50</option>
                                    <option value="100" @if(100 == request('items')) selected @endif>100</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputState10" class="czm-xs">Updated</label>
                                <select id="inputState10" class="form-control form-select" name="is_updated">
                                    <option value="" @if('' == request('is_updated')) selected @endif>All</option>
                                    <option value="1" @if(1 == request('is_updated')) selected @endif>Yes without
                                        award
                                    </option>
                                    <option value="2" @if(2 == request('is_updated')) selected @endif>Yes with award
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputZip" class="czm-xs">Search</label>
                                <input type="text" class="form-control" id="inputZip" name="search"
                                       placeholder="type here"
                                       value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary mt-3 w-100">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table class="table mb-2">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>App Id</th>
                                <th>GSP Id</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Bank Branch</th>
                                <th style="width: 200px; text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-tbody">
                            @forelse($students as $student)
                                <tr
                                    @if(2==$student->is_updated) style="background-color: #00ff80"
                                    @elseif(1==$student->is_updated) style="background-color: #f2d8c5"
                                    @endif
                                >
                                    <td class="sort-name"
                                        @if($student->is_verified) style="background-color: #0080ff" @endif>
                                        {{ $student->id }}
                                    </td>
                                    <td class="sort-name"
                                        @if($student->admin_updated_at) style="background-color: #00ffff" @endif>
                                        {{ $student->app_id }}
                                    </td>
                                    <td class="sort-city">{{ $student->gsp_id }}</td>
                                    <td class="sort-city">{{ $student->user?->name }}</td>
                                    <td class="sort-city">{{ $student->user?->mobile }}</td>
                                    <td class="sort-city">{{ $student->bank_account_title }}</td>
                                    <td class="sort-city">
                                        <a id="externalLink"
                                           href="{{ asset('storage/'.$student->app_id.'/'.$student->bank_statement) }}">{{ $student->bank_account_number }}</a>
                                    </td>
                                    <td class="sort-city">{{ $student->bank_branch }}</td>
                                    <td class="sort-city">
                                        <a target="_blank" href="{{ route('students.view_single',$student->id) }}"
                                           class="btn btn-sm btn-yellow">
                                            View
                                        </a>
                                        <a href="{{ route('students.verify',$student->id) }}"
                                           class="btn btn-sm btn-pink">
                                            Verify
                                        </a>
                                        <a target="_blank" href="{{ route('students.edit',$student->id) }}"
                                           class="btn btn-sm btn-indigo">
                                            Edit
                                        </a>
                                        <a href="{{ route('students.password',$student->id) }}"
                                           class="btn btn-sm btn-teal">
                                            Reset
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="10">No Data Found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("footer")
    <script>
        document.getElementById("externalLink").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default behavior of opening in a new tab.
            window.open(this.href, "_blank", "width=600,height=400"); // Open in a new external window.
        });
    </script>
@endpush
