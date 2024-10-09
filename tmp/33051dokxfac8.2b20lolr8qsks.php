        
<div class="row">
    <div class="col-md-9 col-lg-9">
        <div class="card margin-bottom-0">
            <div class="card-body">
                <button type="button" class="btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#skillModal">Add position</button>
            </div>
            <div class="card-body">
                <div class="table-responsive margin-top-20">
                    <table class="table table-striped table-bordered margin-bottom-20" style="min-width: 800px;">
                        <thead>
                            <tr>
                                <th width="30"><label class="form-check-label"></label> </th>
                                <th>Name</th>
                                <th width="100">Code</th>
                                <th width="200">Path</th>
                                <th width="100"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=0; foreach (($settings['positions']['data']?:[]) as $key=>$position): $count++; ?>
                                <tr>
                                    <td><label class="form-check-label"><?= ($count) ?></label></td>
                                    <td><?= ($position['name']) ?></td>
                                    <td><?= ($position['abbr']) ?></td>
                                    <td><?= ($position['path']) ?></td>
                                    <td>
                                        <button class="btn btn-secondary btn-icon btn-sm btn-delete" data-value="<?= ($position['id']) ?>"><span class="fa fa-trash"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
                <?php echo $this->render('includes/console/pagination.htm',NULL,['data'=>$settings['positions'],'url'=>'/settings/positions']+get_defined_vars(),0); ?>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-2">
    </div>
</div>
<div class="modal fade" id="skillModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?= ($BASE) ?>/settings/positions">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New position</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required="required" />
                    </div>

                    <div class="form-group">
                        <label>Abbriviation</label>
                        <input type="text" name="abbr" class="form-control" required="required" />
                    </div>
                    <div class="form-group">
                        <label>Path</label>
                        <input type="text" name="path" class="form-control" required="required" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-closes" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-process">Save</button>
                </div>
            </div>    
        </form>
        
    </div>
</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        $("#s2-custom").select2({
            tags: true,
            createTag: function (params) {
                var term = $.trim(params.term);

                if (term === '') {
                    return null;
                }

                // term += "(new)";

                return {
                    id: term,
                    text: term,
                    newTag: true
                }
            }
        });
        $(".btn-process").on("click", function() {
            
            app._loading.show($(".modal-dialog"),{spinner: true});
            var form = $(this).closest('form');
            
            
            var url=$(form).attr('action');
            
            var values=$(form).serializeArray();
            console.log(values)
            // $(".alert-body").html(values);
            
            
            
            $.post(url, values, function(data, error){
                console.log(data, error);
                
                if(data.status){
                    $(".btn-closes").trigger( "click" );
                    window.location.reload();
                }else{
                    $(".btn-closes").trigger( "click" );
                    $(".alert-body").html(data.message);
                    $(".modal-trigger").trigger( "click" );
                }
            })
            setTimeout(function(){
                app._loading.hide($(".modal-dialog"));
            },2000);
            
        })
        $('.btn-delete').on('click', function(){
            if(confirm("Are you sure you want to delete this skill?")){
                app._loading.show($(".table-responsive"),{spinner: true});
                const values={
                    id: $(this).attr('data-value'),
                    action: 'SKILLS'
                }
                $.post("<?= ($BASE) ?>/jobs/misc-trash", values, function(data, error){
                    console.log(data, error);
                    
                    if(data.status){
                        $(".btn-closes").trigger( "click" );
                        window.location.reload();
                    }else{
                        $(".btn-closes").trigger( "click" );
                        $(".alert-body").html(data.message);
                        $(".modal-trigger")[0].click;
                    }
                    setTimeout(function(){
                        app._loading.hide($(".table-responsive"));
                    },2000);
                })
            }
        })
    });
    
</script>