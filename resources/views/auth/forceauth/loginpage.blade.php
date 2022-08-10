@extends('layouts.app')
@section('seo_title', get_title(__('app.Login/Register')))

@section('content')
<div class="mb-3 mt-3">
	@include('auth.forceauth.loginform')
</div>

@endsection