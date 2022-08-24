<x-layout>

@include('partials._hero')

@include('partials._search_form')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @foreach ($jobs as $job)
    {{-- Job Card --}}
    <x-job-card :job="$job"  />

    @empty($jobs)
    <h3>No Jobs Available</h3>    
    @endempty

    @endforeach
</div>
<div class="my-8 mx-14">
    {{ $jobs->links() }}
</div>
</x-layout>