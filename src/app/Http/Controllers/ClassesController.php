<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Services\ClientService;

class ClassesController extends Controller
{
    public function index($teacher_id)
    {
        $wondeApiKey = $_ENV['WONDE_API_KEY'];
        $wondeSchoolKey = $_ENV['WONDE_SCHOOL_KEY'];
        $client = new ClientService($wondeApiKey);
        $request = $client->getClient();
        $this->school = $request->school($wondeSchoolKey);

        $teacher = $this->getTeacher($teacher_id);
        $classes = $this->getClasses($teacher);
        $lessons = [];
        
        foreach($classes as $class)
        {
            $lessonData=[];
            $lessonData['id'] = $class->id;
            $lessonData['name'] = $class->name;
            foreach ($class->lessons->data as $lesson) {
                $lesson_starttime = strtotime($lesson->start_at->date);
                $formatted_starttime = date('D d-m-Y H:i:s',$lesson_starttime);
                $lessonData['start_at'] = $formatted_starttime;
                $lessons[] = $lessonData;
            }
            
        }
        usort($lessons, function ($a, $b) {
            $dateA = strtotime($a['start_at']);
            $dateB = strtotime($b['start_at']);
        
            return $dateA - $dateB;
        });
        
        return view('timetable', ['classes' => $lessons]);
    }

    private function getTeacher($teacher_id)
    {
        $teacher = $this->school->employees->get($teacher_id,['classes']);
        return $teacher;
    }

    public function getClasses($employee)
    {
        $classes = [];
        foreach($employee->classes->data as $class)
        {
            $classes[]=$this->school->classes->get($class->id,['lessons']);
        }
       
        return $classes;
    }
}
