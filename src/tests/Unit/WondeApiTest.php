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
        
        $wondeApiKey = $_ENV['WONDE_API_KEY'];
        $wondeSchoolKey = $_ENV['WONDE_SCHOOL_KEY'];
        $client = new ClientService($wondeApiKey);
        $request = $client->getClient();
        $this->assertIsObject($request);
    }
    public function test_request_access_authenticate_school()
    {
        $wondeApiKey = $_ENV['WONDE_API_KEY'];
        $wondeSchoolKey = $_ENV['WONDE_SCHOOL_KEY'];
        $client = new ClientService($wondeApiKey);
        $request = $client->getClient();
        $response = (array)$request->requestAccess($wondeSchoolKey);
        $this->assertContains('approved',$response);
    }

    public function test_get_school()
    {
        $wondeApiKey = $_ENV['WONDE_API_KEY'];
        $wondeSchoolKey = $_ENV['WONDE_SCHOOL_KEY'];
        $client = new ClientService($wondeApiKey);
        $request = $client->getClient();
        $school = (array)$request->schools->get($wondeSchoolKey);
        
        $this->assertContains('A1930499544',$school);
    }

    public function test_get_teachers()
    {
        $wondeApiKey = $_ENV['WONDE_API_KEY'];
        $wondeSchoolKey = $_ENV['WONDE_SCHOOL_KEY'];
        $client = new ClientService($wondeApiKey);
        $request = $client->getClient();
        $this->school = $request->school($wondeSchoolKey);
        // Get teachers
        $teachers = $this->school->employees->all();

        // print_r(json_decode(json_encode($teachers)));
        $this->assertIsObject($teachers);
    }

    public function test_get_teacher_classes()
    {
        $wondeApiKey = $_ENV['WONDE_API_KEY'];
        $wondeSchoolKey = $_ENV['WONDE_SCHOOL_KEY'];
        $client = new ClientService($wondeApiKey);
        $request = $client->getClient();
        $this->school = $request->school($wondeSchoolKey);
        // Get classes
        $teacher = $this->school->employees->get('A269983963',['classes']);


        // // print_r(json_decode(json_encode($teacher)));
        $this->assertIsObject($teacher);
    }

    public function test_get_classes()
    {
        $wondeApiKey = $_ENV['WONDE_API_KEY'];
        $wondeSchoolKey = $_ENV['WONDE_SCHOOL_KEY'];
        $client = new ClientService($wondeApiKey);
        $request = $client->getClient();
        $this->school = $request->school($wondeSchoolKey);
        // Get classes
        $teacher = $this->school->employees->get('A269983963',['classes']);
        $classes = [];
        foreach($teacher->classes->data as $class)
        {
            $classes[]=$this->school->classes->get($class->id);
        }
       
        $this->assertIsObject($teacher);
    }
    public function test_get_lessons()
    {
        $wondeApiKey = $_ENV['WONDE_API_KEY'];
        $wondeSchoolKey = $_ENV['WONDE_SCHOOL_KEY'];

        $client = new ClientService($wondeApiKey);
        $request = $client->getClient();
        $this->school = $request->school($wondeSchoolKey);
        // Get classes
        $teacher = $this->school->employees->get('A269983963',['classes']);
        $classes = [];
        foreach($teacher->classes->data as $class)
        {
            $classes[]=$this->school->classes->get($class->id,['lessons']);
        }
       
        $this->assertIsArray($classes);
    }
    public function test_get_students()
    {
        $wondeApiKey = $_ENV['WONDE_API_KEY'];
        $wondeSchoolKey = $_ENV['WONDE_SCHOOL_KEY'];
        $client = new ClientService($wondeApiKey);
        $request = $client->getClient();
        $this->school = $request->school($wondeSchoolKey);
        // Get students
        $students = $this->school->students->all();
       
        $this->assertIsObject($students);
    }

}
