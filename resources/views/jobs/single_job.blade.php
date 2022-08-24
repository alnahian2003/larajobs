<x-layout>

@include('partials._search_form')

<a href="/jobs" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card class="p-10 max-w-3xl mx-auto">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{asset('images/larajobs-logo.svg')}}"
                            alt="{{ $job->title }}"
                        />

                        <h3 class="text-2xl mb-2">{{ $job->title }}</h3>
                        <div class="text-xl font-bold mb-4">{{ $job->company }}</div>
                        <x-tags :allTags="$job->tags"/>
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{ $job->location }}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-8">
                                <p class="mb-8">{{ $job->description }}</p>

                                <a
                                    href="mailto:{{ $job->email }}"
                                    class="block max-w-xs mx-auto px-8 bg-laravel text-white py-3 rounded-md hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >

                                <a
                                    href="{{ $job->website }}"
                                    target="_blank"
                                    class="block max-w-xs mx-auto px-8
                                    rounded-md bg-slate-800 text-white py-3 hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
</x-layout>