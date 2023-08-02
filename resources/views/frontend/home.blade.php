@extends('frontend.layouts.master')
@section('title', $data['title'] ?? 'Home')
@section('content')

    @foreach ($data['section'] as $key => $section)
        @if ($section->snake_title == 'slider')
            @include('frontend.home.hero_area')
        @elseif($section->snake_title == 'featured_courses')
            @include('frontend.home.featured_courses')
        @elseif($section->snake_title == 'popular_category')
            @include('frontend.home.popular_category')
        @elseif($section->snake_title == 'latest_courses')
            @include('frontend.home.latest_courses')
        @elseif($section->snake_title == 'best_rated_courses')
            @include('frontend.home.best_rated_courses')
        @elseif($section->snake_title == 'discount_courses')
            @include('frontend.home.discount_courses')
        @elseif($section->snake_title == 'most_popular_courses')
            @include('frontend.home.most_popular_courses')
        @elseif($section->snake_title == 'become_an_instructor')
            @include('frontend.home.become_an_instructor')
        @elseif($section->snake_title == 'testimonials')
            @include('frontend.home.testimonials')
        @elseif($section->snake_title == 'blogs')
            @include('frontend.home.blogs')
        @elseif($section->snake_title == 'brands')
            @include('frontend.home.brands')
        @endif
    @endforeach

@endsection
@section('scripts')
@endsection
