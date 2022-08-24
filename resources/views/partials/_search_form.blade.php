<!-- Search -->
<form action="{{route('jobs.index')}}" method="GET">
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-4 left-3">
            <i
                class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
            ></i>
        </div>
        <input
            type="search"
            name="search"
            class="h-14 w-full pl-10 pr-32 rounded-lg z-0 focus:shadow focus:outline-none"
            placeholder="Search Jobs by Company Name, Job Title, Tags, or Location..." value="{{ request('search') }}" spellcheck="false"
        />
        <div class="absolute top-2 right-2">
            <button
                type="submit"
                class="h-10 w-20 text-white rounded-lg bg-indigo-500 hover:bg-indigo-600"
            >
                Search
            </button>
        </div>
    </div>
</form>