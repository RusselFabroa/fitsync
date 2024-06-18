<script src="{{ asset('js/auth.js') }}"></script>
        <section>
    <header class="text-lg font-medium text-gray-900">
        <h2>{{ __('Membership Subscription Renewal') }}</h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Renew your membership subscription.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update-membership') }}" class="mt-6 space-y-6"  enctype="multipart/form-data"> 
        @csrf
        @method('patch')

      

        <div>
        <div class="mb-4">
            <label for="membership_title" class="block text-gray-600 text-sm font-medium">Membership</label>
            <p class="text-xs font-poppins mb-1">Please indicate the membership you require</p>
            <select name="membership_title" id="membership_title" class="mt-1 p-2 w-full border rounded">
            <option value="{{ old('membership_title') }}" selected>
                Select a membership...
                </option>
            <option value="With Mindoro ID">
            ₱350.00 with Mindoro ID
                </option>
                <option value="Without Mindoro ID">
                ₱450.00 Without Mindoro ID
                </option>
                <option value="1 Month">
                ₱2,500.00 1 Month
                </option>
                <option value="6 Months">
                ₱14,100.00 6 Months
                </option>
                <option value="12 Months">
                ₱24,000.00 - 12 Months
                </option>
            </select>
            @error('membership_title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        {{-- <div class="mb-4">
            <label for="membership_mop" class="block text-sm font-medium text-gray-700">Mode of Payment</label>
            <input id="membership_mop" type="text" name="membership_mop" value="Gcash" required autofocus autocomplete="membership_mop" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
            @error('membership_mop')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div> --}}

          <!-- Email -->
          <div class="mb-4">
            <label for="membership_mop" class="block text-sm font-medium text-gray-700">Mode of Payment</label>
            <select id="membership_mop" onchange="mop_change()" type="text" name="membership_mop" value="" required autocomplete="membership_mop" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" >
            @error('membership_mop')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <option value="gcash" selected>Gcash</option>
            <option value="cash">Cash/Over-the-counter</option>
            <option value="bpi">BPI/Gcash to BPI</option>
            </select>
        </div>
        <h5 class="italic text-blue-500" id="payment-alert">Please screenshot any of this QR code and upload it to your GCash app to make a payment.</h5>
        <div class="mb-4">
            <img src="{{ asset('/images/gcash-lazaro.jpg') }}" id="gcash_logo" alt="Logo" class="block py-2 text-white">
        </div>
        <div class="mb-4">
            <img src="{{ asset('/images/BPI.jpg') }}" id="bpi_logo" alt="Logo" class="block py-2 text-white">
        </div>

        {{-- <div class="mb-4">
        <img src="{{ asset('/images/gcash-lazaro.jpg') }}" alt="Logo" class="block py-2 text-white">
</div> --}}

   <!-- Email -->
   <div class="mb-4">
    <input id="membership_payment_date" type="hidden" name="membership_payment_date" value="{{ \Carbon\Carbon::now()->toDateString() }}" required autofocus autocomplete="membership_payment_date" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
    @error('membership_payment_date')
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>


   <!-- Email -->
   <div class="mb-4">
            <input id="membership_payment_status" type="hidden" name="membership_payment_status" value="Gcash" required autofocus autocomplete="membership_payment_status" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
            @error('membership_payment_status')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

             <!-- Email -->
     <div class="mb-4" class="payment_receipt2">
            <label for="payment_receipt" class="block text-sm font-medium text-gray-700">Payment Receipt</label>
            <input id="payment_receipt" type="file" name="payment_receipt" value="{{ old('payment_receipt') }}" required autofocus autocomplete="payment_receipt" class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" readonly>
            @error('payment_receipt')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
     </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                {{ __('Save') }}
            </button>

        </div>
    </form>
</section>