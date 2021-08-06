<?php
include("../backend.php");
class keranjang extends Backend{
    function __construct(){
        parent::__construct();
        if (@$_SESSION['users_id'] == ""){
            echo "<meta http-equiv='refresh' content='0;../fLogin.php'>";
        }
    }

    function list(){
        $data['judul']  = "Keranjang";
        $data['url']    = "admin";
        if (@count($_SESSION['cart']) > 0){
            $data['dataUsers']      = $this->con->query('SELECT * FROM tb_pengguna WHERE users_id="'.$_SESSION['users_id'].'"')->fetch_object();
            $data['dataCompany']    = $this->con->query("SELECT * FROM tb_website")->fetch_object();
            if ($_SESSION['role_id'] == "0"){
                $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE bukti_transaksi != "" ORDER BY orders_date DESC');
            }else{
                $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
            }
    
            echo $this->views("keranjang/list.php", $data);
        }else{
            $this->redirect("index.php");
        }
    }
    function checkout(){
        $data['judul']  = "Checkout";
        $data['url']    = "admin";
        $data['dataUsers']      = $this->con->query('SELECT * FROM tb_pengguna WHERE users_id="'.$_SESSION['users_id'].'"')->fetch_object();
        $data['dataCompany']    = $this->con->query("SELECT * FROM tb_website")->fetch_object();
        if ($_SESSION['role_id'] == "0"){
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status="paid"');
        }else{
            $data['dataNotifikasi']   = $this->con->query('SELECT * FROM tb_pembelian WHERE status_pengiriman="1" AND  users_id="'.$_SESSION['users_id'].'"');
        }

        
        echo $this->views("keranjang/checkout.php", $data);
    }

    function simpanCheckout(){
        extract($_POST);
        $_SESSION['cartAll']['totalBiaya'] = $_SESSION['cartAll']['totalBiaya'] + 10000;
        if ($voucher_kode == ""){
            $voucher_kode = 'NULL';
            $status = "unpaid";
        }else{
            $voucher_kode = "\"".$voucher_kode."\"";
            $dataVoucher = $this->con->query("SELECT * FROM tb_voucher WHERE voucher_kode='".str_replace("\"", "", $voucher_kode)."'")->fetch_object();
            $_SESSION['cartAll']['totalBiaya'] = $_SESSION['cartAll']['totalBiaya'] - $dataVoucher->voucher_nominal;
            if ($_SESSION['cartAll']['totalBiaya'] < 0){
                $_SESSION['cartAll']['totalBiaya'] = 0;
                $status = "paid";
                
                $bonusPoint = 300;
                $points = $this->con->query("SELECT * FROM tb_pengguna WHERE users_id='".$_SESSION['users_id']."'")->fetch_object()->points;
                $point = $points + 300;

                $this->con->query("UPDATE tb_pengguna SET points='".$point."' WHERE users_id='".$_SESSION['users_id']."'");
            }
        }
        $dataUsers      = $this->con->query('SELECT * FROM tb_pengguna WHERE users_id="'.$_SESSION['users_id'].'"')->fetch_object();
        $invoices_id = $this->generateInvoice();
        $result = $this->con->query("INSERT INTO tb_pembelian
                                    (invoices_id, users_id, voucher_kode, orders_nama, orders_alamat, orders_kodepos, orders_notelp, orders_totalharga, tipe_pembayaran, orders_date, orders_duedate, status)
                                    VALUES (
                                    '".$invoices_id."',
                                    '".$dataUsers->users_id."',
                                    ".$voucher_kode.",
                                    '".$dataUsers->users_nama."',
                                    '".$dataUsers->alamat."',
                                    '".$dataUsers->kode_pos."',
                                    '".$dataUsers->nomortelp."',
                                    '".$_SESSION['cartAll']['totalBiaya']."',
                                    '".$tipe_pembayaran."',
                                    '".date('Y-m-d H:i:s')."',
                                    '".date('Y-m-d H:i:s', mktime( date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y')))."',
                                    '".$status."')");
        $orders_id  = $this->con->query("SELECT * FROM tb_pembelian ORDER BY orders_id DESC")->fetch_object()->orders_id;
        if ($result){
            for ($i = 0; $i < count($_SESSION['cart']); $i++){
                $response = $this->con->query("INSERT INTO tb_pembelian_detail (orders_id, produk_id, kuantitas) VALUES('".$orders_id."', '".$_SESSION['cart'][$i]['produk_id']."', '".$_SESSION['cart'][$i]['kuantitas']."')");
            }
            unset($_SESSION['cart']);
            unset($_SESSION['cartAll']);
            $this->redirect("invoices.php?aksi=view&id=".$invoices_id);
        }else{
            // echo mysqli_error($this->con);
            echo "<script>alert('Data gagal disimpan')</script>";       
        }
    }
    
	public function generateInvoice(){
		$data = $this->con->query("SELECT * FROM tb_pembelian ORDER BY invoices_id DESC")->fetch_object();
		if (!empty($data->invoices_id)){
			$angka = substr($data->invoices_id, 9) +1;
			$nol   = "";
			if (strlen($angka) == 1){
				$nol = "0000";
			}else if (strlen($angka) == 2){
				$nol = "000";
			}else if (strlen($angka) == 3){
				$nol = "00";
			}else if (strlen($angka) == 4){
				$nol = "0";
			}else if (strlen($angka) == 5){
				$nol = "";
			}
			$autonum = "INV".date("Ym").$nol.$angka;
		}else{
			$autonum = "INV".date("Ym")."00001";
		}
		return $autonum;
	}

    public function getVoucher(){
        $dataVoucher = $this->con->query("SELECT voucher_nominal FROM tb_voucher WHERE voucher_kode='".$_GET['id']."'")->fetch_object();
        if ($dataVoucher != null){
            $perhitungan = ($_SESSION['cartAll']['totalBiaya']+10000) - $dataVoucher->voucher_nominal;
            $arr = array(
                'succ'              => true,
                'voucher_nominal'   => number_format($dataVoucher->voucher_nominal, 0, ',', '.'),
                'totalBiaya'        => ($perhitungan < 0)?0:number_format($perhitungan, 0, ',', '.')
            );
            
        }else{
            $arr = array(
                'succ'              => false,
                'voucher_nominal'   => 0,
                'totalBiaya'        => number_format($_SESSION['cartAll']['totalBiaya']+10000, 0, ',', '.')
            );
        }
        echo json_encode($arr);
    }
}

$krj = new keranjang();

if (@$_GET['aksi'] == ""){
    $krj->list();
}else{

    if (@$_GET['aksi'] == "checkout"){
        $krj->simpanCheckout();
    }elseif (@$_GET['aksi'] == "view"){
        $krj->checkout();
    }elseif (@$_GET['aksi'] == "getVoucher"){
        $krj->getVoucher();
    }

}
