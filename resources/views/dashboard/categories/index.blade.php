@extends('layouts.dashboard')

@section('content')

<index-category-component :auth='@json(auth()->user())'></index-category-component>

@endsection

