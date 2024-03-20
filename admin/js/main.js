function add(event){
    event.preventDefault();

    var formData = $('form').serialize();

    $.ajax({
        url: '../controller/functions.php',
        method: 'post',
        data: formData + '&register=true',
        success: function (response) {
            if(response == 1){
                alert('REGISTERED SUCCESSFULLY!');
                location.reload();
            }else{
                alert(response);
            }
        }
    });
}

function login(event){
    event.preventDefault();

    var formData = $('form').serialize();

    $.ajax({
        url: '../controller/functions.php',
        method: 'post',
        data: formData + '&login=true',
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

function addBtn(event){
    alert('clicked');
    // event.preventDefault();

    // var formData = $('form').serialize();

    // $.ajax({
    //     url: '../controller/functions.php',
    //     method: 'post',
    //     data: formData + '&addproduct=true',
    //     success: function (response) {
    //         if(response == 1){
    //             alert('PRODUCT ADDED SUCCESSFULLY!');
    //             location.reload();
    //         }else{
    //             alert(response);
    //         }
    //     }
    // });

}




function searchProducts(event){
    alert('clicked');
}



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