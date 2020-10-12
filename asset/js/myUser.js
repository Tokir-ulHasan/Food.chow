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
    $(this).css({"transform": "scale(1.1)"});
},function(){
    $(this).css({"transform": "scale(1)"});
});
$('.img_1').hover(function(){
    $(this).css({"transform": "scale(1.01)"});
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
