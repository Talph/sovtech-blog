@extends('layouts.dashboard')

@section('content')
<edit-posts-component post='@json($post)'></edit-posts-component>
@endsection

