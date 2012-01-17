<!DOCTYPE html>
<html>
<head>
	<title>AnimationTester</title>
	<style type="text/css">
		html,body {
			background-color: #000;
			color: #fff;
			font-family: helvetica, arial, sans-serif;
			margin: 0;
			padding: 0;
			font-size: 12pt;
		}
		
		#canvas {
			position: absolute;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			margin: auto;
			border: 1px solid #555;
		}
		
	</style>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	
	<script type="text/javascript" src="lib/impact/impact.js"></script>
	<script type="text/javascript" src="lib/game/main.js"></script>
</head>
<body>
	<?php 
	
	$sheet = "player.png";
	$width = 16;
	$height = 16;
	$zoom = 2;
	$anim = "6,7";
	$speed = 0.3;
	$bg = "000000";
	
	if(isset($_GET["s"])){
		$sheet = $_GET["s"];
		$width = $_GET["w"];
		$height = $_GET["h"];
		$zoom = $_GET["z"];
		$anim = $_GET["a"];
		$speed = $_GET["sp"];
		$bg = $_GET["bg"];
	}
	
	 ?>
	
	<label for="sprite">Spritesheet</label><br />
	<select id="sprite" style="width: 150px;">
	<?php
	foreach (scandir("media") as $file) {
		if(is_file("media/". $file)){
			$selected = ($file == $sheet)?"selected":"";
			echo "<option $selected>".$file."</option>";
		}
	}
	?>
	</select>
	
	
	<br />
	<label for="w">width</label><br />
	<input type="text" name="" value="<?php echo $width; ?>" id="w"/>
	<br />
	<label for="h">height</label><br />
	<input type="text" name="" value="<?php echo $height; ?>" id="h"/>
	<br />
	<label for="z">zoom</label><br />
	<input type="text" name="" value="<?php echo $zoom; ?>" id="z" readonly />
	<br />
	<label for="anim">animations</label><br />
	<input type="text" name="" value="<?php echo $anim; ?>" id="anim"/>
	<br />
	<label for="animSpeed">animationspeed</label><br />
	<input type="text" name="" value="<?php echo $speed; ?>" id="animSpeed"/>
	<br />
	<label for="bg">BackgroundColor</label><br />
	<input type="text" name="" value="#<?php echo $bg; ?>" id="bg"/>
	<br />
	<br />
	<button id="apply">Apply</button>
	<br />
	<br />
	
	code<br />
	<textarea id="code" style="width: 350px; height: 100px;">
	</textarea>
	<br />
	<br />
	
	permlink<br />
	<textarea id="perm" style="width: 350px;">
	</textarea>
	
	<script type="text/javascript" charset="utf-8">
		var host = window.location.hostname+window.location.pathname;
		var rawWidth = $("#w").val();
		var rawHeight = $("#h").val();
		var width = rawWidth*3;
		var height = rawHeight*3;
		var zoom = $("#z").val();
		var img = $("#sprite").val();
		var bg = $("#bg").val();
		
		var animationFrames = $("#anim").val();
		var animationSpeed = $("#animSpeed").val();
		
		$("#apply").click(function(){
			ig.game.apply();
		});
		
	</script>
	
	
	

	<canvas id="canvas"></canvas>
	
</body>
</html>
