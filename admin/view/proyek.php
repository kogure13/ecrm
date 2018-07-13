<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="form-group">
                <button id="btn_add" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    Add proyek
                </button>
            </div>

            <table id="lookup"
                   class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                    <tr>
                        <th class="nosort" width="40px">Action</th>
                        <th>Kode proyek</th><th>Nama proyek</th>
                        <th>Keterangan</th>
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
            <form method="post" name="form_kproyek" id="form_kproyek" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" value="add" name="action" id="action">
                    <input type="hidden" value="0" name="edit_id" id="edit_id">                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="Kode" class="control-label">Kode:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                    <input type="text" class="form-control input-sm" id="kode" name="kode" placeholder="kode" />
                                </div>                                
                            </div>
                            <div class="col-sm-6">
                                <label for="Proyek" class="control-label">Proyek:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                    <input type="text" class="form-control input-sm" id="proyek" name="proyek" placeholder="Proyek" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="Keterangan" class="control-label">Keterangan:</label>
                                <textarea id="keterangan" name="keterangan" class="input-sm form-control"></textarea>
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