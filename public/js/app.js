// Selecciona el input tipo checkbox
const themeSwitch = document.getElementById("switch");

// Función para alternar el tema
themeSwitch.addEventListener("change", () => {
    if (themeSwitch.checked) {
        document.documentElement.setAttribute("data-theme", "dark");
        localStorage.setItem("theme", "dark");
    } else {
        document.documentElement.setAttribute("data-theme", "light");
        localStorage.setItem("theme", "light");
    }
});

// Carga el tema desde localStorage al cargar la página
const savedTheme = localStorage.getItem("theme") || "light";
document.documentElement.setAttribute("data-theme", savedTheme);

// Asegura que el estado del checkbox coincida con el tema guardado
if (savedTheme === "dark") {
    themeSwitch.checked = true;
}