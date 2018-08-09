<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="page-title m-b-20">List User</h4>            
            <table id="lookup"
                   class="table table-striped table-bordered dt-responsive nowrap" 
                   cellspacing="0" cellpadding="0" width="100%">
                <thead>
                    <tr>
                        <th class="nosort" width="30px">#</th>
                        <th class="nosort" width="40px">Action</th>
                        <th>Username</th><th>Role</th>                        
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
            <form id="form_user" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" value="add" name="action" id="action">
                    <input type="hidden" value="0" name="edit_id" id="edit_id">                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="username" class="control-label">Username:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
                                    <input type="text" class="form-control input-sm" id="username" name="username" placeholder="Username" />
                                </div>                                
                            </div>
                            <div class="col-sm-4">
                                <label for="password" class="control-label">Password:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="text" class="form-control input-sm" id="password" name="password" placeholder="Password" />
                                </div>                                
                            </div>
                        </div>                            
                    </div>
                    <div class="form-group">
                        <div class="row">                            
                            <div class="col-sm-6">
                                <label for="role" class="control-label">Role:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-registered"></i></span>
                                    <select name="role" id="role" class="input-sm form-control">
                                        <option></option>
                                        <option value="admin">Admin</option>
                                        <option value="marketing">Marketing</option>
                                        <option value="sdm">SDM</option>
                                        <option value="direktur">Direktur</option>
                                    </select>
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
