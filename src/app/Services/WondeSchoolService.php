<?php
 
namespace App\Services;
 
 
class WondeSchoolService
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public $client;

    public function __construct()
    {
        $api_key = 'eb7e721ab2a10d42f56d4da4f85b5f5c5c569137:';

        $wonde_client = new \Wonde\Client($api_key);
        $this->client = $wonde_client;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getRequestAccess()
    {
        $request = $this->client;
        $response = $request->requestAccess('A1930499544');
        return $response;
    }
    public function getSchool(Request $request): array
    {
        $client = new \Wonde\Client('eb7e721ab2a10d42f56d4da4f85b5f5c5c569137:');
        $response = $client->requestAccess('A1930499544');
        return $response;
    }
}