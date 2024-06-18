@extends('layouts.user-app')

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
<div class="font-poppins bg-white pr-20 pl-20 pt-16">
    <h2 class="text-2xl font-bold mb-4">Pending Classes</h2>
    

    @if (count($classbookings) > 0)
    <table class="styled-table">
        <thead class="">
            <tr class="font-poppins font-normal">
                <th class="">Workout Class</th>
                <th class="">Description</th>
                <th class="">Exercises</th>
                <th class="">Class Date</th>
                <th class="">Class Time</th>
                <th class="">Is Reserved?</th>
                <th class="">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classbookings as $data)
            <tr class="font-poppins">
                <td class="">{{ $data->class_title }}</td>
                <td class="">{{ $data->class_description }}</td>
                <td> <!-- Display exercises -->
                    @foreach ($select_exercises as $exercise)
                        {{ $exercise->exercise_name }} <!-- Assuming each exercise has a 'name' property -->
                        <br>
                    @endforeach
                </td>
                <td class="">
                    {{ Carbon\Carbon::parse($data->class_start_date)->format('F j, Y') }}
                    -
                    {{ Carbon\Carbon::parse($data->class_end_date)->format('F j, Y') }}
                </td>

                <td class="">{{ $data->class_start_time }} - {{ $data->class_end_time }}</td>
                <td class="">Yes</td>
                <td class="">
                    <form action="{{ route('user-classes.userdestroy', ['id' => $data->cb_id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-2 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 mb-2">
                            Cancel
                        </button>
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