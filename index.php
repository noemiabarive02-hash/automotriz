
<?php
require_once "cabecera/cabecera.php";


?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Iniciar sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <!-- LOGIN -->
        <form id="loginForm">
          <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control" required>
          </div>

          <center> </center> <button type="submit" class="btn btn-primary ">
            Iniciar sesión
          </button>

          <p class="text-center mt-3">
            ¿No tienes cuenta?
            <a href="#" onclick="mostrarRegistro()" class="registrate">Registrarse</a>
          </p>
        </form>

        <!-- REGISTRO -->
        <form id="registerForm" class="d-none">

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Nombre</label>
              <input type="text" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Apellido</label>
              <input type="text" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Teléfono</label>
              <input type="tel" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Correo</label>
              <input type="email" class="form-control" required>
            </div>
          </div>

          <div class="mb-3">
              <label class="form-label">Empresa</label>
              <select name="id_empresa"  id="id_empresa"   class="form-control" required>
                <option value="">Seleccione una empresa</option>

                <?php foreach ($empresas as $empresa): ?>
                  <option value="<?= $empresa['id_empresa']; ?>">
                    <?= htmlspecialchars($empresa['nombre_empresa']); ?>
                  </option>
                <?php endforeach; ?>

              </select>
            </div>


          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Zona</label>
              <select name="id_zona" id="id_zona"  class="form-control" required>
                <option value="">Seleccione una Zona</option>

                <?php foreach ($zona as $z): ?>
                  <option value="<?= $z['id_zona_localidad']; ?>">
                    <?= htmlspecialchars($z['descripcion']); ?>
                  </option>
                <?php endforeach; ?>

              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Compañía</label>
            <select name="id_compania" id="id_compania" class="form-control" required>
                <option value="">Seleccione una Compañia</option>

                <?php foreach ($compania as $c): ?>
                  <option value="<?= $c['id_compania']; ?>">
                    <?= htmlspecialchars($c['descripcion']); ?>
                  </option>
                <?php endforeach; ?>

              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Contraseña</label>
              <input type="password" id="password" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Confirmar contraseña</label>
              <input type="password" id="confirmPassword" class="form-control" required>
            </div>
          </div>

          <div id="passwordError" class="text-danger small d-none mb-2">
            Las contraseñas no coinciden
          </div>

          <button type="submit" class="btn btn-success">
            Registrar usuario
          </button>

          <p class="text-center mt-3">
            ¿Ya tienes cuenta?
            <a href="#" onclick="mostrarLogin()" class="registrate">Iniciar sesión</a>
          </p>
        </form>

      </div>
    </div>
  </div>
</div>



<!-- HERO / CAROUSEL -->
<div id="inicio" class="carousel slide hero" data-bs-ride="carousel">
  <div class="carousel-inner">

    <div class="carousel-item active">
      <img src="imagenes/auto 1.avif" class="d-block w-100 hero-img">
      <div class="carousel-caption hero-caption">
        <h1>Especialistas en Plásticos Automotrices</h1>
        <p>Reparación, reconstrucción y refuerzo con estándares profesionales</p>
        <a href="#servicios" class="btn btn-orange">Nuestros Servicios</a>
      </div>
    </div>

    <div class="carousel-item">
      <img src="imagenes/imagen 1.webp" class="d-block w-100 hero-img">
      <div class="carousel-caption hero-caption">
        <h1>Recupera tus piezas originales</h1>
        <p>Ahorra costos sin sacrificar calidad ni seguridad</p>
        <a href="#contacto" class="btn btn-orange">Solicitar Asesoría</a>
      </div>
    </div>

    <div class="carousel-item">
      <img src="imagenes/imagen 2.jpg" class="d-block w-100 hero-img">
      <div class="carousel-caption hero-caption">
        <h1>Tecnología y Experiencia</h1>
        <p>Fibra de carbono y soluciones técnicas avanzadas</p>
        <a href="#nosotros" class="btn btn-orange">Conócenos</a>
      </div>
    </div>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#inicio" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#inicio" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- NOSOTROS -->
<section id="nosotros" class="section">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6">
        <h2 class="section-title">Quiénes Somos</h2>
        <p>
          Somos especialistas en <strong>reparación y reconstrucción de plásticos automotrices</strong>.
          Aplicamos técnicas avanzadas que permiten recuperar piezas originales y reducir costos.
        </p>
        <p>
          Trabajamos con materiales de alto rendimiento y estándares técnicos internacionales.
        </p>
      </div>
      <div class="col-md-6 text-center">
        <img src="imagenes/logo.avif" class="img-fluid" style="max-width:300px;">
      </div>
    </div>
  </div>
</section>

<!-- SERVICIOS -->
<section id="servicios" class="section bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title">Nuestros Servicios</h2>
      <p>Soluciones técnicas especializadas para vehículos modernos</p>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card card-service h-100">
          <img src="imagenes/imagen 3.jpg" class="card-img-top">
          <div class="card-body">
            <h5>Reparación de Plásticos</h5>
            <p>Soldadura, refuerzo y restauración de piezas automotrices.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-service h-100">
          <img src="imagenes/imagen 3.jpg" class="card-img-top">
          <div class="card-body">
            <h5>Reconstrucción Automotriz</h5>
            <p>Recuperación estructural de componentes dañados.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-service h-100">
          <img src="imagenes/imagen 3.jpg" class="card-img-top">
          <div class="card-body">
            <h5>Fibra de Carbono</h5>
            <p>Refuerzos técnicos para resistencia y ligereza.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BENEFICIOS -->
<section id="beneficios" class="section">
  <div class="container text-center">
    <h2 class="section-title mb-5">¿Por qué elegirnos?</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="icon-box"><i class="bi bi-tools"></i></div>
        <h6>Experiencia Técnica</h6>
      </div>
      <div class="col-md-3">
        <div class="icon-box"><i class="bi bi-shield-check"></i></div>
        <h6>Calidad Garantizada</h6>
      </div>
      <div class="col-md-3">
        <div class="icon-box"><i class="bi bi-cash-coin"></i></div>
        <h6>Ahorro de Costos</h6>
      </div>
      <div class="col-md-3">
        <div class="icon-box"><i class="bi bi-people"></i></div>
        <h6>Atención Personalizada</h6>
      </div>
    </div>
  </div>
</section>

<!-- CONTACTO -->
<section id="contacto" class="section bg-light">
  <div class="container">
    <div class="row g-5">
      <div class="col-md-6">
        <h2 class="section-title">Contáctanos</h2>
        <p>Solicita asesoría profesional para tu vehículo.</p>
      </div>

      <div class="col-md-6">
        <form>
          <input class="form-control mb-3" placeholder="Nombre completo">
          <input class="form-control mb-3" placeholder="Correo electrónico">
          <textarea class="form-control mb-3" rows="4" placeholder="Mensaje"></textarea>
          <button class="btn btn-orange w-100">Enviar consulta</button>
        </form>
      </div>
    </div>
  </div>
</section>




<?php
require_once "footer/footer.php";
?>