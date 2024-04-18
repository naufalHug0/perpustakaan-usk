<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('utils.tailwind.link')
</head>
<body class="flex justify-center items-center h-screen w-screen bg-base">
    <p class="tracking-[7px] font-poppins font-extralight text-berry text-2xl">@yield('message')</p>
</body>
</html>