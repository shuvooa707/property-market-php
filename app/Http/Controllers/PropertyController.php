<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();
        $reviews = Review::all();


        return view("property.index", [
            "properties" => $properties,
            "reviews" => $reviews,
            "slug" => \request()->url()
        ]);
    }
    public function byCategory(Request $request, $id)
    {
        $properties = Property::where("category_id", $id)->get();
        return view("property.byCategory", [
            "properties" => $properties
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = Property::find($id);
        return view("property.show", [
            "property" => $property
        ]);
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

    public function search(Request $request)
    {
        $propertyName = $request->get('propertyName');
        $propertiesQuery = Property::where("title", "LIKE", "%$propertyName%");
        $categories = Category::all();
        if ( $request->exists("sort") ) {
            if ( $request->get("sort") == "price_desc" ) {
                $propertiesQuery->orderBy("price", "desc");
            }
            if ( $request->get("sort") == "price_asc" ) {
                $propertiesQuery->orderBy("price", "asc");
            }
        } else {
            $propertiesQuery->orderBy("price", "desc");
        }
        if ( $request->exists("from") && is_numeric($request->get("from")) ) {
            $propertiesQuery->where("price", ">", $request->get("from") );
        }
        if ( $request->exists("to") && is_numeric($request->get("to"))  ) {
            $propertiesQuery->where("price", "<", $request->get("to") );
        }

        if ( $request->exists("categories") && $request->get("categories") ) {
            $propertiesQuery->whereIn("category_id", $request->get("categories"));
        }
        return view("property.search", [
            "properties" => $propertiesQuery->paginate(9),
            "categories" => $categories
        ]);
    }
}