document.addEventListener("DOMContentLoaded", () => {
    //getting elements from the html by id
    const lookupButton = document.getElementById("lookup");
    const countryInput = document.getElementById("country");
    const resultDiv = document.getElementById("result");
    const lookupButton2 = document.getElementById("lookup2");

    // Handles the country lookup
    lookupButton.addEventListener("click", () => {
        const country = countryInput.value.trim();
        const url = `world.php?country=${encodeURIComponent(country)}&lookup=country`;

        const xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                resultDiv.innerHTML = xhr.responseText;
            } else {
                resultDiv.innerHTML = `<p>Error: Unable to fetch data</p>`;
            }
        };


        xhr.send();
    });

    // Handle the city lookup
    lookupButton2.addEventListener('click', () => {
        const country = countryInput.value.trim();
        const url = `world.php?country=${encodeURIComponent(country)}&lookup=cities`;

        const xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                resultDiv.innerHTML = xhr.responseText;
            } else {
                resultDiv.innerHTML = `<p>Error: Unable to fetch data</p>`;
            }
        };



        xhr.send();
    });
});
