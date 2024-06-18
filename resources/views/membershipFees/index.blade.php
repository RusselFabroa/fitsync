@extends('layouts.trainer-app')

@section('content')

<div class="font-montserrat bg-white pr-20 pl-20 pt-16">
    <a type="button" href="{{ route('membershipFees.create') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 font-bold">Add
        Membership
    </a>
    <h2 class="pt-4 text-2xl font-bold mb-4">Memberships</h2>

    <table class="w-full border border-collapse border-gray-300">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Membership Title</th>
                <th class="p-2 border">Mode of Payment</th>
                <th class="p-2 border">Payment Date</th>
                <th class="p-2 border">Payment Status</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($membershipFees as $data)
            <tr>
                <td class="p-2 border">{{ $data->user_name }}</td>
                <td class="p-2 border">{{ $data->membership_title }}</td>
                <td class="p-2 border">{{ $data->membership_mop }}</td>
                <td class="p-2 border">{{ \Carbon\Carbon::parse($data->membership_payment_date)->format('F j, Y') }}
                </td>

                <td class="p-2 border">{{ $data->membership_payment_status }}</td>
                <td class="p-2 border">
                    <a href="{{ route('membershipFees.edit', $data->membership_id) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</a>
                    <form action="{{ route('membershipFees.destroy', $data->membership_id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="sudatat" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 mb-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection