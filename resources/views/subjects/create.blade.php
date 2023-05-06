@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Subject') }}</div>

                <div class="card-body">
                    <form action="/subjects" method="POST">
                        @csrf
                    <div>
                    <label for="">Subject Name</label>
                        <input class="form-control" type="text" name="name" value="{{old('name')}}">
                        @error('name')
                        <div class="text text-danger">{{$message}}</div>
                     @enderror
                    </div>
                    
                    <div>
                    <label for="">Subject code</label>
                        <input class="form-control" type="text" name="code" value="{{old('code')}}">
                        @error('code')
                           <div class="text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div>
                    <label for="">Department</label>
                    <select class="form-select" name="department_id" >
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>" 
                    
                    @endforeach
                    </select>
                    </div>
                    <br>
                    <button class="btn btn-success type="submit">Save</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
