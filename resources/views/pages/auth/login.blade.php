<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ ucfirst($role) }}</title>
    @include('utils.tailwind.link')
</head>
<body class="flex justify-center items-center bg-base h-screen w-screen flex-col gap-3">
    <div class="rounded-lg px-5 py-8 bg-white w-1/2">
        <p class="text-berry text-3xl font-extrabold">Login Sebagai {{ ucfirst($role) }}</p>
        <form action="" method="post">
            @csrf
            <div class="mt-8 flex flex-col gap-2">
                <label class="font-light" for="username">Username</label>
                <input type="text" placeholder="Username" name="username" id="username" class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition">
            </div>
            <div class="mt-4 flex flex-col gap-2">
                <label class="font-light" for="password">Password</label>
                <input type="password" placeholder="Password" name="password" id="password" class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition">
            </div>
            <input type="hidden" name="role" value="{{ $role }}">
            <button type="submit" class="py-3 w-full mt-8 rounded-md bg-berry text-white font-bold transition hover:bg-purple">Masuk</button>
        </form>
    </div>
    <!-- invalid message -->
    @if (session()->has('error'))
        <div class="rounded-lg py-4 flex justify-center items-center bg-red-500 text-white w-1/2">
            {{ session('error') }}
        </div>
    @endif
    @yield('additional_scripts')
</body>
</html>