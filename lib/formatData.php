<?php

class Formate{

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
    }
}

?>