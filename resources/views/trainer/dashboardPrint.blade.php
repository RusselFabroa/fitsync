<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

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

.container {
    column-count: 3;
}

.column {
    display: inline-block;
    width: 100%;
    margin-bottom: 20px;
}

.column span {
    display: block;
}

.name,
.title {
    font-weight: bold;
}

.begin,
.end {
    font-style: italic;
}
</style>


</head>

<body class="font-sans antialiased pb-24">
        

      <section class="mx-5">



      
<!-- Client Table -->
<div class="mt-3 mx-4 border border-gray-500 p-3">
 
  @if ($class_first != null)
    
    <div class="container">
      <div class="column">
          <span class="name">Class Name: {{$class_first->class_title}}</span>
          <span class="title">Description: {{$class_first->class_description}} </span>
      </div>
      <div class="column">
          <span class="start">Start Date: {{$class_first->class_start_date}} </span>
          <span class="end">End Date: {{$class_first->class_end_date}} </span>
      </div>
      <div class="column">
          <span class="begin">Start Time: {{$class_first->class_start_time}}</span>
          <span class="end">End Time: {{$class_first->class_end_time}}</span>
      </div>
  </div>
  @else
    <h2 class="text-center italic font-bold">No data</h2>
  
  @endif
  

  {{-- <tr>
    <td>sadasd</td>
    <td>sadasd</td>
    <td>sadasd</td>
  </tr> --}}
  
    {{-- <div class="d-flex mb-1">
      <h1 class="text-md font-bold ">Class Name: Sample</h1>
      <p class="text-md">Class Description: sadasd</p>
    </div> --}}
 
    <table class="styled-table font-poppins">
      <thead>
          <tr class="">
              <th class="">Attendees</th>
              <th class="">Contact</th>
              <th class="">Date Enrolled</th>
              <th class="">Status</th>          
              

          </tr>
      </thead>
      <tbody>
          
        @foreach ($class_data as $item)
              <tr class="py-0">
                  <td class="py-0">
                    {{-- <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADWUlEQVR4nO2WXUgUURTHx6Sij5eo8EUhql17CmQjP8jYe9dQGWfGisWUIqweKnrMB0PJelL0oTBpYyGEapcsUEJ3RUFtZtPK1zALIj8gH6Iv0zuS6Yk7m6njbrvrjDNb7IE/O8w9d+/vN2cHlmESlahE6VZZWVmbEEKlGOPHGOPXCKEpjDEsxOFw2Jl4LbvdfhwhNLoUWB2EUC8Tj4Uxvv43cJXEG4RQHcY4hYmHQghVRguvyiRC6Jip8Bjjgxjj2VUK0Gn8xBgfMU0AIdSzWvglEqM2m2294fAOhyMjWshyZx40V+XD+3us8hmix2m4AEKoJhrokfssgJ9bFu+1AnX/XTMEev/2pNXQ6qgmMWiGwFikJx0p3sVJjBgugDEm9PBYodXBwRd52gwB0EsAYwwJgVgKPBa24mS2rNcEKk/nEPBaCxmjCrzW8TlPOjRezl8Gc7vcAq5yS1jYUOu3KvJh3psO4LGOGSoAXusKQArnOhNeIOy612q4QKEi0cHOa/0JgY+do/DgsRYYJvBHxFc0rFnAzw0ZDr4owLm1T4BzmSfg5/M0C3Rw2DQBRcJX1KNBoM9UeEWgnd0Nfu7jKn46n6CT28vEQ0E7fxj83OeY4P1sLhNPBV2sBVpzIsO3ZkPcPHl1gYsBaN4B8Gg/wBME0FEYDL2m9+iaizH+j1tMAlGEideCf1GgWJq2pVZ3D2456/0xWL9rJhI87aG9aVVdL/m+qQzTwHlxOlOQ5IAgyZBa1QVJJW7IOV81G0nAfqFylvamVXcD3cuLssgHpg8YBl7gg428RO4IIpmnADSHHo5C0gm3IlF7pSAsPF2jPbQ3t2Vc2RuUIHO8RJqcr2DDmsJzA99TeEl+tnDw0lhqA0G4EjccvXQRntZa4UvjZiX0mt5bWLfW9a/YLwSnITnFyZ1rAl/84tt2QSTDoQ5WIsqQXj8Ayb8nESrJpW7Y1/Bc6Q33PbxEhljp6zZ96QGSeIl0hoVfEtT2ATJrHsCecw2wtaxJCb3OrPEAapuIuF9QQtp15RdEciq6g/UMKdMF3tkCybxE3pkg8PYqwDrNArwk5xkPLwffh4CMNAsIErlploAgkhvaJyDK/aYJSHJAhwnIEyYKTOggQGbMEyAzmgUSlaj/vH4B/ih/Ifxu3R8AAAAASUVORK5CYII="> --}}
                    {{$item->user->name}}
                
                  </td>
                  <td class="py-0">
                   
                    {{$item->user->contact_number}}
                  </td>
                  <td class="py-0">{{$item->created_at}}</td>
                  <td class="py-0">{{$item->status}}</td>
                 
              </tr>
              @endforeach
         
      </tbody>
  </table>



      </section>
</body>

</html>