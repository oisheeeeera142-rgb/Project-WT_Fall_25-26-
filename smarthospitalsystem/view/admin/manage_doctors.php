<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Manage Doctors
            </h2>

            <p class="text-muted">
                Approve or Reject Doctors
            </p>

        </div>

    </div>

    <div class="dashboard-card">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Doctor Name</th>

                        <th>Email</th>

                        <th>Phone</th>

                        <th>Specialization</th>

                        <th>Degree</th>

                        <th>Experience</th>

                        <th>Status</th>

                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    <?php if(!empty($doctors)): ?>

                        <?php foreach($doctors as $doctor): ?>

                            <tr>

                                <td>
                                    <?= $doctor['id']; ?>
                                </td>

                                <td>
                                    <?= $doctor['full_name']; ?>
                                </td>

                                <td>
                                    <?= $doctor['email']; ?>
                                </td>

                                <td>
                                    <?= $doctor['phone']; ?>
                                </td>

                                <td>
                                    <?= $doctor['specialization']; ?>
                                </td>

                                <td>
                                    <?= $doctor['degree']; ?>
                                </td>

                                <td>
                                    <?= $doctor['experience']; ?>
                                </td>

                                <td>

                                    <?php if($doctor['status'] == 'pending'): ?>

                                        <span class="badge bg-warning">
                                            Pending
                                        </span>

                                    <?php else: ?>

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td>

                                    <?php if($doctor['status'] == 'pending'): ?>

                                        <a href="index.php?page=approve-doctor&id=<?= $doctor['user_id']; ?>"
                                           class="btn btn-success btn-sm">

                                            Approve

                                        </a>

                                    <?php endif; ?>

                                    <a href="index.php?page=reject-doctor&id=<?= $doctor['user_id']; ?>"
                                       class="btn btn-danger btn-sm">

                                        Delete

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="9" class="text-center text-danger">

                                No Doctors Found

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>