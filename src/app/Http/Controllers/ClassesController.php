<?php

namespace App\Http\Controllers;
use App\Models\Class;
use Illuminate\Http\Request;
use App\Services\ClientService;

class ClassesController extends Controller
{
    public function index()
    {
        $client = new ClientService('eb7e721ab2a10d42f56d4da4f85b5f5c5c569137:');
        $request = $client->getClient();
        $this->school = $request->school('A1930499544');
        // $teacher = $this->school->employees->get('A269983963',['classes']);

        $teacher = $this->getTeacher();
        $classes = $this->getClasses($teacher);
        
        return view('timetable', ['classes' => $classes]);
    }

    private function getTeacher()
    {
        $teacher_id = 'A269983963';
        $teacher = $this->school->employees->get($teacher_id,['classes']);
        return $teacher;
    }

    public function getClasses($employee)
    {
        $classes = [];
        foreach($employee->classes->data as $class)
        {
            $classes[]=$this->school->classes->get($class->id);
        }
       
        return $classes;
    }
}
