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
        .navbar { background-color:rgb(119, 38, 9) }
        .navbar-brand, .nav-link { color: white !important; }
        .container { max-width: 600px; margin-top: 50px; }
        .footer { background-color:rgb(119, 38, 9); color: white; text-align: center; padding: 10px; margin-top: 20px; }
    </style>
</head>
<body>

    <!-- 🔹 Thanh Điều Hướng -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="../index.php"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="list_item.php">Danh Sách Sản Phẩm</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🔹 Form Thêm Sản Phẩm -->
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="text-center text-primary">Nhập Thông Tin Sản Phẩm</h4>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Mã Sản Phẩm:</label>
                        <input type="text" name="item_code" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tên Sản Phẩm:</label>
                        <input type="text" name="item_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Số Lượng:</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hạn Sử Dụng:</label>
                        <input type="date" name="expired_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ghi Chú:</label>
                        <textarea name="note" class="form-control" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Thêm Sản Phẩm</button>
                    <a href="list_item.php" class="btn btn-secondary w-100 mt-2">Quay Lại</a>
                </form>
            </div>
        </div>
    </div>

    <!-- 🔹 Footer -->
    <div class="footer"></div>

</body>
</html>
