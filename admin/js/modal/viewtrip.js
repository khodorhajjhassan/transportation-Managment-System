$(document).ready(function() {
  $(document).on('click', '.btn-edittrip', function() {
    const tripId = $(this).data('tripid');
    const date = $(this).closest('tr').find('td:eq(3)').text();
    const startTime = $(this).closest('tr').find('td:eq(4)').text();
    const arriveTime = $(this).closest('tr').find('td:eq(5)').text();
    const driver = $(this).closest('tr').find('td:eq(6) h6').text();

    $('#editModaltrip').find('#date').val(date);
    $('#editModaltrip').find('#startTime').val(startTime);
    $('#editModaltrip').find('#arriveTime').val(arriveTime);
    $('#editModaltrip').find('#driver').val(driver);
    
    
    $('#editModaltrip').find('.savetrip').data('tripid', tripId);

    $('#editModaltrip').modal('show');
  });

  $(document).on('click', '#editModaltrip .savetrip', function(e) {
    e.preventDefault();

    const tripId = $(this).data('tripid');
    const date = $('#editModaltrip #date').val();
    const startTime = $('#editModaltrip #startTime').val();
    const arriveTime = $('#editModaltrip #arriveTime').val();
    $('#editModaltrip').modal('hide');
    
    $.ajax({
      url: '../api/admin/editform/edittrip.php',
      method: 'POST',
      data: {
        tripId: tripId,
        date: date,
        startTime: startTime,
        arriveTime: arriveTime,
      },
      success: function(response) {
        const $tableRow = $('tr[data-tripid="' + tripId + '"]');
        
        $tableRow.find('td:eq(3)').text(date);
        $tableRow.find('td:eq(4)').text(startTime);
        $tableRow.find('td:eq(5)').text(arriveTime);
      },
      error: function(xhr, status, error) {
        console.log('error=>', error);
      }
    });
  });

  $('#editModal').on('hidden.bs.modal', function() {
    
    $('#editModal').find('form')[0].reset();
    $('#editModal').find('.savetrip').off('click');
  });

  $(document).on('click', '.btn-delete1', function() {
    const tripId = $(this).data('tripid');
    const deleteButton = $(this);
    $('#deleteConfirmationModal').modal('show');
    $('#confirmDeleteBtn').data('tripId', tripId);
    $('#confirmDeleteBtn').data('deleteButton', deleteButton);
    console.log(deleteButton)
  });
  
  $(document).on('click', '#confirmDeleteBtn', function() {
    const tripid = $(this).data('tripId');
    const deleteButton = $(this).data('deleteButton');
    console.log(tripid);
    console.log(deleteButton);
    $.ajax({
        url: '../api/admin/deleteform/deletetrip.php',
        method: 'POST',
        data: { tripid: tripid },
        success: function(response) {
            if (response === 'Trip Cannot be deleted') {
                alert(response);
            } else if (response === 'Trip deleted successfully.') {
                deleteButton.closest('tr').remove();
            }
            $('#deleteConfirmationModal').modal('hide');
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });   
});

});
