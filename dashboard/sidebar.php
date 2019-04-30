
<?php
	
	$id = $_SESSION['id'];
	$username = $_SESSION['username']; 
	$group_id = $_SESSION['group_id'];
	
?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
					<?php echo $username;?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li class="active"><a href="index.php"><em class="fa fa-home">&nbsp;</em> Dashboard</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-group">&nbsp;</em> Groups <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					
					<li><a class="" href="creategroup.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Create Group
					</a></li>
					<li><a class="" href="viewgroups.php">
						<span class="fa fa-arrow-right">&nbsp;</span> View Groups
					</a></li>
				</ul>
			</li>
			<li class=""><a href="viewtransations.php"><em class="fa fa-money">&nbsp;</em> View Transations</a></li>
			<li class=""><a href="viewloanrequest.php"><em class="fa fa-arrow-right">&nbsp;</em> View Loan Requests</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Members <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="register.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Register Member
					</a></li>
					<li><a class="" href="view.php">
						<span class="fa fa-arrow-right">&nbsp;</span> View Members
					</a></li>
					<li><a class="" href="cancle.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Cancel Members
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-book">&nbsp;</em> Minutes <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					
					<li><a class="" href="takeminutes.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Take Minutes
					</a></li>
					<li><a class="" href="viewmitues.php">
						<span class="fa fa-arrow-right">&nbsp;</span> View Minutes
					</a></li>
				</ul>
			</li>
			
			<li class=""><a href="generatereports.php"><em class="fa fa-book">&nbsp;</em> Generate Reports</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

	