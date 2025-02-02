<?php
include_once "../templates/header3.php";
include_once "includes/db.connection.php";
include_once 'includes/php-codes.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="schedule.php">Upload Schedule</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Schedules</h5>

                                <!-- Table with hoverable rows -->
                                <?php
                                // Database connection
                                $con = new mysqli('localhost', 'root', '', 'miit-portal');

                                if ($con->connect_error) {
                                    die("Connection failed: " . $con->connect_error);
                                }

                                // Modify this query to fetch all schedules
                                $query = "SELECT * FROM schedules";
                                $query_run = mysqli_query($con, $query);
                                ?>

                                <table class="table table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="py-1 px-2 align-middle sorting_asc" style="font-weight: bold;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="ID: activate to sort column descending" style="width:48.0875px;" aria-sort="ascending">No.</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Instructor</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;

                                        if ($query_run && mysqli_num_rows($query_run) > 0) {
                                            while ($schedule = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?= htmlspecialchars($schedule['code']); ?></td>
                                                    <td><?= htmlspecialchars($schedule['subject']); ?></td>
                                                    <td><?= htmlspecialchars($schedule['instructor']); ?></td>
                                                    <td><?= htmlspecialchars($schedule['date']); ?></td>
                                                    <td><?= htmlspecialchars($schedule['time']); ?></td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'><h5>No Record Found</h5></td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <script src="path/to/bootstrap.js"></script>
                                <?php
                                // Close the database connection
                                $con->close();
                                ?>

                                <!-- End Table with hoverable rows -->
                            </div>
                        </div>
                    </div><!-- End Reports -->

                    <!-- Recent Grades -->
                    <div class="col-12">
                        <div class="card recent-grades overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Recent Grades <span>| Today</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">Assignment</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!-- Example row -->
                                            <td>1</td>
                                            <td>Math 101</td>
                                            <td>Homework 1</td>
                                            <td>A</td>
                                            <td>Graded</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Grades -->


                    <!-- Top Selling -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Top Selling <span>| Today</span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Preview</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Sold</th>
                                            <th scope="col">Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- Recent Activity -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                            <!--      <li><a class="dropdown-item" href="create-event.php"> + <span> Events</span></a></li> -->

                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Announcements <span>| Activity</span></h5>
                        <?php
                        // Database connection info
                        $DATABASE_HOST = 'localhost';
                        $DATABASE_USER = 'root';
                        $DATABASE_PASS = '';
                        $DATABASE_NAME = 'miit-portal';

                        // Create a connection
                        $conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Fetch events from database
                        $sql = "SELECT id, date, eventTitle, eventDescription FROM events";
                        $result = $conn->query($sql);

                        // Initialize $events array
                        $events = array();

                        // Check if query returned results
                        if ($result->num_rows > 0) {
                            // Fetch each row as an associative array
                            while ($row = $result->fetch_assoc()) {
                                $events[] = $row; // Append row to $events array
                            }
                        } else {
                            $events = array(); // No events found, initialize as empty array
                        }

                        // Close database connection
                        $conn->close();
                        ?>
                        <div class="activity">
                            <div id="eventDisplay" class="mt-4">
                                <?php if (!empty($events)) : ?>
                                    <?php foreach ($events as $event) : ?>
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-12">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= htmlspecialchars($event['eventTitle']) ?></h5>
                                                        <p class="card-text" style="width: 100%; box-sizing: border-box; padding: 0; margin: 0; text-align:justify;"><?= htmlspecialchars($event['eventDescription']) ?></p>
                                                        <!--  <form action="delete-event.php" method="post" style="display:inline; margin-top:20px">
                              <input type="hidden" name="id" value="<?= htmlspecialchars($event['id']) ?>">
                              <button type="submit" name="delete_event" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash-fill"></i>
                              </button>
                            </form>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="alert alert-warning" role="alert">
                                        No events available.
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div><!-- End Recent Activity -->




                <!-- News & Updates Traffic -->


            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->

<?php
include_once "../templates/footer.php";
?>