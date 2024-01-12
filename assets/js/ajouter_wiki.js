console.log("ajouter Wiki");

const ajouter_wiki = document.getElementById('ajouter_wiki');

ajouter_wiki.addEventListener('click', () => {
    const titre = document.getElementById('titre').value;
    const content = document.getElementById('content').value;
    const selectedTags = Array.from(document.getElementById('tags').selectedOptions).map(option => option.value);
    const category = document.getElementById('category').value;

    var formData = new FormData();
    formData.append('titre', titre);
    formData.append('content', content);
    formData.append('selectedTags', selectedTags);
    formData.append('category', category);
    formData.append('ajouter_wiki',ajouter_wiki);

    console.log(formData);
    console.log(selectedTags);


    $.ajax({
        type: "POST",
        url: "http://localhost/WALID_SAIFI_Wiki/index.php?page=home",
        data: formData,
        processData: false,
        contentType: false,
        success: (response) => {
            const data = JSON.parse(response);
            console.log(data);

            if (data.success) {
                alert(data.success);
            }else {
                if (data.errors) {
                    var err= data.errors;
                    if(err.titre!= false) {
                        $("#titre_err").text(err.titre);
                    }else {
                        $("#titre_err").text("");
                    }
                    }if(err.content !=  false){
                        $("#content_err").text(err.content);
                    }else{
                    $("#content_err").text("");
                }
            }



        },
        error: (error) => {
            console.log(error);
        }
    });


});
