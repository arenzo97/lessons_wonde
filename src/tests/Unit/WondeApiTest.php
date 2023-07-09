<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\WondeSchoolService;
use App\Services\ClientService;

class WondeApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_request_client()
    {
        // $client = new WondeSchoolService();
        // $request = $client->getClient();
        $client = new ClientService('eb7e721ab2a10d42f56d4da4f85b5f5c5c569137:');
        $request = $client->getClient();
        print_r((array)$request);
        $this->assertIsObject($request);
    }
    public function test_request_access_authenticate_school()
    {
        
        $client = new WondeSchoolService();
        $request = $client->getClient();
        $response = (array)$request->requestAccess('A1930499544');
        print_r($response);
        $this->assertContains('approved',$response);
    }

    public function test_authenticate_get_school()
    {
        $client = new \Wonde\Client('eb7e721ab2a10d42f56d4da4f85b5f5c5c569137:');
        $school = (array)$client->schools->get('A1930499544');
        
        print_r($school);
        $this->assertContains('A1930499544',$school);
    }

    public function test_authenticate_get_lessons()
    {
        $client = new \Wonde\Client('eb7e721ab2a10d42f56d4da4f85b5f5c5c569137:');
        $school = $client->school('A1930499544');

        $lessons = $school->lessons->all();
        
        print_r($lessons);
        $this->assertIsObject($lessons);
    }
}