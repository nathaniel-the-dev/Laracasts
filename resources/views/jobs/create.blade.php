<x-layout>
    <h1 class="mb-1 text-3xl font-semibold">Create a New Job</h1>
    <p class="text-gray-600">We just need a few details from your side.</p>

    <form class="mt-12 max-w-xl" action="/jobs" method="POST" validate>
        @csrf

        <div class="space-y-6">
            <x-form-control label="Title" name="title">
                <input type="text" placeholder="eg. CEO" name="title" id="title"
                    class="rounded border border-gray-200" value="{{ old('title') }}" />
            </x-form-control>

            <x-form-control label="Description" name="description">
                <textarea name="description" id="description" rows="5" class="resize-none rounded border border-gray-200">{{ old('description') }}</textarea>
            </x-form-control>

            <x-form-control label="Salary" name="salary">
                <input type="number" placeholder="eg. 100000" name="salary" id="salary"
                    class="rounded border border-gray-200" value="{{ old('salary') }}" />
            </x-form-control>
        </div>

        <div class="mt-8 flex items-center justify-end gap-4">
            <x-button type="submit">Save</x-button>
            <x-button to="/jobs" variant="secondary">Cancel</x-button>
        </div>
    </form>

    <x-slot:scripts>
        @vite(['resources/js/validation.js'])
    </x-slot:scripts>
</x-layout>
