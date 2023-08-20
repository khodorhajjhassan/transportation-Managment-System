<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

   
    <title>Document</title>
  </head>
  <style>
   
    .card-text , .card-title{
      font-family: 'Oswald', sans-serif !important;
      color: #0A3B5F;
      font-size:24px !important;
      font-weight:400 !important;
    }
    .card-title{
 
    }
    .dots
    {
        cursor: pointer;
        font-size:28px;
        position:absolute;
        top:-15px
    }
    .card-body{
  box-shadow: 3px 3px 6px gray;   
  position:relative;   
  height:160px;
  padding-top:2px
    }
    
    
    i.fa-solid{
      font-size:60px;
    }
    
    </style>
  </style>
  <body>
    <div class="container">
      <div class="row mb-5">
        <div class="col-sm-4">
          <div class="card w-75">
            <div class="card-body users">
                <span class="dots" onclick="toggleDropdownUser()" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">&#8230;</span>
                <div class="dropdown-menu" id="dropdownuser">
                    <a class="dropdown-item" href="#" onclick="changeStat('total','user')">Total</a>
                    <a class="dropdown-item" href="#" onclick="changeStat('monthly','user')">Monthly</a>
                    <a class="dropdown-item" href="#" onclick="changeStat('yearly','user')">Yearly</a>
                  </div>
              <h3 class="card-title text-center mb-4">Users</h3>
              <div class=" d-flex justify-content-around align-items-center mt-4 mb-3">
              <i class="fa-solid fa-circle-user text-primary fa-2xl"></i>
              <h5 class="card-text userscount"></h5>
            </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
            <div class="card w-75">
              <div class="card-body drivers">
                  <span class="dots" onclick="toggleDropdownDriver()" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">&#8230;</span>
                  <div class="dropdown-menu" id="dropdowndriver">
                      <a class="dropdown-item" href="#" onclick="changeStat('total','driver')">Total</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('monthly','driver')">Monthly</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('yearly','driver')">Yearly</a>
                    </div>
                    <h3 class="card-title text-center mb-4">Drivers</h3>
                    <div class=" d-flex justify-content-around align-items-center mt-4 mb-3">
                <i class="fa-solid fa-id-card fa-2xl text-info"></i>
                <h5 class="card-text text-center drivercount"></h5>
            </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card w-75">
              <div class="card-body profit">
                  <span class="dots" onclick="toggleDropdownProfit()" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">&#8230;</span>
                  <div class="dropdown-menu" id="dropdownprofit">
                      <a class="dropdown-item" href="#" onclick="changeStat('total','profit')">Total</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('monthly','profit')">Monthly</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('yearly','profit')">Yearly</a>
                    </div>
                <h3 class="card-title text-center mb-4">Profit</h3>
                <div class=" d-flex justify-content-around align-items-center mt-4 mb-3">
                <i class="fa-solid fa-money-bill-trend-up text-success fa-2xl"></i>
                <h5 class="card-text text-center mt-4 profitcount"></h5>
            </div>
              </div>
            </div>
          </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <div class="card w-75">
                <div class="card-body bus">
                    <h3 class="card-title text-center mb-4">Bus</h3>
                    <div class=" d-flex justify-content-around align-items-center mt-4 mb-3">

                    <i class="fa-solid fa-van-shuttle text-warning fa-2xl"></i>
                    <h5 class="card-text  buscount"></h5>
            </div>
                    </div>
                    </div>
        </div>
        <div class="col-sm-4">
            <div class="card w-75">
              <div class="card-body trips">
                  <span class="dots" onclick="toggleDropdownTrips()" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">&#8230;</span>
                  <div class="dropdown-menu" id="dropdowntrips">
                      <a class="dropdown-item" href="#" onclick="changeStat('total','trips')">Total</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('monthly','trips')">Monthly</a>
                      <a class="dropdown-item" href="#" onclick="changeStat('yearly','trips')">Yearly</a>
                    </div>
                <h3 class="card-title text-center">Trips</h3>
                <div class=" d-flex justify-content-around align-items-center mt-4 mb-3">
                <i class="fa-solid fa-suitcase-rolling text-danger fa-2xl"></i>
                <h5 class="card-text text-center  tripscount"></h5>
            </div>
              </div>
            </div>
          </div>

      </div>
      <div class="row mt-5">
        <div class="col-sm-10" >
        <div class="card-body2">
            <h5 class="card-title">Reports </h5>
        <!-- Create the chart containers -->
        <div class="col-sm-12" id="tripsChart"></div>
        <div class="col-sm-12 mt-2" id="amountChart"></div>
        <div class="col-sm-12 mt-2" id="usersChart"></div>
      </div>
    </div>
</div>
  </body>

</html>
