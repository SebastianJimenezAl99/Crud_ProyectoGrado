// Obtener el botón de navegación y el menú desplegable
const navbarToggler = document.querySelector('.navbar-toggler');
const navbarCollapse = document.querySelector('.navbar-collapse');

// Escuchar el evento click en el botón de navegación
if (navbarToggler) {
    navbarToggler.addEventListener('click', function() {
      navbarCollapse.classList.toggle('show');
    });
  }

// Cerrar el menú desplegable al hacer clic en un enlace
const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
navLinks.forEach(function(navLink) {
  navLink.addEventListener('click', function() {
     // Detener la propagación del evento de clic en el enlace
     event.stopPropagation();

     // Verificar si el menú desplegable está abierto
     if (navbarCollapse.classList.contains('show')) {
       navbarCollapse.classList.remove('show');
     }
  });
});

// Cerrar el menú desplegable al hacer clic fuera del mismo
document.addEventListener('click', function(event) {
  const targetElement = event.target;
  if (!targetElement.closest('.navbar-collapse')) {
    const navbarCollapse = document.querySelector('.navbar-collapse');
    if (navbarCollapse) {
        navbarCollapse.classList.remove('show');
    }
  }
});
