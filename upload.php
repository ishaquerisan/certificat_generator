<?php

//upload.php

if(isset($_POST['hd']))
{
	$img = $_POST['hd'];
    $name = $_POST['name'];
	// $hd = $_POST['hd'];
	$image_array_1 = explode(";", $img);

	
	$image_array_2 = explode(",", $image_array_1[1]);

	
	$data = base64_decode($image_array_2[1]);
    $imgn=time() .$name.'.png';
	$image_name = 'upload/' . time() .$name.'.png';

	file_put_contents($image_name, $data);

	// echo $image_name;
    session_start();
	$db = mysqli_connect('localhost', 'root', '', 'certificate');

	// initializing variables



	
		

		mysqli_query($db, "INSERT INTO data (name, img) VALUES ('$name', '$imgn')"); 
		$_SESSION['message'] = "Address saved"; 
        $lid = mysqli_insert_id($db); 
        echo $lastid;
		header('Location: showcerti.php?id=' . $lid);

}

?>
 