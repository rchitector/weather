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
                <div class="text-sm mb-2">{{__('Starts at')}}: {{$first['timestamp_dt']->format('Y-m-d h:i:s a')}}</div>
            @endisset
            @isset($last)
                <div class="text-sm mb-4">{{__('Ends at')}}: {{$last['timestamp_dt']->format('Y-m-d h:i:s a')}}</div>
            @endisset
            @isset($first)
                <button type="button"
                        wire:click="saveFirst"
                        wire:loading.attr="disabled"
                        class="px-3 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    {{__('Save forecast')}}
                </button>
            @endisset
        </div>
        @include('parts.livewire.list')
    @endempty
@endisset