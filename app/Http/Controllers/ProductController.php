<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Category;
use App\Tags;
use App\Productimage;
use App\Helpers\UserRole;
use Image;
use Auth;

class ProductController extends Controller
{
    // public function __construct(){

    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('productName')->get();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tags::orderBy('name')->get();

        return view('products.create', compact('categories','tags'));
        
    } 

        
        // $tags = Tags::orderBy('name')->get();
        // return view('products.create', compact('categories', 'tags'));

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validateWith([
                'productName' => 'required|unique:products',
                'category' => 'required',
                'featuredImage' => 'required',
                'quantity' => 'required|numeric|min:1',
                'unit' => 'required',
                'featured' => 'required',
                'actualRate' => 'required|numeric|min:1',
                'sellingPrice' => 'required|numeric|min:1',
                'shortDesc' => 'required'
        ]);
        
        // Upload Featured Image
        $featuredImage = $request->file('featuredImage');
        $ffname = 'featured-' . str_slug( $request->productName ) . '-' . str_random(8) . '.' . $featuredImage->getClientOriginalExtension();

        // Image::make($featuredImage)->resize(520, 512)->save('uploads/products/'. $ffname);
        // Image::make($featuredImage)->resize(300, 320)->save('uploads/products/thumbnails/'. $ffname);
        Image::make($featuredImage)->resize(270, 270)->save('uploads/products/'. $ffname);
        Image::make($featuredImage)->resize(110, 110)->save('uploads/products/thumbnails/'. $ffname);

        //Upload file and get imagename
        $images = $request->file( 'images' );
        $filenames = [];
        $newfilename = '';
        if( $images ){
            ini_set('memory_limit', '256M');
            foreach ($images as $image) {

                $newfilename = str_slug( $request->productName ) . '-' . $image->getSize() . str_random(8) . '.'. $image->getClientOriginalExtension();

                $filenames[] = $newfilename;

                // Image::make($image)->resize(520, 512)->save('uploads/products/'. $newfilename);
                // Image::make($image)->resize(300,320)->save('uploads/products/thumbnails/'. $newfilename);
                Image::make($image)->resize(270, 270)->save('uploads/products/'. $newfilename);
                Image::make($image)->resize(110,110)->save('uploads/products/thumbnails/'. $newfilename);

            }

        }

        $category = Category::find($request->category);

        $product = new Product;

        $product->productName = $request->productName;
        $product->slug = str_slug($request->productName);
        $product->unit = $request->unit;
        $product->rate = $request->sellingPrice;
        $product->categoryId = $request->category;
        $product->categoryName = $category->name;
        $product->availableItems = $request->quantity;
        $product->shortDesc = $request->shortDesc;
        $product->highlights = $request->keywords;
        $product->description = $request->description;
        $product->entryDate = date('Y-m-d');
        $product->quantity = $request->quantity;
        $product->featured = $request->featured;
        $product->user_id =$request->session()->get('user')['id'];
        $product->newProduct = 1;
        $product->discountPercent = ($request->actualRate - $request->sellingPrice);
        $product->actualRate = $request->actualRate;
        $product->merchantId = $request->session()->get('user')['id'];
        $product->avgRating = 0;
        if ( $request->tags ) {
            $product->productTags = json_encode($request->tags);
        }
        $product->keywords = $request->keywords;

        // $implode = implode(',' ,$request->theme_no);
        // $product->theme_no = $implode;
        
        $product->featuredImage = $ffname;

        $product->delivery_area = $request->delivery_area;
        $product->delivery_time = $request->delivery_time;
        $product->shipping_charge = $request->shipping_charge;

        $product->save();

        if ( $request->tags ) {
            $product->tags()->attach($request->tags);
        }

        // if( $images ){

        //     foreach ($filenames as $f) {
        //         $img = new Productimage;
                
        //         $img->product_id = $product->id;
        //         $img->image = $f;

        //         $img->save();
        //     }

        // }

        session()->flash('success','Succesfully added your product.');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if(Auth::user()->hasRoles('admin')){
            $categories = Category::orderBy('name')->get();
        }else{
            // $th = Auth::user()->assign_theme;
            // $categories = Category::where('theme_no','like', '%'.$th.'%')->orderBy('name')->get();
            $categories = Category::orderBy('name')->get();
        }
        
        $tags = Tags::orderBy('name')->get();
        return view('products.edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validateWith([
                'productName' => 'required',
                'category' => 'required',
                'featuredImage' => 'image',
                'unit' => 'required',
                'quantity' => 'required|numeric|min:1',
                'unit' => 'required',
                'featured' => 'required',
                'actualRate' => 'required|numeric|min:1',
                'sellingPrice' => 'required|numeric|min:1',
                'shortDesc' => 'required'
        ]);
      
        $product = Product::findOrFail($id);

        $featuredImage = $request->file('featuredImage');

        if ( $featuredImage ) {

            $ffname = 'featured-' . str_slug( $request->productName ) . '-' . str_random(8) . '.' . $featuredImage->getClientOriginalExtension();

            if ( file_exists('uploads/products/' . $product->featuredImage) ) {
                unlink('uploads/products/' . $product->featuredImage);
            }
            if ( file_exists('uploads/products/thumbnails/' . $product->featuredImage) ) {
                unlink('uploads/products/thumbnails/' . $product->featuredImage);
            }

            Image::make($featuredImage)->resize(270, 270)->save('uploads/products/'. $ffname);
            Image::make($featuredImage)->resize(110, 110)->save('uploads/products/thumbnails/'. $ffname);

        }

        //Upload file and get imagename
        $images = $request->file( 'images' );
        $filenames = [];
        $newfilename = '';
        if( $images ){
            ini_set('memory_limit', '256M');
            foreach ($images as $image) {

                $newfilename = str_slug( $request->productName ) . '-' . $image->getSize() . str_random(8) . '.'. $image->getClientOriginalExtension();

                $filenames[] = $newfilename;

                Image::make($image)->resize(270, 270)->save('uploads/products/'. $newfilename);
                Image::make($image)->resize(110,110)->save('uploads/products/thumbnails/'. $newfilename);

            }

        }

        $category = Category::find($request->category);

        

        $product->productName = $request->productName;
        $product->slug = str_slug($request->productName);
        $product->unit = $request->unit;
        $product->rate = $request->sellingPrice;
        $product->categoryId = $request->category;
        $product->categoryName = $category->name;
        $product->availableItems = $request->quantity;
        $product->shortDesc = $request->shortDesc;
        $product->highlights = $request->keywords;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->featured = $request->featured;
        $product->discountPercent = $request->discount;
        $product->actualRate = $request->actualRate;

        
        // $implode = implode(',' ,$request->theme_no);
        // $product->theme_no = $implode;

        $product->avgRating = 0;
        if ( $request->tags ) {
            $product->productTags = json_encode($request->tags);
        }
        $product->keywords = $request->keywords;
        if ( $featuredImage ) {
            $product->featuredImage = $ffname;
        }

        $product->save();

        if ( $request->tags ) {
            $product->tags()->sync($request->tags);
        }

        foreach ($filenames as $f) {
            $img = new Productimage;
            
            $img->product_id = $product->id;
            $img->image = $f;

            $img->save();
        }

        session()->flash('success','Succesfully updated your product.');

        return redirect()->route('products.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        try {
            
            if ( file_exists('uploads/products/' . $product->featuredImage) ) {
            unlink('uploads/products/' . $product->featuredImage);
            }
            if ( file_exists('uploads/products/thumbnails/' . $product->featuredImage) ) {
                unlink('uploads/products/thumbnails/' . $product->featuredImage);
            }

        } catch (Exception $e) {
            
        }
        
        try {

            $images = $product->images;

            if ( count($images) ) {
                foreach ($images as $img) {
                    
                    if ( file_exists('uploads/products/' . $img->image) ) {
                        unlink('uploads/products/' . $img->image);
                    }

                    if ( file_exists('uploads/products/thumbnails/' . $img->image) ) {
                        unlink('uploads/products/thumbnails/' . $img->image);
                    }

                }
            }

        } catch (Exception $e) { }
        
        Productimage::where('product_id', $id)->delete();
        $product->delete();

        session()->flash('success', 'Succesfully removed the product.');

        return redirect()->back();

    }

    public function remove_image($id) {

        $img = Productimage::findOrFail($id);

        $imagescount = Productimage::where('product_id', $img->product_id)->count();

        if ( $imagescount > 1 ) {
            
                try {
                    
                    if ( file_exists('uploads/products/' . $img->image) ) {
                        unlink('uploads/products/' . $img->image);
                    }

                    if ( file_exists('uploads/products/thumbnails/' . $img->image) ) {
                        unlink('uploads/products/thumbnails/' . $img->image);
                    }

                $img->delete();

                session()->flash('success', 'Removed the image.');

                return redirect()->back();

            } catch (Exception $e) {  }

        }

        session()->flash('info', 'There needs to be at least one remaining image for the product before deleting.');

        return redirect()->back();

    }

}
