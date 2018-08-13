<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-5 col-sm-12">
                    <div class="form-group">                            
                        <input type="hidden" value="add" name="action" id="action">
                        <input type="hidden" value="0" name="edit_id" id="edit_id">
                        <button id="btn_add" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                            Add Promosi
                        </button>                                
                    </div>
                </div>
            </div>

            <table id="lookup"
                   class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                    <tr>
                        <th class="nosort" width="30px">#</th>
                        <th class="nosort" width="40px">Action</th>
                        <th class="nosort">Judul</th>
                        <th class="nosort">Deskripsi</th><th class="">Tanggal Awal Promosi</th>
                        <th class="">Tanggal Akhir Promosi</th><th class="nosort">Banner</th>
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
            <form method="post" name="form_promo" id="form_promo" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" value="add" name="action" id="action">
                    <input type="hidden" value="0" name="edit_id" id="edit_id">                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="Judul" class="control-label">Judul:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                    <input type="text" class="form-control input-sm" id="judul" name="judul" placeholder="Judul" />
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="deskripsi" class="control-label">Deskripsi:</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="periode awal" class="control-label">Awal Promo:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control input-sm" id="pawal" name="pawal" placeholder="Periode Awal" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="periode akhir" class="control-label">Akhir Promo:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control input-sm" id="pakhir" name="pakhir" placeholder="Periode Akhir" />
                                </div>
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