console.log("login is ------------------");

const login = document.getElementById('login');
login.addEventListener('click', () => {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    console.log(email);
    console.log(password);

    var formData = new  FormData();
    formData.append('email',email);
    formData.append('password',password);
    formData.append('login','login');

    console.log(formData);

    $.ajax({
        type: "POST",
        url: "http://localhost/WALID_SAIFI_Wiki/index.php?page=login",
        data: formData,
        processData: false,
        contentType: false,
        success: (response) => {
            const data = JSON.parse(response);

            if (data.success) {
                alert(data.success);
            } else if (data.errors) {
                var err = data.errors;
                console.log(err);

                if (err.email_err != false) {
                    $("#email_err").text(err.email_err);
                } else {
                    $("#email_err").text('');
                }
                if (err.password_err != false) {
                    $("#password_err").text(err.password_err);
                } else {
                    $("#password_err").text('');
                }
            }
        },
        error: function (error) {
            console.error("Error during login:", error);
        }
    });




});
