

@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h1><a href = "{{ url('/') }}"><i class="fa fa-chevron-left" data-toggle="tooltip" title="Back to Wodroller"></i></a> About Jorgezar World of Darkness Dice Roller</h1>

<div>
<h3>What is Wodroller?</h3>
<p>Wodroller is designed to calculate successes distribution in White Wolf's World of Darkness Role Playing Game. </p>
<h3>How does Wodroller Work?</h3>
<p>It has four parameters to set:</p>
<ul>
	<li>Dicepool. Number od d10 dice to roll.</li>
	<li>Difficulty. In order to be a success, die roll has to meet the required difficulty level. E.g. for difficulty <code>7</code>, sixes are unsuccessful, sevens are counted as success.</li>
	<li>Exploding 10s. When set, every result of 10 gets to be rerolled. Tens on rerolls get further rerolls.</li>
	<li>Botching 1s. When set, every result of 1 deducts one success from the roll result. This can result in a negative total number of successes. We've all been there at some point in the course of our campaigns!</li>
</ul>
<h3>World of Darkness Chronicles compatibility</h3>
<p>This program can be used for the new World of Darkness as well. Just set difficulty level to 8 (nWoD has fixed roll difficulty) and disable botching 1s (nWoD does not deduct successes on 1s).</p>

</div>
@endsection

