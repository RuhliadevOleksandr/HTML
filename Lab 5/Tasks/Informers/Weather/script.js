$(function() {

    $('.weather-temperature').openWeather({
        key: 'c9d49310f8023ee2617a7634de23c2aa',
        city: 'Kyiv',
        windSpeedTarget: '.weather-wind-speed',
        minTemperatureTarget: '.weather-min-temperature',
        maxTemperatureTarget: '.weather-max-temperature',
        humidityTarget: '.weather-humidity',
        sunriseTarget: '.weather-sunrise',
        sunsetTarget: '.weather-sunset',
        placeTarget: '.weather-place',
        iconTarget: '.weather-icon',
        success: function(data) {
            // show weather
            $('.weather-wrapper').show();
        }
    });

});