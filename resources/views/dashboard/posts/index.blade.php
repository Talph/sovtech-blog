@extends('layouts.dashboard')

@section('content')
    <index-dashboard-posts-component :auth='@json(auth()->user())'></index-dashboard-posts-component>
@endsection

