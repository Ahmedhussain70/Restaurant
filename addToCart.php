<?php 

include 'includes/db.php';

class addToCart extends database{
    public function insert(){
        
            $user_id = ($_POST['user_id']);
            $item_id  =  ($_POST['item_id']);
            $qty  =  ($_POST['qty']);
    
    
            $sql = "INSERT INTO cart (`user_id`,`item_id`,`qty`)
            VALUES('$user_id','$item_id','$qty')";
    
            $conn = mysqli_connect($this->servername,$this->username, $this->password,$this->db_name);
    
            if (mysqli_query($conn,$sql)){
            header("location: " . $_SERVER['HTTP_REFERER']);
            $success_msg[] = "Added Successfully!";
            }
            else{
            // echo"error: " . $sql . "<br>" . mysqli_error($conn);
            $error_msg[] = "Error";
            }
    }
}
?>