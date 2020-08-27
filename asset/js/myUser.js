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

