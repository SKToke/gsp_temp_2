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
                                <label for="inputState1" class="czm-xs">Student Status</label>
                                <select id="inputState1" class="form-control form-select" name="status"
                                        value="{{ old('status') }}">
                                    <option value="" @if('' == request('status')) selected @endif>All</option>
                                    @foreach(\App\Enums\StudentStatus::cases() as $item)
                                        <option value="{{ $item->name }}"
                                                @if($item->name == request('status')) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputState2" class="czm-xs">Zone</label>
                                <select id="inputState2" class="form-control form-select" name="zone_id">
                                    <option value="" @if('' == request('zone_id')) selected @endif>All</option>
                                    @foreach(\App\Models\Admin\Settings\Zone::all() as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == request('zone_id')) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputState3" class="czm-xs">Institute</label>
                                <select id="inputState3" class="form-control form-select" name="institute_id">
                                    <option value="" @if('' == request('institute_id')) selected @endif>All</option>
                                    @foreach(\App\Models\Admin\Settings\Institute::all() as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == request('institute_id')) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputState4" class="czm-xs">Department</label>
                                <select id="inputState4" class="form-control form-select" name="department_id"
                                        value="{{ old('department_id') }}">
                                    <option value="" @if('' == request('department_id')) selected @endif>All</option>
                                    @foreach(\App\Models\Admin\Settings\Department::all() as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == request('department_id')) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputState4" class="czm-xs">Batch</label>
                                <select id="inputState4" class="form-control form-select" name="batch_id"
                                        value="{{ old('batch_id') }}">
                                    <option value="" @if('' == request('batch_id')) selected @endif>All</option>
                                    @foreach(\App\Models\Admin\Settings\Batch::all() as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == request('batch_id')) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="inputState5" class="czm-xs">Gender</label>
                                <select id="inputState5" class="form-control form-select" name="gender"
                                        value="{{ old('gender') }}">
                                    <option value="" @if('' == request('gender')) selected @endif>All</option>
                                    @foreach(\App\Enums\Gender::cases() as $item)
                                        <option value="{{ $item->name }}"
                                                @if($item->name == request('gender')) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputState6" class="czm-xs">Religion</label>
                                <select id="inputState6" class="form-control form-select" name="religion"
                                        value="{{ old('religion') }}">
                                    <option value="" @if('' == request('religion')) selected @endif>All</option>
                                    @foreach(\App\Enums\Religion::cases() as $item)
                                        <option value="{{ $item->name }}"
                                                @if($item->name == request('religion')) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="inputState7" class="czm-xs">Disability</label>
                                <select id="inputState7" class="form-control form-select" name="disability_id"
                                        value="{{ old('disability_id') }}">
                                    <option value="" @if('' == request('disability_id')) selected @endif>All</option>
                                    @foreach(\App\Models\Admin\Settings\Disability::all() as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == request('disability_id')) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="inputState9" class="czm-xs">District</label>
                                <select id="inputState9" class="form-control form-select" name="district_id"
                                        value="{{ old('district_id') }}">
                                    <option value="" @if('' == request('district_id')) selected @endif>All</option>
                                    @foreach(\App\Models\Admin\Settings\District::all() as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == request('district_id')) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputZip" class="czm-xs">Search</label>
                                <input type="text" class="form-control" id="inputZip" name="search"
                                       placeholder="type here"
                                       value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="inputState10" class="czm-xs">Updated</label>
                                <select id="inputState10" class="form-control form-select" name="is_updated">
                                    <option value="" @if('' == request('is_updated')) selected @endif>No</option>
                                    <option value="1" @if(1 == request('is_updated')) selected @endif>Yes</option>
                                </select>
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
                                <th>GSP Id</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Zone</th>
                                <th>Scholarship Year</th>
                                <th>Batch</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-tbody">
                            @forelse($students as $student)
                                <tr @if($student->is_updated) style="background-color: #00ff80" @endif>
                                    <td class="sort-name">{{ $student->id }}</td>
                                    <td class="sort-city">{{ $student->gsp_id }}</td>
                                    <td class="sort-city">{{ $student->recipient_name }}</td>
                                    <td class="sort-city">{{ $student->primary_mobile }}</td>
                                    <td class="sort-city">{{ $student->status?->name }}</td>
                                    <td class="sort-city">{{ $student->zone?->name }}</td>
                                    <td class="sort-city">{{ $student->scholarship_year }}</td>
                                    <td class="sort-city">{{ $student->batch?->name }}</td>
                                    <td class="sort-city">
                                        <a href="{{ route('students.view_single',$student->id) }}"
                                           class="btn btn-sm btn-pill btn-yellow">
                                            View
                                        </a>
                                        <a href="{{ route('students.edit',$student->id) }}"
                                           class="btn btn-sm btn-pill btn-indigo">
                                            Edit
                                        </a>
                                        <a href="{{ route('students.password',$student->id) }}"
                                           class="btn btn-sm btn-pill btn-teal">
                                            Reset
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="9">No Data Found</td>
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
@endpush
