<section >
        <div class="modal fade modll" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog  " role="document">
              
                    <div class="modal-content boxlogin">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    
                          <div class="modal-body ">
                            <div class="d-flex justify-content-center boxuser"><i class="fa fa-user"></i></div>
                            <form action="demo.php" method="POST" onsubmit="return Validation()">
                                <div class="container box pb-3">
                                    <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">User Login</p>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="email"  placeholder="Enter Your Email" name="userEmail" id="userEmail" autocomplete="off" >
                                        <span id="userEmailMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo" >
                                        <input type="Password" placeholder="Enter Your Password" name="userpass" id="userpass" autocomplete="off" >
                                        <span id="userpassMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-4 d-flex justify-content-center" >
                                        <input type="submit" class="btn btn-sm btn-outline-danger btnSin px-5 font-weight-bolder mt-3" value="Signin" name="singin" >
                                    </div>
                                    <div class="container  Loginuserfooter">
                                        <p class="text-muted my-4" style="font-size:15px">If You Have no Account You can <a href="#regitration"  data-toggle="modal" data-dismiss="modal" aria-label="Close" class="text-danger">Signup</a></p>
                                    </div>
                                </div>
                            </form>
                          </div>
                    </div>
            </div>
        </div>
    </section>
<script>
        function Validation(){
          
          var userEmail = document.getElementById('userEmail').value.trim();
          var userpass  = document.getElementById('userpass').value;
    
        
         var userEmail = userEmailValid(userEmail);
         var userpass  = userpassValid(userpass);
         
         if(userEmail == true && userpass == true){
           return true;
         }
         else{
           return false;
         }
          return true;
        }

    
    /* -----------------User Email Validation------------------- */
    function  userEmailValid(userEmail){
      if(userEmail == ""){
          document.getElementById('userEmailMess').innerHTML ="Please enter your email address!";
          document.getElementById('userEmail').classList.add("error-bg");
          return false;
        }
        if(userEmail.indexOf('@')<=0) {
            document.getElementById('userEmailMess').innerHTML ="Invalid Positon of @ !";
            document.getElementById('userEmail').classList.add("error-bg");
            return false;
        }
        else{
            document.getElementById('userEmailMess').innerHTML ="";
            document.getElementById('userEmail').classList.remove("error-bg");
            document.getElementById('userEmail').classList.add("success-bg");
            return true;
        }
    }
   
    
     /* -----------------User Password Validation------------------- */
    function  userpassValid(userpass){
        var PassPattern =/^[A-za-z0-9]{6,15}$/;
        if(userpass == ""){
          document.getElementById('userpassMess').innerHTML ="Please Given a Password";
          document.getElementById('userpass').classList.add("error-bg");
          return false;
        }
        else{
            document.getElementById('userpassMess').innerHTML ="";
            document.getElementById('userpass').classList.remove("error-bg");
            document.getElementById('userpass').classList.add("success-bg");
            return true;
        }
    }
</script>
