<?php

class Formate{


  
    function __construct()
    {
         //
    }
    /*
     * 1.trim ( string $str [, string $character_mask = " \t\n\r\0\x0B" ] )
     * $character_mask are remove form $str
     * Normaly The trim() function removes whitespace and other predefined
       characters from both sides of a string.
     *2.stripslashes() funtion Remove the backslash
     *3.Convert the predefined characters "<" (less than) and ">" (greater than) to HTML entities
     *
     *
     *
     *  */
    public function validation($data){
          $data=trim($data);
          $data=stripslashes($data);
          $data=htmlspecialchars($data);
          return $data;
    }

    public function ImageSetup($img,$folder){

      /*---------Permite Img Type-----------*/
      $imageType = array('jpg','png','jpeg','gif','psd','pdf');
      /*---------------Take Image Size,Name,Tmp Locatiom-----------------------*/
      $img_name = $_FILES[$img]['name'];
      $img_size = $_FILES[$img]['size'];
      /*--------------- Uniqe Image Generation--------------------- */
      $explodationPoint = explode('.',$img_name);
      $img_extention    = strtolower(end($explodationPoint));
      /*
       * substr(md5(time()),0,10)  it's create substr or  name bettween 0 to 10 
       * '.' its concated then add the file extention ;
      */
      $uniqe_img = substr(md5(time()),0,10).'.'.$img_extention;
      /**----------Image Folder derection--------- */
      
      /**  Concat image folder and img name ** */
      $uploadImage = $folder.$uniqe_img;
      
      if($img_size >(1024*1024)){
         return false;
      }
      elseif (in_array($img_extention, $imageType) === false) {
        return false;
      }else{
        return $uploadImage;
      }
    }

    public function MoveFile($imgTemp,$imgName)
    {
      $img_temp = $_FILES[$imgTemp]['tmp_name'];
      move_uploaded_file($img_temp,$imgName);
    }
 /**--------text Formet-------- */
  public function textshort($text,$limit = 400 )
	{
		$text = $text." ";
		$text =substr($text,0,$limit);
		$text =substr($text,0,strrpos($text, ' '));
		$text = $text."....";
		return $text;
  }
  
  public function PaymentMethod($pay){
    if($pay == 1){
      return $pay = "Cash";
    }
    elseif($pay == 2)
    {
      return $pay = "Card";
    }
    else{
      return $pay = "-----";
    }

  }
  function TrakOrder($odTrack){

    if($odTrack == 1 ){
        return $odTrack = "Pending";
    }
    elseif($odTrack == 2 ){
        return $odTrack = "Active";
    }
    elseif($odTrack == 4 ){
        return $odTrack = "Rejected";
    }
    elseif($odTrack == 3 ){
        return $odTrack = "Delevered";
    }
}
  
  public function FormateDate($date)
	{
		return date('j F Y, g:i a',strtotime($date));
	}
}

?>