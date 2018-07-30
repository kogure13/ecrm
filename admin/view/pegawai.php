<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="form-group">
                <button id="btn_add" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    Add pegawai
                </button>
            </div>

            <table id="lookup"
                   class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                    <tr>
                        <th class="nosort" width="40px">Action</th>
                        <th>NIP</th><th>Nama Pegawai</th>
                        <th>Jabatan</th><th>Alamat</th>
                        <th>No. tlp</th><th>E-mail</th>                        
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
            <form id="form_pegawai" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" value="add" name="action" id="action">
                    <input type="hidden" value="0" name="edit_id" id="edit_id">                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="nip" class="control-label">NIP:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
                                    <input type="text" class="form-control input-sm" id="nip" name="nip" placeholder="N.I.P" />
                                </div>                                
                            </div>
                        </div>                            
                    </div>
                    <div class="form-group">
                        <div class="row">                            
                            <div class="col-sm-6">
                                <label for="nama pegawai" class="control-label">Nama Pegawai:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                    <input type="text" class="form-control input-sm" id="fname" name="fname" placeholder="Nama Pegawai" />    
                                </div>                                
                            </div>
                            <div class="col-sm-5">
                                <label for="jabatan" class="control-label">Jabatan</label>
                                <select name="jabatan" id="jabatan" class="form-control input-sm">
                                    <option value="">...</option>                                    
                                </select>
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <div class="row">                            
                            <div class="col-sm-6">
                                <label for="email" class="control-label">Email:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control input-sm" id="email" name="email" placeholder="E-mail" />    
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label for="tlp" class="control-label">No. Tlp/Handphone:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control input-sm" id="tlp" name="tlp" placeholder="No. Tlp/Handphone" />    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="control-label">alamat:</label>                                
                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
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
