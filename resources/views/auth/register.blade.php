<x-layout>
    <h1 class="mb-1 text-center text-3xl font-semibold">Register</h1>
    <p class="text-center text-gray-600">Create your free account.</p>

    <form class="mx-auto mt-12 max-w-xl" action="/register" method="POST">
        @csrf

        <div class="space-y-6">
            <div class="flex gap-4">
                <x-form-control label="First Name" name="first_name" class="grow">
                    <input type="text" name="first_name" id="first_name" class="rounded border border-gray-200" />
                </x-form-control>
                <x-form-control label="Last Name" name="last_name" class="grow">
                    <input type="text" name="last_name" id="last_name" class="rounded border border-gray-200" />
                </x-form-control>
            </div>

            <x-form-control label="Email" name="email_address">
                <input type="email" name="email" id="email_address" class="rounded border border-gray-200" />
            </x-form-control>

            <x-form-control label="Password" name="password">
                <input type="password" name="password" id="password" class="rounded border border-gray-200" />
            </x-form-control>

            <x-form-control label="Confirm Password" name="password_confirmation">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="rounded border border-gray-200" />
            </x-form-control>

        </div>

        <div class="mt-8 flex items-center justify-end gap-4">
            <a href="{{route('login')}}" class="text-sm hover:underline">Already have an account?</a>
            <x-button type="submit">Register</x-button>
        </div>
    </form>
</x-layout>
