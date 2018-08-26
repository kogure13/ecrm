<div class="row">
    <div class="col-sm-12">
        <div class="card-box">            
            <div class="form-group">
                <button id="btn_add" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    Add produk
                </button>
            </div>
            <table id="lookup"
                   class="table table-striped table-bordered dt-responsive nowrap" 
                   cellspacing="0" cellpadding="0" width="100%">
                <thead>
                    <tr>
                        <th class="nosort" width="30px">#</th>
                        <th class="nosort" width="40px">Action</th>
                        <th>Kategori</th><th>Produk</th>
                        <th class="nosort">Keterangan</th>
                        <th class="nosort">Gambar</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">            
            <div class="modal-header">                
                <h4 class="modal-title"></h4>
            </div>
            <form id="form_kproduk" name="form_kproduk" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" value="add" name="action" id="action">
                    <input type="hidden" value="0" name="edit_id" id="edit_id">                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="kategori produk" class="control-label">Kategori:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-registered"></i></span>
                                    <select name="kproduk" id="kproduk" class="input-sm form-control">
                                        <option></option>                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="produk" class="control-label">Produk:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <input type="text" class="form-control input-sm" id="produk" name="produk" placeholder="Produk" />
                                </div>                                
                            </div>
                        </div>                            
                    </div>
                    <div class="form-group">
                        <div class="row">                            
                            <div class="col-sm-6">
                                <label for="keterangan" class="control-label">Keterangan:</label>
                                <textarea id="keterangan" name="keterangan" class="form-control" ></textarea>
                            </div>                            
                        </div>                        
                    </div>                    
                </div>
                <div class="modal-footer">
                    <div class="">
                        <button type="button" id="btn_cancel" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_add" class="btn btn-sm btn-primary">Save</button>
                    </div>                        
                </div>
            </form>
        </div>
    </div>
</div>
