<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;

class StudentsController extends Controller
{
    public function index($class_id)
    {
        $wondeApiKey = $_ENV['WONDE_API_KEY'];
        $wondeSchoolKey = $_ENV['WONDE_SCHOOL_KEY'];
        $client = new ClientService($wondeApiKey);
        $request = $client->getClient();
        $this->school = $request->school($wondeSchoolKey);

        $class = $this->getClass($class_id);
        $students = $this->getStudents($class);

        return view('students', ['students' => $students]);
    }

    private function getClass($classId)
    {
        $class = $this->school->classes->get($classId,['students']);
        return $class;
    }

    public function getStudents($class)
    {

        $students = [];
        foreach($class->students->data as $student)
        {
            $students[]=$this->school->students->get($student->id);
        }
       
        return $students;
    }
    
}