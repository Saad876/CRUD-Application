<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function allTeacher()
    {
        return view('admin.category.index');
    }
}
