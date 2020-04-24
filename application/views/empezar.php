<!-- <main role="main" class="inner cover">
	<form method="post" action="guardar" class="form-horizontal" style="padding-top: 10px; width: 500px; margin: auto;">
		<input class="form-control" type="text" id="nombre" name="nombre"  placeholder="Nombre"><br>
		<input class="form-control" type="text" id="apellido" name="apellido" placeholder="Apellido"><br>
		<input class="form-control" type="text" id="ci" name="ci"  placeholder="Carnet"><br>
		<input class="form-control col-xs-1" type="date" id="fnac" name="fnac" placeholder="fecha naci"><br>

			
		<button type="submit" class="btn btn-success form-control">gen</button>
	</form>
</main> -->
<div class="container">
        <div class="row justify-content-center align-items-center" style="height:60vh">
            <div class="col-4">
                    <form method="post" action="guardar" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <input class="form-control" type="file" id="foto" name="foto">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="nombre" name="nombre"  placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="apellido" name="apellido" placeholder="Apellido">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="ci" name="ci"  placeholder="Carnet">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="date" id="fnac" name="fnac" placeholder="fecha naci">
                            </div>
                            <button type="submit" id="login" class="btn btn-primary form-control">gen</button>
                    </form>
                    <?php if ($resul==''){ 
                    	// echo '<div class="alert alert-danger" role="alert">f';
					  	echo $resul;
						// echo '</div>';
					} else{ if($resul=='Correcto'){
						echo '<div class="alert alert-success" role="alert">';
					  	echo 'Datos guardados correctamente';
						echo '</div>';
					}else {
						echo '<div class="alert alert-danger" role="alert">';
					  	echo $resul;
						echo '</div>';
					}}?>
            </div>

        </div>
</div>