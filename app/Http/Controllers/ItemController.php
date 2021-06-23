<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display all items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::all();
    }

    /**
     * Store a new item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'category' => 'required|integer',
                'name' => 'required|string|ends_with:_item',
                'value' => 'required|numeric|min:10|max:100',
                'quality' => 'required|integer|min:-10|max:50',
            ]
        );

        return Item::create($request->all());
    }

    /**
     * Update an item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        if ($item == null) {
            return 'Item not found';
        } else {
            $item->update($request->all());
            return $item;
        }
    }
}
