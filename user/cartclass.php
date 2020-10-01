<?php 

include_once '../lib/Session.php'; 
Session::initializedSession();
include_once '../lib/Database.php'; 
include_once '../lib/formatData.php';



class Cart
{

     private $db,$fm;
    function __construct()
    {
          $this->db = new Database();
          $this->fm = new Formate(); 
    }

    public function addtocart($quantity,$id){
         $customer_id = $_SESSION['userId'];
         $quantity   =  mysqli_real_escape_string($this->db->link,$this->fm->validation($quantity));
         $food_id    =  mysqli_real_escape_string($this->db->link,$id);
         $session_id =   session_id();
         $query = "SELECT * FROM `tbl_fooddetails` WHERE `id` = '$food_id'";
         $result = $this->db->SelectData($query);
         if($result){
            $food_data = $result->fetch_assoc();
            
            $fd_name = $food_data['fd_name'];
            $fd_img = $food_data['fd_image'];
            $fd_price = $food_data['fd_price'];

            $query = "INSERT INTO `tbl_cart`( `s_id`, `product_id`, `product_name`, `price`, `quantity`, `image`,`customer_id`) VALUES ('$session_id','$food_id','$fd_name','$fd_price','$quantity','$fd_img','$customer_id')";
            $res = $this->db->QueryExcute($query);
            if($res){
                  header('Location:mycart.php');
            }
            else{
                  header('Location:404.php');
               }
         }
         else{
            header('Location:404.php');
         }
    }

    public function updatecart($quantity,$id){
      $customer_id = $_SESSION['userId'];
      $quantity   =  mysqli_real_escape_string($this->db->link,$this->fm->validation($quantity));
      $food_id    =  mysqli_real_escape_string($this->db->link,$id);
      $session_id =   session_id();
      
      $query = "UPDATE `tbl_cart` SET 
      `quantity`= '$quantity'  WHERE 
      `customer_id` = '$customer_id' AND `product_id` = '$food_id' ";
      $res = $this->db->QueryExcute($query);

      if($res){
            header('Location:mycart.php');
      }
      else{
         header('Location:404.php');
      }
   }

   public function removecart($id){

     
      $query = "DELETE FROM `tbl_cart` WHERE `c_id` = ' $id' ";
      $res = $this->db->QueryExcute($query);
      if($res){
            header('Location:mycart.php');
      }
      else{
         header('Location:404.php');
      }
   }

}


?>