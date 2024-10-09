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
                                <th width="130">Rating</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th >Title</th>
                                <th>Price</th>
                                <th>Location</th>
                                <th>State</th>
                                <th width="100">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-hover">
                            <?php $count=0; foreach (($properties['data']?:[]) as $key=>$company): $count++; ?>
                                <?php $rating=explode(':',$company['ratings'])[0]>=20; ?>
                                <tr scope="row">
                                    <td><?= ($count) ?></td>
                                    <td>
                                        <div class="rating-wrapper">
                                            <div class="star-wrapper" style="font-size: .9rem;">
                                                <i class="fa fa-regular fa-star <?= ($rating>0 && $rating<=20?'fa-solid yellow':'') ?>"></i>
                                                <i class="fa fa-regular fa-star <?= (@$rating>20 && $rating<=40?'fa-solid yellow':'') ?>"></i>
                                                <i class="fa fa-regular fa-star <?= (@$rating>40 && $rating<=60?'fa-solid yellow':'') ?>"></i>
                                                <i class="fa fa-regular fa-star <?= (@$rating>60 && $rating<=80?'fa-solid yellow':'') ?>"></i>
                                                <i class="fa fa-regular fa-star <?= (@$rating>80?'fa-solid yellow':'') ?>"></i>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <td>
                                        <?= ($company['category'])."
" ?>
                                    </td>
                                    <td>
                                        <?= ($company['type'])."
" ?>
                                    </td>
                                    <td>
                                        <?= ($company['title'])."
" ?>
                                    </td>
                                    <td><?= ($company['price']) ?></td>
                                    <td>
                                        <?= ($company['city']) ?>, <?= ($company['address']) ?>, <?= ($company['state'])."
" ?>
                                    </td>
                                    <td>
                                        <?= (ucfirst($company['availability']))."
" ?>
                                    </td>
                                    <td>
                                        <div class="btn <?= ($company['status']=='publish'?'btn-outline-success':'btn-outline-warning') ?> btn-block disabled btn-sm"><?= ($company['status']) ?></div>
                                    </td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm btn-navigate" data-url="<?= ($BASE) ?>/console/properties/<?= ($company['id']) ?>">View</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <?php echo $this->render('includes/console/pagination.htm',NULL,['data'=>$properties,'url'=>'/console/properties']+get_defined_vars(),0); ?>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        $('.btn-navigate').on('click', function(e){
            var $url =$(this).attr('data-url');
            window.location.href=$url;
        })

        $('#rating').on('change', function () {
            alert('Rating: ' + $(this).val());
        });
    })
</script>