<?php include_once "adminincludes/header.php" ?>

<?php 
include_once "dish_itemPHP.php" ;

/** ===============Get Value For Change=================*/
?>


<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class="container-fluid">
    <h3 class="h4 m-2">Edit Food</h3>
        <div class="my-5 mx-3">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="usr">Name of Food:</label>
                    <input type="text" class="form-control" id="fdinput" name="fdName" value="<?php echo $fdname;?>"">
                </div>
                <div class="form-group">
                    <label for="fdcat">Catagory of Food:</label>
                    <?php echo $fdcatnam; ?>
                  
                </div>
                <div class="form-group">
                    <label for="comment">Discription of Food:</label>
                    <textarea class="form-control" rows="4" id="fdinput" name="fdDescription" ><?php echo $fdDescription;?></textarea>
                </div>
                <div class="d-flex">
                    <div class="form-group mr-5" id="fdinput1">
                        <label for="number">Price of Food:</label>
                        <input type="number" class="form-control" id="fdinput" name='fdprice' value="<?php echo $fdprice;?>">
                    </div>
                    <div class="form-group mx-5" id="fdinput2">
                        <label for="number">Discount of Food:</label>
                        <input type="number" class="form-control" id="fdinput" name='fddiscount' value="<?php echo $fdDiscount;?>">
                    </div>
                </div>
                <div class="containerr">
                    <input type="file" id="input-file" name="imgFd" onchange={handleChange()} hidden value="<?php echo $fdimge; ?>">
                    <input type="text" name="imgFd_I" hidden value="<?php echo $fdimge; ?>">
                    <label class="btn-upload" for="input-file" role="button"> Upload Photo</label>
                    <div class="preview-box">
                    <img class="preview-content" src="<?php echo $fdimge; ?>">
                    </div>  
                </div>
                <button type="submit" class="btn btn-success" name="updatedish">Change</button>
                <button type="submit" class="btn btn-danger" name="deletedish">Delete</button>
            </form>
        </div>
    </div>
</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
