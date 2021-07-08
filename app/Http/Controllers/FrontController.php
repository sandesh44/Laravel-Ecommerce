<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Sliders;
use App\Cart;
use Session;
use App\Rating;
use Illuminate\Support\Facades\DB;
use UxWeb\SweetAlert\SweetAlert;

class FrontController extends Controller
{
    public function category_show(){
        $category = Category::orderBy('categories.id','asc')->take(10)->get();
        return view('layouts.header', compact('category'));
    }

    public function product_show(){
        $category = Category::orderBy('categories.name','asc')->take(10)->get();
        $product = Product::orderBy('products.categoryId','asc')->take(20)->get();
        $products = Product::orderBy('products.id','desc')->take(20)->get();
        $slider = Sliders::orderBy('sliders.sliderId','desc')->take(10)->get();
        return view('layouts.app', compact('product','slider','category','products'));
    }

    public function detail_show(Request $request,$id)
    {
        $category = Category::where('id', '=', $id)->orderBy('categories.name')->get();
        if ($request->input('sort') == 'latest') {
            $product = Product::where('categoryId','=', $id)->orderBy('products.created_at','desc')->get();  
        } elseif($request->input('sort') == 'low_high') {
            $product = Product::where('categoryId','=', $id)->orderBy('products.rate','asc')->get(); 
        } else {
            $product = Product::where('categoryId','=', $id)->orderBy('products.rate','desc')->get(); 
        }
        
        $rating = DB::table('rating')
        ->join('products', 'rating.product_id', '=', 'products.id')
        ->select('products.*','products.productName as name',
                 'products.featuredImage as image',
                 'products.actualRate as rate',
                 'products.rate as price',
                 'rating.rating as rating',)
        ->get();

             

        return view('/list', compact('product', 'category','rating'));
    }

    public function details_show($slug){
        $category = Category::orderBy('categories.name','asc')->take(10)->get();
        $product = Product::where('slug',$slug)->orderBy('products.id')->take(20)->get();
        $rating = Rating::orderBy('rating.id')->take(5)->get();
        return view('/details/detail', compact('product','category','rating'));
    }

    public function policy(){
        $category = Category::orderBy('categories.name','asc')->take(10)->get();
        return view('layouts.policy',compact('category'));
    }

    public function addToCart(Request $req){
        if ($req->session()->has('user')) {
             $cart = new Cart;
             $cart->user_id =$req->session()->get('user')['id'];
             $cart->product_id = $req->product_id;
             $cart->quantity  = $req->quantity;
             $cart->save();
             SweetAlert::success('Products Added Successfully')->persistent('Close');
             return redirect('layouts/app');

        } else {
            return redirect('login');
        }
        
    }

    public static function cartItem(){
        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }

    public function cartList(){
        $category = Category::orderBy('categories.name','asc')->take(10)->get();
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.quantity as quantity','cart.id as cart_id')
        ->get();
        return view('cartList',compact('products','category'));
    }

    public function removeCart(Request $request,$id){
        Cart::destroy($id);
        return redirect('cartList');
    }



    public function search(Request $request)
    {
          $category = Category::orderBy('categories.name','asc')->take(10)->get();
          $data = Product::where("productName","like","%".$request->input('query').'%')
                ->get();
                $rating = DB::table('rating')
                ->join('products', 'rating.product_id', '=', 'products.id')
                ->select('products.*','products.productName as name',
                         'products.featuredImage as image',
                         'products.actualRate as rate',
                         'products.rate as price',
                         'rating.rating as rating',)
                ->get();
                return view('search',['products'=>$data],compact('category','rating'));
    }

    public function rating(Request $req){
             $rating = new Rating;
             $rating->user_id =$req->session()->get('user')['id'];
             $rating->product_id = $req->product_id;
             $rating->name  = $req->name;
             $rating->email  = $req->email;
             $rating->review  = $req->review;
             $rating->rating  = $req->rating;
             $rating->save();
             return redirect('layouts/app');

        
    }




}
