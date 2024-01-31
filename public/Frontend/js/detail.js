$(document).ready(function () {

    // Đánh giá star
    const stars = document.querySelectorAll('.star');
    stars.forEach(function(star) {
        star.addEventListener('mouseover', function() {
          highlightStars(star.dataset.index);
        });

        star.addEventListener('mouseout', function() {
            if (!star.classList.contains('clicked')) {
                removeHighlight();
            }
        });

        star.addEventListener('click', function() {
            const clickedIndex = star.dataset.index;

            // loại bỏ tất cả các lớp clicked
            stars.forEach(function(star) {
              star.classList.remove('clicked');
            });

            // thêm lớp 'clicked' cho tất cả các ngôi sao có index lớn hơn hoặc bằng ngôi sao được click
            stars.forEach(function(star) {
              if (star.dataset.index >= clickedIndex) {
                star.classList.add('clicked');
              }
            });

            // gán giá trị cho input Star
            $('input[name="star"]').val(clickedIndex);
            $('.error_star').hide();
        });

    });

    function highlightStars(index) {
        for (let i = 0; i < index; i++) {
            $(stars[i]).children().addClass('bxs-star');
        }
    }

    function removeHighlight() {
        stars.forEach(function(star) {
            $(stars).children().removeClass('bxs-star');
        });
    }

    $('.btn-submit').click(function(){
        var star = $('input[name="star"]').val();
        if(star == ''){
            $('.error_star').text('Vui lòng chọn đánh giá');
        }
    });

    // Validate form_comment
    $('#form_comment').validate({
        rules: {
            name: { required: true },
            email: { required: true, email: true },
            comment: { required: true },
            robot: {required: true},
        },
        messages: {
            name: { required: "Thông tin bắt buộc" },
            email: { required: "Thông tin bắt buộc", email: "Email không hợp lệ" },
            comment: { required: "Thông tin bắt buộc" },
            robot: {required: "Vui lòng check vào ô !"},
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

});
