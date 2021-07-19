<?php

//cart class
class cart
{
 public $db = null;

 public function __construct(DBconnection $db){
     if(!isset($db->con)) return null;
     $this->db = $db;
 }

 //inserting into cart table
    public function insertinCart($params = null, $table = "cart"){
     if ($this->db->con !=null){
        if ($params !=null){
            //query "insert into cart(User_ID) values (?)"
            //get table column
            $columns = implode(',',array_keys($params));
            $values = implode(',',array_values($params));
            $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table, $columns, $values);
            //sql query
            $result = $this->db->con->query($query_string);
            return $result;

        }

     }
    }



    //get user_id & item_id and insert it to table
    public function addToCart($userid,$itemid){
     if (isset($userid) && isset($itemid)){
         $params = array(
             "user_id" => $userid,
             "item_id" => $itemid
         );

         //insert data into cart
         $result = $this->insertinCart($params);
         if ($result){
             //reaload the page.
             header("Location:".$_SERVER['PHP_SELF']);
         }
     }
    }

    //deleting the cart items using item ID

    public function deleteCart ($item_id = null, $table = 'cart'){
     if ($item_id !=null){
         $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
         if ($result){
             header("Location:" . $_SERVER['PHP_SELF']);
         }
         return $result;
     }
    }




    //calculate the sub total value
    public  function getSum($arr){
     if(isset($arr)){
         $sum=0;
         foreach ($arr as $item){
             $sum += floatval($item[0]);
         }
         return sprintf('%.2f', $sum);

     }
    }


    //getting item_id of shopping cart list
    public  function  getCartId($cartArray = null, $key = "item_id") {
     if ($cartArray !=null){
         $cart_id = array_map(function ($value) use($key){
             return $value[$key];
         }, $cartArray);
         return $cart_id;
     }
    }

// Save for later function
    public  function saveForLater ($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id  !=null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id = {$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id = {$item_id};";
            echo $query;

            //executing multiple queries
            $result = $this->db->con->multi_query($query);
            if ($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }


//deleting the wishlist items using item ID

    public function deleteWishlist ($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id !=null){
            $result = $this->db->con->query("DELETE FROM {$fromTable} WHERE item_id={$item_id}");
            if ($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }


}