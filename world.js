document.addEventListener("DOMContentLoaded", () => {
    // Select the button and input elements
    const lookupButton = document.getElementById("lookup");
    const countryInput = document.getElementById("country");
    const resultDiv = document.getElementById("result");
    const lookupButton2 = document.getElementById("lookup2");

    lookupButton2.addEventListener{
        

    }
  
    // Add an event listener to the "Lookup" button
    lookupButton.addEventListener("click", () => {
        console.log('working')
      // Get the country input value
      const country = countryInput.value.trim();
  
      // Construct the URL with the query parameter
      const url = `world.php?country=${encodeURIComponent(country)}`;
  
      // Create an AJAX request
      const xhr = new XMLHttpRequest();
      xhr.open("GET", url, true);
  
      // Define the callback function to handle the response
      xhr.onload = function () {
        if (xhr.status === 200) {
          // Insert the response into the #result div
          resultDiv.innerHTML = xhr.responseText;
        } else {
        
          resultDiv.innerHTML = `<p>Error: Unable to fetch data</p>`;
        }
      };
  
    
      xhr.onerror = function () {
        resultDiv.innerHTML = `<p>Network error occurred. Please try again.</p>`;
      };
  
      

      xhr.send();
    });

    lookupButton2.addEventListener('click',function(){
        $co


    })




  });
  