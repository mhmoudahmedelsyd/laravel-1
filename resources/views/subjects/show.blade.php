@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subject Details') }}</div>

                <div class="card-body">
     
<h5>
    {{$subject->name}}
</h5>
{{$subject->code}}
<br>
<h5>{{$subject->department->name}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

