@extends('layouts.dashboard')

@section('content')
    <edit-category-component :category='@json($category)'></edit-category-component>
@endsection
