
const titre = document.getElementById('titre').value;

var formData = new FormData();
formData.append('titre', titre);

$.ajax({
    type: "POST",
    url: "http://localhost/WALID_SAIFI_Wiki/index.php?page=dashbord",
    data: formData,
    processData: false,
    contentType: false,
    success: (response) => {

        const data = JSON.parse(response);
        
    },
    error: (error) => {
        console.log(error);
    }
});




