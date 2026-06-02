
<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <div class="dashboard-card">

        <h3 class="mb-4">
            Write Prescription
        </h3>

        <form method="POST">

            <input type="hidden"
                   name="appointment_id"
                   value="<?= $appointment['id']; ?>">

            <div class="mb-3">

                <label>Medicines</label>

                <textarea name="medicines"
                          class="form-control"
                          required></textarea>

            </div>

            <div class="mb-3">

                <label>Dosage</label>

                <textarea name="dosage"
                          class="form-control"
                          required></textarea>

            </div>

            <div class="mb-3">

                <label>Duration</label>

                <input type="text"
                       name="duration"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Tests</label>

                <textarea name="tests"
                          class="form-control"></textarea>

            </div>

            <div class="mb-3">

                <label>Notes</label>

                <textarea name="notes"
                          class="form-control"></textarea>

            </div>

            <button class="btn btn-primary">

                Save Prescription

            </button>

        </form>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>