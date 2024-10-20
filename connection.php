<?php

class Database{
  private $db;
  private $serverName = "SATRIOWISNU\SQLEXPRESS";
  private $connectionInfo = array("Database" => "form_kontak", "TrustServerCertificate" => true, "UID" => "", "PWD" => "");
//   private $connectionInfo = array("Database" => "form_kontak", "UID" => "", "PWD" => "sa");
  private $query;
  private $result;
  private $dataset;
  private $num_rows;

  public function connect(){
    $this->db = sqlsrv_connect($this->serverName, $this->connectionInfo);

    if($this->db === false) {
      die(print_r(sqlsrv_errors(), true));
    }
  }

  public function execute($query){  // execute berfungsi untuk menampilkan data
    $this->query = $query;
    $this->result = sqlsrv_query($this->db, $this->query);

    if($this->result === false) {
      die(print_r(sqlsrv_errors(), true));
    }
  }

  public function executeUpdate($query){ // executeUpdate untuk update, insert, delete
    $this->query = $query;
    $this->result = sqlsrv_query($this->db, $this->query);

    if($this->result === false) {
      die(print_r(sqlsrv_errors(), true));
    }
  }

  public function get_dataset(){
    $dataset = array();
    $i = 0; // $i maksudnya index
    while ($r = sqlsrv_fetch_array($this->result, SQLSRV_FETCH_NUMERIC)){
      $field = 0;
      foreach ($r as $value) {
        $dataset[$i][$field] = $value;
        $field++;
      }
      $i++;
    }
    return $dataset;
  }

  public function get_num_row(){
    $this->num_rows = sqlsrv_num_rows($this->result);
    return $this->num_rows;
  }

  public function close_connection(){
    sqlsrv_close($this->db);
  }

}

class kontak extends Database{

  function selectAllKontak(){
    $this->execute("SELECT * FROM tb_kontak");
  }

  function insertKontak($id_kontak, $nama, $kontak, $email){
    $this->executeUpdate("INSERT INTO tb_kontak (id_kontak, nama, kontak, email) VALUES ('$id_kontak', '$nama', '$kontak', '$email')");
  }

  function detailDataKontak($id_kontak){
    $this->execute("SELECT * FROM tb_kontak WHERE id_kontak='".$id_kontak."'");
  }

  function updateDataKontak($id_kontak, $nama, $kontak, $email){
    $this->executeUpdate("UPDATE tb_kontak SET nama='".$nama."', kontak='".$kontak."', email='".$email."' WHERE id_kontak='".$id_kontak."'");
  }

  function deleteDataKontak($id_kontak){
    $this->executeUpdate("DELETE FROM tb_kontak WHERE id_kontak='".$id_kontak."'");
  }
}

//---------------------
// --BUKU_TAMU_KELAS---
//---------------------
class Kelas extends Database{

  function selectAllKelas(){
    $this->execute("SELECT * FROM kelas");
  }

}
?>
