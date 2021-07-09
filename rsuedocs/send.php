<?php
if ($_FILES && $_FILES['filename']['error']== UPLOAD_ERR_OK)
{
    $name = $_FILES['filename']['name'];
    move_uploaded_file($_FILES['filename']['tmp_name'], "Docs/".$name);
    header("Refresh:0");
}
?>