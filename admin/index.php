<?php
include("../backend.php");
class Home extends Backend{
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
        $data['judul']  = "Dashboard";
        $data['dataUsers']      = $this->con->query('SELECT * FROM tb_pengguna WHERE users_id="'.$_SESSION['users_id'].'"')->fetch_object();
        
        if ($_SESSION['role_id'] == "0"){
            $data['dataInvoices']           = $this->con->query('SELECT * FROM tb_pembelian');
            $data['dataInvoicesBerhasil']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status="paid"');
        }else{
            $data['dataInvoices']           = $this->con->query('SELECT * FROM tb_pembelian WHERE users_id="'.$_SESSION['users_id'].'"');
            $data['dataInvoicesBerhasil']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status="paid" AND  users_id="'.$_SESSION['users_id'].'"');
        }
        
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("dashboard.php", $data);
    } 
 
}

$home = new Home();
if (!@$_GET['aksi']){
    // tampilkan list
    $home->list();
}
?>
