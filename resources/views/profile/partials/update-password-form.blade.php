<section>
    <header class="text-lg font-medium text-gray-900">
        <h2>{{ __('Update Password') }}</h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700">
                {{ __('Current Password') }}
            </label>
            <input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300"
                autocomplete="current-password" />
            <div class="text-red-500 mt-2">
                <!-- Display password validation errors here if needed -->
            </div>
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-700">
                {{ __('New Password') }}
            </label>
            <input id="update_password_password" name="password" type="password"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300"
                autocomplete="new-password" />
            <div class="text-red-500 mt-2">
                <!-- Display password validation errors here if needed -->
            </div>
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700">
                {{ __('Confirm Password') }}
            </label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300"
                autocomplete="new-password" />
            <div class="text-red-500 mt-2">
                <!-- Display password validation errors here if needed -->
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
            <p class="text-sm text-gray-600">
                {{ __('Saved.') }}
            </p>
            @endif
        </div>
    </form>
</section>