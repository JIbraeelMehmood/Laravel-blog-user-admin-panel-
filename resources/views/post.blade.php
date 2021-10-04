@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>

                <div class="card-body p-5">
                    <form method="POST" >
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="w-75 form-control" name="title" id="title"  placeholder="Enter Title">
                        </div>

                        <div class="form-group" >
                            <label for="exampleInputEmail1">Category</label>
                            <select name="postCategory[]" class=" form-control postCategory"  multiple="multiple">
                                <option value="">
                                    Options
                                </option>
                                @foreach($categories as $key=> $category)
                                <option value="{{ $category->name }}">
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="w-75 form-control" name="body"  id="body" rows="3"></textarea>
                        </div>
                        
                        <!--<input type="text" value="Add some text" id="resizeme" />-->

                        <button type="submit" class="btn btn-primary" value="post">Submit</button>
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
