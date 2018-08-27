<?php
$db = new dbObj();
$connString = $db->getConstring();
$noreg = new noreg($connString);
?>
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Halaman Permintaan Project</h4>
        <p class="text-muted page-title-alt">Welcome </p>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="form-group">
                <input type="hidden" id="idSession" data-value="<?= $_SESSION['id_user'] ?>"/>
                <button id="btn_add" class="btn btn-default">Tambah Project</button>
            </div>

            <table id="lookup"
                   class="table table-striped table-bordered dt-responsive nowrap" 
                   cellspacing="0" cellpadding="0"
                   width="100%">
                <thead>
                    <tr>
                        <th class="nosort" width="20px">#</th>
                        <th class="nosort" width="auto">Action</th>
                        <th>No. Reg</th><th>Tanggal Request</th>
                        <th>Nama proyek</th><th class="nosort">Penanggung Jawab</th>
                        <th>Status</th><th class="nosort">Keterangan</th>
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
            <form id="form_kproyek" name="form_kproyek" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" value="add" name="action" id="action">
                    <input type="hidden" value="0" name="edit_id" id="edit_id">  
                    <input type="hidden" value="<?= $_SESSION['id_user'] ?>" name="id_client" id="id_client">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="nip" class="control-label">No. Reg:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
                                    <input type="text" class="form-control input-sm" id="noreg" name="noreg" readonly="readonly" value="<?= $noreg->getData() ?>"/>
                                </div>                                
                            </div>
                            <div class="col-sm-4">
                                <label for="nip" class="control-label">Tgl Request:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control input-sm" id="rdate" name="rdate" placeholder="Request Date"/>                                    
                                </div>                                
                            </div>
                        </div>                            
                    </div>
                    <div class="form-group">
                        <div class="row">                            
                            <div class="col-sm-6">
                                <label for="nama pegawai" class="control-label">Kategori Project</label>
                                <div class="input-group">
                                    <select name="kproyek" id="kproyek" class="form-control input-sm">
                                        <option></option>
                                    </select>
                                </div>                                
                            </div>                            
                        </div>                        
                    </div>                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-7">
                                <label for="keterangan" class="control-label">Keterangan:</label>                                
                                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
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
</div><!-- end modal add req project -->

<div id="comment_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">            
            <div class="modal-header">                
                <h4 class="modal-title"></h4>
            </div>
            <form id="form_comment" name="form_comment" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" value="add_comment" name="action" id="action">
                    <input type="hidden" value="0" name="edit_id_comment" id="edit_id_comment">  
                    <input type="hidden" value="<?= $_SESSION['id_user'] ?>" name="id_client" id="id_client">
                    <input type="hidden" value="<?= date('Y-m-d') ?>" name="comdate">                                        
                    <div class="form-group">
                        <p>Pesan komplain anda</p>
                        <div class="row">
                            <div class="col-sm-7">                                
                                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="">
                        <button type="button" id="btn_cancel_commit" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_add_commit" class="btn btn-sm btn-primary">Save</button>
                    </div>                        
                </div>
            </form>
        </div>
    </div>
</div>

<!-- start selesai project -->
<div id="selesai_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title"></h4>
            </div>
            <form id="form_selesai" name="form_selesai" novalidate="novalidate">
                <div class="modal-body">
                    <input type="hidden" value="add_selesai" name="action" id="action">
                    <input type="hidden" value="0" name="edit_id_selesai" id="edit_id_selesai">  
                    <input type="hidden" value="<?= $_SESSION['id_user'] ?>" name="id_client" id="id_client">
                    <input type="hidden" value="<?= date('Y-m-d') ?>" name="fdate">
                    <h4>Selesaikan request prospek</h4>
                    <p>
                        Penilaian Anda: <br/>
                        <?php
                        for($i=1; $i<=5; $i++){
                            switch($i) {
                                case 1: $opv = 'Kurang Sekali'; break;
                                case 2: $opv = 'Kurang'; break;
                                case 3: $opv = 'Cukup'; break;
                                case 4: $opv = 'Baik'; break;
                                case 5: $opv = 'Baik Sekali'; break;                                    
                            }
                            ?>
                        <label class="radio-inline">
                            <input type="radio" id="rdc" name="rdc" value="<?=$i?>" > <?=$opv?>
                        </label>
                        <?php
                        }
                        ?>
                    </p>
                    <p>
                        Pilih "Ya" apabila request sudah sesuai dengan permintaan anda
                    </p>
                </div>
                <div class="modal-footer">                    
                    <button type="button" id="btn_cancel_commit" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_add_commit" class="btn btn-sm btn-success">Ya</button>                                            
                </div>
            </form>
        </div>
    </div>
</div>