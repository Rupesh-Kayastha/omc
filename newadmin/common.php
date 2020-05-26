<!-- Info boxes -->
<div class="row">
<?php 
    $sql="SELECT * FROM projects";
$query=$cudb->query($sql) or die(mysql_error());
?>

<?php
     //loop through the page
     
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?>  
      <?php if($i==1) {  ?>
<div classs="col-md-12" style="padding:15px;">
      <?php } ?>
      
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="projectdtls.php?pid=<?php echo $result->id; ?>">
          <div class="info-box">
            <span class="info-box-icon <?php if($i==1) { ?>bg-aqua<?php } ?><?php if($i==2) { ?>bg-red<?php } ?><?php if($i==3) { ?>bg-green<?php } ?> <?php if($i==4) { ?>bg-yellow<?php } ?><?php if($i==5) { ?>bg-aqua<?php } ?><?php if($i==6) { ?>bg-red<?php } ?><?php if($i==7) { ?>bg-green<?php } ?> <?php if($i==8) { ?>bg-yellow<?php } ?>"><i class="fa fa-tasks" style="font-size:20px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $result->p_name; ?></span>
              <span class="info-box-number"><small><span style="color:#009900;"><?php echo $result->location; ?></span></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
</div>
          
        <?php if($i==4) {  ?>
</div>
      <?php } ?>
      <?php if($i==4) {  ?>
<div classs="col-md-12" style="padding:15px;">
      <?php } ?>

       <?php if($i==8) {  ?>
</div>
      <?php } ?>

      <?php if($i==8) {  ?>
<div classs="col-md-12" style="padding:15px;">
      <?php } ?>

         <?php if($i==12) {  ?>
</div>
      <?php } ?>

      
        <?php $i+1;} ?>
      </div>


      <!-- /.row -->


