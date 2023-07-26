<?php
if (isset($_FILES['panFile'])) {
    $file = $_FILES['panFile'];
    $filename = $file['name'];
    $filetmp = $file['tmp_name'];
    $filesize = $file['size'];
    $fileerror = $file['error'];

    // Handle the file upload process here
    // Example: move_uploaded_file($filetmp, "uploads/" . $filename);
}

if (isset($_FILES['aadharFile'])) {
    $file = $_FILES['aadharFile'];
    $filename = $file['name'];
    $filetmp = $file['tmp_name'];
    $filesize = $file['size'];
    $fileerror = $file['error'];

    // Handle the file upload process here
    // Example: move_uploaded_file($filetmp, "uploads/" . $filename);
}

if (isset($_FILES['licenseFile'])) {
    $file = $_FILES['licenseFile'];
    $filename = $file['name'];
    $filetmp = $file['tmp_name'];
    $filesize = $file['size'];
    $fileerror = $file['error'];

    // Handle the file upload process here
    // Example: move_uploaded_file($filetmp, "uploads/" . $filename);
}

if (isset($_FILES['miscFiles'])) {
    $files = $_FILES['miscFiles'];

    foreach ($files['tmp_name'] as $key => $tmp_name) {
        $file_name = $files['name'][$key];
        $file_tmp = $files['tmp_name'][$key];
        $file_size = $files['size'][$key];
        $file_error = $files['error'][$key];

        // Handle the file upload process here
        // Example: move_uploaded_file($file_tmp, "uploads/" . $file_name);
    }
}

// Redirect to the page after file upload
header("Location: 2.html");
exit();
?>
