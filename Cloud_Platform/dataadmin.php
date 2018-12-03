	<?php
	

	session_start();

	//检测是否登录，若没登录则转向登录界面
	if(!isset($_SESSION['userid'])){
		header("Location:login.html");
		exit();
	}
	$uuid=$_SESSION['userid'];
	?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>6LoWPAN 物联网数据平台</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />   
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />

	<!-- 引入 echarts.js -->

	<script src="assets/js/echarts.js"></script>
	<script src="assets/js/echarts.min.js"></script>
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/jquery-3.3.1.js"></script>
	    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>     
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
	

		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
				var dataTable = $('#employee-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"employee-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".employee-grid-error").html("");
							$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#employee-grid_processing").css("display","none");
							
						}
					}
				} );
			} );
		</script>
		<style>
			div.container {
			    margin: 0 auto;
			    max-width:760px;
			}
			div.header {
			    margin: 100px auto;
			    line-height:30px;
			    max-width:760px;
			}

		</style>

</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">6LoWPAN 物联网数据平台--管理员</a>
            </div>
			
            <ul class="nav navbar-top-links navbar-right">                               
                <!-- /.dropdown 登录注销-->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usercenter.php"><i class="fa fa-user fa-fw"></i>管理中心</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php?action=logout"><i class="fa fa-sign-out fa-fw"></i>注销  <?php echo("{$_SESSION['username']}");?></a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
 <!--/. NAV TOP左栏列表  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">	  
					<li>
                        <a href="admin.php"><i class="fa fa-table"></i>系统信息统计</a>
                    </li>
                    <li>
                        <a href="dataadmin.php"><i class="fa fa-qrcode"></i>数据管理</a>
                    </li>
                    <li>
                        <a href="nodeadmin.php"><i class="fa fa-qrcode"></i>节点管理</a>
                    </li>
                    <li>
                        <a href="useradmin.php"><i class="fa fa-table"></i>用户管理</a>
                    </li>
						<li>
                        <a href="superadmin.php"><i class="fa fa-table"></i>管理员</a>
                    </li>				
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                   
				   <div class="col-md-12">
                        <h1 class="page-header">
							<small>原始数据管理</small>
                        </h1>
                    </div>
              </div> 
                 <!-- /. 第一排 -->
             
                <div class="row">                     
                    <div class="col-md-12 col-sm-12 col-xs-12">                     
                         <div class="panel panel-default">
                             <div class="panel-heading">数据查询</div>
                             <div class="panel-body">
                              <div class="container">
			<table id="employee-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
					<thead>
						<tr>
							<th>序号</th>
							<th>节点编号</th>
							<th>传感器1</th>
							<th>传感器2</th>
							<th>时间</th>
						</tr>
					</thead>
			</table>
		</div>   
								 
								 
								 
								 
								 
								 
                            </div>
                     </div>            
                </div>

                
              </div>
 
              
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

     <!-- /. WRAPPER  -->	

	           

    
   
</body>
</html>
