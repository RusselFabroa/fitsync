@extends('layouts.user-app')

@section('content')


<div class="text-center w-3/4 border border-3 shadow-lg mx-auto mt-8 py-4 font-poppins bg-white px-8 ">
    <h1 class="text-2xl font-poppins font-bold mb-6">Community Forum</h1>
    @foreach ($forums as $data)
    <div class="flex mb-2 {{ $data->user_id === $AuthUserId ? 'justify-end' : 'justify-start' }}">
        <div class="max-w-md w-auto px-7 py-1 {{ $data->user_id === $AuthUserId ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-900' }} rounded-lg">
            <p class="text-start">{{ $data->forum_content }}</p>
            <p class="italic text-xs  text-end {{ $data->user_id === $AuthUserId ? 'text-white' : 'text-blue-700' }}">- {{ $data->user_name }}</p>
        </div>
      
        
    </div>
    @endforeach
</div>

<div class="w-3/4 mx-auto text-center py-4 mt-8 font-poppins bg-white">
    {{-- <h2 class="pt-4 text-2xl font-bold mb-4">Upload Post</h2> --}}
    <form action="{{ route('forums.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" id="user_id" value="{{ old('user_id') }}">
        <div>
            
        </div>
        <div class="mb-4">
            <label for="forum_content" class="block text-gray-600 text-sm font-medium">What's on your mind?</label>
            <div class="mt-1 flex items-center">
                <input type="text" name="forum_content" id="forum_content" value="{{ old('forum_content') }}" class="p-2 w-full border rounded">
                <button type="submit" class="ml-4 bg-[#1A5C34] font-poppins text-md font-bold text-white px-4 py-2 rounded hover:bg-[#113B22] focus:outline-none focus:bg-[#113B22]">SEND</button>
            </div>
            @error('forum_content')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </form>
</div>
@endsection
