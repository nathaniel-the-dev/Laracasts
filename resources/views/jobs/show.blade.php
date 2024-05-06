<x-layout>
    <div class="mb-8">
        <x-button to="/jobs" variant="secondary"><i class="fas fa-left-arrow"></i> Back to Jobs</x-button>
    </div>

    <header class="flex items-center justify-between gap-4">
        <h2 class="mb-2 text-3xl font-semibold">{{ $job->title }}</h2>

        <div class="flex gap-6">
            @can('job.edit', $job)
                <x-button to="/jobs/{{ $job->id }}/edit">Edit</x-button>
            @endcan
            @auth()
                <form action="/jobs/{{ $job->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button variant="danger">Delete</x-button>
                </form>
            @endauth
        </div>
    </header>

    <p class="mb-8 text-gray-600">${{ $job->salary }}</p>

    <p>{{ $job->description }}</p>
</x-layout>
