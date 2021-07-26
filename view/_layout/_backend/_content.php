	<!-- Content Header (Page header) -->
	<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$judul?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
			<ol class="breadcrumb float-sm-right">
			<?php
			for ($i=0; $i<count($this->session->flashdata('segment')); $i++) { 
				if ($i == 0) {
			?>
					<li class="breadcrumb-item"><i class="fa fa-dashboard"></i> <a href="<?=base_url()?>Redaktur/Home"><?php echo $this->session->flashdata('segment')[$i]; ?></a></li>
			<?php
				} elseif ($i == (count($this->session->flashdata('segment'))-1)) {
			?>
					<li class="breadcrumb-item active"> <a href="<?=base_url()?>Redaktur/<?=@$judul?>"><?php echo $this->session->flashdata('segment')[$i]; ?> </a></li>
			<?php
				} else {
			?>
					<li class="breadcrumb-item"> <a href="<?=base_url()?>Redaktur/<?=@$judul?>"><?php echo $this->session->flashdata('segment')[$i]; ?> </a></li>
			<?php
				}
				if ($i == 0 && $i == (count($this->session->flashdata('segment'))-1)) {
			?>
					<li class="breadcrumb-item active"> Here </li>
			<?php
				}
			}
			?>
			</ol><!-- /.breadcrumb -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


	<!-- Main content -->
	<div class="content">
		<div class="container">
			<?=@$_mainContent?>
		</div>
	</div>
