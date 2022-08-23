@extends('layout')

@section('content')

@include('partials._hero')

@include('partials._search_form')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @foreach ($jobs as $job)
        <!-- Item 1 -->
    <div class="bg-gray-50 border border-gray-200 rounded p-6">
        <div class="flex">
            <img
                class="hidden w-48 mr-6 md:block"
                src="{{ asset('images/larajobs-logo.svg') }}"
                alt=""
            />
            <div>
                <h3 class="text-2xl">
                    <a href="jobs/{{$job->id}}">{{ $job->title }}</a>
                </h3>
                <div class="text-xl font-bold mb-4">{{ $job->company }}</div>
                <ul class="flex">
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">{{ $job->tags }}</a>
                    </li>
                </ul>
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $job->location }}
                </div>
            </div>
        </div>
    </div>

    @empty($jobs)
    <h3>No Jobs Available</h3>    
    @endempty

    @endforeach
</div>
@endsection