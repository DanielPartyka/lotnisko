const lists = document.querySelectorAll(".panel--list>li");
const listsSmall = document.querySelectorAll(".panel--list>li>form>div>label");
const buttons = document.querySelectorAll(".panel--list>li>form>div>button");

lists.forEach(e => e.addEventListener('click', showMenu, false));
listsSmall.forEach(e => e.addEventListener('click', showDetails, false));

function showMenu(e)
{
    const target = e.target.textContent;
    listsSmall.forEach(e => e.style.display="none");
    buttons.forEach(e => e.style.display="none");
    listsSmall.forEach(e => e.style.color="black");

    switch(target)
    {
        case "Loty":
            {
                document.querySelectorAll(".panel--list>li>form>div").forEach(e => e.style.display="block");
                document.querySelectorAll(".flight--container>button").forEach(e => e.style.display="block");
                break;
            }
        case "Lotniska":
                    {
                        document.querySelectorAll(".airports--container>div").forEach(e => e.style.display="block");
                        document.querySelectorAll(".airports--container>button").forEach(e => e.style.display="block");
                        break;
                    }
                    case "Pasażerowie":
                            {
                                document.querySelectorAll(".passengers--container>label").forEach(e => e.style.display="block");
                                document.querySelectorAll(".passengers--container>button").forEach(e => e.style.display="block");
                                break;
                            }

                            case "Pracownicy":
                                    {
                                        document.querySelectorAll(".employees--container>label").forEach(e => e.style.display="block");
                                        document.querySelectorAll(".employees--container>button").forEach(e => e.style.display="block");
                                        break;
                                    }

                                    case "Samoloty":
                                            {
                                                document.querySelectorAll(".airplanes--container>label").forEach(e => e.style.display="block");
                                                document.querySelectorAll(".airplanes--container>button").forEach(e => e.style.display="block");
                                                break;
                                            }
    }
}

function showDetails()
{

}
