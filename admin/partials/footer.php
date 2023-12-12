        <!-- partial:partials/footer.php -->
        <footer class="footer">
            <div class="container-fluid d-flex justify-content-center">
                <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">
                    Copyright 2023 © KELOMPOK 3 </span>
            </div>
        </footer>
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });

            function confirmDelete(idBerita) {
                if (confirm('Yakin ingin menghapus berita ini?')) {
                    window.location.href = '../backend/hapus/proses-hapus-berita.php?idBerita=' + idBerita;
                } else {
                    console.log('Hapus dibatalkan');
                }
            }
        </script>

        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <!-- End custom js for this page -->