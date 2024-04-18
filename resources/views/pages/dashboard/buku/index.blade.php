@extends('pages.dashboard.layouts.dashboard')

@section('content')
    <div class="grid w-full grid-cols-[repeat(auto-fit,minmax(250px,300px))] gap-8 justify-center">
        @foreach ($books as $book) 
        <div class="bg-white rounded-3xl aspect-[250/300] overflow-hidden flex flex-col relative hover:scale-[1.01] transition duration-300">
            <img src="{{ asset('/storage/'.$book->gambar) }}" alt="" class="w-full h-1/5 object-cover border-b border-slate-200 grow">
            <div class="py-6 px-7 flex flex-col justify-between grow">
                <span>
                    <p class="font-extrabold text-berry text-xl">{{ Str::limit($book->judul, 45, ' ...') }}</p>
                    <p class="text-light-berry mt-3 leading-5">{{ Str::limit($book->deskripsi, 100, ' ...') }}</p>
                </span>
                <span class="flex gap-2">
                    <div class="px-3 py-[5px] text-white bg-light-berry uppercase rounded-full w-max text-sm">{{ $book->kategori }}</div>
                    <div class="book-stok-status px-3 py-[5px] {{ intval($book->stok) > 0 ? 'success':'danger' }} uppercase rounded-full w-max text-sm">{{ intval($book->stok) > 0 ? 'Tersedia':'Tidak Tersedia' }}</div>
                </span>
            </div>
        </div>
        @endforeach
        <a href="buku/add" class="bg-white rounded-3xl aspect-[250/300] overflow-hidden flex flex-col justify-center items-center hover:bg-purple hover:text-white text-purple transition duration-200 group">
            <i class="bi bi-plus-circle-fill text-[100px]"></i>
            <p class="text-purple font-extrabold group-hover:text-white text-3xl">Tambah Buku</p>
        </a>
    </div>
@endsection