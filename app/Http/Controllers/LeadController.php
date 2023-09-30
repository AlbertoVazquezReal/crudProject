<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Lead;
use App\Http\Requests\StoreLeadRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UpdateLeadRequest;
use App\Repositories\LeadRepository;
use App\Repositories\ClientRepository;


class LeadController extends Controller

{   

    public function index()
    {
        try {
            $leads = Lead::all();
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'data' => $leads,
            'message' => 'Succeed'
        ], JsonResponse::HTTP_OK);
    }


public function show($id)
{
    try {

        $lead = Lead::find($id);
    
        if($lead){
            return response()->json([
                'data' => $lead,
                'message' => 'Succeed'
            ], JsonResponse::HTTP_OK);
        }else{
            return response()->json([
                'message' => 'Lead not found.'
            ], JsonResponse::HTTP_OK);
        }

    } catch (Exception $e) {
        return response()->json([
            'data' => [],
            'message'=>$e->getMessage()
        ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }


}

public function store(StoreLeadRequest $request)
{
    try {

        $leadRepository = new LeadRepository;
        $leadInfo = $leadRepository->create($request);

        $clientRepository = new ClientRepository;
        $clientRepository->create($leadInfo);

    } catch (Exception $e) {

        return response()->json([
            'data' => [],
            'message'=>$e->getMessage()
        ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    return response()->json([
        'message' => 'Succeed, lead created.'
    ], JsonResponse::HTTP_OK);
}


public function update(UpdateLeadRequest $request, $id)
{
    try {

    $leadId = Lead::find($id);
    
    if($leadId){

        $leadRepository = new LeadRepository;
        $leadRepository->update($request, $leadId);

            return response()->json([
                'message' => 'Succeed, lead updated.'
            ], JsonResponse::HTTP_OK);
    }else{
            return response()->json([
                'message' => 'Lead not found.'
            ], JsonResponse::HTTP_OK);
    }

    } catch (Exception $e) {
        return response()->json([
            'data' => [],
            'message'=>$e->getMessage()
        ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }
}

public function destroy($id)
{
    try {
        $lead = Lead::destroy($id);
    } catch (Exception $e) {
        return response()->json([
            'data' => [],
            'message'=>$e->getMessage()
        ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    if($lead){
        return response()->json([
            'message' => 'Succeed, lead deleted.'
        ], JsonResponse::HTTP_OK);
    }else{
        return response()->json([
            'message' => 'Lead not found.'
        ], JsonResponse::HTTP_OK);
    }

}

}