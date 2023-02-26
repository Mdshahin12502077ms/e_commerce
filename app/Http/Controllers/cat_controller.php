<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catmodel;
class cat_controller extends Controller
{
  function show(Request $req){
    //  $cat_name=$req->cat_name;
      // return view('admin.cat',compact('cat_name'));
      $catmodel=new catmodel();
      $catdata=$catmodel->get();
      
     return view('admin.cat',["catdata"=>$catdata]);
  }
    function createcat(Request $req){
      //  $cat_name=$req->cat_name;
        // return view('admin.cat',compact('cat_name'));
       return view('/admin.cat');
    }

    function insert(Request $req){
      $cat_name=$req->cat_name;
      $catmodel=new catmodel();
      $catmodel->cat_name=$cat_name;
      $catmodel->save();
      return redirect('/show_cat');
  }
  function edit($id){
    $catmodel=new catmodel();
      $catdata=$catmodel->where('id',$id)->get();
      
     return view('admin.cat_edit',["cat_data"=>$catdata]);
    
  }

  function update(Request $req){
    $cat_id=$req->cat_id;
    $cat_name=$req->cat_name;
    $catmodel= catmodel::find($cat_id);
      // $catdata=$catmodel->where('id',$cat_id)->get();
      $catmodel->cat_name=$cat_name;
      $catmodel->save();
      
      return redirect('/show_cat');
    
  }

  function delete($id){
    $catmodel=new catmodel();
    $catdata=$catmodel->where('id',$id)->delete();
      
      // $catmodel->delete();
      
      return redirect('/show_cat');
    
  }
}
