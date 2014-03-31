<?php

function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);

	echo "<br>";
	var_dump($_FILES["image_file"]);
	echo "<br>#7 upload data<br>";
	var_dump($_FILES["image"]);
	echo "<br>";
	var_dump($_FILES["image_file"]["image"]);
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["image_file"]["name"]);
	$extension = end($temp);
	if ((($_FILES["image_file"]["type"] == "image/gif")
	|| ($_FILES["image_file"]["type"] == "image/jpeg")
	|| ($_FILES["image_file"]["type"] == "image/jpg")
	|| ($_FILES["image_file"]["type"] == "image/pjpeg")
	|| ($_FILES["image_file"]["type"] == "image/x-png")
	|| ($_FILES["image_file"]["type"] == "image/png"))
	&& in_array($extension, $allowedExts)) {
	// && ($_FILES["image_file"]["size"] < 20000) ==> check the file size
		if ($_FILES["image_file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["image_file"]["error"] . "<br>";
		} else {
			// $_FILES["image_file"]["name"] = $manufacturerName.".".end($temp);
			// $_FILES["image_file"]["name"] = str_replace($_FILES["image_file"]["name"], "%20", "-");
			// $_FILES["image_file"]["name"] = $manufacturerName."-".$modelName."-".$versionName."-".$featureId.".".end($temp);
			$_FILES["image_file"]["name"] = "imagemmarcelo.".end($temp);
			echo "Upload: " . $_FILES["image_file"]["name"] . "<br>";
			echo "Type: " . $_FILES["image_file"]["type"] . "<br>";
			echo "Size: " . ($_FILES["image_file"]["size"] / 1024) . " kB<br>";
			echo "Temp file: " . $_FILES["image_file"]["tmp_name"] . "<br>";
				if (file_exists("./carImages/" . $_FILES["image_file"]["name"])) {
					echo $_FILES["image_file"]["name"] . " already exists. ";
				} else {
					move_uploaded_file($_FILES["image_file"]["tmp_name"],
					"./carImages/" . $_FILES["image_file"]["name"]);
					echo "Stored in: " . "./carImages/" . $_FILES["image_file"]["name"];
					return $_FILES["image_file"]["name"];
				}
		}
	} else {
		echo "Invalid file";
	}



echo <<<EOF
<p>Your file: {$sFileName} has been successfully received.</p>
<p>Type: {$sFileType}</p>
<p>Size: {$sFileSize}</p>
EOF;
