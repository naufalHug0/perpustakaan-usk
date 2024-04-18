@extends('pages.dashboard.layouts.main')

@section('body')
    <div class="mt-4 flex justify-center">
        @include('pages.dashboard.partials.tabs')
    </div>
    <div class="mt-8">
        @yield('content')
    </div>
@endsection