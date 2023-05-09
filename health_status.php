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
  <h2>Health Status</h2>
  <br>
 <div class="table-responsive">
  <table class="table table-hover table-striped" id="table">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Photo</th>
        <th>cow No.</th>
        <th>Breed</th>
        <th>Gender</th>
        <th>Temperature</th>
        <th>Unit</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
       $all_cow = $db->query("SELECT * FROM cows ORDER BY id DESC");
       $fetch = $all_cow->fetchAll(PDO::FETCH_OBJ);
       foreach($fetch as $data){ 
          $get_breed = $db->query("SELECT * FROM breed WHERE id = '$data->breed_id'");
          $breed_result = $get_breed->fetchAll(PDO::FETCH_OBJ);
          foreach($breed_result as $breed){
        ?>
          <tr>
            <td><?php echo $data->id ?></td>
            <td>
              <img width="70" height="70" src="<?php echo $data->img; ?>" class="img img-responsive thumbnail">
            </td>
            <td><?php echo $data->cowno ?></td>
            <td><?php echo $breed->name ?></td>
            <td><?php echo $data->gender ?></td>
            <td><?php echo $data->Temperature ?></td>
            <td><?php echo '°C' ?></td>
            <?php
               $t ;
             if ( $data->Temperature <= "100") {
              $t="Healthy"
                     ;
              } else {
                $t="Sick";
              }
             ?>
             <td><?php echo $t ?></td>
            <td>
               <div class="dropdown">
                  <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i> Option
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    
                    <li><a onclick="return confirm('Continue delete cow ?')" href="delete.php?id=<?php echo $data->id ?>"><i class="fa fa-trash"></i> Delete</a></li>
                    <li><a onclick="return confirm('Continue quarantine cow ?')" href="quarantine.php?id=<?php echo $data->id; ?>"><i class="fa fa-paper-plane"></i> Quarantine cow</a></li>
                  </ul>
                </div> 
            </td>
          </tr>    
      <?php 
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