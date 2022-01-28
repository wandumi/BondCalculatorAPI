<?php

namespace App\Http\Controllers;

use App\Models\BondSettings;
use Illuminate\Http\Request;
use App\Http\Resources\BondSettingResource;
use Symfony\Component\HttpFoundation\Response;

class BondSettingsController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BondSettingResource::collection(BondSettings::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bondSetting = BondSettings::create($request->only(
            'post_petties','search_fee','rates_application'
        )); 

        return response(new BondSettingResource($bondSetting), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BondSettings  $bondSettings
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new BondSettingResource(BondSettings::find($id));
    }

 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BondSettings  $bondSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bondSetting = BondSettings::find($id);

        $bondSetting->update($request->only(
            'post_petties','search_fee','rates_application'
        ));

        return response($bondSetting, Response::HTTP_ACCEPTED);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BondSettings  $bondSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BondSettings::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
