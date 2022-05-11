<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\Card;

class CardController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreCardRequest $request)
    {
        request()->validate([
            'board_id' => ['required', 'exists:boards,id'],
            'card_list_id' => ['required', 'exists:card_lists,id'],
            'title' => ['required'],
        ]);

        Card::create([
            'board_id' => request('board_id'),
            'card_list_id' => request('card_list_id'),
            'title' => request('title'),
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    public function show(Card $card)
    {
        //
    }

    public function edit(Card $card)
    {
        //
    }

    public function update(UpdateCardRequest $request, Card $card)
    {
        request()->validate([
            'title' => ['required'],
        ]);

        $card->update([
            'title' => request('title')
        ]);

        return redirect()->back();
    }

    public function destroy(Card $card)
    {
        //
    }
}
