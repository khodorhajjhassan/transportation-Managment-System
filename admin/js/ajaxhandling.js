const dashboard = document.getElementById("dashboard");
const addtrip = document.getElementById("addtrip");
const viewtrip = document.getElementById("viewtrip");
const adddriver = document.getElementById("adddriver");
const viewdriver = document.getElementById("viewdriver");
const addbus = document.getElementById("addbus");
const viewbus = document.getElementById("viewbus");
const applications = document.getElementById("applications");
const stats = document.getElementById("stats");
const payments = document.getElementById("payments");
const addadmin = document.getElementById("addadmin");
const viewadmin = document.getElementById("viewadmin");
const addstation = document.getElementById("addstation");
const viewstation = document.getElementById("viewstation");
const offrequest = document.getElementById("offrequest");
const canceleduser = document.getElementById("canceleduser");


function initializeDataTable() {
  const myTable = document.getElementById("myTable");
  if (myTable) {
    new DataTable(myTable);
  }
}

const loadedScripts = new Set(); // Track loaded scripts


function loadScript(url) {
  if (loadedScripts.has(url)) {
    return;
  }

  const script = document.createElement("script");
  script.type = "text/javascript";
  script.src = url;
  document.head.appendChild(script);
  loadedScripts.add(url);
}

window.onload = function () {
  const lastVisitedUrl = localStorage.getItem("lastVisitedUrl");
  
  if (lastVisitedUrl) {
    loadContent(lastVisitedUrl);
  } else {
    loadContent("dashboard.php");
  }
  
};

function loadContent(url) {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      document.getElementById("content").innerHTML = this.responseText;
      initializeDataTable();
      localStorage.setItem("lastVisitedUrl", url);
    }

    switch (url) {
      case "dashboard.php":
        loadScript("js/modal/dashboard.js");
        break;
      case "viewdriver.php":
        loadScript("js/modal/viewdriver.js");
        break;
      case "viewtrip.php":
        loadScript("js/modal/viewtrip.js");
        break;
      case "viewbus.php":
        loadScript("js/modal/viewbus.js");
        break;
      case "viewadmin.php":
        loadScript("js/modal/viewadmin.js");
        break;
      case "applications.php":
        loadScript("js/modal/viewapplication.js");
        break;
      case "payments.php":
        loadScript("js/modal/viewpayment.js");
        break;
      case "dashboard.php":
        loadScript("js/modal/dashboard.js");
        break;
      case "addbus.php":
        loadScript("js/validation/busvalidation.js");
        break;
      case "addtrip.php":
        loadScript("js/validation/tripvalidation.js");
        break;
      case "adddriver.php":
        loadScript("js/validation/drivervalidation.js");
        break;
      case "stats.php":
        loadStatsScript();
        
        //loadScript("https://www.gstatic.com/charts/loader.js");
        break;
      case "addstation.php":
        loadScript("js/validation/stationvalidation.js");
        break;
      case "viewstation.php":
        loadScript("js/modal/viewstation.js");
        break;  
      case "offrequest.php":
        loadScript("js/modal/offrequest.js");
        break;
      case "canceledusers.php":
        loadScript("js/modal/cancelpayment.js");
        break;
    }
   
  };

  xhr.open("GET", url, true);
  xhr.send();
}

function loadStatsScript() {
  const statsScript = document.createElement("script");
  statsScript.type = "text/javascript";
  statsScript.src = "js/modal/stats.js";

  // Check if the script is already loaded
  if (!isScriptLoaded(statsScript.src)) {
    document.head.appendChild(statsScript);
  }
}

function isScriptLoaded(url) {
  const scripts = document.getElementsByTagName("script");
  for (let i = 0; i < scripts.length; i++) {
    if (scripts[i].src === url) {
      return true;
    }
  }
  return false;
}


dashboard.addEventListener("click", function () {
  loadContent('dashboard.php')
 
});
addtrip.addEventListener("click", function () {
  loadContent("addtrip.php");
});

viewtrip.addEventListener("click", function () {
  loadContent("viewtrip.php");
  
});

adddriver.addEventListener("click", function () {
  loadContent("adddriver.php");
});

viewdriver.addEventListener("click", function () {
  loadContent("viewdriver.php");
});

addbus.addEventListener("click", function () {
  loadContent("addbus.php");
  
});

viewbus.addEventListener("click", function () {
  loadContent("viewbus.php");
  
});

applications.addEventListener("click", function () {
  loadContent("applications.php");
});

stats.addEventListener("click", function () {
  loadContent("stats.php");
  
  
});

payments.addEventListener("click", function () {
  
  loadContent("payments.php");
});

addadmin.addEventListener("click", function () {
  loadContent("addadmin.php");
  
});

viewadmin.addEventListener("click", function () {
  loadContent("viewadmin.php");
  
});

addstation.addEventListener("click", function () {
  loadContent("addstation.php");
  
});

viewstation.addEventListener("click", function () {
  loadContent("viewstation.php");
  
});

offrequest.addEventListener("click", function () {
  loadContent("offrequest.php");
  
});

canceleduser.addEventListener("click", function () {
  
  loadContent("canceledusers.php");
  
});


