<div>
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2">
            @foreach ($cards as $card)
                <x-index.card :name="$card['name']"
                              :logo="$card['logo']"
                              :url="$card['url']"
                              :description="$card['description']" />
            @endforeach
        </div>
    </div>

</div>
