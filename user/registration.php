<section >
        <div class="modal fade modll" id="regitration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog  " role="document">
              
                    <div class="modal-content boxlogin">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    
                          <div class="modal-body ">
                            <div class="d-flex justify-content-center boxuser"><i class="fa fa-user"></i></div>
                            <form action="registration_loginphp.php" method="post"  onsubmit="return Validation()">
                                <div class="container box pb-3">
                                    <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">User Registration</p>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Enter Your Full Name" name="userName" id="userName" autocomplete="off">
                                        <span id="userNameMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="email"  placeholder="Enter Your Email" name="userEmail" id="userEmail" autocomplete="off" >
                                        <span id="userEmailMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo" >
                                        <textarea class=""  rows="3" placeholder="Enter Your Address" name="nameAdd" id="nameAdd" autocomplete="off" ></textarea>
                                        <span id="userAddMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo">
                                        <input type="text"  placeholder="Enter Your Number" name="userNum" id="userNum" autocomplete="off">
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo" >
                                        <input type="Password" placeholder="Enter Your Password" name="userpass" id="userpass" autocomplete="off" >
                                        <span id="userpassMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-4 d-flex justify-content-center" >
                                        <input type="submit" class="btn btn-sm btn-outline-danger btnSin px-5 font-weight-bolder mt-3" value="SignUp" name="singup" required>
                                    </div>
                                    <div class="container  Loginuserfooter">
                                        <p class="text-muted my-4">If You Have an Account You can <a href="#login"  data-toggle="modal" data-dismiss="modal" aria-label="Close" class="text-danger">Login</a></p>
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
          var userName  = document.getElementById('userName').value.trim();
          var userEmail = document.getElementById('userEmail');
          var nameAdd   = document.getElementById('nameAdd').value.trim();
          var userNum   = document.getElementById('userNum').value.trim();
          var userpass  = document.getElementById('userpass').value;
    
         var userName  = userNameValid(userName);
         var userEmail = userEmailValid(userEmail);
         var nameAdd   = nameAddValid(nameAdd);
         var userNum   = userNumValid(userNum);
         var userpass  = userpassValid(userpass);
         
         if(userName == true && userEmail == true && nameAdd == true && userNum == true && userpass == true ){
           return true;
         }
         else{
           return false;
         }

        }

    /* -----------------User name Validation------------------- */
    function userNameValid(userName){
        var namepattern = /^[A-za-z ._-]{3,30}$/;

        if(userName == ""){
          document.getElementById('userNameMess').innerHTML ="Please enter Your Name !";
          document.getElementById('userName').classList.add("error-bg");
          document.getElementById('userName').classList.add("error-bg");
          return false;
        }
        if(userName.length < 3 || userName.length > 30) {
            document.getElementById('userNameMess').innerHTML ="Name Should be contain bettwen 3 to 30 ! ";
            document.getElementById('userName').classList.add("error-bg");
            return false;
        }
        if(!namepattern.test(userName)) {
            document.getElementById('userNameMess').innerHTML ="Name Should be contain A-z,a-z and .-_ Space !";
            document.getElementById('userName').classList.add("error-bg");
            return false;
        }
        if( userName.indexOf('.') == 0 ||  userName.indexOf('_') == 0 || userName.indexOf('-') == 0) {
            document.getElementById('userNameMess').innerHTML ="You cannot . _ -  as first position!";
            document.getElementById('userName').classList.add("error-bg");
            return false;
        }
        else{
            document.getElementById('userNameMess').innerHTML ="";
            document.getElementById('userName').classList.remove("error-bg");
            document.getElementById('userName').classList.add("success-bg");
            return true;
        }
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
        if(userEmail.charAt(userEmail.length-4) != "." && userEmail.charAt(userEmail.length-3) != "."){
            document.getElementById('userEmailMess').innerHTML ="Invalid Positon of . !";
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
    /* -----------------User Address Validation------------------- */
    function  nameAddValid(nameAdd){
      if(nameAdd == ""){
          document.getElementById('userAddMess').innerHTML ="Please enter Your Name";
          document.getElementById('nameAdd').classList.add("error-bg");
          return false;
        }
        else{
            document.getElementById('userAddMess').innerHTML ="";
            document.getElementById('nameAdd').classList.remove("error-bg");
            document.getElementById('nameAdd').classList.add("success-bg");
            return true;
        }
    }
    /* -----------------User Mobile Number Validation------------------- */
    function  userNumValid(userNum){
       if(userNum == "") {
          document.getElementById('userNumMess').innerHTML ="Please enter Your Mobile Number";
          document.getElementById('userNum').classList.add("error-bg");
          return false;
        }
        if(isNaN(userNum)){
          document.getElementById('userNumMess').innerHTML ="Mobile Should be digit !";
          document.getElementById('userNum').classList.add("error-bg");
          return false;
        }
        if(userNum.length != 11){
          document.getElementById('userNumMess').innerHTML ="Mobile Should be 11 digit !";
          document.getElementById('userNum').classList.add("error-bg");
          return false;
        }
        else{
            document.getElementById('userNumMess').innerHTML ="";
            document.getElementById('userNum').classList.remove("error-bg");
            document.getElementById('userNum').classList.add("success-bg");
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
        if(!PassPattern.test(userpass)){
          document.getElementById('userpassMess').innerHTML ="Password Should contain A-Z,a-z,0-9";
          document.getElementById('userpass').classList.add("error-bg");
          return false;
        }
        if(userpass.length < 6 || userpass.length > 15){
          document.getElementById('userpassMess').innerHTML ="Password Should contain 6 to 15 character";
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