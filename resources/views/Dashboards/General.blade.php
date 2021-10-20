@extends('layouts.appVisiters')
<style>
    .more  {display:  none;}
</style>
@section('content')
        <!--  -->

    <div class="row ">
<!-- ========================================================== -->
    @if (session('addfriend-status'))
        <p class="alert alert-success" role="alert">
            {{ session('addfriend-status') }}
        </p>
    @endif
    @if (session('unfriend-status'))
        <p class="alert alert-danger" role="alert">
            {{ session('unfriend-status') }}
        </p>
    @endif
@foreach($posts as $key=> $post)
            <div class=" col-lg-3 col-md-6 col-12 mb-3"  >
                <div class="card" 
                style="
                        box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 1px, rgba(0, 0, 0, 0.25) 0px 1px 1px;
                        background-color: #ffffff;
                        background-image: linear-gradient(315deg, #ffffff 0%, #d7e1ec 74%);
                    ">
<!--  
background-color: #f9c5d1;
background-image: linear-gradient(315deg, #f9c5d1 0%, #9795ef 74%);

background-color: #ffffff;
background-image: linear-gradient(315deg, #ffffff 0%, #d7e1ec 74%);

background-color: #f8f9d2;
background-image: linear-gradient(315deg, #f8f9d2 0%, #e8dbfc 74%);
-->
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
                                    $postparameter= Crypt::encrypt($post->id);
                                    $userparameter= Crypt::encrypt($post->user_id);
                                ?>
                                        <div class="dropdown-menu dropdown-menu-right ">
                                            <a class="font dropdown-item view_project text-primary "
                                                href="{{ url('post',$postparameter) }}"
                                                data-id="<?php echo 'id' ?>"><i class="fas fa-eye"></i>&nbsp; View
                                            </a>
                                            
                                            <a class="font dropdown-item text-warning"
                                                href="/user/addfriend{{ $userparameter }}">
                                                <i class="far fa-edit"></i>&nbsp; AddFriend</a>
                                            
                                            <a class="font dropdown-item delete_project text-danger"
                                                href="/user/unfriend/{{ $userparameter }}" data-id="<?php  echo 'id' ?>">
                                                <i class="fas fa-trash"></i>&nbsp; Unfriend</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <p class=" p-0 m-0 col-sm-6  text-dark"><b>Title</b></p>
                                    <p class=" p-0 m-0 col-sm-6 ">
                                        {{ $post->title }}
                                    </p>
                                </div>
                                <div class=" mb-1" >
                                    <p style=" text-align: justify;text-justify: inter-word;">
                                        {{ Str::limit($post->body,40, '') }}
                                        @if (strlen($post->body) > 15)
                                            <span id="dots_{{$post->id}}" style="font-size: 25px;">...</span>
                                            <br>FullStory:<br> <span class="more" id="more_{{$post->id}}" style="color:rgb(182, 28, 28);" >{{ substr($post->body,10) }}</span>
                                        @endif
                                    </p>
                                    <button class="btn-success btn btn-xs" postid="{{$post->id}}" onclick="myFunction(this)" id="myBtn_{{$post->id}}">Read more</button>
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
