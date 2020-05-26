<?php

include("connect.php");

$pas=$_GET["pas"];
$log=$_GET["log"];
$editcondid=$_GET["editcondid"];
include("logout_chk.php");
if($_COOKIE['adm'])
{
  $user=$_COOKIE["adm"];
}
else
{
  $user=$_SESSION["AdmID"];
}

if(isset($_REQUEST['submit']))

{

if(is_array($_REQUEST))

  {
    
    foreach($_REQUEST as $var=>$valu)
    {
      //print_r($valu);
      /****************grabs the $_POST variables and adds slashes**********************/
      $$var = addslashes($valu);
    }
  }
$p1=implode(',',$_REQUEST['priority1']);
$p2=implode(',',$_REQUEST['priority2']); 
$p3=implode(',',$_REQUEST['priority3']);
$view=implode(',',$_REQUEST['view']);
$edit=implode(',',$_REQUEST['edit']);
$status=implode(',',$_REQUEST['status']);
$date = date('Y-m-d');

if($editcondid)
{
  $c_type=$_POST['c_type'];
$condition_text=$_POST['condition'];
$timeline=$_POST['timeline'];
array_pop($timeline);
array_pop($condition_text);
for ($i=0; $i < count($condition_text); $i++ ) {
$condition_text_list = addslashes($condition_text[$i]);
$inscllist="UPDATE clerance_list SET cid='$cllist', pid='$pid', c_type='$c_type', condition_text='$condition_text_list', p1='$p1', p2='$p2', p3='$p3', view='$view', edit='$edit', `status`='$status' WHERE id=$editcondid";
    $res=$cudb->query($inscllist) or die(mysqli_error());
    echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Clearance Condition Details Edited sucessfully....
</div>";
}
    

}
else
{

$c_type=$_POST['c_type'];
$condition_text=$_POST['condition'];
array_pop($condition_text);
for ($i=0; $i < count($condition_text); $i++ ) {
$condition_text_list = $condition_text[$i];
//echo $timelinecount;
 $inscllist="INSERT INTO clerance_list SET cid='$cllist', pid='$pid', c_type='$c_type', condition_text='$condition_text_list', p1='$p1', p2='$p2', p3='$p3', view='$view', edit='$edit', `status`='$status'";
 $res=$cudb->query($inscllist);
 $lastconditionid=mysqli_insert_id($cudb);

   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Clearance Condition Details Added sucessfully....
</div>";
}
}
}
if($editcondid) {
$sqlpr="SELECT * FROM clerance_list WHERE id='$editcondid'";
$query=$cudb->query($sqlpr) or die(mysql_error());
$resultp= mysqli_fetch_object($query);

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skin-blue.css">
  <link rel="stylesheet" href="dist/css/parsley.css">
  <link rel="stylesheet" href="dist/css/multiple-select.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		
		<style> 

.thead{ width:100%; float:left; text-align:center; text-transform:uppercase;}
.tfx{ width:100%; float:left; height:300px; overflow:auto; font-size:14px;  text-align:center;}
.table-bordered {
    border: 1px solid #c1ceda;
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #c1ceda; text-align:center;
}
h3{margin-top:0px;}
thead.thbg {
    background: #2e4458;
    color: #fff;
    font-weight: normal;
    
}
.table-bordered>thead>tr>th {
    font-weight: normal;
}
.table {

 margin-bottom:0px; 
}
.alert.alert-success.fade.in.alert-dismissable {
    position: absolute;
    left: 278px;
    background: green;
}
select[multiple], select[size] {
    height: 379px;
}
.ms-parent.form-control-select {
    width: 100% !important;
}
</style>
		<link href="editor.css" type="text/css" rel="stylesheet"/>
</head>
<body class="hold-transition skin-blue sidebar-mini mnbg">
<div class="wrapper">

  <?php include_once('header.php')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once('sidebar.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>Clerance<a href="javascript:history.go(-1)" class="btn btn-primary" > Go Back</a></h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Clerance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       
       <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box main-cnt">
            <div class="box-header with-border">
              <h3 class="box-title">Add Clearance Conditions</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" data-parsley-validate="">
              <div class="box-body">
              <div class="form-group" style="width:100%; float:left;">

          <select name="pid" class="form-control" id="exampleInputEmail1" required>
          <option value="">Choose Project</option>
          <?php $sql="SELECT * FROM projects";
$query=$cudb->query($sql) or die(mysql_error());
          ?>

          <?php
     //loop through the page
     
       
        $i=0;
        while($result=mysqli_fetch_object($query))
            {
          
          $i=$i+1;
          
        ?> 
        <option <?php if($result->id==$resultp->pid) {  echo "selected"?><? } ?> value="<?php echo $result->id;?>"><?php echo $result->p_name;?></option>
        <?php } ?>
          </select>
              

               
                 
                   <select name="cllist" class="form-control" id="changecl" required>

                    <?php if($editcondid) { ?>

                    <option value="<?php echo $resultp->cid; ?>"> <?php echo GetName('clerance','c_name','id', $resultp->cid); ?></option>

                    <?php } else { ?>

                    <?php } ?>

                   
				  </select>
                
				<div class="form-group" style="width:100%; float:left;">
                  
            <label class="radio-inline"><input <?php if($resultp->c_type==general) {  echo "checked"?><? } ?> type="radio" name="c_type" id="c_type" value="general" required="">General</label>
            <label class="radio-inline"><input <?php if($resultp->c_type==special) {  echo "checked"?><? } ?> type="radio" name="c_type" id="c_type" value="special">Special</label>
            <lebel class="radio-inline"><input <?php if($resultp->c_type==additional) {  echo "checked"?><? } ?> type="radio" name="c_type" id="c_type" value="additional">Additional</label>
                </div>
			     
        <div class="form-group" style="width:100%; float:left;">

          <div id="type_container">
        <div class="form-group" id="edit-0" style="width:100%; float:left;">
            <textarea class="tinymce-enabled-message" name="condition[]" cols="80" id="description1"><?php echo $resultp->condition_text; ?></textarea>
            
            
        </div>
      </div>
    </div>
          
    <div class="form-group" style="width:100%; float:left;">
    <div id="type-container" class="hide">
      <div class="form-group type-row" id="" style="width:100%; float:left;">
          <textarea class="tinymce-enabled-message-new" name="condition[]" cols="80"  id="" ></textarea>
          
<a class="btn btn-danger remove-type pull-right" targetDiv="" data-id="0" href="javascript: void(0)" style="margin:10px; margin-right:0px;"><i class="fa fa-trash"></i></a><br>


      </div>
      
    </div> 
    </div>  

  
				<div class="form-group" style="width:100%; float:left;">
           <?php if ($editcondid)  { ?> 
                  
                  <?php } else {  ?>
                  
                  <div class="row text-center"><a class="add-type btn btn-primary text-center" href="javascript: void(0)" tiitle="Click to add more"><i class="fa fa-plus"></i> Add More Conditions and Timeline</a>
      </div>

      <?php } ?>
                </div>

                 
<div class="col-md-4">
  <div class="form-group">
   <label>Notification Priority One</label>
<select name="priority1[]" class="form-control-select" id="priority1" multiple required>
                    <?php
                $alluserp1=explode(',',$resultp->p1);
                $sql="SELECT * FROM admin";
                $query=$cudb->query($sql) or die(mysql_error());
                $i=0;
                while($result=mysqli_fetch_object($query))
                    {
            ?> 
                <option <?php if(in_array($result->id,$alluserp1)) {  echo "selected"?><? } ?> value="<?php echo $result->id;?>"><?php echo $result->username;?></option>
            <?php
            } ?>
        </select>
      </div>

</div>
<div class="col-md-4">
 <div class="form-group">
   <label>Notification Priority Two</label>
<select name="priority2[]" class="form-control-select" id="priority2" multiple required>
                    <?php
                $alluserp2=explode(',',$resultp->p2);
                $sql="SELECT * FROM admin";
                $query=$cudb->query($sql) or die(mysql_error());
                $i=0;
                while($result=mysqli_fetch_object($query))
                    {
                      $userlist=$result->p2;
            ?> 
                <option <?php if(in_array($result->id,$alluserp2)) {  echo "selected"?><? } ?> value="<?php echo $result->id;?>"><?php echo $result->username;?></option>
            <?php
            } ?>
        </select>
      </div>

</div>
<div class="col-md-4">
<div class="form-group">
   <label>Notification Priority Three</label>
<select name="priority3[]" class="form-control-select" id="priority3" multiple required>
                    <?php
                $alluserp3=explode(',',$resultp->p3);
                $sql="SELECT * FROM admin";
                $query=$cudb->query($sql) or die(mysql_error());
                $i=0;
                while($result=mysqli_fetch_object($query))
                    {
            ?> 
                <option <?php if(in_array($result->id,$alluserp3)) {  echo "selected"?><? } ?> value="<?php echo $result->id;?>"><?php echo $result->username;?></option>
            <?php
            } ?>
        </select>
      </div>
</div>



<div class="col-md-4">
  <div class="form-group">
   <label>View</label>
<select name="view[]" class="form-control-select" id="view" multiple required>
                    <?php
                $alluserview=explode(',',$resultp->view);
                $sql="SELECT * FROM admin";
                $query=$cudb->query($sql) or die(mysql_error());
                $i=0;
                while($result=mysqli_fetch_object($query))
                    {
            ?> 
                <option <?php if(in_array($result->id,$alluserview)) {  echo "selected"?><? } ?> value="<?php echo $result->id;?>"><?php echo $result->username;?></option>
            <?php
            } ?>
        </select>
      </div>

</div>
<div class="col-md-4">
 <div class="form-group">
   <label>Edit</label>
<select name="edit[]" class="form-control-select" id="edit" multiple required>
                    <?php
                $alluseredit=explode(',',$resultp->edit);
                $sql="SELECT * FROM admin";
                $query=$cudb->query($sql) or die(mysql_error());
                $i=0;
                while($result=mysqli_fetch_object($query))
                    {
                      $userlist=$result->p2;
            ?> 
                <option <?php if(in_array($result->id,$alluseredit)) {  echo "selected"?><? } ?> value="<?php echo $result->id;?>"><?php echo $result->username;?></option>
            <?php
            } ?>
        </select>
      </div>

</div>
<div class="col-md-4">
<div class="form-group">
   <label>Change Status</label>
<select name="status[]" class="form-control-select" id="status" multiple required>
                    <?php
                $alluserstatus=explode(',',$resultp->status);
                $sql="SELECT * FROM admin";
                $query=$cudb->query($sql) or die(mysql_error());
                $i=0;
                while($result=mysqli_fetch_object($query))
                    {
            ?> 
                <option <?php if(in_array($result->id,$alluserstatus)) {  echo "selected"?><? } ?> value="<?php echo $result->id;?>"><?php echo $result->username;?></option>
            <?php
            } ?>
        </select>
      </div>
</div>
           
         
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
               <button tabindex="10" type="submit" name="submit" class="btn btn-primary"><?php if($clid) { ?><?php echo "Edit" ?> <?php } else { ?> <?php echo "Submit"; ?> <?php } ?></button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    Copyright &copy; 2018 <a href="#" style="color:#fff ;text-shadow:1px 1px 1px #333;">Odishagovt</a>. All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/parsley.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript"> 
/*$(document).ready(function() {
var max_fields = 20; //maximum input boxes allowed
var wrapper = $("#items"); //Fields wrapper
var add_button = $("#add-more"); //Add button ID
 
var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
   
e.preventDefault();

if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div class="form-group">' +
'<textarea class="form-control editor" name="condition[]" id="tintu" placeholder="Enter Name Of Conditions"></textarea>' +
'<a href="#" class="remove_field"><i class="fa fa-times"></a></div>'); 

}

});
tinyMCE.execCommand('mceAddControl', false, 'tintu');
$(wrapper).on("click",".remove_field", function(e){ //user click on remove field
e.preventDefault(); $(this).parent('div').remove(); x--;
});
}); */
</script>
<script>
$( "select[name='pid']" ).change(function () {
    var pjid = $(this).val();

    if(pjid) {

        $.ajax({
            url: "ajaxpro.php",
            dataType: 'Json',
            data: {'id':pjid},
            success: function(data) {

                $("select#changecl").empty();
                $.each(data, function(key, value) {
                    $("select#changecl").append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });


    }else{
        $("select#changecl").empty();
    }
});
</script>
<script type="text/javascript">
  $(document ).ready(function() {
    function applyMCE() {
      tinyMCE.init({
        mode : "textareas",
        editor_selector : "tinymce-enabled-message", 
        theme: 'modern',
  plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools  contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
    
      });        
    }
    function AddRemoveTinyMce(editorId) {
      if(tinyMCE.get(editorId)) 
      {
        tinyMCE.EditorManager.execCommand('mceFocus', false, editorId);                    
        tinyMCE.EditorManager.execCommand('mceRemoveEditor', true, editorId);

      } else {
        tinymce.EditorManager.execCommand('mceAddEditor', false, editorId);       
      }
    }
    applyMCE();
    $('a.toggle-tinymce').die('click').live('click', function(e) {
      AddRemoveTinyMce('description1');
      var lbl = $(this).text() == 'Off' ? 'On' : 'Off';
      $(this).text(lbl);
    });
    $('a.add-type').die('click').live('click', function(e) {
      e.preventDefault(); 
      var content = jQuery('#type-container .type-row'),
      element = null;
      for(var i = 0; i<1; i++){
        element = content.clone();
        var divId = 'id_'+jQuery.now();
        element.attr('id', divId);
        element.find('.remove-type').attr('targetDiv', divId);
        element.find('.tinymce-enabled-message-new').attr('id', 'txt_'+divId);
        element.appendTo('#type_container');
        AddRemoveTinyMce('txt_'+divId);

      }
    });

    jQuery(".remove-type").die('click').live('click', function (e) {
      var didConfirm = confirm("Are you sure You want to delete");
      if (didConfirm == true) {
        var id = jQuery(this).attr('data-id');
        var targetDiv = jQuery(this).attr('targetDiv');
        jQuery('#' + targetDiv).remove();
      // }
      return true;
      } else {
        return false;
      }
    });
  });
</script>
<script src="dist/js/parsley.js"></script>
<script src="dist/js/multiple-select.js"></script>
<script>
        $('#priority1,#priority2,#priority3,#view,#edit,#status').multipleSelect();
    </script>

</body>
</html>
