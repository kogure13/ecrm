<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="form-group">
                <?php if($_SESSION['role'] == 'marketing') { ?>
                <button id="btn_ebroadcast" class="btn btn-sm btn-success">
                    <i class="fa fa-envelope-o"></i>
                    Broadcast E-mail
                </button>
                <?php } ?>
            </div>

            <table id="lookup"
                   class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                    <tr>
                        <th class="nosort" style="width: auto">#</th>
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
