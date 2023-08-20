$(document).ready(function() {
  
  $(document).on("click", ".btn-delete4", function() {
    var driverid = $(this).data("driverid");
    const email = $(this).closest('tr').find('td:eq(2)').text();
    var rejectButton = $(this);
    var tableRow = rejectButton.closest("tr");

    $("#rejectConfirmationModal").modal("show");

   
    $("#confirmRejectBtn").off().on("click", function() {
      $.ajax({
        url: "../api/admin/deleteform/deleteApp.php",
        method: "POST",
        data: { driverid: driverid, email: email },
        success: function(response) {
          console.log(response);
          if (response === "Application Cannot be rejected") {
            //window.location.href = "http://localhost/transportation/admin?msg=busfailed";
          } else {
            tableRow.remove(); 
          }

          $("#rejectConfirmationModal").modal("hide");
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });

    
    $("#confirmRejectBtn").one("click", function() {
      $("#rejectConfirmationModal").modal("hide");
      tableRow.remove();
    });
  });


  $(document).on("click", ".accept-driver", function() {
    var driverid = $(this).data("driverid");
    const email = $(this).closest('tr').find('td:eq(2)').text();
    var acceptButton = $(this);
    var tableRow = acceptButton.closest("tr");

    $("#acceptConfirmationModal").modal("show");

    
    $("#confirmAcceptBtn").off().one("click", function() {
      $.ajax({
        url: "../api/admin/editform/acceptdriver.php",
        method: "POST",
        data: { driverid: driverid, email: email },
        success: function(response) {
          console.log(response);
          if (response.success) {
            tableRow.remove(); 
          } else {
            console.log(response.message);
          }
          $("#acceptConfirmationModal").modal("hide");
        },
        error: function(xhr, status, error) {
          console.log("AJAX Error: " + error);
          console.log(xhr.responseText);
        }
      });
    });

    
    $("#confirmAcceptBtn").one("click", function() {
      $("#acceptConfirmationModal").modal("hide");
      tableRow.remove();
    });
  });
});
