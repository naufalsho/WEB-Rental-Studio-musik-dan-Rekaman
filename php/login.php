<?php
    ob_start();
    session_start();
    $db = "rental_studio_rekaman";
    $user        = $_POST['login-email'];
    $password    = $_POST['login-password'];
    $_SESSION['login-email'] = $user;

        $conn = new mysqli("localhost","root","",$db);
            if (!$conn){    
                die ("Koneksi ke Engine MySQL Gagal !");
            }
            echo "Connect Succses";
       
    $sql = "SELECT * FROM login where user='$user'";
    $qry = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($qry);
    $row = mysqli_fetch_array($qry);

    if ($num==0 OR $password!=$row['login-password']) {
    ?>
        <script language="JavaScript">
            alert('Username atau Password tidak sesuai !');
            document.location='../login.html';
        </script>
    <?php
    }
    else {
        $_SESSION['login']=1;
        header("Location: ../index.html");
    }
    $conn -> close(); //Tutup koneksi engine MySQL
?>