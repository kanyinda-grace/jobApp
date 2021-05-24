<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Resources\FavoriteResource;

class FavoriteController extends Controller
{
     public function index(Request $request)
    {
        $user = $request->user();
        return new FavoriteCollection($user->favorites);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param FavoriteRequest $request
     * @return FavoriteResource
     */
    public function store(FavoriteRequest $request)
    {
        $favorite = Favorite::create([
           'user_id' => $request->user_id,
           'opportunity_id' => $request->opportunity_id
        ]);

        return new FavoriteResource($favorite);
    }

    /**
     * Display the specified resource.
     *
     * @param Favorite $favorite
     * @return FavoriteResource
     */
    public function show(Favorite $favorite)
    {
        return new FavoriteResource($favorite);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param FavoriteRequest $request
     * @param Favorite $favorite
     * @return FavoriteResource
     */
    public function update(FavoriteRequest $request, Favorite $favorite)
    {
        $favorite->update([
            'user_id' => $request->user_id,
            'opportunity_id' => $request->opportunity_id
        ]);

        return new FavoriteResource($favorite);
    }
}
