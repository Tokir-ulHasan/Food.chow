<footer></footer>
  </div>


<script src="../asset/js/jquery-3.5.1.slim.min.js" ></script>
<script src="../asset/js/wow.min.js" ></script>
<script src="../asset/js/popper.min.js" ></script>
<script src="../asset/js/bootstrap.min.js" ></script>
<script src="../asset/js/bootstrap-input-spinner.min.js"></script>
<script src="../asset/js/bootstrap4-toggle.min.js"></script>

<script>
  var x = window.matchMedia("(max-width:576px)");
  var collapseClass = document.getElementById("navbarNavs");
  function media(x){
      if(x.matches){
       
        collapseClass.classList.add("collapse");
        
      }
      else{
        collapseClass.classList.remove("collapse");
      }
      
     
  }
  media(x);
  x.addListener(media);


  
</script>
</body>
</html>