@extends('layouts.app')
<style>
    #more  {display:  none;}
</style>
@section('content')
        <!--  -->
<!--<div class="container">-->
    <!--<div class="row justify-content-center">-->
    <div class="row ">
<!-- ========================================================== -->
<!--
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
-->
            @foreach($posts as $key=> $post)
            <div class=" col-lg-3 col-md-6 col-12 mb-3"  >
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 1px, rgba(0, 0, 0, 0.25) 0px 1px 1px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 " >
                                <div class="row justify-content-end">
                                    <h6 class="col-sm-10 p-0 m-0 fw-bolder">
                                        {{ $post->user->name }}
                                    </h6>
                                    <div class="col-sm-2 ">
                                        <button type="button" title="DropDown"
                                            class="btn btn-default btn-sm btn-flat wave-effect text-dark "
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                <?php
                                    $parameter= Crypt::encrypt($post->id);
                                ?>
                                        <div class="dropdown-menu dropdown-menu-right ">
                                            <a class="font dropdown-item view_project text-primary "
                                                href="{{ url('post',$parameter) }}"
                                                data-id="<?php echo 'id' ?>"><i class="fas fa-eye"></i>&nbsp; View
                                            </a>
                                            
                                            <a class="font dropdown-item text-warning"
                                                href="/post/edit/{{ $parameter }}">
                                                <i class="far fa-edit"></i>&nbsp; Edit</a>
                                            
                                            <a class="font dropdown-item delete_project text-danger"
                                                href="/post/delete/{{ $post->id }}" data-id="<?php  echo 'id' ?>">
                                                <i class="fas fa-trash"></i>&nbsp; Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <p class=" p-0 m-0 col-sm-6  text-dark"><b>Title</b></p>
                                    <p class=" p-0 m-0 col-sm-6 ">
                                        {{ $post->title }}
                                    </p>
                                </div>
                                <div class=" mb-1" style=" text-align: justify;text-justify: inter-word;">
                                    <p>
                                        {{ Str::limit($post->body, 30, '') }}
                                        @if (strlen($post->body) > 15)
                                            <span id="dots">...</span>
                                            <span class="moretext" id="more_{{$post->id}}">{{ substr($post->body, 30) }}</span>
                                        @endif
                                    </p>
                                    <button class="btn-success btn btn-xs" onclick="myFunction(this)" id="myBtn_{{$post->id}}">Read more</button>
                                </div>
                                <div class="row mb-1">
                                    <p class="col-sm-6 p-0 m-0 text-dark">Publish Date:</p>
                                    <p class="col-sm-6 p-0 m-0">
                                        <!-- H:i:s -->
                                        <b> {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d')}}</b>
                                    </p>
                                </div>
                                <div class="row mb-1">
                                    <p class="col-sm-6 text-dark p-0 m-0">Last Update:</p>
                                    <p class="col-sm-6 p-0 m-0">
                                    {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}


                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
<!-- ========================================================== -->
    </div>

<!--</div>-->
<!--  -->
<script type="text/javascript">
    $("#input-id").rating();
    //=========================================
    //$(document).on("click",".setvalue",function() {
            //var inp =  $('#myBtn_' + id).val();
         //   var id = $(this).attr("id")
         //       alert ("test"+id);
        //  });
    //--------------------------------
    function myFunction(e) {
    //alert(e.getAttribute("id"));
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var moreText = $(".moretext").attr('id');
    alert ("more test-"+moreText);
    var id = e.getAttribute("id");
    var btnText = id;
    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}
</script>
@endsection
