@props(['title'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{$title ?? "Larajobs — Job Listing Platform Based in Dhaka"}}</title>

    <link rel="icon" href="{{asset('images/larajobs-logo.svg')}}" />

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    {{--
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#6e7bff",
                    },
                },
            },
        };
    </script> --}}
    @vite('resources/js/app.js')
</head>
<body class="mb-48">
    <nav class="flex justify-between items-center p-3 py-5">
        <a href="/"
            ><img class="w-24" src="{{ asset('images/larajobs-trans.svg') }}" alt="Larajobs" class="logo"
        /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @guest
            <li>
                <a href="{{ route('auth.register_form') }}" class="hover:text-laravel"
                    ><i class="fa-solid fa-user-plus"></i> Register</a
                >
            </li>
            <li>
                <a href="{{ route('auth.login_form') }}" class="hover:text-laravel"
                    ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a
                >
            </li>
            @endguest

            @auth
            <li class="font-bold text-slate-700">
                Welcome, {{auth()->user()->name}}!
            </li>
            <li>
                <a href="#" class="hover:text-laravel">
                    <i class="fa-solid fa-gear"></i> Manage Jobs</a>
            </li>
            <li>
                <a href="#" class="hover:text-laravel">
                    <i class="fa-solid fa-user"></i> Profile</a>
            </li>

            {{-- Logout --}}
            <li>
                <form action="{{route('auth.logout')}}" method="post">
                    @csrf
                    <button type="submit" class="text-gray-400 font-semibold"><i class="fa-solid fa-logout"></i> Logout?</button>
                </form>
            </li>
            @endauth
        </ul>
    </nav>

    <main>
        {{$slot}}
    </main>

    <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; Larajobs {{ date('Y') }}, All Rights reserved</p>

            @auth
            <a
                href="{{route('jobs.create')}}"
                class="absolute top-1/3 right-10 bg-slate-900 text-white py-2 px-5"
                >Post a Job</a
            >
            @endauth
        </footer>

        <x-flash-message/>
</body>
</html>