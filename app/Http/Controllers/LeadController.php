<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Client;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Repositories\LeadRepository;
use App\Repositories\ClientRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LeadController extends Controller

{   
    public function index(): View
    {

    $leads = lead::latest()->paginate(5);

    return view('leads.index',compact('leads'))
                ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create(): View
    {
        return view('leads.create');
    }

    public function show(lead $lead): View
    {
        return view('leads.show',compact('lead'));
    }

    

    public function store(StoreLeadRequest $request, LeadRepository $leadRepository){

        $leadInfo = $leadRepository->create($request);

        $clientRepository = new ClientRepository;
        $clientRepository->create($leadInfo);

        return redirect()->route('leads.index')
                        ->with('Lead creado correctamente.');
    }
    public function edit(lead $lead): View
    {
        return view('leads.edit',compact('lead'));
    }

    public function update(UpdateLeadRequest $request, lead $lead)
    {
        $leadRepository = new LeadRepository ;
        $leadRepository->update($request,$lead);

        return redirect()->route('leads.index')
                        ->with('Lead actualizado correctamente.');

    }

    public function destroy(Lead $lead, Client $client): RedirectResponse
    {
        $lead->delete();
        $client->delete();
        return redirect()->route('leads.index')
                        ->with('Lead eliminado correctamente.');
    }

}