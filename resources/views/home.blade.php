<x-layout>

    <div class="grid grid-cols-2 justify-items-stretch gap-8">
        <div class="py-20">
            <h1 class="mb-6 text-6xl font-semibold">Find your <span
                    class="bg-gradient-to-r from-blue-400 to-blue-500 bg-clip-text text-transparent">dream job</span>
                today</h1>
            <p class="text-gray-600">Browse through our extensive collection of job listings and find your dream gig.</p>

            <p class="mt-8">
                <x-button to="/jobs">Explore Jobs</x-button>
            </p>
        </div>


        <img class="h-[70vh] object-cover" src="{{ Vite::asset('resources/images/hero-image.jpg') }}" alt>
    </div>

    {{-- <ul class="mt-6 flex flex-col gap-4">
        @foreach ($jobs as $job)
            <li class="rounded bg-gray-50 px-6 py-4">{{ $job['title'] }}
                <span class="text-sm text-gray-600">(${{ $job['salary'] }}/year)</span>
            </li>
        @endforeach
    </ul> --}}
</x-layout>
