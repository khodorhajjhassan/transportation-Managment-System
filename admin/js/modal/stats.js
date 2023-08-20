
let currentStat = 'monthly';
let currentStatdriver = 'monthly';
let currentStatprofit = 'monthly';
let currentStattrips = 'monthly';
let usermonthly;
let useryearly;
let usertotal;
let drivermonthly;
let driveryearly;
let drivertotal;
let profityearly;
let profitmonthly;
let profittotal;
let tripsmonthly;
let tripsyearly;
let tripstotal;

function toggleDropdownUser() {
  $('#dropdownuser').toggle();
}

function toggleDropdownDriver() {
  $('#dropdowndriver').toggle();
}

function toggleDropdownProfit() {
  $('#dropdownprofit').toggle();
}

function toggleDropdownTrips() {
  $('#dropdowntrips').toggle();
}

function changeStat(stat, At) {
  if (At === 'user') {
    currentStat = stat;
    updateStats('user');
    toggleDropdownUser();
  } else if (At === 'driver') {
    currentStatdriver = stat;
    updateStats('driver');
    toggleDropdownDriver();
  } else if (At === 'profit') {
    currentStatprofit = stat;
    updateStats('profit');
    toggleDropdownProfit();
  } else if (At === 'trips') {
    currentStattrips = stat;
    updateStats('trips');
    toggleDropdownTrips();
  }
}

function updateStats(At) {
  if (At == 'user') {
    if (currentStat === 'monthly') {
      $('.userscount').text(usermonthly);
    } else if (currentStat === 'yearly') {
      $('.userscount').text(useryearly);
    } else if (currentStat === 'total') {
      $('.userscount').text(usertotal);
    }
  } else if (At == 'driver') {
    if (currentStatdriver === 'monthly') {
      $('.drivercount').text(drivermonthly);
    } else if (currentStatdriver === 'yearly') {
      $('.drivercount').text(driveryearly);
    } else if (currentStatdriver === 'total') {
      $('.drivercount').text(drivertotal);
    }
  } else if (At == 'profit') {
    if (currentStatprofit === 'monthly') {
      $('.profitcount').text(profitmonthly);
    } else if (currentStatprofit === 'yearly') {
      $('.profitcount').text(profityearly);
    } else if (currentStatprofit === 'total') {
      $('.profitcount').text(profittotal);
    }
  } else if (At == 'trips') {
    if (currentStatprofit === 'monthly') {
      $('.tripscount').text(tripsmonthly);
    } else if (currentStatprofit === 'yearly') {
      $('.tripscount').text(tripsyearly);
    } else if (currentStatprofit === 'total') {
      $('.tripscount').text(tripstotal);
    }
  }
}

async function fetchData() {
  try {
    const response = await fetch('http://localhost/transportation/api/admin/view/allstats.php');
    const data = await response.json();
    console.log(data);

    usermonthly = data[0].monthly_user_count;
    useryearly = data[0].yearly_user_count;
    usertotal = data[0].user_count;
    driveryearly = data[0].yearly_driver_count;
    drivermonthly = data[0].monthly_driver_count;
    drivertotal = data[0].driver_count;
    profityearly = data[0].yearly_profit;
    profitmonthly = data[0].monthly_revenue;
    profittotal = data[0].total_revenue;
    tripsmonthly = data[0].monthly_trips_count;
    tripsyearly = data[0].yearly_trip_count;
    tripstotal = data[0].total_trips;

    $('.userscount').text(data[0].user_count);
    $('.drivercount').text(data[0].driver_count);
    $('.profitcount').text(data[0].total_revenue);
    $('.buscount').text(data[0].bus_count);
    $('.tripscount').text(data[0].total_trips);
  } catch (error) {
    console.log('Error:', error);
  }
}

let data;
let nboftripsMonth;
let totalamountMonth;
let nbofusersMonth;
let months;

async function fetchData2() {
  try {
    const response = await fetch('http://localhost/transportation/admin/statistics.php');
    const result = await response.json();
    //console.log(result);

    data = result;
    nboftripsMonth = result.nboftripsMonth;
    totalamountMonth = result.totalamountMonth;
    nbofusersMonth = result.nbofusersMonth;
    months = result.months;
  } catch (error) {
    console.log('Error:', error);
  }
}

function drawCharts() {
  // Create the trips chart
  const tripsDataTable = new google.visualization.DataTable();
  tripsDataTable.addColumn('string', 'Month');
  tripsDataTable.addColumn('number', 'Number of Trips');

  for (let i = 0; i < months.length; i++) {
    tripsDataTable.addRow([months[i], nboftripsMonth[i]]);
  }

  const tripsOptions = {
    height: 400,
    legend: { position: 'top' },
    colors: ['#008FFB'],
    areaOpacity: 0.7,
  };

  const tripsChart = new google.visualization.AreaChart(
    document.getElementById('tripsChart')
  );
  tripsChart.draw(tripsDataTable, tripsOptions);

  // Create the amount chart
  const amountDataTable = new google.visualization.DataTable();
  amountDataTable.addColumn('string', 'Month');
  amountDataTable.addColumn('number', 'Total Amount');

  for (let i = 0; i < months.length; i++) {
    amountDataTable.addRow([months[i], totalamountMonth[i]]);
  }

  const amountOptions = {
    height: 400,
    legend: { position: 'top' },
    colors: ['#00E396'],
    areaOpacity: 0.7,
  };

  const amountChart = new google.visualization.AreaChart(
    document.getElementById('amountChart')
  );
  amountChart.draw(amountDataTable, amountOptions);

  // Create the users chart
  const usersDataTable = new google.visualization.DataTable();
  usersDataTable.addColumn('string', 'Month');
  usersDataTable.addColumn('number', 'Number of Users');

  for (let i = 0; i < months.length; i++) {
    usersDataTable.addRow([months[i], nbofusersMonth[i]]);
  }

  const usersOptions = {
    height: 400,
    legend: { position: 'top' },
    colors: ['#008FFB'],
    areaOpacity: 0.7,
    chartArea: {
      width: '80%',
      height: '70%',
    },
  };

  const usersChart = new google.visualization.AreaChart(
    document.getElementById('usersChart')
  );
  usersChart.draw(usersDataTable, usersOptions);
}

async function loadGoogleChartsLibrary() {
  return new Promise((resolve, reject) => {
    google.charts.load('current', {
      packages: ['corechart'],
      callback: resolve,
    });
  });
}

async function initialize() {
  try {
    await loadGoogleChartsLibrary();
    await fetchData();
    await fetchData2();
    drawCharts();
  } catch (error) {
    console.log('Error:', error);
  }
}

$(document).ready(function () {
  initialize();
  $(window).resize(function () {
    drawCharts();
  });

});