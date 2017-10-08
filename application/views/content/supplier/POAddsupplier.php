<section class="page-content">
    <div class="page-content-inner">
        <section class="panel panel-with-borders">
            <?=@form_open('supplier/po/add');?>
            <div class="panel-heading">               
                <h3>PO Supplier</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="customer">Supplier</label>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control" placeholder="Pilih Supplier" name="supplier" onchange="gantipic(this)">
                            <option value="" selected="selected"></option>
                            <?php 
                            foreach($supplier as $s){
                                echo '<option value="'.$s->id.'">'.$s->supplier_name.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>           
                <div class="row">
                    <div class="col-sm-3">
                        <label for="customer">PIC</label>
                    </div>
                    <div class="col-sm-3">
                        <select id="pic" class="form-control" name="pic" required>
                            <option value="" selected="selected">Pilih PIC</option>                            
                        </select>
                    </div>
                </div>           
                <div class="row">
                    <div class="col-sm-3">
                        <label for="customer">No PO</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="po" placeholder="Nomor PO"/>
                    </div>
                </div>           
                <table class="table table-hover editable-table">
                        <thead>
                            <th>Kategori Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Harga Barang</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="barang">
                            <tr>
                                <td>
                                    <select class="form-control" placeholder="Pilih Category" onchange="gantibarang('',this)">
                                        <option value="" selected="selected">Pilih Category</option>
                                        <?php
                                        foreach($category->result() as $c){
                                            echo '<option value="'.$c->id.'">'.$c->nama_category.'</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                <select id="listbarang" class="form-control" placeholder="Pilih Barang" name="barang[]">
                                    <option value="" selected="selected">Pilih Barang</option>                                    
                                </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="Jumlah" name="jumlah[]">
                                </td>                                
                                <td>
                                    <input type="text" class="form-control" placeholder="Harga" name="harga[]">
                                </td>                                
                                <td>
                                    <button type="button" class="btn btn-success" onclick="tambah();">+</button>                                                  
                                </td>
                            </tr>                            
                        </tbody>
                    </table>    
            </div>
            <div class="panel-footer">
            <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
            </form>
        </section>
    </div>
</section>
<script>
function gantipic(val){
    id = val.value;
    $.ajax({
        url: "<?=base_url()?>ajax/pic/supplier/"+id,
        context: document.body
    }).done(function(data) {
        $('#pic').html(data);
    });
}
function gantibarang(idbarang,val){
    id = val.value;
    $.ajax({
        url: "<?=base_url()?>ajax/barang/"+id,
        context: document.body
    }).done(function(data) {
        $('#listbarang'+idbarang).html(data);
    });
}

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
i = 0;
function tambah(){
    plus = '<tr id="detbarang'+i+'">'+
    '<td>'+
    '<select class="form-control" placeholder="Pilih Category" onchange="gantibarang('+i+',this)">'+
        '<option value="" selected="selected">Pilih Category</option>'+
        <?php
        foreach($category->result() as $c){
            echo '\'<option value="'.$c->id.'">'.$c->nama_category.'</option>\'+';
        }
        ?>
    '</select>'+
    '</td>'+
    '<td>'+
        '<select id="listbarang'+i+'" class="form-control" placeholder="Pilih Barang" name="barang[]">'+
            '<option value="" selected="selected">Pilih Barang</option>'+
        '</select>'+
    '</td>'+
    '<td>'+
        '<input type="number" class="form-control" placeholder="Jumlah" name="jumlah[]">'+
    '</td>'+                               
    '<td>'+
        '<input type="text" class="form-control" placeholder="Harga" name="harga[]">'+
    '</td>'+ 
    '<td>'+
        '<button type="button" class="btn btn-success" onclick="tambah()">+</button> '+
        '<a class="btn btn-danger" onclick="hapus(\'detbarang'+i+'\')">-</a>'+        
    '</td>'+
'</tr>';
$('#barang').append(plus);
idbarang = "barang"+i;
$('#barang'+i).selectize({
        create: true,
        sortField: 'text'
});
i++;
}
function hapus(id){
    $('#'+id).remove();
}
</script>