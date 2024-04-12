<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Company;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::paginate(10);
        $categories = Category::all();

        return view("admin.property.index", [
            "properties" => $properties,
            "categories" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $categories = Category::all();
        $addresses = Address::all();
        return view("admin.property.create", [
            "companies" => $companies,
            "categories" => $categories,
            "addresses" => $addresses
        ]);
    }

    public function imageUpload(Request $request)
    {
        // upload image
        $file = $request->file("upload");
        $fileName = Str::uuid()  . "." . $file->getClientOriginalExtension();
        $url = url($file->storeAs("uploads/" . $fileName));

        $function_number = $request->get("CKEditorFuncNum");
//        $url = "https://en.wikipedia.org/wiki/Nokia_N900#/media/File:Nokia_N900.JPG";
        $message = "";

        return "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $thumbFile = $request->file("thumbnailFile");
        $thumbnail = $thumbFile->storeAs("/uploads", Str::uuid() . "." . $thumbFile->getClientOriginalExtension());

        $property = Property::create([
            "title" => $request->get("title"),
            "thumbnail" => $thumbnail,
            "summery" => $request->get("summery"),
            "description" => $request->get("description"),
            "price" => $request->get("price"),
            "bedrooms" => $request->get("bedrooms"),
            "bathrooms" => $request->get("bathrooms"),
            "balconies" => $request->get("balconies"),
            "garages" => $request->get("garages"),
            "is_available" => $request->get("is_available"),
            "sqft" => $request->get("sqft"),

            "category_id" => $request->get("category_id"),
            "company_id" => $request->get("company_id"),
            "address_id" => $request->get("address_id"),
        ]);

        collect($request->imageFiles)
            ->each(function ($image) use($property) {
                $imagePath = $image->storeAs("/uploads", Str::uuid() . "." . $image->getClientOriginalExtension());
                PropertyImage::create([
                    "path" => $imagePath,
                    "property_id" => $property->id
                ]);
            });

        return redirect()->route("admin.property.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = Property::find($id);
        return view("admin.property.show", [
            "property" => $property
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = Property::find($id);
        $companies = Company::all();
        $categories = Category::all();
        $addresses = Address::all();
        return view("admin.property.edit", [
            "property" => $property,
            "companies" => $companies,
            "categories" => $categories,
            "addresses" => $addresses
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $property = Property::find($id);

        if ($request->file("thumbnailFile")) {
            $thmbFile = $request->file("thumbnailFile");
            $thumbnail = $thmbFile->storeAs("/uploads", Str::uuid() . "." . $thmbFile->getClientOriginalExtension());
        } else {
            $thumbnail = $property->thumbnail;
        }


        $property->update([
            "title" => $request->get("title", $property->title),
            "thumbnail" => $thumbnail,
            "description" => $request->get("description", $property->description),
            "summery" => $request->get("summery", $property->summery),
            "price" => $request->get("price", $property->price),
            "bedrooms" => $request->get("bedrooms", $property->bedrooms),
            "bathrooms" => $request->get("bathrooms", $property->bathrooms),
            "balconies" => $request->get("balconies", $property->balconies),
            "garages" => $request->get("garages", $property->garages),
            "is_available" => $request->get("is_available", $property->is_available),
            "sqft" => $request->get("sqft", $property->sqft),

            "category_id" => $request->get("category_id", $property->category_id),
            "company_id" => $request->get("company_id", $property->company_id)
        ]);

        return redirect()->route("admin.property.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::find($id);

        if ( $property ) {
            $property->delete();
        }

        return redirect()->route("admin.property.index");
    }
}
