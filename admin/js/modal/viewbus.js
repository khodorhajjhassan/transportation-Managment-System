$(document).ready(function() {
  // Event binding for .btn-editbus
  $(document).on('click', '.btn-editbus', function() {
    const $row = $(this).closest('tr');

    const busId = $(this).data('busid');
    const driverId = $row.find('td:eq(1)').data('driverid');
    const driverName = $row.find('td:eq(1)').text().trim();
    const mechanicDueDate = $row.find('td:eq(4)').text();
    const insuranceNumber = $row.find('td:eq(5)').text();

    $('#editModalbus').find('#Drivername').val(driverId);
    $('#editModalbus').find('#Mechanicdue').val(mechanicDueDate);
    $('#editModalbus').find('#Insurance').val(insuranceNumber);
    $('#editModalbus').find('.savebus').data('busid', busId);

    $('#editModalbus').modal('show');
  });

  // Event binding for .editbus
  $(document).on('click', '#editModalbus .savebus', function(e) {
    e.preventDefault();

    const busId = $(this).data('busid');
    const driverName = $('#editModalbus #Drivername').val();
    const mechanicDueDate = $('#editModalbus #Mechanicdue').val();
    const insuranceNumber = $('#editModalbus #Insurance').val();
    $('#editModalbus').modal('hide');

    $.ajax({
      url: '../api/admin/editform/editbus.php',
      method: 'POST',
      data: {
        busId: busId,
        driverName: driverName,
        mechanicDueDate: mechanicDueDate,
        insuranceNumber: insuranceNumber
      },
      success: function(response) {
        const $tableRow = $('tr[data-busid="' + busId + '"]');
        const driverName2 = $('#editModalbus #Drivername option:selected').text();
        $tableRow.find('td:eq(1)').text(driverName2);
        $tableRow.find('td:eq(4)').text(mechanicDueDate);
        $tableRow.find('td:eq(5)').text(insuranceNumber);
        
      },
      error: function(xhr, status, error) {
        console.log('error =>', error);
        // Handle error
      }
    });
  });

  // Reset form on modal hide
  $('#editModalbus').on('hidden.bs.modal', function() {
    $('#editForm')[0].reset();
    $('#editModalbus').find('.savebus').off('click');
  });

  // Event binding for .btn-delete2
  $(document).on('click', '.btn-delete2', function() {
    const busid = $(this).data('busid');
    
    const deleteButton = $(this);
  
    $('#deleteConfirmationbusModal').modal('show');
  
    $('#confirmDeleteBus').data('busid', busid);
    $('#confirmDeleteBus').data('deleteButton', deleteButton);
    
  });
  
  
    $(document).on('click', '#confirmDeleteBus', function() {
    const busid = $(this).data('busid');
    const deleteButton = $(this).data('deleteButton');
  
    $.ajax({
      url: '../api/admin/deleteform/deleteBus.php',
      method: 'POST',
      data: { busid: busid },
      success: function(response) {
        if (response === 'Bus Cannot be deleted') {
          //window.location.href = "http://localhost/transportation/admin?msg=busfailed";
          alert(response);
        } else if(response === 'Bus deleted successfully.'){
          deleteButton.closest('tr').remove();
        }
  
        $('#deleteConfirmationbusModal').modal('hide');
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
});
