@include('header')

<div style="max-width: 420px; margin: 50px auto; padding: 30px; border: 1px solid #ddd; border-radius: 8px; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Đăng nhập</h2>

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

    <form action="/login" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required placeholder="Nhập email của bạn"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Mật khẩu:</label>
            <input type="password" name="password" required placeholder="Nhập mật khẩu"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <button type="submit" style="width: 100%; padding: 12px; background: #007bff; color: white; border: none; border-radius: 4px; font-size: 16px; font-weight: bold; cursor: pointer;">
            Đăng nhập
        </button>
    </form>

    <p style="text-align: center; margin-top: 15px; font-size: 14px;">
        Chưa có tài khoản? <a href="/register" style="color: #007bff; text-decoration: none;">Đăng ký ngay</a>
    </p>
</div>

@include('footer')