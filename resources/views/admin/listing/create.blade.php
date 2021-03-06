@extends('layouts.app')

@section('content')

    @include('partials.listing.add-listing', [
        'listing' => $listing,
        'edit' => $edit,
        'admin' => $admin,
        'route' => $route
        ])

@endsection

@section('scripts')

@include('partials.assets.add-listing',  [
        'listing' => $listing,
        'edit' => $edit
        ])

@endsection