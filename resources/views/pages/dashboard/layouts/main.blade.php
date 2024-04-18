<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ $user->level ?? 'Anggota' }}</title>
    @include('utils.tailwind.link')
</head>
<body class="bg-base">
    @include('pages.dashboard.partials.notifications')
    <div class="w-[80%] m-auto py-14">
        <div class="bg-white rounded-md w-full py-7 px-6">
            <p class="font-extrabold text-4xl text-berry">Welcome, {{ $user->nama }}</p>
            <div class="bg-light-berry px-2 py-1 mt-2 rounded-md text-white w-max">{{ $user->level ?? 'Anggota' }}</div>
            <form action="/logout" method="post" class="mt-6 w-full">
                @csrf
                <button type="submit" class="w-full py-3 bg-red-50 cursor-pointer text-red-500 rounded-md text-center hover:text-white transition border border-red-500 hover:bg-red-500">Logout</button>
            </form>
        </div>
        @yield('body')
    </div>
    @include('utils.notification.script')
    @yield('additional_scripts')
</body>
</html>