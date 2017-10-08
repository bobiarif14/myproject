<section class="page-content">
    <div class="page-content-inner">
        <section class="panel">
            <div class="panel-heading">
                <h3>Edit Supplier</h3>
            </div>
            <div class="panel-body panel-primary">
                <form method="post">
                <div class="form-group row">            
                    <div class="col-md-3">
                        <label class="form-control-label" for="nsupp">Nama Supplier</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="nsupp" name="nsupp" value="<?=@$nama?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="asupp">Alamat Supplier</label>
                    </div>
                    <div class="col-md-9">
                        <textarea name="asupp" class="form-control" rows="3" id="asupp"><?=@$alamat?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="mu">Mata uang</label>
                    </div>
                    <div class="col-md-9">
                    <select id="mata_uang" name="mata_uang" class="form-control">
                        <?php
                        foreach($matauang->result() as $mu){
                            $selected = "";
                            if($mu->id == $currency)
                                $selected = "selected";
                            echo "<option value=\"$mu->id\" $selected>$mu->mata_uang $mu->alias</option>";
                        }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="psupp">Phone Supplier</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="psupp" class="form-control"  id="psupp" value="<?=@$phone?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="dsupp">Daerah Supplier</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="dsupp" class="form-control"  id="dsupp" value="<?=@$daerah?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="esupp">Email Supplier</label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="esupp" class="form-control"  id="esupp" value="<?=@$email?>">
                    </div>
                </div>
                <h3>PIC</h3>
                <?php
                foreach($pic->result() as $p){
                    echo '<div id="idxpic'.$p->id.'"class="form-group row pic">
                    <div class="col-md-2">
                        <input type="text" name="nxpic[]" class="form-control" placeholder="Nama Kontak" id="nxpic'.$p->id.'" value="'.$p->name_pic.'">
                        <input type="hidden" name="idxpic[]" value="'.$p->id.'">
                    </div>
                    <div class="col-md-2">
                        <input type="email" name="expic[]" class="form-control" placeholder="Email Kontak" id="expic'.$p->id.'" value="'.$p->email_pic.'">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="xpic[]" class="form-control" placeholder="Nomor Kontak"  id="xpic'.$p->id.'" value="'.$p->nomor_pic.'">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="bxpic[]" class="form-control" placeholder="Bagian"  id="bxpic'.$p->id.'" value="'.$p->bagian_pic.'">
                    </div>
                    <div class="col-md-2">
                        <a id="tambahpic" class="btn btn-success" class="form-control" onclick="tambahpic()">+</a>
                        <a class="btn btn-danger" class="form-control" onclick="deletexpic('.$p->id.')">-</a>
                    </div>
                </div>';
                }
                ?>
                 <div id="add" class="form-group row">
                    <div class="col-md-2">
                        <input type="text" name="npic[]" class="form-control" placeholder="Nama Kontak" id="npic">
                    </div>
                    <div class="col-md-2">
                        <input type="email" name="epic[]" class="form-control" placeholder="Email Kontak" id="epic">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="pic[]" class="form-control" placeholder="Nomor Kontak"  id="npic">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="bpic[]" class="form-control" placeholder="Bagian"  id="bpic">
                    </div>
                    <div class="col-md-1">
                        <a id="tambahpic" class="btn btn-success" class="form-control" onclick="tambahpic()">+</a>
                    </div>
                </div> 
                <div id="pic"></div>                                
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>            
        </section>
    </div>
</section>
<script>
$(document).ready(function(){    
    if($('.pic').length==0)
        $('#add').show();
    else
        $('#add').hide();    
    $("#mata_uang").val(<?=$currency?>);
})
function deletexpic(id){
    nama = $('#nxpic'+id).val();
    swal({
        title: "Hapus "+nama+"?",
        text: "PIC yang di hapus tidak dapat di kembalikan",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: true,
        showLoaderOnConfirm: true,
        },
        function(){            
            $.ajax({
                url: "<?=base_url()?>ajax/pic/supplier/delete/"+id,
                context: document.body
            }).done(function() {
                $('#idxpic'+id).remove();
                if($('.pic').length==0)
                    $('#add').show();
            });
        });
}
    i = 0;
    add = ' <div id=pic'+i+'>'+
            '<div class="form-group row pic">'+            
            '<div class="col-md-2">'+
                '<input type="text" name="npic[]" class="form-control" placeholder="Nama Kontak" id="npic" required>'+
            '</div>'+
            '<div class="col-md-2">'+
                '<input type="text" name="epic[]" class="form-control" placeholder="Email Kontak" id="epic" required>'+
            '</div>'+
            '<div class="col-md-2">'+
                '<input type="text" name="pic[]" class="form-control" placeholder="Nomor Kontak"  id="pic" required>'+
            '</div>'+
            '<div class="col-md-2">'+
                '<input type="text" name="bpic[]" class="form-control" placeholder="Bagian"  id="bpic" required>'+
            "</div>"+
            '<div class="col-md-2">'+
                '<a class="btn btn-success" onclick="tambahpic()">+</a>'+
                ' <a class="btn btn-danger" onclick="hapuspic(\'pic'+i+'\')">-</a>'+
            '</div>'+            
            '</div>'+
            '</div>';
    function tambahpic(){
        $('#pic').append(add);
        i++;
    }
    function hapuspic(hapus){
        $('#'+hapus).remove();
    }
    function hapusxpic(id){
        $('#idxpic'+id).val("hapus");
        $('#xpic'+id).hide();
    }
</script>