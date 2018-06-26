

@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <h1>Jorgezar World of Darkness Dice Roller <a href="{{ url('about') }}" data-toggle="tooltip" title="Want to know more?"><i class="fa fa-question-circle" ></i></a></h1>

{!! Form::open([
	'url' => 'wodroll',
	'method' => 'GET', 
	'id' => 'rollForm'
]) !!}

<div class="row">
    <div class = 'form-group col-6'>
    	{{Form::label('title', 'Number of d10 dice')}}
    	{{Form::number('diceNo', 6, [
    		'class' => 'form-control',
    		'min' => 1,
    		'id' => 'diceNo'
    	])}}
    </div>
    <div class = 'form-group col-6'>
    	{{Form::label('title', 'Difficulty level')}}
    	{{Form::number('difficulty', 7, [
    		'class' => 'form-control',
    		'min' => 1,
    		'max' => 10,
    		'id' => 'difficulty'
    	])}}
    </div>
</div>
<div class="form-check">
  {{ Form::checkbox('tenExplode', 1, true, ['class' => 'form-check-input', 'id' => 'tenExplode']) }}
  {{Form::label('tenExplode', 'Exploding 10')}}
</div>  
<div class="form-check">
  {{ Form::checkbox('oneFail', 1, true, ['class' => 'form-check-input', 'id' => 'oneFail']) }}
  {{Form::label('oneFail', 'Botching 1')}}
</div>          
    {{Form::submit('Roll!', ['class' => 'btn btn-primary', 'id' => 'rollSubmit'])}}
{!! Form::close() !!}
<h3 id = "results_label" class = "label_hidden">Results: </h3>
<div id = 'diceroller_results'>
 	
	<canvas id="chart"></canvas>

</div>
@endsection

