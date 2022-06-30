@extends('layouts.app')
@section('seo_title', __('Login/Register'))
@section('content')
<div class="mb-3 mt-3">
	@include('auth.forceauth.loginform')
</div>

@endsection