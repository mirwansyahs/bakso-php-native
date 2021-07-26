<?php
include("../backend.php");
class pemilik extends Backend{
    function __construct(){
        parent::__construct();
        if (@$_SESSION['users_id'] == ""){
            echo "<meta http-equiv='refresh' content='0;../fLogin.php'>";
        }
    }

    function list(){
        $data['judul']  = "Pengguna";
        $data['url']    = "pemilik";
        $data['value']  = $this->con->query('SELECT * FROM tb_pengguna WHERE role_id="1"');
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("pengguna/list.php", $data);
    }
    
    function tambah(){
        $data['judul']  = "Pengguna";
        $data['url']    = "pemilik";
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("pengguna/tambah.php", $data);
    }

    function prosesTambah(){
        extract($_POST);
        $result = $this->con->query("INSERT INTO tb_pengguna(users_nama, email, password, role_id) VALUES('".$users_nama."', '".$email."', '".sha1(md5($password))."', '".$role_id."')");
        if ($result){
            $this->redirect("pemilik.php");
        }else{
            echo "<script>alert('Data gagal disimpan')</script>";       
        }
    }
    
    function edit(){
        $data['judul']  = "Pengguna";
        $data['url']    = "pemilik";
        $data['value']  = $this->con->query("SELECT * FROM tb_pengguna WHERE users_id='".$_GET['id']."'")->fetch_object();
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("pengguna/edit.php", $data);
    }
    
    function prosesEdit($id){
        extract($_POST);
        if ($password == ""){
            $password = $this->con->query("SELECT * FROM tb_pengguna WHERE users_id='".$id."'")->fetch_object()->password;
        }else{
            $password = sha1(md5($password));
        }
        $result = $this->con->query("UPDATE tb_pengguna SET users_nama='".$users_nama."', email='".$email."', password='".$password."', role_id='".$role_id."' WHERE users_id='".$id."'");
        if ($result){
            $this->redirect("pemilik.php");
        }else{
            echo "<script>alert('Data gagal disimpan')</script>";       
        }
    }
    
    function prosesHapus($id){
        $result = $this->con->query("DELETE FROM tb_pengguna WHERE users_id='".$id."'");
        if ($result){
			echo json_encode(array("succ" => 1, "pwd" => "SPT"));
		}else{
            echo json_encode(array("succ" => 0, "pwd" => "SPT"));
		}
    }
}

$pemilik = new pemilik();

if (!@$_GET['aksi']){
    // tampilkan list
    $pemilik->list();
}else{

    if (@$_GET['aksi'] == "tambah"){
        // tambah data
        $pemilik->tambah();
        if (@$_POST['simpan']){
            $pemilik->prosesTambah();
        }
    }elseif (@$_GET['aksi'] == "edit"){
        // edit data
        $pemilik->edit();
        if (@$_POST['simpan']){
            $pemilik->prosesEdit($_GET['id']);
        }
    }elseif (@$_GET['aksi'] == "hapus"){
        // hapus data
        $pemilik->prosesHapus($_GET['id']);
        
    }
}
?>
