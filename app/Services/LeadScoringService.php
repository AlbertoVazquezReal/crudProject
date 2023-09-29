<?php

namespace App\Services;

class LeadScoringService
{
    public function generateLeadScore(){
        $score = random_int(0, 10);
    return $score;
    }
    
}

