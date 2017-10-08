<section class="page-content">
    <div class="page-content-inner">
        <section class="panel">
            <div class="panel-heading">
                <h3>Detail Customer</h3>
            </div>
            <div class="panel-body panel-primary">
                <div class="form-group row">            
                    <div class="col-md-3">
                        <label class="form-control-label" for="ncust">Nama Customer</label>
                    </div>
                    <div class="col-md-9">
                        : <strong><?=@$nama?></strong>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="acust">Alamat Customer</label>
                    </div>
                    <div class="col-md-9">
                        : <strong><?=@$alamat?></strong>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="dcust">Daerah Customer</label>
                    </div>
                    <div class="col-md-9">
                        : <strong><?=@$daerah?></strong>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="pcust">Phone Customer</label>
                    </div>
                    <div class="col-md-9">
                        : <strong><?=@$phone?></strong>
                    </div>
                </div>                
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="ecust">Email Customer</label>
                    </div>
                    <div class="col-md-9">
                        : <strong><?=@$email?></strong>
                    </div>
                </div>
                <h3>PIC</h3>
                <table class="table table-hovered">
                    <thead>
                        <th>Nama PIC</th>
                        <th>Email PIC</th>
                        <th>Nomor PIC</th>
                        <th>Bagian</th>                        
                    </thead>
                    <tbody>
                <?php
                if(isset($pic['nama'])){
                    for($x=0 ; $x<count($pic['nama']) ; $x++){
                        echo "<tr>
                                <td>".$pic['nama'][$x]."</td>
                                <td>".$pic['email'][$x]."</td>
                                <td>".$pic['nomor'][$x]."</td>
                                <td>".$pic['bagian'][$x]."</td>                                
                                </tr>";                       
                    }
                }
                ?>
                    </tbody>                                           
            </div>
            </form>            
        </section>
    </div>
</section>

<script>
$(document).ready(function(){
    $('.table').DataTable();
})
</script>