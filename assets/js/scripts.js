var x = document.getElementById("demo");

function getLocation() {
    document.getElementById("finderTable").style.left = "0";
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(getCloseUsers, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }

}

function getCloseUsers(position) {

    var lat = (position.coords.latitude).toFixed(3);
    var lng = (position.coords.longitude).toFixed(3);
    console.log(lat + "+" + lng)


    var url = 'https://devapp.sandroanderes.ch:3000/api/app/?lat=' + lat + '&lng=' + lng;
    const otherParam = {
        headers: {
            "Content-Type": "application/json"
        },
        method: "GET"
    }

    fetch(url, otherParam)
        .then(resp => {
            return resp.json()
        })
        .then(function (resp) {
            document.getElementById("table").innerHTML = "";

            var xdata, x;

            for (var i = 0; i < resp.data.length; i++) {
                xdata = resp.data[i];

                document.getElementById("table").innerHTML += "<tr id='data" + i + "' ></tr>";
                document.getElementById("data" + i).innerHTML += "<th scope='row'>" + i + "</th>";
                document.getElementById("data" + i).innerHTML += "<td>" + xdata.name + "</td>";
                document.getElementById("data" + i).innerHTML += "<td class='text-center'>" + xdata.status + "</td>";
                document.getElementById("data" + i).innerHTML += "<td class='text-right'>" + (xdata.distance).toFixed(3) + " km" + "</td>";
                /* document.getElementById("buddys").innerHTML += "<div class='row bg-dark p-3 my-2 text-light' id='data"+i+"'"+"</div>";
                document.getElementById("data"+i).innerHTML += "<div class='col-sm'>" + xdata.name + "</div>";
                document.getElementById("data"+i).innerHTML += "<div class='col-sm text-center'>" + xdata.status + "</div>";
                document.getElementById("data"+i).innerHTML += "<div class='col-sm text-right'>" + (xdata.distance).toFixed(3) + " km" +"</div>"; */

                /* document.getElementById("buddys").innerHTML += "<ul>";
                document.getElementById("buddys").innerHTML += "<li>"+"<span class='first'>"+xdata.name+"</span>"+"<span>"+xdata.status+"</span>"+"<span class='last'>"+(xdata.distance).toFixed(3)+" km"+"</span>"+"</li>";
                document.getElementById("buddys").innerHTML += "</ui>"; */
                console.log(xdata);
                console.log(resp.data.length);
            }

        })
        .catch(error => console.log(error))
}

function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}


//Navbar Overlay
function openNav() {
    document.getElementById("mainNav").style.width = "100%";
}
function closeNav() {
    document.getElementById("mainNav").style.width = "0%";
}

//FinderTable Overlay
function openTable() {
    
}
function closeTable() {
    document.getElementById("finderTable").style.left = "100%";
}