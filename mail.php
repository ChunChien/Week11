<?php

require("DBconnect.php");

?>


<html>
    <form action="" method="post">
    請輸入您的email:<input type="email" name="email"><br/>
    <input type="submit" value="訂閱">
    </form>

</html>

<?php

if (isset($_POST["email"])){
    $email = $_POST["email"];

    $SQL = "SELECT*FROM uemail WHERE email='$email'";

    $result=mysqli_query($link,$SQL);

    if(mysqli_num_rows($result)==1){
        echo "<script type='text/javascript'>";
        echo "alert('您已訂閱過');";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=mail.php'>";
    }else{
        $SQL2="INSERT INTO uemail (email) VALUES ('$email')";
        if(mysqli_query($link, $SQL2)){
            echo "<script type='text/javascript'>";
            echo "alert('訂閱成功');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=mail.php'>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('訂閱失敗');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=mail.php'>";
        }
    }


}else{}

?>