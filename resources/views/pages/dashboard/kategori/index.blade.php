@extends('pages.dashboard.layouts.dashboard')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-berry uppercase bg-slate-100 border-b border-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $kategori)
                    <tr class="bg-white border-b transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $kategori->id }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-purple">
                            {{ $kategori->kategori }}
                        </th>
                        <td class="px-6 py-4 text-right">
                            <a href="kategori/{{ $kategori->id }}" class="font-medium bg-blue-600 text-white px-2 py-1 rounded-md">Edit</a>
                            <form action="kategori/delete" method="post" class="inline-block">
                                @csrf
                                <input type="hidden" name="id" value="{{ $kategori->id }}">
                                <button type="submit" class="inline-block cursor-pointer font-medium bg-red-600 text-white px-2 py-1 rounded-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="kategori/add" class="w-full transition hover:bg-purple hover:text-white duration-300 rounded-b-md text-purple font-medium text-[28px] bg-white shadow-md py-3 flex justify-center items-center">
            <i class="bi bi-plus-circle-fill"></i>
        </a>
    </div>
@endsection

@section('additional_scripts')
@endsection