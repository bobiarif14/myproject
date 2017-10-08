<section class="page-content">
    <div class="page-content-inner">
        <section class="panel">
            <div class="panel-heading">
                <h3>Tambah Customer</h3>
            </div>
            <div class="panel-body panel-primary">
                <form method="post">
                <div class="form-group row">            
                    <div class="col-md-3">
                        <label class="form-control-label" for="ncust">Nama Customer</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="ncust" name="ncust" value="<?=@$nama?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="acust">Alamat Customer</label>
                    </div>
                    <div class="col-md-9">
                        <textarea name="acust" class="form-control" rows="3" id="acust"><?=@$alamat?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="fcust">Daerah Customer</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="dcust" class="form-control"  id="fcust" value="<?=@$daerah?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="fcust">Marketer</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="mcust" class="form-control"  id="fcust" value="<?=@$daerah?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="fcust">Kategori</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="kcust" class="form-control"  id="fcust" value="<?=@$daerah?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="fcust">Tipe Customer</label>
                    </div>
                    <div class="col-md-9">
                        <select name="tcust" class="form-control">
                            <option value="0">Perusahaan</option>
                            <option value="1">Toko</option>    
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="mu">Mata uang</label>
                    </div>
                    <div class="col-md-9">
                    <select name="curcust" class="form-control">
                        <?php
                        foreach($matauang->result() as $mu){
                            echo "<option value='$mu->id'>$mu->mata_uang $mu->alias</option>";
                        }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="pcust">Phone Customer</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="pcust" class="form-control"  id="pcust" value="<?=@$phone?>">
                    </div>
                </div>                
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="ecust">Email Customer</label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="ecust" class="form-control"  id="ecust" value="<?=@$email?>">
                    </div>
                </div>
                <h3>PIC</h3>
                <div class="form-group row">
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
                <button type="submit" class="btn btn-success"><?php echo isset($ubah)?$ubah:"Tambah";?></button>
            </div>
            </form>            
        </section>
    </div>
</section>
<script>
    i = 0;
    add = ' <div id=pic'+i+'>'+
            '<div class="form-group row">'+            
            '<div class="col-md-2">'+
                '<input type="text" name="npic[]" class="form-control" placeholder="Nama Kontak" id="npic" required>'+
            '</div>'+
            '<div class="col-md-2">'+
                '<input type="text" name="epic[]" class="form-control" placeholder="Email Kontak" id="epic" required>'+
            '</div>'+
            '<div class="col-md-2">'+
                '<input type="text" name="pic[]" class="form-control" placeholder="Nomor Kontak"  id="npic" required>'+
            '</div>'+
            '<div class="col-md-2">'+
                '<input type="text" name="bpic[]" class="form-control" placeholder="Bagian"  id="bpic" required>'+
            '</div>'+
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