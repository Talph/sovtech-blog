@extends('layouts.dashboard')

@section('content')

<create-posts-component :auth='@json(auth()->user())'></create-posts-component>

@endsection

