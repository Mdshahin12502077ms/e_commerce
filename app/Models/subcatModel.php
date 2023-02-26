<?php

namespace App\Models;
use App\Http\Controllers\subcatController;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class subcatModel extends Model
{  
   use HasFactory;
   protected $table="subcat";
   public function category(){
      return $this->belongsTo(catmodel::class,'cat_id');
   }
}
