/*
 * JS runningMate scripts
 *
 * Copyright (c) 2019 Sandro Anderes (https://sandroanderes.ch)
 *
 * By Sandro Anderes - https://sandroanderes.ch
 * Licensed under the MIT license.
 * #
 *
 * @link #
 * @author Sandro Anderes
 * @date 5.10.2019
 * @version 1.0.0
 */

/********************
    Club functions
*********************/

// Join a club form dropdown menu
function joinClub(clubID, callback) {
    var confirmation = confirm("Do you want to join this club?");
    if (confirmation == true) {
        //var memberID = document.getElementById("memberID").innerHTML;
        console.log("Got clubID " + clubID + " from member with ID " + memberID)

        var jsonData = '{"clubID":' + clubID + '}';

        var url = 'https://devapp.sandroanderes.ch:3000/api/club/' + memberID;
        const otherParam = {
            headers: {
                "Content-Type": "application/json"
            },
            method: "PUT",
            body: jsonData
        }

        fetch(url, otherParam)
            .then(resp => {
                return resp.json()
            })
            .then(function (resp) {
                console.log(resp);
            })
            .catch(error => console.log(error))
    }
    callback();
}

//Get all clubs
function getClubs() {
    var url = 'https://devapp.sandroanderes.ch:3000/api/clubs';
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
            document.getElementById("drpdwn").innerHTML = "";

            var xdata, x;

            for (var i = 0; i < resp.data.length; i++) {
                xdata = resp.data[i];

                document.getElementById("drpdwn").innerHTML += "<a class='dropdown-item' onclick='joinClub(" + xdata.clubID + ",getMemberClub)'>" + xdata.clubname + "</a>";
                console.log(xdata);
                console.log(resp.data.length);
            }

        })
        .catch(error => console.log(error))
        getMemberClub();
}

// Create a new club
function createNewClub() {
    var clubname = document.getElementById("clubname").value;

    console.log("Create club with name " + clubname);

    var jsonData = '{"clubname":"' + clubname + '"}';

    var url = 'https://devapp.sandroanderes.ch:3000/api/club/';
    const otherParam = {
        headers: {
            "Content-Type": "application/json"
        },
        method: "POST",
        body: jsonData
    }

    fetch(url, otherParam)
        .then(resp => {
            return resp.json()
        })
        .then(function (resp) {
            console.log(resp);
        })
        .catch(error => console.log("Failed with error: '" + error + "'. Maybe your club already exist."))

    getClubs();
    closeClubsTable();
}

//Get member clubs
function getMemberClub() {
    console.log("call");
    var url = 'https://devapp.sandroanderes.ch:3000/api/memberclub/' + memberID;;
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

            var xdata, x;

            for (var i = 0; i < resp.data.length; i++) {
                xdata = resp.data[i];
                if (resp.data.length > 0){
                document.getElementById("dropdownMenuButton").innerHTML = "You've joined: '"+xdata.clubname+"'";
                }
                console.log(xdata);
                console.log(resp.data.length);
            }

        })
        .catch(error => console.log(error))
}

/************************
    Location functions
*************************/

// Get current geolocation
function getLocation() {
    document.getElementById("finderTable").style.left = "0";
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(saveUsrPosition, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
    getCloseUsers();
}

// Save geolocation to member in the db
function saveUsrPosition(position) {
    var lat = (position.coords.latitude).toFixed(3);
    var lng = (position.coords.longitude).toFixed(3);
    //var memberID = document.getElementById("memberID").innerHTML;
    console.log("Got lat " + lat + " and lng " + lng + " from member with ID " + memberID)

    var jsonData = '{"lat":' + lat + ', "lng":' + lng + '}';

    var url = 'https://devapp.sandroanderes.ch:3000/api/loc/' + memberID;
    const otherParam = {
        headers: {
            "Content-Type": "application/json"
        },
        method: "PUT",
        body: jsonData
    }

    fetch(url, otherParam)
        .then(resp => {
            return resp.json()
        })
        .then(function (resp) {
            console.log(resp);
        })
        .catch(error => console.log(error))

}

// Get close members from geolocation
function getCloseUsers() {
    //var memberID = document.getElementById("memberID").innerHTML;
    console.log("memberID: " + memberID);

    var url = 'https://devapp.sandroanderes.ch:3000/api/usr/' + memberID;
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
            console.log(resp);
            document.getElementById("table").innerHTML = "";

            var xdata, x;

            for (var i = 0; i < resp.data.length; i++) {
                xdata = resp.data[i];

                document.getElementById("table").innerHTML += "<tr id='data" + i + "' ></tr>";
                document.getElementById("data" + i).innerHTML += "<th scope='row'><a class='email' href='mailto:"+xdata.email+"'>" + xdata.username + "</a></th>";
                document.getElementById("data" + i).innerHTML += "<td class='text-center'>" + xdata.level + "</td>";
                document.getElementById("data" + i).innerHTML += "<td class='text-right'>" + (xdata.distance).toFixed(2) + " km" + "</td>";
                console.log(xdata);
                console.log(resp.data.length);
            }

        })
        .catch(error => console.log(error))
}

/***********************
    Profile functions
************************/

// Get all profile information
function getProfile() {
    //var memberID = document.getElementById("memberID").innerHTML;

    var url = 'https://devapp.sandroanderes.ch:3000/api/profile/' + memberID;
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
            console.log(resp);

            /* document.getElementById("favDistanceInput").value = "";
            document.getElementById("fitSelection").value = 0;
            document.getElementById("goal").value = "";
            */
            var xdata, x;

            for (var i = 0; i < resp.data.length; i++) {
                xdata = resp.data[i];

                document.forms["profileForm"]["favDistanceInput"].value = xdata.distance + " km";
                document.forms["profileForm"]["fitSelection"].value = xdata.level;
                document.forms["profileForm"]["goal"].value = xdata.goal;
                console.log(xdata);
                console.log(resp.data.length);
            }

        })
        .catch(error => console.log(error));
}

//Save profile information to member
function saveProfile() {
    var distance = document.forms["profileForm"]["favDistanceInput"].value.replace(/[^\d.-]/g, '');
    var fitness = document.forms["profileForm"]["fitSelection"].value;
    var goal = document.forms["profileForm"]["goal"].value;
    
    console.log(distance);
    console.log(fitness);
    console.log(goal);
    
    if (fitness != 0) {

        console.log("Got favourite distance " + distance + ", fitness level " + fitness + " and goal " + goal + " from member with ID " + memberID)
        var jsonData = '{"distance":"' + distance + '", "fitness":"'+fitness+'", "goal":"'+goal+'"}';
        console.log(jsonData);

        var url = 'https://devapp.sandroanderes.ch:3000/api/profile/' + memberID;
        console.log(url);
        const otherParam = {
            headers: {
                'Content-type': 'application/json'
            },
            method: "PUT",
            body: jsonData
        }

        fetch(url, otherParam)
        .then(resp => {
            return resp.json()
        })
        .then(function (resp) {
            console.log(resp);
        })
        .catch(error => console.log(error))        
    } else {
        alert("Fitness Level has to be selected!")
    }
}


/**********************************
    Excetion and error handling
***********************************/

// Error function
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

/***********************
    Overlay functions
************************/

//Navbar Overlay
function openNav() {
    document.getElementById("mainNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mainNav").style.width = "0%";
}

//FinderTable Overlay
function closeFinderTable() {
    document.getElementById("finderTable").style.left = "100%";
}

//ClubsTable Overlay
function openClubsTable() {
    document.getElementById("clubsTable").style.left = "0";
}

function closeClubsTable() {
    document.getElementById("clubsTable").style.left = "100%";
    document.getElementById("clubname").value = "";
}

/**********************
    Other functions
***********************/

// Get cookie to identify memberID
function getCookie(name) {
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
}

// Get URL to Split for POST
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
        vars[key] = value;
    });
    return vars;
}