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
                            <form action="registration_loginphp.php" method="post" id="reg_form">
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
                                        <input type="submit"  class="btn btn-sm btn-outline-danger btnSin px-5 font-weight-bolder mt-3" name="singup" id="singup">
                                    </div>
                                    <div class="container  Loginuserfooter">
                                        <p class="text-muted my-4">If You Have an Account You can <a  href="#login"  data-toggle="modal" data-dismiss="modal" aria-label="Close" class="text-danger">Login</a></p>
                                    </div>
                                </div>
                            </form>
                          </div>
                    </div>
            </div>
        </div>
    </section>
<script>
  
</script>