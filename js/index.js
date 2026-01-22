
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
   
  });


  
  // IMPORTANTE: las funciones deben existir en window para que onclick las encuentre
window.mostrarRegistro = function () {
  console.log("➡️ mostrarRegistro() onclick");

  const loginForm = document.getElementById("loginForm");
  const registerForm = document.getElementById("registerForm");
  const modalTitle = document.getElementById("modalTitle");

  if (!loginForm || !registerForm) {
    console.error("❌ No existe loginForm o registerForm");
    return;
  }

  loginForm.classList.add("d-none");
  registerForm.classList.remove("d-none");
  if (modalTitle) modalTitle.textContent = "Registro";

  // foco
  const first = registerForm.querySelector("input, select");
  if (first) first.focus();
};

window.mostrarLogin = function () {
  console.log("⬅️ mostrarLogin() onclick");

  const loginForm = document.getElementById("loginForm");
  const registerForm = document.getElementById("registerForm");
  const modalTitle = document.getElementById("modalTitle");

  if (!loginForm || !registerForm) {
    console.error("❌ No existe loginForm o registerForm");
    return;
  }

  registerForm.classList.add("d-none");
  loginForm.classList.remove("d-none");
  if (modalTitle) modalTitle.textContent = "Iniciar sesión";

  // foco
  const first = loginForm.querySelector("input");
  if (first) first.focus();
};

// (Opcional) cada vez que abras el modal, vuelve a login
document.addEventListener("DOMContentLoaded", () => {
  const modalEl = document.getElementById("exampleModal");
  if (!modalEl) return;

  modalEl.addEventListener("shown.bs.modal", () => {
    window.mostrarLogin();
  });
});


document.addEventListener("DOMContentLoaded", () => {

  const registerForm = document.getElementById("registerForm");
  console.log("[INIT] registerForm =>", registerForm);

  if (!registerForm) return;

  registerForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const passInput = document.getElementById("password");
    const confirmInput = document.getElementById("confirmPassword");

    console.log("[DOM] #password =>", passInput);
    console.log("[DOM] #confirmPassword =>", confirmInput);

    if (!passInput || !confirmInput) {
      console.error("❌ No se encontraron los inputs #password o #confirmPassword. Revisa que existan los IDs.");
      Swal.fire({
        icon: "error",
        title: "Error de HTML",
        text: "No se encontraron los campos de contraseña (IDs)."
      });
      return;
    }

    const password = passInput.value;
    const confirmPassword = confirmInput.value;

    console.log("[VALUES] password:", password);
    console.log("[VALUES] confirmPassword:", confirmPassword);

    if (password !== confirmPassword) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Las contraseñas no coinciden"
      });
      return;
    }

    const formData = new FormData(registerForm);

    console.log("📦 [FORMDATA] Enviando campos:");
    for (const [key, value] of formData.entries()) {
      console.log(`   - ${key}:`, value);
    }

    Swal.fire({
      title: "Registrando...",
      text: "Por favor espere",
      allowOutsideClick: false,
      didOpen: () => Swal.showLoading()
    });

    try {
      const response = await fetch("ajax/insert/registro_cliente.ajax.php", {
        method: "POST",
        body: formData
      });

      const rawText = await response.text();
      console.log("🧾 [RAW RESPONSE] =>", rawText);

      // Intentar parsear JSON
      let data;
      try {
        data = JSON.parse(rawText);
      } catch (err) {
        console.error("❌ Respuesta NO es JSON válido. Probablemente PHP está devolviendo HTML/Warnings.");
        Swal.close();
        Swal.fire({
          icon: "error",
          title: "Respuesta inválida",
          text: "El servidor no devolvió JSON. Revisa consola (RAW RESPONSE)."
        });
        return;
      }

      console.log("✅ [JSON PARSED] =>", data);
      Swal.close();

      if (data.status === "success") {
        Swal.fire({
          icon: "success",
          title: "Registro exitoso",
          text: data.message
        });

        registerForm.reset();
        if (typeof mostrarLogin === "function") mostrarLogin();

      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: data.message || "Ocurrió un error"
        });
      }

    } catch (error) {
      Swal.close();
      console.error("🔥 [FETCH ERROR] =>", error);
      Swal.fire({
        icon: "error",
        title: "Error de servidor",
        text: "No se pudo procesar la solicitud"
      });
    }
  });

});


document.addEventListener("DOMContentLoaded", () => {
  const loginForm = document.getElementById("loginForm");
  if (!loginForm) return;

  loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const submitBtn = loginForm.querySelector('button[type="submit"]');
    if (submitBtn) submitBtn.disabled = true;

    const formData = new FormData(loginForm);

    console.group("🔐 LOGIN");
    console.log("📦 Enviando:");
    for (const [k, v] of formData.entries()) console.log(" -", k, v);

    Swal.fire({
      title: "Iniciando sesión...",
      allowOutsideClick: false,
      didOpen: () => Swal.showLoading()
    });

    try {
      const res = await fetch("ajax/auth/login.ajax.php", {
        method: "POST",
        body: formData,
        headers: { "X-Requested-With": "XMLHttpRequest" }
      });

      const raw = await res.text();
      console.log("🧾 RAW RESPONSE:", raw);

      // ✅ Si el servidor responde 404/500, corta aquí
      if (!res.ok) {
        Swal.close();
        console.error(`❌ HTTP Error ${res.status}`);
        Swal.fire("Error", `Servidor respondió ${res.status}`, "error");
        return;
      }

      // ✅ Parseo seguro JSON
      let data;
      try {
        data = JSON.parse(raw);
      } catch (err) {
        Swal.close();
        console.error("❌ JSON inválido:", err);
        Swal.fire("Error", "El servidor no devolvió JSON válido", "error");
        return;
      }

      Swal.close();
      console.log("✅ JSON:", data);

      if (data.status === "success") {
        const destino = data.redirect || "modelo/atencion_cliente.php";
        console.log("➡️ Redirigiendo a:", destino);

        // Cerrar modal (opcional)
        const modalEl = document.getElementById("exampleModal");
        if (modalEl) {
          const bsModal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
          bsModal.hide();
        }

        // ✅ Espera a que SweetAlert termine para redirigir sí o sí
        await Swal.fire({
          icon: "success",
          title: "Éxito",
          text: data.message || "Inicio de sesión correcto",
          timer: 900,
          showConfirmButton: false
        });

        // ✅ Redirección fuerte + fallback
        window.location.assign(destino);
        setTimeout(() => (window.location.href = destino), 500);

      } else {
        Swal.fire("Error", data.message || "Credenciales incorrectas", "error");
      }

    } catch (err) {
      Swal.close();
      console.error("🔥 Error fetch:", err);
      Swal.fire("Error", "No se pudo iniciar sesión (red/servidor)", "error");
    } finally {
      console.groupEnd();
      if (submitBtn) submitBtn.disabled = false;
    }
  });
});
