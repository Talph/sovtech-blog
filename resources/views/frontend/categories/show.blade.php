@extends('layouts.app')

@section('content')

    <show-category-component :category='@json($category)'></show-category-component>

@endsection
