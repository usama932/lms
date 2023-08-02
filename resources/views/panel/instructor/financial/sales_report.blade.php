@extends('panel.instructor.layouts.master')
@section('title', @$data['title'])
@section('content')
    <!-- instructor Courses Start -->
    <section class="instructor-financial">
        <div class="row">

            <!-- Section Tittle -->
            <div class="col-xl-12">
                <div
                    class="section-tittle-two border-bottom pb-8 d-flex align-items-center justify-content-between flex-wrap mb-10">
                    <h2 class="title font-600 mb-20">
                        {{ $data['title'] }}
                    </h2>
                    <div class="right d-flex flex-wrap justify-content-between">
                        <!-- search-tab -->
                        <div class="search-tab ml-0 mr-0 mb-20">
                            <a href="{{ route('instructor.sales_report.download') }}"
                                class="tab-btn">{{ ___('instructor.downlode report') }}</a>
                        </div>
                        <!-- /End -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="activity-table">
                    <table class="table-responsive">
                        <thead>
                            <tr>
                                <th>{{ ___('common.ID') }}</th>
                                <th>{{ ___('instructor.Course Title') }}</th>
                                <th>{{ ___('instructor.Student') }}</th>
                                <th>{{ ___('instructor.Price') }}</th>
                                <th>{{ ___('instructor.Discount') }}</th>
                                <th>{{ ___('instructor.Total Amount') }}</th>
                                <th>{{ ___('instructor.Income') }}</th>
                                <th>{{ ___('instructor.Date') }}</th>
                                <th>{{ ___('course.Invoice') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['enrolls'] as $key => $enroll)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <a target="_blank"
                                            href="{{ route('frontend.courseDetails', $enroll->course->slug) }}">
                                            {{ Str::limit(@$enroll->course->title, 30) }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ Str::limit(@$enroll->user->name, 30) }}
                                    </td>
                                    <td>
                                        {{ showPrice(@$enroll->orderItem->amount) }}
                                    </td>

                                    <td>
                                        {{ showPrice(@$enroll->orderItem->discount_amount) }}
                                    </td>
                                    <td>
                                        {{ showPrice(@$enroll->orderItem->total_amount) }}
                                    </td>
                                    <td>
                                        @if ($enroll->orderItem->instructor_amount > 0)
                                            <span class="text-success">
                                                {{ showPrice(@$enroll->orderItem->instructor_amount) }}
                                            </span>
                                        @else
                                            {{ showPrice(@$enroll->orderItem->instructor_amount) }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ showDate(@$enroll->orderItem->created_at) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('instructor.invoice.view', $enroll->id) }}"
                                            class="action-success">
                                            <i class="ri-invision-line"></i>
                                        </a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">
                                        {{-- No Data Found --}}
                                        <div class="row justify-content-center">
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="not-data-found table-img text-center pt-50 pb-10">
                                                    <img src="{{ @showImage(setting('empty_table'), 'backend/assets/images/no-data.png') }}"
                                                        alt="img" class="w-100 mb-20 w-25">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--  pagination start -->
        {!! @$data['enrolls']->links('frontend.partials.pagination-count') !!}
        <!--  pagination end -->
    </section>
    <!-- instructor Courses End -->
@endsection
