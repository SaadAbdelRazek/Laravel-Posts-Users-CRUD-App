@extends('layouts.app')
@section('title')
    Create Post
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
    <form method="POST" action="{{route('index')}}">
        @csrf
        <div class="form-group" style="margin-left: 40px;width: 80%;margin-bottom: 30px ; margin-top: 30px">
            <label>Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter post title" name="title" value="{{old('title')}}">
        </div>
        <div class="form-group"style="margin-left: 40px;width: 80%;margin-bottom: 30px">
            <label>Description</label>
            <input type="text" class="form-control"  placeholder="Description" name="desc" value="{{old('desc')}}">
        </div>
        <div class="form-check"style="margin-left: 40px;width: 80%;margin-bottom: 30px" >
            <label>Post Creator</label>
            <select name="creator" class="form-select" >
                @foreach($selectUser as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
       <div class="text-center">
           <button type="submit" class="btn btn-success">Submit</button>
       </div>
    </form>

@endsection
