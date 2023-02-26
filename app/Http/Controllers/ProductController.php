<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catmodel;
use App\Models\subcatModel;
use App\Models\product_dtlsModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catmodel=new catmodel();
        $catdata=$catmodel->get();
        $subcatModel=new subcatModel();
        $subcatData=$subcatModel->get();
        return view('admin.Product',compact('catdata','subcatData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cat_ajax($id)
    { //
        $all_data =subcatModel::join('categories', 'subcat.cat_id','=','categories.id')
          
        ->select('subcat.*', 'categories.cat_name')->where('cat_id',$id)
        ->get();

       return response()->json($all_data);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat_id= $request->input('cat_id');
        $sub_cat_id= $request->input('sub_cat_id');
        $prod_name= $request->input('prod_name');
        $prod_desc=$request->input('prod_description');

        $weight= $request->input('weight');
        $price= $request->input('price');
        $img= $request->file('prod_image')->store('public/images');
        $prod = new product_dtlsModel();
        $prod->cat_id=$cat_id;
        $prod->sub_cat_id=$sub_cat_id;
        $prod->prod_name=$prod_name;
        $prod->prod_desc=$prod_desc;
        $prod->prod_image=$img;
        $prod->prod_weight=$weight;
        $prod->prod_price=$price;

        $prod->save();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
