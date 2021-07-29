<?php
include("../backend.php");
class invoices extends Backend{
    function __construct(){
        parent::__construct();
        if (@$_SESSION['users_id'] == ""){
            echo "<meta http-equiv='refresh' content='0;../fLogin.php'>";
        }else{
            $data['dataUsers']      = $this->con->query('SELECT * FROM tb_pengguna WHERE users_id="'.$_SESSION['users_id'].'"')->fetch_object();
            if ($data['dataUsers']->nomortelp == "" || $data['dataUsers']->tempat_lahir == "" || $data['dataUsers']->tanggal_lahir == "" ||     $data['dataUsers']->alamat == "" || $data['dataUsers']->kode_pos == ""){
                $this->redirect('profile.php?aksi=edit');
            }
        }
    }

    function list(){
        $data['judul']  = "Invoices";
        if ($_SESSION['role_id'] == "0"){
            $data['value']  = $this->con->query('SELECT * FROM tb_pembelian');
        }else{
            $data['value']  = $this->con->query('SELECT * FROM tb_pembelian WHERE users_id="'.$_SESSION['users_id'].'"');
        }
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("invoices/list.php", $data);
    }
    
    function view(){
        $data['judul']  = "Invoices";
        $data['dataCompany']    = $this->con->query("SELECT * FROM tb_website")->fetch_object();
        $data['value']  = $this->con->query("SELECT * FROM tb_pembelian WHERE invoices_id='".$_GET['id']."'")->fetch_object();
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("invoices/view.php", $data);
    }
    
    function prosesPembayaran($id, $status){
        extract($_POST);
        $result = $this->con->query("UPDATE tb_pembelian SET status='".$status."' WHERE invoices_id='".$id."'");
        if ($result){
            $this->redirect("invoices.php");
        }else{
            echo "<script>alert('Data gagal disimpan')</script>";       
        }
    }

    function prosesPengiriman($id, $status){
        extract($_POST);
        $result = $this->con->query("UPDATE tb_pembelian SET status_pengiriman='".$status."' WHERE invoices_id='".$id."'");
        if ($result){
            if ($status == "2"){
                $bonusPoint = 300;
                $points = $this->con->query("SELECT * FROM tb_pengguna WHERE users_id='".$_SESSION['users_id']."'")->fetch_object()->points;
                $point = $points + 300;

                $this->con->query("UPDATE tb_pengguna SET points='".$point."' WHERE users_id='".$_SESSION['users_id']."'");
            }
            $this->redirect("invoices.php");
        }else{
            echo "<script>alert('Data gagal disimpan')</script>";       
        }
    }
    
    function konfirmasi($id){
        $data['judul']  = "Invoices";
        $data['dataCompany']    = $this->con->query("SELECT * FROM tb_website")->fetch_object();
        $data['value']  = $this->con->query("SELECT * FROM tb_pembelian WHERE invoices_id='".$id."'")->fetch_object();
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("invoices/upload.php", $data);
    }

    function prosesUpload($id){
        extract($_POST);
        if (@$_FILES['bukti_transaksi']){
            $tmp = $_FILES['bukti_transaksi']['tmp_name'];
            $Images = $_FILES['bukti_transaksi']['name'];

            $folder = "../assets/back/img/";

            if (move_uploaded_file($tmp, $folder.$Images)){
                $Image = $Images;
            }else{
                $Image = "";
            }
        }else{
            $Image = NULL;
        }
        $result = $this->con->query("UPDATE tb_pembelian SET bukti_nama_pengirim='".$bukti_nama_pengirim."', bukti_transaksi='".$Image."', tgl_transaksi='".date('Y-m-d H:i:s')."' WHERE invoices_id='".$id."'");
        if ($result){
            $this->redirect("invoices.php");
        }else{
            echo "<script>alert('Data gagal disimpan')</script>";       
        }
    }
    
}

$invoices = new invoices();

if (!@$_GET['aksi']){

    $invoices->list();

}else{

    if (@$_GET['aksi'] == "view"){

        $invoices->view();

    }elseif (@$_GET['aksi'] == "pembayaran"){

        $invoices->prosesPembayaran($_GET['id'], $_GET['status']);

    }elseif (@$_GET['aksi'] == "pengiriman"){

        $invoices->prosesPengiriman($_GET['id'], $_GET['status']);

    }elseif (@$_GET['aksi'] == "konfirmasi"){

        $invoices->konfirmasi($_GET['id']);

    }elseif (@$_GET['aksi'] == "upload"){

        $invoices->prosesUpload($_GET['id']);

    }
}
?>
