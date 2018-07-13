<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-5 col-sm-12">
                    <form name="form_jabatan" id="form_jabatan" novalidate="novalidate">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" value="add" name="action" id="action">
                                <input type="hidden" value="0" name="edit_id" id="edit_id">
                                <input type="text" id="jabatan" name="jabatan" class="form-control input-sm" placeholder="Jabatan">
                                <span class="input-group-btn">
                                    <button id="btn_add" class="btn btn-sm btn-primary">
                                        <i class="fa fa-plus"></i>
                                        <span id="btn_jabatan"></span>
                                    </button>
                                    <button id="btn_cancel" class="btn btn-sm btn-danger">
                                        <i class="fa fa-refresh"></i>
                                        Cancel
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>                        
                </div>
            </div>
                                
            <table id="lookup"
                   class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                    <tr>
                        <th class="nosort" width="40px">Action</th>
                        <th>Jabatan</th>                    
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
