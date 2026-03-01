const modal0 = document.querySelector(".modal");
const modal1 = document.querySelector(".modal1");
const modal2 = document.querySelector(".modal2");
const modal_bg = document.querySelector(".modal-bg");
const modal_bg_catalog = document.querySelector(".modal-bg-catalog");
const dropdown_content = document.querySelector(".dropdown-content");
const aboutus_img = document.querySelector(".aboutus-img");
const error = document.querySelector(".error");

function open_catalog() {
    dropdown_content.classList.add("display");
    modal_bg_catalog.classList.add("display");
    setTimeout(() => {
        dropdown_content.classList.add("show");
    }, 10);
    aboutus_img.classList.add('aboutus-img-active')
}

function closing_catalog() {
    dropdown_content.classList.remove("show");
    setTimeout(() => {
        dropdown_content.classList.remove("display");
        modal_bg_catalog.classList.remove("display");
    }, 300);
    aboutus_img.classList.remove('aboutus-img-active')
}

function send() {
    modal_bg.classList.remove("active");
    modal0.classList.remove("active");
}

function modal() {
    modal_bg.classList.add("active");
    modal0.classList.add("active");
}

function closing() {
    modal_bg.classList.remove("active");
    modal0.classList.remove("active");
    modal1.classList.remove("active");
    modal2.classList.remove("active");
    error.classList.add("delate")
}

function login() {
    modal_bg.classList.add("active");
    modal1.classList.add("active");
}

function regist() {
    modal1.classList.remove("active");
    modal2.classList.add("active");
}