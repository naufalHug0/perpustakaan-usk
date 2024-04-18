@extends('pages.landing-page.layouts.main')

@section('title','Welcome')

@section('content')
    <div class="h-screen w-screen bg-base flex justify-center flex-col px-12">
        <p class="text-berry text-5xl font-extrabold">Selamat Datang di Perpustakaan</p>
        <p class="text-light-berry font-light mt-2">Membaca buku, membuka gerbang ilmu</p>
        <a href="as" class="px-6 py-3 w-max mt-8 rounded-md bg-berry text-white font-bold transition hover:bg-purple">Masuk</a>
    </div>
@endsection