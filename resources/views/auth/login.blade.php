
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Quản lý học tập</title>
</head>
<body>

    <h2>ĐĂNG NHẬP</h2>

    <form action="/login" method="POST">
        @csrf

        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <br>

        <div>
            <label>Mật khẩu:</label>
            <input type="password" name="password" required>
        </div>

        <br>

        <button type="submit">Đăng nhập</button>
    </form>

    <p>Chưa có tài khoản? <a href="/register">Đăng ký</a></p>

</body>
</html>
