<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qualification;
use App\Http\Requests\Admin\QualificationRequest;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEducation()
    {
        $educations = Qualification::where('type', ['Education'])->orderBy('id')->get();
        return view('admin.qualification.edu', compact('educations'));
    }

    public function showExperience()
    {
        $experiences = Qualification::where('type', ['Work'])->orderBy('id')->get();
        return view('admin.qualification.exp', compact('experiences'));
    }

    public function index()
    {
        $qualifications = Qualification::all();
        return view('admin.qualification.index', compact('qualifications'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.qualification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\QualificationRequest  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(QualificationRequest $request)
    {
        Qualification::create($request->validated());
        return to_route('admin.qualification.edu')->with('message', 'New Qualification Added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        return view('admin.qualification.edit', compact('qualification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\QualificationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QualificationRequest $request, Qualification $qualification)
    {
        $qualification->update($request->validated());

        if ($request['type'] == 'Education') {
            return to_route('admin.qualification.edu')->with('message', 'Education Updated');
        } else {
            return to_route('admin.qualification.exp')->with('message', 'Experience Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qualification $qualification)
    {
        $qualification->delete();

        return back()->with('message', 'Qualification Deleted');
    }
}
