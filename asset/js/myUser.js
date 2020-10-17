$(document).ready(function () {
        
    $(".owl-carousel").owlCarousel({
        autoplay :true,
        autoplayHoverPause : true,
        nav:true,
        dots:false,
        loop:true,
        responsive: {
            0:{
                items: 1,
            },
            485:{
                items: 2,
            },
            500:{
                items: 3,
            },
            700:{
                items: 4,
            },
            900:{
                items: 5,
            },
            1200:{
                items:6,
            }
        },
        center:true,
    });
    $(".fa-bars").on("click",function () {
        $(".mobileMenu").toggleClass("open");
    }) ;


    //===============animation js =============================

    
$('.fd_datails').hover(function(){
    $(this).css({"transform": "scale(1.01)"});
},function(){
    $(this).css({"transform": "scale(1)"});
});
$('.img_1').hover(function(){
    $(this).css({"transform": "scale(1.005)"});
},function(){
    $(this).css({"transform": "scale(1)"});
});

/*$('.fd_datails').mouseover(function(){
    $(this).css({'left':'100px'},100);
});*/
    
});


function myFun(){

    var collapseClass = document.getElementById("iconChange");
   
   if(collapseClass.className === "fa fa-plus font-weight-light pl-3 pr-1"){
       collapseClass.className = "fa fa-minus font-weight-light pl-3 pr-1" ;
    
       
   }
   if(collapseClass.className === "fa fa-minus font-weight-light pl-3 pr-1"){
    collapseClass.className = "fa fa-plus font-weight-light pl-3 pr-1" ;
 
    
}
}

$('#spinner').inputSpinner({
    grouoClass: 'input-group-sm',
    buttonsClass: 'btn-outline-danger btn-sm',
    buttonsWidth: '.1rem',
    textAlign: 'center'
    

  });
  $('#spinner').css( 'height',' 30px');

  /*$('#spinner').on('input',function(e){
      $('#minput').html($(this).val());
      $('#minput').html($(this).val());
  });*/
  $('#spinner').on('input',function(e){
    $('#minput').html($(this).val());
    $('#minput').html($(this).val());
    var price    =  $('#price').val();
    var quantity    =  $('#spinner').val();
    var totalprice = price*quantity;
    $('#totalprice span').html(totalprice);

  
 });


 /**==================Rating=================== */

 $("#lovefood").ready(function(){
    

    //get total , avg ,countperson rate
    var totalrate = $('#totalrate').data('index');
    var avgrate   = $('#avgrate').data('index');
    var countrate = $('#countrate').data('index');
    //set avg for heart icon
    var avgR      = avgrate*20;
    // set initialy avg value
    $('#ttlrate').html(avgrate);
    $('#in_rate').css("width", `${avgR}%`);

    
    var initIndex    = -1;
    var total_rat    = totalrate;
    var privious_rat = 0;
    var current_rate = 0;

    

    // set the initial index
    var ratedIndex =  $('#rating').data('index');
    ratedIndex--;
        

    //default color is sate for love icon
    defaultcolor();
    loverate(ratedIndex);
  
  
    $('.fa-heart').on('click',function(){

        //get the privious rating 
        privious_rat = ratedIndex + 1;
        //get the present/current rating
        ratedIndex   = parseInt($(this).data('index'));
        current_rate = ratedIndex + 1;
      
      
        //Store set the present index of local divce cookies
        localStorage.setItem('ratedIndex',ratedIndex);

        //get userid and foodid
        var fd_id   = $('#fdid').data('index');
        var user_id = $('#userid').data('index');
     
       //set current total
        if(privious_rat != current_rate){
            total_rat = total_rat - privious_rat+current_rate;
        }
        if(countrate == 0){
            total_rat = current_rate;
            countrate++;
        }
        else{
            total_rat = total_rat;
        }
     
        //call ajaxs
       $.ajax({
            url:    'ratingPHP.php',
            method: 'POST',
            data:{  "ratedIndex":JSON.stringify(ratedIndex),
                    "fd_id":JSON.stringify(fd_id),
                    "user_id":JSON.stringify(user_id)
               },

            success:function(data){
                // alert(total_rat);
             // alert(`Totlal ${totalrate} Count ${countrate} Index ${initIndex}`);
             averagerate(total_rat,countrate,);
            }
            
        });
       
    });
    
    //action on mouseover
    $('.fa-heart').mouseover(function(){
        defaultcolor();
        //get the current index
        var rat_count = $(this).data('index') + 1;
        var currentIndex = parseInt($(this).data('index'));
        
        loverate(currentIndex);
        $('#rating_count').html(`<sup style="background: red;padding: 3px 8px;border-radius: 5px 5px 5px 0;font-size: 11px;color: #ffff;font-weight: bolder;">${rat_count}</sup>`);
      
    });
     //action on mouseleave
    $('.fa-heart').mouseleave(function(){
         defaultcolor();
         //set love icon after mouse leave
         if(ratedIndex != -1){
            loverate(ratedIndex);
         }
         $('#rating_count').html("");
    });
    
    function loverate(max){
        for(var i = 0 ;i<=max ;i++){
            $('.fa-heart:eq('+i+')').css('color','red');
        }
    }

    function defaultcolor(){
      $('.fa-heart').css('color','#b9bec3');
     
    }

    function averagerate(totalrate,countrate){

        var countPerson  = countrate;
        var totalraing   = totalrate;
        var avgrating = totalraing/countPerson;
     
        $('#ttlrate').html(avgrating);
        $('#in_rate').css("width", `${avgrating*20}%`);
       
    }
    
});



/***===============Registration================= */
$(function(){

    $('#userNameMess').hide();
    $('#userEmailMess').hide();
    $('#userAddMess').hide();
    $('#userNumMess').hide();
    $('#userpassMess').hide();
    
    var error_u_name     = true;
    var error_u_email    = true;
    var error_u_address  = true;
    var error_u_number   = true;
    var error_u_password = true;

    $("#userName").focusout(function(){
          check_uName();
    });
    $("#userEmail").focusout(function(){
        check_uEmail();
    });
   
    $("#nameAdd").focusout(function(){
      check_uAddress();
    });
  
    $("#userNum").focusout(function(){
       check_uNumber();
    });

    $("#userpass").focusout(function(){
      check_uPass();
    });

    //==============User Name Valid===================

     function  check_uName(){
        var namepattern = /^[A-za-z ._-]{3,30}$/;
        var U_name  = $("#userName").val();

        if(U_name == ""){  
            $('#userNameMess').html("Please enter Your Name !");
            $('#userNameMess').show();
            $('#userName').addClass("error-bg");
            error_u_name = false;
        }
        else if(U_name.length < 3) {
            $('#userNameMess').html("Name Should be at least  3 character !");
            $('#userNameMess').show();
            $('#userName').addClass("error-bg");
            error_u_name = false;
        }
        else if(!namepattern.test(U_name)) {
            $('#userNameMess').html("Name Should be contain A-z,a-z and .-_ Space !");
            $('#userNameMess').show();
            $('#userName').addClass("error-bg");
            error_u_name = false;
        }
        else if( U_name.indexOf('.') == 0 || U_name.indexOf('_') == 0 || U_name.indexOf('-') == 0) {
            $('#userNameMess').html("You cannot . _ -  as first position!");
            $('#userNameMess').show();
            $('#userName').addClass("error-bg");
            error_u_name = false;
        }
        else{
            $('#userNameMess').hide();
            $('#userName').removeClass("error-bg");
            $('#userName').addClass("success-bg");
            
        }
     }

    //==============User Email Valid===================
     function  check_uEmail(){
       
        var U_email  = $("#userEmail").val();

        if(U_email == ""){  
            $('#userEmailMess').html("Please enter Your Email !");
            $('#userEmailMess').show();
            $('#userEmail').addClass("error-bg");
            error_u_email = false;
        }

        else if(U_email.indexOf('@')<=0) {
            $('#userEmailMess').html("Invalid Positon of @ !");
            $('#userEmailMess').show();
            $('#userEmail').addClass("error-bg");
            error_u_email = false;
        }
        else if(U_email.charAt(U_email.length-4) != "." && U_email.charAt(U_email.length-3) != "."){
            $('#userEmailMess').html("Invalid Positon of . !");
            $('#userEmailMess').show();
            $('#userEmail').addClass("error-bg");
            error_u_email = false;
        }  
        
        else{
            $('#userEmailMess').hide();
            $('#userEmail').removeClass("error-bg");
            $('#userEmail').addClass("success-bg");
           
        }
     }
    
    //==============User Address Valid===================
     function  check_uAddress(){
       
        var U_address  = $("#nameAdd").val();

        if(U_address == ""){  
            $('#userAddMess').html("Please enter Your Address !");
            $('#userAddMess').show();
            $('#nameAdd').addClass("error-bg");
            error_u_address = false;
        }

        
        else{
            $('#userAddMess').hide();
            $('#nameAdd').removeClass("error-bg");
            $('#nameAdd').addClass("success-bg");
            
        }
     }

      //==============User Number Valid===================
      function  check_uNumber(){
       
        var U_number  = $("#userNum").val();

        if(U_number == ""){  
            $('#userNumMess').html("Please enter Your Mobile Number !");
            $('#userNumMess').show();
            $('#userNum').addClass("error-bg");
            error_u_number = false;
        }

        else if(isNaN(U_number)) {
            $('#userNumMess').html("Mobile Should be digit !");
            $('#userNumMess').show();
            $('#userNum').addClass("error-bg");
            error_u_number = false;
        }
        else if(U_number.length != 11){
            $('#userNumMess').html("Mobile Should be 11 digit !");
            $('#userNumMess').show();
            $('#userNum').addClass("error-bg");
            error_u_number = false;
        }
        
        else{
            $('#userNumMess').hide();
            $('#userNum').removeClass("error-bg");
            $('#userNum').addClass("success-bg");
            
        }
     }
      
     //==============User Password Valid===================
     function  check_uPass(){
        
        var PassPattern =/^[A-za-z0-9]{6,15}$/;
        var U_pass  = $("#userpass").val();

        if(U_pass == ""){  
            $('#userpassMess').html("Please Given a Password !");
            $('#userpassMess').show();
            $('#userpass').addClass("error-bg");
            error_u_password = false;
        }
        else if(U_pass.length < 6 || U_pass.length > 15){
            $('#userpassMess').html("Password Should contain 6 to 15 character");
            $('#userpassMess').show();
            $('#userpass').addClass("error-bg");
            error_u_password = false;
        }
      /*  else if(!PassPattern.test(U_pass)) {
            $('#userpassMess').html("Password Should contain A-Z,a-z,0-9 !");
            $('#userpassMess').show();
            $('#userpass').addClass("error-bg");
            error_u_password = false;
        }*/
        else{
            $('#userpassMess').hide();
            $('#userpass').removeClass("error-bg");
            $('#userpass').addClass("success-bg");
            
        }
     }

     //==============Submit===================
     $("").submit(function(){
            error_u_name     = true;
            error_u_email    = true;
            error_u_address  = true;
            error_u_number   = true;
            error_u_password = true;

            check_uName();
            check_uEmail();
            check_uAddress();
            check_uNumber();
            check_uPass();
            if( error_u_name == true && error_u_email == true && error_u_address == true && error_u_number == true && error_u_password == true ){
                return true;
            }else{
                return false;
            }
     });


});