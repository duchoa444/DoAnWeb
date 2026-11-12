@include('header')

<div style="max-width: 450px; margin: 40px auto; padding: 30px; border: 1px solid #ddd; border-radius: 8px; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Đăng ký tài khoản</h2>

    {{-- Khu vực hiển thị lỗi từ server --}}
    @if ($errors->any())
        <div style="background: #ffebee; color: #c62828; padding: 12px; border-radius: 4px; margin-bottom: 15px; font-size: 14px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/register" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Họ và tên:</label>
            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ví dụ: Nguyễn Văn A"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required placeholder="Nhập email"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Vai trò đăng ký:</label>
            <select name="role" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                <option value="student">Học viên</option>
                <option value="teacher">Giảng viên</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Mật khẩu:</label>
            <input type="password" name="password" required placeholder="Tạo mật khẩu"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Xác nhận mật khẩu:</label>
            <input type="password" name="password_confirmation" required placeholder="Nhập lại mật khẩu"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <button type="submit" style="width: 100%; padding: 12px; background: #28a745; color: white; border: none; border-radius: 4px; font-size: 16px; font-weight: bold; cursor: pointer;">
            Đăng ký
        </button>
    </form>

    <p style="text-align: center; margin-top: 15px; font-size: 14px;">
        Đã có tài khoản? <a href="/login" style="color: #007bff; text-decoration: none;">Đăng nhập</a>
    </p>
</div>

@include('footer')