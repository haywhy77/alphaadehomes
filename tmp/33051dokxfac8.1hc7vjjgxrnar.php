<div class="row">
    <div class="col-12 col-lg-12">

        
        <div class="card">
            <div class="widget invert widget--items-middle">
                <div class="widget__icon_layer widget__icon_layer--right">
                    <span class="li-folder-user"></span>
                </div>
                <div class="widget__container">
                    <div class="widget__line">
                        <div class="widget__icon">
                            <span class="li-folder-user"></span>
                        </div>
                        <div class="widget__title">Registered Applicants</div>
                        <div class="widget__subtitle">Summary information about employer</div>
                    </div>
                    <!-- <div class="widget__box">
                        <button class="btn btn-secondary btn-lg btn-click" data-href="<?= ($BASE) ?>/candidates/new">Add Employer</button>
                    </div> -->
                </div>
            </div>
            <div class="card-body">
                <?php echo $this->render('includes/filter.html',NULL,['status'=>'ACTIVE DEACTIVATED CANCELLED']+get_defined_vars(),0); ?>
                
                <div class="table-responsive">
                    <table class="table table-indent-rows margin-bottom-0">
                        <thead>
                            <tr>
                                <th width="100">
                                    <div class="form-check">
                                        <label class="form-check-label">#</label>
                                    </div>
                                </th>
                                <th>Type</th>
                                <th>Name</th>
                                <th width="50">Gender</th>
                                <th >State</th>
                                <th >LGA</th>
                                <th >Political party</th>
                                <th>Position</th>
                                <th width="50">Religion</th>
                                <th width="150">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=0; foreach (($candidates['data']?:[]) as $key=>$cand): $count++; ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label"><?= ($count) ?></label>
                                        </div>
                                    </td>
                                    <td><?= ($cand['type']) ?></td>
                                    <td>
                                        <strong><a href="<?= ($BASE) ?>/<?= ($param) ?>/<?= ($cand['id']) ?>/detail"><?= ($cand['name']) ?></a></strong>
                                    </td>
                                    <td><?= ($cand['gender']) ?></td>
                                    <td><?= ($cand['state']) ?></td>
                                    <td><?= ($cand['lga']) ?></td>
                                    <td><?= ($cand['party']) ?></td>
                                    <td><?= ($cand['position']) ?></td>
                                    <td><?= ($cand['religion']) ?></td>
                                    <td>
                                        <div class="btn btn-outline-success btn-block disabled btn-sm">Delete</div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
                <?php echo $this->render('includes/console/pagination.htm',NULL,['data'=>$candidates,'url'=>'/candidates']+get_defined_vars(),0); ?>
            </div>
        </div>

    </div>
</div>