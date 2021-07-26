<?php
include("../backend.php");
class voucher extends Backend{
    function __construct(){
        parent::__construct();
        if (@$_SESSION['users_id'] == ""){
            echo "<meta http-equiv='refresh' content='0;../fLogin.php'>";
        }
    }

    function list(){
        $data['judul']  = "Voucher";
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
            $data['dataUsers']      = $this->con->query('SELECT * FROM tb_users WHERE users_id="'.$_SESSION['users_id'].'"')->fetch_object();
        }

        $data['value']  = $this->con->query('SELECT * FROM tb_voucher');
        echo $this->views("voucher/list.php", $data);
    }
    
    function tambah(){
        $data['judul']  = "Voucher";
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("voucher/tambah.php", $data);
    }

    function prosesTambah(){
        extract($_POST);
        $result = $this->con->query("INSERT INTO tb_voucher(voucher_nama, voucher_kode, voucher_nominal, voucher_expired, date_entry, users_id, voucher_harga) VALUES('".$voucher_nama."', '".$this->generateVoucher(15)."', '".str_replace(".", "", $voucher_nominal)."', '".date_format(date_create($voucher_expired), "Y-m-d H:i:s")."', '".date('Y-m-d H:i:s')."', '".$_SESSION['users_id']."', '".str_replace(".", "", $voucher_harga)."')");
        if ($result){
            $this->redirect("voucher.php");
        }else{
            echo "<script>alert('Data gagal disimpan')</script>";       
        }
    }
    
    function edit(){
        $data['judul']  = "Voucher";
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        $data['value']  = $this->con->query("SELECT * FROM tb_voucher WHERE voucher_id='".$_GET['id']."'")->fetch_object();
        echo $this->views("voucher/edit.php", $data);
    }
    
    function prosesEdit($id){
        extract($_POST);
        $result = $this->con->query("UPDATE tb_voucher SET voucher_nama='".$voucher_nama."', voucher_expired='".$voucher_expired."', voucher_nominal='".str_replace(".", "", $voucher_nominal)."', voucher_harga='".str_replace(".", "", $voucher_harga)."' WHERE voucher_id='".$id."'");
        if ($result){
            $this->redirect("voucher.php");
        }else{
            echo "<script>alert('Data gagal disimpan')</script>";       
        }
    }
    
    function prosesBuy($id){
        $dataVoucher = $this->con->query("SELECT * FROM tb_voucher WHERE voucher_id='".$id."'")->fetch_object();
        $result = $this->con->query("INSERT INTO tb_users_voucher(voucher_kode, users_id, redeem_date) VALUES('".$dataVoucher->voucher_kode."', '".$_SESSION['users_id']."', '".date("Y-m-d H:i:s")."')");
        if ($result){
            $dataUsers      = $this->con->query('SELECT * FROM tb_users WHERE users_id="'.$_SESSION['users_id'].'"')->fetch_object();
            
            $currentPoints = $dataUsers->points;
            $transaksiPoint= $currentPoints - $dataVoucher->voucher_harga;

            $this->con->query("UPDATE tb_users SET points='".$transaksiPoint."' WHERE users_id='".$dataUsers->users_id."'");

			echo json_encode(array("succ" => 1, "pwd" => "SPT"));
		}else{
            echo json_encode(array("succ" => 0, "pwd" => "SPT"));
		}
    }
    
    function prosesHapus($id){
        $result = $this->con->query("DELETE FROM tb_voucher WHERE voucher_id='".$id."'");
        if ($result){
			echo json_encode(array("succ" => 1, "pwd" => "SPT"));
		}else{
            echo json_encode(array("succ" => 0, "pwd" => "SPT"));
		}
    }

    function generateVoucher($jumlah = 8){
        $data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$string = '';
		for($i=0;$i < $jumlah;$i++){
			$random = rand(0, strlen($data)-1);
			$string .= $data[$random];
		}
		
		return strtoupper($string);
    }
}

$voucher = new voucher();

if (!@$_GET['aksi']){
    // tampilkan list
    $voucher->list();
}else{

    if (@$_GET['aksi'] == "tambah"){
        // tambah data
        $voucher->tambah();
        if (@$_POST['simpan']){
            $voucher->prosesTambah();
        }
    }elseif (@$_GET['aksi'] == "edit"){
        // edit data
        $voucher->edit();
        if (@$_POST['simpan']){
            $voucher->prosesEdit($_GET['id']);
        }
    }elseif (@$_GET['aksi'] == "hapus"){
        // hapus data
        $voucher->prosesHapus($_GET['id']);
        
    }elseif (@$_GET['aksi'] == "buy"){
        // hapus data
        $voucher->prosesBuy($_GET['id']);
        
    }
}
?>
