@extends('pages.dashboard.layouts.form')

@section('form')
<div class="w-full rounded-md py-3 mb-5 bg-yellow-300 text-yellow-700 flex justify-center items-center">Tenggat waktu peminjaman adalah H+3 dari waktu peminjaman.</div>
    <form action="/admin/peminjaman" method="post">
        @csrf
        <div class="flex flex-col gap-2">
            <label class="font-light" for="tanggal-peminjaman">Tanggal Peminjaman</label>
            <input type="date" min="{{ date('Y-m-d') }}" placeholder="Tanggal Peminjaman" name="tanggal-peminjaman" id="tanggal-peminjaman" class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition" value="{{ date('Y-m-d') }}">
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <label class="font-light" for="anggota">Anggota yang meminjam</label>
            <select name="anggota" id="anggota" class="appearance-none border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition ">                
                @foreach ($anggotas as $anggota)
                    <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <label class="font-light" for="buku">Buku</label>
            <select name="buku" id="buku" class="appearance-none border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition ">                
                @foreach ($bukus as $buku)
                    <option value="{{ $buku->detail_buku->first()->id }}">{{ $buku->judul }}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="admin" value="{{ $user->id }}">
        <button type="submit" class="py-3 w-full mt-8 rounded-md bg-berry text-white font-bold transition hover:bg-purple">Tambah</button>
    </form>
@endsection