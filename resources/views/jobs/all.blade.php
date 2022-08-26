<x-layout :title="$title">

@include('partials._hero')

@include('partials._search_form')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @forelse ($jobs as $job)
        {{-- Job Card --}}
    <x-job-card :job="$job"  />
    @empty
    <h3 class="my-6 text-3xl font-semibold text-gray-400">No Jobs Available</h3>    
    @endforelse
</div>

{{-- Pagination --}}
<div class="my-8 mx-6">
    {{ $jobs->links() }}
</div>

</x-layout>