<div class="row">
    <div class="col-12 col-lg-12">


        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Registered users</h4>
                <p class="card-title-desc"></p>    
                <div class="table-responsive">
                    <table class="table table-indent-rows margin-bottom-0 data-staff">
                        <thead>
                            <tr>
                                <th width="100"></th>
                                <th>Date</th>
                                <th>Name</th>
                                <th >Email</th>
                                <th width="200">Is Verified?</th>
                                <th width="150">Status</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=0; foreach (($users['data']?:[]) as $key=>$company): $count++; ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label"><?= ($count) ?></label>
                                        </div>
                                    </td>
                                    <td><?= ($company['created_at']) ?></td>
                                    <td>
                                        <strong><?= ($company['names']) ?></strong>
                                    </td>
                                    <td><?= ($company['email']) ?></td>
                                    <td>
                                        <div class="btn <?= ($company['isVerify']==1?'btn-outline-success':'btn-outline-danger') ?> btn-block disabled btn-sm"><?= ($company['isVerify']==1?'VERIFIED':'UNVERIFIED') ?></div>
                                    </td>
                                    <td>
                                        <div class="btn <?= ($company['status']=='ACTIVE'?'btn-outline-success':'btn-outline-danger') ?> btn-block disabled btn-sm"><?= ($company['status']) ?></div>
                                    </td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm <?= ($company['status']=='DEACTIVATED'?'disabled':'') ?>">Reset</button>

                                        <?php if ($company['status']=='ACTIVE'): ?>
                                            
                                                <button class="btn btn-danger btn-sm btn-icon delete" data-client="<?= ($company['id']) ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" data-text="Are you sure you want to deactivate this admin users account?" data-todo="DEACTIVATED"><span class="fa fa-close"></span></button>
                                            
                                        <?php endif; ?>
                                        <?php if ($company['status']=='DEACTIVATED'): ?>
                                            
                                                <button class="btn btn-danger btn-sm btn-icon delete" data-client="<?= ($company['id']) ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" data-text="Are you sure you want to ACTIVATE this admin users account?" data-todo="ACTIVE"><span class="fa fa-check"></span></button>
                                            
                                        <?php endif; ?>


                                        <button class="btn btn-danger btn-sm btn-icon delete" data-client="<?= ($company['id']) ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" data-text="Are you sure you want to trash this admin users account?" data-todo="DELETED"><span class="fa fa-trash"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
                <?php echo $this->render('includes/console/pagination.htm',NULL,['data'=>$users,'url'=>'/access/users']+get_defined_vars(),0); ?>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="inviteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= ($BASE) ?>/access/users/new" method="post">
            <div class="modal-content">
                <div class="modal-header alert-header">
                    <h5 class="modal-title alert-header-text" id="exampleModalLabel">Admin Invitation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required="required">
                        <span class="form-text margin-top-0">Enter the official name</span>
                        
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required="required">
                        <span class="form-text margin-top-0">Enter the email</span>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-closes" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-process">Send Invite</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= ($BASE) ?>/access/users/update" method="post">
            <input class="client_user_id" type="hidden" name="client_user_id"/>
            <input class="client_action" type="hidden" name="client_action"/>
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
            $(".client_user_id").val(value);
            $(".client_action").val(action)
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