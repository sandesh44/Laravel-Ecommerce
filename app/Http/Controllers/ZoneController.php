<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zones;
use Auth;
use Session;

class ZoneController extends Controller
{
    public function index()
    {
        $zone = Zones::get();
        return view('zone.index', compact('zone'));
        
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zone.create');
    }

    public function store(Request $request)
    {

        $this->validateWith([
                // 'district' => 'required',
                'headquarter' => 'required'
        ]);

        $cat = new Zones;

        $cat->province = $request->province;
        $cat->zone = str_slug($request->zone);
        $cat->district = str_slug($request->district);
        $cat->headquarter = $request->headquarter;
        
        $cat->save();

        Session::flash('success', 'Succesfully created a Delivery Location.');

        return redirect()->back();
    }

    public function edit(Category $category)
    {
        $zones = Zones::get();
        return view('zone.edit', compact('zones'));
    }
}
