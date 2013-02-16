<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Responsive</title>

	</head>
	<body>
		<!--[if lt IE 9]>		
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		-->
		<style type="text/css">
		    @media screen and (max-width: 480px) {
		        .wrapper { 
		            width:50% !important;
		        }
		        .right-table {
		        	display: none !important;
		        }
		    }
		</style>
		<table style="width: 650px" class="wrapper" align="center">
			<tr>
				<td colspan="2" style="width: 100%; height: 100px; background-color: purple" class="header"></td>
			</tr>
			<tr>
				<td colspan="2" style="width: 100%; height: 200px; background-color: green; display: none" class="hidden"></td>
			</tr>
			<tr>
				<td>
					<table style="width: 400px; height: 200px; background-color: red;" class="left-table">
						<tr>
							<td></td>
						</tr>
					</table>
				</td>
				<td>
					<table style="width: 250px; height: 200px; background-color: blue;" class="right-table">
						<tr>
							<td></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

	</body>
</html>

