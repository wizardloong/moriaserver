<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\Characters\CreateRequest;
use App\Http\Requests\Home\Characters\DestroyRequest;
use App\Http\Requests\Home\Characters\EditRequest;
use App\Http\Requests\Home\Characters\IndexRequest;
use App\Http\Requests\Home\Characters\ShowRequest;
use App\Http\Requests\Home\Characters\StoreRequest;
use App\Http\Requests\Home\Characters\UpdateRequest;
use App\Models\Character;
use App\Services\Minecraft\WhitelistService;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function index(IndexRequest $request)
    {
        return view('home.characters.index', [
            'characters' => Character::forUser($this->user)->get()
        ])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function show(ShowRequest $request, Character $character)
    {
        return view('home.characters.show', [
            'character' => $character
        ]);
    }

    public function create(CreateRequest $request)
    {
        return view('home.characters.create');
    }

    public function store(StoreRequest $request)
    {
        $character = new Character();
        $character->fill($request->all());
        $character->user_id = $this->user->id;
        $character->save();

        WhitelistService::add($character->name);

        return redirect(route('home.characters.show', [
            'character' => $character
        ]));
    }

    public function edit(EditRequest $request, Character $character)
    {
        return view('home.characters.edit', [
            'character' => $character
        ]);
    }

    public function update(UpdateRequest $request, Character $character)
    {
        $character->update([
            'name' => $request->input('name')
        ]);

        return redirect(route('home.characters.show', [
            'character' => $character
        ]));
    }

    public function destroy(DestroyRequest $request, Character $character)
    {
        $name = $character->name;
        $character->delete();
        WhitelistService::rm($name);

        return redirect(route('home.characters.index'));
    }
}
