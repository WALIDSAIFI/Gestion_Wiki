

const ajouter_categories = document.getElementById('ajouter_categories');

ajouter_categories.addEventListener('click', () => {

    const nom_categories = document.getElementById('nom_categories').value;
    console.log(nom_categories);
    var formData = new FormData();
    formData.append('nom_categories', nom_categories);
    formData.append('ajouter_categories', ajouter_categories);


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
                document.getElementById('nom_categories').value = "";
                $("#categories_err").text("");
            }else if (data.errors) {
                var err= data.errors;
                if(err.categories!= false){
                    $("#categories_err").text(err.categories);
                }

            }



        },
        error: (error) => {
            console.log(error);
        }
    });

});
