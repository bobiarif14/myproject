<section class="page-content">
    <div class="page-content-inner">
        <section class="panel panel-with-borders">
            <div class="panel-heading">
               <a class="btn btn-rounded btn-success-outline margin-inline" style="float:right" href="<?=@site_url('customer/sj/add')?>" ><i class="icmn-plus3"> </i>Tambah Surat Jalan</a>
                    
                </button>
                <h3>Surat Jalan</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover nowrap" width="100%">
                    <thead>
                    <th>Id</th>
                    <th>No SJ</th>                        
                    <th>Nama Customer</th>
                    <th>Tanggal SJ</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php
                        foreach($sj->result() as $p){
                            switch($p->status){
                                case '0':
                                    $status = "<td style=\"background-color:grey;color:black\">non aktif</td>";
                                break;
                                case '1':
                                    $status = "<td style=\"background-color:yellow;color:black\">On Progress</td>";
                                break;                                
                                case '2':
                                    $status = "<td style=\"background-color:green;color:white\">Complete</td>";
                                break;                                
                                default:
                                    $status = "<td style=\"background-color:red;color:white\">non aktif</td>";
                                break;
                            }     
                            echo "<tr>
                                    <td>$p->id_suratjalan</td>
                                    <td>$p->delivery_no</td>
                                    <td>$p->customer_name</td>
                                    <td>".date('d F Y H:i:s',strtotime($p->create_date))."</td>       
                                    $status
                                    <td><input id=\"status$p->id_suratjalan\" type=\"hidden\" value=\"$p->status\"> <a href=\"".base_url()."customer/sj/$p->id_suratjalan/download\" class=\"btn btn-success\">Download</a> <a onclick=\"update('$p->id_suratjalan')\" class=\"btn btn-success\">Update Status</a> 
                                    </td>
                                </tr>";
                        }
                    ?>
                        
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</section>

<div id="update" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Status</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="category">Status</label>
            </div>
            <div class="col-sm-6">
                <select id="editstatus" name="status" class="form-control">
                    <option value="0">non aktif</option>
                    <option value="1">Belum di kirim ke supplier</option>
                    <option value="2">Barang belum di kirim</option>
                    <option value="3">Barang belum sampai</option>
                    <option value="4">Barang sudah sampai</option>
                </select>
                <input type="hidden" id="editid" name="idpo">
            </div>
        </div>                
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $('table').DataTable({
            autoWidth: true,
            fixedColumns: true
        });
    })
    function update(id){
        status = $('#status'+id).val();
        $('#editid').val(id);
        $("#editstatus").val(status);
        $('#update').modal();
    }
</script>