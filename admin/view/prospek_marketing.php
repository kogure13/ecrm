<div class="row">
    <div class="col-sm-12">
        <div class="card-box">            
            <h4 class="m-t-0 header-title">
                <b>List Prospek CLient</b>
            </h4>

            <table id="lookup"
                   class="table table-striped table-bordered dt-responsive nowrap" 
                   cellspacing="0" cellpadding="0" width="100%">
                <thead>
                    <tr>
                        <th class="nosort" width="30px">#</th>
                        <th class="nosort" width="40px">Action</th>
                        <th>No. Reg</th><th>Company Name</th><th>Nama Proyek</th>
                        <th>Tanggal Request</th><th>Status</th><th class="nosort">Keterangan</th>
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
            <form id="form_prospek" name="form_prospek" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" value="add" name="action" id="action">
                    <input type="hidden" value="0" name="edit_id" id="edit_id">                                        
                    <div class="form-group">
                        <div class="row">                            
                            <div class="col-sm-6">
                                <label for="pj" class="control-label">Status Prospek:</label>                                
                                <select class="input-sm form-control select2" id="stprospek" name="stprospek">
                                    <option value="sp">Status Prospek</option>
                                    <option value="2">On Progress</option>                                    
                                    <option value="4">Close</option>                                    
                                </select>                                
                            </div>                            
                        </div>                        
                    </div>                    
                    <div class="form-group">
                        <label for="alamat" class="control-label">Keterangan:</label>                                
                        <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
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