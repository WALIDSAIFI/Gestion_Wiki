console.log("hello youcode");

const ajouter = document.getElementById('ajouter');

ajouter.addEventListener('click', () => {

    const titre = document.getElementById('titre').value;
    console.log(titre);
    var formData = new FormData();
    formData.append('titre', titre);
    formData.append('ajouter',ajouter);
    console.log(formData);

    $.ajax({
        type: "POST",
        url: "http://localhost/WALID_SAIFI_Wiki/index.php?page=dashbord",
        data: formData,
        processData: false,
        contentType: false,
        success: (response) => {
            const data = JSON.parse(response);
            console.log(data);

            if (data.success) {
                alert(data.success);
                document.getElementById('titre').value = "";
            }else if (data.errors) {
                var err= data.errors;
                if(err.titre!= false){
                    $("#titre_err").text(err.titre);
                }

            }



        },
        error: (error) => {
            console.log(error);
        }
    });
});
