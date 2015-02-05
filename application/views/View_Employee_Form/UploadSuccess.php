<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php
/*
src="<?php echo base_url(); ?>application/views/View_Employee_Form/photo/photo.jpg"
'<?php echo $url."\\".$upload_data['file_name'] ?>'
Success=> <?php echo base_url()."application/views/View_Employee_Form/photo/".$upload_data['file_name']; ?>
*/
 foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
<?php 
echo $url."<br>";
$newpath = str_replace('/', '\\', $upload_data['full_path']);  ?>
<p>  <img src="<?php echo $url."/".$upload_data['file_name']; ?>" width="<?php echo $upload_data['image_width'];?>" height="<?php echo $upload_data['image_height'];?>"/></p>  
<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
</body>
</html>