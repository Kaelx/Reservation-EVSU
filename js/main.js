function register(event) {
    event.preventDefault();

    var formData = new FormData($('form')[0]);
    formData.append('register', true);

    $.ajax({
        url: '../controller/functions.php',
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (response) {
            if (response == 1) {
                alert('REGISTERED SUCCESSFULLY!');
                window.location.href = 'login.php';
            } else {
                alert(response);
            }
        }
    });
}

function login(event) {
    event.preventDefault();

    var formData = new FormData($('form')[0]);
    formData.append('login', true);

    $.ajax({
        url: '../controller/functions.php',
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (response) {
            if (response == 1) {
                alert('LOGIN SUCCESSFULLY!');
                location.reload();
            } else {
                alert(response);
            }
        }
    });
}



$(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
        $("#content").toggleClass("active");
    });
});


var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 1000);
}

function showPage() {
    $("#loader").hide();
    $("#myDiv").show();
}