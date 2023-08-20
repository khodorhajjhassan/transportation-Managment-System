$(document).ready(function() {
  $(document).on("click", ".btn-delete4", function() {
    var vacationid = $(this).data("vacationid");
    var rejectButton = $(this);
    var acceptButton = rejectButton.closest("tr").find(".accept-request");

    $("#rejectConfirmationModal").modal("show");

    $("#confirmRejectBtn").off().one("click", function() {
      $.ajax({
        url: "../api/admin/deleteform/deleteRequest.php",
        method: "POST",
        data: { vacationid: vacationid },
        success: function(response) {
          console.log(response);
          if (response === "Request Cannot be rejected") {
          } else {
            disableButtons(rejectButton, acceptButton);
            window.location.reload(); 
          }
          $("#rejectConfirmationModal").modal("hide");
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });

  $(document).on("click", ".accept-request", function() {
    var vacationid = $(this).data("vacationid");
    var acceptButton = $(this);
    var rejectButton = acceptButton.closest("tr").find(".btn-delete4");

    $("#acceptConfirmationModal").modal("show");

    $("#confirmAcceptBtn").off().one("click", function() {
      $.ajax({
        url: "../api/admin/editform/acceptRequest.php",
        method: "POST",
        data: { vacationid: vacationid },
        success: function(response) {
          console.log(response);
          if (response.success) {
            disableButtons(rejectButton, acceptButton);
            window.location.reload(); 
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
  });

  function disableButtons(rejectButton, acceptButton) {
    rejectButton.attr("disabled", true);
    acceptButton.attr("disabled", true);
  }
});
