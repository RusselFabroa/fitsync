@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10">
    <a type="button" href="{{ route('bmi.create') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Add BMI
    </a>
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Client's BMI Records</h2>

        @if (count($bmi) > 0)
        <table class="w-full border border-collapse border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-2 border">User ID</th>
                    <th class="p-2 border">Height</th>
                    <th class="p-2 border">Weight</th>
                    <th class="p-2 border">Result</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bmi as $data)
                <tr>
                    <td class="p-2 border">{{ $data->user_id }}</td>
                    <td class="p-2 border">{{ $data->bmi_height }}</td>
                    <td class="p-2 border">{{ $data->bmi_weight }}</td>
                    <td class="p-2 border">{{ $data->bmi_result }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('bmi.edit', $data->bmi_id) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit
                            BMI</a>
                        <form action="{{ route('bmi.destroy', $data->bmi_id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="sudatat" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 mb-2">Delete</button>
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
</div>
@endsection