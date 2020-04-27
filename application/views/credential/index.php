<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">

            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>ci</th>
                    <th>fecha nac</th>
                    <th>foto</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=$this->db->query("SELECT * FROM persona");
                foreach ($query->result() as $row){
                    if (file_exists("dist/personas/$row->r_foto") && $row->r_foto!="" ){
                        $url="dist/personas/$row->r_foto";
//                        $url="si";
                    }else{
                        $url="dist/personas/user.png";
//                        $url="no";
                    }
                    echo "<tr>
                            <td>$row->id_persona</td>
                            <td>$row->nombre</td>
                            <td>$row->apellido</td>
                            <td>$row->ci</td>
                            <td>$row->f_nac</td>
                            <td><img src='$url' width='25px' alt=''></td>
                            <td><a class='btn btn-info p-1' href='Credential/target/$row->hash' target='_blank'> <i class='fa fa-address-card-o' aria-hidden='true'></i> Credecial</a></td>
                        </tr>";
                }
                ?>

                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload=function (e) {
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    }
</script>
