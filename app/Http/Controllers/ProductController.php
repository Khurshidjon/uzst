<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\degree_of_hazard;
use App\Product;
use App\ProductPhoto;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(20);
        $categories = Category::all();
        $randoms = Product::where('slug', '!=', $products)->get()->random(3);
        $news = Product::latest()->paginate(6);
        return view('user.index', ['products' => $products, 'randoms' => $randoms, 'news' => $news, 'categories' => $categories]);
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
        $degree_of_hazards = degree_of_hazard::all();

        return view('user.addProduct', ['categories' => $categories, 'countries' => $countries, 'degree_of_hazards' => $degree_of_hazards]);
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
            'title' => 'required',
            'details' => 'required',
            'degree_of_hazard'=>'required',
            'save_conditions' => 'required',
            'danger' => 'required',
            'danger_type' => 'required',
            'buy_place' => 'required',
            'found_date' => 'required',
            'date_born' => 'required',
            'country_id' => 'required',
            'category_id' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        if ($request->hasFile('photos') && count('photos') <= 5) {

            $slug = SlugService::createSlug(Product::class, 'slug', $request->title);

            $category = $request->get('category_id');
            $country = $request->get('country_id');
            $date_death_name = $request->get('date_death_name');

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
            $product->date_death_name = $date_death_name;
            $product->country_id = $country;
            $product->category_id = $category;
            $product->user_id = Auth::id();
            $product->degree_of_hazard_id = $request->get('degree_of_hazard');
            $product->save();


            foreach ($request->photos as $photo) {

                $filename = $photo->store('photos', 'public');

                ProductPhoto::create([
                    'product_id' => $product->id,

                    'filename' => $filename

                ]);

            }

            if($product)
            {
                alert()->success('Product Created', 'Successfully');
                return redirect()->route('product.index');
            }

        } else {

            alert()->error('Oops...', 'Something went wrong!');
            return redirect()->route('add.product');

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
    public function search(Request $request)
    {
        $searchString = $request->input('search');

        $product_column = $request->get('search_category');

        $result = DB::table('products')->where('title', 'LIKE', '%'. $request->input('search').'%')->get();

        return response()->json($result);
    }
}
