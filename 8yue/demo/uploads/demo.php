<?php

if ($_FILES['file']['type'] == 'image/png') {
	move_uploaded_file($_FILES['file']['tmp_name'],'./upload/'.time().'.png');
}else{
	move_uploaded_file($_FILES['file']['tmp_name'],'./upload/'.time().'.mp4');
}
