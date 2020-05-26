 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo GetName('admin','username','id',$_SESSION["AdmID"]); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		  
		  
        </div>
		
		<div class="pull-right lgout"> <a href="logout.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> </a> </div>
		
		<div class="pull-right sn"> <a href="javascript:history.go(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a> </div>
		
      </div>
      <!-- search form -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
        <li >
         <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>  Dashboard </a> </span>  
            
         
         
        </li>

        <li class="treeview">
          <a href="#">
           <i class="fa fa-tasks"></i>
            <span>Project</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addproject.php"><i class="fa fa-circle-o"></i> Add Project</a></li>
            <li><a href="viewproject.php"><i class="fa fa-circle-o"></i> View Project</a></li>
            
          </ul>
        </li>
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-tags"></i>
            <span>Clearance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addcl.php"><i class="fa fa-circle-o"></i> Add Clearance</a></li>
            <li><a href="viewcl.php"><i class="fa fa-circle-o"></i> View Clearance+</a></li>
           
          </ul>
        </li>
        
       
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>Conditions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addconditions.php"><i class="fa fa-circle-o"></i> Add Clearance Conditions</a></li>
            <li><a href="viewconditions.php"><i class="fa fa-circle-o"></i> View Clearance Conditions</a></li>
            <li><a href="setpriority.php"><i class="fa fa-circle-o"></i> Set Priority Clearance Conditions</a></li>
          </ul>
        </li>

		 <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Environment Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addenvmanagement.php"><i class="fa fa-circle-o"></i> Add Environmental Management</a></li>
            <li><a href="viewenvmanagement.php"><i class="fa fa-circle-o"></i> View Environmental Management</a></li>
			
          </ul>
        </li>
		
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-certificate"></i>
            <span>Certificates</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addcertificate.php"><i class="fa fa-circle-o"></i> Add Certificate</a></li>
            <li><a href="managecerti.php"><i class="fa fa-circle-o"></i> Manage Certificates</a></li>
           
          </ul>
        </li>
        <!--
        <li class="treeview">
          <a href="#">
            <i class="fa fa-asterisk"></i> <span>Designation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="adddesignation.php"><i class="fa fa-circle-o"></i> Add Designation</a></li>
            <li><a href="viewdesignation.php"><i class="fa fa-circle-o"></i> View Designation</a></li>
           
          </ul>
        </li> -->
		<li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="adduser.php"><i class="fa fa-circle-o"></i> Add User</a></li>
            <li><a href="viewuser.php"><i class="fa fa-circle-o"></i> View User</a></li>
<!--<li><a href="userperm.php"><i class="fa fa-circle-o"></i>User Permision</a></li>-->
          </ul>
        </li>
		<li class="treeview" style="display: none;">
          <a href="#">
            <i class="fa fa-font"></i> <span>Topic</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addtopic.php"><i class="fa fa-circle-o"></i> Add Topic</a></li>
            <li><a href="viewtopic.php"><i class="fa fa-circle-o"></i> View Topic</a></li>
          </ul>
        </li>
        <li class="treeview" style="display: none;">
          <a href="#">
            <i class="fa fa-table"></i> <span>Content</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addcontent.php"><i class="fa fa-circle-o"></i> Add Content</a></li>
            <li><a href="viewcontent.php"><i class="fa fa-circle-o"></i> View Content List</a></li>
          </ul>
        </li>
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li style="display:none;"><a href="adminviewreport.php"><i class="fa fa-file"></i> <span>Reports</span></a></li>
            <li style="display:none;"><a href="#"><i class="fa fa-file"></i> <span>Reminder</span></a></li>
            <li> <a href="addconstraints.php"><i class="fa fa-file"></i> <span>Add Constraints</span></a></li>
			<li><a href="addcircular.php"><i class="fa fa-file"></i> <span>Add Circular</span></a></li>
		<!--	<li><a href="alert.php"> <i class="fa fa-file"></i> <span>Sent Message</span></a> </li>
			<li><a href="alert.php"><i class="fa fa-file"></i> <span>Alerts</span></a></li>
<li><a href="userperm.php"><i class="fa fa-circle-o"></i>User Permision</a></li>-->
          </ul>
        </li>

        <li> <a href="notcomplied.php"><i class="fa fa-file"></i> <span>Pending Conditions</span></a></li>

        <li> <a href="userpermission.php"><i class="fa fa-lock"></i> <span>User Permission</span></a></li>
		
		
		
		
       
       
        
      </ul>
			 
		 
    </section>
	 
    <!-- /.sidebar -->
<div class="ftr">
Copyright &copy; 2018  All rights
    reserved.
 </div>

  </aside>
 <style> 
 .mrq {
    width: 96%;
    margin-left: 2%;
    margin-right: 2%;
    background: #ffffff;
	  border:1px solid #dedede;
    padding:2%;
    font-size:11px !important; height:421px !important; float:left; position:relative;
}
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
.arrow-button {
    /* background: #555 !important; */
    background: #b9261f;
    /* background-size: 100% 51%; */
    /* background-repeat: no-repeat; */
    font-family: helvetica;
    padding: 7px 10px;
    font-size: 17px;
    color: #fff;
    /* line-height: 5px; */
    text-decoration: none;
    border-radius: 3px;
    margin-left: 0px;
    margin-top: 0px;
}
.lgout i.fa.fa-sign-out {
    font-size: 25px;
    color: #fd1402; margin-left:10px;
}












 </style>