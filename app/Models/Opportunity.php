<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Category;
use  App\Models\User;
class Opportunity extends Model
{
    use HasFactory;

    protected $casts=[
    	'deadline'=>'datetime'
    ];
    
   protected $fillable=[
    'title', 'description','category_id','country_id', 'deadline', 'created_by'
   ];



      public function detail()
    {

        return $this->hasOne(OpportunityDetail::class);
    }
    public function category(){
    	return $this->belongsTo(Category::class);
    }
    public function country(){
    	return $this->belongsTo(Country::class);
    }
    public function user(){
    	return $this->belongsTo(User::class , 'created_by');
    }
}
