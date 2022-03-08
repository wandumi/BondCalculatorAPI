<?php

namespace App\Http\Controllers;

use App\Models\Transferduty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TransferdutyRequest;
use App\Http\Resources\TransferDutyResource;
use Symfony\Component\HttpFoundation\Response;

class TransferdutyController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(Transferduty::class, 'transferduty');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TransferDutyResource::collection(Transferduty::where('user_id',auth::user()->id)->paginate(10));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransferdutyRequest $request)
    {

        $transferduty = auth::user()->transfers()->create($request->only(
            'start_amount','end_amount','rates','rate_amount','description'
        )); 

        return response(new TransferdutyResource($transferduty), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transferduty  $transferduty
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TransferdutyResource(Transferduty::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transferduty  $transferduty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transferduty $transferduty)
    {
        $transferduty = Transferduty::find(Auth::user()->id);

        $transferduty->update($request->only(
            'start_amount','end_amount','rates','rate_amount','description'
        ));

        return new TransferDutyResource($transferduty, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transferduty  $transferduty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transferduty::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
