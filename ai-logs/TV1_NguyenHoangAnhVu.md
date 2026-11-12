NHẬT KÝ SỬ DỤNG AI - NGUYỄN HOÀNG ANH VŨ (TV1 - LE)
## AI-01: Bổ sung luồng ngoại lệ đặc tả Use Case và Use Case Diagram
- **Thời gian:** 09:30 – 10:45 (Thứ 3, Ngày 2 – Tuần 1)
- **Công cụ AI:** Gemini
- **Prompt:** 
    "Gợi ý Use Case Diagram 4 tác nhân (Khách vãng lai, Học viên, Giảng viên, Quản trị) và rà soát đặc tả 3   Use Case: Làm bài trắc nghiệm, Quản lý bài học, Ghi danh khóa học để tìm các luồng ngoại lệ/luồng phụ còn thiếu (như hết giờ, hết lượt làm bài, trùng lặp ghi danh)"
- **Kết quả AI phản hồi & Đánh giá:**
    AI đã liệt kê đầy đủ luồng chính và bổ sung chính xác các luồng ngoại lệ thực tế (hết giờ đếm ngược tự động nộp bài, hết số lượt làm bài cho phép quiz_attempts, và xử lý lỗi ràng buộc duy nhất UNIQUE(user_id, course_id) khi ghi danh).

- **Bài học rút ra**: Tiết kiệm hơn 70% thời gian soạn thảo tài liệu đặc tả.
## AI-02: Thiết kế Sequence Diagram "Làm bài trắc nghiệm" & Lập Biên bản họp nhóm 02
- **Thời gian:** 17:30 – 20:15 (Thứ 3, Ngày 2 – Tuần 1)
- **Công cụ AI:** Gemini
- **Prompt:**   
    "Gợi ý mã PlantUML cho Sequence Diagram chức năng 'Làm bài trắc nghiệm' gồm 2 Phase: start (tạo lượt quiz_attempts, ghi start_time, trả câu hỏi KHÔNG kèm đáp án) và submit (kiểm tra thời gian, chấm điểm, lưu DB). Đồng thời soạn mẫu Biên bản họp nhóm 02 lúc 20:00 chốt đại diện trình bày Mốc 1 "
- **Kết quả AI phản hồi & Đánh giá:**
    AI đã sinh mã PlantUML chính xác theo kiến trúc 3 lớp (Controller -> Service -> DB), phân tách đúng 2 phase start và submit, xử lý ẩn đáp án đúng để chống hack/inspect F12 . Mẫu Biên bản họp 02 được soạn ngắn gọn, đúng các mục tiêu rà soát tiến độ và phân công báo cáo Mốc 1
- **Bài học rút ra**: 
    Khi thiết kế Sequence Diagram cho chức năng thi/làm bài trắc nghiệm, luôn phải bảo mật đáp án bằng cách không trả về correct_option cho phía Client ở bước khởi tạo

    Toàn bộ logic tính toán thời gian làm bài thực tế và chấm điểm phải được thực hiện và kiểm tra ở phía Server/Backend khi người dùng bấm submit để chống gian lận