<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Characters\CreateRequest;
use App\Http\Requests\Dashboard\Characters\DestroyRequest;
use App\Http\Requests\Dashboard\Characters\EditRequest;
use App\Http\Requests\Dashboard\Characters\IndexRequest;
use App\Http\Requests\Dashboard\Characters\ShowRequest;
use App\Http\Requests\Dashboard\Characters\StoreRequest;
use App\Http\Requests\Dashboard\Characters\UpdateRequest;
use App\Models\Character;
use App\Services\Minecraft\WhitelistService;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function index(IndexRequest $request)
    {
        return view('dashboard.characters.index', [
            'characters' => Character::forUser($this->user)->get()
        ]);
    }

    public function show(ShowRequest $request, Character $character)
    {
        return view('dashboard.characters.show', [
            'character' => $character
        ]);
    }

    public function create(CreateRequest $request)
    {
        return view('dashboard.characters.create');
    }

    public function store(StoreRequest $request)
    {
        $character = new Character();
        $character->fill($request->all());
        $character->user_id = $this->user->id;
        $character->save();

        WhitelistService::add($character->name);

        return redirect(route('dashboard.characters.show', [
            'character' => $character
        ]));
    }

    public function edit(EditRequest $request, Character $character)
    {
        return view('dashboard.characters.edit', [
            'character' => $character
        ]);
    }

    public function update(UpdateRequest $request, Character $character)
    {
        $character->update([
            'name' => $request->input('name')
        ]);

        return redirect(route('dashboard.characters.show', [
            'character' => $character
        ]));
    }

    public function destroy(DestroyRequest $request, Character $character)
    {
        $name = $character->name;
        $character->delete();
        WhitelistService::rm($name);

        return redirect(route('dashboard.characters.index'));
    }
}
