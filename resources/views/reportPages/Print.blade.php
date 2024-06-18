
<style>
body{
    font-size: 0.9rem;
}
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



<div class="px-5 mt-8 font-montserrat bg-white text-center">
    

  <div class="flex h-screen items-center justify-center">
    <div class="text-center">
      <h1 class="text-3xl font-bold mb-4">Sales Report</h1>
      <p class="text-lg">FITSYNC | CF MINDORO</p>
    </div>
  </div>
  
    {{-- <a type="button" href="{{ route('classSchedule.create') }}"
        class="font-poppins text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 font-bold">Print
        Schedule
    </a> --}}
    {{-- <h1>Search: {{$search}} </h1> 
    <h1>Status: {{$status}}</h1>
    <h1>Date: {{$date}} </h1> --}}
   

   
    <table class="styled-table font-poppins">
        <thead>
            <tr class="">
                <th class="">User Name</th>
                <th class="">Membership Title</th>
                <th class="">Membership Fee</th>          
                <th class="">Method of Payment </th>
                <th class="">Membership Date</th>
                <th class="">Status</th>

            </tr>
        </thead>
        <tbody>
            
                @foreach ($membership_data as $item)
                <tr class="py-0">
                    <td class="py-0">{{$item->name}}</td>
                    <td class="py-0">{{$item->membership_title}}</td>
                    <td class="py-0">{{$item->membership_fee}}</td>
                    <td class="py-0">{{$item->membership_mop}}</td>
                    <td class="py-0">{{$item->membership_payment_date}}</td>
                    <td class="py-0">{{$item->status}}</td>
                </tr>
                @endforeach
           
        </tbody>
    </table>
</div>
</div>
