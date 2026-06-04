<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<!-- CountUp -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/CountUp.js/2.8.0/countUp.umd.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Custom JS -->
<script src="public/js/app.js"></script>

<?php if(isset($_SESSION['success'])): ?>
<script>
Swal.fire({
    icon: 'success',
    title: <?= json_encode($_SESSION['success']); ?>,
    timer: 2000,
    showConfirmButton: false
});
</script>
<?php unset($_SESSION['success']); ?>
<?php endif; ?>

<script>
$(document).ready(function () {

    /* =====================
       DataTable Safe Init
    ====================== */
    if ($('#doctorTable').length) {
        $('#doctorTable').DataTable();
    }

    /* =====================
       CountUp Function
    ====================== */
    function animateCount(id) {
        const el = document.getElementById(id);

        if (el) {
            const value = parseInt(el.innerText || 0);

            new countUp.CountUp(id, value, {
                duration: 2
            }).start();
        }
    }

    animateCount('appointmentCount');
    animateCount('doctorCount');
    animateCount('prescriptionCount');

});
</script>

</body>
</html>