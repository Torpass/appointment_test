</main>


  <footer>
    <!-- place footer here -->
  </footer>

  <script>
    $(document).ready(function() {
    $('#tablaID').DataTable({
      "pageLength": 5,
      "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
      }
    });
  });
  </script>

</body>

</html>