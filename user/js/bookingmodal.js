
    let modal = $(".modal-container");
    let  btn = $(".btn-refund");
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
    const currency = document.querySelector('.currencycontainer');
       currency.style.display='none';

       $(document).ready(function() {
        $(".btn-feedback").click(function() {
          var tripid = $(this).data("tripid");
          $("#feedback-tripid").val(tripid);
        });
      });
  
  
  // Function to open the feedback modal
  function openFeedbackModal() {
    $('#form').modal('show');
  }
  
      $(document).ready(function() {
      var tripIdToDelete = null;
  
      // Open the cancellation confirmation modal
      $(".btn-refund").click(function() {
        tripIdToDelete = $(this).data("tripid");
        $("#myModal").fadeIn();
      });
  
      // Close the cancellation confirmation modal
      $(".btn-cancel").click(function() {
        $("#myModal").fadeOut();
      });
  
      // Perform the trip cancellation
      $(".btn-confirm").click(function() {
        if (tripIdToDelete) {
          $.ajax({
            type: "POST",
            url: "userbooking.php",
            data: { canceltrip: true, tripid: tripIdToDelete },
            success: function(response) {
             window.location.href = "userbooking.php?msg=delete-success";
            },
            error: function() {
              console.log("Error: Failed to cancel the trip.");
            }
          });
        }
      });
    });
  
  
        err=document.getElementById("err");
        setTimeout(function() {
          document.getElementById("err").style.display = "none";
        }, 3000);
  
  
  
  