function register(event){
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
            if(response == 1){
                alert('REGISTERED SUCCESSFULLY!');
                window.location.href = 'login.php';
            }else{
                alert(response);
            }
        }
    });
}

function login(event){
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
            if(response == 1){
                alert('LOGIN SUCCESSFULLY!');
                location.reload();
            }else{
                alert(response);
            }
        }
    });
}



function addBtn(event) {
    event.preventDefault();

    var formData = new FormData($('form')[0]);
    formData.append('addProduct', true);

    $.ajax({
        url: '../controller/functions.php',
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function(response) {
            if (response == 1) {
                alert('PRODUCT ADDED SUCCESSFULLY!');
                location.reload();
            } else {
                alert(response);
            }
        }
    });
}





function addproductBtn() {
    var floatingForm = document.getElementById("floatingForm");
    var overlay = document.getElementById("overlay");

    floatingForm.style.display = "block";
    overlay.style.display = "block";
}

function cancelBtn() {
    var floatingForm = document.getElementById("floatingForm");
    var overlay = document.getElementById("overlay");

    floatingForm.style.display = "none";
    overlay.style.display = "none";
}




function searchProducts() {
    var search = document.getElementById("searchInput").value.toLowerCase();
    var cards = document.getElementsByClassName("card");

    for (var i = 0; i < cards.length; i++) {

    }
}


document.getElementById("searchInput").addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        searchProducts();
    } else if (event.key === "Backspace") {
        document.getElementById("searchInput").value = "";
        searchProducts();
    }
});




function increaseValue() {
    var value = parseInt(document.getElementById('productQuantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('productQuantity').value = value;
}

function decreaseValue() {
    var value = parseInt(document.getElementById('productQuantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('productQuantity').value = value;
}


$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });
});