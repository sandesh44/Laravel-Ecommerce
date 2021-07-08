<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    public function scopeNotsuspended($query){

      return $query->join('users', 'users.id', '=', 'products.user_id')
                          ->where('users.suspend', '=', 0);
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Tags', 'products_tags', 'product_id', 'tags_id');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function categories(){
    	return $this->belongsToMany('App\Category', 'category_product', 'productID', 'categoryID');
    }

    public function category(){
        return $this->belongsTo('App\Category', 'categoryId');
    }

    public function reviews(){
    	return $this->hasMany('App\Reviews', 'productId');
    }

    public function ratings(){
    	return $this->hasMany('App\Ratings');
    }

    public function orders(){
      return $this->hasMany('App\Orders');
    }

    public function order(){
      return $this->hasMany('App\Orders');
    }

    public function images(){
        return $this->hasMany('App\Productimage', 'product_id');
    }

    public static function recentProductsCategories($count = 5)
    {

        $categories = Product::select('categoryId', 'categoryName', 'categories.slug', 'products.created_at')
                            ->join('categories', 'products.categoryId', '=', 'categories.id')
                            // ->orderBy('products.created_at')->distinct()
                            ->get()->take($count);
        
        if ( count($categories) > 0 ) {
            return $categories;
        }

        return false;

    }

    public static function recentProductsTags($count = 4)
    {

        $tags = Product::select('tags.id', 'tags.name', 'tags.slug')
                        ->join('products_tags', 'products_tags.product_id', '=', 'products.id')
                        ->join('tags', 'tags.id', '=', 'products_tags.tags_id')
                        ->distinct()->get()->take($count);
        
        if ( count($tags) > 0 ) {
            return $tags;
        }

        return false;

    } 

    public static function productSales($count = 3)
    {

        $products = Product::where('discountPercent', '>', 0)->latest()->get()->take($count);

        if ( count($products) ) {
            return $products;
        }

        return false;

    }

    public static function productMostBought($count = 3)
    {

        $products = Product::orderBy('totalSoldQuantity', 'DESC')->get()->take($count);

        if ( count($products) ) {
            return $products;
        }

        return false;

    }

    // new
    public static function recentProductsCategories_new($count = 5, $theme)
    {

        $categories = Product::select('categoryId', 'categoryName', 'categories.slug', 'products.created_at')
                            ->join('categories', 'products.categoryId', '=', 'categories.id')
                            ->where('products.theme_no', 'like', '%'.$theme.'%')
                            ->orderBy('products.created_at')->distinct()->get()->take($count);
        
        if ( count($categories) > 0 ) {
            return $categories;
        }

        return false;

    }

    public static function productSales_new($count = 3, $theme_no)
    {

        $products = Product::where('discountPercent', '>', 0)->where('theme_no', 'like', '%'.$theme_no. '%')->inRandomOrder()->get()->take($count);

        if ( count($products) ) {
            return $products;
        }

        return false;

    }

    public static function productMostBought_new($count = 3, $theme)
    {

        $products = Product::where('theme_no', 'like', '%'.$theme.'%')->orderBy('totalSoldQuantity', 'DESC')->get()->take($count);

        if ( count($products) ) {
            return $products;
        }

        return false;

    }

}
