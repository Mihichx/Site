elem = document.querySelector(".modal-bg");
elem1 = document.querySelector(".modal");
elem2 = document.querySelector(".modal-good");

const contactForm = document.getElementById('contact');
let userList = [];

if (contactForm) {
    contactForm.addEventListener("submit", readForm);
}

function readForm(e) {
    e.preventDefault();
    const formData = new FormData(e.target);

    user = {};
    for (let pair of formData.entries()) { 
        user[pair[0]] = pair[1];
    }

    userList.push(user);
    console.log(userList);
    
    // Показать сообщение об успехе
    elem1.classList.remove("display");
    elem2.classList.add("display");
    setTimeout(() => elem2.classList.remove("display"), 1500);
    setTimeout(() => elem.classList.remove("display"), 1500);
}

function modal() {
    elem.classList.add("display");
    elem1.classList.add("display");
    
}

function closing() {
    elem.classList.remove("display");
    elem1.classList.remove("display");
}