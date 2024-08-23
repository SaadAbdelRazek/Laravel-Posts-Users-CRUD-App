@extends('layouts.app')
@section('title')
    Show
@endsection
@section('content')
<br>
<div class="card" style="width: 80%; margin-left: 80px">
    <div class="card-header">
        Post Info
    </div>
    <div class="card-body">
        <h5 class="card-title">Post Title :{{$getSinglePost->title}} </h5>
        <p class="card-text">Description : {{$getSinglePost->description}}</p>
    </div>
</div>
<br><br>
<div class="card" style="width: 80%; margin-left: 80px">
    <div class="card-header">
        Post Creator Info
    </div>
    <div class="card-body">
        <h5 class="card-title">Name : {{$getSingleUser->name}}</h5>
        <p class="card-text">Email : {{$getSingleUser->email}}</p>
        <p class="card-text">Created At : {{$getSinglePost->created_at}}</p>
    </div>
</div>
@endsection
