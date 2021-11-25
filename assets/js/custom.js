/* ==================================================*/
/* =================    PROFILE    ==================*/
/* ==================================================*/

function enableInput() {

    document.getElementById("divBtnMod").className = "collapse";
    document.getElementById("divBtnSave").className = "collapse.show";
    document.getElementById("divBtnExit").className = "collapse.show";
  
    document.getElementById("user").disabled = false;
    document.getElementById("name").disabled = false;
    document.getElementById("pa").disabled = false;
    document.getElementById("sa").disabled = false;
    document.getElementById("date").disabled = false;
    document.getElementById("email").disabled = false;
    document.getElementById("password1").disabled = false;
    
    document.getElementById("phoneWork").disabled = false;
    document.getElementById("phonePersonal").disabled = false;
    document.getElementById("address").disabled = false;
    document.getElementById("divX").style.pointerEvents = "all";
  }
  
  function disableInput() {
  
    document.getElementById("divBtnMod").className = "collapse.show";
    document.getElementById("divBtnSave").className = "collapse";
    document.getElementById("divBtnExit").className = "collapse";
  
    document.getElementById("user").disabled = true;
    document.getElementById("name").disabled = true;
    document.getElementById("pa").disabled = true;
    document.getElementById("sa").disabled = true;
    document.getElementById("date").disabled = true;
    document.getElementById("email").disabled = true;
    document.getElementById("password1").disabled = true;
  
    document.getElementById("phoneWork").disabled = true;
    document.getElementById("phonePersonal").disabled = true;
    document.getElementById("address").disabled = true;
    document.getElementById("divX").style.pointerEvents = "none";
    
  }
  
  function discardModification() {
    window.location.reload(true);
    return false;
  }







/* ==================================================*/
/* =================    MAP API    ==================*/
/* ==================================================*/

let map;
let marker;
let geocoder;
let responseDiv;
let response;
let result2;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: { lat: 10.085841, lng: -84.469339 },
    mapTypeControl: true,
  });
  geocoder = new google.maps.Geocoder();

  const inputText = document.createElement("input");

  inputText.type = "text";
  inputText.placeholder = "Enter a location";
  inputText.hidden;

  const submitButton = document.createElement("input");

  submitButton.type = "button";
  submitButton.value = "Geocode";
  submitButton.classList.add("button", "button-primary");

  const clearButton = document.createElement("input");

  clearButton.type = "button";
  clearButton.value = "Limpiar";
  clearButton.classList.add("button", "button-secondary");
  response = document.createElement("pre");
  response.id = "response";
  response.innerText = "";
  responseDiv = document.createElement("div");
  responseDiv.id = "response-container";
  responseDiv.appendChild(response);
  

  const instructionsElement = document.createElement("p");

  instructionsElement.id = "instructions";
  instructionsElement.innerHTML =
    "Da click en el mapa para ingresar la dirección.";
  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputText);
  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(submitButton);
  //map.controls[google.maps.ControlPosition.TOP].push(clearButton);
  map.controls[google.maps.ControlPosition.LEFT_TOP].push(instructionsElement);
  //map.controls[google.maps.ControlPosition.LEFT_TOP].push(responseDiv);
  marker = new google.maps.Marker({
    map,
  });
  map.addListener("click", (e) => {
    geocode({ location: e.latLng });
  });
  submitButton.addEventListener("click", () =>
    geocode({ address: inputText.value })
  );
  clearButton.addEventListener("click", () => {
    clear();
  });
  clear();
}

function clear() {
  marker.setMap(null);
  responseDiv.style.display = "none";
}

function geocode(request) {
  clear();
  geocoder
    .geocode(request)
    .then((result) => {
      const { results } = result;

      map.setCenter(results[0].geometry.location);
      marker.setPosition(results[0].geometry.location);
      marker.setMap(map);
      responseDiv.style.display = "block";
      response.innerText = JSON.stringify(result, null, 2);
      
     
      //console.log("Dirección: ", results[0].address_components[1].long_name);
      //console.log(results[0].address_components[2].long_name);
      //console.log(results[0].address_components[3].long_name);
    
      result2 = results[0].address_components[1].long_name
                + ", " + results[0].address_components[2].long_name
                + ", " + results[0].address_components[3].long_name;

      document.getElementById("address").value = result2;


      return results;
    })
    .catch((e) => {
      alert("Geocode was not successful for the following reason: " + e);
    });
}






/* ==================================================*/
/* =================    INDEX    ====================*/
/* ==================================================*/


function Check1() {
    if (document.getElementById('radio1').checked) {
        document.getElementById('returnDate').className = '.d-block, form-control';
        
    } else {
        document.getElementById('returnDate').className = 'd-none';
    }
  }






/* ==================================================*/
/* =================    SIGNUP    ====================*/
/* ==================================================*/


// let startDate = document.getElementById('starDate')

// startDate.addEventListener('change',(e)=>{
//   let startDateVal = e.target.value
//   document.getElementById('startDateSelected').innerText = startDateVal
// })