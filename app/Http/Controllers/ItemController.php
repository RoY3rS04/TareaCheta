<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Item;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $collections = Collection::all();
        return view('home.pages.create-item', ['collections' => $collections]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'min:5'],
            'description' => ['required', 'min:20'],
            'price' => 'required',
            'method' => 'required',
            'royalties' => ['required', 'min:2'],
            'size' => ['required', 'min:2'],
            'collection_id' => 'required',
            'item_img' => 'required'
        ]);

        $data['user_id'] = Auth::user()->id;

        if(!Auth::user()->is_author) {
            Auth::user()->update(['is_author'], [true]);
        }

        $item = Item::query()->create($data);

        $item->addMediaFromRequest('item_img')->toMediaCollection('items_images');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item): View
    {
//        $otherItems = Item::query()->whereHas('user', function($query) use ($item) {
//            $query->where('id', '=', $item->user->id);
//        })->where('id', '!=', $item->id)
//            ->with(['media','likes'])->get();
        $otherItems = $item->user->items
            ->where('id', '!=', $item->id)
            ->load(['likes', 'media']);

        return \view('home.pages.item-details', ['item' => $item], ['otherItems' => $otherItems]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
