<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\ViewFinderInterface;

class BrandController extends Controller
{
    public function Allbrand(){
        $brands=Brand::latest()->get();

        return view('admin.brand.index',compact('brands'));
    }

    // store Brand


    public function storeBrand(Request $request){

        $request->validate([
            'brand_name' => 'required|min:5',
            'brand_image' => 'required|mimes:jpg.jpeg,png',

        ],
        [
             'brand_name.required' => 'Plese input brand Name',
             'brand_name.max' => 'Brand longer then 5 characters',

        ]);

        $brand_image=$request->file('brand_image');
        $name_gen=hexdec(uniqid());
        $img_ext=strtolower($brand_image->getClientOriginalExtension());
        $img_name=$name_gen.' . '.$img_ext;
        $up_location='img/brand/';
        $last_img=$up_location.$img_name;
        $brand_image->move($up_location,$img_name);


        Brand::insert([

            'brand_name'=>$request->brand_name,
            'brand_image'=> $last_img,
            'created_at'=>Carbon::now(),
        ]);


        return Redirect()->route('all.brand')->with('success','Category Inserted');





    }


    public function Edit($id){

        // dd(" tuhin");

        $brands= Brand::find($id);
        return View('admin.brand.edit',compact('brands'));



    }




    public function update(Request $request , $id){

        $request->validate([
            'brand_name' => 'required|min:5',


        ],
        [
             'brand_name.required' => 'Plese input brand Name',
             'brand_name.mix' => 'Brand longer then 5 characters',

        ]);

                $old_img=$request->old_image;

                $brand_image=$request->file('brand_image');


                $name_gen=hexdec(uniqid());
                $img_ext=strtolower($brand_image->getClientOriginalExtension());
                $img_name=$name_gen.' . '.$img_ext;
                $up_location='img/brand/';
                $last_img=$up_location.$img_name;
                $brand_image->move($up_location,$img_name);

                unlink($old_img);


                Brand::find($id)->update([

                    'brand_name'=>$request->brand_name,
                    'brand_image'=> $last_img,
                    'created_at'=>Carbon::now(),
                ]);


                return Redirect()->route('all.brand')->with('success','Category Inserted');





            }






    }




