@extends('pages.dashboard.layouts.form')

@section('form')
    <form action="" method="post">
        @csrf
        <div class="flex flex-col gap-2">
            <label class="font-light" for="judul">Judul</label>
            <input type="text" placeholder="Judul" name="judul" id="judul" class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition">
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <label class="font-light" for="pengarang">Pengarang</label>
            <input type="text" placeholder="Pengarang" name="pengarang" id="pengarang" class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition">
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <label class="font-light" for="penerbit">Penerbit</label>
            <input type="text" placeholder="Penerbit" name="penerbit" id="penerbit" class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition">
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <label class="font-light" for="deskripsi">Deskripsi</label>
            <textarea placeholder="Deskripsi" name="deskripsi" id="deskripsi" class="resize-none border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition"></textarea>
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <label class="font-light" for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="appearance-none border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition ">
                @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <label class="font-light">Cover Buku</label>
            <label for="image" class="border-[0.5px] rounded-md py-2 px-3 border-[rgba(0,0,0,.3)] cursor-pointer block font-bold text-purple focus:border-berry transition">Upload Gambar</label>
            <input type="file" accept="image/*" name="image" id="image" class="hidden"/>
        </div>
        <button type="submit" class="py-3 w-full mt-8 rounded-md bg-berry text-white font-bold transition hover:bg-purple">Tambah</button>
    </form>
@endsection