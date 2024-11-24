@extends('layout.base')

@section('content')

<form action="{{  url('pokemon/'.$pokemon->id) }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto">
    @csrf
    @method('PUT')
    <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
        <input type="text" name="name" id="name" value="{{ $pokemon->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <div class="mb-5">
        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
        <input type="text" name="type" id="type" value="{{ $pokemon->type }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <div class="mb-5">
        <label for="power" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Power</label>
        <input type="number" name="power" id="power" value="{{ $pokemon->power }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <div class="mb-5">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
        <img src="{{ asset($pokemon->image) }}" alt="{{ $pokemon->name }}">
        <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-5" >
        <label for="coach_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Coach</label>
        <select name="coach_id" id="coach_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Select a coach</option>
            @foreach ($coaches as $coach)
                @if($coach->id === $pokemon->coach->id)
                    <option value="{{ $coach->id }}"selected>{{ $coach->name }}</option>
                @else
                    <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                @endif
            @endforeach
        </select required>
    </div>
    <button class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 " type="submit">Update Pokemon</button>
</form>

@endsection