@extends('layouts.app')
@section('seo_title', get_title(__('app.Add listing')))

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