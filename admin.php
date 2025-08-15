<?php
 include 'check_auth.php';
include_once('junk.php');
$que="SELECT * FROM `customer`";
$result = mysqli_query($db, $que);
$que1="SELECT * FROM `travel_agent`";
$result1 = mysqli_query($db, $que1);
$que2="SELECT * FROM `places`";
$result2 = mysqli_query($db, $que2);
$que3="SELECT * FROM `hotels`";
$result3 = mysqli_query($db, $que3);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Travel Explorer - Admin Dashboard</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<style>
		:root {
			--primary-color: #3498db;
			--secondary-color: #2980b9;
			--accent-color: #e74c3c;
			--light-color: #ecf0f1;
			--dark-color: #2c3e50;
			--success-color: #2ecc71;
			--warning-color: #f39c12;
			--info-color: #1abc9c;
			--border-radius: 6px;
			--box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			--transition: all 0.3s ease;
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}

		body {
			background-color: #f5f7fa;
			color: #333;
			line-height: 1.6;
		}

		.main {
			background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
			color: white;
			padding: 15px 0;
			box-shadow: var(--box-shadow);
			position: sticky;
			top: 0;
			z-index: 1000;
		}

		.main ul {
			list-style: none;
			display: flex;
			justify-content: space-between;
			align-items: center;
			max-width: 1200px;
			margin: 0 auto;
			padding: 0 20px;
		}

		.list {
			display: flex;
			align-items: center;
			gap: 20px;
		}

		.list2 {
			display: flex;
			gap: 15px;
		}

		.logo img {
			transition: var(--transition);
		}

		.logo:hover img {
			transform: rotate(360deg);
		}

		.search {
			display: flex;
			align-items: center;
		}

		.search input[type="text"] {
			padding: 8px 15px;
			border: none;
			border-radius: var(--border-radius) 0 0 var(--border-radius);
			outline: none;
			width: 300px;
		}

		.search input[type="image"] {
			background: white;
			padding: 5px 10px;
			border-radius: 0 var(--border-radius) var(--border-radius) 0;
			cursor: pointer;
		}

		.main a {
			color: white;
			text-decoration: none;
			font-weight: 500;
			transition: var(--transition);
			display: flex;
			align-items: center;
			gap: 5px;
		}

		.main a:hover {
			color: var(--light-color);
			transform: translateY(-2px);
		}

		.container {
			max-width: 1200px;
			margin: 30px auto;
			display: flex;
			min-height: calc(100vh - 100px);
		}

		.headder {
			text-align: center;
			margin-bottom: 30px;
			padding-bottom: 15px;
			border-bottom: 2px solid var(--primary-color);
			position: relative;
		}

		.headder h1 {
			color: var(--dark-color);
			font-size: 28px;
		}

		.menu-list {
			width: 250px;
			background: white;
			border-radius: var(--border-radius);
			box-shadow: var(--box-shadow);
			padding: 20px 0;
			margin-right: 20px;
			height: fit-content;
		}

		.menu-list a {
			display: block;
			padding: 12px 20px;
			color: var(--dark-color);
			text-decoration: none;
			transition: var(--transition);
			border-left: 3px solid transparent;
			font-weight: 500;
		}

		.menu-list a:hover {
			background-color: rgba(52, 152, 219, 0.1);
			border-left: 3px solid var(--primary-color);
			color: var(--primary-color);
			transform: translateX(5px);
		}

		.menu-list a i {
			width: 20px;
			text-align: center;
			margin-right: 10px;
		}

		.work {
			flex: 1;
			background: white;
			border-radius: var(--border-radius);
			box-shadow: var(--box-shadow);
			padding: 25px;
			display: none;
			animation: fadeIn 0.5s ease;
		}

		@keyframes fadeIn {
			from { opacity: 0; transform: translateY(10px); }
			to { opacity: 1; transform: translateY(0); }
		}

		.btn-tag {
			display: flex;
			gap: 15px;
			margin-bottom: 25px;
			flex-wrap: wrap;
		}

		.btn-tag button {
			padding: 10px 20px;
			border: none;
			border-radius: var(--border-radius);
			background-color: var(--primary-color);
			color: white;
			cursor: pointer;
			transition: var(--transition);
			font-weight: 500;
			display: flex;
			align-items: center;
			gap: 8px;
			box-shadow: 0 2px 4px rgba(0,0,0,0.1);
		}

		.btn-tag button:hover {
			transform: translateY(-3px);
			box-shadow: 0 4px 8px rgba(0,0,0,0.15);
		}

		.btn-tag button:active {
			transform: translateY(0);
		}

		.btn-tag button i {
			font-size: 14px;
		}

		#v1, #v2, #v3, #v4 {
			background-color: var(--success-color);
		}

		#v1:hover, #v2:hover, #v3:hover, #v4:hover {
			background-color: #27ae60;
		}

		#b1, #b2, #b3, #b4 {
			background-color: var(--accent-color);
		}

		#b1:hover, #b2:hover, #b3:hover, #b4:hover {
			background-color: #c0392b;
		}

		#i1, #i2, #i3 {
			background-color: var(--warning-color);
		}

		#i1:hover, #i2:hover, #i3:hover {
			background-color: #e67e22;
		}

		.back-btn {
			background-color: var(--info-color);
			margin-bottom: 20px;
		}

		.back-btn:hover {
			background-color: #16a085;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin: 20px 0;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			animation: slideUp 0.4s ease;
		}

		@keyframes slideUp {
			from { opacity: 0; transform: translateY(20px); }
			to { opacity: 1; transform: translateY(0); }
		}

		table th, table td {
			padding: 12px 15px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		table th {
			background-color: var(--primary-color);
			color: white;
			font-weight: 600;
			position: sticky;
			top: 0;
		}

		table tr:nth-child(even) {
			background-color: #f8f9fa;
		}

		table tr:hover {
			background-color: rgba(52, 152, 219, 0.1);
			transform: scale(1.01);
			box-shadow: 0 0 10px rgba(0,0,0,0.1);
		}

		table tr {
			transition: var(--transition);
		}

		.insert-form, .delete-form, .insert-pform {
			background: white;
			padding: 25px;
			border-radius: var(--border-radius);
			box-shadow: var(--box-shadow);
			max-width: 500px;
			margin: 0 auto;
			animation: fadeIn 0.5s ease;
		}

		.insert-form h2, .delete-form h2, .insert-pform h2 {
			color: var(--dark-color);
			margin-bottom: 20px;
			text-align: center;
		}

		.insert-form input, 
		.delete-form input, 
		.insert-pform input,
		.insert-pform textarea {
			width: 100%;
			padding: 12px 15px;
			margin-bottom: 15px;
			border: 1px solid #ddd;
			border-radius: var(--border-radius);
			font-size: 14px;
			transition: var(--transition);
		}

		.insert-form input:focus, 
		.delete-form input:focus, 
		.insert-pform input:focus,
		.insert-pform textarea:focus {
			border-color: var(--primary-color);
			outline: none;
			box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
		}

		.inputTextarea {
			min-height: 100px;
			resize: vertical;
		}

		.submit {
			background-color: var(--primary-color);
			color: white;
			border: none;
			padding: 12px 20px;
			border-radius: var(--border-radius);
			cursor: pointer;
			font-weight: 500;
			transition: var(--transition);
			width: 100%;
			box-shadow: 0 2px 4px rgba(0,0,0,0.1);
		}

		.submit:hover {
			background-color: var(--secondary-color);
			transform: translateY(-2px);
			box-shadow: 0 4px 8px rgba(0,0,0,0.15);
		}

		.submit:active {
			transform: translateY(0);
		}

		.addp-workspace {
			width: 100%;
		}

		/* Responsive adjustments */
		@media (max-width: 992px) {
			.container {
				flex-direction: column;
			}

			.menu-list {
				width: 100%;
				margin-right: 0;
				margin-bottom: 20px;
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
			}

			.menu-list a {
				padding: 10px 15px;
			}
		}

		@media (max-width: 768px) {
			.main ul {
				flex-direction: column;
				gap: 15px;
			}

			.list, .list2 {
				width: 100%;
				justify-content: center;
			}

			.search input[type="text"] {
				width: 200px;
			}

			.btn-tag {
				justify-content: center;
			}

			table {
				display: block;
				overflow-x: auto;
			}
		}
	</style>
</head>
<body>
	<div class="main">
	    <ul>
	      <ul class="list">
	        <li class="logo"><a href="mainPage.html"><img src="earth-globe.png" alt="Logo" style="width:36px;height:36px"></a></li>
	        <div class="search">
	            <form method="POST" action="info.php">
	              <input type="text" name="search_p" placeholder="Search..">
	              <input type="image" name="submit_p" src="search_icon.png" alt="Search" style="width:22px;height:22px;">
	            </form>
	        </div>
	      </ul>
	      <ul class="list2">
			<li><a href="index.html"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
	      </ul>
	    </ul>
	</div>
	<div class="container">
		<div class="menu-list">
			<a id="a1" href="#" onclick="myFunction(document.getElementById(this.id))"><i class="fas fa-users"></i> Customers</a>
			<a id="a2" href="#" onclick="myFunction(document.getElementById(this.id))"><i class="fas fa-user-tie"></i> Travel Agents</a>
			<a id="a3" href="#" onclick="myFunction(document.getElementById(this.id))"><i class="fas fa-map-marked-alt"></i> Places</a>
			<a id="a4" href="#" onclick="myFunction(document.getElementById(this.id))"><i class="fas fa-hotel"></i> Hotels</a>
			<a id="a5" href="#" onclick="myFunction(document.getElementById(this.id))"><i class="fas fa-plus-circle"></i> Add Place Info</a>
			<a id="a6" href="#" onclick="myFunction(document.getElementById(this.id))"><i class="fas fa-arrow-left"></i> Back</a>
		</div>
		
		<!-- Customer Workspace -->
		<div class="customer-workspace work" id="id1">
			<div class="headder">
				<h1><i class="fas fa-users"></i> Customer Management</h1>
			</div>
			<div class="btn-tag" id="cust-op">
				<button type="button" id="v1" onclick="showDetails(document.getElementById(this.id))"><i class="fas fa-eye"></i> View Customers</button>
				<button type="button" id="b1" onclick="deleteMenu(document.getElementById(this.id))"><i class="fas fa-trash-alt"></i> Delete Customer</button>
			</div>
			<div id="tb-container" style="display: none;">
				<button class="back-btn" onclick="backToOptions('cust-op')"><i class="fas fa-arrow-left"></i> Back to Options</button>
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Password</th>
							<th>Email</th>
							<th>City</th>
							<th>Phone</th>
						</tr>
					</thead>
					<tbody>
						<?php while($rows = mysqli_fetch_assoc($result)): ?>
						<tr>
							<td><?php echo $rows['id']; ?></td>
							<td><?php echo $rows['fname']; ?></td>
							<td><?php echo substr($rows['password'], 0, 6) . '...'; ?></td>
							<td><?php echo $rows['email']; ?></td>
							<td><?php echo $rows['city']; ?></td>
							<td><?php echo $rows['phone']; ?></td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
			<div class="delete-form" id="del-form" style="display: none;">
				<button class="back-btn" onclick="backToOptions('cust-op')"><i class="fas fa-arrow-left"></i> Back to Options</button>
				<h2><i class="fas fa-trash-alt"></i> Delete Customer</h2>
				<form method="POST" action="admin_op.php">     
					<input type="text" name="id" placeholder="Customer ID" required>
					<input type="text" name="fname" placeholder="First Name" required>
					<input type="submit" value="Delete Customer" class="submit" name="de-submit-c">
				</form>
			</div>
		</div>
		
		<!-- Travel Agent Workspace -->
		<div class="agent-workspace work" id="id2">
			<div class="headder">
				<h1><i class="fas fa-user-tie"></i> Travel Agent Management</h1>
			</div>
			<div class="btn-tag" id="agn-op">
				<button type="button" id="v2" onclick="showDetails(document.getElementById(this.id))"><i class="fas fa-eye"></i> View Agents</button>
				<button type="button" id="i1" onclick="insertMenu(document.getElementById(this.id))"><i class="fas fa-plus"></i> Add Agent</button>
				<button type="button" id="b2" onclick="deleteMenu(document.getElementById(this.id))"><i class="fas fa-trash-alt"></i> Delete Agent</button>
			</div>
			<div id="agent-container" style="display: none;">
				<button class="back-btn" onclick="backToOptions('agn-op')"><i class="fas fa-arrow-left"></i> Back to Options</button>
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>City</th>
						</tr>
					</thead>
					<tbody>
						<?php while($rows1 = mysqli_fetch_assoc($result1)): ?>
						<tr>
							<td><?php echo $rows1['aid']; ?></td>
							<td><?php echo $rows1['afname']; ?></td>
							<td><?php echo $rows1['aemail']; ?></td>
							<td><?php echo $rows1['aphone']; ?></td>
							<td><?php echo $rows1['acity']; ?></td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
			<div class="insert-form" id="ins-form" style="display: none;">
				<button class="back-btn" onclick="backToOptions('agn-op')"><i class="fas fa-arrow-left"></i> Back to Options</button>
				<h2><i class="fas fa-plus"></i> Add New Agent</h2>
				<form method="POST" action="admin_op.php">
					<input type="text" name="aid" placeholder="Agent ID" required>
					<input type="text" name="afname" placeholder="First Name" required>
					<input type="text" name="aemail" placeholder="Email" required>
					<input type="text" name="aphone" placeholder="Phone Number" required>
					<input type="text" name="acity" placeholder="City" required>
					<input type="submit" value="Add Agent" class="submit" name="in-submit-a">
				</form>
			</div>
			<div class="delete-form" id="del-form2" style="display: none;">
				<button class="back-btn" onclick="backToOptions('agn-op')"><i class="fas fa-arrow-left"></i> Back to Options</button>
				<h2><i class="fas fa-trash-alt"></i> Delete Agent</h2>
				<form method="POST" action="admin_op.php">     
					<input type="text" name="aid" placeholder="Agent ID" required>
					<input type="text" name="afname" placeholder="First Name" required>
					<input type="submit" value="Delete Agent" class="submit" name="de-submit-a">
				</form>
			</div>
		</div>
		
		<!-- Places Workspace -->
		<div class="places-workspace work" id="id3">
			<div class="headder">
				<h1><i class="fas fa-map-marked-alt"></i> Places Management</h1>
			</div>
			<div class="btn-tag" id="plc-op">
				<button type="button" id="v3" onclick="showDetails(document.getElementById(this.id))"><i class="fas fa-eye"></i> View Places</button>
				<button type="button" id="i2" onclick="insertMenu(document.getElementById(this.id))"><i class="fas fa-plus"></i> Add Place</button>
				<button type="button" id="b3" onclick="deleteMenu(document.getElementById(this.id))"><i class="fas fa-trash-alt"></i> Delete Place</button>
			</div>
			<div id="place-container" style="display: none;">
				<button class="back-btn" onclick="backToOptions('plc-op')"><i class="fas fa-arrow-left"></i> Back to Options</button>
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Place Name</th>
							<th>City</th>
						</tr>
					</thead>
					<tbody>
						<?php while($rows2 = mysqli_fetch_assoc($result2)): ?>
						<tr>
							<td><?php echo $rows2['pid']; ?></td>
							<td><?php echo $rows2['pname']; ?></td>
							<td><?php echo $rows2['pcity']; ?></td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
			<div class="insert-form" id="ins-form2" style="display: none;">
				<button class="back-btn" onclick="backToOptions('plc-op')"><i class="fas fa-arrow-left"></i> Back to Options</button>
				<h2><i class="fas fa-plus"></i> Add New Place</h2>
				<form method="POST" action="admin_op.php">     
					<input type="text" name="pid" placeholder="Place ID" required>
					<input type="text" name="pname" placeholder="Place Name" required>
					<input type="text" name="pcity" placeholder="City" required>
					<input type="submit" value="Add Place" class="submit" name="ins-submit-p">
				</form>
			</div>
			<div class="delete-form" id="del-form3" style="display: none;">
				<button class="back-btn" onclick="backToOptions('plc-op')"><i class="fas fa-arrow-left"></i> Back to Options</button>
				<h2><i class="fas fa-trash-alt"></i> Delete Place</h2>
				<form method="POST" action="admin_op.php">     
					<input type="text" name="pid" placeholder="Place ID" required>
					<input type="text" name="pname" placeholder="Place Name" required>
					<input type="submit" value="Delete Place" class="submit" name="de-submit-p">
				</form>
			</div>
		</div>
		
		<!-- Hotels Workspace -->
		<div class="hotels-workspace work" id="id4">
			<div class="headder">
				<h1><i class="fas fa-hotel"></i> Hotels Management</h1>
			</div>
			<div class="btn-tag" id="htl-op">
				<button type="button" id="v4" onclick="showDetails(document.getElementById(this.id))"><i class="fas fa-eye"></i> View Hotels</button>
				<button type="button" id="i3" onclick="insertMenu(document.getElementById(this.id))"><i class="fas fa-plus"></i> Add Hotel</button>
				<button type="button" id="b4" onclick="deleteMenu(document.getElementById(this.id))"><i class="fas fa-trash-alt"></i> Delete Hotel</button>
			</div>
			<div id="hotel-container" style="display: none;">
				<button class="back-btn" onclick="backToOptions('htl-op')"><i class="fas fa-arrow-left"></i> Back to Options</button>
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Hotel Name</th>
							<th>Phone</th>
							<th>City</th>
						</tr>
					</thead>
					<tbody>
						<?php while($rows3 = mysqli_fetch_assoc($result3)): ?>
						<tr>
							<td><?php echo $rows3['hid']; ?></td>
							<td><?php echo $rows3['hname']; ?></td>
							<td><?php echo $rows3['hphone']; ?></td>
							<td><?php echo $rows3['hcity']; ?></td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
			<div class="insert-form" id="ins-form3" style="display: none;">
				<button class="back-btn" onclick="backToOptions('htl-op')"><i class="fas fa-arrow-left"></i> Back to Options</button>
				<h2><i class="fas fa-plus"></i> Add New Hotel</h2>
				<form method="POST" action="admin_op.php">     
					<input type="text" name="hid" placeholder="Hotel ID" required>
					<input type="text" name="hname" placeholder="Hotel Name" required>
					<input type="text" name="hphone" placeholder="Phone Number" required>
					<input type="text" name="hcity" placeholder="City" required>
					<input type="submit" value="Add Hotel" class="submit" name="ins-submit-h">
				</form>
			</div>
			<div class="delete-form" id="del-form4" style="display: none;">
				<button class="back-btn" onclick="backToOptions('htl-op')"><i class="fas fa-arrow-left"></i> Back to Options</button>
				<h2><i class="fas fa-trash-alt"></i> Delete Hotel</h2>
				<form method="POST" action="admin_op.php">     
					<input type="text" name="hid" placeholder="Hotel ID" required>
					<input type="text" name="hname" placeholder="Hotel Name" required>
					<input type="submit" value="Delete Hotel" class="submit" name="de-submit-h">
				</form>
			</div>
		</div>
		
		<!-- Add Place Information Workspace -->
		<div class="addp-workspace work" id="id5">
			<div class="headder">
				<h1><i class="fas fa-plus-circle"></i> Add Place Information</h1>
			</div>
			<div class="insert-pform" id="insp-form4">
				<h2><i class="fas fa-info-circle"></i> Place Details</h2>
				<form method="POST" action="admin_op.php">
					<input type="text" name="pname" placeholder="Place Name" required>
					<textarea class="inputTextarea" name="pdescription" rows="4" placeholder="Place Description" required></textarea>
					<input type="text" name="pi_main" placeholder="Main Image URL" required>
					<input type="text" name="pi1" placeholder="Image 1 URL" required>
					<input type="text" name="pi2" placeholder="Image 2 URL" required>
					<input type="text" name="pi3" placeholder="Image 3 URL" required>
					<input type="submit" value="Add Place Details" class="submit" name="add_pd">
				</form>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		// Initialize the first workspace as visible
		document.addEventListener('DOMContentLoaded', function() {
			document.getElementById('id1').style.display = "block";
			document.getElementById("cust-op").style.display = "flex";
		});

		function makeNone(){
			// Hide all operation buttons and forms
			document.getElementById("htl-op").style.display = "none";
			document.getElementById("ins-form3").style.display = "none";
			document.getElementById("del-form4").style.display = "none";
			document.getElementById("hotel-container").style.display = "none";

			document.getElementById("plc-op").style.display = "none";
			document.getElementById("ins-form2").style.display = "none";
			document.getElementById("del-form3").style.display = "none";
			document.getElementById("place-container").style.display = "none";

			document.getElementById("agn-op").style.display = "none";
			document.getElementById("ins-form").style.display = "none";
			document.getElementById("del-form2").style.display = "none";
			document.getElementById("agent-container").style.display = "none";

			document.getElementById("cust-op").style.display = "none";
			document.getElementById("del-form").style.display = "none";
			document.getElementById("tb-container").style.display = "none";
		}

		function myFunction(clicked){
			makeNone();
			document.getElementById('id1').style.display = "none";
			document.getElementById('id2').style.display = "none";
			document.getElementById('id3').style.display = "none";
			document.getElementById('id4').style.display = "none";
			document.getElementById('id5').style.display = "none";
			
			if (document.getElementById('a1') === clicked){
				document.getElementById('id1').style.display = "block";
				document.getElementById("cust-op").style.display = "flex";
			}
			if (document.getElementById('a2') === clicked){
				document.getElementById('id2').style.display = "block";
				document.getElementById("agn-op").style.display = "flex";
			}
			if (document.getElementById('a3') === clicked){
				document.getElementById('id3').style.display = "block";
				document.getElementById("plc-op").style.display = "flex";
			}
			if (document.getElementById('a4') === clicked){
				document.getElementById('id4').style.display = "block";
				document.getElementById("htl-op").style.display = "flex";
			}
			if (document.getElementById('a5') === clicked){
				document.getElementById('id5').style.display = "block";
			}
		}
		
		function deleteMenu(clicked) {
			makeNone();
			if (document.getElementById('b1') === clicked){
				document.getElementById("del-form").style.display = "block";
			}
			if (document.getElementById('b2') === clicked){
				document.getElementById("del-form2").style.display = "block";
			}
			if (document.getElementById('b3') === clicked){
				document.getElementById("del-form3").style.display = "block";
			}
			if (document.getElementById('b4') === clicked){
				document.getElementById("del-form4").style.display = "block";
			}
		}
		
		function insertMenu(clicked){
			makeNone();
			if (document.getElementById('i1') === clicked){
				document.getElementById("ins-form").style.display = "block";
			}
			if (document.getElementById('i2') === clicked){
				document.getElementById("ins-form2").style.display = "block";
			}
			if (document.getElementById('i3') === clicked){
				document.getElementById("ins-form3").style.display = "block";
			}
		}
		
		function showDetails(clicked){
			makeNone();
			if (document.getElementById('v1') === clicked){
				document.getElementById("tb-container").style.display = "block";
			}
			if (document.getElementById('v2') === clicked){
				document.getElementById("agent-container").style.display = "block";
			}
			if (document.getElementById('v3') === clicked){
				document.getElementById("place-container").style.display = "block";
			}
			if (document.getElementById('v4') === clicked){
				document.getElementById("hotel-container").style.display = "block";
			}
		}
		
		function backToOptions(sectionId) {
			makeNone();
			document.getElementById(sectionId).style.display = "flex";
		}
	</script>
</body>
</html>