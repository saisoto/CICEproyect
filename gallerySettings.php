<?php 

function getField($field){
  $sql="SELECT * FROM fields WHERE field_name='$file'";
	$result=$this->mysqli->query($sql);
	
	if ($result) {
		if($result->num_rows == 1){
			$field_data=$result->fetch_assoc();
			$field_id=$field_data['field_url'];

			return $field_id;
		}else{
			trigger_error("There's more than one field. WTH?", E_USER_ERROR);
			return false;
		}
	}else{
		trigger_error("Error $sql", E_USER_ERROR);
		return false;
	}
}

function changeGalleryField($field,$gallery_id){
	$field_id=$this->getField($field);
	if (!$field) {
		trigger_error("Check get field_id", E_USER_ERROR);
	}else{
		$sql="UPDATE gallery_field FROM galleries WHERE gallery_id='$gallery_id'";
		$result=$this->mysqli->query($sql);
		if ($result) {
			return true;
		}else{
			trigger_error("Error $sql", E_USER_ERROR);
			return false;
		}
	}
}

 ?>
