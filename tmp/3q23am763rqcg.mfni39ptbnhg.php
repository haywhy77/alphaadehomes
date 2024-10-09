<div class="row">
    <div class="col-12 col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List of all admin users</h4>
                <p class="card-title-desc"></p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th width="100"></th>
                                <th>Name</th>
                                <th >Email</th>
                                <th >Role</th>
                                <th width="100">Verified</th>
                                <th width="100">Is Default Password</th>
                                <th width="100">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-hover">
                            <?php $count=0; foreach (($staff['data']?:[]) as $key=>$company): $count++; ?>
                                <tr scope="row">
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label"><?= ($count) ?></label>
                                        </div>
                                    </td>
                                    <td>
                                        <strong><?= ($company['names']) ?></strong>
                                    </td>
                                    <td><?= ($company['email']) ?></td>
                                    <td><?= ($company['role']) ?></td>
                                    <td>
                                        <div class="btn <?= ($company['isVerify']=='1'?'btn-outline-success':'btn-outline-danger') ?> btn-block disabled btn-sm"><?= ($company['isVerify']==1?'YES':'NO') ?></div>
                                    </td>
                                    <td>
                                        <div class="btn <?= ($company['isDefault']=='1'?'btn-outline-success':'btn-outline-danger') ?> btn-block disabled btn-sm"><?= ($company['isDefault']==1?'YES':'NO') ?></div>
                                    </td>
                                    <td>
                                        <div class="btn <?= ($company['status']=='ACTIVE'?'btn-outline-success':'btn-outline-danger') ?> btn-block disabled btn-sm"><?= ($company['status']) ?></div>
                                    </td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm <?= ($company['status']=='DEACTIVATED'?'disabled':'') ?>">Reset</button>

                                        <?php if ($company['status']=='ACTIVE'): ?>
                                            
                                                <button class="btn btn-danger btn-sm btn-icon delete" data-client="<?= ($company['id']) ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" data-text="Are you sure you want to deactivate this admin users account?" data-todo="DEACTIVATED">Deactivate</button>
                                            
                                        <?php endif; ?>
                                        <?php if ($company['status']=='DEACTIVATED'): ?>
                                            
                                                <button class="btn btn-danger btn-sm btn-icon delete" data-client="<?= ($company['id']) ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" data-text="Are you sure you want to ACTIVATE this admin users account?" data-todo="ACTIVE">Activate</button>
                                            
                                        <?php endif; ?>


                                        <button class="btn btn-danger btn-sm btn-icon delete" data-client="<?= ($company['id']) ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" data-text="Are you sure you want to trash this admin users account?" data-todo="DELETED"><span class="fa fa-trash"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <?php echo $this->render('includes/console/pagination.htm',NULL,['data'=>$staff,'url'=>'/staff']+get_defined_vars(),0); ?>
    </div>
</div>