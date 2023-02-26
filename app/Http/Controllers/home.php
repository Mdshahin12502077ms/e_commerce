<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catmodel;
use App\Models\subcatModel;
use Illuminate\Support\Facades\DB;

class home extends Controller
{
    function home(){

        //dd($data);
        $catmodel=new catmodel();
        $catdata=$catmodel->get();
        $data=subcatModel::with(['category'])->get()->groupBy('cat_id');
      // return view('admin.sub_cat',["data"=>$data]);
        return view('home.home',["data"=>$data]);
    }

}
