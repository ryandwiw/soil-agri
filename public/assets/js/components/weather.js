// function getWeatherByGeolocation() {
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(
//             function(position) {
//                 const latitude = position.coords.latitude;
//                 const longitude = position.coords.longitude;

//                 // Kirim data lokasi ke server
//                 const xhr = new XMLHttpRequest();
//                 xhr.onreadystatechange = function() {
//                     if (this.readyState == 4 && this.status == 200) {
//                         const weatherInfo = JSON.parse(this.responseText);
//                         displayWeatherInfo(weatherInfo);
//                     }
//                 };

//                 xhr.open("GET", `/get-weather-by-geolocation?lat=${latitude}&lon=${longitude}&lang=id`, true);
//                 xhr.send();
//             },
//             function(error) {
//                 // Handle error (user denied permission, etc.)
//                 console.error("Error getting location:", error.message);
//             }
//         );
//     } else {
//         console.error("Geolocation is not supported by this browser.");
//     }
// }

document.addEventListener("DOMContentLoaded", function () {
    checkLocationPermission();
});

function checkLocationPermission() {
    if (navigator.permissions) {
        navigator.permissions.query({ name: 'geolocation' }).then(function (result) {
            if (result.state === 'granted' || result.state === 'prompt') {
                // If geolocation permission is granted or prompt, fetch weather
                getWeatherByGeolocation();
            } else {
                // If geolocation permission is not granted, hide the entire container
                console.log("Location permission denied by the user.");
                document.getElementById('weatherContainer').style.display = 'none';
            }
        });
    } else {
        console.error("Geolocation permissions not supported by this browser.");
    }
}


function getWeatherByGeolocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Kirim data lokasi ke server
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        const weatherInfo = JSON.parse(this.responseText);
                        displayWeatherInfo(weatherInfo);
                        document.getElementById('weatherContainer').style.display = 'block';

                        showNotification(weatherInfo);
                    }
                };

                xhr.open("GET", `/get-weather-by-geolocation?lat=${latitude}&lon=${longitude}&lang=id`, true);
                xhr.send();
            },
            function(error) {
                // Handle error (user denied permission, etc.)
                console.error("Error getting location:", error.message);
            },
            { enableHighAccuracy: true }
        );
    } else {
        console.error("Geolocation is not supported by this browser.");
    }
}



function translateWindDirection(direction) {
const translations = {
'N': 'Utara',
'NNE': 'Utara Timur Laut',
'NE': 'Timur Laut',
'ENE': 'Timur Utara Timur',
'E': 'Timur',
'ESE': 'Timur Tenggara',
'SE': 'Tenggara',
'SSE': 'Selatan Tenggara',
'S': 'Selatan',
'SSW': 'Selatan Barat Daya',
'SW': 'Barat Daya',
'WSW': 'Barat Selatan Barat',
'W': 'Barat',
'WNW': 'Barat Laut Barat',
'NW': 'Barat Laut',
'NNW': 'Utara Barat Laut'
};

return translations[direction] || direction;
}

function displayWeatherInfo(weatherInfo) {
    const cityElement = document.getElementById("city");
    const dateElement = document.getElementById("date");
    const dayElement = document.getElementById("day");
    const temperatureElement = document.getElementById("temperature");
    const conditionIconElement = document.getElementById("weatherIcon");
    const conditionTextElement = document.getElementById("conditionText");
    const windSpeedElement = document.getElementById("windSpeed");
    const windDirectionElement = document.getElementById("windDirection");
    const humidityElement = document.getElementById("humidity");
    const lastUpdatedTimestamp = weatherInfo.current.last_updated_epoch * 1000; // dikonversi ke milidetik
    const lastUpdatedDate = new Date(lastUpdatedTimestamp);

    const currentDate = new Date(weatherInfo.location.localtime);

    const options1 = {  year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = currentDate.toLocaleDateString('id-ID', options1);
    const lastUpdatedElement = document.getElementById("lastUpdated");
const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', timeZoneName: 'short' };
const formattedLastUpdated = lastUpdatedDate.toLocaleDateString('id-ID', options);
lastUpdatedElement.textContent = `Last Updated: ${formattedLastUpdated}`;
    dateElement.textContent = `${formattedDate}`;
    dayElement.textContent = `${new Intl.DateTimeFormat('id-ID', { weekday: 'long' }).format(currentDate)}`;
    cityElement.textContent = `Kota: ${weatherInfo.location.name}`;

    
    
    const conditionCode = weatherInfo.current.condition.code;
    conditionIconElement.className = "weather-icon " + getWeatherIconClass(conditionCode);
    conditionTextElement.textContent = getWeatherConditionText(conditionCode);
    
    temperatureElement.innerHTML = `<span class="fas fa-thermometer-half weather-icon-co-lead suhu"></span> <p class="mt-2 ">${weatherInfo.current.temp_c} °C</p> `;
    windSpeedElement.innerHTML = `<span class="fas fa-wind weather-icon-co-lead"></span> <p class="mt-2 ">${weatherInfo.current.wind_kph} km/jam</p> `;
    windDirectionElement.textContent = `${translateWindDirection(weatherInfo.current.wind_dir)}`;
    humidityElement.innerHTML = `<span class="fas fa-tint weather-icon-co-lead lembap"></span> <p class="mt-2 ">${weatherInfo.current.humidity}%</p> `;

}
function getWeatherIconClass(conditionCode) {
    switch (conditionCode) {
        case 1000: // Clear
            return "fas fa-sun";
        case 1003: // Partly Cloudy
            return "fas fa-cloud-sun";
        case 1006: // Cloudy
            return "fas fa-cloud";
        case 1030: // Mist
            return "fas fa-smog";
        case 1063: // Patchy rain possible
            return "fas fa-cloud-rain-sun";
        case 1183: // Patchy sleet possible
            return "fas fa-cloud-mix";
        case 1186: // Patchy snow possible
            return "fas fa-snowflake";
        case 1189: // Patchy freezing drizzle possible
            return "fas fa-cloud-drizzle-sun";
        case 1114: // Blowing snow
        case 1117: // Blizzard
            return "fas fa-snowstorm";
        case 1150: // Freezing fog
        case 1153: // Patchy freezing fog
            return "fas fa-fog";
        case 1192: // Moderate or heavy snow showers
        case 1195: // Moderate or heavy sleet showers
        case 1198: // Moderate or heavy hail showers
        case 1201: // Patchy light snow showers
        case 1204: // Patchy light sleet showers
        case 1207: // Patchy light hail showers
            return "fas fa-snowflake";
        case 1240: // Light rain shower
        case 1243: // Moderate or heavy rain shower
        case 1246: // Torrential rain shower
            return "fas fa-cloud-showers-heavy";
        case 1273: // Patchy light rain with thunder
        case 1276: // Moderate or heavy rain with thunder
            return "fas fa-bolt";
        default:
            return "fas fa-question-circle";
    }
}

function getWeatherConditionText(conditionCode) {
switch (conditionCode) {
case 1000:
    return "Langit Cerah";
case 1003:
    return "Sebagian Berawan";
case 1006:
    return "Berawan";
case 1030:
    return "Berkabut";
case 1063:
    return "Hujan Ringan Kemungkinan";
case 1183:
    return "Hujan Salju Ringan Kemungkinan";
case 1186:
    return "Salju Ringan Kemungkinan";
case 1189:
    return "Drizzle Beku Ringan Kemungkinan";
case 1114:
case 1117:
    return "Badai Salju";
case 1150:
case 1153:
    return "Kabut Beku";
case 1192:
case 1195:
case 1198:
case 1201:
case 1204:
case 1207:
    return "Hujan Salju";
case 1240:
case 1243:
case 1246:
    return "Hujan";
case 1273:
case 1276:
    return "Badai Petir";
default:
    return "Tidak Diketahui";
}
}


document.addEventListener("DOMContentLoaded", function () {
    var animatedElements = document.querySelectorAll(".animate-zoomIn");

    function handleIntersection(entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                observer.unobserve(entry.target);
            }
        });
    }

    var observer = new IntersectionObserver(handleIntersection, {
        threshold: 0.3 // Ubah nilai ini sesuai kebutuhan
    });

    animatedElements.forEach(function (element) {
        observer.observe(element);
    });
});