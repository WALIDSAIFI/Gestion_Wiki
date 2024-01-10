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
        success: function(response) {

            console.log("Login successful:", response);
        },
        error: function(error) {
            // Handle the error response here
            console.error("Error during login:", error);
        }
    });

});
