@if ($errors->any())
    <div class="text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="flex py-4 w-full" method="POST" action="{{route('no-ajax.api')}}" id="city_name_form">
    @csrf
    <div class="grid gap-6 md:grid-cols-4 w-full">
        <div class="flex flex-col col-span-2 w-full">
            <input type="text" name="city"
                   value="{{ $city ?? old('city') }}"
                   placeholder="Enter city name here (E.g Tel Aviv)"
                   class="@error('city') border-red-600 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
        </div>
        <div class="flex flex-col col-span-2 w-full">
            <div class="w-full flex h-full grid gap-6 md:grid-cols-2">
                <button type="button"
                        onclick="submitForm('{{route('no-ajax.api')}}')"
                        class="w-full px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{__('Get fro API')}}
                </button>
                <button type="button"
                        onclick="submitForm('{{route('no-ajax.db')}}')"
                        class="w-full px-3 py-2 text-sm font-medium text-center text-slate-800 bg-amber-500 rounded-lg hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800">
                    {{__('Get fro DB')}}
                </button>
            </div>
        </div>
    </div>
    <script>
        function submitForm(route) {
            const form = document.getElementById('city_name_form');
            form.action = route;
            form.submit();
        }
    </script>
</form>
<hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">