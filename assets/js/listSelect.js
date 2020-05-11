const FlightList = document.querySelectorAll('.flight--list>.radio--container');
const flightButtonStart = document.querySelector('#flight_button_start');
const flightButtonFinish = document.querySelector('#flight_button_finish');
const flightStart = document.querySelector('#flight_container_start');
const flightFinish = document.querySelector('#flight_container_finish');

FlightList.forEach(e => e.addEventListener('click', ListSelected, false));

function ListSelected(e)
{    
    const target = e.target;
    if(target.dataset.list=="start")
    {
        flightButtonStart.disabled = false;
        flightButtonStart.style.cursor="pointer";
    }
    else if(target.dataset.list="finish")
    {
        flightButtonFinish.disabled = false;
        flightButtonFinish.style.cursor="pointer";
    }
   
    selectedAirport = e.target.dataset.number;
}
