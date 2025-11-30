elem = document.querySelector(".modal-bg");
elem1 = document.querySelector(".modal");
elem2 = document.querySelector(".modal-good");

function send() {
    elem1.classList.remove("display");
    elem2.classList.add("display");
    setTimeout(() => elem2.classList.remove("display"), 1500);
    setTimeout(() => elem.classList.remove("display"), 1500);
    return false; // Предотвращает отправку формы
}

function modal() {
    elem.classList.add("display");
    elem1.classList.add("display");
    
}

function closing() {
    elem.classList.remove("display");
    elem1.classList.remove("display");
}