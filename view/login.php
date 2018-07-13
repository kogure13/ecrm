<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading"> 
            <h3 class=""></i> Sign In Page</h3>
        </div> 
        
        <div class="panel-body">
            <form method="post" class="form-horizontal m-t-20" id="form_login" name="form_login" novalidate="novalidate">
                <input type="hidden" value="login" name="action" id="action">
                <div class="form-group ">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <input type="text" id="uname" name="uname" class="form-control" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox" style="margin-left: 0;">
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <button  type="submit" id="btn_login" class="btn btn-primary btn-block text-uppercase">
                            <i class="fa fa-sign-in"></i>
                            Log In
                        </button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="?page=page_recoverpw" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                </div>
            </form> 

        </div>   
    </div>
</div>