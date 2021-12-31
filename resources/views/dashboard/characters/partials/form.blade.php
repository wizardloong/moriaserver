@csrf
<div>
    <x-label for="name" value="Имя" />
    <x-input id="name" class="block mt-1 w-full"  name="name" :value="old('name') ?? isset($character) ? $character->name : null" required autofocus />
</div>
