<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the nerds
        $items = Item::all();

        $tags = [];
        foreach ($items as $item) {
            $item_tags = explode("\n", $item->tags);
            foreach($item_tags as $item_tag) {
                $tags[] = trim($item_tag);
            }
        }
        $tags = array_unique($tags);

        // load the view and pass the nerds
        return View::make('items.index', [
            'items' => $items,
            'tags' => $tags
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return View::make('items.show')
            ->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }

    /**
     * Show items by tag
     *
     * @param  string  $tag
     * @return \Illuminate\Http\Response
     */
    public function tag(string $tag)
    {
        // get all the nerds
        $items = Item::where('tags', 'like', '%' . $tag . '%')->get();

        // load the view and pass the nerds
        return View::make('items.tag', [
            'tag' => $tag,
            'items' => $items
        ]);
    }
}
