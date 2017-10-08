<section class="page-content">
    <div class="page-content-inner">
        <section class="panel panel-with-borders">
            <div class="panel-heading">
               <a class="btn btn-rounded btn-success-outline margin-inline" style="float:right" data-toggle="modal" data-target="#add" ><i class="icmn-plus3"> </i>Tambah Barang</a>
                    
                </button>
                <h3>Barang</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover nowrap" width="100%">
                    <thead>
                        <th>Nama Barang</th>
                        <th>Category</th>
                        <th>Satuan</th>                        
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($barang->result() as $c){
                            echo "<tr>
                            <td id=\"barang$c->id_barang\">$c->nama_barang</td>
                            <td id=\"category$c->id_barang\"><input type=\"hidden\" id=\"id_cat$c->id_barang\" value=\"$c->id_category\">$c->nama_category</td>                          
                            <td id=\"satuan$c->id\">$c->satuan</td>                          
                              
                            <td><button type=\"button\" class=\"btn btn-success\" onclick=\"edit($c->id_barang)\">Edit</button></td>";
                        }
                        ?>
                    </tbody>
            </div>
        </section>
    </div>
</section>
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <?=@form_open('setting/barang')?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Barang</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="barang">Nama Barang</label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="nama_barang" class="form-control">
            </div>
        </div>        
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="category">Category</label>
            </div>
            <div class="col-sm-6">
                <select name="id_category" class="form-control select" placeholder="Pilih Category">
                    <option value="" selected="selected"></option>                
                    <?php
                    foreach($category->result() as $c){
                        echo "<option value='$c->id'>$c->nama_category</option>";
                    }
                    ?>
                </select>
            </div>           
        </div>    
        <div class="row form-group">
                <div class="col-sm-3">
                    <label for="satuan">satuan</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="satuan" class="form-control">
                </div>
        </div>            
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Save</button>
      </div>
      </form>
    </div>

  </div>
</div>

<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <?=@form_open('setting/barang')?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Barang</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="barang">Nama Barang</label>
            </div>
            <div class="col-sm-6">
                <input id="edit_nama" type="text" name="nama_barang" class="form-control">
                <input id="edit_id" name="id_barang" type="hidden">
            </div>
        </div>        
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="category">Category</label>
            </div>
            <div class="col-sm-6">
                <select id="id_category" name="id_category" class="form-control" placeholder="pilih category">
                    <option id="edit_idcat" selected="selected"></option>                
                    <?php
                    foreach($category->result() as $c){
                        echo "<option value='$c->id'>$c->nama_category</option>";
                    }
                    ?>
                </select>
            </div>
        </div>      
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="category">Satuan</label>
            </div>
            <div class="col-sm-6">
                <input type="text" id="edit_satuan" name="satuan" class="form-control" placeholder="ex : pcs">
            </div>
        </div>          
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Save</button>
      </div>
      </form>
    </div>

  </div>
</div>
<script>
function edit(id){
    barang = $('#barang'+id).text();
    category = $('#category'+id).text();
    id_cat = $('#id_cat'+id).val();
    satuan = $('#satuan'+id).text();    

    $('#edit_nama').val(barang);
    $('#edit_id').val(id);
    $('#edit_satuan').val(satuan);    
    $('#id_category')[0].selectize.setValue(id_cat,true);
    
    $('#edit').modal();
}
$('.select').selectize({
        sortField: 'text'
});
$('#id_category').selectize({
        sortField: 'text'
});
</script>