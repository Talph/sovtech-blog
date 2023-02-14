@extends('layouts.app')

@section('content')

    <show-posts-component :post='@json($post)'></show-posts-component>

@endsection
