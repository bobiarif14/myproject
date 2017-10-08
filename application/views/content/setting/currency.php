<section class="page-content">
    <div class="page-content-inner">
        <section class="panel panel-with-borders">
            <div class="panel-heading">
               <a class="btn btn-rounded btn-success-outline margin-inline" style="float:right" data-toggle="modal" data-target="#add" ><i class="icmn-plus3"> </i>Tambah Mata Uang</a>
                    
                </button>
                <h3>Mata Uang</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover nowrap" width="100%">
                    <thead>
                        <th>Mata Uang</th>
                        <th>Symbol</th>
                        <th>Value in IDR</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($currency->result() as $c){
                            echo "<tr>
                            <td id=\"matauang$c->id\">$c->mata_uang</td>
                            <td id=\"alias$c->id\">$c->alias</td>
                            <td id=\"value$c->id\">".number_format($c->value_idr)."</td>
                            <td><button type=\"button\" class=\"btn btn-success\" onclick=\"edit($c->id)\">Edit</button></td>";
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
    <?=@form_open('setting/currency')?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Mata Uang</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="matauang">Mata Uang</label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="mata_uang" class="form-control" placeholder="Ex: IDR">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="alias">Symbol</label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="symbol" class="form-control" placeholder="Ex: Rp">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="matauang">Value IDR</label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="value_idr" class="form-control" placeholder="Ex: IDR">
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
    <?=@form_open('setting/currency')?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Mata Uang</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="matauang">Mata Uang</label>
            </div>
            <div class="col-sm-6">
                <input id="edit_matauang" type="text" name="mata_uang" class="form-control" placeholder="Ex: IDR">
                <input id="edit_id" type="hidden" name="id_currency">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="alias">Symbol</label>
            </div>
            <div class="col-sm-6">
                <input id="edit_alias" type="text" name="symbol" class="form-control" placeholder="Ex: Rp">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="matauang">Value IDR</label>
            </div>
            <div class="col-sm-6">
                <input id="edit_value" type="number" name="value_idr" class="form-control" placeholder="Ex: IDR">
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
    matauang = $('#matauang'+id).text();
    alias = $('#alias'+id).text();
    value = $('#value'+id).text();
    value = value.replace(",", "");
    $('#edit_matauang').val(matauang);
    $('#edit_id').val(id);
    $('#edit_alias').val(alias);
    $('#edit_value').val(value);
    
    $('#edit').modal();
}
</script>