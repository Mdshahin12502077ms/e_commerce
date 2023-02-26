<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catmodel;
use App\Models\subcatModel;
use Illuminate\Support\Facades\DB;


class subcatController extends Controller
{
    function show_subcat(Request $req){
      
          $data =subcatModel::join('categories', 'subcat.cat_id','=','categories.id')
          
          ->select('subcat.*', 'categories.cat_name')
          ->get();
          //dd($data);
           $catmodel=new catmodel();
          $catdata=$catmodel->get();
          return view('admin.sub_cat',["data"=>$data,"catdata"=>$catdata]);
          
        //  return view('admin.sub_cat',["data"=>$data]);

      }
      function insert(Request $req){
        $cat_id=$req->cat_id;
        $sub_catName=$req->sub_catName;
        $subcatModel=new subcatModel();
        $subcatModel->cat_id=$cat_id;
        $subcatModel->sub_catName=$sub_catName;
        $subcatModel->save();
        return redirect('/create_subcat');
    }

}
