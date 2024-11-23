<?php
// Validasi Server-Side
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    // Validasi nama
    if (empty($_POST['name']) || strlen($_POST['name']) < 3 || strlen($_POST['name']) > 50) {
        $errors[] = "Nama harus diisi dan panjangnya antara 3-50 karakter.";
    }

    // Validasi email
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }

    // Validasi umur
    if (empty($_POST['age']) || $_POST['age'] < 1 || $_POST['age'] > 120) {
        $errors[] = "Umur harus diisi dan dalam rentang 1-120.";
    }

    // Validasi gender
    if (empty($_POST['gender'])) {
        $errors[] = "Jenis kelamin harus dipilih.";
    }

    // Validasi file
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        if ($fileType != 'txt') {
            $errors[] = "File harus berformat .txt.";
        }
        if ($fileSize > 1024 * 1024) { // 1MB max
            $errors[] = "Ukuran file tidak boleh lebih dari 1MB.";
        }
    } else {
        $errors[] = "File harus diupload.";
    }

    // Jika ada error, tampilkan dan kembali ke form
    if (!empty($errors)) {
        echo "<h2 style='color:red;'>Terjadi kesalahan:</h2>";
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<a href='form.php'>Kembali ke Form</a>";
        exit;
    }

    // Jika tidak ada error, simpan file dan data ke session
    $fileContent = file_get_contents($fileTmp);
    $fileContentArray = explode("\n", trim($fileContent));

    // Ambil informasi browser dan sistem operasi
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    // Menyimpan data ke session dan mengarahkan ke halaman result.php
    session_start();
    $_SESSION['data'] = $_POST;
    $_SESSION['fileContent'] = $fileContentArray;
    $_SESSION['userAgent'] = $userAgent;

    header("Location: result.php");
    exit;
}
?>
