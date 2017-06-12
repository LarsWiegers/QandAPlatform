@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                @foreach($question as $item)
                <div class="panel-heading question">
                    <div class="question__title">
                        {{$item->title}}
                    </div>
                    <div class="question__created_date">
                        Created on : {{$item->created_at}}
                    </div>
                    <div class="question__updated_date">
                        last updated on : {{$item->updated_at}}
                    </div>
                </div>
                <div class="panel-body">
                        {{$item->question}}
                </div>
            </div>
                @endforeach
            @for ($i = 0; $i < count($answers); $i++)
                        <div class="panel panel-default">
                            <div class="panel-heading question">
                                <div class="question__title">
                                    {{$users[$i][0]->name}}
                                </div>
                                <div class="question__created_date">
                                    Created on : {{$answers[$i]->created_at}}
                                </div>
                                <div class="question__updated_date">
                                    last updated on : {{$answers[$i]->updated_at}}
                                </div>

                            </div>

                            <div class="panel-body">
                                {{$answers[$i]->answer}}
                            </div>
                        </div>
                @endfor
            <div class="panel panel-default">
                <div class="panel-heading">Add your Answer</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('add-a-answer') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Answer</label>

                            <div class="col-md-6">
                                <textarea id="question" class="form-control" name="answer" required></textarea>

                                @if ($errors->has('question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @foreach($question as $item)
                            <input type="hidden" value="{{$item->id}}" name="question_id">
                        @endforeach
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
