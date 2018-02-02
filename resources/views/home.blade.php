@extends('layouts.app')

@section('content')

<div id="home" class="container">


	<div class="box">
	<h1 class="title"> Recent budget operations</h1>
	</div>
	<notification></notification>
	<expence-create></expence-create>
	<income-create></income-create>
	<!-- <expense-list></expense-list> -->
	<transaction-list></transaction-list>

</div>
@endsection
