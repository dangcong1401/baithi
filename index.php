<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>V_Store - Trang Chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* 🔹 Background gradient */
        body {
            background: linear-gradient(135deg, #fdfbfb, #ebedee);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* 🔹 Navbar */
        .navbar {
            background: linear-gradient(135deg, #E96A3D, #C0572B);
            padding: 15px 0;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: white !important;
            text-transform: uppercase;
        }

        /* 🔹 Container chính */
        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* 🔹 Tiêu đề */
        h1 {
            font-size: 36px;
            font-weight: bold;
            color: #34495e;
        }

        /* 🔹 Nút bấm */
        .btn-custom {
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary {
            background: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        .btn-success {
            background: #28a745;
            border: none;
        }
        .btn-success:hover {
            background: #218838;
            transform: scale(1.05);
        }

        /* 🔹 Footer */
        .footer {
            background: linear-gradient(135deg, #E96A3D, #C0572B);
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            margin-top: 30px;
            border-radius: 0 0 12px 12px;
        }
    </style>
</head>
<body>

    <!-- 🔹 Thanh Điều Hướng -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">V_Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- 🔹 Nội dung chính -->
    <div class="container">
        <h1>Chào mừng đến với V_Store</h1>
        <p class="lead text-muted">Quản lý sản phẩm dễ dàng với hệ thống của chúng tôi.</p>
        <div class="mt-4">
            <a href="pages/list_item.php" class="btn btn-primary btn-lg btn-custom">📋 Xem Danh Sách Sản Phẩm</a>
            <a href="pages/add_item.php" class="btn btn-success btn-lg btn-custom">➕ Thêm Sản Phẩm Mới</a>
        </div>
    </div>

    <!-- 🔹 Footer -->
    <div class="footer">Hệ Thống Quản Lý Sản Phẩm</div>

</body>
</html>
