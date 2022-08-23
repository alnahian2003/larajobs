<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? "Larajobs — Job Listing Platform Based in Dhaka"}}</title>
    <link rel="icon" href="images/favicon.ico" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
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
    </script>
</head>
<body class="mb-48">
    <nav class="flex justify-between items-center p-3 mb-4">
        <a href="/"
            ><img class="w-24" src="{{ asset('images/larajobs-trans.svg') }}" alt="Larajobs" class="logo"
        /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="register.html" class="hover:text-laravel"
                    ><i class="fa-solid fa-user-plus"></i> Register</a
                >
            </li>
            <li>
                <a href="login.html" class="hover:text-laravel"
                    ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a
                >
            </li>
        </ul>
    </nav>

    <!-- Hero -->
    <section
        class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
    >
        <div
            class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
            style="background-image: url('images/laravel-logo.png')"
        ></div>

        <div class="z-10">
            <h1 class="text-6xl font-bold uppercase text-white">
                Lara<span class="text-black">Gigs</span>
            </h1>
            <p class="text-2xl text-gray-200 font-bold my-4">
                Find or post Laravel jobs & projects
            </p>
            <div>
                <a
                    href="register.html"
                    class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                    >Sign Up to List a Gig</a
                >
            </div>
        </div>
    </section>

    <main>
        @yield('content')
    </main>

    <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; Larajobs {{ date('Y') }}, All Rights reserved</p>

            <a
                href="create.html"
                class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                >Post Job</a
            >
        </footer>
</body>
</html>