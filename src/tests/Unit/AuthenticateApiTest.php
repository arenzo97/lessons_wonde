<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AuthenticateApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }
    
    public function test_authenticate_school()
    {
        $client = new \Wonde\Client('eb7e721ab2a10d42f56d4da4f85b5f5c5c569137:');
        $response = (array)$client->requestAccess('A1930499544');
        print_r($response);
        $this->assertContains('approved',$response);
    }
}
