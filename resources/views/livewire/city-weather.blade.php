<div>

    @error('city')
    <div class="text-red-600">
        <ul>
            <li>{{ $message }}</li>
        </ul>
    </div>
    @enderror

    <form class="flex py-4 w-full relative" wire:submit.prevent>
        @csrf
        <div class="grid gap-6 md:grid-cols-4 w-full">
            <div class="flex flex-col col-span-2 w-full">
                <input type="text"
                       id="city"
                       wire:model="city"
                       wire:keydown.enter="fetchFromApi"
                       wire:loading.attr="disabled"
                       required
                       placeholder="Enter city name here (E.g Tel Aviv)"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                />
            </div>
            <div class="flex flex-col col-span-2 w-full">
                <div class="w-full h-full grid gap-6 md:grid-cols-2">
                    <button type="button"
                            wire:click="fetchFromApi"
                            wire:loading.attr="disabled"
                            class="w-full px-3 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{__('Get fro API')}}
                    </button>
                    <button type="button"
                            wire:click="fetchFromDatabase"
                            wire:loading.attr="disabled"
                            class="w-full px-3 py-2 text-sm font-medium text-center text-slate-800 bg-amber-500 rounded-lg hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800">
                        {{__('Get fro DB')}}
                    </button>
                </div>
            </div>
        </div>
    </form>
    
    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

    @if($isLocal)
        @include('parts.livewire.db')
    @else
        @include('parts.livewire.api')
    @endif
</div>