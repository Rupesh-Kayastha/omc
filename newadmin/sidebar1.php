 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo GetName('admin','username','id',$_SESSION["UsrID"]); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
		<div class="pull-right lgout"> <a href="logout.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> </a> </div>
		
		<div class="pull-right sn"> <a href="javascript:history.go(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a> </div>
		
      </div>
      
      <ul class="sidebar-menu" data-widget="tree">
      
        <li >
         <a href="userhome.php">
            <i class="fa fa-dashboard"></i> <span> Dashboard </a></span>
        </li>
        <li>
         <a href="changepwd.php">
            <i class="fa fa-dashboard"></i><span>Change Password</a></span>
        </li>
        <li>
         <a href="allnotification.php">
            <i class="fa fa-dashboard"></i><span>All Notification</a></span>
        </li>
 </ul>
   
			
		 
    </section>
	 
    <!-- /.sidebar -->
<div class="ftr">
Copyright &copy; 2018  All rights
    reserved.
 </div>
  </aside>
   <style> 
 
a.mmr {
    padding: 7px;
    background: #44c50f;
	color:#fff;
    border-radius: 3px;
    position: absolute; bottom:10px; 
}
marquee {
    font-size: 10px;
}
a.mdetails {

    color: #333 !important;
}

.lgout i.fa.fa-sign-out {
    font-size: 25px;
    color: #fd1402; margin-left:10px;
}












 </style>