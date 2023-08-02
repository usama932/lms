@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">
        {{-- breadecrumb Area S t a r t --}}
        @include('backend.ui-components.breadcrumb', [
            'title' => @$data['title'],
            'routes' => [
                route('dashboard') => ___('common.Dashboard'),
                route('course.index') => ___('common.Courses'),
                '#' => @$data['title'],
            ],
            'buttons' => 0,
        ])
        {{-- breadecrumb Area E n d --}}
        <input type="hidden" id="course_id" value="{{ @$data['course']->id }}">
        <!-- Form with multiStep S t a r t-->
        <div class="table-content table-basic ecommerce-components product-list ">
            <div class="card">
                <div class="card-body">
                    <!--  toolbar table start  -->
                    <div
                        class="table-toolbar d-flex flex-wrap gap-2 flex-column flex-xl-row justify-content-center justify-content-xxl-between align-content-center pb-3">

                        <div class="align-self-center">
                            <div
                                class="d-flex flex-wrap gap-2 flex-column flex-lg-row justify-content-center align-content-center">
                                <!-- show per page -->
                                @include('backend.ui-components.ajax-per-page')
                                <!-- show per page end -->
                                <div class="align-self-center d-flex gap-2">
                                    <!-- search start -->
                                    <div class="align-self-center">
                                        <div class="search-box d-flex">
                                            <input class="form-control" placeholder="{{ ___('common.search') }}"
                                                name="assignmentSearch" autocomplete="off" />
                                            <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                        </div>
                                    </div>
                                    <!-- search end -->

                                    <!-- dropdown action -->
                                    <div class="align-self-center">
                                        <div class="dropdown dropdown-action" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Filter">
                                            <button type="button" class="btn-add" onclick="courseAssignmentLoad()">
                                                <span class="icon">{{ ___('common.Filter') }}
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- add btn start -->
                        @if (hasPermission('course_assignment_create'))
                            <div class="align-self-center d-flex gap-2">
                                <!-- add btn -->
                                <div class="align-self-center">
                                    <a href="{{ route('course.assignment.create', [$data['course']->id]) }}" role="button"
                                        class="btn-add" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="{{ ___('course.Add') }}">
                                        <span><i class="fa-solid fa-plus"></i>
                                        </span>
                                        <span class="d-none d-xl-inline">{{ ___('common.add') }}</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                        <!-- add btn end -->
                    </div>
                    <!--toolbar table end -->
                    <div class="course-assignment-lod"
                        data-href="{{ route('course.get-assignment', $data['course']->id) }}">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('backend/assets/js/data-table/data-table.js') }}"></script>
@endpush
