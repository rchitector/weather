@extends('layouts.app')

@section('content')

    @include('parts.form')
    
    @isset($city)
        @empty($first)
            <div class="w-full p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$city}}</h5>
                <div class="text-lg mb-2">{{__('No data')}}</div>
            </div>
        @else
            <div class="w-full p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$city}}</h5>
                <div class="text-lg mb-2">Period</div>
                @isset($first)
                    <div class="text-sm mb-2">{{__('Starts at')}}: {{$first->timestamp_dt->format('Y-m-d h:i:s a')}}</div>
                @endisset
                @isset($last)
                    <div class="text-sm mb-4">{{__('Ends at')}}: {{$last->timestamp_dt->format('Y-m-d h:i:s a')}}</div>
                @endisset
                @isset($first)
                    <form class="flex w-full" method="POST" action="{{route('no-ajax.save')}}">
                        @csrf
                        <input type="hidden" name="city" value="{{$city}}">
                        <input type="hidden" name="timestamp" value="{{$first->timestamp_dt}}">
                        <input type="hidden" name="minTemp" value="{{$first->min_tmp}}">
                        <input type="hidden" name="maxTemp" value="{{$first->max_tmp}}">
                        <input type="hidden" name="windSpeed" value="{{$first->wind_spd}}">
                        <button type="submit"
                                class="px-3 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            {{__('Save forecast')}}
                        </button>
                    </form>
                @endisset
            </div>
            @include('parts.list')
        @endempty
    @endisset

@endsection