<div class="container">
    <div class="left-section">
        <div class="content">
            <img src="Assets/icon/acts.png" alt="ACTS Logo" class="logo">
            <h2>GRADUATE VERYFICATION</h2>
            <div class="social-icon">
                <img src="Assets/icon/correct.png" alt="Facebook">
            </div>
        </div>
    </div>
    <form id="verifyForm" action="validate/graduate.php" method="POST">

        <div class="right-section">
            <div class="header">
                <img src="Assets/icon/student.png" alt="ACTS Online" class="banner">
                <p>CONNECTED • EMPOWERED • ENGAGE</p>
            </div>
            <div class="login-area">
                <div class="form-group" style="flex: 1;">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="first_name" placeholder="Enter First Name" required>
                </div>

                <div class="form-group" style="flex: 1;">
                    <label for="middleName">Middle Name</label>
                    <input type="text" id="middleName" name="middle_name" placeholder="Enter Middle Name">
                </div>

                <div class="form-group" style="flex: 1;">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="last_name" placeholder="Enter Last Name" required>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="studentNumber">Student Number</label>
                    <input type="text" id="student_number" name="student_number"
                        value="<?= isset($_COOKIE['student_number']) ? htmlspecialchars($_COOKIE['student_number']) : ''; ?>"
                        required placeholder="Enter Student Number">
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="course">Course</label>
                    <select id="course" name="course" required style="width: 100%;" required>
                        <option value="" disabled selected>Select Course</option>
                        <option value="BSIT">Bachelor of Information Technology</option>
                        <option value="BSCS">Bachelor of Computer Science</option>
                        <option value="BSBA">Bachelor of Business Administration</option>
                        <option value="BSEnt">Bachelor of Science Entrepreneurship</option>
                        <option value="BSAcc">Bachelor of Science in Accounting</option>
                        <option value="BTVTE">Bachelor in Technical-Vocational Teacher Education</option>
                        <option value="BSSA">Bachelor of Science in Secretarial Administration</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label for="graduationYear">Year of Graduation</label>
                    <select id="graduationYear" name="graduation_year" required style="width: 100%;">
                        <!-- Graduation years will be added by JavaScript -->
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Verify</button>

            <?php include_once __DIR__ . '/../templates/veryfy.php'; ?>
        </div>
</div>