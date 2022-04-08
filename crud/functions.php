<?php

// untuk koneksi ke database
$conn = mysqli_connect("localhost","root","","tblbuku");

function query($query) {

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row; // <- add data array di setiap setelah perulangan
    }

    return $rows;
}

function addData($data) {

    global $conn;

    $judul = htmlspecialchars($data['judul']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahun = htmlspecialchars($data['tahun']);
    $kota = htmlspecialchars($data['kota']);

    // Upload gambar, cek apakah ada gambar yang di upload atau tidak
    $foto = upload();
    if ( !$foto ) {
        return false;
    }

    $query = "INSERT INTO buku VALUES ('', '$judul', '$penerbit', '$tahun', '$kota', '$foto')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $tmpName = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error'];

    // Cek apakah ada gambar yg di upload atau tidak
    if ( $error === 4){
        echo"
                <script>
                    alert('Pilih gambar terlebih dahulu ya!');
                </script>
            ";
        return false;
    }

    $ekstensiGambarBenar = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar)); 

    // cek apakah yang di upload user ekstensi gambar atau bukan 
    if ( !in_array($ekstensiGambar, $ekstensiGambarBenar)) {
        echo "
                <script>
                    alert('Ekstensi gambar tidak valid!');
                </script>
             ";
        return false;
    }

    // Cek ukuran file, jika > 1 MB munculkan pesan error 
    if ( $ukuranFile > 1000000 ){
        echo "
                <script>
                    alert('Ukuran gambar yang anda masukan terlalu besar!');
                </script>
            ";
        return false;
    }


    // setelah lolos pengecekan jalan fungsi move upload file

    // generate bilangan random agar jika ada file yg di upload dengan nama yg sama tidak tertimpa

    $namaGambarBaru = uniqid(); // <- uniqId untuk membangkitkan string bilangan random
    $namaGambarBaru .= '.';
    $namaGambarBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaGambarBaru);

    return $namaGambarBaru;

}

function hapus($id) {

    global $conn;

    $query = "DELETE FROM buku WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update($data) {

    global $conn;

    $id = $data['id'];
    $judul = htmlspecialchars($data['judul']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahun = htmlspecialchars($data['tahun']);
    $kota = htmlspecialchars($data['kota']);
    $oldImage = $data['oldImage'];


    // Cek apakah user memasukan gambar baru atau tidak 
    if ( $_FILES['foto']['error'] === 4 ) {

        $foto = $oldImage;

    } else {

        $foto = upload(); // Jika memasukan gambar baru, maka akan langsung memanggil function upload
    }


    $query = "UPDATE buku SET 
            judul = '$judul', 
            penerbit = '$penerbit', 
            tahun = '$tahun', 
            kota = '$kota', 
            foto = '$foto' 
            WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function search($keyword) {
    $query = "SELECT * FROM buku 
                WHERE
             judul LIKE '%$keyword%' OR
             penerbit LIKE '%$keyword%' OR
             tahun LIKE '%$keyword%' OR
             kota LIKE '%$keyword%' 
             ";
    
    return query($query);
}

function register($data){

    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    
    // Cek apakah username sudah terdaftar atau belum di dalam database
    $hasil = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if ( mysqli_fetch_assoc($hasil)) {
        echo "
                <script>
                    alert('Username sudah terdaftar, Coba username lain!');
                </script>
             ";

        return false;
    }

    // Cek apakah password dan konfirmasi sama atau tidak
    if ( $password !== $password2){
        echo "
            <script>
                alert('Password tidak sama!');
            </script>
            ";

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user VALUES ('', '$username', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}