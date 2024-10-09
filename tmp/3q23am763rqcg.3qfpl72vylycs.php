<div class="row"></div>
    <div class="col-12 col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List of all admin users</h4>
                <p class="card-title-desc"></p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th width="100">SN</th>
                                <th>Name</th>
                                <th>Privileges</th>
                                <th >Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-hover">
                            <?php $count=0; foreach (($roles['data']?:[]) as $key=>$role): $count++; ?>
                                <tr scope="row">
                                    <td><?= ($count) ?></td>
                                    <td>
                                        <strong><?= ($role['name']) ?></strong>
                                    </td>
                                    <td><?= (!is_null($role['privileges']) && $role['privileges'] !='null'?str_replace("'", "", implode(', ', (array_keys(json_decode($role['privileges'], true))))):'No privilege set') ?></td>
                                    <td><?= ($role['created_at']) ?></td>
                                    
                                    <td>
                                        <a class="btn btn-secondary btn-sm" href="<?= ($BASE) ?>/console/access/roles/<?= ($role['id']) ?>/edit">Edit</a>
                                        <button class="btn btn-danger btn-sm btn-icon delete" data-client="<?= ($role['id']) ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" data-text="Are you sure you want to trash this admin users account?" data-todo="DELETED"><span class="fa fa-trash"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <?php echo $this->render('includes/console/pagination.htm',NULL,['data'=>$roles,'url'=>'/console/access/roles']+get_defined_vars(),0); ?>
    </div>
</div>
