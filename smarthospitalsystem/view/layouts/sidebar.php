<button id="toggleSidebar" class="btn btn-light sidebar-toggle">
    ☰
</button>

<div class="sidebar" id="sidebar">

    <div class="sidebar-logo">
        <h3>Smart Hospital</h3>
    </div>

    <ul>

        <?php if ($_SESSION['role'] == 'admin'): ?>

            <li>
                <a href="index.php?page=admin-dashboard">
                    <i class="fas fa-chart-line"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="index.php?page=manage-doctors">
                    <i class="fas fa-user-doctor"></i>
                    Doctors
                </a>
            </li>

            <li>
                <a href="index.php?page=manage-patients">
                    <i class="fas fa-users"></i>
                    Patients
                </a>
            </li>

            <li>
                <a href="index.php?page=manage-appointments">
                    <i class="fas fa-calendar-check"></i>
                    Appointments
                </a>
            </li>

        <?php endif; ?>

        <?php if ($_SESSION['role'] == 'doctor'): ?>

            <li>
                <a href="index.php?page=doctor-dashboard">
                    <i class="fas fa-chart-pie"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="index.php?page=doctor-appointments">
                    <i class="fas fa-calendar"></i>
                    Appointments
                </a>
            </li>

            <li>
                <a href="index.php?page=manage-schedule">
                    <i class="fas fa-clock"></i>
                    Schedule
                </a>
            </li>

        <?php endif; ?>

        <?php if ($_SESSION['role'] == 'patient'): ?>

            <li>
                <a href="index.php?page=patient-dashboard">
                    <i class="fas fa-chart-bar"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="index.php?page=book-appointment">
                    <i class="fas fa-calendar-plus"></i>
                    Book Appointment
                </a>
            </li>

            <li>
                <a href="index.php?page=appointment-history">
                    <i class="fas fa-history"></i>
                    Appointment History
                </a>
            </li>

        <?php endif; ?>

        <li>
            <a href="index.php?page=logout">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </li>

    </ul>

</div>

<style>
.sidebar-toggle{
    position: fixed;
    top: 15px;
    left: 15px;
    z-index: 9999;
}

.sidebar{
    width: 250px;
    transition: all 0.3s ease;
}

.sidebar.collapsed{
    margin-left: -250px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){

    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    toggleBtn.addEventListener('click', function(){
        sidebar.classList.toggle('collapsed');
    });

});
</script>