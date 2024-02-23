function add(event){
    event.preventDefault();

    var formData = $('form').serialize();

    $.ajax({
        url: '../controller/functions.php',
        method: 'post',
        data: formData + '&register=true',
        success: function (response) {
            alert(response);
            location.reload();
        }
    });
}