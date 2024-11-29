document.addEventListener('DOMContentLoaded', function() {
    const $lookup = document.getElementById('lookup');

    $lookup.addEventListener('click', function(e){
        e.preventDefault();
        let url =`world.php?country=${country}`
        let xhr = new XMLHttpRequest()
        xhr.open('GET',url,true);
       

        xhr.onload= function(){
            if(xhr.status== 200){
                console.log("Success")

            //getting responsive from the json
            const country = JSON.parse(xhr.responseText);

            // Get the result div and display the data
            const resultDiv = document.getElementById('result');
            //clearing the div
            resultDiv.innerHTML = '';
            if (data.length > 0) {
                data.forEach(country => {
                    const countryInfo = `<p>${country.name} is ruled by ${country.head_of_state}</p>`;
                    resultDiv.innerHTML += countryInfo;
                });
            } else {
                resultDiv.innerHTML = 'No data found for the country.';
            }

            }
        }
    })
    

    

});
