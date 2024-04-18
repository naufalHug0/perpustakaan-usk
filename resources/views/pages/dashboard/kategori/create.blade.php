@extends('pages.dashboard.layouts.form')

@section('form')
    <form action="/admin/kategori" method="post">
        @csrf
        <div class="flex flex-col gap-2">
            <label class="font-light" for="kategori">Kategori</label>
            <input type="text" placeholder="Kategori" name="kategori" id="kategori" class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition @error('kategori') invalid @enderror">
            @error('kategori')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="py-3 w-full mt-8 rounded-md bg-berry text-white font-bold transition hover:bg-purple">Tambah</button>
    </form>
@endsection