<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoardRequest;
use App\Http\Requests\UpdateBoardRequest;
use App\Models\Board;
use Inertia\Inertia;

class BoardController extends Controller
{
    public function index()
    {
        return Inertia::render('Boards/BoardsIndex', [
            'boards' => auth()->user()->boards
        ]);
    }

    public function create()
    {
        //
    }

    public function store(StoreBoardRequest $request)
    {
        Board::create([
            'user_id' => auth()->id(),
            'name' => $request->name
        ]);

        return redirect()->back();
    }

    public function show(Board $board)
    {
        $board->load('lists.cards');

        return Inertia::render('Boards/BoardsShow', [
            'board' => $board
        ]);
    }

    public function edit(Board $board)
    {
        //
    }

    public function update(UpdateBoardRequest $request, Board $board)
    {
        $board->update(['name' => $request->name]);

        return redirect()->back();
    }

    public function destroy(Board $board)
    {
        //
    }
}
