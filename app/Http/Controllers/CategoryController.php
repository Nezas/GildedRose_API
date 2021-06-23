<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use Exception;

use function PHPUnit\Framework\countOf;

class CategoryController extends Controller
{
    /**
     * Display all the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a new category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
        ]);

        return Category::create($request->all());
    }

    /**
     * Return all items based on a category.
     *
     * @param  $categoryName
     * @return \Illuminate\Http\Response
     */

    public function return($categoryName)
    {
        $categoryId = Category::where('name', 'like', '%' . $categoryName . '%')->pluck('id');

        $count = count($categoryId);
        if (!$count) {
            return 'Category not found';
        } else {
            return Item::where('category', $categoryId)->get();
        }
    }

    /**
     * Delete all items based on the category.
     *
     * @param  $categoryName
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryName)
    {
        $categoryId = Category::where('name', $categoryName)->pluck('id');

        $count = count($categoryId);
        if (!$count) {
            return 'Category not found';
        } else {
            $id = Item::where('category', $categoryId)->pluck('id'); // Gets the id of the item where categoryId matches
            return Item::destroy($id) . ' items were successfully deleted from the category ' . $categoryName; // Destroy+Print
        }
    }
}
