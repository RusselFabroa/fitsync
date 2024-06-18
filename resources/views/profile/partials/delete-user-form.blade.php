<section class="space-y-6">
    <header class="text-lg font-medium text-gray-900">
        <h2>Delete Account</h2>
        <p class="mt-1 text-sm text-gray-600">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
            your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <button onclick="openModal('confirm-user-deletion')"
        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:border-blue-300">
        Delete Account
    </button>

    <div id="confirm-user-deletion" class="hidden fixed inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900">
                        Are you sure you want to delete your account?
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Please
                        enter your password to confirm you would like to permanently delete your account.
                    </p>

                    <div class="mt-6">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password"
                            class="mt-1 block w-3/4 px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
                            placeholder="Password" />

                        <div class="text-red-500 mt-2">
                            <!-- Display password validation errors here if needed -->
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="button" onclick="closeModal('confirm-user-deletion')"
                            class="text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800">Cancel</button>
                        <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded-md ml-3 hover:bg-red-600 focus:outline-none focus:ring focus:border-blue-300">Delete
                            Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}

function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}
</script>