<!DOCTYPE html>
<html>
<head>
	<title>Asynch searching...</title>
	<meta charset="utf-8">
	<style type="text/css">
		input[type='search']{
			width: 90%;
		}
		*,html,body{
			transition: 0.6s;
		}
		#founds{
			height: 300px !important;
			overflow-y: scroll !important;
		}
	</style>
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
<div id="search-bar">
	<form action="server.php" method="get">
		<input type="search" list="founds" name="data" placeholder="Search">
		<datalist id="founds">
		</datalist>
		<input type="submit" name="submit">
	</form>
	<script type="text/javascript">
		$(function(window){
			$("input[type='search']").keyup(function(e){
				if(this.value){
					$.ajax({
						url:"server.php",
						type:"get",
						dataType:"html",
						cache:false,
						data:{
							data:this.value
						}
					}).done(function(data){
						$('#founds').empty();
						$('#founds').append(data);
					}).fail(function(er){
						console.error(er);
					});
				}
			});
		});
	</script>
</div>
</body>
</html>