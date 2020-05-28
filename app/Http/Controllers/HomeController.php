<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use App\Department;
use App\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $search = request()->query('search');

        $questions = Question::where('course_title', 'LIKE', "%{$search}%");

        return view('home')->with([
            'faculties' => Faculty::all(),
            'departments' => Department::all(),
            'questions' => $questions->simplePaginate(6),

        ]);
    }

}
