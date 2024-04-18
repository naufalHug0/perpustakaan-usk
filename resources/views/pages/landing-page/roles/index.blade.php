@extends('pages.landing-page.layouts.main')

@section('title','Roles')

@section('content')
    <div class="h-screen w-screen bg-base flex">
        <a href="/login/anggota" class="grow max-w-[34%] transition hover:bg-purple flex justify-center items-center group flex-col">
            <i class="bi bi-person-fill text-[330px] -translate-x-2 text-[rgba(0,0,0,.2)] transition duration-500 group-hover:-translate-y-6 group-hover:text-[rgba(255,255,255,.2)]"></i>
            <p class="font-bold uppercase opacity-0 text-[rgba(255,255,255,.5)] text-6xl -translate-x-2 -translate-y-20 group-hover:opacity-100 group-hover:-translate-y-32 transition duration-500 delay-300">Anggota</p>
        </a>
        <a href="/login/admin" class="grow max-w-[34%] transition hover:bg-purple flex justify-center items-center group flex-col">
            <i class="bi bi-database-fill-gear text-[330px] -translate-x-3 text-[rgba(0,0,0,.2)] transition duration-500 -translate-y-5 group-hover:-translate-y-10 group-hover:text-[rgba(255,255,255,.2)]"></i>
            <p class="font-bold uppercase opacity-0 text-[rgba(255,255,255,.5)] text-6xl -translate-x-3 -translate-y-10 group-hover:opacity-100 group-hover:-translate-y-24 transition duration-500 delay-300">Admin</p>
        </a>
        <a href="/login/pustakawan" class="grow max-w-[34%] transition hover:bg-purple flex justify-center items-center group flex-col">
            <i class="bi bi-journal-text text-[290px] translate-x-3 text-[rgba(0,0,0,.2)] transition duration-500 -translate-y-6 group-hover:-translate-y-12 group-hover:text-[rgba(255,255,255,.2)]"></i>
            <p class="font-bold uppercase opacity-0 text-[rgba(255,255,255,.5)] text-6xl translate-x-3 -translate-y-10 group-hover:opacity-100 group-hover:-translate-y-24 transition duration-500 delay-300">Pustakawan</p>
        </a>
    </div>
@endsection