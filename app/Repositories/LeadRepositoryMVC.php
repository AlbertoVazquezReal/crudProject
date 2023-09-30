<?php

namespace App\Repositories;
use App\Models\Lead;
use App\Services\LeadScoringService;

class LeadRepository{

    public function create($leadData)
    {
        $leadScoringService = new LeadScoringService;
        $score = $leadScoringService->generateLeadScore();

        $lead = new Lead;
        $lead->name = $leadData->name;
        $lead->email = $leadData->email;
        $lead->phone = $leadData->phone;
        $lead->score = $score;
        $lead->save();
        
        return $lead;
    }

    public function update($leadData, $lead)
    {
        
        $leadScoringService = new LeadScoringService;
        $score = $leadScoringService->generateLeadScore();
        $lead->name = $leadData->name;
        $lead->email = $leadData->email;
        $lead->phone = $leadData->phone;
        $lead->score = $score;
        $lead->update();
    }

}
