const ticketButtons = document.querySelectorAll('.ticket-button');
let amountOfTickets = 0;

ticketButtons.forEach(e => e.addEventListener('click', changeTickets, false));

function changeTickets(e)
{
    let target = e.target;
    
    switch(target.id)
    {
        case 'add_ticket_normal':
        {
            removeAllSelection();
            const normal = document.querySelector('#ticket_normal');
            const removeButton = document.querySelector('#remove_ticket_normal');
            const checkbox = document.querySelector('#checkbox_normal');
            checkbox.checked = true;
            removeButton.style.display="block";
            normal.style.background="#199e19";
            target.style.display="none";
            toggleButton(true);
            break;
        }

        case 'remove_ticket_normal':
        {
            const normal = document.querySelector('#ticket_normal');
            const addButton = document.querySelector('#add_ticket_normal');
            const checkbox = document.querySelector('#checkbox_normal');
            checkbox.checked = false;
            addButton.style.display="block";
            normal.style.background="blue";
            target.style.display="none";
            toggleButton(false);
            break;
        }

        case 'add_ticket_reduced':
        {
            removeAllSelection();
            const reduced = document.querySelector('#ticket_reduced');
            const removeButton = document.querySelector('#remove_ticket_reduced');
            const checkbox = document.querySelector('#checkbox_reduced');
            checkbox.checked = true;
            removeButton.style.display="block";
            reduced.style.background="#199e19";
            target.style.display="none";
            toggleButton(true);
            break;
        }

        case 'remove_ticket_reduced':
        {
            
            const reduced = document.querySelector('#ticket_reduced');
            const addButton = document.querySelector('#add_ticket_reduced');
            const checkbox = document.querySelector('#checkbox_reduced');
            checkbox.checked = false;
            addButton.style.display="block";
            reduced.style.background="blue";
            target.style.display="none";
            toggleButton(false);
            break;
        }

        case 'add_ticket_family':
            {
                removeAllSelection();
                const family = document.querySelector('#ticket_family');
                const removeButton = document.querySelector('#remove_ticket_family');
                const checkbox = document.querySelector('#checkbox_family');
                checkbox.checked = true;
                removeButton.style.display="block";
                family.style.background="#199e19";
                target.style.display="none";
                toggleButton(true);
                break;
            }
    
            case 'remove_ticket_family':
            {
                const family = document.querySelector('#ticket_family');
                const addButton = document.querySelector('#add_ticket_family');
                const checkbox = document.querySelector('#checkbox_family');
                checkbox.checked = false;
                addButton.style.display="block";
                family.style.background="blue";
                target.style.display="none";
                toggleButton(false);
                break;
            }

    }

    function removeAllSelection()
    {
        const family = document.querySelector('#ticket_family');
        const addButtonFamily = document.querySelector('#add_ticket_family');
        const removeButtonFamily = document.querySelector('#remove_ticket_family');
        const checkboxFamily = document.querySelector('#checkbox_family');
        checkboxFamily.checked = false;
        addButtonFamily.style.display="block";
        removeButtonFamily.style.display="none";
        family.style.background="blue";
        target.style.display="none";

        const reduced = document.querySelector('#ticket_reduced');
        const addButtonReduced = document.querySelector('#add_ticket_reduced');
        const removeButtonReduced = document.querySelector('#remove_ticket_reduced');
        const checkboxReduced = document.querySelector('#checkbox_reduced');
        checkboxReduced.checked = false;
        addButtonReduced.style.display="block";
        removeButtonReduced.style.display="none";
        reduced.style.background="blue";
        target.style.display="none";

        const normal = document.querySelector('#ticket_normal');
        const addButtonNormal = document.querySelector('#add_ticket_normal');
        const removeButtonNormal = document.querySelector('#remove_ticket_normal');
        const checkboxNormal = document.querySelector('#checkbox_normal');
        checkboxNormal.checked = false;
        addButtonNormal.style.display="block";
        removeButtonNormal.style.display="none";
        normal.style.background="blue";
        target.style.display="none";

        toggleButton(false);
    }

    function toggleButton(add)
    {
        const ticketSubmit = document.querySelector('#ticket_button');
        if(add == true)
        {
            ticketSubmit.style.cursor='pointer';
            ticketSubmit.disabled=false;
        }
        else
        {
            ticketSubmit.style.cursor='default';
            ticketSubmit.disabled=true;
        }
    }


    
    
}