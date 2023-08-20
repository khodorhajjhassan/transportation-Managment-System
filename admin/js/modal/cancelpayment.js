$(document).ready(function() {

  $(document).on('click', '.icon-trash', function() {
    const canceledid = $(this).data('canceledid');

    const deleteButton = $(this);

    $('#refundUser').modal('show');

    $('#confirmDeletePayment').data('canceledid', canceledid);
    $('#confirmDeletePayment').data('deleteButton', deleteButton);

  });

  $(document).on('click', '#confirmDeletePayment', function() {
    const canceledid = $(this).data('canceledid');
    const deleteButton = $(this).data('deleteButton');

    $.ajax({
      url: '../api/admin/deleteform/CancelPayment.php',
      method: 'POST',
      data: { canceledid: canceledid },
      success: function(response) {
        if (response.success) {
          $(deleteButton).find('i').removeClass('fa-circle-xmark').addClass('fa-circle-check').css('color', '#2e64e5');
          $(deleteButton).prop('disabled', true);
        } else {
          alert(response.message);
        }
        
        $('#refundUser').modal('hide');
      },
      
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
});
