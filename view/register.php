
<div class="row">
    <div class="col-lg-5 col-md-5">
        <div class="panel-heading">
            <h3 class="text-center"> Sign Up as <strong class="text-custom">Client</strong> </h3>
        </div>

        <div class="panel-body">
            <form method="post" id="form_reg" name="form_reg" class="form-horizontal" novalidate="novalidate">
                <input type="hidden" value="save" name="action" id="action">
                <input type="hidden" value="<?= date("Y-m-d") ?> <?= date("H:i:s") ?>" name="jdate" id="jdate">

                <div class="form-group ">                    
                    <div class="col-lg-12 col-md-12 col-sm-6">
                        <label>E-mail</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>

                <div class="form-group ">                                            
                    <div class="col-xs-6">
                        <label>Username</label>
                        <input type="text" id="uname" name="uname" class="form-control" placeholder="Username">
                    </div>
                    <div class="col-xs-6">
                        <label>Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Company Name</label>
                        <input type="text" id="cname" name="cname" class="form-control" placeholder="Company Name">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-7">
                        <label>Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="alamat">Address</label>
                        <textarea id="caddress" name="caddress" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group m-1-10">
                    <div class="col-lg-12 col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" id="checkbox_signup" name="checkbox_signup" style="margin-left: 0;">
                            <label for="checkbox signup">I accept <a href="#" id="term_condt">Terms and Conditions</a></label>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button id="save_reg" class="btn btn-primary btn-block text-uppercase" type="submit">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 hidden-xs">
        <img src="theme/asset/images/Logo_CDP.jpg" width="100%">
    </div>
</div>


<div id="term_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">         
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>

            <div class="modal-body">                    
                <div class="modal-footer">
                    <div class="">
                        <button type="button" id="btn_cancel" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    </div>                        
                </div>
            </div>
        </div>
    </div>
</div>