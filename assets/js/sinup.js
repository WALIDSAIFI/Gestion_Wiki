console.log("hello youcode");
const signup = document.getElementById('signup');

signup.addEventListener('click', () => {
    const prenom = document.getElementById('prenom').value;
    const nom = document.getElementById('nom').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    /* console.log(prenom);
     console.log(nom);
     console.log(email);
     console.log(password);
    */
    var formData = new FormData();
    formData.append('prenom', prenom);
    formData.append('nom', nom);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('req', 'signup');
    //console.log(formData);

    $.ajax({
        type: "POST",
        url: "index.php?page=sinup",
        data: formData,
        processData: false,
        contentType: false,
        success: (response) => {
            const data = JSON.parse(response);
            
            if (data.success) {
                alert(data.success);
            } else if (data.errors) {
                // console.log(data.errors);
                var err= data.errors;
                console.log(err);
                if(err.firstName_err!= false){
                    $("#First_err").text(err.firstName_err)
                    
                }else{
                    $("#First_err").text('');

                }
                if(err.lastName_err!= false){
                    $("#last_err").text(err.lastName_err)
                }else{
                    $("#last_err").text('');
                }
                if(err.email_err!= false || err.userexists_err!= false){
                    $("#email_err").text(err.email_err)
                    $("#email_err").text(err.userexists_err)
                }else{
                    $("#email_err").text('');
                }
                if(err.password_err!= false){
                    $("#password_err").text(err.password_err)
                }else{
                    $("#password_err").text('');
                }
                
            }

        },
        error: (error) => {
            console.log(error);
        }
    })

    
});
