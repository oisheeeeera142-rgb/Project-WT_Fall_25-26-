<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Manage Patients
            </h2>

            <p class="text-muted">
                All Registered Patients
            </p>

        </div>

    </div>

    <div class="dashboard-card">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Phone</th>

                        <th>Gender</th>

                        <th>Age</th>

                        <th>Address</th>

                        <th>Status</th>

                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    <?php if(!empty($patients)): ?>

                        <?php foreach($patients as $patient): ?>

                            <tr>

                                <td>
                                    <?= $patient['id']; ?>
                                </td>

                                <td>
                                    <?= $patient['full_name']; ?>
                                </td>

                                <td>
                                    <?= $patient['email']; ?>
                                </td>

                                <td>
                                    <?= $patient['phone']; ?>
                                </td>

                                <td>
                                    <?= $patient['gender']; ?>
                                </td>

                                <td>
                                    <?= $patient['age']; ?>
                                </td>

                                <td>
                                    <?= $patient['address']; ?>
                                </td>

                                <td>

                                    <?php if($patient['status'] == 'active'): ?>

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    <?php else: ?>

                                        <span class="badge bg-danger">
                                            Blocked
                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td>

                                    <a href="index.php?page=approve-patient&id=<?= $patient['user_id']; ?>"
                                       class="btn btn-success btn-sm">

                                        Approve

                                    </a>

                                    <a href="index.php?page=delete-patient&id=<?= $patient['user_id']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Delete this patient?')">

                                        Delete

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="9"
                                class="text-center text-danger">

                                No Patients Found

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>