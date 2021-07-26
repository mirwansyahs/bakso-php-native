<?php
include("../backend.php");
class chat extends Backend{
    function __construct(){
        parent::__construct();
        if (@$_SESSION['users_id'] == ""){
            echo "<meta http-equiv='refresh' content='0;../fLogin.php'>";
        }
    }

    function list(){
        $data['judul']  = "Detail";
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        $data['value']  = $this->con->query('SELECT * FROM tb_chat');
        echo $this->views("detail/list.php", $data);
    } 
 
}

$chat = new chat();

if (!@$_GET['aksi']){
    // tampilkan list
    $chat->list();
}else{

    if (@$_GET['aksi'] == "tambah"){
        // tambah data
        $chat->tambah();
        if (@$_POST['simpan']){
            $chat->prosesTambah();
        }
    }elseif (@$_GET['aksi'] == "edit"){
        // edit data
        $chat->edit();
        if (@$_POST['simpan']){
            $chat->prosesEdit($_GET['id']);
        }
    }elseif (@$_GET['aksi'] == "hapus"){
        // hapus data
        $chat->prosesHapus($_GET['id']);
        
    }
}
?>
