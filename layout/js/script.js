document.addEventListener('DOMContentLoaded', function() {
    var searchIcon = document.getElementById('search-icon');
    var searchForm = document.querySelector('.search-form');
    var loginForm = document.getElementById("loginForm");
    searchIcon.addEventListener('click', function() {
        searchForm.style.display = 'block';
         
        loginForm.style.display = 'none'; // Ẩn tab-comment
    });
    document.addEventListener('click', function(event) {
            if (!searchForm.contains(event.target) && event.target.id !== 'search-icon') {
                searchForm.style.display = 'none';
            }
        });
   
});

function toggleLoginForm() {
    var loginForm = document.getElementById("loginForm");
    loginForm.style.display = (loginForm.style.display === "none" || loginForm.style.display === "") ? "block" : "none";
    
  }


document.addEventListener('DOMContentLoaded', function() {
    var tabHome = document.getElementById('tab-home');
    var tabComment = document.getElementById('tab-conment');
    var pills= document.getElementById('pills-home-tab');
    var profiletab= document.getElementById('pills-profile-tab');
   

    // Ẩn tab-comment ban đầu
    tabComment.style.display = 'none';

    // Lắng nghe sự kiện click trên nút "Chi tiết sản phẩm"
    document.getElementById('pills-home-tab').addEventListener('click', function() {
        tabHome.style.display = 'block'; // Hiện tab-home
        tabComment.style.display = 'none'; // Ẩn tab-comment
        pills.classList.add('active'); // Thêm lớp active
        profiletab.classList.remove('active'); // Thêm lớp active
    });

    // Lắng nghe sự kiện click trên nút "Đánh giá"
    document.getElementById('pills-profile-tab').addEventListener('click', function() {
        tabHome.style.display = 'none'; // Ẩn tab-home
        tabComment.style.display = 'block'; // Hiện tab-comment
        profiletab.classList.add('active'); // Thêm lớp active
        pills.classList.remove('active'); // Thêm lớp active
    });
    
   
});

// form 
document.getElementById('dangnhap').addEventListener('click', function() {
    document.getElementById('form-input').style.display = 'block';
    document.getElementById('dangky').style.background = 'none';
    document.getElementById('form-input2').style.display = 'none';
    document.getElementById('dangnhap').style.background = 'white;';
    
});
document.getElementById('dangky').addEventListener('click', function() {
    document.getElementById('form-input').style.display = 'none';
    document.getElementById('dangnhap').style.background = 'none';
    document.getElementById('form-input2').style.display = 'block';
    document.getElementById('dangky').style.background = 'white';
});

// RELOAD IFRAME 


function togglePassword(inputId, eyeIconId) {
    var inputElement = document.getElementById(inputId);
    var eyeIcon = document.getElementById(eyeIconId);

    if (inputElement.type === "password") {
        inputElement.type = "text";
        eyeIcon.classList.remove('bx-low-vision');
        eyeIcon.classList.add('bx-show');
    } else {
        inputElement.type = "password";
        eyeIcon.classList.remove('bx-show');
        eyeIcon.classList.add('bx-low-vision');
    }
}
