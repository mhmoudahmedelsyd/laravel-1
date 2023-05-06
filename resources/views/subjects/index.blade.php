@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Subjects') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div id="myDiv" class="alert alert-success">
                                {{ session('status') }}
                            </div>

                            <script>
                                var divElement = document.getElementById("myDiv");
                                setTimeout(function() {
                                    divElement.style.display = "none";
                                }, 3000);
                            </script>
                        @endif
                        @auth
                      @can('create', App\Subject::class)
                      <h1>
                        <a href="{{ route('subjects.create') }}"> Add New Subject </a>
                    </h1>
                    
                  
                      @endcan
                       
                      
                           
                        @endauth

                        @foreach ($subjects as $subject)
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('subjects.show', $subject->id) }}">
                                    {{ $subject->name }}
                                </a>
                                @auth
                                @can('create', App\Subject::class)
                                <div>
                                    <a href="{{ route('subjects.edit', $subject->id) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-link" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                                @endcan
                                   
                                @endauth

                            </div>
                        @endforeach
                        {{ $subjects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
