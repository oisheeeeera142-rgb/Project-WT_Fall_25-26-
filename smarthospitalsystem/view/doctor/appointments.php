<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <h2>Appointments</h2>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>ID</th>
                <th>Status</th>
                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($appointments as $appointment): ?>

                <tr>

                    <td><?= $appointment['id']; ?></td>

                    <td><?= $appointment['status']; ?></td>

                    <td>

            <a href="index.php?page=create-prescription&appointment_id=<?= $appointment['id']; ?>"
   class="btn btn-success btn-sm">

    Write Prescription

</a>
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php include 'view/layouts/footer.php'; ?>