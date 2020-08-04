<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
        //dd($items);
        return view('backend.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string',
        'photo' => 'required|mimes:jpeg,bmp,png',
        ]);

         //File Upload
         $imageName = time().'.'.$request->photo->extension();  
   
        $request->photo->move(public_path('backendtemplate/brandimg'), $imageName);
          $myfile='backendtemplate/brandimg/'.$imageName;


        //Store Data
          $brand=new Brand;
          $brand->name=$request->name;
          $brand->photo=$myfile;
          

          $brand->save();


        //Redirect
          return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.brands.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $brand=Brand::find($id);
         //dd($item);
         return view('backend.brands.edit',compact('brand'));
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
         $request->validate([
        
        'name' => 'required',
        'photo' => 'nullable|sometimes|image',
        
]);

      

//File Upload
         
        $myfile =$request->old_photo_path;
        //dd($myfile);
        
        if ($request->hasfile('photo')) 
        {
          $imageName = time().'.'.$request->photo->extension(); 
          $name=$request->old_photo_path; 

          // dd($name);
     
          if (file_exists(public_path($name)))
          {
            unlink(public_path($name));
            $request->photo->move(public_path('backendtemplate/brandimg'), $imageName);
            $myfile='backendtemplate/brandimg/'.$imageName;
          }

        }

        //Update Data
          $brand=Brand::find($id);
          $brand->name=$request->name;
          $brand->photo=$myfile;
          

          $brand->save();


        //Redirect
          return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $brand=Brand::find($id);
       //delete related  file from storage
       $brand->delete();
       return redirect()->route('brands.index');
    }
}