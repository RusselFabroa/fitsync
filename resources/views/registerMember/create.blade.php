@extends('layouts.superadmin-app')

@section('content')
<div class="font-montserrat bg-white pr-20 pl-20 pt-16">

    <h2 class=" text-2xl font-bold mb-4">Add Trainer</h2>

    <form action="{{ route('registerMember.store') }}" method="POST">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mb-4">
            <label for="name" class="pt-4 block text-gray-600 text-sm font-medium">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 p-2 w-full border rounded">
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-600 text-sm font-medium">Email</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}" class="mt-1 p-2 w-full border rounded">
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-600 text-sm font-medium">Password</label>
            <input type="text" name="password" id="password" value="{{ old('password') }}" class="mt-1 p-2 w-full border rounded">
            @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-600 text-sm font-medium">Confirm
                Password</label>
            <input type="text" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="mt-1 p-2 w-full border rounded">
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="age" class="block text-gray-600 text-sm font-medium">Age</label>
            <input type="text" name="age" id="age" value="{{ old('age') }}" class="mt-1 p-2 w-full border rounded">
            @error('age')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="address" class="block text-gray-600 text-sm font-medium">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}" class="mt-1 p-2 w-full border rounded">
            @error('address')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="occupation" class="block text-gray-600 text-sm font-medium">Occupation</label>
            <input type="text" name="occupation" id="occupation" value="{{ old('occupation') }}" class="mt-1 p-2 w-full border rounded">
            @error('occupation')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="gender" class="block text-gray-600 text-sm font-medium">Gender</label>
            <select id="gender" name="gender" id="gender" value="{{ old('gender') }}" class="mt-1 p-2 w-full border rounded">
                <option selected>Select gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Rather Not Say">Rather Not Say</option>
            </select>
            @error('gender')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block text-gray-600 text-sm font-medium">Role</label>
            <select id="role" name="role" id="role" value="{{ old('role') }}" class="mt-1 p-2 w-full border rounded">
                <option selected>Select role</option>
                <option value="trainer">Trainer</option>
            </select>
            @error('role')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="active_date" class="block text-gray-600 text-sm font-medium">Date Active</label>
            <input type="date" name="active_date" id="active_date" value="{{ old('active_date') }}" class="mt-1 p-2 w-full border rounded">
            @error('active_date')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="membership" class="block text-gray-600 text-sm font-medium">Membership</label>
            <select id="membership" name="membership" id="membership" value="{{ old('membership') }}" class="mt-1 p-2 w-full border rounded">
                <option selected>Select membership</option>
                <option value="Subscribed">Subscribed</option>
                <option value="Not Subscribed">Not Subscribed</option>
            </select>
            @error('membership')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- 
        <div class="mb-4">
            <label for="image" class="block text-gray-600 text-sm font-medium">Image</label>
            <input type="file" name="image" id="image" value="{{ old('image') }}"
                class="mt-1 p-2 w-full border rounded">
            @error('image')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div> -->

        <div class="mt-6">
            <button type="submit" class="mb-10 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection