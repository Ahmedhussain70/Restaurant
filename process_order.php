<?php 

include 'includes/db.php';
// include 'includes/alert.php';

class order extends database{
    public function insert(){
        $user_id = ($_POST['user_id']);
        $item_id  =  ($_POST['item_id']);
        $qty  =  ($_POST['qty']);

        $conn = mysqli_connect($this->servername,$this->username, $this->password,$this->db_name);

        $sql = "INSERT INTO order_list (`user_id`,`item_id`,`qty`)
        VALUES('$user_id','$item_id','$qty')";

        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        if (mysqli_query($conn,$sql)){
        header("location:thanks.php");
        $success_msg[] = "Added Successfully!";
        }
        else{
        // echo"error: " . $sql . "<br>" . mysqli_error($conn);
        $error_msg[] = "Error";
        }
    }
}
?>