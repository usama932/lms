@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> {{ ___('common.home') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ $data['title'] }}</a></li>
                            <li class="breadcrumb-item">{{ ___('common.edit') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('roles.update', @$data['role']->id) }}" enctype="multipart/form-data" method="post"
                    id="visitForm">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ ___('common.name') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('name') is-invalid @enderror" name="name"
                                        value="{{ @$data['role']->name }}" list="datalistOptions" id="exampleDataList"
                                        placeholder="{{ ___('common.enter_name') }}">
                                    @error('name')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    {{-- Status  --}}
                                    <label for="validationServer04" class="form-label">{{ ___('common.status') }} <span
                                            class="fillable">*</span></label>

                                    <select
                                        class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                                        name="status" id="validationServer04"
                                        aria-describedby="validationServer04Feedback">

                                        <option value="{{ App\Enums\Status::ACTIVE }}"
                                            {{ @$data['role']->status == App\Enums\Status::ACTIVE ? 'selected' : '' }}>
                                            {{ ___('common.active') }}</option>
                                        <option value="{{ App\Enums\Status::INACTIVE }}"
                                            {{ @$data['role']->status == App\Enums\Status::INACTIVE ? 'selected' : '' }}>
                                            {{ ___('common.inactive') }}
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- table content start  -->
                            <div class="table-container mt-20 role-permisssion-control sidebar_scrollbar_active">
                                <!-- table container start  -->
                                <div class="table-responsive">
                                    <!-- table start  -->
                                    <table class="ot-basic-table ot-table-bg">
                                        <thead>
                                            <th class="user_roles_border border-0 text-capitalize">{{ ___('users_roles.module_module_links') }}</th>
                                            <th class="user_roles_permission border-0 text-capitalize">{{ ___('users_roles.Permissions') }}</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['permissions'] as $permission)
                                                <tr>
                                                    <td>{{ ___('users_roles.' . $permission->attribute) }}</td>
                                                    <td>
                                                        <div class="permission-list-td">
                                                            @foreach ($permission->keywords as $key => $keyword)
                                                                <div class="input-check-radio">
                                                                    <div class="form-check d-flex align-items-center">
                                                                        @if ($keyword != '')
                                                                            <input type="checkbox"
                                                                                class="form-check-input mr-4 read common-key"
                                                                                name="permissions[]"
                                                                                value="{{ $keyword }}"
                                                                                id="{{ $keyword }}"
                                                                                {{ in_array($keyword, @$data['role']->permissions ?? []) ? 'checked' : '' }}>
                                                                            <label class="custom-control-label"
                                                                                for="{{ $keyword }}">{{ ___('users_roles.' . $key) }}</label>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- table end  -->
                                </div>
                                <!-- table container end  -->
                            </div>
                            <!-- table content end -->
                        </div>

                        <div class="col-md-12 mt-24">
                            <div class="text-end">
                                <button class="btn btn-lg ot-btn-primary">{{ ___('common.update') }}</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
