<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpportunityDetail;
use App\Http\Resources\OpportunityDetailResource;
use App\Http\Resources\OpportunityDetailCollection;
class OpportunityDetailController extends Controller
{
     public function store(OpportunityDetailsRequest $request)
    {

        $opportunityDetail = OpportunityDetail::create([
            'opportunity_id' => $request->opportunityId,
            'benefits' => $request->benefits,
            'application_process' => $request->applicationProcess,
            'eligibilities' => $request->eligibilities,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'official_link' => $request->officialLink,
            'further_queries' => $request->furtherQueries,
            'eligible_regions' => json_encode($request->eligibleRegions)
        ]);

        return new OpportunityDetailResource($opportunityDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param OpportunityDetail $opportunityDetail
     * @return OpportunityDetailResource
     */
    public function show(OpportunityDetail $opportunityDetail)
    {
        return new OpportunityDetailResource($opportunityDetail);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param OpportunityDetailsRequest $request
     * @param OpportunityDetail $opportunityDetail
     * @return OpportunityDetailResource
     */
    public function update(OpportunityDetailsRequest $request, OpportunityDetail $opportunityDetail)
    {
        $opportunityDetail->update([
            'opportunity_id' => $request->opportunityId,
            'benefits' => $request->benefits,
            'application_process' => $request->applicationProcess,
            'eligibilities' => $request->eligibilities,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'official_link' => $request->officialLink,
            'further_queries' => $request->furtherQueries,
            'eligible_regions' => json_encode($request->eligibleRegions)
        ]);

        return new OpportunityDetailResource($opportunityDetail);
    }
}
