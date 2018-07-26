<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box m-t-20">
                    <div class="p-20">
                        <form method="post" id="form_email" name="form_email" role="form" novalidate="novalidate">
                            <div class="form-group">
                                <input type="email" id="eto" name="eto" class="form-control" placeholder="To"
                                       data-role="tagsinput">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="email" id="ecc" name="ecc" class="form-control" placeholder="Cc"
                                               data-role="tagsinput">
                                    </div>                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" id="esubject" name="esubject" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <!-- <div class="summernote" id="summernote"></div> -->
                                <textarea class="summernote" id="summernote" name="summernote"></textarea>
                            </div>

                            <div class="btn-toolbar form-group m-b-0">
                                <div class="pull-right">                                    
                                    <button type="submit" id="btn_send" class="btn btn-purple">
                                        <span>Send</span>
                                        <i class="fa fa-send m-l-10"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- End row -->
    </div> <!-- end Col-9 -->
</div><!-- End row -->