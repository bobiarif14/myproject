<section class="page-content">
    <div class="page-content-inner">
        <section class="panel panel-with-borders">
            <div class="panel-heading">
               <a class="btn btn-rounded btn-success-outline margin-inline" style="float:right" data-toggle="modal" data-target="#add" ><i class="icmn-plus3"> </i>Tambah Category</a>
                    
                </button>
                <h3>Category</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover nowrap" width="100%">
                    <thead>
                        <th>Category</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($category->result() as $c){
                            echo "<tr>
                            <td id=\"category$c->id\">$c->nama_category</td>
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
    <?=@form_open('setting/category')?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Category</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="category">Nama Category</label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="category" class="form-control">
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
    <?=@form_open('setting/category')?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Category</h4>
      </div>
      <div class="modal-body">
        <div class="row form-group">
            <div class="col-sm-3">
                <label for="category">Nama Category</label>
            </div>
            <div class="col-sm-6">
                <input id="edit_category" type="text" name="category" class="form-control">
                <input id="edit_id" type="hidden" name="id_category" class="form-control">
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
    category = $('#category'+id).text();
    $('#edit_category').val(category);
    $('#edit_id').val(id);
    $('#edit').modal();
}
</script>