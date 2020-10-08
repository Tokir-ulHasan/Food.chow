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
    
$('.mdb-select').materialSelect();
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


 
 // set the initial index
 var ratedIndex = -1;
 var uId = -1,fId= -1;
 $("#lovefood").ready(function(){
    
    //default color is sate for love icon
    defaultcolor();
   
    if(localStorage.getItem('ratedIndex') != null){
        loverate(parseInt(localStorage.getItem('ratedIndex')));
    }
    //when click on love icon
    $('.fa-heart').on('click',function(){
        //get the present index of love icon
        ratedIndex = parseInt($(this).data('index'));
        //Store set the present index of local divce cookies
        localStorage.setItem('ratedIndex',ratedIndex);

        $.ajax({
            url:'detailspage.php',
            method : 'POST',
            //data:{"save":true, "rateindex":'ratedIndex'},
            // data:{ "ratedIndex":JSON.stringify(ratedIndex) },
            //dataType :"JSON",
            success:function(data){
              alert(ratedIndex);
            }
        });
      
    });
    
    //action on mouseover
    $('.fa-heart').mouseover(function(){
        defaultcolor();
        //get the current index
        var currentIndex = parseInt($(this).data('index'));
        loverate(currentIndex);
      
    });
     //action on mouseleave
    $('.fa-heart').mouseleave(function(){
         defaultcolor();
         //set love icon after mouse leave
         if(ratedIndex != -1){
            loverate(ratedIndex);
         }
    });
    
    function loverate(max){
        for(var i = 0 ;i<=max ;i++){
            $('.fa-heart:eq('+i+')').css('color','red');
        }
    }

    function defaultcolor(){
      $('.fa-heart').css('color','#b9bec3');
    }
 
  });

  



  
 
 
 
 

