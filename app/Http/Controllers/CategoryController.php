<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
 use Illuminate\Database\Eloquent\SoftDeletes;



class CategoryController extends Controller
{
   public function AllCat(){



        //  $categories = Category::latest()->get();

         $trashCat= Category::onlyTrashed()->latest()->get();



    $categories = DB::table('categories')->join('users','categories.user_id','users.id')
   ->select('categories.*','users.name') ->latest()->get();

    return view('admin.category.index',compact('categories','trashCat'));
   }



   public function AddCat(Request $request){

     $request->validate([
        'category_name' => 'required|max:255',

    ],
    [
         'category_name.required' => 'Plese input category Name',

    ]);


          Category::insert([
         'category_name' => $request->category_name,
          'user_id' =>Auth::user()->id,
          'created_at' =>Carbon::now(),



    ]);






    //  $data = array();
    //  $data['category_name'] = $request->category_name;
    //  $data['user_id'] = Auth::user()->id;


    //  DB::table('categories')->insert($data);




     return Redirect()->back()->with('success','Category Inserted');



   }

//    edit


public function Edit($id){
   $categories= Category::find($id);
   return view('admin.category.edit',compact('categories'));




}

// update

public function update(Request $request,$id){
    $update=Category::find($id)->update([
        'category_name'=> $request->category_name,
        'user_id' => Auth::user()->id



    ]);
     return Redirect()->route('all.category')->with('success','Category Updated');


}

// softDelete





     public function softDelete($id){
    $delete = Category::find($id)->delete();


     return Redirect()->back('')->with('success','Category Deleted');

}







}
