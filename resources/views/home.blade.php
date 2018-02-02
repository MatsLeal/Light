@extends('layouts.app')

@section('content')

<div id="home" class="container">


	<div class="box">
	<h1 class="title"> Recent expenses</h1>
	</div>
	<notification></notification>
	<expence-create></expence-create>
	<expense-list></expense-list>

</div>
@endsection
