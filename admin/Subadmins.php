<?php include_once "adminincludes/header.php" ?>
<?php 
$db = new Database();
$fm = new Formate();
/** ===============Get Value For Change=================*/
?>
<div id="content" class="wrappwer">
    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class="container-fluid">
    <h3 class="h4 m-2">Admins</h3>
       
    </div>
  
</div>
<script>

const handleChange = () => {
  const fileUploader = document.querySelector('#input-file');
  const getFile = fileUploader.files;
  if (getFile.length !== 0) {
    const uploadedFile = getFile[0];
    readFile(uploadedFile);
  }
}
const readFile = (uploadedFile) => {
  if (uploadedFile) {
    const reader = new FileReader();
    reader.onload = () => {
      const parent = document.querySelector('.preview-box');
      parent.innerHTML = `<img class="preview-content" src=${reader.result} />`;
    };
    reader.readAsDataURL(uploadedFile);
  }
};

</script>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 
