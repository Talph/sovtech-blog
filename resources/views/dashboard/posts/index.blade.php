@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
  <div class="row shadow my-2">
    <div class="col-md-6">
      <h1 class="h3 mb-2 text-gray-800">Hello {{ucfirst(auth()->user()->name)}}!</h1>
      <p class="mb-4">Lorem Ipsum is dummy text of the printing and typesetting industry. Care to write a meaningful
        blog post?</p>
      <div class="createProduct border-2 my-4">
        <a class="btn btn-primary" href={{route('create.posts')}}>{{__('Create New Post')}}</a>
      </div>
    </div>
    <div class="col-md-6">
      <img class="float-right" src="{{asset('img/png/isometric-icons-web-development-min-uai-828x828.png')}}" alt=""
        width="200">
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          {{ __('Posts') }}</div>
        <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered" style="width: 100%;">
            <thead>
              <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Content excert</th>
                <th>Date</th>
                <th>Status</th>
                <th>Slug</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $post)
              <tr class="odd">
                <td>{{ $post->title }}</td>
                <td>
                    {{$post->relatedUser->name}}
                </td>
                <td>{{$post->meta_desc }}</td>
                <td>{{ $post->posted_at }}</td>
                <td>
                  <span class="draft">
                   @if(!$post->isPublished()) Draft  @elseif($post->isPublished()) Published @else Awaiting approval @endif
                  </span>
                </td>
                <td>{{ $post->slug }}</td>
                <td>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkPosts" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false" aria-label="Posts action button">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLinkPosts">
                      <div class="dropdown-header">Actions:</div>
                      <a href="{{ url('/ad/posts/' . $post->id) }}" class="btn dropdown-item">View</a>

                      @cannot('isManager')
                      @can('edit', $post)
                      <a href="{{ url('/ad/posts/' . $post->id . '/edit') }}" class="btn dropdown-item">Edit</a>
                      @endcan

                      @can('delete', $post)
                      <div class="dropdown-divider"></div>
                      <form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn dropdown-item text-danger">Delete</button>
                      </form>
                    </div>
                      @endcan
                      @endcannot
                    </div>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Content</th>
                <th>Date</th>
                <th>Status</th>
                <th>Slug</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
{{--          {{ $posts->links() }}--}}
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection


@section('javascript')

@endsection
