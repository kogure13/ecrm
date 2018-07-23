<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-5 col-sm-12">
                    <form name="form_jabatan" id="form_jabatan" novalidate="novalidate">
                        <div class="form-group">                            
                            <input type="hidden" value="add" name="action" id="action">
                            <input type="hidden" value="0" name="edit_id" id="edit_id">
                            <input type="file" class="filestyle" data-buttonname="btn-primary">                            
                        </div>
                        <div class="form-group">
                            <span class="input-group-btn">
                                <button id="btn_add" class="btn btn-warning">
                                    <i class="fa fa-upload"></i>
                                    <span id="btn_promosi"></span>
                                </button>                                    
                            </span>                          
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
                        <th>Promosi</th>                    
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
