

  $(document).ready(function() {


    let modal = $(".modal-container");
    let  btn = $(".btn-delete5");
   
    let closeBtn = $(".btn");
    
    
    // EventListener
    btn.on("click", function() {
      modal.addClass("show");
    });
    
    closeBtn.each(function() {
      $(this).on("click", function() {
        modal.removeClass("show");
      });
    });
    
    $(window).on("click", function(event) {
      if (event.target == modal[0]) {
        modal.removeClass("show");
      }
    });

    const submit_rate = document.getElementById('submit_rate');
  
    submit_rate.addEventListener('click', (e) => {
      e.preventDefault();
      const ratevalue = document.querySelector('.ratevalue');
    
      if (ratevalue.value === '') {
        document.querySelector('.rateerror').innerHTML = 'Please Enter a Value';
      } else {
       // document.querySelector('.rateerror').innerHTML = '';
  
        $.ajax({
          url: '../api/admin/editform/rate.php',
          method: 'POST',
          data: { rate: ratevalue.value },
          success: function(response) {
            if (response == 'Rate Changed Successully') {
              
              document.querySelector('.rateerror').innerHTML = `
              <div class="alert alert-primary rateerror" role="alert" style="position: absolute; top: 40%; left: 60%; width: 40%; padding: 0px; animation: fadeOut 3s forwards;">
                ${response}
              </div>
            `;
            
            } else {
              alert(response);
            }
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
      }
    });
  });

  