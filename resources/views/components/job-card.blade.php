@props(['job'])
<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block object-cover aspect-square"
            src="{{ $job->logo ? asset('storage/'. $job->logo) : asset('images/larajobs-logo.svg') }}"
            alt=""
        />
        <div>
            <h3 class="text-2xl text-laravel font-bold">
                <a href="jobs/{{$job->id}}">{{ $job->title }}</a>
            </h3>
            <div class="text-xl text-slate-500 font-bold mb-4">
                <i class="fa-solid fa-building text-slate-700"></i> {{ $job->company }}
            </div>

            <x-tags :allTags="$job->tags"/>

            <div class="text-lg mt-4 space-x-6">
                <i class="fa-solid fa-location-dot text-slate-700"></i> {{ $job->location }}
                <i class="fa-solid fa-clock text-slate-700"></i> {{ $job->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
</x-card>