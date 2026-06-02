<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">
                Manage Schedule
            </h2>

            <p class="text-muted">
                Add Available Appointment Slots
            </p>
        </div>

    </div>

    <!-- Add Schedule Form -->

    <div class="dashboard-card mb-4">

        <form method="POST">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label>Date</label>

                    <input type="date"
                           name="available_date"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label>Start Time</label>

                    <input type="time"
                           name="start_time"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label>End Time</label>

                    <input type="time"
                           name="end_time"
                           class="form-control"
                           required>

                </div>

            </div>

            <button type="submit"
                    class="btn btn-primary">

                <i class="fas fa-save"></i>
                Save Schedule

            </button>

        </form>

    </div>

    <!-- Schedule Table -->

    <div class="dashboard-card">

        <h4 class="mb-4">
            My Schedules
        </h4>

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    <?php if(!empty($schedules)): ?>

                        <?php foreach($schedules as $schedule): ?>

                            <tr>

                                <td>
                                    <?= $schedule['id']; ?>
                                </td>

                                <td>
                                    <?= $schedule['available_date']; ?>
                                </td>

                                <td>
                                    <?= $schedule['start_time']; ?>
                                </td>

                                <td>
                                    <?= $schedule['end_time']; ?>
                                </td>

                                <td>

                                    <?php if($schedule['status'] == 'available'): ?>

                                        <span class="badge bg-success">
                                            Available
                                        </span>

                                    <?php else: ?>

                                        <span class="badge bg-danger">
                                            Booked
                                        </span>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="5"
                                class="text-center text-danger">

                                No Schedule Added

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>