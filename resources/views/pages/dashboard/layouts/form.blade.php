@extends('pages.dashboard.layouts.main')

@section('body')
    <div class="mt-8 bg-white rounded-md w-full py-6 px-6">
        <a href="/{{ strtolower($user->level) }}/{{ $page }}" class="w-max rounded-md text-white bg-berry hover:bg-purple transition font-bold px-3 py-2 flex items-center gap-2">
            <i class="bi bi-arrow-left-circle-fill"></i>
            Kembali
        </a>
        <p class="text-berry text-3xl font-bold mt-8">{{ ucfirst($title) }}</p>
        <div class="mt-4">
            @yield('form')
        </div>
    </div>
@endsection