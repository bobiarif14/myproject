<section class="page-content">
<div class="page-content-inner">
    <section class="panel panel-with-borders">
        <form method="post">
        <div class="panel-heading">               
            <h3>Surat Jalan</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-3">
                    <label for="customer"><?=validation_errors()?>Customer</label>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" placeholder="Pilih Customer" name="customer" onchange="gantipo(this)">
                        <option selected disabled>Pilih Customer</option>
                        <?php 
                        foreach($customer as $s){
                            echo '<option value="'.$s->id.'">'.$s->customer_name.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>           
            <table class="table table-hover editable-table">
                    <thead>
                        <th>NO PO</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Qty kirim</th>
                        <th>Note</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="barang">
                        <tr>
                            <td>
                                <select class="listpo form-control" onchange="gantibarang('',this)">
                                    <option value="" selected="selected">Pilih PO</option>               
                                </select>
                            </td>
                            <td>
                            <select id="listbarang" class="form-control listbarang" placeholder="Pilih Barang" name="barang[]" onchange="totalbarang('',this)">
                                <option value="" selected="selected">Pilih Barang</option>                                    
                            </select>
                            </td>
                            <td>
                                <input type="number" id="jumlahbarang" class="form-control" placeholder="Jumlah" disabled>
                            </td>                                
                            <td>
                                <input type="number" class="form-control" name="qtykirim[]"/>
                            </td>  
                            <td>
                                <textarea class="form-control" name="note[]"></textarea>
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
var po = "";
var barang = "";
function gantipo(val){
    $('.listbarang').html("<option>Pilih Barang</option>");
    id = val.value;
    $.ajax({
        url: "<?=base_url()?>ajax/po/customer/"+id,
        context: document.body
    }).done(function(data) {
        po = "<option selected disabled>Pilih PO</option>"+data;
        $('.listpo').html(po);
    });
}
function gantibarang(idbarang,val){
    id = val.value;
    $.ajax({
        url: "<?=base_url()?>ajax/po/"+id,
        context: document.body
    }).done(function(data) {
        barang = "<option selected disabled>Pilih Barang</option>"+data;
        $('#listbarang'+idbarang).html(barang);
    });
}
function totalbarang(idbarang,val){
    id = val.value;
    jumlah = $("#total"+id).attr("jumlah");
    tes = $('#jumlahbarang'+idbarang).val(jumlah);
    console.log(tes);
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
    '<select class="form-control listpo" placeholder="Pilih PO" onchange="gantibarang('+i+',this)">'+
        po+        
    '</select>'+
    '</td>'+
    '<td>'+
        '<select id="listbarang'+i+'" class="form-control listbarang" placeholder="Pilih Barang" name="barang[]" onchange="totalbarang('+i+',this)">'+
            '<option value="" selected="selected">Pilih Barang</option>'+
        '</select>'+
    '</td>'+
    '<td>'+
        '<input type="text" id="jumlahbarang'+i+'" class="form-control" placeholder="Jumlah" disabled>'+
    '</td>'+                               
    '<td>'+
        '<input type="number" class="form-control" name="qtykirim[]"/>'+
    '</td>'+
    '<td>'+
        '<textarea class="form-control" name="note[]"></textarea>'+
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