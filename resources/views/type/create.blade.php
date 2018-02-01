@extends('layouts.app')

@section('title','Types')

@section('content')
<div id="types" class="container">
	
<div class="box">
	<h1 class="title"> Categories of incomings/expenses</h1>
</div>

<type-create></type-create>
<type-list></type-list>


</div>
@endsection