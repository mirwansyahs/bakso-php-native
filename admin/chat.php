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
        $data['judul']  = "Chat";
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        $data['value']  = $this->con->query('SELECT * FROM pesan_masuk, tb_pengguna WHERE pesan_masuk.Id_Pengirim=tb_pengguna.users_id AND pesan_masuk.Id_Penerima="'.$_SESSION['users_id'].'"');
        
        echo $this->views("chat/list.php", $data);
    } 
 
    function reply(){
        $data['judul']  = "Chat";
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        $data['value']  = $this->con->query('SELECT * FROM pesan_masuk, tb_pengguna WHERE pesan_masuk.Id_Pengirim=tb_pengguna.users_id AND pesan_masuk.Id_Penerima="'.$_SESSION['users_id'].'"');
        
        echo $this->views("chat/view.php", $data);
    } 
 
    function prosesHapus($id){
        $result = $this->con->query("DELETE FROM pesan_masuk WHERE IdPesanMasuk='".$id."'");
        if ($result){
			echo json_encode(array("succ" => 1, "pwd" => "SPT"));
		}else{
            echo json_encode(array("succ" => 0, "pwd" => "SPT"));
		}
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
    }elseif (@$_GET['aksi'] == "reply"){
        // edit data
        $chat->reply();
        if (@$_POST['simpan']){
            $chat->prosesEdit($_GET['id']);
        }
    }elseif (@$_GET['aksi'] == "hapus"){
        // hapus data
        $chat->prosesHapus($_GET['id']);
        
    }
}
?>
