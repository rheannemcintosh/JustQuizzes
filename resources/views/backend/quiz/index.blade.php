@extends ('backend.layouts.master')

@section('title', 'create quiz')

@section('content')
    
    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="module">
                <div class="module-head">
                    <h3>All Quizzes</h3>
                </div>

                <div class="module-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Minutes</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($quizzes)>0)
                                @foreach($quizzes as $key=>$quiz)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $quiz->name }}</td>
                                        <td>{{ $quiz->description }}</td>
                                        <td>{{ $quiz->minutes }}</td>
                                        <td>
                                            <a href="{{ route('quiz.edit', [$quiz->id]) }}">
                                                <button class="btn btn-primary">
                                                    Edit
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="">
                                                <button class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </a>
                                        </td>
                                    <tr>
                                @endforeach
                            @else
                                <td colspan="4">No quizzes to display</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection