<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $expired_date = $_POST['expired_date'];
    $note = $_POST['note'];

    $sql = "INSERT INTO item_sale (item_code, item_name, quantity, expired_date, note)
            VALUES ('$item_code', '$item_name', $quantity, '$expired_date', '$note')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: list_item.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* 🔹 Định dạng chung */
        body {
            background: linear-gradient(135deg, #fdfbfb, #ebedee);
            min-height: 100vh;
        }

        /* 🔹 Thanh điều hướng */
        .navbar {
            background: linear-gradient(135deg, #2c3e50, #34495e);
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }

        /* 🔹 Form Container */
        .container {
            max-width: 500px;
            margin-top: 50px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background: #2c3e50;
            color: white;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border-radius: 12px 12px 0 0;
        }

        /* 🔹 Nút bấm */
        .btn-custom {
            background: #27ae60;
            color: white;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background: #2ecc71;
        }
        .btn-secondary:hover {
            background: #7f8c8d;
        }

        /* 🔹 Footer */
        .footer {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 30px;
            border-radius: 0 0 12px 12px;
        }
    </style>
</head>
<body>

    <!-- 🔹 Thanh Điều Hướng -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="../index.php">Quản lý Sản Phẩm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="list_item.php">Danh Sách</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🔹 Form Thêm Sản Phẩm -->
    <div class="container">
        <div class="card">
            <div class="card-header">Nhập Thông Tin Sản Phẩm</div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Mã Sản Phẩm:</label>
                        <input type="text" name="item_code" class="form-control" placeholder="Nhập mã sản phẩm" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên Sản Phẩm:</label>
                        <input type="text" name="item_name" class="form-control" placeholder="Nhập tên sản phẩm" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Số Lượng:</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Hạn Sử Dụng:</label>
                        <input type="date" name="expired_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Ghi Chú:</label>
                        <textarea name="note" class="form-control" rows="2" placeholder="Nhập ghi chú"></textarea>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">➕ Thêm Sản Phẩm</button>
                    <a href="list_item.php" class="btn btn-secondary w-100 mt-2">⬅ Quay Lại</a>
                </form>
            </div>
        </div>
    </div>

    <!-- 🔹 Footer -->
    <div class="footer">© 2025 - Hệ Thống Quản Lý Sản Phẩm</div>

</body>
</html>
