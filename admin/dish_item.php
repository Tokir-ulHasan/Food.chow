<?php include_once "adminincludes/header.php" ?>
<?php include_once "dish_itemPHP.php" ?>
<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
  
    <div class="container-fluid">
    <h3 class="h4 m-2">Add Food</h3>
     <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo $getMessage;
        }
     ?>
        <div class="my-5 mx-3">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="usr">Name of Food:</label>
                    <input type="text" class="form-control" id="fdinput" name="fdName" placeholder="Enter food name...">
                          </div>
                <div class="form-group">
                    <label for="fdcat">Catagory of Food:</label>
                    <input type="text" class="form-control" id="fdinput" name="fdcat" readonly value="<?php echo $catname; ?>">
                </div>
                <div class="form-group">
                    <label for="comment">Discription of Food:</label>
                    <textarea class="form-control" rows="4" id="fdinput" name="fdDescription" placeholder="Enter food descirption..."></textarea>
                </div>
                <div class="d-flex">
                    <div class="form-group mr-5" id="fdinput1">
                        <label for="number">Price of Food:</label>
                        <input type="number" class="form-control" name="fdprice" id="fdinput">
                    </div>
                    <div class="form-group mx-5" id="fdinput2">
                        <label for="number">Discount of Food:</label>
                        <input type="number" class="form-control" name="fddiscount" id="fdinput">
                    </div>
                </div>
                <div class="containerr">
                    <input type="file" id="input-file" name="imgFd"  onchange={handleChange()} hidden>
                    <label class="btn-upload" for="input-file" role="button"> Upload Photo</label>
                    <div class="preview-box"></div>  
                </div>
                <button type="submit" class="btn btn-primary" name='dishadd' >Add</button>
            </form>
        </div>
    </div>
  
</div>

<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
