@extends('layouts.app')
<style>
</style>
@section('content')  
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card bg-light mt-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-6">
                            <h3> Accept & Deny </h3>
                        </div>
                        <div class="col col-md-6 text-right">
                            @if(request()->has('view_deleted'))
                            <a href="{{ route('post.blogRequest') }}" class="btn btn-info btn-sm">View All Post</a>
                            <a href="{{ route('post.restoreAll') }}" class="btn btn-success btn-sm">Restore All</a>
                            @else
                            <a href="{{ route('post.blogRequest', ['view_deleted' => 'DeletedRecords']) }}" class="btn btn-primary btn-sm">View Deny Posts</a>
                            @endif
                        </div>
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($posts) > 0)
                                @foreach($posts as $row)

                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->body }}</td>
                                    <td>{{ date_format($row->updated_at, 'jS M Y') }}</td>
                                    <td>
                                        @if(request()->has('view_deleted'))

                                            <a href="{{ route('post.restore', $row->id) }}" class="btn btn-success btn-sm">Restore</a>
                                        @else
                                            <form method="post" action="{{ route('post.denyBlog', $row->id) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button type="submit" class="btn btn-danger btn-sm">Deny</button>
                                                <a href="{{ route('deletePermanently', $row->id) }}" title="Permanently delete">
                                                    <i class="fas fa-trash text-danger  fa-lg"></i>
                                                </a>
                                            </form>
                                        @endif
                                    </td>
                                </tr>

                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">No Post Found</td>
                                </tr>

                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection
