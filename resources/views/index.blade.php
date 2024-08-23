@extends('layouts.app')
@section('title')
    Index
@endsection
@section('content')
<div>
    <div class="text-center">
        <a class="btn btn-success" href="{{route('create')}}">Create Post</a>
    </div><br>
    <div class="text-center">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($getPosts as $post)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$post['title']}}</td>
                <td>{{$post['description']}}</td>
                <td>{{$post->created_at}}</td>
                <td>
                    <a href="{{route('show',$post['id'])}}" class="btn btn-info">View</a>
                    <a href="{{route('edit',$post['id'])}}" class="btn btn-primary">Edit</a>
                    <form style="display: inline" method="post" action="{{route('destroy',$post['id'])}}">
                        @csrf
                        @method('Delete')
                        <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
