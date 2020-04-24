<div class="container">
  <div class="row justify-content-center align-items-center" style="height:50vh">
  	<div class="modal-content col-sm-4">
  		<h3 class="btn btn-secondary">Ingrese su carnet de indentidad</h3>
  		<form method="post" action="Principal/busqAndGenQR" class="col-12">
	  		<div class="form-group">
	  			<input class="form-control" type="text" id="ci" name="ci"  placeholder="C.I." minlength="6" maxlength="8" required pattern="[0-9]*" title="Ingrese CI con todos los digitos">
	  		</div>
	  		<button type="submit" id="login" class="btn btn-success col-8">Obtener Codigo QR</button>
  		</form>
  	</div>
  	
  </div>
</div>

<a class="btn btn-primary" href="<?php echo base_url(); ?>Principal/generar">Generar</a>
