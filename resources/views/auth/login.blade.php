<x-layout>
    <h1 class="mb-1 text-center text-3xl font-semibold">Login</h1>
    <p class="text-center text-gray-600">Log into your account.</p>

    <form class="mx-auto mt-12 max-w-lg" action="/login" method="POST">
        @csrf

        <div class="space-y-6">
            <x-form-control label="Email" name="email">
                <input type="email" name="email" id="email" class="rounded border border-gray-200" />
            </x-form-control>

            <x-form-control label="Password" name="password">
                <input type="password" name="password" id="password" class="rounded border border-gray-200" />
            </x-form-control>
        </div>

        <div class="mt-8 flex items-center justify-end gap-4">
            <a href="/register" class="text-sm hover:underline">Not yet registered?</a>
            <x-button type="submit">Login</x-button>
        </div>
    </form>
</x-layout>
