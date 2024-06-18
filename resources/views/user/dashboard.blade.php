<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .imagehays{
            height: auto;
    max-width: 100%; /* Ensures image doesn't overflow its container */
    height: 200px; /* Set desired height */
    width: auto; /* Automatically adjusts width to maintain aspect ratio */
        }
    </style>
</head>

<body class="antialiased bg-[#152D35]">
    @include('layouts.navigation-user')
    <div class="flex justify-center items-center">
    <!-- Image -->
        <div class="w-1/2 h-screen">
            <img src="/images/fitsync-banner.jpg" class="w-full h-full object-cover" alt="fitsync banner" />
        </div>

    <!-- Text -->
        <div class="w-1/2 px-8">
            <h2 class="text-3xl pl-8 text-white font-montserrat text-justify tracking-wide font-bold mb-4">
            FITSYNC
            </h2>
            <p class="text-xl  pl-8 pr-10 text-white font-poppins text-justify tracking-wide text-semibold mb-4">
            At fitsync, we're more than just a fitness platform; we're your dedicated partner on the path to a
            healthier, stronger, and happier you. Our mission is to synchronize your fitness aspirations with seamless,
            personalized solutions that evolve with you.
            </p>
        </div>

    </div>

    <section class="bg-white" style="padding-right: 7rem;padding-left: 7rem ">
        <hr>    
        <div class="text-center pt-10">
            <h2 class="font-bold text-2xl">Gallery</h2>
        </div>
     
     <div class="grid grid-cols-2 md:grid-cols-3 gap-4 py-5 mx-5">
        <div class="flex justify-center items-center">
            <img class="max-h-[30rem] max-w-full rounded-lg border-4 border-cyan-900" src="{{asset("/images/uploadedpic/pic1.jpg")}}" alt="">
        </div>
        <div class="flex justify-center items-center">
            <img class="max-h-[30rem] max-w-full rounded-lg" src="{{asset("/images/uploadedpic/pic2.jpg")}}" alt="">
        </div>
        <div class="flex justify-center items-center">
            <img class="max-h-[30rem] max-w-full rounded-lg" src="{{asset("/images/uploadedpic/pic3.jpg")}}" alt="">
        </div>
        <div class="flex justify-center items-center">
            <img class="max-h-[30rem] max-w-full rounded-lg" src="{{asset("/images/uploadedpic/pic4.jpg")}}" alt="">
        </div>
        <div class="flex justify-center items-center">
            <img class="max-h-[30rem] max-w-full rounded-lg" src="{{asset("/images/uploadedpic/pic5.jpg")}}" alt="">
        </div>
        <div class="flex justify-center items-center">
            <img class="max-h-[30rem] max-w-full rounded-lg" src="{{asset("/images/uploadedpic/pic6.jpg")}}" alt="">
        </div>
        <div class="flex justify-center items-center">
            <img class="max-h-[30rem] max-w-full rounded-lg" src="{{asset("/images/uploadedpic/pic1.jpg")}}" alt="">
        </div>
        <div class="flex justify-center items-center">
            <img class="max-h-[30rem] max-w-full rounded-lg" src="{{asset("/images/uploadedpic/pic2.jpg")}}" alt="">
        </div>
        <div class="flex justify-center items-center">
            <img class="max-h-[30rem] max-w-full rounded-lg" src="{{asset("/images/uploadedpic/pic3.jpg")}}" alt="">
        </div>
       
        </div>
        <!-- Repeat the same structure for other images -->
    </div>

      
        
    </section>
<hr class="my-5"/>
<section class="g-map border-4 mx-5 border-cyan-800 rounded bg-white px-5 my-3">
    <h3 class="font-bold py-1 text-2xl text-center">LOCATION</h3>
    <iframe class="border border-4 border-gray-600" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d466.8689139393574!2d121.17355684683756!3d13.376185457026445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bce9cdd1fa6c97%3A0x761e0e673c369b9!2sCF%20Mindoro!5e0!3m2!1sen!2sph!4v1715170431113!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
    <section class="bg-white mt-0 mb-5 ">   
        <div class="flex min-h-screen justify-center items-center">
            <div class="flex flex-col md:flex-row md:space-x-6 space-y-6 md:space-y-0 bg-[#152D35] w-full max-w-[90%] p-8 sm:p-12 rounded-xl shadow-lg text-white overflow-hidden">
              <div class="flex flex-col space-y-8 justify-between">
                <div>
                  <h1 class="font-bold text-4xl tracking-wide">Contact Us</h1>
                  {{-- <p class="pt-2 text-indigo-100 text-sm">For all your non-existant company needs Fake Corp are here to help, do not hesitate to contact us!</p> --}}
                </div>
                <div class="flex flex-col space-y-6">
                  <div class="inline-flex space-x-2 items-center w-60">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#a5b4fc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    <span>09088911270</span>
                  </div>
                  <div class="inline-flex space-x-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#a5b4fc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    <span></span>
                  </div>
                  <div class="inline-flex space-x-2 items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#a5b4fc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    <span>Brgy Sta Isabel 5200 Calapan, Philippines
                    </span>
                  </div>
                </div>      
                <div class="flex space-x-4">
                  <a href="https://web.facebook.com/profile.php?id=61551599014154">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                  </a>
                  <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                  </a>
                  <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                  </a>
                  <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                  </a>
                </div>
              </div>
              {{-- <div class="relative">
                <div class="absolute z-0 w-40 h-40 bg-indigo-400 rounded-full -right-28 -top-28"></div>
                <div class="absolute z-0 w-40 h-40 bg-indigo-400 rounded-full -left-28 -bottom-16"></div>
                <div class="relative z-10 bg-white rounded-xl shadow-lg p-8 text-gray-600 md:w-80">
                  <form class="flex flex-col space-y-4" action="">
                    <div>
                      <label for="" class="text-sm">Name</label>
                      <input type="text" 
                             placeholder="Name" 
                             class="ring-1 ring-gray-300 mt-2 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-300">
                    </div>
                    <div>
                      <label for="" class="text-sm">Email</label>
                      <input type="email" 
                             placeholder="Email" 
                             class="ring-1 ring-gray-300 mt-2 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-300">
                    </div>
                    <div>
                      <label for="" class="text-sm">Message</label>
                      <textarea placeholder="Message"
                             rows="4"   
                             class="ring-1 ring-gray-300 mt-2 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-indigo-300"></textarea>
                    </div>
                    <button class="inline-block self-end bg-indigo-600 font-bold rounded-lg px-6 py-4 uppercase text-sm text-white">Send Message</button>
                  </form>
                </div> --}}
              </div>
            </div>
          </div>
    </section>
</body>

</html>