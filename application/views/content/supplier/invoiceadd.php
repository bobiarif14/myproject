<section class="page-content">
    <div class="page-content-inner">
        <section class="panel">
            <div class="panel-heading">
                <h3><?php echo isset($ubah)?$ubah:"Tambah";?> Supplier</h3>
            </div>
            <div class="panel-body panel-primary">
                <?php
                $form_url = isset($urlform)?$urlform:"supplier/add";
                echo form_open($form_url);?>
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
                        <label class="form-control-label" for="dsupp">Daerah Supplier</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="dsupp" class="form-control" id="dsupp" value="<?=@$alamat_daerah?>">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="form-control-label" for="mu">Mata uang</label>
                    </div>
                    <div class="col-md-9">
                    <select name="mata_uang" class="form-control">
                        <?php
                        foreach($matauang->result() as $mu){
                            echo "<option value=\"$mu->id\">$mu->mata_uang ($mu->alias)</option>";
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
                        <label class="form-control-label" for="esupp">Email Supplier</label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="esupp" class="form-control"  id="esupp" value="<?=@$email?>">
                    </div>
                </div>
                <h3>PIC</h3>
                <?php if(!isset($pic['nama']) || count($pic['nama'])==0):?>                
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
                <?php endif; ?>
                <div id="pic"></div>                
                <?php
                if(isset($pic['nama'])){
                    for($x=0 ; $x<count($pic['nama']) ; $x++){
                        switch($pic['tipe'][$x]){
                            case '1':
                                $value = 1;
                                $tipe = "Email";
                            break;
                            case '2':
                                $value = 2;
                                $tipe = "Telepon";
                            break;
                            case '3':
                                $value = 1;
                                $tipe = "Handphone";
                            break;
                            default:
                                $value = 1;
                                $tipe = "Email";
                            break;
                        }
                        echo '<div id=xpic'.$x.'>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <select name="txpic[]" id="" class="form-control">
                                        <option value="'.$value.'" selected>'.$tipe.'</option>         
                                        <option value="0" disabled>Pilih Kontak</option>
                                        <option value="1">Email</option>
                                        <option value="2">Telepon</option>
                                        <option value="3">Handphone</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="nxpic[]" class="form-control" placeholder="Nama Kontak" id="npic" required value="'.$pic['nama'][$x].'">
                                    <input type="hidden" name="idxpic[]" value="'.$pic['id'][$x].'">
                                    <input id="idxpic'.$x.'" type="hidden" name="actionxpic[]" value="ex">
                                    
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="xpic[]" class="form-control" placeholder="Nomor Kontak"  id="npic" required value="'.$pic['nomor'][$x].'">
                                </div>
                                <div class="col-md-1">
                                    <a class="btn btn-success" onclick="tambahpic()">+</a>
                                </div>
                                <div class="col-md-1">
                                    <a class="btn btn-danger" onclick="hapusxpic(\''.$x.'\')">-</a>       
                                </div>
                            </div>
                        </div>';
                    }
                }
            ?>
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
    add = '<div id=pic'+i+'>'+
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
                '<input type="text" name="bpic[]" class="form-control" placeholder="Bagian"  id="bpic">'+
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