<x-layout :title="$title">
    <x-card class="p-10
    max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Post a new Job
                </h2>
                <p class="mb-4">Post a job to find a developer</p>
            </header>
        
            <form action="{{route('jobs.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="Example: Senior Laravel Developer" value="{{old('title')}}">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" placeholder="Wayne Enterprise, Marvel Studios" value="{{old('company')}}">

                    @error('company')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror

                </div>
        
                <div class="mb-6">
                    <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" placeholder="Example: Remote, Boston MA, etc" value="{{old('location')}}"">
                    @error('location')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" placeholder="example@email.com" value="{{old('email')}}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <label for="website" class="inline-block text-lg mb-2">
                        Website/Application URL
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" placeholder="batman.com" value="{{old('website')}}">
                    @error('website')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Tags (Max 5 tags)
                    </label>
                    {{-- <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" placeholder="Example: Laravel, Backend, Postgres, etc" value="{{old('tags')}}"> --}}
                    <x-tags-input :tagsValue="old('tags')"/>
                    @error('tags')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">
                        Company Logo (Optional)
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo">
                    <small class="text-slate-400 font-semibold">A square image of your logo would be great! (Max file size: 5mb | .jpg, .png, .jpeg only)</small>
                    @error('logo')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">
                        Job Description
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Include tasks, requirements, salary, etc">{{old('description')}}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Create Gig
                    </button>
                    <a href="{{route('jobs.index')}}" class="text-black ml-4"> Back </a>
                </div>
            </form>
    </x-card>
</x-template>

