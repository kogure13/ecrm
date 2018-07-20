
<div class="row">
    <div class="col-lg-5 col-md-5">
        <div class="panel-heading">
            <h3 class="text-center"> Profile <strong class="text-custom">Client</strong> </h3>
        </div>

        <div class="panel-body">
            <form method="post" id="form_reg" name="form_reg" class="form-horizontal" novalidate="novalidate">
                <input type="hidden" value="save" name="action" id="action">                
                <input type="hidden" value="<?= $_SESSION['id_user'] ?>" name="edit_id" id="edit_id">
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
                        <label>Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                    </div>                    
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Company Name</label>
                        <input type="text" id="cname" name="cname" class="form-control" placeholder="Company Name">
                    </div>
                </div>               
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="alamat">Address</label>
                        <textarea id="caddress" name="caddress" class="form-control"></textarea>
                    </div>
                </div>                
                <div class="form-group text-center m-t-40">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" id="update" class="btn btn-primary btn-block text-uppercase" >
                            Update
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
