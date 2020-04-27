<div class="container">
    <div class="row justify-content-center align-items-center" style="height:60vh">
        <div class="card mt-3" style="width: 18rem;">
            <?php
            if (file_exists("dist/personas/$r_foto") && $r_foto!="" ){
                $url="dist/personas/$r_foto";
//                        $url="si";
            }else{
                $url="dist/personas/user.png";
//                        $url="no";
            }
            ?>
            <img class="card-img-top" src="<?=base_url()?><?=$url?>" alt="Personal">
            <div class="card-body">
                <h5 class="card-title">Credencial </h5>
                <p class="card-text">Nombre: <?=$nombre?> <?=$apellido?></p>
                <p class="card-text">Carnet Identidad:<?=$ci?></p>
                <p class="card-text">Location <span id="location"></span></p>
            </div>
        </div>
    </div>
</div>
<script >
    window.onload=function () {
        if ("geolocation" in navigator){ //check geolocation available
            //try to get user current location using getCurrentPosition() method
            navigator.geolocation.getCurrentPosition(function(position){
                $('#location').html(position.coords.latitude+","+ position.coords.longitude);
                var datos={
                    id_persona:<?=$id_persona?>,
                    latitud:position.coords.latitude,
                    longitud:position.coords.longitude
                }
                $.ajax({
                    url:'<?=base_url()?>Credential/insertLocation',
                    type:'POST',
                    data:datos,
                    success:function (e) {
                        console.log(e);
                    }
                });
            });
        }else{
            console.log("Browser doesn't support geolocation!");
        }
    }
</script>
