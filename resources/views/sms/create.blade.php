@extends('layouts.trainer-app')

@section('content')
<div class="px-20 mt-8 font-poppins bg-white">

    <h2 class="pt-4 text-1xl font-poppins font-bold mb-4">Send Reminder through SMS Notification</h2>
   

    @if (session('success'))
       <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline"></span>{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
      <strong class="font-bold">Error!</strong>
      <span class="block sm:inline"></span>{{ session('error') }}</span>
  </div>
       
    @endif

<section>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Attendees</th>
                <th class="px-4 py-3">Membership Type</th>
                <th class="px-4 py-3">Contact Number</th>
                <th class="px-4 py-3">Address</th>
                <th class="px-4 py-3">Action</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach ($users as $item)
              <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADWUlEQVR4nO2WXUgUURTHx6Sij5eo8EUhql17CmQjP8jYe9dQGWfGisWUIqweKnrMB0PJelL0oTBpYyGEapcsUEJ3RUFtZtPK1zALIj8gH6Iv0zuS6Yk7m6njbrvrjDNb7IE/O8w9d+/vN2cHlmESlahE6VZZWVmbEEKlGOPHGOPXCKEpjDEsxOFw2Jl4LbvdfhwhNLoUWB2EUC8Tj4Uxvv43cJXEG4RQHcY4hYmHQghVRguvyiRC6Jip8Bjjgxjj2VUK0Gn8xBgfMU0AIdSzWvglEqM2m2294fAOhyMjWshyZx40V+XD+3us8hmix2m4AEKoJhrokfssgJ9bFu+1AnX/XTMEev/2pNXQ6qgmMWiGwFikJx0p3sVJjBgugDEm9PBYodXBwRd52gwB0EsAYwwJgVgKPBa24mS2rNcEKk/nEPBaCxmjCrzW8TlPOjRezl8Gc7vcAq5yS1jYUOu3KvJh3psO4LGOGSoAXusKQArnOhNeIOy612q4QKEi0cHOa/0JgY+do/DgsRYYJvBHxFc0rFnAzw0ZDr4owLm1T4BzmSfg5/M0C3Rw2DQBRcJX1KNBoM9UeEWgnd0Nfu7jKn46n6CT28vEQ0E7fxj83OeY4P1sLhNPBV2sBVpzIsO3ZkPcPHl1gYsBaN4B8Gg/wBME0FEYDL2m9+iaizH+j1tMAlGEideCf1GgWJq2pVZ3D2456/0xWL9rJhI87aG9aVVdL/m+qQzTwHlxOlOQ5IAgyZBa1QVJJW7IOV81G0nAfqFylvamVXcD3cuLssgHpg8YBl7gg428RO4IIpmnADSHHo5C0gm3IlF7pSAsPF2jPbQ3t2Vc2RuUIHO8RJqcr2DDmsJzA99TeEl+tnDw0lhqA0G4EjccvXQRntZa4UvjZiX0mt5bWLfW9a/YLwSnITnFyZ1rAl/84tt2QSTDoQ5WIsqQXj8Ayb8nESrJpW7Y1/Bc6Q33PbxEhljp6zZ96QGSeIl0hoVfEtT2ATJrHsCecw2wtaxJCb3OrPEAapuIuF9QQtp15RdEciq6g/UMKdMF3tkCybxE3pkg8PYqwDrNArwk5xkPLwffh4CMNAsIErlploAgkhvaJyDK/aYJSHJAhwnIEyYKTOggQGbMEyAzmgUSlaj/vH4B/ih/Ifxu3R8AAAAASUVORK5CYII=">
                      {{-- <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" /> --}}
                      <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                      <p class="font-semibold">{{$item->name}}</p>
                      {{-- <p class="text-xs text-gray-600 dark:text-gray-400">{{$item->contact_number}}</p> --}}
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm">{{$item->membership_title}}</td>
                <td class="px-4 py-3 text-sm">{{$item->contact_number}}</td>
                <td class="px-4 py-3 text-xs">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> {{$item->address}}</span>
                </td>
                <td>

                    <button type="button" onclick="SelectReceiver('{{ $item->name }}', '{{ $item->contact_number }}')"
                        data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="font-bold text-sm bg-[#1A5C34] text-white px-4 py-2 rounded hover:bg-[#113B22] focus:outline-none focus:bg-[#113B22]">
                    Send Reminder
                    </button>
                    {{-- <button type="button" onclick="SelectReceiver('{{ $item->name }}', '{{ $item->contact_number }}')"
                        data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="font-bold text-sm bg-[#1A5C34] text-white px-4 py-2 rounded hover:bg-[#113B22] focus:outline-none focus:bg-[#113B22]">
                    Send Reminder
                    </button> --}}

                </td>
                {{-- <td class="px-4 py-3 text-sm">15-01-2021</td> --}}
              </tr>
              
              @endforeach
              
              
            </tbody>
          </table>
        </div>
       
      </div>
</section>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full ">
    <form  action="{{ route('sendSMS') }}" method="GET" >
            @csrf
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-xl dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Send Reminder
                
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
          
          
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="mb-1">
                    <label for="userName" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" readonly id="receiverName" name="receiverName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
                </div>
                <div class="mb-5">
                    <label for="userName" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                    <input type="text" readonly id="receiverNumber" name="receiverNumber" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
                </div>

                <hr class="mb-3"/>

                <div class="mb-1">
                  <label for="userName" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Reminder Type</label>
                  <select  id="reminderType" onchange="selectReminder()" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                      <option selected value="" disabled >-Select Reminder-</option>
                      @foreach($reminders as $item)
                          <option value='{{$item->default_message}}'>{{$item->reminder_name}}</option>
                      @endforeach
                    
                  </select>
              </div>

                <div class="mb-1">
                    <label for="userName" class="block mb-0 text-sm font-medium text-gray-900 dark:text-white">Custom Message</label>
                    <textarea id="reminderMessage" name="reminderMessage" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" style="min-height:10rem;"></textarea>
                </div>
            </div>


            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
            </div>
        </div>
</form>
</form>
    </div>
</div>


@endsection