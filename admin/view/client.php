<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="form-group">
<!--                <button id="btn_add" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    Add client
                </button>-->
                <button id="btn_ebroadcast" class="btn btn-sm btn-success">
                    <i class="fa fa-envelope-o"></i>
                    Broadcast E-mail
                </button>
            </div>

            <table id="lookup"
                   class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                    <tr>
                        <th class="nosort" width="40px">Action</th>
                        <th>Username</th><th>Company name</th>
                        <th>Company address</th><th>Phone number</th>
                        <th>E-mail</th><th>Join date</th>
                        <th>Status</th>
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
            <form method="post" name="form_client" id="form_client" novalidate="novalidate">
                <div class="modal-body">                    
                    <input type="hidden" value="add" name="action" id="action">
                    <input type="hidden" value="0" name="edit_id" id="edit_id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="prospek statsu">Penanggung Jawab: </label>
                                <input type="hidden" id="idpj" name="idpj">
                                <input type="text" class="input-sm form-control" id="pjname" name="pjname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="prospek statsu">Prospek Proyek: </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-train"></i></span>
                                    <input type="text" class="form-control input-sm rdinput" id="uproject" name="uproject" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-7">
                                <label for="username" class="control-label">Username:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                                    <input type="text" class="form-control input-sm" id="uname" name="uname" readonly="readonly" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="company name" class="control-label">Company name:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input type="text" class="form-control input-sm rdinput" id="cname" name="cname" placeholder="Company Name" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="email" class="control-label">E-mail:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control input-sm rdinput" id="email" name="email" placeholder="E-mail" />
                                </div> 
                            </div>
                        </div>                    
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="join date" class="control-label">join date:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control input-sm rdinput" id="jdate" name="jdate" placeholder="Join Date" />
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label for="phone" class="control-label">Phone:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control input-sm rdinput" id="tlp" name="tlp" placeholder="Phone Number" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="company address" class="control-label">Company address:</label>
                                <textarea class="form-control rdinput" id="caddress" name="caddress"></textarea>
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