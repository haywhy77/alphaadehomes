<?php 
include("header.php");

?> 
<!-- PAGE CONTENT WRAPPER -->
<div class="page__content" id="page-content">
<!-- PAGE CONTENT CONTAINER -->
<div class="content" id="content">
<!-- PAGE HEADING -->
<div class="page-heading">
<div class="page-heading__container">
<h1 class="title">Dashboard</h1>
<p class="caption">WELCOME TO KNOWDEMWELL - MY ACCOUNT</p>
</div>


<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">KnowDemWell</a></li>
<li class="breadcrumb-item active">Dashboard</li>
</ol>
</nav>
</div>
<!-- //END PAGE HEADING -->

<div class="card">
<div class="widget invert widget--items-middle">
<div class="widget__icon_layer widget__icon_layer--right">
<span class="li-database-upload"></span>
</div>
<div class="widget__container">
<div class="widget__line">
<div class="widget__icon">
<span class="li-database-upload"></span></div>
<div class="widget__title">Contact Management</div>
<div class="widget__subtitle">Notification from all Contact Forms</div>
</div>
<div class="widget__box">
<button class="btn btn-outline-secondary btn-sm">Refresh</button>
</div>
</div>
</div>



<div class="card-body">
<div class="table-responsive">


  <table id="dt-example-colections" class="table  table-indent-rows" cellspacing="0" width="100%">
    <thead>
      <tr class="thead-dark" align="center">
        <th>S/N</th>
        <th width="15%">Sender Name</th>
        <th width="15%">Email</th>
        <th width="20%">Subject</th> 
        <th width="30%">Message</th> 
        <th width="10%">Date Sent</th>
        <th>Action</th>
        
      </tr>
    </thead>
        
    <tbody class="table-hover">


 <?php   
   
$INTER = 0;
$result = $conn->query("SELECT * FROM contact_kdm order by id desc");
if($result->num_rows > 0)
{ 
    while($row = $result->fetch_assoc()) 
  {  
    $INTER++;
        echo '<tr align="center"><td>';
        echo $INTER;
      echo '</td><td>';
        echo $row['fullname']; 
      echo '</td><td>';
      echo $row['email']; 
      echo '</td><td>';
      echo $row['subject']; 
      echo '</td><td>';
      echo $row['message'];  
      echo '</td><td>'; 
      echo $row['date_uploaded']; 
       
      echo '<td><a href="delete_contact.php?mixhtyr12noitcudorpobguhtennek007='.$row['id'].'" class="btn btn-danger btn-block" >Delete</a></td></tr>';
  }
}
else { $msg = 'There are no messages at the moment'; }
?>
  

        </tbody>
      </table>
<?php echo '<h4 style="color:red;">'.$msg.'</h4>'; ?>
 <script type="text/javascript">
 document.addEventListener("DOMContentLoaded", function () {
             app._loading.show($("#dt-ext-colections"),{spinner: true});
                 $("#dt-example-colections").DataTable({
                      dom: "Bfrtip",
                      buttons: [{
                            extend: 'collection',
                            text: 'Export',                                                
                            buttons: ["copy", "csv", "excel", "pdf", "print"]
                               }],
                           "initComplete": function(settings, json) {
                            setTimeout(function(){
                                 app._loading.hide($("#dt-ext-colections"));
                             },1000);
                               }
                               });
                       });</script>

  </div></div></div></div>


  <!-- //END PAGE CONTENT CONTAINER -->
  </div>
  <!-- //END PAGE CONTENT -->
  </div>
  <!-- //END PAGE WRAPPER -->
 

  <!-- IMPORTANT SCRIPTS -->
  <script type="text/javascript" src="js/vendors/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="js/vendors/jquery/jquery-migrate.min.js"></script>
  <script type="text/javascript" src="js/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- END IMPORTANT SCRIPTS -->

  <!-- THIS PAGE SCRIPTS ONLY -->
  <script type="text/javascript" src="js/vendors/datatables/datatables.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/dataTables.buttons.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.flash.min.js"></script><script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script><script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.html5.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.print.min.js"></script><script type="text/javascript" src="js/vendors/datatables/extensions/buttons.colVis.min.js"></script>
  <!-- //END THIS PAGE SCRIPTS ONLY -->

  <!-- TEMPLATE SCRIPTS -->
  <script type="text/javascript" src="js/app.js"></script>
  <script type="text/javascript" src="js/plugins.js"></script>
  <script type="text/javascript" src="js/demo.js"></script>
  <script type="text/javascript" src="js/settings.js"></script>
  <!-- END TEMPLATE SCRIPTS -->
</body>

</html>

<?php include('footer.php'); ?>