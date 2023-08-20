const searchInput = document.getElementById('search-input');
    const tripTable = document.getElementById('trip-table');
    const tableRows = tripTable.getElementsByTagName('tr');

    searchInput.addEventListener('input', function() {
      const searchQuery = searchInput.value.toLowerCase();

      for (let i = 1; i < tableRows.length; i++) {
        const row = tableRows[i];
        const rowData = row.innerText.toLowerCase();

        if (rowData.includes(searchQuery)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      }
    });