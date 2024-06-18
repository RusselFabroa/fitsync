<section>
    <header class="text-lg font-medium text-gray-900">
        <h2>{{ __('Profile Information') }}</h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

      

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                {{ __('Name') }}
                
            </label>
            <input id="name" name="name" type="text"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <div class="text-red-500 mt-2">
                <!-- Display name validation errors here if needed -->
            </div>
        </div>

        {{-- <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                {{ __('Name') }}
            </label>
            <input id="name" name="name" type="text"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <div class="text-red-500 mt-2">
                <!-- Display name validation errors here if needed -->
            </div>
        </div> --}}

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                {{ __('Email') }}
            </label>
            <input id="email" name="email" type="email"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300"
                value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <div class="text-red-500 mt-2">
                <!-- Display email validation errors here if needed -->
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
            <p class="text-sm text-gray-600">
                {{ __('Saved.') }}
            </p>
            @endif
        </div>
    </form>
</section>