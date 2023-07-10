<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;

class StudentsController extends Controller
{
    public function index()
    {
        $client = new ClientService('eb7e721ab2a10d42f56d4da4f85b5f5c5c569137:');
        $request = $client->getClient();
        $this->school = $request->school('A1930499544');

        $class = $this->getClass('A1625219959');
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