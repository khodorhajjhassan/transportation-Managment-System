console.log("hello world")
      // Get the modal element
      var modal = document.getElementById('myModal');

      // Get the delete button
      var deleteButton = document.querySelector('.btn-delete');

      // Add click event listener to the delete button
      deleteButton.addEventListener('click', function() {
        // Show the modal
        modal.style.display = 'block';
      });

      // Get the cancel button inside the modal
      var cancelButton = document.querySelector('.btn-cancel');

      // Add click event listener to the cancel button
      cancelButton.addEventListener('click', function() {
        // Hide the modal
        modal.style.display = 'none';
      });