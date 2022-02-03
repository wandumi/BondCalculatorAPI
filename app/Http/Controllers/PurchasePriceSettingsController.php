<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchasePriceSettings;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\PurchasePriceSettingResource;

class PurchasePriceSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PurchasePriceSettingResource::collection(PurchasePriceSettings::paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $PurchasePrice = PurchasePriceSettings::create($request->only(
            'start_amount','end_amount','vat_amount','rate_applications','korbitec_gen_fee'
        )); 

        return response(new PurchasePriceSettingResource($PurchasePrice), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PurchasePriceSettingResource(PurchasePriceSettings::find($id));
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
        $PurchasePrice = PurchasePriceSettings::find($id);

        $PurchasePrice->update($request->only(
            'start_amount','end_amount','vat_amount','rate_applications','korbitec_gen_fee'
        ));

        return new PurchasePriceSettingResource($PurchasePrice, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PurchasePriceSettings::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

