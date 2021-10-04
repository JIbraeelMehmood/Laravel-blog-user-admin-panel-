@extends('layouts.app')

@section('content')
        <!--  -->
    <div class="row ">
<!-- ========================================================== -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-light table-hover table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Body</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $key=> $post)         
                            <tr>
                            <th scope="row">
                            {{ ++$key }}
                            </th>
                            <td>{{ $post->user->name }} </td>
                            <td> {{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>
                                <?php
                                    $parameter= Crypt::encrypt($post->id);
                                ?>
                                <a href="/post/acceptBlog/{{ $post->id }}" class="btn btn-sm btn-info pull-right">Accept</a>
                                <a href="/post/denyBlog/{{ $post->id }}" class="btn btn-sm btn-danger pull-right">Deny</a>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<!-- ========================================================== -->
    </div>
<!--  -->
<script type="text/javascript">
    $("#input-id").rating();
</script>
@endsection
