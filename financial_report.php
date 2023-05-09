<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { 
 ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Cow Management</b></h5>
  </header>
 <?php include 'inc/data.php'; ?>
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
  <h2>Financial Report</h2>
  <br>
  <div style="margin-bottom: 10px !important; margin-left: 85% !important;">
    <a href="add_month_report.php" class="btn btn-success">Add Month</a>
  </div>
 <div class="table-responsive">
  <table class="table table-hover table-striped" id="table">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Month</th>
        <th>Budget</th>
        <th>Cattle food</th>
        <th>Cattle medicines</th>
        <th>Plants</th>
        <th>Cattle bought</th>
        <th>Cattle sale</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
       $all_cow = $db->query("SELECT * FROM financial_report ORDER BY id DESC");
       $fetch = $all_cow->fetchAll(PDO::FETCH_OBJ);
       if(!empty($fetch)){
        $count = 1;
       foreach($fetch as $data){ 
        ?>
          <tr>
            <td><?php echo $count ?></td>
            <td><?php echo $data->month ?></td>
            <td><?php echo $data->budget ?></td>
            <td><?php echo $data->cattle_food ?></td>
            <td><?php echo $data->cattle_medicine ?></td>
            <td><?php echo $data->plants ?></td>
            <td><?php echo $data->cattle_bought ?></td>
            <td><?php echo $data->cattle_sale ?></td>
            <td>
               <div class="dropdown">
                  <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i> Option
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="edit_financial_report.php?id=<?php echo $data->id ?>"><i class="fa fa-edit"></i> Edit</a></li>
                    <li><a href="delete_financial_report.php?id=<?php echo $data->id ?>"><i class="fa fa-trash"></i> Delete</a></li>
                  </ul>
                </div> 
            </td>
          </tr>    
      <?php 

          $count++;
       }
      }
      ?>
    </tbody>
  </table>
 </div>
 </div>
</div>


</div>
<script type="text/javascript">
  $(document).ready(function(){
       $('#datatable').DataTable();
   });
</script>

<?php 
  }
  else
  {
    header("Location: index.php");
     exit();
  }
  include 'theme/foot.php'; ?>