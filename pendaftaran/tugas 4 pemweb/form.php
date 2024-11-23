<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
            color: #333;
        }

        h1 {
            text-align: center;
            color:  #000080;
            margin-top: 50px;
        }

        /* Form Styling */
        form {
            max-width: 450px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        input, select, button {
            width: 95%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="text"], input[type="email"], input[type="number"], select {
            background-color: #f9f9f9;
        }

        input[type="file"] {
            background-color: #f2f2f2;
            border: 1px dashed #ccc;
        }

        button {
            background-color:  #000080;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #f2f2f2;
        }

        /* Error message styling */
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 15px;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }

            input, select, button {
                padding: 10px;
            }
        }

    </style>
</head>
<body>
    <h1>Form Pendaftaran</h1>
    <form id="registrationForm" action="process.php" method="POST" enctype="multipart/form-data">
        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" required minlength="3" maxlength="50">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="age">Umur</label>
        <input type="number" id="age" name="age" required min="1" max="120">

        <label for="gender">Jenis Kelamin</label>
        <select id="gender" name="gender" required>
            <option value="">Pilih...</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="file">Upload File (Teks)</label>
        <input type="file" id="file" name="file" accept=".txt" required>

        <button type="submit">Daftar</button>
    </form>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            const fileInput = document.getElementById('file');
            const file = fileInput.files[0];

            if (file) {
                if (file.size > 1024 * 1024) { // 1MB
                    event.preventDefault();
                    alert("Ukuran file tidak boleh lebih dari 1MB");
                }
            } else {
                event.preventDefault();
                alert("File harus diupload!");
            }
        });
    </script>
</body>
</html>
