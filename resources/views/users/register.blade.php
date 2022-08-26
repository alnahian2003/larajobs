<x-layout :title="$title">
    <x-card class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Register
        </h2>
        <p class="mb-4">Create an account to post jobs</p>
    </header>

    <form action="{{route('auth.register')}}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">
                Name
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}">
            <!-- Error -->
            @error('name')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>   
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Email</label>
            <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}">
            <!-- Error -->
            @error('email')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>   
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="inline-block text-lg mb-2">
                Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password">
            <!-- Error -->
            @error('password')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>   
            @enderror
        </div>

        <div class="mb-6">
            <label for="password2" class="inline-block text-lg mb-2">
                Confirm Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation">
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>   
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Sign Up
            </button>
        </div>

        <div class="mt-8">
            <p>
                Already have an account?
                <a href="{{route('auth.login')}}" class="text-laravel">Login</a>
            </p>
        </div>
    </form>
    </x-card>
</x-layout>