<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <form id="form_users" name="form_users" novalidate="novalidate">
                <div class="form-group">
                    <button id="btn_add" class="btn btn-sm btn-success" type="post">
                        <i class="fa fa-plus"></i>
                        Update
                    </button>
                </div>


                <input type="hidden" value="update" name="action" id="action">
                <input type="hidden" value="<?= $_SESSION['id_user'] ?>" name="edit_id" id="edit_id">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="username" class="control-label">Username:</label>
                            <input type="text" class="form-control input-sm" id="uname" name="uname" placeholder="Input Username" />
                        </div>
                        <div class="col-sm-6">
                            <label for="password" class="control-label">Password:</label>
                            <input type="text" class="form-control input-sm" id="password" name="password" placeholder="Input Password" />
                        </div>
                    </div>                            
                </div>                        
            </form>
        </div>
    </div>
</div>
