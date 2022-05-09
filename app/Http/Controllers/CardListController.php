<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardListRequest;
use App\Http\Requests\UpdateCardListRequest;
use App\Models\Board;
use App\Models\CardList;

class CardListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCardListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Board $board)
    {
        request()->validate([
            'name' => 'required'
        ]);

        CardList::create([
            'user_id' => auth()->id(),
            'board_id' => $board->id,
            'name' => request('name')
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CardList  $cardList
     * @return \Illuminate\Http\Response
     */
    public function show(CardList $cardList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardList  $cardList
     * @return \Illuminate\Http\Response
     */
    public function edit(CardList $cardList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCardListRequest  $request
     * @param  \App\Models\CardList  $cardList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardListRequest $request, CardList $cardList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CardList  $cardList
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardList $cardList)
    {
        //
    }
}
