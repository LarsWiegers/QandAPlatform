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
            </div>
        </div>
    </div>
</div>
@endsection
