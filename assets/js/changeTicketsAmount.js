const ticketsContainer = document.querySelector('#tickets_container');  
const ticketButtons = document.querySelectorAll('.ticket-button');
//zmienne do przechowywania które lotniska zostały wybrane
let selectedAirport;
let selectedAirports = new Array();

ticketButtons.forEach(e => e.addEventListener('click', changeTicketsAmount, false));

function changeTicketsAmount(e)
{
    let target = e.target;
    const ticketSubmit = document.querySelector('#ticket_button');
    ticketSubmit.style.cursor='pointer';
    ticketSubmit.disabled=false;

    switch(target.id)
    {
        case 'add_ticket_normal':
        {
            let normal = document.querySelector('#ticket_normal');
            normal.value++;
            break;
        }

        case 'remove_ticket_normal':
        {
            let normal = document.querySelector('#ticket_normal');
            if(normal.value>0)
                normal.value--;
            break;
        }

        case 'add_ticket_reduced':
        {
            let reduced = document.querySelector('#ticket_reduced');
            reduced.value++;
            break;
        }

        case 'remove_ticket_reduced':
        {
            let reduced = document.querySelector('#ticket_reduced');
            if(reduced.value>0)
                reduced.value--;
            break;
        }

        case 'add_ticket_family':
        {
            let family = document.querySelector('#ticket_family');
            family.value++;
            break;
        }

        case 'remove_ticket_family':
        {
            let family = document.querySelector('#ticket_family');
            if(family.value>0)
                family.value--;
            break;
        }

    }
}