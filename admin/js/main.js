function register(event) {
    event.preventDefault();

    var formData = new FormData($("form")[0]);
    formData.append("register", true);

    $.ajax({
        url: "../controller/functions.php",
        method: "post",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (response) {
            if (response == 1) {
                alert("REGISTERED SUCCESSFULLY!");
                window.location.href = "login.php";
            } else {
                alert(response);
            }
        },
    });
}

function login(event) {
    event.preventDefault();

    var formData = new FormData($("form")[0]);
    formData.append("login", true);

    $.ajax({
        url: "../controller/functions.php",
        method: "post",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (response) {
            if (response == 1) {
                alert("LOGIN SUCCESSFULLY!");
                location.reload();
            } else {
                alert(response);
            }
        },
    });
}

function addBtn(event) {
    event.preventDefault();

    var formData = new FormData($("form")[0]);
    formData.append("addProduct", true);

    $.ajax({
        url: "../controller/functions.php",
        method: "post",
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (response) {
            if (response == 1) {
                alert("PRODUCT ADDED SUCCESSFULLY!");
                location.reload();
            } else {
                alert(response);
            }
        },
    });
}




function showProductBtn() {
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





function ManageBtn(productId) {
    window.location.href = "manage.php?updateID=" + productId;
}


function DeleteBtn(productId){
    window.location.href = "manage.php?deleteID=" + productId;
}



function searchProducts() {
    var searchInput = $("#searchInput").val().trim().toLowerCase();

    $("tbody tr").each(function() {
        var productName = $(this).find("td:nth-child(2)").text().toLowerCase();
        var productDescription = $(this).find("td:nth-child(3)").text().toLowerCase();

        if (productName.includes(searchInput) || productDescription.includes(searchInput)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}





// function searchProducts() {
//     var searchInput = $("#searchInput").val().toLowerCase();
//     window.location.href = "inventory.php?query=" + searchInput;
// }


$("#searchInput").keydown(function (event) {
    if (event.key === "Enter") {
        searchProducts();
    } else if (event.key === "Backspace") {
        $("#searchInput").value = "";
        searchProducts();
    }
});

function increaseValue() {
    var value = parseInt($("#productQuantity").val(), 10);
    value = isNaN(value) ? 0 : value;
    value++;
    $("#productQuantity").val(value);
}

function decreaseValue() {
    var value = parseInt($("#productQuantity").val(), 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? (value = 1) : "";
    value--;
    $("#productQuantity").val(value);
}

$(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
        $("#content").toggleClass("active");
    });
});
