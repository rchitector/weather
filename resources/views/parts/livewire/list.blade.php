<div class="w-full">
    @empty($records)
        @isset($city)
            <div class="w-full p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$city}}</h5>
                <div class="text-lg mb-2">{{__('No data')}}</div>
            </div>
        @endisset
    @else
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">{{__('Datetime')}}</th>
                <th class="px-6 py-3">{{__('Min temp')}}</th>
                <th class="px-6 py-3">{{__('Max temp')}}</th>
                <th class="px-6 py-3">{{__('Wind speed')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $r)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-3">{{$r['timestamp_dt']->format('Y-m-d h:i:s a')}}</td>
                    <td class="px-6 py-3">{{$r['min_tmp']}}°C</td>
                    <td class="px-6 py-3">{{$r['max_tmp']}}°C</td>
                    <td class="px-6 py-3">{{$r['wind_spd']}} km/h</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endempty
</div>