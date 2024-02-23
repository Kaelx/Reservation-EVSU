function add(event){
    event.preventDefault();

    var formData = $('form').serialize();

    $.ajax({
        url: '../controller/functions.php',
        method: 'post',
        data: formData + '&register=true',
        success: function (response) {
            if(response == 1){
                alert('Registered successfully');
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
                alert('Login successfully');
                location.reload();
            }else{
                alert(response);
            }
        }
    });
}