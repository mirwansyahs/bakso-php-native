<?php
include("../backend.php");
class Produk extends Backend{
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
        $data['judul']  = "Katalog";
        $data['value']  = $this->con->query('SELECT * FROM tb_produk');
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("detail/grid.php", $data);
    } 
 
    function addToCart($produk_id = ''){
        extract($_POST);
        $dataProduk = $this->con->query("SELECT * FROM tb_produk WHERE produk_id='".$produk_id."'")->fetch_object();
        // var_dump($dataProduk);
        $no = 0;
        if (@$_SESSION['cart']){
            $no = count($_SESSION['cart']);
        }else{
            $no = 0;
        }
        $_SESSION['cart'][$no]['cart_id']    = $no;
        $_SESSION['cart'][$no]['produk_id']  = $dataProduk->produk_id;
        $_SESSION['cart'][$no]['kuantitas']  = $kuantitas;
        $_SESSION['cart'][$no]['total']      = $dataProduk->produk_harga * $kuantitas;

        $_SESSION['cartAll']['totalBiaya'] = 0;
        for ($i = 0; $i < count($_SESSION['cart']); $i++){
            $_SESSION['cartAll']['totalBiaya'] = $_SESSION['cartAll']['totalBiaya'] + $_SESSION['cart'][$i]['total'];
        }

        $this->redirect('grid.php');
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
        
    }elseif (@$_GET['aksi'] == "addToCart"){
        // hapus data
        $produk->addToCart($_GET['id']);
        
    }
}
?>
