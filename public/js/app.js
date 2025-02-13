//Sleccion de tema oscuro y claro
const themeSwitch = document.getElementById("switch");


themeSwitch.addEventListener("change", () => {
    if (themeSwitch.checked) {
        document.documentElement.setAttribute("data-theme", "dark");
        localStorage.setItem("theme", "dark");
    } else {
        document.documentElement.setAttribute("data-theme", "light");
        localStorage.setItem("theme", "light");
    }
});


const savedTheme = localStorage.getItem("theme") || "light";
document.documentElement.setAttribute("data-theme", savedTheme);


if (savedTheme === "dark") {
    themeSwitch.checked = true;
}


//Menu hamburger para mobile

const hamburgerMenu = document.getElementById("menu");
const hamMenu = document.getElementById("hamMenu")
const navLinks = document.getElementById("navLinks");

hamburgerMenu.addEventListener("click", () => {
    navLinks.classList.toggle("show");
});

hamMenu.addEventListener("click", () => {
    navLinks.classList.toggle("show");
});