<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Day;
use App\Month;
use App\Product;
use App\ProductPhoto;
use App\Year;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('user.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $countries = Country::all();
        $years = Year::all();
        $month = Month::all();
        $days = Day::all();

        return view('user.addProduct', ['categories' => $categories, 'countries' => $countries, 'years' => $years, 'month' =>$month, 'days' => $days]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        if ($request->hasFile('photos') && count('photos') <= 5) {

            $slug = SlugService::createSlug(Product::class, 'slug', $request->title);

            $category = $request->get('category_id');
            $country = $request->get('country_id');

            $product = new Product();
            $product->title = $request->title;
            $product->slug = $slug;
            $product->details = $request->details;
            $product->save_conditions = $request->save_conditions;
            $product->danger = $request->danger;
            $product->danger_type = $request->danger_type;
            $product->buy_place = $request->buy_place;
            $product->found_date = $request->found_date;
            $product->date_born = $request->date_born;
            $product->date_death = $request->date_death;
            $product->country_id = $country;
            $product->category_id = $category;
            $product->user_id = Auth::id();
            $product->save();


            foreach ($request->photos as $photo) {

                $filename = $photo->store('photos', 'public');

                ProductPhoto::create([
                    'product_id' => $product->id,

                    'filename' => $filename

                ]);

            }


            echo "Upload Successfully";

        } else {

            echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';

        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('user.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
