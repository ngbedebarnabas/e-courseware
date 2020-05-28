<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;

class FacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faculty.index')->with([
            'faculties' => Faculty::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculty.create');
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
            'name' => 'required|unique:faculties'
        ]);

        Faculty::create([

            'name'  => $request->name
        ]);

        session()->flash('success', 'Faculty Created Successfully');
        return redirect(route('faculty.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        return view('faculty.create')->with([
            'faculty' => $faculty
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $this->validate($request, [
            'name' => 'required|unique:faculties'
        ]);

        $faculty->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Faculty Updated Successfully');
        return redirect(route('faculty.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        if($faculty->questions->count() > 0){
            session()->flash('error', 'Cannot Delete Faculty. Some questions are associated with It');
            return redirect(route('faculty.index'));
        }else{
            $faculty->delete();
            session()->flash('success', 'Faculty Deleted Successfully');
            return redirect(route('faculty.index'));
        }
    }
}
