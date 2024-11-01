<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="flex flex-wrap items-center justify-between mx-auto py-4">
        <div class="inline-flex rounded-md shadow-sm">
            <a href="{{ route('no-ajax') }}"
               class="px-4 py-2 text-sm font-medium {{ Str::startsWith(request()->path(), 'no-ajax') ? 'text-blue-700' : 'text-gray-900' }} bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                {{__('Blade version')}}
            </a>
            <a href="{{ route('ajax') }}"
               class="px-4 py-2 text-sm font-medium {{ Str::startsWith(request()->path(), 'ajax') ? 'text-blue-700' : 'text-gray-900' }}  border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                {{__('Livewire version')}}
            </a>
        </div>
    </div>
</nav>