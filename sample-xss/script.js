// get user's information and prints it to the console
console.log("Target browser runs on: "+navigator.platform);
console.log("Target browser is: "+navigator.userAgent);

const options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0,
};

function geolocationSuccess(pos) {
    const crd = pos.coords;
    
    console.log("Target location is:");
    console.log(`Latitude : ${crd.latitude}`);
    console.log(`Longitude: ${crd.longitude}`);
    console.log(`More or less ${crd.accuracy} meters.`);
}

function geolocationError(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
}

if ("geolocation" in navigator) {
    navigator.geolocation.
    getCurrentPosition(geolocationSuccess, geolocationError, options);
}