@extends('layouts.superadmin-app')

@section('content')
<style>
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        width: 100%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        text-align: center;
    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: center;
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }
</style>

<div class="font-montserrat bg-white pr-20 pl-20 pt-16">
    <a type="button" href="{{ route('registerMember.create') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 font-bold">Add
        Trainer
    </a>
    <h2 class="pt-4 text-2xl font-bold mb-4">Trainers and Members</h2>

    @if (count($member) > 0)
    <table class="styled-table">
        <thead>
            <tr class="">
                <th class="">User ID</th>
                <th class="">Name</th>
                <th class="">Email</th>
                <th class="">Age</th>
                <th class="">Address</th>
                <th class="">Occupation</th>
                <th class="">Gender</th>
                <th class="">Role</th>
                <th class="">Membership</th>
                <th class="">Date Active</th>
                <th class="">Availability</th>
                <th class="">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($member as $data)
            <tr class="">
                <td class="">{{ $data->id }}</td>
                <td class="">{{ $data->name }}</td>
                <td class="">{{ $data->email }}</td>
                <td class="">{{ $data->age }}</td>
                <td class="">{{ $data->address }}</td>
                <td class="">{{ $data->occupation }}</td>
                <td class="">{{ $data->gender }}</td>
                <td class="">{{ $data->role }}</td>
                <td class="">{{ $data->membership }}</td>
                <td class="">{{ \Carbon\Carbon::parse($data->active_date)->format('F j, Y') }}</td>

                <td class="">{{ $data->availability }}</td>
                <td class="flex">
                    <a href="{{ route('registerMember.edit', $data->id) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</a>
                    <br><br>
                    <form action="{{ route('registerMember.destroy', $data->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="sudatat" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No data records found.</p>
    @endif
</div>
@endsection