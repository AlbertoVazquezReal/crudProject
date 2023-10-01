<?php

namespace Tests\Feature;
use Tests\TestCase;

class LeadControllerTest extends TestCase
{
    public function testCreateLeadOk()
    {
       $response = $this->postJson('/api/leads', [
           'name' => 'TestLead',
           'email' => 'testLead@gmail.com',
           'phone' => '630630630'
       ]);
    
       $response->assertStatus(201);
    }

    public function testCreateLeadNotFail()
    {
       $response = $this->postJson('/api/leads', [
           'name' => 'TestLead',
           'email' => 'testLeadgmail.com',
           'phone' => '630630630'
       ]);
    
       $response->assertStatus(400);
    }

    public function testUpdateLeadOk()
    {
    $response = $this->putJson('/api/leads/1', [
        'name' => 'TestLead2',
        'email' => 'testLead2@gmail.com',
        'phone' => '630630630'
    ]);

    $response->assertStatus(200);
    }

    public function testUpdateLeadFailValidation()
    {
    $response = $this->putJson('/api/leads/1', [
        'name' => 'TestLead',
        'email' => 'testLeadgmail.com',
        'phone' => '630630630'
    ]);

    $response->assertStatus(400);
    }

    public function testUpdateLeadFailNoId()
    {
    $response = $this->putJson('/api/leads/2', [
        'name' => 'TestLead',
        'email' => 'testLead@gmail.com',
        'phone' => '630630630'
    ]);

    $response->assertStatus(404);
    }
    public function testShowAllLeadsOk()
    {
       $response = $this->getJson('/api/leads', []);
    
       $response->assertStatus(200);
    }

    public function testShowAnLeadOK()
    {
       $response = $this->getJson('/api/leads/1', []);
    
       $response->assertStatus(200);
    }

    public function testShowAnLeadFail()
    {
       $response = $this->getJson('/api/leads/2', []);
    
       $response->assertStatus(404);
    }

    public function testDeleteAnLeadOK()
    {
       $response = $this->deleteJson('/api/leads/1', []);
    
       $response->assertStatus(200);
    }

    public function testDeleteAnLeadFail()
    {
       $response = $this->deleteJson('/api/leads/2', []);
    
       $response->assertStatus(404);
    }

}
