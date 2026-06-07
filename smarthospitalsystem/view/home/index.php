<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/navbar.php'; ?>


<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-md-6">
                <h1 class="hero-title">
                    Modern Smart Hospital Management System
                </h1>

                <p class="hero-text">
                    Professional healthcare platform with appointments, prescriptions and digital management system.
                </p>

                <a href="index.php?page=register" class="btn btn-primary btn-lg px-4">
                    Get Started
                </a>
            </div>

            <div class="col-md-6 text-center">
                <img src="public/images/hero.png" class="img-fluid" style="max-width:90%;">
            </div>

        </div>
    </div>
</section>

<!-- STATISTICS -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-3 mb-3">
                <h2 class="fw-bold text-primary">50+</h2>
                <p>Doctors</p>
            </div>

            <div class="col-md-3 mb-3">
                <h2 class="fw-bold text-primary">500+</h2>
                <p>Patients</p>
            </div>

            <div class="col-md-3 mb-3">
                <h2 class="fw-bold text-primary">1000+</h2>
                <p>Appointments</p>
            </div>

            <div class="col-md-3 mb-3">
                <h2 class="fw-bold text-primary">24/7</h2>
                <p>Emergency Support</p>
            </div>

        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Services</h2>
            <p class="text-muted">High quality healthcare services</p>
        </div>

        <div class="row">

            <div class="col-md-4 mb-4">
                <div class="glass-card">
                    <i class="fas fa-heartbeat service-icon"></i>
                    <h5>Cardiology</h5>
                    <p>Professional heart treatment.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="glass-card">
                    <i class="fas fa-brain service-icon"></i>
                    <h5>Neurology</h5>
                    <p>Advanced neurological support.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="glass-card">
                    <i class="fas fa-hospital service-icon"></i>
                    <h5>Emergency</h5>
                    <p>24/7 emergency support.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- WHY CHOOSE -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-3">Why Choose Us</h2>
        <p class="text-muted">
            Trusted doctors, fast service, digital system and 24/7 emergency care.
        </p>
    </div>
</section>

<!-- DOCTORS -->
<section class="py-5">
    <div class="container">

        <div class="text-center mb-4">
            <h2 class="fw-bold">Available Doctors</h2>
        </div>

        <div class="row g-4">

            <?php if (!empty($doctors ?? [])): ?>
                <?php foreach ($doctors as $doctor): ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="doctor-card text-center">

                            <div class="doctor-avatar">
                                <i class="fas fa-user-doctor"></i>
                            </div>

                            <h5>
                                <?= htmlspecialchars($doctor['full_name']); ?>
                            </h5>

                            <p class="text-muted">
                                <?= htmlspecialchars($doctor['specialization']); ?>
                                <span class="availability-badge">Available</span>
                            </p>

                            <p class="mb-1"><strong>Degree:</strong> <?= $doctor['degree'] ?? 'N/A'; ?></p>
                            <p class="mb-1"><strong>Experience:</strong> <?= $doctor['experience'] ?? 'N/A'; ?></p>

                            <a href="index.php?page=book-appointment&doctor_id=<?= $doctor['id']; ?>"
                               class="btn btn-primary btn-sm mt-3">
                                Book Appointment
                            </a>

                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-muted">No Doctors Available</p>
            <?php endif; ?>

        </div>
    </div>
</section>

<!-- EMERGENCY -->
<section class="py-5 text-white text-center" style="background: linear-gradient(135deg,#dc3545,#ff6b6b);">
    <div class="container">
        <h2 class="fw-bold">Emergency Contact</h2>
        <p>Call 999 for immediate support</p>
    </div>
</section>

<!-- CONTACT -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold">Contact Information</h2>
        <p>Email: support@hospital.com</p>
        <p>Phone: +880-XXXXXXXXX</p>
    </div>
</section>

<?php include 'view/layouts/footer.php'; ?>