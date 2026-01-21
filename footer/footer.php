
<!-- FOOTER -->
<footer class="footer pt-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <h5>Plastiauto Perú</h5>
        <p>Especialistas en reparación y reconstrucción de plásticos automotrices.</p>
      </div>

      <div class="col-md-4">
        <h5>Enlaces</h5>
        <ul class="list-unstyled">
          <li><a href="#inicio">Inicio</a></li>
          <li><a href="#nosotros">Nosotros</a></li>
          <li><a href="#servicios">Servicios</a></li>
          <li><a href="#contacto">Contacto</a></li>
        </ul>
      </div>

      <div class="col-md-4">
        <h5>Contacto</h5>
        <p><i class="bi bi-geo-alt"></i> Lima – Perú</p>
        <p><i class="bi bi-telephone"></i> 999 999 999</p>
        <p><i class="bi bi-envelope"></i> contacto@plastiauto.pe</p>
        <div>
          <a href="#"><i class="bi bi-facebook fs-4 me-3"></i></a>
          <a href="#"><i class="bi bi-instagram fs-4 me-3"></i></a>
          <a href="#"><i class="bi bi-whatsapp fs-4"></i></a>
        </div>
      </div>
    </div>

    <hr class="mt-4">
    <p class="text-center pb-3 mb-0">© 2024 Plastiauto Perú. Todos los derechos reservados.</p>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="./node_modules/select2/dist/js/select2.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./js/index.js"></script>
</body>
</html>


<script>
$('#exampleModal').on('shown.bs.modal', function () {

  $('#id_empresa, #id_zona, #id_compania').each(function () {
    if (!$(this).hasClass("select2-hidden-accessible")) {
      $(this).select2({
        dropdownParent: $('#exampleModal'),
        width: '100%'
      });
    }
  });

});

</script>

