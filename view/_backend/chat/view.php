<script>
	function Url(param = null){

		if (param !== null){
			var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			var vars = [], hash;
			for (var i =0; i < url.length; i++){
				hash = url[i].split('=');
				vars.push(hash[0]);
				vars[hash[0]] = hash[1];
			}
			return vars[param];
		}else{
			return null;
		}
	}

    function tgl(){
        var tgl = new Date();
        var hari = tgl.getDate();
        var bulan = tgl.getMonth()+1;
        var thn = tgl.getFullYear();
        var tglskrg = thn+"-"+bulan+"-"+hari;

        return tglskrg;
    }

    var tnama = 0;
    var pesanakhir = 0;
    var timer;

    function ambilPesan() {
        var pengirim = Url("id");
        let html = "";
        $.get("<?=base_url?>admin/chat.php?aksi=s_pesanmasuk&akhir="+pesanakhir+ "&pengirim="+pengirim, "", function(data){
            data = JSON.parse(data);
            for(i=0;i<data.data.length;i++){
                html += data.data[i];
            }

            $('#chatMsg').html(html);
            
            timer = setTimeout("ambilPesan()",2000);
        });
    }


    function kirimPesan() {
        pesannya = document.getElementById("IsiPesan").value
        namaku = Url("id")
        if(pesannya != "" && namaku != "") {
            $.get("<?=base_url?>admin/chat.php?aksi=kirim_pesanmasuk&user="+namaku+"&akhir="+pesanakhir+"&pesan="+pesannya+"&sid="+Math.random(), "", function(data){
                ambilPesan(); 
                $('#IsiPesan').val("");
            });
        }else {
            alert("Nama atau pesan masih kosong");
        }
    }

    function aturKirimPesan() {
        clearInterval(timer);
        ambilPesan();
    }

    function blockSubmit() {
        kirimPesan();
        return false;
    }

    aturKirimPesan();
</script>

<div class="col-md-12">
    <!-- DIRECT CHAT SUCCESS -->
    <div class="card card-success card-outline direct-chat direct-chat-success">
        <div class="card-header">
            <h3 class="card-title">
                <?php
                    if ($_SESSION['role_id'] == "0"){
                        $card_title = "User";
                    }else{
                        $card_title = "Admin";
                    }

                    echo "Chatting with ".$card_title;
                ?>
            </h3>

        </div>
        <!-- /.card-header -->

        <?php
            if ($_SESSION['role_id'] == "0"){
                $idPengirim = $_GET['id'];
                $dataValue = $this->con->query("SELECT * 
                FROM pesan_masuk, tb_pengguna 
                WHERE pesan_masuk.Id_Pengirim=tb_pengguna.users_id 
                AND pesan_masuk.Id_Pengirim='".$idPengirim."'
                AND pesan_masuk.Id_Penerima='".$_SESSION['users_id']."'
                OR pesan_masuk.Id_Pengirim=tb_pengguna.users_id  
                AND pesan_masuk.Id_Penerima='".$idPengirim."'
                AND pesan_masuk.Id_Pengirim='".$_SESSION['users_id']."'
                ORDER BY pesan_masuk.TanggalKirim ASC");
            }else{
                $dataAdmin  = $this->con->query("SELECT * FROM tb_pengguna WHERE role_id='0'")->fetch_object();
                $idPengirim = $dataAdmin->users_id;
                $dataValue = $this->con->query("SELECT * 
                FROM pesan_masuk, tb_pengguna 
                WHERE pesan_masuk.Id_Pengirim=tb_pengguna.users_id 
                AND pesan_masuk.Id_Pengirim='".$_SESSION['users_id']."'
                AND pesan_masuk.Id_Penerima='".$idPengirim."'
                OR pesan_masuk.Id_Pengirim=tb_pengguna.users_id  
                AND pesan_masuk.Id_Penerima='".$_SESSION['users_id']."'
                AND pesan_masuk.Id_Pengirim='".$idPengirim."'
                ORDER BY pesan_masuk.TanggalKirim ASC");
            }
            
        ?>
        <div class="card-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages" id="chatMsg" style="height: 370px">
                <?php 
                    while($key = $dataValue->fetch_object()){ 
                        
                        $leftRight = ($key->Id_Pengirim == $_SESSION['users_id'])?'right':'left';
                        $reverse = ($leftRight == 'right')?'left':'right';
                ?>
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-<?=$leftRight?>"><?=$key->users_nama?></span>
                            <span class="direct-chat-timestamp float-<?=$reverse?>"><?=$key->TanggalKirim?></span>
                        </div>
                        <img class="direct-chat-img" src="<?=base_url?>assets/back/img/<?=($key->image != "")?$key->image:'avatar5.png'?>" alt="Message User Image">
                        <div class="direct-chat-text">
                            <?=htmlspecialchars_decode($key->IsiPesan)?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!--/.direct-chat-messages-->

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <form onSubmit="return blockSubmit();">
                <div class="input-group">
                    <input type="text" name="IsiPesan" id="IsiPesan" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-success">Send</button>
                    </span>
                </div>
            </form>
        </div>
        <!-- /.card-footer-->
    </div>
    <!--/.direct-chat -->
</div>
<!-- /.col -->