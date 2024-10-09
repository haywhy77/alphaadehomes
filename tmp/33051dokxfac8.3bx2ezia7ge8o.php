<div class="row">
    <div class="col-12 col-lg-12">

        
        <div class="card">
            <div class="widget invert widget--items-middle">
                <div class="widget__icon_layer widget__icon_layer--right">
                    <span class="li-user"></span>
                </div>
                <div class="widget__container">
                    <div class="widget__line">
                        <div class="widget__icon">
                            <span class="li-user"></span>
                        </div>
                        <div class="widget__title">Applicant Hunts</div>
                        <div class="widget__subtitle">Applicant scouts by employers</div>
                    </div>
                    <div class="widget__box">
                        
                    </div>
                    
                </div>
            </div>
            <div class="card-body">
                
                
                <div class="table-responsive">
                    <table class="table table-indent-rows margin-bottom-0 data-staff">
                        <thead>
                            <tr>
                                <th width="100"><label class="form-check-label">#</label></th>
                                <th width="200">Date</th>
                                <th>Email</th>
                                
                                <th >Name</th>
                                <th >Remark</th>
                                <th width="150">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=0; foreach (($messages['data']?:[]) as $key=>$message): $count++; ?>
                                <tr>
                                    <td><?= ($count) ?></td>
                                    <td><?= ($hunt['created_at']) ?></td>
                                    <td><a href="<?= ($BASE) ?>/employers/<?= ($message['id']) ?>" class="text-danger text-bold"><?= ($message['email']) ?></a></td>
                                    
                                    <td><?= ($message['name']) ?></td>
                                    <td><?= ($message['remark']) ?></td>    
                                    <td>
                                        
                                    </td>
                                    
                                    <td>
                                        <button class="btn btn-secondary btn-icon btn-sm delete" data-client="<?= ($message['id']) ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" data-text="Are you sure you want to delete this message?" data-todo="DELETE"><span class="fa fa-trash"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
                <?php echo $this->render('includes/console/pagination.htm',NULL,['data'=>$messages,'url'=>'/messaging/hunts']+get_defined_vars(),0); ?>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= ($BASE) ?>/messaging/update/hunts" method="post">
            <input class="hunt_id" type="hidden" name="hunt_id"/>
            <input class="hunt_action" type="hidden" name="hunt_action"/>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning!!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body alert-body-text"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-process">Yes, continue</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        
        $(".data-staff > tbody > tr >td>button.delete").on("click", function() { 
            var value = $(this).attr("data-client");
            var text = $(this).attr("data-text");
            var action = $(this).attr("data-todo");
            $('.alert-body-text').html(text);
            // $('.alert-body-text').closest("form").attr('action', action);
            $(".hunt_id").val(value);
            $(".hunt_action").val(action)
        })

        $(".btn-process").on("click", function(){
            app._loading.show($(".modal-dialog"),{spinner: true});
            var form=$(this).closest("form");
            var url=form.attr("action");
            
            $.post(url, form.serializeArray(), function(data, error){
                
                if(!data.status){
                    $(".alert-header").removeClass(" alert alert-success").addClass(" alert alert-danger");
                }else{
                    $(".alert-header").removeClass(" alert alert-danger").addClass(" alert alert-success");
                }
                $(".alert-header-text").html(data.message)
            
                setTimeout(function(){
                    app._loading.hide($(".modal-dialog"));
                },2000);
                setTimeout(function(){
                    $(".btn-closes").trigger( "click" );
                    window.location.reload();
                }, 200)
                
            });
            
        })
    });
    
</script>