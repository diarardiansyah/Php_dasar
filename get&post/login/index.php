<?php
    //cek user sudah click button login atau belum
    if ( isset($_POST['submit'])){
        // cek username dan password
        if( $_POST['username'] == 'ardiansyah' && $_POST['pass'] == '2212'){
            // jika benar direct ke halaman admin
            header("Location: admin.php");
            exit;
        
        } else {
            // Jika username dan password salah tampilkan pesan error 
            $pesan_error = true;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if( isset($pesan_error)) : ?>
    <p style = "color : red; font-style: italic;">Username dan kamu masukan salah!!</p>
<?php endif; ?>

<h1>Form Login</h1>

<form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="pass">Password:</label>
    <input type="password" name="pass" id="pass">
    <br>
    <button type="submit" name="submit">Login</button>
</form>
    
</body>
</html>