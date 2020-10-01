<?php 

include_once '../lib/Session.php'; 
Session::initializedSession();
include_once '../lib/Database.php'; 
include_once '../lib/formatData.php';


echo "<br><br><br>";
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
            $price = $quantity*$fd_price;
            $query = "INSERT INTO `tbl_cart`( `s_id`, `product_id`, `product_name`, `price`, `quantity`, `image`,`customer_id`) VALUES ('$session_id','$food_id','$fd_name','$price','$quantity','$fd_img','$customer_id')";
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

   public function orederFood($customer_id, $payment_status){
    

      $order_status = 1 ; // Pending order = 0
      
      // Generate Transition Id
      $orderCustomId = 100;
      $query_trans   = "SELECT MAX(`orderCustomId`) as transitsion FROM `tbl_orders`";
      $res           = $this->db->SelectData($query_trans);
      if($res){
         $data          = $res->fetch_assoc();
         $orderCustomId = $data['transitsion']+1;
      }
      //----------------------
      // location fecth from customer
      $od_Location = "" ;
      $query_cust  = "SELECT * FROM `tbl_user` WHERE `id` = '$customer_id'";
      $res_cus     = $this->db->SelectData($query_cust);
      if($res_cus){
         $data     = $res_cus->fetch_assoc();
         $od_Location = $data['address'];
      }
      //----------------------
      $query        = "SELECT * FROM `tbl_cart` WHERE `customer_id` = '$customer_id'";
      $result       = $this->db->SelectData($query);
      if($result){
         while( $cart_data     = $result->fetch_assoc()){
            $foodName     = $cart_data['product_name'];
            $foodID       = $cart_data['product_id'];
            $foodPrice    = $cart_data['price'];
            $foodQuantity = $cart_data['quantity'];
            $image        = $cart_data['image'];
            

            $query_OD = "INSERT INTO `tbl_orders`( `od_type`, `od_items`, `od_items_name`, `od_paymentStatus`, `od_price`, `od_quantity`, `customer_id`, `od_Loction`, `od_image`,`orderCustomId`) VALUES ('$order_status','$foodID','$foodName','$payment_status','$foodPrice','$foodQuantity','$customer_id','$od_Location','$image','$orderCustomId')";
            $result = $this->db->SelectData($query_OD);
            if($result){
               $queryCart = "DELETE FROM `tbl_cart` WHERE `customer_id` = ' $customer_id' ";
               $resCart = $this->db->QueryExcute($queryCart);
               if($resCart){
                     header('Location:myorder.php');
               }
               else{
                  header('Location:404.php');
               }
            }
            else{
               header('Location:404.php');
            }

         }
      }
      else{
         //header('Location:404.php');
      }
   }

}


?>