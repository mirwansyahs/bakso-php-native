<?php
include("../backend.php");
class Produk extends Backend{
    function __construct(){
        parent::__construct();
        if (@$_SESSION['users_id'] == ""){
            echo "<meta http-equiv='refresh' content='0;../fLogin.php'>";
        }
    }

    function list(){
        $data['judul']  = "Detail";
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        $data['value']  = $this->con->query('SELECT * FROM tb_produk');
        echo $this->views("detail/list.php", $data);
    } 
 
}

$produk = new Produk();

if (!@$_GET['aksi']){
    // tampilkan list
    $produk->list();
}else{

    if (@$_GET['aksi'] == "tambah"){
        // tambah data
        $produk->tambah();
        if (@$_POST['simpan']){
            $produk->prosesTambah();
        }
    }elseif (@$_GET['aksi'] == "edit"){
        // edit data
        $produk->edit();
        if (@$_POST['simpan']){
            $produk->prosesEdit($_GET['id']);
        }
    }elseif (@$_GET['aksi'] == "hapus"){
        // hapus data
        $produk->prosesHapus($_GET['id']);
        
    }
}
?>
