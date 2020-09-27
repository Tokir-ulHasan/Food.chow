<?php
 include_once "adminincludes/header.php" ;
 //include_once "../CreatePDF/OrdersPDF.php";
 ?>
<?php
 $db = new Database();
 $fm = new Formate();
?>
<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class="container-fluid mr-4">
      <h3 class="h4 m-2">Reports</h3>
      <hr>
      <div class="mt-5 container d-flex justify-content-center">
        <div>
          <a href="../CreatePDF/CatagoryPDF.php" class="btn btn-lg btn-outline-warning px-5"><i class="fa fa-download mx-2" aria-hidden="true"></i>Catagory List</a>
          <a href="../CreatePDF/Foodpdf.php" class="btn btn-lg btn-outline-primary " style="padding: 0.5rem 5rem;
          "><i class="fa fa-download mx-2" aria-hidden="true"></i>Food List</a>
          <hr class="mt-5 pt-5">
          <form action="../CreatePDF/OrdersPDF.php" class="mt-3 pt-3" method="post">
            <div class="form-group">
              <label for="sel1">Select Order Type</label>
              <select class="form-control" id="ordtype" name="od_type_id">
                <option value="0">All</option>
                <option value="1">Pending</option>
                <option value="2">Active</option>
                <option value="3">Reject</option>
                <option value="4">Delever</option>
              </select>
            </div>
            <input type="Submit" name="odtype"  class=" btn btn-lg btn-outline-info " style="padding: 0.5rem 5rem;margin: 0 10rem;" value="Download">
          </form>

          <hr class="mt-5 pt-5">
          <a href="../CreatePDF/delboyPDF.php" class="btn btn-lg btn-outline-info px-5"><i class="fa fa-download mx-2" aria-hidden="true"></i>Delevery Boy List</a>
          <a href="../CreatePDF/UserPDF.php" class="btn btn-lg btn-outline-success " style="padding: 0.5rem 5rem;
          "><i class="fa fa-download mx-2" aria-hidden="true"></i>User List</a>
          <hr class="mt-5 pt-5">

          <a href="../CreatePDF/AdminPDF.php" class="btn btn-lg btn-outline-dark px-5 mb-5 " style="padding: 0.5rem 5rem;margin: 0 10rem;"><i class="fa fa-download mx-2" aria-hidden="true"></i>Admin List</a>
        </div>
       </div>
    </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
