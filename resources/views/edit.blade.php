@extends('layouts.app')
@section('title')
    Edit
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{route('update',$postData->id)}}">
        @csrf
        <div class="form-group" style="margin-left: 40px;width: 80%;margin-bottom: 30px ; margin-top: 30px">
            <label>Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter post title" name="title" value="{{$postData->title}}">
        </div>
        <div class="form-group"style="margin-left: 40px;width: 80%;margin-bottom: 30px">
            <label>Description</label>
            <input type="text" class="form-control"  placeholder="Description" name="desc" value="{{$postData->description}}">
        </div>
        <div class="form-check"style="margin-left: 40px;width: 80%;margin-bottom: 30px">
            <label>Post Creator</label>
            <select name="creator" class="form-select">
                @foreach($users as $user)
                    @if($postData->user_id==$user->id)
                       <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection
