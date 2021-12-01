/* ==================================================*/
/* =================    PROFILE    ==================*/
/* ==================================================*/

function enableInput() {

    document.getElementById("divBtnMod").className = "collapse";
    document.getElementById("divBtnSave").className = "collapse.show";
    document.getElementById("divBtnExit").className = "collapse.show";
  
    //document.getElementById("username").readOnly = false;
    document.getElementById("name").readOnly = false;
    document.getElementById("last_name1").readOnly = false;
    document.getElementById("last_name2").readOnly = false;
    document.getElementById("birth_date").readOnly = false;
    document.getElementById("email").readOnly = false;
    document.getElementById("work_phone").readOnly = false;
    document.getElementById("personal_phone").readOnly = false;
    document.getElementById("password").readOnly = false;
    document.getElementById("address").readOnly = false;

    document.getElementById("divX").style.pointerEvents = "all";
    console.log("enableInput() ok");
  }
  
  function disableInput() {
  
    document.getElementById("divBtnMod").className = "collapse.show";
    document.getElementById("divBtnSave").className = "collapse";
    document.getElementById("divBtnExit").className = "collapse";
  
    document.getElementById("username").readOnly = true;
    document.getElementById("name").readOnly = true;
    document.getElementById("last_name1").readOnly = true;
    document.getElementById("last_name2").readOnly = true;
    document.getElementById("birth_date").readOnly = true;
    document.getElementById("email").readOnly = true;
    document.getElementById("work_phone").readOnly = true;
    document.getElementById("personal_phone").readOnly = true;
    document.getElementById("password").readOnly = true;
    document.getElementById("address").readOnly = true;

    document.getElementById("divX").style.pointerEvents = "none";
    console.log("disableInput() ok");
  }
  
  function discardModification() {
    window.location.reload(true);
    console.log("discardModification() ok");
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


//let startDate = document.getElementById('startDate')

//startDate.addEventListener('change',(e)=>{
//  let startDateVal = e.target.value
//  document.getElementById('startDateSelected').innerText = startDateVal
//})

//document.getElementById("user").disabled = false;


function clickTest() {

  alert("Prueba de Formulario"
      + "\nusername: " + document.getElementById("username").value
      + "\nname: " + document.getElementById("name").value
      + "\nflastname: " + document.getElementById("flastname").value
      + "\nslastname: " + document.getElementById("slastname").value
      + "\nstartDate: " + document.getElementById("startDate").value
      + "\nemail: " + document.getElementById("email").value
      + "\nphoneWork: " + document.getElementById("phoneWork").value
      + "\nphonePersonal: " + document.getElementById("phonePersonal").value
      + "\npassword: " + document.getElementById("password").value
      + "\naddress: " + document.getElementById("address").value
      );
}