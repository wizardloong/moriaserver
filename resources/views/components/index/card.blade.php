<a href="{{ $url }}" target="_blank">
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
        <div class="flex items-center">
            <img class="small-logo" src="{{ $logo }}" />
            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">{{ $name }}</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                {{ $description }}
            </div>
        </div>
    </div>
</a>
