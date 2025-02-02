<?php include_once "../templates/header.php" ?>;


<main id="main" class="main">

    <div class="pagetitle">
        <h1> Account Records</h1>
        <button type="button" class="ri-user-add-fill tablebutton" data-bs-toggle="modal" data-bs-target="#insertStudent">
        </button>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Accounts</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="modal fade" id="insertStudent" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="includes/register.inc.php" method="post" class="row g-3 needs-validation" novalidate style="padding: 20px;">

                        <div class="col-12">
                            <label for="yourName" class="form-label">Your Name</label>
                            <input type="text" name="fname" class="form-control" id="yourName" required>
                            <div class="invalid-feedback">Please, enter your name!</div>
                        </div>

                        <div class="col-12">
                            <label for="yourEmail" class="form-label">Your Email</label>
                            <input type="email" name="email" class="form-control" id="yourEmail" required>
                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                        </div>

                        <div class="col-12">
                            <label for="yourUsername" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                                <div class="invalid-feedback">Please choose a username.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>

                        <!-- Role selection field -->
                        <div class="col-12">
                            <label for="yourRole" class="form-label">Role</label>
                            <select name="role" class="form-control" id="yourRole" required>
                                <option value="admin">Admin</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                            </select>
                            <div class="invalid-feedback">Please select a role.</div>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                <div class="invalid-feedback">You must agree before submitting.</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit" name="submit">Create Account</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="../admin/user-instructor.php">Instructor</a></li>
                                    <li><a class="dropdown-item" href="../admin/user-student.php">Student</a></li>
                                    <li><a class="dropdown-item" href="../admin/user.php">Admin</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Accounts <span>| Registered</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $database = new Connection();
                                        $db = $database->open();

                                        try {
                                            $sql = "SELECT * FROM tbl_users WHERE user_role = 'teacher'
                                ORDER BY user_id ASC";

                                            foreach ($db->query($sql) as $row) {
                                        ?>
                                                <tr>
                                                    <th scope="row"><a href="#"><?php echo $row["user_id"] ?></a></th>
                                                    <td><?php echo $row["user_fname"] ?>, <?php echo $row["user_lname"] ?></td>
                                                    <td><?php echo $row["user_email"] ?>
                                                    <td><?php echo $row["user_name"] ?></td>
                                                    <td><?php echo $row["user_role"] ?></td>
                                                    <td>
                                                        <button type="button" class="ri-edit-2-fill" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row["user_id"] ?>"></button>
                                                        <form method="POST" action="../admin/upload/delete-user.php" onsubmit="return confirm('Are you sure you want to delete this user?');" style="display:inline;">
                                                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row["user_id"]); ?>">
                                                            <button type="submit" class="ri-delete-bin-6-line"></button>
                                                        </form>
                                                    </td>
                                                    <?php include('modals/edit-employee.php'); ?>
                                                </tr>
                                        <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo "There is some problem in connection: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>


</main><!-- End #main -->

<?php
include_once "../templates/footer.php";
?>