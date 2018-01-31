@extends('layouts.app')

@section('content')

<div id="home">

	<div class="box">
	<h1 class="title"> Recent incomings</h1>
	<notification></notification>
	</div>

	<expenselist></expenselist>

</div>
@endsection
