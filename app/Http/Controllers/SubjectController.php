<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects=Subject::paginate(20);
        return view('subjects.index',['subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   //must be login to show data
        if(!Auth::user()){
            return Redirect::route('login');
        }
        $this->authorize('create',Subject::class);

        $department=Department::get();
        return view('subjects.create',['departments'=>$department]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::user()){
            return Redirect::route('login');
        }
        $this->authorize('create',Subject::class);

        $formFiled=$request->validate([
            'name'=>'required',
            'code'=>'required',
            'department_id'=>'required',
          ]);
         Subject::create($formFiled);
         return Redirect::route('subjects.index')->with('status','تم اضافة المادة بنجاح');
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
    public function edit(Subject $subject)
    {
        if(!Auth::user()){
            return Redirect::route('login');
        }
        $department=Department::get();
        return view('subjects.edit',['subject'=>$subject,'departments'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Subject $subject)
    {
        if(!Auth::user()){
            return Redirect::route('login');
        }

        $this->authorize('update',Subject::class);
        // $this->authorize('update-subject');
        // if(!Gate::allows('update-subject')){
        //     return 'You Are Not ADMIN';
        // }
        
        $formFiled=$request->validate([
            'name'=>'required',
            'code'=>'required',
            'department_id'=>'required',
          ]);
               $subject->update($formFiled);
               return Redirect::route('subjects.show',$subject->id);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        if(!Auth::user()){
            return Redirect::route('login');
        }
        $subject->delete();
        return Redirect::route('subjects.index')->with('status','تم حذف المادة بنجاح');
    }
}
