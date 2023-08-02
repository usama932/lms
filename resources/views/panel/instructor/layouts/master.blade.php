@include('frontend.include.header_script')
@include('panel.instructor.include.header')

<main>
    @include('panel.instructor.include.sidebar')
    @yield('content')
</main>


@include('frontend.include.panel_footer')
@include('frontend.include.footer_script')
