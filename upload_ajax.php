<?php 

if (isset($_FILES['file'])) {
    $error = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    @$file_ext = strtolower("" . end(explode('.', $_FILES['file']['name'])) . "");
    $extensions = array("jpg", "jpeg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $error[] = "Ektensi file yang diizinkan adalah PDF, DOC, DOCX, atau TXT.";
    }

    if ($file_size > 2097152) {
        $error[] = "Ukuran file tidak boleh lebih dari 2 MB.";
    }

    if (empty($error) == true) {
        move_uploaded_file($file_tmp, "documents/" . $file_name);
        echo "File berhasil diunggah.";
    } else {
        echo implode(" ", $error);
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
