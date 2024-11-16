<?php
// ========== Tangkap nilai tinggi_badan dan berat_badan yang ada pada form HTML
if ($_POST) {
    $tinggi_badan = $_POST["tinggi_badan"];
    $berat_badan = $_POST["berat_badan"];
}
// ========== Cek jika tinggi_badan atau berat_badan kosong, berikan pesan error
if (empty($tinggi_badan) || empty($berat_badan)) {
    $error = "Tinggi dan berat badan tidak boleh kosong.";
} elseif ($tinggi_badan <= 0 || $berat_badan <= 0) {
    $error = "Nilai tinggi dan berat badan harus lebih dari 0.";
} else {
    // ========== Perhitungan BMI
    $tinggi_badan_sekarang = $tinggi_badan / 100;
    $BMI = $berat_badan / ($tinggi_badan_sekarang * $tinggi_badan_sekarang);

    if ($BMI <= 18.4) {
        $hasil = "Underweight";
    } elseif ($BMI >= 18.5 && $BMI < 25) {
        $hasil = "Normal";
    } elseif ($BMI >= 25 && $BMI < 30) {
        $hasil = "Overweight";
    } elseif ($BMI >= 30) {
        $hasil = "Obese";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator BMI</title>
    <link rel="stylesheet" href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 p-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Kalkulator BMI</h4>
                    <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="175" value="<?= isset($tinggi_badan) ? $tinggi_badan : ''; ?>">
                            <label for="tinggi_badan">Tinggi Badan (CM)</label>
                        </div>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="berat_badan" id="berat_badan" placeholder="53" value="<?= isset($berat_badan) ? $berat_badan : ''; ?>">
                            <label for="berat_badan">Berat Badan (KG)</label>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3 mt-3 w-100">Hitung BMI</button>
                    </form>
                    <!-- Hasil perhitungan BMI ditampilkan di sini -->
                    <?php
                    if (!empty($hasil)) {
                        echo "<div class='alert alert-success'>BMI Anda: $hasil</div>";
                    }
                    ?>
                    <!-- Hasil pesan error ditampilkan di sini -->
                    <?php
                    if (!empty($error)) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>