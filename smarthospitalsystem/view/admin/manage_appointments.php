<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">Manage Appointments</h2>
            <p class="text-muted">All Appointment Records</p>
        </div>

    </div>

    <div class="dashboard-card">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if(!empty($appointments)): ?>

                        <?php foreach($appointments as $appointment): ?>

                            <tr>

                                <td><?= $appointment['id']; ?></td>

                                <td><?= $appointment['patient_name']; ?></td>

                                <td><?= $appointment['doctor_name']; ?></td>

                                <td><?= $appointment['appointment_date']; ?></td>

                                <td><?= $appointment['appointment_time']; ?></td>

                                <td>

                                    <?php

                                    $status = $appointment['status'];

                                    if($status == 'approved')
                                    {
                                        echo '<span class="badge bg-success">Approved</span>';
                                    }
                                    elseif($status == 'pending')
                                    {
                                        echo '<span class="badge bg-warning text-dark">Pending</span>';
                                    }
                                    elseif($status == 'rejected')
                                    {
                                        echo '<span class="badge bg-danger">Rejected</span>';
                                    }
                                    elseif($status == 'completed')
                                    {
                                        echo '<span class="badge bg-primary">Completed</span>';
                                    }
                                    else
                                    {
                                        echo '<span class="badge bg-secondary">Unknown</span>';
                                    }

                                    ?>

                                </td>

                                <td>

                                    <a href="index.php?page=approve-appointment-admin&id=<?= $appointment['id']; ?>"
                                       class="btn btn-success btn-sm">
                                        Approve
                                    </a>

                                    <a href="index.php?page=delete-appointment&id=<?= $appointment['id']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Delete Appointment?')">
                                        Delete
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="7" class="text-center text-danger">
                                No Appointments Found
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>