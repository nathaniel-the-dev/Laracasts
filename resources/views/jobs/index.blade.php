<x-layout>
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-semibold">Jobs</h1>
    </div>

    <div class="my-6 grid grid-cols-2 gap-6">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}"
                class="h-full rounded bg-gray-50 px-6 py-4 transition-colors hover:bg-blue-100">
                <span class="text-sm text-blue-500">{{ $job['company']['name'] }}</span>

                <h3 class="font-semibold">{{ $job['title'] }} </h3>

                <p class="text-sm text-gray-600">(${{ $job['salary'] }}/year)</p>
            </a>
        @endforeach
    </div>

    <div class="">
        {{ $jobs->links() }}
    </div>
</x-layout>
