<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show', 'tag']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('date', 'desc');
        if (!Auth::check()) {
            $items = $items->where('published', 1);
        }
        $items = $items->get();

        return View::make('items.index', [
            'items' => $items,
            'tags' => $this->getTagsFromItems($items)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all(['tags']);
        $tags = $this->getTagsFromItems($items);

        return View::make('items.create', [
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title' => 'required',
            'text' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('items/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $item = new Item;
            $item->title = Input::get('title');
            $item->text = Input::get('text');
            $item->tags = Input::get('tags');
            $item->published = Input::has('published');
            $item->date = date('Y-m-d');
            $item->save();

            // redirect
            Session::flash('message', 'Запись успешно добавлена');
            return Redirect::to('items');
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $items = Item::all(['tags']);
        $tags = $this->getTagsFromItems($items);

        return View::make('items.edit', [
            'item' => $item,
            'tags' => $tags
        ]);
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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title' => 'required',
            'text' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('items/' . $item->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $item->title = Input::get('title');
            $item->text = Input::get('text');
            $item->tags = Input::get('tags');
            $item->published = Input::has('published');
            $item->save();

            // redirect
            Session::flash('message', 'Запись успешно сохранена');
            return Redirect::to('items');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        // redirect
        Session::flash('message', 'Запись успешно удалена');
        return Redirect::to('items');
    }

    /**
     * Show items by tag
     *
     * @param  string  $tag
     * @return \Illuminate\Http\Response
     */
    public function tag(string $tag)
    {
        $items = Item::where('tags', 'like', '%' . $tag . '%')->orderBy('date', 'desc');
        if (!Auth::check()) {
            $items = $items->where('published', 1);
        }
        $items = $items->get();

        return View::make('items.tag', [
            'tag' => $tag,
            'items' => $items
        ]);
    }

    private function getTagsFromItems($items) {
        $tags = [];
        foreach ($items as $item) {
            $item_tags = explode("\n", $item->tags);
            foreach($item_tags as $item_tag) {
                $tags[] = trim($item_tag);
            }
        }
        return array_unique($tags);
    }
}
