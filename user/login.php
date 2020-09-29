<section>
        <div class="modal fade " id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog mt-5 pt-5" role="document">
                <div class="modal-content boxlogin">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center boxuser"><i class="fa fa-user"></i></div>
                         <form action="registration_loginphp.php" method="post" onsubmit="return Validationlog()">
                            <div class="container box ">
                                <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">User Login</p></div>
                                <div class="my-1 boxinfo">
                                    <input type="text"  placeholder="Enter Your Email" id="loginEmail" name="loginEmail">
                                    <span id="loginEmailMess" class="text-danger"></span>
                                </div>
                                <div class="my-1  boxinfo">
                                    <input type="Password" placeholder="Enter Your Password" id="loginpass" name="loginpass">
                                    <span id="loginpassmsg" class="text-danger"></span>
                                </div>
                                <div class="my-3 d-flex justify-content-center">
                                    <input type="submit" class="btn btn-sm btn-outline-danger px-5 font-weight-bolder mt-3" value="Login" name="login">
                                </div>
                                <div class="container my-5 clearfix Loginuserfooter">
                                    <p class="float-left "> No Account? Please </p>
                                    <p class="float-right"><a class="text-danger" href="#regitration" data-toggle="modal" data-dismiss="modal" aria-label="Close">Registration</a></p>
                                </div>
                            </div>
                         </form>
                    </div>
                </div>
            
            </div>
        </div>
    </section>
<script>
        function Validationlog(){
        
          
    
        
         var userEmail = userEmailValidL(userEmail);
         var userpass  = userpassValidL(userpass);
         
         if(userEmail == true  && userpass == true ){
           return true;
         }
         else{
           return false;
         }
      
        }

  
    /* -----------------User Email Validation------------------- */
    function  userEmailValidL(userEmail){
      if(userEmail == ""){
          document.getElementById('loginEmailMess').innerHTML ="Please enter your email address!";
          document.getElementById('loginEmail').classList.add("error-bg");
          return false;
        }
        if(userEmail.indexOf('@')<=0) {
            document.getElementById('loginEmailMess').innerHTML ="Invalid Positon of @ !";
            document.getElementById('loginEmail').classList.add("error-bg");
            return false;
        }
        if(userEmail.charAt(userEmail.length-4) != "." && userEmail.charAt(userEmail.length-3) != "."){
            document.getElementById('loginEmailMess').innerHTML ="Invalid Positon of . !";
            document.getElementById('loginEmail').classList.add("error-bg");
            return false;
        }
        else{
            document.getElementById('loginEmailMess').innerHTML ="";
            document.getElementById('loginEmail').classList.remove("error-bg");
            document.getElementById('loginEmail').classList.add("success-bg");
            return true;
        }
    }
    
     /* -----------------User Password Validation------------------- */
    function  userpassValidL(userpass){
        
        if(userpass == ""){
          document.getElementById('loginpassmsg').innerHTML ="Please Given a Password";
          document.getElementById('loginpass').classList.add("error-bg");
          return false;
        }
        
        else{
            document.getElementById('loginpassmsg').innerHTML ="";
            document.getElementById('loginpass').classList.remove("error-bg");
            document.getElementById('loginpass').classList.add("success-bg");
            return true;
        }
    }
</script>
