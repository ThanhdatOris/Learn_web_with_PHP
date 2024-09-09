$(document).ready(function(){
    // Khi nhấp vào liên kết navbar hoặc sidebar
    $('.navbar ul li a, .sidebar ul li a').click(function(e){
        e.preventDefault(); // Ngăn không cho load lại trang
        var page = $(this).attr('href'); // Lấy đường dẫn từ href
        // Sử dụng Ajax để tải nội dung mới
        $.ajax({
            url: page,
            success: function(response) {
                // Hiển thị nội dung nhận được vào phần content
                $('.content').html(response);
            }
        });
    });
});
