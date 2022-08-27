<x-layout :title="$title">

    <x-card>
        <header>
            <h1 class="text-4xl text-center text-slate-800 font-bold my-6">
                Manage Your Jobs
            </h1>
        </header>

        <table class="min-w-full table-auto rounded-sm">
            <tbody>
                @forelse ($jobs as $job)
                    {{-- Job Card --}}
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 flex flex-col border-t border-b text-gray-500 border-gray-300 text-lg">
                            <a class="text-laravel font-semibold" href="{{route('jobs.show', $job->id)}}">
                                {{ $job->title }}
                            </a>
                            <p>{{str()->limit($job->description, 30)}}</p>
                            <small>Created {{$job->created_at->diffForHumans()}}</small>
                        </td>
                        <td class="px-4 py-8 border-t text-center border-b border-gray-300 text-lg">
                            <a href="{{route('jobs.edit', $job->id)}}" class="text-laravel px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                        </td>
                        <td class="px-4 py-8 text-center border-t border-b border-gray-300 text-lg">
                            <form action="{{route('jobs.destroy', $job->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">
                                    <i class="fa-solid fa-trash-can"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                <h3 class="my-6 text-3xl font-semibold text-gray-400">Create a Job First</h3>    
                @endforelse
            </tbody>
        </table>
    </x-card>
</x-layout>