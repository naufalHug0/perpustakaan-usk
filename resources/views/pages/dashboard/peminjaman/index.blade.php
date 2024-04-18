@extends('pages.dashboard.layouts.dashboard')

@section('content')
    <!-- <div class="flex flex-col gap-3">
        <div class="w-full bg-white rounded-3xl h-[210px] px-8 py-6 flex flex-col justify-between">
            <div class="relative px-4">
                <div class="absolute left-0 top-0 bottom-0 w-1 rounded-full bg-purple"></div>
                <p class="font-extrabold text-berry text-xl"><span class="text-slate-400 font-normal">#1 - </span>Biografi Tan Malaka</p>
                <div class="flex gap-2 mt-2">
                    <div class="px-3 py-1 bg-yellow-300 flex items-center font-light gap-2 rounded-md w-max">
                        <i class="bi bi-clock"></i>
                        <p>12 Mar - 14 Mar</p>
                    </div>
                    <div class="px-3 py-1 border border-purple flex items-center gap-2 text-purple rounded-md font-light w-max">
                        <i class="bi bi-arrow-repeat"></i>
                        <p>Belum Kembali</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center w-full">
                <div class="flex gap-12 items-center relative">
                    <span>
                        <p class="text-slate-400 text-sm font-light">Peminjam</p>
                        <p class="text-berry text-xl font-medium">Naufal</p>
                    </span>
                    <span>
                        <p class="text-slate-400 text-sm font-light">Pustakawan</p>
                        <p class="text-berry text-xl font-medium">Zidan</p>
                    </span>
                </div>
                <div class="flex gap-2 items-center">
                    <button class="rounded-md py-2 px-4 text-white bg-blue-500 cursor-pointer  hover:bg-blue-700 transition">Edit data</button>
                    <button class="rounded-md py-2 px-4 text-white bg-green-500 cursor-pointer  hover:bg-green-700 transition">Kembalikan Buku</button>
                </div>
            </div>
            
        </div>
    </div> -->
    <div class="flex flex-col gap-3">
    @forelse ($peminjamans as $peminjaman)
            <div class="w-full bg-white rounded-3xl h-[210px] px-8 py-6 flex flex-col justify-between">
                <div class="relative px-4">
                    <div class="absolute left-0 top-0 bottom-0 w-1 rounded-full bg-purple"></div>
                    <p class="font-extrabold text-berry text-xl"><span class="text-slate-400 font-normal">#1 - </span>Biografi Tan Malaka</p>
                    <div class="flex gap-2 mt-2">
                        <div class="px-3 py-1 bg-yellow-300 flex items-center font-light gap-2 rounded-md w-max">
                            <i class="bi bi-clock"></i>
                            <p>12 Mar - 14 Mar</p>
                        </div>
                        <div class="px-3 py-1 border border-purple flex items-center gap-2 text-purple rounded-md font-light w-max">
                            <i class="bi bi-arrow-repeat"></i>
                            <p>Belum Kembali</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center w-full">
                    <div class="flex gap-12 items-center relative">
                        <span>
                            <p class="text-slate-400 text-sm font-light">Peminjam</p>
                            <p class="text-berry text-xl font-medium">Naufal</p>
                        </span>
                        <span>
                            <p class="text-slate-400 text-sm font-light">Pustakawan</p>
                            <p class="text-berry text-xl font-medium">Zidan</p>
                        </span>
                    </div>
                    <div class="flex gap-2 items-center">
                        <button class="rounded-md py-2 px-4 text-white bg-blue-500 cursor-pointer  hover:bg-blue-700 transition">Edit data</button>
                        <button class="rounded-md py-2 px-4 text-white bg-green-500 cursor-pointer  hover:bg-green-700 transition">Kembalikan Buku</button>
                    </div>
                </div>
                
            </div>
        @empty
        <div class="flex justify-center items-center w-full py-12">
            <p class="text-6xl text-berry font-extrabold">Belum ada <span class="text-purple">peminjaman</span></p>
        </div>
        @endforelse 

        @if (in_array($user->level,['Admin','Pustakawan']) ?? false)
            <a href="/{{ strtolower($user->level) }}/peminjaman/add" class="w-full bg-white rounded-3xl px-8 py-6 flex items-center gap-5 justify-center text-purple hover:bg-purple hover:text-white transition">
                <i class="bi bi-plus-circle-fill text-4xl"></i>
                <p class="font-extrabold text-3xl">Tambah Peminjaman</p>
            </a>
        @endif
    </div>
@endsection