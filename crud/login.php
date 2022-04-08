<?php   
    session_start();

    require 'functions.php';

    // Cek sebelum menjalan kan session ada cookie atau tidak
    if ( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // Ambil username dari dalam database
        $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        // Cek apakah key/username yang sudah di encrypt sama atau tidak dengan username yang ada di dalam db 
        if ( $key === hash('sha256', $row['username'])){

            $_SESSION['login'] = true;
        }

    }

    if ( isset($_SESSION["login"])) {

        header("Location: index.php");
        exit;
    }

   

    // cek apakah button login sudah di click atau belum
    if( isset($_POST["login"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        // cek username ada di dalam databse atau tidak 
        if ( mysqli_num_rows($result) === 1){

            // cek password 
            $row = mysqli_fetch_assoc($result);

            if( password_verify($password, $row["password"])){
                
                // Cek session
                $_SESSION["login"] = true;

                // Cek checkbox remember sudah di click atau belum 
                if( isset($_POST['remember'])){

                    setcookie('id', $row['id'], time() + 60);
                    setcookie('key', hash('sha256', $row['username']), time() + 60 );
                }

                header("Location: index.php");
                exit;
            }
        }

        $error = true;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            display : block;
        }
    </style>
</head>
<body>

<h1>Login Sistem Informasi Buku</h1>

<?php if (isset($error)) : ?>
    <p style="color : red; font-style: italic;">Username / Password salah!!</p>
<?php endif; ?>

<form action="" method="post">
    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remeber Me</label>
        </li> 
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>
</form>
    
</body>
</html>