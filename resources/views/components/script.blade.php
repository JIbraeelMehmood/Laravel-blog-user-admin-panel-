<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}" ></script>
<script src="{{ asset('js/app.js') }}" ></script>
<script src="https://cdn.jsdelivr.net/combine/npm/@splidejs/splide@2.4.21,npm/bootstrap-star-rating@4.0.9"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.postCategory').select2();
            // playing css width
        //$('.postCategory').innerWidth(100);
        //$('.postCategory').width(500)
        //$('.postCategory').width("50px");
    });
    //$('#resizeme').keydown(function(){
        //var contents = $(this).val();
        //var charlength = contents.length;
        //newwidth =  charlength*9;
        //$(this).css({width:newwidth});
    //});
//===================================================
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
//=====================================================
$("#input-id").rating();
    //=========================================
    //$(document).on("click",".setvalue",function() {
            //var inp =  $('#myBtn_' + id).val();
         //   var id = $(this).attr("id")
         //       alert ("test"+id);
        //  });
            //alert(e.getAttribute("id"));
    //--------------------------------
    function myFunction(e) {
    //var moreText = e.getAttribute("id");
    //var moreTextid = document.getElementById("more_"+postid);
    var postid = e.getAttribute("postid");
    var moreText = document.getElementById("more_"+postid);
    var dots = document.getElementById("dots_"+postid);
    var id = e.getAttribute("postid");
    var btnText = id;
    //alert ("more test-"+moreTextid+"postid"+postid);
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
<!-- VOID Scripts -->
<!-- <script src="assests/js/jquery-3.5.1.min.js"></script> -->
<!-- <script src="assests/js/bootstrap/bootstrap.bundle.min.js"></script> -->
<!-- <script src="assests/js/config.js"></script> -->
<!-- <script src="assests/js/script.js"></script> -->
<!-- <script src="assests/js/icons/feather-icon/feather.min.js"></script> -->
<!-- <script src="assests/js/icons/feather-icon/feather-icon.js"></script> -->







