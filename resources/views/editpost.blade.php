@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">
                    <form method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text"  value="{{$post->title}}"  class="form-control" name="title" id="title"  placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control" name="body"  id="body" rows="3">
                            {{$post->body}}
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" value="update">Update</button>
                    </form>
                    @if (session()->has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
