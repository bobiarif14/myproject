<section class="page-content">
    <div class="page-content-inner">
        <section class="panel panel-with-borders">
            <div class="panel-heading">
               <a class="btn btn-rounded btn-success-outline margin-inline" style="float:right" href="<?=@site_url('customer/add')?>" ><i class="icmn-plus3"> </i>Tambah Customer</a>
                    
                </button>
                <h3>Customer</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover nowrap" width="100%">
                    <thead>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Daerah</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    foreach($customer->result() as $c){
                        if($c->tanggal_po==null){
                            $status = "<td style=\"background-color:red;color:white\">non aktif</td>";
                        }
                        else if($c->tanggal_po <= date('Y-m-d H:i:s',strtotime('-30 days'))){
                            $status = "<td style=\"background-color:orange;color:white\">pasif</td>";
                        }
                        else{
                            $status = "<td style=\"background-color:green;color:white\">aktif</td>";
                        }
                        echo '<tr>
                            <td id="customer'.$i.'">'.$c->customer_name.'</td>
                            <td id="address'.$i.'">'.$c->address.'</td>
                            <td id="phone'.$i.'">'.$c->phone.'</td>
                            <td id="email'.$i.'">'.$c->email.'</td>
                            <td id="daerah'.$i.'">'.$c->daerah.'</td>
                            '.$status.'
                            <td><a class="btn btn-success" href="'.site_url("customer/view/$c->id").'"><i class="dropdown-icon icmn-eye"> </i>View</a><a class="btn btn-warning margin-left-10" href='.site_url("customer/edit/$c->id").'><i class="dropdown-icon icmn-pencil"> </i>Edit</a></a>
                        </tr>';
                        $i++;
                    }
                    ?>
                        
                    </tbody>
            </div>
        </section>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('table').DataTable({
            autoWidth: true,
            fixedColumns: true
        });
    })    
</script>