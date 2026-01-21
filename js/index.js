
window.addEventListener('scroll', function() {
  const navbar = document.getElementById('mainNavbar');
  if (window.scrollY > 50) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});

// Activar enlace actual
document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', function() {
    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
    this.classList.add('active');
  });
});

// Cerrar navbar al hacer click en mobile
document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', () => {
    const navbarCollapse = document.querySelector('.navbar-collapse');
    if (navbarCollapse.classList.contains('show')) {
      const bsCollapse = new bootstrap.Collapse(navbarCollapse);
      bsCollapse.hide();
    }
  });
});

// Efecto hover en logo
const logo = document.querySelector('.navbar-brand');
logo.addEventListener('mouseenter', () => {
  logo.style.transform = 'scale(1.05)';
});
logo.addEventListener('mouseleave', () => {
  if (window.scrollY <= 50) {
    logo.style.transform = 'scale(1)';
  }
});

  const loginForm = document.getElementById('loginForm');
  const registerForm = document.getElementById('registerForm');
  const modalTitle = document.getElementById('modalTitle');
  const passwordError = document.getElementById('passwordError');

  function mostrarRegistro() {
    loginForm.classList.add('d-none');
    registerForm.classList.remove('d-none');
    modalTitle.textContent = 'Registro de usuario';
  }

  function mostrarLogin() {
    registerForm.classList.add('d-none');
    loginForm.classList.remove('d-none');
    modalTitle.textContent = 'Iniciar sesión';
  }

  registerForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const pass = document.getElementById('password').value;
    const confirm = document.getElementById('confirmPassword').value;

    if (pass !== confirm) {
      passwordError.classList.remove('d-none');
      return;
    }

    passwordError.classList.add('d-none');
    alert('Usuario registrado correctamente');
    mostrarLogin();
  });

  loginForm.addEventListener('submit', function (e) {
    e.preventDefault();
    alert('Inicio de sesión exitoso');
  });