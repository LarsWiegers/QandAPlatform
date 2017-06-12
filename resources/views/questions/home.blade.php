@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Questions</div>

                <div class="panel-body">
                       @foreach($questions as $question)
                           <div class="questions">
                               <div class="questions__id">{{$question->id}}</div>
                               <div class="questions__title">
                                   <a href="/question/{{$question->id}}/{{$question->title}}">
                                       {{$question->title}}
                                   </a>
                               </div>
                               <div class="questions__created_date">{{$question->created_at}}</div>
                               <div class="questions__updated_date">{{$question->updated_at}}</div>
                           </div>
                       @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default order-by">
    <div class="panel-heading">Order by</div>

    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('add-a-question') }}">
            {{ csrf_field() }}


            <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                <label for="password" class="col-md-12 control-label">Question</label>

                <div class="col-md-12">
                    <textarea id="question" class="form-control" name="question" required></textarea>

                    @if ($errors->has('question'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
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
@endsection
