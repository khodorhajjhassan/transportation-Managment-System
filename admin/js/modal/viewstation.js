$(document).ready(function() {
     
    $(document).on('click', '.btn-editstation', function() {

        const stationid = $(this).data('stationid');    
        const stationname = $(this).closest('tr').find('td:eq(1)').text();
        const provincename = $(this).closest('tr').find('td:eq(2)').text();
        const capacity = $(this).closest('tr').find('td:eq(3)').text();
       
    
        $('#editModalStation').find('#stationname').val(stationname);
        $('#editModalStation').find('#provincename').val(provincename);
        $('#editModalStation').find('#capacity').val(capacity);
       
        
        
        $('#editModalStation').find('.savestation').data('stationid', stationid);
    
        $('#editModalStation').modal('show');
      });
    
      $(document).on('click', '#editModalStation .savestation', function(e) {
        e.preventDefault();
    
        const stationid = $(this).data('stationid');
        const stationname = $('#editModalStation #stationname').val();
        const provincename = $('#editModalStation #provincename').val();
        const capacity = $('#editModalStation #capacity').val();
        $('#editModalStation').modal('hide');
        $.ajax({
            url: '../api/admin/editform/editstation.php',
            method: 'POST',
            data: {
              stationid: stationid,
              stationname: stationname,
              provincename: provincename,
              capacity: capacity,
            },
            success: function(response) {
              const $tableRow = $('tr[data-stationid="' + stationid + '"]');
              
              $tableRow.find('td:eq(1)').text(stationname);
              $tableRow.find('td:eq(2)').text(provincename);
              $tableRow.find('td:eq(3)').text(capacity);
            },
            error: function(xhr, status, error) {
              console.log('error=>', error);
            }
          });
    
    });

    $('#editModal').on('hidden.bs.modal', function() {
    
        $('#editModal').find('form')[0].reset();
        $('#editModal').find('.savestation').off('click');
      });



    //for delete
    $(document).on('click', '.btn-deletestation', function() {
        const stationid = $(this).data('stationid');
        
        const deleteButton = $(this);
      
        $('#deleteConfirmationstationModal').modal('show');
        $('#confirmDeleteStation').data('stationid', stationid);
        $('#confirmDeleteStation').data('deleteButton', deleteButton);
    });

        $(document).on('click', '#confirmDeleteStation', function() {
            const stationid = $(this).data('stationid');
            const deleteButton = $(this).data('deleteButton');

            $.ajax({
                url: '../api/admin/deleteform/deletestation.php',
                method: 'POST',
                data: { stationid: stationid },
                success: function(response) {
                  if (response === 'Station Cannot be deleted') {
                    //window.location.href = "http://localhost/transportation/admin?msg=busfailed";
                    alert(response);
                  } else if(response === 'Station deleted successfully.'){
                    deleteButton.closest('tr').remove();
                  }
            
                  $('#deleteConfirmationstationModal').modal('hide');
                },
                error: function(xhr, status, error) {
                  console.log(error);
                }
              });
              
        });
});