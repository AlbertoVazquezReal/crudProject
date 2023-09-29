<?php

namespace App\Repositories;
use App\Models\Client;

class ClientRepository{
    public function create($clientData)
    {
        $client = new Client;
        $client->lead_id = $clientData->id;
        $client->email = $clientData->email;
        $client->save();
    }
}
