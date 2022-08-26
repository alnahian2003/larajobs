<x-layout :title="$title">
    <x-card class="p-10
    max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit Job
                </h2>
                <p class="mb-4">Edit your existing job</p>
            </header>
        
            <form action="{{route('jobs.update', $job->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="Example: Senior Laravel Developer" value="{{$job->title}}">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" placeholder="Wayne Enterprise, Marvel Studios" value="{{$job->company}}">

                    @error('company')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror

                </div>
        
                <div class="mb-6">
                    <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" placeholder="Example: Remote, Boston MA, etc" value="{{$job->location}}"">
                    @error('location')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" placeholder="example@email.com" value="{{$job->email}}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <label for="website" class="inline-block text-lg mb-2">
                        Website/Application URL
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" placeholder="batman.com" value="{{$job->website}}">
                    @error('website')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Tags (Max 5 tags)
                    </label>
                    {{-- <x-add-tags/> --}}
                    {{-- <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" placeholder="Example: Laravel, Backend, Postgres, etc" value="{{$job->tags}}"> --}}
                    <x-tags-input :tagsValue="$job->tags" />
                    
                    @error('tags')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">
                        Company Logo (Optional)
                    </label>
                    <img class="max-w-xs mb-4 md:block mx-auto object-cover aspect-square" src="{{ $job->logo ? asset('storage/'. $job->logo) : asset('images/larajobs-logo.svg') }}" alt="{{$job->company}}">
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
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Include tasks, requirements, salary, etc">{{$job->description}}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Confirm Edit
                    </button>
                </div>
            </form>
    </x-card>
</x-template>

