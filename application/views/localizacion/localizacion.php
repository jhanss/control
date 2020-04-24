<div class="container">
        <div class="row justify-content-center align-items-center" style="height:60vh">
            <div class="col-4">
                    <form method="post" action="Localizacion/insertarUbi" autocomplete="off">
                            <div class="form-group">
                                <input type="text" class="form-control" name="hash" placeholder="qrscan" id="hash">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="latitud" placeholder="latitud" id="latitud">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="longitud" placeholder="longitud" id="longitud">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="fecha" id="fecha">
                            </div>
                            <div class="form-group">
                                <input type="time" class="form-control" name="hora" id="hora">
                            </div>
                            <button type="submit" id="login" class="btn btn-primary">Cargar</button>
                    </form>
            </div>
        </div>
</div>