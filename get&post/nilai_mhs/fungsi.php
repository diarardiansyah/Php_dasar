<?php

$conn = mysqli_connect("localhost", "root", "", "mhs"); 


function getData($query){

     global $conn;

     $result = mysqli_query($conn, $query);
     $rows = [];
     while ( $row = mysqli_fetch_assoc($result) ) {
          $rows[] = $row;
     }

     return $rows;
}

function getDataMhs($data) {
      global $conn;

      $hasil = mysqli_query($conn, $data);
      $rowa1 = [];
      while ( $row1 = mysqli_fetch_assoc($hasil) ){
           $rowa1[] = $row1;
      }

      return $rowa1;
}

function addData($data) {

     global $conn;

     $nama = $data["nama"];
     $kehadiran = $data['kehadiran'];
     $tugas = $data['tugas'];
     $uts = $data['uts'];
     $uas = $data['uas'];

     // Hitung nilai bedasarkan bobot

     $nilaiKehadiran = $kehadiran * 0.1;
     $nilaiTugas = $tugas * 0.2;
     $nilaiUts = $uts * 0.3; 
     $nilaiUas = $uas * 0.4;

     // Hitung nilai akhir

     $nilaiAkhir = $nilaiKehadiran + $nilaiTugas + $nilaiUts + $nilaiUas;

     if ( $nilaiAkhir >= 100 && $nilaiAkhir < 90 ){ 
          $grade = "A";
     } else if ( $nilaiAkhir < 85 && $nilaiAkhir >= 70 ){
          $grade = "B";
     } else if ( $nilaiAkhir >= 65 && $nilaiAkhir < 55 ){
          $grade = "C";
     }

     $query = "INSERT INTO tblmhs VALUES ('', '$nama', '$kehadiran', '$tugas', '$uts', '$uas', '$nilaiAkhir','$grade')";
     mysqli_query($conn, $query);

     return mysqli_affected_rows($conn);

}

function addDataMhs($data) {

     global $conn;

     $nama = $data["nama"];
     $jenis_kelamin = $data["jenis_kelamin"];

     $query = "INSERT INTO mahasiswa VALUES('', '$nama', '$jenis_kelamin')";
     mysqli_query($conn, $query);

     return mysqli_affected_rows($conn);
}

function hapus($id) {

     global $conn;

     $query = "DELETE FROM tblmhs WHERE id = $id";
     mysqli_query($conn, $query);

     return mysqli_affected_rows($conn);
}

