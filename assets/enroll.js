elem = document.querySelector(".modal-bg");
elem1 = document.querySelector(".modal");
elem2 = document.querySelector(".modal-good");
elem3 = document.querySelector(".dropdown-content");
elem4 = document.querySelector(".modal-bg-catalog");

let sendTimeout;

function open_catalog() {
    elem3.classList.add("display");
    elem4.classList.add("display");
    setTimeout(() => {
        elem3.classList.add("show");
    }, 10);
}

function send() {
    elem1.classList.remove("display");
    elem2.classList.add("display");
    if (sendTimeout) clearTimeout(sendTimeout);
    sendTimeout = setTimeout(() => {
        elem2.classList.remove("display");
        elem.classList.remove("display");
    }, 1500);
}

function modal() {
    elem.classList.add("display");
    elem1.classList.add("display");
    
}

function closing() {
    elem.classList.remove("display");
    elem1.classList.remove("display");
}

function closing_catalog() {
    elem3.classList.remove("show");
    setTimeout(() => {
        elem3.classList.remove("display");
        elem4.classList.remove("display");
    }, 300);
}
