<?php
include("../backend.php");
class Profile extends Backend{
    function __construct(){
        parent::__construct();
        if (@$_SESSION['users_id'] == ""){
            echo "<meta http-equiv='refresh' content='0;../fLogin.php'>";
        }
    }

    function index(){
        $data['judul']  = "Profile";
        if ($_SESSION['role_id'] == "0"){
            $data['invoiceSemua']       = $this->con->query('SELECT * FROM tb_orders');
            $data['invoiceBelumBayar']  = $this->con->query('SELECT * FROM tb_orders WHERE status="unpaid"');
            $data['invoiceDikemas']     = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="0"');
            $data['invoiceDikirim']     = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="1"');
            $data['invoiceSelesai']     = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="2"');
        }else{
            $data['invoiceSemua']  = $this->con->query('SELECT * FROM tb_orders WHERE users_id="'.$_SESSION['users_id'].'"');
            $data['invoiceBelumBayar']  = $this->con->query('SELECT * FROM tb_orders WHERE status="unpaid" AND users_id="'.$_SESSION['users_id'].'"');
            $data['invoiceDikemas']     = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="0" AND users_id="'.$_SESSION['users_id'].'"');
            $data['invoiceDikirim']     = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="1" AND users_id="'.$_SESSION['users_id'].'"');
            $data['invoiceSelesai']     = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="2" AND users_id="'.$_SESSION['users_id'].'"');
        }
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        $data['value']  = $this->con->query('SELECT * FROM tb_users WHERE users_id="'.$_SESSION['users_id'].'"')->fetch_object();
        echo $this->views("profile/index.php", $data);
    }
    
    function edit(){
        $data['judul']  = "Profile";
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        $data['value']  = $this->con->query('SELECT * FROM tb_users WHERE users_id="'.$_SESSION['users_id'].'"')->fetch_object();
        echo $this->views("profile/edit.php", $data);
    }

    function prosesEdit(){
        extract($_POST);
        $dataUser = $this->con->query("SELECT * FROM tb_users WHERE users_id='".$_SESSION['users_id']."'")->fetch_object();
        if (@$_FILES['image']){
            $tmp = $_FILES['image']['tmp_name'];
            $Images = $_FILES['image']['name'];

            $folder = "../assets/back/img/";

            if (move_uploaded_file($tmp, $folder.$Images)){
                $Image = $Images;
            }else{
                $Image = $dataUser->image;
            }
        }else{
            $Image = $dataUser->image;
        }
        
        if ($password == ""){
            $password = $dataUser->password;
        }else{
            $password = sha1(md5($password));
        }
        $result = $this->con->query("UPDATE tb_users SET users_nama='".$users_nama."', alamat='".$alamat."', nomortelp='".$nomortelp."', image='".$Image."', tempat_lahir='".$tempat_lahir."', tanggal_lahir='".$tanggal_lahir."', kode_pos='".$kode_pos."', password='".$password."' WHERE users_id='".$_SESSION['users_id']."'");
        if ($result){
            $this->redirect("profile.php");
        }else{
            echo "<script>alert('Data gagal disimpan')</script>";       
        }
    }
    function voucher(){
        $data['judul']          = "Profile";
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_orders WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        $data['value']          = $this->con->query('SELECT * FROM tb_users WHERE users_id="'.$_SESSION['users_id'].'"')->fetch_object();
        $data['dataVoucher']    = $this->con->query('SELECT * FROM tb_users_voucher, tb_voucher WHERE tb_users_voucher.voucher_kode = tb_voucher.voucher_kode AND tb_users_voucher.users_id="'.$_SESSION['users_id'].'"');
        echo $this->views("profile/voucher.php", $data);
    }

}
$profile = new Profile();

if (!@$_GET['aksi']){
    // tampilkan list
    $profile->index();
}else{
    if (@$_GET['aksi'] == "edit"){
        // edit data
        if (@$_POST){
            $profile->prosesEdit();
        }else{
            $profile->edit();
        }
    }elseif(@$_GET['aksi'] == "voucher"){
        $profile->voucher();
    }
}