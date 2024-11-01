@extends('layouts.app')

@section('content')

    @include('parts.form')

    @empty($record)
        <div class="w-full p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$city}}</h5>
            <div class="text-lg mb-2">{{__('No data')}}</div>
        </div>
    @else
        <div class="w-full p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$record->city_name}}</h5>
            <div class="text-lg mb-2">{{__('Updated at')}}: {{$record->updated_at->format('Y-m-d h:i:s a')}} UTC</div>
        </div>

        @include('parts.list')
    @endempty

@endsection