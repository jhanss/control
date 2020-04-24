<div class="container">
    <div class="row justify-content-center align-items-center" style="height:60vh">
        <div class="col-4 mt-5">
			<?php foreach ($infper['datos'] as $row){ 
				echo '<div class="form-group"><input class="form-control" disabled value="'.$row->id_persona.'"></div>';
				echo '<div class="form-group"><input class="form-control" disabled value="'.$row->nombre.' '.$row->apellido.'"></div>';
				echo '<div class="form-group"><input class="form-control" disabled value="'.$row->ci.'"></div>';
				echo '<div class="form-group"><input class="form-control" disabled value="'.$row->f_nac.'"></div>';
					  	 }?>




		  	<!-- <?php echo var_dump($infper['datos']);?> -->

		  	<!-- <img class="img-thumbnail" src="<?php echo base_url().$infper;?>"> -->

		  	<!-- <?php echo $infper['has'];
     			 $dato= $infper['has']; 
     			 echo $dato;?> -->

			<!-- <?php $dato= $row->hash; ?> -->
			<!-- <img src="<?php echo site_url('Principal/solQR/'.$dato); ?>" > -->
			<img src="<?php echo base_url().'Principal/solQR/'.$dato ; ?>" >
		</div>

		<div class="container">
			<div class="row justify-content-center align-items-center" style="height:60px">
				<div class="col-4">
					<a class="btn btn-primary" href="<?php echo base_url()?>">Salir</a>
				</div>
			</div>
		</div>
  </div>
</div>