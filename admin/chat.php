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

        $data['value']  = $this->con->query('SELECT * FROM pesan_masuk, tb_pengguna WHERE pesan_masuk.Id_Pengirim=tb_pengguna.users_id AND pesan_masuk.Id_Penerima="'.$_SESSION['users_id'].'" GROUP BY pesan_masuk.Id_Pengirim');
        
        if ($_SESSION['role_id'] == "0"){
            echo $this->views("chat/list.php", $data);
        }else{
            echo $this->views("chat/view.php", $data);
        }
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

    function s_pesanmasuk(){
        $Id_Pengirim = $_GET['pengirim'];
        $json = '{"messages": {';

        if ($_SESSION['role_id'] != "0"){
            $dataAdmin  = $this->con->query("SELECT * FROM tb_pengguna WHERE role_id='0'")->fetch_object();
            $user       = $dataAdmin->users_id;
        }else{
            $user       = $_GET['pengirim'];
        }
        
        $akhir = $_GET['akhir'];
        $sql = "SELECT * FROM pesan_masuk, tb_pengguna 
        WHERE pesan_masuk.Id_Pengirim = tb_pengguna.users_id
        AND pesan_masuk.Id_Pengirim='$user'
        AND pesan_masuk.Id_Penerima='".$_SESSION['users_id']."'
        AND pesan_masuk.IdPesanMasuk > $akhir
        OR pesan_masuk.Id_Pengirim=tb_pengguna.users_id 
        AND pesan_masuk.Id_Penerima='$user'
        AND pesan_masuk.Id_Pengirim='".$_SESSION['users_id']."'
        AND pesan_masuk.IdPesanMasuk > $akhir
        ORDER BY pesan_masuk.TanggalKirim ASC";
        // echo $sql;
        $query = $this->con->query($sql);
        
        $html[] = NULL;
        $no = 0;
        while ($key = $query->fetch_object()){
            $imageUser = ($key->image != "")?$key->image:'avatar5.png';
            $leftRight = ($key->Id_Pengirim == $_SESSION['users_id'])?'right':'left';
            $reverse = ($leftRight == 'right')?'left':'right';
            $html[$no] = '
            <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-'.$leftRight.'">'.$key->users_nama.'</span>
                    <span class="direct-chat-timestamp float-'.$reverse.'">'.$key->TanggalKirim.'</span>
                </div>
                <img class="direct-chat-img" src="'.base_url.'assets/back/img/'.$imageUser.'" alt="Message User Image">
                <div class="direct-chat-text">
                    '.htmlspecialchars_decode($key->IsiPesan).'
                </div>
            </div>';
            $no++;
        }

        echo json_encode(array('data' => $html));

    }

    function kirim_pesanmasuk(){
        $akhir      = $_GET['akhir'];
        $isipesan   = htmlspecialchars(mysqli_real_escape_string($this->con, $_GET['pesan']));
        if ($_SESSION['role_id'] != "0"){
            $dataAdmin  = $this->con->query("SELECT * FROM tb_pengguna WHERE role_id='0'")->fetch_object();
            $user       = $dataAdmin->users_id;
        }else{
            $user       = $_GET['user'];
        }
        date_default_timezone_set("Asia/Jakarta");
        $tgl        = date("Y-m-d H:i");
                    
        $add = $this->con->query("INSERT INTO pesan_keluar(IdPesanKeluar, Id_Penerima, IsiPesan, TanggalKirim, Id_Pengirim) VALUES ('', '$user', '$isipesan', '$tgl', '".$_SESSION['users_id']."')");
        
        $add = $this->con->query("INSERT INTO pesan_masuk(IdPesanMasuk, Id_Penerima, IsiPesan, TanggalKirim, Id_Pengirim) VALUES ('', '$user', '$isipesan', '$tgl', '".$_SESSION['users_id']."')");
                    
        echo "Sukses Send";
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
        
    }elseif (@$_GET['aksi'] == "s_pesanmasuk"){
        $chat->s_pesanmasuk();
    }elseif (@$_GET['aksi'] == "kirim_pesanmasuk"){
        $chat->kirim_pesanmasuk();
    }
}
?>
