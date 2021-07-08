<?php

namespace App\Http\Controllers;

use App\Sliders;
use App\Category;
use Session;
use Image;
use Auth;
use Illuminate\Http\Request;
use DB;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Sliders::latest()->get();
        return view('sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::orderBy('name')->get();
         return view('sliders.create', compact('categories'));
    }

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
            'textMain' => 'required',
            'category' => 'required',
            'sliderImage' => 'required|image'
        ]);

        $categoryname = Category::find($request->category);
        $categoryname = $categoryname->name; 

        $file = $request->file('sliderImage');
        if ( $file ) {
            $filename = 'slider-' . str_slug( $request->textMain ) . '-' . str_random(10) . '.' . $file->getClientOriginalExtension();

            Image::make($file)->resize(520, 270)->save('uploads/sliders/resized/'. $filename);
            Image::make($file)->save('uploads/sliders/' . $filename);
        }

        $slider = new Sliders;

        $slider->textMain = $request->textMain;
        $slider->textSecondary = $request->textSecondary;
        $slider->sliderImage = $filename;
        $slider->categoryId = $request->category;
        $slider->categoryName = $categoryname;
        $slider->showSlider = 1;

        $slider->save();

        Session::flash('success', 'Succesfully added a slider.');

        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sliders  $sliders
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->hasRoles('supplier')){
            $th = Auth::user()->assign_theme;
            $slider = Sliders::findOrFail($id);
            $categories = Category::where('theme_no', 'like', '%'.$th.'%')->orderBy('name')->get();
        }else{
            $slider = Sliders::findOrFail($id);
            $categories = Category::orderBy('name')->get();
        }

        return view('sliders.edit', compact('slider', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sliders  $sliders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $this->validateWith([
            'textMain' => 'required',
            'category' => 'required',
            'sliderImage' => 'image'
        ]);

        $slider = Sliders::findOrFail($id);

        $categoryname = Category::find($request->category);
        $categoryname = $categoryname->name; 

        $file = $request->file('sliderImage');
        $filename = $slider->sliderImage;
        if ( $file ) {
            $filename = 'slider-' . str_slug( $request->textMain ) . '-' . str_random(10) . '.' . $file->getClientOriginalExtension();

            if ( file_exists('uploads/sliders/' . $slider->sliderImage) ) {
                unlink('uploads/sliders/' . $slider->sliderImage);
            }

            Image::make($file)->resize(570, 270)->save('uploads/sliders/resized/'. $filename);
            Image::make($file)->save('uploads/sliders/' . $filename);
        }

        

        $slider->textMain = $request->textMain;
        $slider->textSecondary = $request->textSecondary;
        $slider->sliderImage = $filename;
        $slider->categoryId = $request->category;
        $slider->categoryName = $categoryname;
        $slider->showSlider = $request->showSlider;
        $slider->sliderTheme = $request->slider_theme;

        $slider->save();

        Session::flash('success', 'Succesfully Updated a slider.');

        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sliders  $sliders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sliders $sliders)
    {
        //
    }

    public function store_offers(Request $request)
    {

        $this->validateWith([
            'offer_name' => 'required',
            'category' => 'required',
            'featuredImage' => 'required|image'
        ]);
        $categoryname = Category::find($request->category);
        $categoryname = $categoryname->name; 

        $file = $request->file('featuredImage');
        if ( $file ) {
            $filename = 'offer-' . str_slug( $request->offer_name ) . '-' . str_random(10) . '.' . $file->getClientOriginalExtension();

            Image::make($file)->resize(480, 360)->save('uploads/offers/resized/'. $filename);
            Image::make($file)->save('uploads/offers/' . $filename);
        }

        $saveOffer = DB::table("offers")->insertGetId([
            'offerName' => $request->offer_name,
            'offerSubtitle' => $request->offer_subtitle,
            'categoryId' => $request->category,
            'category' => $categoryname,
            'featuredImage' => $filename,
            'status' => 1,
            "theme_no" => 8,
            "entryDate" => date('Y-m-d'),
            "user_id" => $request->user_id,
        ]);

        Session::flash('success', 'Succesfully added a slider.');

        return redirect()->back();

    }
}
