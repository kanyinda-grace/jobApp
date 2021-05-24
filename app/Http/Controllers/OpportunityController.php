<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Resources\OpportunityCollection;
use App\Models\Opportunity;
use App\Http\Resources\OpportunityResource;
class OpportunityController extends Controller
{
    public function index(){
    	return new OpportunityCollection(Opportunity::paginate(10));
    }
    public function show(Opportunity $opportunity){
        return new OpportunityResource($opportunity);
    }

    public function store(OpportunityStore $request){
    	$opportunity = Opportunity::create([
      'title'=>$request->title,
      'description'=>$request->description,
      'category_id'=>$request->categoryId,
      'country_id'=>$request->countryId,
      'deadline'=>$request->deadline,
      'organizer'=>$request->organizer,
      'created_by'=>$request->createdBy,
    	]);

    	return new OpportunityResource($opportunity);
    }
}
