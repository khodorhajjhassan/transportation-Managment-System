const currencyLink = document.getElementById("currency");

const result_container= document.getElementById('result-container');

      currencyLink.addEventListener("click", function (event) {
        event.preventDefault();

        if (currencyLink.textContent === "Lira") {
          currencyLink.textContent = "USD";
          currencyLink.style.setProperty("--currency-content", '" Lira"');
        } else {
          currencyLink.textContent = "Lira";
          currencyLink.style.setProperty("--currency-content", '" USD"');
        }
        const xhr = new XMLHttpRequest();
        const url = "../api/user/loggedSearch.php";
        const currency = currencyLink.textContent;
        let origin = document.getElementById('origin').value;
        let destination = document.getElementById('destination').value;
        let tripdate = document.getElementById('tripdate').value;
        let triptime = document.getElementById('triptime').value;
        let resultcount = document.getElementById('result-count');
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            const res = this.responseText;
            const parser = new DOMParser();
            const htmlDoc = parser.parseFromString(res, 'text/html');
            spanValue = htmlDoc.querySelector('span').getAttribute('value');
            
            resultcount.innerHTML=spanValue;
            result_container.innerHTML=res;
            // console.log(content.textContent);
            
          }
        };
        let requestBody = "origin=" + encodeURIComponent(origin) + "&destination=" + encodeURIComponent(destination) + "&currency=" + encodeURIComponent(currency);
         
        if(tripdate && triptime)
        {
          requestBody+="&tripdate=" + encodeURIComponent(tripdate) +"&triptime=" + encodeURIComponent(triptime)
        }
        else if(tripdate)
        {
          requestBody+="&tripdate=" + encodeURIComponent(tripdate);
        }
        else if(triptime)
        {
          requestBody+="&triptime=" + encodeURIComponent(triptime);
        }
        xhr.send(requestBody);
       
      });


