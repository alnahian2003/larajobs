<x-layout :title="$title">
    <x-card class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Log In
            </h2>
            <p class="mb-4">Log in to manage your account</p>
        </header>

        <form action="{{route('auth.login')}}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email">
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
                @error('password')
                <p class="text-red-500 text-xs mt-1">
                    {{$message}}
                </p> 
                @enderror
            </div>

            <div class="flex items-center mb-6">
                <input id="default-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-laravel" name="remember" @if(old('remember'))checked @endif>
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-700">Remember me?</label>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Sign In
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="{{route('auth.register_form')}}" class="text-laravel">Register</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>