@extends('pages.dashboard.layouts.form')

@section('form')
        <form action="/admin/kategori/edit/{{ $kategori->id }}" method="post"  class="flex flex-col gap-2">
            @csrf
            <label class="font-light" for="kategori">Kategori</label>
            <div class="relative">
                <div class="input-edit-btn absolute px-3 text-sm flex justify-center items-center right-1 top-1 bottom-1 bg-purple text-white font-bold rounded-md cursor-pointer">Edit</div>

                <input type="text" placeholder="Kategori" name="kategori" id="kategori" class="input-edit border-[0.5px] w-full rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry 
            focus:border-berry transition @error('kategori') invalid @enderror" value="{{ $kategori->kategori }}" disabled>

                <div class="absolute right-1 top-1 bottom-1 input-action-btn gap-1 hidden bg-white pl-3">
                    <button type="submit" class="bg-purple text-white px-3 text-sm font-bold rounded-md cursor-pointer">Simpan</button>
                    <div class="input-cancel-edit text-sm px-3 flex justify-center items-center bg-light-berry text-white font-bold rounded-md cursor-pointer">Batal</div>
                </div>
            </div>
            @error('kategori')
                <p class="text-red-500 font-light text-sm">{{ $message }}</p>
            @enderror
        </form>
@endsection

@section('additional_scripts')
    @include('utils.input-edit.script')
@endsection