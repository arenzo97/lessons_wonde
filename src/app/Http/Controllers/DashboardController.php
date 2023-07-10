<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Models\Teacher;

class DashboardController extends Controller
{
    public function index()
    {
        $wondeApiKey = $_ENV['WONDE_API_KEY'];
        $wondeSchoolKey = $_ENV['WONDE_SCHOOL_KEY'];
        $client = new ClientService($wondeApiKey);
        $request = $client->getClient();
        $this->school = $request->school($wondeSchoolKey);

        // $teacher = $this->getTeacher($teacher_id);
        $employees = $this->school->employees->all();

        $teachers = [];

        foreach($employees as $employee)
        {
            $teacherData = [];
            $teacherData['id'] = $employee->id;
            $teacherData['forename'] = $employee->forename;
            $teacherData['surname'] = $employee->surname;

            $teachers[] = $teacherData;

        }
    
        return view('dashboard', ['teachers' => $teachers]);
    }

}