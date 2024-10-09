<div class="row"></div>
    <div class="col-12 col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List of all properties</h4>
                <p class="card-title-desc"></p>    
                
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th width="50"></th>
                                <th>Date</th>
                                <th width="100">Status</th>
                                <th>Property</th>
                                <th>Name</th>
                                <th>Email</th>
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-hover">
                            <?php $count=0; foreach (($bookings['data']?:[]) as $key=>$company): $count++; ?>
                                <tr scope="row">
                                    <td><?= ($count) ?></td>
                                    <td><?= ($company['created_at']) ?></td>
                                    <td>
                                        <div class="btn <?= ($company['status']=='confirmed'?'btn-outline-success':($company['status']=='cancelled'?'btn-outline-danger':'btn-outline-warning')) ?> btn-block disabled btn-sm"><?= ($company['status']) ?></div>
                                    </td>
                                    <td><?= ($company['title']) ?></td>
                                    <td><?= ($company['name']) ?></td>
                                    <td><?= ($company['email']) ?></td>
                                    
                                   
                                    <td>
                                        <button class="btn btn-secondary btn-sm btn-click " data-url="<?= ($BASE) ?>/console/bookings/<?= ($company['id']) ?>">View</button>
                                        <button class="btn btn-danger btn-sm btn-icon btn-delete" data-url="<?= ($BASE) ?>/console/bookings/<?= ($company['id']) ?>/track/delete" data-text="Are you sure you want to trash this booking request?" data-todo="DELETED"><span class="fa fa-trash"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <?php echo $this->render('includes/console/pagination.htm',NULL,['data'=>$bookings,'url'=>'/console/bookings']+get_defined_vars(),0); ?>
    </div>
</div>


<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        $('.btn-click').on('click', function(e){
            var $url =$(this).data('url');
            window.location.href=$url;
        })

        $('.btn-delete').on('click', function () {
            var $url =$(this).data('url');
            var text=$(this).data('text');
            if(confirm(text)){
                window.location.href=$url;
            }
            
        });
    })
</script>