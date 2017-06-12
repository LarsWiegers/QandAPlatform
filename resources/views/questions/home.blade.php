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
@endsection
