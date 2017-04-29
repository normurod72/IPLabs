<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
	<?php
		function showSize($value){
		    $data_size=0;
		    $terms=array('byte','Kb','Mb','Gb','Tb','Pb');
		    for(;;){
		        if(1){
		            if($value>=1024){
		                $value=round($value/1024,2);
		                $data_size=$data_size+1;
		            }else{
		                return $value." ".$terms[$data_size];
		                break;
		            }
		        }
		    }
		}
	?>

		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>
		
		
		<div id="listarea">
			<ul id="musiclist">
				
				<?php
					if(isset($_REQUEST['playlist'])){
						$list=glob("songs/*.mp3");
					}else{
						$list=glob("songs/*.*");
					}
						
					foreach ($list as $value) {
					
				?>
				<li class="mp3item">
					<a href="<?= $value; ?>"><?= basename($value); ?></a>
					(<?= showSize(filesize($value)); ?>)
				</li>

				<?php } ?>

			</ul>
		</div>
	</body>
</html>