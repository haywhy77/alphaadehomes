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
                        <h4 class="header-title">Property details</h4>
                        <p class="card-title-desc">Basic information about the property.</p>    
                        
                        <div class="table-responsive">

                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" value="<?= ($property->category) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" value="<?= ($property->type) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" value="<?= ($property->title) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <div id="description"><?= ($property->description) ?></div>
                                <span class="form-text margin-top-0">&nbsp;</span>
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
                        <h4 class="header-title">Propert description</h4>
                        <p class="card-title-desc">More information about the property.</p>    
                        
                        <div class="table-responsive">
                            
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" value="<?= ($property->price) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            <div class="form-group">
                                <label>How many bedrooms?</label>
                                <input type="text" value="<?= ($property->bedrooms) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            
                            <div class="form-group">
                                <label>How many bathrooms?</label>
                                <input type="text" value="<?= ($property->bathrooms) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            <div class="form-group">
                                <label>What is the land measurement?</label>
                                <input type="text" value="<?= ($property->square_feet) ?>" class="form-control" readonly>
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
                        <h4 class="header-title">Property location</h4>
                        <p class="card-title-desc">Give more insight into where the property is located..</p>    
                        
                        <div class="table-responsive">

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" value="<?= ($property->address) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" value="<?= ($property->city) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            
                            <div class="form-group">
                                <label>Region</label>
                                <input type="text" value="<?= ($property->state) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>

                            <div class="form-group">
                                <label>Zip code</label>
                                <input type="text" value="<?= ($property->zip_code) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" value="<?= ($property->longitude) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
                            </div>
                            
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" value="<?= ($property->latitude) ?>" class="form-control" readonly>
                                <span class="form-text margin-top-0">&nbsp;</span>
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
                <form id="dzproduct" method="POST" action="<?= ($BASE) ?>/console/properties/<?= ($property->id) ?>" enctype="multipart/form-data">
                    <div class="dropzone">
                        <div class="fallback">
                            <input name="file" id="file-input" type="file" multiple="multiple">
                        </div>
                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                            </div>
                            
                            <h4>Drop files here to upload</h4>
                        </div>
                        <div class="previews"></div>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-info btn-md waves-effect waves-light submit-click disabled">Add more pictures</button>

                <?php if ($property->availability=='sold'): ?>
                    
                        <button type="button" class="btn btn-secondary btn-md waves-effect waves-light action-click" data-action="<?= ($BASE) ?>/console/properties/<?= ($property->id) ?>/actions/available" data-text="Are you sure you want to publish this property?">Make available</button>
                    
                    <?php else: ?>
                        <button type="button" class="btn btn-info btn-md waves-effect waves-light action-click" data-action="<?= ($BASE) ?>/console/properties/<?= ($property->id) ?>/actions/sold" data-text="Are you sure you want to change this property to sold?">Mark as sold</button>
                    
                <?php endif; ?>
                <?php if ($property->status=='pending'): ?>
                    
                        <button type="button" class="btn btn-dark btn-md waves-effect waves-light action-click" data-action="<?= ($BASE) ?>/console/properties/<?= ($property->id) ?>/actions/publish" data-text="Are you sure you want to publish this property?">Publish property</button>
                    
                    <?php else: ?>
                        <button type="button" class="btn btn-danger btn-md waves-effect waves-light action-click" data-action="<?= ($BASE) ?>/console/properties/<?= ($property->id) ?>/actions/pending" data-text="Are you sure you want to unpublish this property?">Unpublish property</button>
                    
                <?php endif; ?>
                

                <button type="button" class="btn btn-danger btn-md waves-effect waves-light action-click" data-action="<?= ($BASE) ?>/console/properties/<?= ($property->id) ?>/actions/trash" data-text="Are you sure you want to trash this property?">Trash property</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        let dataTransfer = new DataTransfer()

        const dropzone = new Dropzone("div.dropzone", { 
            url: $('#dzproduct').attr('action'),
            autoProcessQueue: false,
            autoDiscover: false,
            addRemoveLinks: true,
        }).on("addedfile", function(file) {
            dataTransfer.items.add(file);
            $('.submit-click').removeClass('disabled')
        });

        $('.delete').on("click", function(e){
            var action=$(this).attr('data-todo');
            var url=$(this).attr('data-client');
            var item=$(this).attr('data-file');
            var warning=$(this).attr('data-text');
            var redirect=$(this).attr('data-redirect');
            if(confirm(warning)){
                item=item.replaceAll("/", "__").replace(".", "@");
                redirect=redirect.replaceAll("/", "__");
                var url=`${url}/${item}/${redirect}`;
                window.location.href=url;
                return false;
            }else{
                return false;
            }
        })

        $('.view').on("click", function(e){
            var action=$(this).attr('data-todo');
            var id=$(this).attr('data-client');
            var $anchor=$(this).closest('a')[0];
            console.log($anchor)
            $anchor.trigger('click');
            return false
        })

        $('.submit-click').on('click', function(e){
            e.preventDefault();
            
            // console.log(dataTransfer.files)
            for(var ln in dataTransfer.files){
                $('#dzproduct').append('<input type="hidden" name="pictures[]" value="'+dataTransfer.files[ln].dataURL+'" />')
            }
            
            $('#dzproduct').submit();
            
        })

        $('.action-click').on('click', function(e){
            e.preventDefault();
            var warning=$(this).attr('data-text');
            var url=$(this).attr('data-action');
            if(confirm(warning)){
                window.location.href=url;
                return false;
            }else{
                return false;
            }
        })
    })
</script>