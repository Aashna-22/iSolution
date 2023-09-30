<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Student;

class StudentController extends BaseController
{
    public function index()
    {
        $student = new Student();
        $data['students'] = $student->orderBy('id', 'DESC')->findAll();
        return view('student/index', $data);
    }
    public function create()
    {
        return view('student/create');   
    }

    public function store()
    {
        $student = new Student();
        $validationRules = [
            'email' => 'required||is_unique_email[students.email]', 
        ];

            $data = [
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'course' => $this->request->getVar('course'),
            ];
            $student->insert($data);
        
        return $this->response->redirect(site_url('/'));
    }

    public function edit($id = null)
    {
        $student = new Student();
        $data['students'] = $student->where('id', $id)->first();
        return view('student/create', $data);
    }

    public function update()
    {
        $student = new Student();
        $id = $this->request->getVar('student_id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'mobile' => $this->request->getVar('mobile'),
            'course' => $this->request->getVar('course'),
        ];
        $student->update($id, $data);
        return $this->response->redirect(site_url('/'));
    }

    public function show($id = null)
    {
        $student = new Student();
        $data['students'] = $student->where('id', $id)->first();
        return view('student/view', $data);

    }

    public function delete($id = null)
    {
        $student = new Student();
        $data['students'] = $student->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/'));
    }
}
