<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Subcategory;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();//show all values
       return view('backend.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('backend.items.create',compact('brands','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print output
        //dd($request);

        //validation ->check form input value with name
        $request->validate([
        'inputCodeno' => 'required',
        'inputName' => 'required',
        'inputPhoto' => 'required',
        'inputPrice' => 'required',
        'inputDiscount' => 'required',
        'inputDescription' => 'required',
        'brand' => 'required',
        'subcategory' => 'required',
        ]);

        //file upload

        $imageName = time() .'.'.$request->inputPhoto->extension();

        $request->inputPhoto->move(public_path('backendtemplate/itemimg'),$imageName);

        $myfile='backendtemplate/itemimg/'.$imageName;


        //store data ->store with database name
        $item = new Item;
        $item->codeno =$request->inputCodeno;
        $item->name=$request->inputName;
        $item->photo=$myfile;
        $item->price=$request->inputPrice;
        $item->discount=$request->inputDiscount;
        $item->description=$request->inputDescription;
        $item->brand_id=$request->brand;
        $item->subcategory_id=$request->subcategory;
        $item->save();

        //redirect
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);//obj
        return view('backend.items.show',compact('item'));
       // return view('backend.items.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        $item=Item::find($id);
        return view('backend.items.edit',compact('item','brands','subcategories'));
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
        //print output
        //dd($request);

        //validation ->check form input value with name
        $request->validate([
        'inputCodeno' => 'required',
        'inputName' => 'required',
        'inputPhoto' => 'required',
        //maybe present or absent-> change validation rule
        'inputPrice' => 'required',
        'inputDiscount' => 'required',
        'inputDescription' => 'required',
        'brand' => 'required',
        'subcategory' => 'required',
        ]);

        //file upload

        $imageName = time() .'.'.$request->inputPhoto->extension();

        $request->inputPhoto->move(public_path('backendtemplate/itemimg'),$imageName);

        $myfile='backendtemplate/itemimg/'.$imageName;

        //if upload new image, delete old image


        //store data ->store with database name
        $item = Item::find($id);
        $item->codeno =$request->inputCodeno;
        $item->name=$request->inputName;
        $item->photo=$myfile;
        $item->price=$request->inputPrice;
        $item->discount=$request->inputDiscount;
        $item->description=$request->inputDescription;
        $item->brand_id=$request->brand;
        $item->subcategory_id=$request->subcategory;
        $item->save();

        //redirect
        return redirect()->route('items.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        //delete related file from storage
        $item->delete();
        return redirect()->route('items.index');
    }
}
