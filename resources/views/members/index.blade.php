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
<div class="px-60 mt-8 font-montserrat bg-white">

    <h2 class="pt-4 text-2xl font-poppins font-bold mb-4">Members</h2>

    <table class="styled-table font-poppins">
        <thead>
            <tr class="">
                <th class="">Name</th>
                <th class="">Membership</th>
                <th class="">Mode of Payment</th>
                <th class="">Payment Receipt</th>
                <th class="">Status</th>
                <th class="">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $data)
            <tr>
                <td class="">{{ $data->user_name }}</td>
                <td class="">{{ $data->membership_title }} Membership Subscription</td>
                <td class="">{{ $data->membership_mop }}</td>
                <td class=""><img src="{{ asset('images/payment_receipt/' . $data->payment_receipt) }}" alt="Payment Receipt" class="h-80 grid justify-center"></td>
                <td class="">{{ $data->status }}</td>
                <td class="">
                    <a href="{{ route('members.edit', $data->membership_id) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection