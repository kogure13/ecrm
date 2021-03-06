<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Dashboard</h4>
            <p class="text-muted page-title-alt">Welcome to admin panel !</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-success pull-left">
                    <i class="md md-thumb-up text-success"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark">
                        <b id="kepuasan"></b>
                    </h3>
                    <p class="text-muted">Kepuasan</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-danger pull-left">
                    <i class="md md-thumb-down text-danger"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark">
                        <b id="keluhan"></b>
                    </h3>
                    <p class="text-muted">Keluhan</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-primary pull-left">
                    <i class="md md-account-child text-primary"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark">
                        <b id="tClient"></b>
                    </h3>
                    <p class="text-muted">Client</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card-box">
                <h4 class="text-dark text-center header-title m-t-0">Analytics Survey</h4>                
                <div class="graph">
                    <div class="graph-container" id="barDiv">
                        <canvas id="bar" height="80px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>	
