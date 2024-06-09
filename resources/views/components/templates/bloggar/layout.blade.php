@extends('components.layouts.app')

@push('css')
    @include("components.templates.bloggar.styles")
@endpush

@section('content')
    @php
    $categories = \App\Models\Category::withCount('articles')->forCurrentInstance()->whereHas('articles')->latest()->take(10)->get();
    @endphp
        <!-- start page-wrapper -->
    <div class="page-wrapper">
        
        @include('components.templates.bloggar.components.top-navbar')

        @yield('templateContent')

        @include('components.templates.bloggar.components.footer')

    </div>
    <!-- end of page-wrapper -->
@endsection

@push('js')
    @include("components.templates.bloggar.scripts")
@endpush