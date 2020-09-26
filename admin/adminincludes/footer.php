<footer style="background-color: #2f323a;color: #64616187; padding: 10px 0; font-size: 11px;font-family: serif;">
   <div class="d-flex justify-content-center mt-2">
       <h5 >Copyright &copy: Group F 2020</h5>
   </div>
</footer>
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

  
/***Image Load */
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
function selectChange(val) {
    //Set the value of action in action attribute of form element.
    //Submit the form
    $('#myForm').submit();
}
</script>
</body>
</html>

