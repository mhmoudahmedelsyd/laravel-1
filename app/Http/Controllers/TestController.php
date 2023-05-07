<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $subject=Subject::all();
      return response()->json($subject);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        subject::create($request->all());
        return response()->json(['message'=>'created successfully'],200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject=Subject::where('id','=',$id)->with('Department')->first();
        return view('subjects.show',
        [
            'subject'=>$subject,
          
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
