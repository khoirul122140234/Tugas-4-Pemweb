<?php
session_start();

// Ambil data dari session
$data = isset($_SESSION['data']) ? $_SESSION['data'] : null;
$fileContent = isset($_SESSION['fileContent']) ? $_SESSION['fileContent'] : [];
$userAgent = isset($_SESSION['userAgent']) ? $_SESSION['userAgent'] : '';

// Jika data tidak ada, tampilkan pesan error
if (!$data) {
    echo "<p class='message'>Data tidak ditemukan.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #000080;
            margin-top: 30px;
            font-size: 2rem;
        }

        h2 {
            color: #000080;
            font-size: 1.5rem;
            margin-top: 30px;
            text-align: center;
        }

        /* Table Styles */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 8px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
            color: #333;
        }

        td {
            background-color: #f9f9f9;
            color: #555;
        }

        /* Table Hover Effects */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Container for content */
        .content-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        /* Error / Info Message */
        .message {
            color: #e74c3c;
            font-size: 1.1rem;
            text-align: center;
            margin-top: 20px;
        }

        .message-success {
            color: #2ecc71;
        }

    </style>
</head>
<body>
    <div class="content-container">
        <h1>Hasil Pendaftaran</h1>
        <!-- Data Pendaftaran -->
        <table>
            <tr>
                <th>Field</th>
                <th>Data</th>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?= htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><?= htmlspecialchars($data['age'], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><?= htmlspecialchars($data['gender'], ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td>Browser/Sistem Operasi</td>
                <td><?= htmlspecialchars($userAgent, ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        </table>

        <!-- Isi File -->
        <h2>Isi File</h2>
        <table>
            <tr>
                <th>Baris</th>
                <th>Konten</th>
            </tr>
            <?php foreach ($fileContent as $index => $line): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($line, ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
