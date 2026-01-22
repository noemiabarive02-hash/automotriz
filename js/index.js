document.addEventListener("DOMContentLoaded", () => {
  // =========================
  // 1) Hover logo (con guard)
  // =========================
  const logo = document.querySelector(".navbar-brand");
  if (logo) {
    logo.addEventListener("mouseenter", () => {
      logo.style.transform = "scale(1.05)";
    });
    logo.addEventListener("mouseleave", () => {
      if (window.scrollY <= 50) logo.style.transform = "scale(1)";
    });
  }

console.log("✅ index.js cargado (toggle modal)");

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


  // =========================
  // 4) REGISTRO (AJAX)
  // =========================
  if (registerForm) {
    registerForm.addEventListener("submit", async (e) => {
      e.preventDefault();

      const pass = document.getElementById("password")?.value ?? "";
      const confirm = document.getElementById("confirmPassword")?.value ?? "";

      if (pass !== confirm) {
        if (passwordError) passwordError.classList.remove("d-none");
        Swal.fire({ icon: "error", title: "Error", text: "Las contraseñas no coinciden" });
        return;
      }
      if (passwordError) passwordError.classList.add("d-none");

      const formData = new FormData(registerForm);

      Swal.fire({
        title: "Registrando...",
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading(),
      });

      try {
        const res = await fetch("ajax/insert/registro_cliente.ajax.php", {
          method: "POST",
          body: formData,
        });

        const raw = await res.text();
        let data;
        try {
          data = JSON.parse(raw);
        } catch {
          Swal.close();
          console.error("REGISTRO RAW:", raw);
          Swal.fire("Error", "Respuesta inválida del servidor", "error");
          return;
        }

        Swal.close();

        if (data.status === "success") {
          Swal.fire("Éxito", data.message, "success");
          registerForm.reset();
          mostrarLogin();
        } else {
          Swal.fire("Error", data.message || "No se pudo registrar", "error");
        }
      } catch (err) {
        Swal.close();
        console.error(err);
        Swal.fire("Error", "No se pudo procesar el registro", "error");
      }
    });
  }

  // =========================
  // 5) LOGIN (AJAX + redirect)
  // =========================
  if (loginForm) {
    loginForm.addEventListener("submit", async (e) => {
      e.preventDefault();

      const formData = new FormData(loginForm);

      Swal.fire({
        title: "Iniciando sesión...",
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading(),
      });

      try {
        const res = await fetch("ajax/auth/login.ajax.php", {
          method: "POST",
          body: formData,
        });

        const raw = await res.text();
        let data;
        try {
          data = JSON.parse(raw);
        } catch {
          Swal.close();
          console.error("LOGIN RAW:", raw);
          Swal.fire("Error", "Respuesta inválida del servidor", "error");
          return;
        }

        Swal.close();

        if (data.status === "success") {
          Swal.fire("Éxito", data.message, "success");

          // Cierra modal (opcional)
          if (modalEl) {
            const bsModal =
              bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            bsModal.hide();
          }

          // Redirige (backend puede enviar redirect; si no, usa el default)
          const destino = data.redirect || "modelo/atencion_cliente.php";
          setTimeout(() => (window.location.href = destino), 600);
        } else {
          Swal.fire("Error", data.message || "Credenciales incorrectas", "error");
        }
      } catch (err) {
        Swal.close();
        console.error(err);
        Swal.fire("Error", "No se pudo iniciar sesión", "error");
      }
    });
  }
});
