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
        $data['judul']  = "Produk";
        $data['value']  = $this->con->query('SELECT * FROM tb_produk');
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("produk/list.php", $data);
    }
    
    function tambah(){
        $data['judul']  = "Produk";
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("produk/tambah.php", $data);
    }

    function prosesTambah(){
        extract($_POST);
        if (@$_FILES['produk_image']){
            $tmp = $_FILES['produk_image']['tmp_name'];
            $Images = $_FILES['produk_image']['name'];

            $folder = "../assets/back/img/";

            if (move_uploaded_file($tmp, $folder.$Images)){
                $Image = $Images;
            }else{
                $Image = "";
            }
        }else{
            $Image = NULL;
        }
        $result = $this->con->query("INSERT INTO tb_produk(produk_id, produk_nama, produk_harga, produk_stok, produk_image,date_entry, users_id) VALUES('".$produk_id."', '".$produk_nama."','".str_replace(".", "", $produk_harga)."','".$produk_stok."','".$Image."','".date('Y-m-d H:i:s')."', '".$_SESSION['users_id']."')");
        if ($result){
            $this->redirect("produk.php");
        }else{
            echo "<script>alert('Data gagal disimpan')</script>";       
        }
    }
    
    function edit(){
        $data['judul']  = "Produk";
        $data['value']  = $this->con->query("SELECT * FROM tb_produk WHERE produk_id='".$_GET['id']."'")->fetch_object();
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        echo $this->views("produk/edit.php", $data);
    }
    
    function prosesEdit($id){
        extract($_POST);
        if (@$_FILES['produk_image']){
            $tmp = $_FILES['produk_image']['tmp_name'];
            $Images = $_FILES['produk_image']['name'];

            $folder = "../assets/back/img/";

            if (move_uploaded_file($tmp, $folder.$Images)){
                $Image = $Images;
            }else{
                $Image = $this->con->query("SELECT * FROM tb_produk WHERE produk_id='".$id."'")->fetch_object()->produk_image;
            }
        }else{
            $Image = $this->con->query("SELECT * FROM tb_produk WHERE produk_id='".$id."'")->fetch_object()->produk_image;
        }
        $result = $this->con->query("UPDATE tb_produk SET produk_nama='".$produk_nama."', produk_harga='".str_replace(".", "", $produk_harga)."', produk_stok='".$produk_stok."', produk_image='".$Image."' WHERE produk_id='".$id."'");
        if ($result){
            $this->redirect("produk.php");
        }else{
            echo "<script>alert('Data gagal disimpan')</script>";       
        }
    }
    
    function prosesHapus($id){
        $result = $this->con->query("DELETE FROM tb_produk WHERE produk_id='".$id."'");
        if ($result){
			echo json_encode(array("succ" => 1, "pwd" => "SPT"));
		}else{
            echo json_encode(array("succ" => 0, "pwd" => "SPT"));
		}
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
