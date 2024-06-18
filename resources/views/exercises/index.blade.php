@extends('layouts.trainer-app')

@section('content')
<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    width: 100%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    text-align: center;
}

.styled-table thead tr {
    background-color: #1A5C34;
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
<div class="max-w-6xl mx-auto mt-10">
    <a type="button" href="{{ route('exercises.create') }}" class="font-poppins text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 font-bold">Add Exercise
    </a>
        <h2 class="pt-4 text-2xl font-poppins font-bold mb-4">List of Exercises</h2>

        @if (count($exercises) > 0)
        <table class="styled-table font-poppins">
            <thead>
                <tr class="">
                    <th class="">Exercise Name</th>
                    <th class="">Reps</th>
                    <th class="">Sets</th>
                    <th class="">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exercises as $data)
                <tr>
                    <td class="">{{ $data->exercise_name }}</td>
                    <td class="">{{ $data->exercise_reps }}</td>
                    <td class="">{{ $data->exercise_sets }}</td>
                    <td class="">
                        <a href="{{ route('exercises.edit', $data->exercise_id) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit
                            Schedule</a>
                        <form action="{{ route('exercises.destroy', $data->exercise_id) }}" method="POST" class="inline-block">
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
@endsection