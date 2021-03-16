@extends('backend.layouts.master')

@section('title', 'Create Question')

@section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <form action="{{ route('quiz.store') }}" method="POST">@csrf
                <div class="module">
                    <div class="module-head">
                        <h3>Create Quiz</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <label class="control-label">Choose Quiz</label>
                            <div class="controls">
                                <select name="quiz" class="span8">
                                    @foreach(App\Models\Quiz::all() as $quiz)
                                        <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
                                    @endforeach

                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="control-label">Question Name</label>
                            <div class="controls">
                                <input type=text name="question" class="span8" placeholder="Please enter name for the quiz" value="{{old('question')}}">
                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="control-label">Options</label>
                            <div class="controls">
                                @for($i=0;$i<4;$i++)
                                    <input type=text name="options[]" class="span6" placeholder="Option {{$i+1}}" required="">
                                    <input type="radio" class="span2" name="correct_answer" value="{{ $i }}"><span>Correct Answer?</span>
                                @endfor
                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="controls">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                </div>
            </form>
        </div>
    </div>

@endsection