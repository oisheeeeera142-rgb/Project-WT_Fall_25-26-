<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/CountUp.js/2.8.0/countUp.umd.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    // DataTable
    if ($('#doctorTable').length) {
        $('#doctorTable').DataTable();
    }

    // CountUp
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

<!-- FOOTER START -->
<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <h4>Smart Hospital</h4>
                <p>Modern Hospital Management System</p>
            </div>

            <div class="col-md-4">
                <h4>Quick Links</h4>
                <ul class="list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?page=doctors">Doctors</a></li>
                    <li><a href="index.php?page=login">Login</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h4>Contact</h4>
                <p>📞 +8801711111111</p>
                <p>✉ info@smarthospital.com</p>
                <p>📍 Dhaka, Bangladesh</p>
            </div>

        </div>

        <hr>

        <div class="text-center">
            © 2026 Smart Hospital
        </div>
    </div>
</footer>

</body>
</html>