<?php foreach ((\Flash::instance()->getMessages()?:[]) as $msg): ?>
    <div class="alert alert-<?= ($msg['status']) ?> alert-dismissable">
        <?= ($msg['text'])."
" ?>
    </div>
<?php endforeach; ?>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Booking details</h4>
                        <p class="card-title-desc">Basic information about the property.</p>    
                        
                        <div class="table-responsive">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" value="<?= ($booking->name) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" value="<?= ($booking->email) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            
                            <div class="form-group">
                                <label>Status</label>
                                <div class="btn <?= ($booking->status=='confirmed'?'btn-outline-success':($booking->status=='cancelled'?'btn-outline-danger':'btn-outline-warning')) ?> btn-block disabled btn-sm"><?= ($booking->status) ?></div>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <div id="description"><?= ($booking->message) ?></div>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
        
    </div>
    <div class="col-lg-6">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Property details</h4>
                        <p class="card-title-desc"><a href="<?= ($BASE) ?>/console/properties/<?= ($property->id) ?>" target="_blank">View property details.</a></p>
                        <?php if (isset($property->pictures) && is_array($property->pictures) && count($property->pictures)>0): ?>
                            
                                <div class="popup-gallery">
                                    <?php $count=0; foreach (($property->pictures?:[]) as $key=>$props): $count++; ?>
                                        <a class="float-start m-1" href="<?= ($BASE) ?>/ui/properties/<?= ($property->id) ?>/<?= ($props) ?>" title="Gallery <?= ($count) ?>">
                                            <div class="img-fluid">
                                                <img src="<?= ($BASE) ?>/ui/properties/<?= ($property->id) ?>/<?= ($props) ?>" alt="" class="rounded avatar-xl">
                                                <div class="overlay">
                                                    <button class="btn btn-danger btn-sm btn-icon view" data-client="<?= ($BASE) ?>/ui/properties/<?= ($props) ?>" data-todo="VIEW"><span class="fa fa-eye"></span></button>
                                                    <button class="btn btn-danger btn-sm btn-icon delete" data-client="<?= ($BASE) ?>/console/file-delete" data-redirect="/console/properties/<?= ($property->id) ?>" data-file="ui/properties/<?= ($property->id) ?>/<?= ($props) ?>" data-text="Are you sure you want to trash this property picture?" data-todo="DELETED"><span class="fa fa-trash"></span></button>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            
                            <?php else: ?>
                                <div class="card alert alert-dismissible border mt-4 mt-lg-0 p-0 mb-0">
                                    <div class="card-header bg-soft-danger">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                           
                                        </button>
                                        <h5 class="font-size-16 text-danger my-1">Notice</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="mb-4">
                                                <i class="mdi mdi-alert-outline display-4 text-danger"></i>
                                            </div>
                                            <h4 class="alert-heading font-size-18">Property has no gallery</h4>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                        <?php endif; ?>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                
                <?php if ($booking->status=='pending'): ?>
                    
                        <button type="button" class="btn btn-success btn-md waves-effect waves-light btn-click" data-url="<?= ($BASE) ?>/console/bookings/<?= ($booking->id) ?>/track/approve" data-text="Are you sure you want to approve this booking request?">Confirm booking</button>

                        <button type="button" class="btn btn-danger btn-md waves-effect waves-light btn-click" data-url="<?= ($BASE) ?>/console/bookings/<?= ($booking->id) ?>/track/close" data-text="Are you sure you want to close this booking request?">Cancel booking</button>
                    
                    <?php else: ?>
                        <?php if ($booking->status=='confirmed'): ?>
                            
                                <button type="button" class="btn btn-info btn-md waves-effect waves-light btn-click" data-url="<?= ($BASE) ?>/console/bookings/<?= ($booking->id) ?>/track/suspend" data-text="Are you sure you want to suspend this booking request?">Suspend booking</button>
        
                                <button type="button" class="btn btn-danger btn-md waves-effect waves-light btn-click" data-url="<?= ($BASE) ?>/console/bookings/<?= ($booking->id) ?>/track/close" data-text="Are you sure you want to close this booking request?">Cancel booking</button>
                            
                            <?php else: ?>
                                <button type="button" class="btn btn-info btn-md waves-effect waves-light btn-click" data-url="<?= ($BASE) ?>/console/bookings/<?= ($booking->id) ?>/track/suspend" data-text="Are you sure you want to suspend this booking request?">Suspend booking</button>

                                <button type="button" class="btn btn-success btn-md waves-effect waves-light btn-click" data-url="<?= ($BASE) ?>/console/bookings/<?= ($booking->id) ?>/track/approve" data-text="Are you sure you want to approve this booking request?">Confirm booking</button>
                            
                        <?php endif; ?>
                    
                <?php endif; ?>
                

                <button type="button" class="btn btn-danger btn-md waves-effect waves-light btn-click" data-url="<?= ($BASE) ?>/console/bookings/<?= ($booking->id) ?>/track/delete" data-text="Are you sure you want to trash this property?">Trash booking</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        $('.btn-click').on('click', function () {
            var $url =$(this).data('url');
            var text=$(this).data('text');
            if(confirm(text)){
                window.location.href=$url;
            }
        });
    })
</script>