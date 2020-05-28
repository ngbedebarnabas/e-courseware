<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Faculty;
use App\Department;
use Illuminate\Support\Facades\Storage;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questions.index')->with([
            'questions' => Question::simplePaginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create')->with([
            'faculties' => Faculty::all(),
            'departments' => Department::all(),
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_title' => 'required',
            'front' => 'required',
            'department' => 'required',
            'faculty' => 'required'
        ]);

        $front = $request->front->store('questions');

        if($request->hasFile('back')){
            $back = $request->back->store('questions');
        }else{
            $back = "";
        }

        if($request->hasFile('pdf')){
            $pdf = $request->pdf->store('pdfs');
        }else{
            $pdf = "";
        }

        Question::create([
            'course_title' => $request->course_title,
            'front' => $front,
            'back' => $back,
            'pdf' => $pdf,
            'faculty_id' => $request->faculty,
            'department_id' => $request->department
        ]);

        session()->flash('success', 'Question Has Been Added to Archieve');
        return redirect(route('questions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('single')->with([
            'faculties' => Faculty::all(),
            'departments' => Department::all(),
            'question' => $question
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('questions.create')->with([
            'question' => $question,
            'faculties' => Faculty::all(),
            'departments' => Department::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
       $data = $request->only(['course_title', 'faculty', 'department']);

        if($request->hasFile('front')){
            Storage::delete($question->front);
            $front = $request->front->store('questions');
            $data['front'] = $front;
        }
        if($request->hasFile('back')){
            Storage::delete($question->back);
            $back = $request->back->store('questions');
            $data['back'] = $back;
        }
        if($request->hasFile('pdf')){
            Storage::delete($question->pdf);
            $pdf = $request->pdf->store('pdfs');
            $data['pdf'] = $pdf;
        }

        $question->update($data);

        session()->flash('success', 'Question Updated In Archieve');
        return redirect(route('questions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        session()->flash('success', 'Question Delete from Archive Successfully');
        return redirect(route('questions.index'));
    }

    public function faculty(Faculty $faculty)
    {
            return view('faculty.questions')->with([
            'faculties' => Faculty::all(),
            'departments' => Department::all(),
            'questions' => $faculty->questions()->searched()->simplePaginate(4),
            'faculty' => $faculty,

        ]);
    }

    public function department(Department $department)
    {
        return view('department.question')->with([
        'faculties' => Faculty::all(),
        'departments' => Department::all(),
        'questions' => $department->questions()->searched()->simplePaginate(4),
        'department' => $department,

        ]);
        
    }
}
