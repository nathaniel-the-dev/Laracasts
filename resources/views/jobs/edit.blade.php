<x-layout>
    <h1 class="mb-1 text-3xl font-semibold">Edit Job - {{ $job->title }}</h1>
    <p class="text-gray-600">Update the details of your job posting.</p>

    <form class="mt-12 max-w-xl" action="/jobs/{{ $job->id }}" method="POST" novalidate>
        @csrf
        @method('PATCH')

        <div class="space-y-6">
            <div class="grid gap-0.5">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="rounded border border-gray-200"
                    value="{{ $job->title }}" />

                @error('title')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="grid gap-0.5">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="5" class="resize-none rounded border border-gray-200">{{ $job->description }}</textarea>
                @error('description')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="grid gap-0.5">
                <label for="salary">Salary</label>
                <input type="number" name="salary" id="salary" class="rounded border border-gray-200"
                    value="{{ $job->salary }}" />
                @error('salary')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-8 flex items-center justify-end gap-4">
            <x-button type="submit">Update</x-button>
            <x-button to="/jobs/{{ $job->id }}" variant="secondary">Cancel</x-button>
        </div>
    </form>

    <x-slot:scripts>
        @vite(['resources/js/validation.js'])
    </x-slot:scripts>
</x-layout>
