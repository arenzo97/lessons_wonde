<?php
 
namespace App\Services;
 
 
class ClientService
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public $client;

    public function __construct($api_key)
    {

        $wonde_client = new \Wonde\Client($api_key);
        $this->client = $wonde_client;
    }

    public function getClient()
    {
        return $this->client;
    }
    public function getSchool()
    {
        return $this->client->school;
    }

}