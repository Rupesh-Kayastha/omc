<?php
ini_set('display_errors',1);
include("connect.php");
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
$date = date('Y-m-d H:i:s');


if($_POST['user'])
{
    $tel='';
    foreach($_POST['user'] as $uk=>$uval)
    {
        $inscllist="INSERT INTO Message SET User='$uval', Message='$message',`OnDate`='$date'";
        $res=$cudb->query($inscllist) or die(mysqli_error());
        
        $sql="SELECT * FROM admin where `id`=$uval";
        $query=$cudb->query($sql) or die(mysql_error());
        $result=mysqli_fetch_object($query);
        $tel.=$result->phone.',';
    }
    
    
    
function curl($url)
{
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
 $data = curl_exec($ch);
 curl_close($ch);
 return $data;
}

$tel=trim($tel,',');
$mobile = $tel; //enter Mobile numbers comma seperated
$username = "krititech"; //your username
$password = "kriti@2705"; //your password
$sender = "KSALES"; //Your senderid
$username = urlencode($username);
$password = urlencode($password);
$sender = urlencode($sender);
$messagecontent = $message; //Type Of Your Message
$message = urlencode($messagecontent);
$url="http://smsodisha.in/sendsms?uname=$username&pwd=$password&senderid=$sender&to=$mobile&msg=$message&route=T";
$response = curl($url);
print_r($response);
}

   echo "<div class='alert alert-success fade in alert-dismissable'>
  <strong>Success!</strong> Message Sent sucessfully....
</div>";

}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sent Message</title>
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
              <h3 class="box-title">Add Message</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" data-parsley-validate="">
              <div class="box-body">
              <div class="form-group" style="width:100%; float:left;">
                User <br/>
                <select name="user[]" class="form-control" id="changecl" multiple required>
                    <?php
                $sql="SELECT * FROM admin where `username`!='admin'";
                $query=$cudb->query($sql) or die(mysql_error());
                $i=0;
                while($result=mysqli_fetch_object($query))
                    {
            ?> 
                <option  value="<?php echo $result->id;?>"><?php echo $result->username;?></option>
            <?php
            } ?>
				</select>
          
          <textarea name="message" class="form-control"  placeholder="Message"></textarea>

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


</body>
</html>

