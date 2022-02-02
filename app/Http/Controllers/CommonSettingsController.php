<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonSettings;
use App\Http\Resources\CommonSettingsResource;
use Symfony\Component\HttpFoundation\Response;

class CommonSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CommonSettingsResource::collection(CommonSettings::paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commonSettings = CommonSettings::create($request->only(
            'vat_amount',
            'deeds_office',
            'tarrif_fee',
            'post_petties',
            'search_fee'
        )); 

        return response(new CommonSettingsResource($commonSettings), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommonSettings  $commonSettings
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CommonSettingsResource(CommonSettings::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommonSettings  $commonSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $commonSettings = CommonSettings::find($id);

        $commonSettings->update($request->only(
            'vat_amount',
            'deeds_office',
            'tarrif_fee',
            'post_petties',
            'search_fee'
        ));

        return new CommonSettingsResource($commonSettings, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommonSettings  $commonSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CommonSettings::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
