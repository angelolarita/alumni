<!-- <div class="container">
    <div class="sidebar">
        <div class="profile-header">
            <img src="Assets/icon/acts.png" alt="Profile Picture">
            <div class="profile-info">
                <h2>Charls Joshua Danseco</h2>
                <p>LSPU SINILOAN</p>
                <p>dansecocharls@gmail.com</p>
                <p>09504136461</p>
                <p>Sitio Kinalumbakan, Capalong, Real, Quezon</p>
            </div>
        </div>
        <div class="admission-period">
            <h3>Admission Period</h3>
            <p><strong>Status:</strong> Open</p>
            <p><strong>A.Y.:</strong> 2025-2026 First (1st) Semester</p>
            <p><strong>Start Date:</strong> Feb 10, 2025</p>
            <p><strong>End Date:</strong> Mar 28, 2025</p>
        </div>
        <div class="exam-schedule">
            <h3>Exam Schedule</h3>
            <p>No schedule yet</p>
        </div>
    </div>
    <div class="content">
        <div class="print-logout">
            <button>Print Form</button>
            <button>Logout</button>
        </div>
 -->



<div class="step-container">
    <div class="step" data-step="1">
        <div class="step-indicator active">1</div>
        <div class="step-title">STUDENT INFORMATION</div>
        <div class="step-dropdown">v</div>
    </div>
    <form id="myForm" action="validate/info.php" method="POST">
        <div class="form-container" id="step1-form">
            <div class="form-group">
                <label for="student_number">Student No.</label>
                <input type="text" id="student_number" name="student_number" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <label for="address">Permanent Address:</label>
            <input type="text" id="address" name="address" required><br><br>

            <label for="mobile">Mobile No.:</label>
            <input type="text" id="mobile" name="mobile"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>


            <label for="civilstatus">Civil Status:</label>
            <select id="civilstatus" name="civilstatus" required>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
            </select><br><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br><br>

            <label for="region">Region:</label>
            <select id="region" name="region_id" required>
                <option value="">Select Region</option>
            </select><br><br>

            <label for="province">Province:</label>
            <select id="province" name="province_id" required disabled>
                <option value="">Select Province</option>
            </select><br><br>

            <label for="city">City:</label>
            <select id="city" name="city_id" required disabled>
                <option value="">Select City</option>
            </select><br><br>

            <label for="barangay">Barangay:</label>
            <select id="barangay" name="barangay_id" required disabled>
                <option value="">Select Barangay</option>
            </select><br><br>

            <div class="text-right mt-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            <?php include_once __DIR__ . '/../templates/infoModal.php'; ?>
    </form>

</div>
</div>

<div class="step-container">
    <div class="step" data-step="2">
        <div class="step-indicator active">2</div>
        <div class="step-title">EDUCATIONAL BACKGROUND</div>
        <div class="step-dropdown">v</div>
    </div>
    <div class="form-container" id="step2-form">
        <form id="educationform" action="validate/education.php" method="post">
            <div id="d1" class="input-group d-flex">
                <input class="form-control" type="text" style="font-family: Roboto, sans-serif;" name="degree"
                    placeholder="Degree & Specialization" id="deg1">
                <input class="form-control" type="text" style="font-family: Roboto, sans-serif;" name="college"
                    placeholder="College / University" id="col1">
                <input class="form-control" type="text" style="font-family: Roboto, sans-serif;" name="year"
                    placeholder="Year Graduated" id="year1">
                <input class="form-control" type="text" style="font-family: Roboto, sans-serif;" name="honors"
                    placeholder="Honors / Awards Received" id="hon1">
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-primary" onclick="addFields()">Add More Fields</button>
                <button type="button" class="btn btn-danger" onclick="removeFields()">Remove Field</button>
            </div>

            <p class="text-center font-weight-bold mt-4">13. Professional Examination(s) Passed</p>
            <div id="d2" class="input-group d-flex">
                <input class="form-control" type="text" style="font-family: Roboto, sans-serif;" name="exam_name"
                    placeholder="Name Of Examination" id="name1">
                <input class="form-control" type="text" style="font-family: Roboto, sans-serif;" name="exam_date"
                    placeholder="YYY-MMM-DDD" id="date1">
                <input class="form-control" type="text" style="font-family: Roboto, sans-serif;" name="exam_rating"
                    placeholder="Rating" id="rating1">
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-primary" onclick="addFields2()">Add More Fields</button>
                <button type="button" class="btn btn-danger" onclick="removeFields2()">Remove Field</button>
            </div>

            <div class="text-right mt-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
        <?php include_once __DIR__ . '/../templates/educationModal.php'; ?>
    </div>
</div>
<div class="step" data-step="3">
    <div class="step-indicator completed">3</div>
    <div class="step-title">TRAINING(S)/ADVANCE STUDIES ATTENDED AFTER COLLEGE</div>
    <div class="step-dropdown">v</div>
</div>
<div class="form-container" id="step3-form">
    <form id="trainingform" action="validate/training.php" method="POST">
        <div id="trainingFields" class="input-group d-flex">
            <input class="form-control" type="text" name="training_title"
                placeholder="Title of Training or Advanced Study">
            <input class="form-control" type="text" name="duration" placeholder="Duration and Credits Earned">
            <input class="form-control" type="text" name="institution" placeholder="Name of Training Institution">
        </div>
        <div class="mt-2">
            <button type="button" class="btn btn-primary" onclick="addFields('trainingFields')">Add More
                Fields</button>
            <button type="button" class="btn btn-danger" onclick="removeFields('trainingFields')">Remove
                Field</button>
            <div class="text-right mt-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
    <?php include_once __DIR__ . '/../templates/trainingmodal.php'; ?>
</div>
</div>
<div class="step" data-step="4">
    <div class="step-indicator completed">4</div>
    <div class="step-title">EMPLOYMENT DATA</div>
    <div class="step-dropdown">v</div>
</div>
<div class="form-container" id="step4-form">
    <form id="employmentform" action="/validate/employment.php" method="post">
        <div class="mb-3">
            <label class="form-label">16. Are you presently employed?</label>
            <select class="form-control" name="employed">
                <option value="" disabled selected>Select one</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
                <option value="never_employed">Never Employed</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">If NO or NEVER BEEN EMPLOYED, proceed to Question 17. If YES, proceed to
                Questions 18 to 22.</label>
        </div>
        <div class="mb-3">
            <label class="form-label">17. Please state reason(s) why you are not yet employed.</label>
            <select class="form-control" name="reason_not_employed">
                <option value="" disabled selected>Select one</option>
                <option value="advance_study">Advance or further study</option>
                <option value="family_concern">Family concern, decided not to find a job</option>
                <option value="health_issue">Health-related reasons</option>
                <option value="lack_experience">Lack of work experience</option>
                <option value="no_job_opportunity">No job opportunity</option>
                <option value="did_not_look_for_job">Did not look for a job</option>
                <option value="other_reasons">Other (Specify)</option>
            </select>
            <input type="text" class="form-control mt-2" name="other_reason_specify" placeholder="Specify if other"
                style="display: none;">
        </div>


        <div class="mb-3">
            <label class="form-label">18. Present Employment Status</label>
            <select class="form-control" name="employment_status">
                <option value="" disabled selected>Select your employment status</option>
                <option value="regular">Regular or Permanent</option>
                <option value="contractual">Contractual</option>
                <option value="temporary">Temporary</option>
                <option value="self_employed">Self-employed</option>
                <option value="casual">Casual</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">20a. Name of Company or Organization including address:</label>
            <input type="text" class="form-control" name="company_name">
        </div>
        <div class="mb-3">
            <label class="form-label">20b. Major line of business of the company you are presently employed
                in</label>
            <select class="form-control" name="business_type">
                <option value="" disabled selected>Select one</option>
                <option value="agriculture">Agriculture, Hunting, and Forestry</option>
                <option value="fishing">Fishing</option>
                <option value="mining">Mining and Quarrying</option>
                <option value="manufacturing">Manufacturing</option>
                <option value="education">Education</option>
                <option value="health">Health and Social Work</option>
                <option value="other">Other (Specify)</option>
            </select>
            <input type="text" class="form-control mt-2" name="other_business_type" placeholder="Specify if other"
                style="display: none;">
        </div>

        <div class="mb-3">
            <label class="form-label">21. Place of Work:</label>
            <select class="form-control" name="work_place">
                <option value="" disabled selected>Select one</option>
                <option value="local">Local</option>
                <option value="abroad">Abroad</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">22. Is this your first job after college?</label>
            <select class="form-control" name="first_job">
                <option value="" disabled selected>Select one</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">24. After you graduated, did you look for a job right away or did you take a
                break?</label>
            <select class="form-control" name="job_search">
                <option value="" disabled selected>Select one</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <p>If Yes, proceed to Question 26.</p>
        <div class="mb-3">
            <label class="form-label">25. How long was your break?</label>
            <select class="form-control" name="break_duration">
                <option value="" disabled selected>Select one</option>
                <option value="1_month">One Month</option>
                <option value="2_months">Two Months</option>
                <option value="3_months">Three Months</option>
                <option value="4_months">Four Months</option>
                <option value="5_months">Five Months</option>
                <option value="6_months">Six Months</option>
                <option value="7_months">Seven Months</option>
                <option value="one_year">One Year</option>
                <option value="other">Other (Specify)</option>
            </select>
            <input type="text" class="form-control mt-2" name="other_break_duration" placeholder="Specify if other"
                style="display: none;">
        </div>

        <p>26. Is your first job related to the course you took up in college?</p>
        <select name="first_job_related">
            <option value="" disabled selected>Select an option</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        <p>If No, proceed to Question 28.</p>
        <div class="mb-3">
            <label class="form-label">27. What was your main reason for accepting the job?</label>
            <select class="form-control" name="reason_for_accepting">
                <option value="" disabled selected>Select one</option>
                <option value="salaries">Salaries and benefits</option>
                <option value="career_challenge">Career challenge</option>
                <option value="related_to_skills">Related to special skills</option>
                <option value="proximity_to_residence">Proximity to residence</option>
                <option value="other">Other (Specify)</option>
            </select>
            <input type="text" class="form-control mt-2" name="other_accepting_reason" placeholder="Specify if other"
                style="display: none;">
        </div>

        Question 28
        <div class="mb-3">
            <label class="form-label">28. What was your main reason if your first job was not related to the course
                you took up in college?</label>
            <select class="form-control" name="reason_for_changing">
                <option value="" disabled selected>Select one</option>
                <option value="salaries">Salaries and benefits</option>
                <option value="career_challenge">Career challenge</option>
                <option value="related_to_skills">Related to special skills</option>
                <option value="proximity_to_residence">Proximity to residence</option>
                <option value="other">Other (Specify)</option>
            </select>
            <input type="text" class="form-control mt-2" name="other_changing_reason" placeholder="Specify if other"
                style="display: none;">
        </div>


        <p>29. In your first job, have you been promoted?</p>
        <select class="form-control" name="first_job_promoted">
            <option value="" disabled selected>Select one</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>

        <p>If No, proceed to Question 31.</p>


        <p>30. How many months and years before you got promoted?</p>
        <select class="form-control" name="time_before_promotion">
            <option value="" disabled selected>Select one</option>
            <option value="5_months">Five Months</option>
            <option value="7_months">Seven Months</option>
            <option value="8_months">Eight Months</option>
            <option value="9_months">Nine Months</option>
            <option value="10_months">Ten Months</option>
            <option value="1_year">One Year</option>
            <option value="2_years">Two Years</option>
            <option value="4_years">Four Years</option>
            <option value="other">Others (Specify)</option>
        </select>


        <input type="text" class="form-control mt-2" name="other_promotion_time" placeholder="Specify if other"
            style="display: none;">
        <p>31. How long did you stay in your first job?</p>
        <select class="form-control" name="first_job_duration">
            <option value="" disabled selected>Select one</option>
            <option value="less_than_month">Less than a month</option>
            <option value="1_to_6_months">1 to 6 months</option>
            <option value="7_to_11_months">7 to 11 months</option>
            <option value="1_to_2_years">1 year to less than 2 years</option>
            <option value="2_to_3_years">2 years to less than 3 years</option>
            <option value="3_to_4_years">3 years to less than 4 years</option>
            <option value="other">Others (Specify)</option>
        </select>
        <input type="text" class="form-control mt-2" name="other_first_job_duration" placeholder="Specify if other"
            style="display: none;">


        <p>32. How did you find your first job?</p>
        <select class="form-control" name="job_finding_method">
            <option value="" disabled selected>Select one</option>
            <option value="advertisement">Response to an advertisement</option>
            <option value="walk_in">As walk-in applicant</option>
            <option value="recommended">Recommended by someone</option>
            <option value="friends">Information from friends</option>
            <option value="job_placement">Arranged by school’s job placement officer</option>
            <option value="family_business">Family business</option>
            <option value="job_fair">Job Fair or Public Employment Service Office (PESO)</option>
            <option value="others">Others (Specify)</option>
        </select>
        <input type="text" class="form-control mt-2" name="other_job_finding_method" placeholder="Specify if other"
            style="display: none;">

        <p>33. How long did it take you to land your first job?</p>
        <select class="form-control" name="time_to_land_first_job">
            <option value="" disabled selected>Select one</option>
            <option value="less_than_month">Less than a month</option>
            <option value="1_to_6_months">1 to 6 months</option>
            <option value="7_to_11_months">7 to 11 months</option>
            <option value="1_to_2_years">1 year to less than 2 years</option>
            <option value="2_to_3_years">2 years to less than 3 years</option>
            <option value="3_to_4_years">3 years to less than 4 years</option>
            <option value="other">Others (Specify)</option>
        </select>
        <input type="text" class="form-control mt-2" name="other_time_to_land_first_job" placeholder="Specify if other"
            style="display: none;">


        <p>34. Job Level Position</p>
        <label>First Job</label>
        <select class="form-control" name="first_job_level">
            <option value="" disabled selected>Select one</option>
            <option value="rank_or_clerical">Rank or Clerical</option>
            <option value="professional_technical">Professional, Technical or Supervisory</option>
            <option value="managerial">Managerial or Executive</option>
            <option value="self_employed">Self-employed</option>
        </select>

        <label>Current or Present Job</label>
        <select class="form-control" name="current_job_level">
            <option value="" disabled selected>Select one</option>
            <option value="rank_or_clerical">Rank or Clerical</option>
            <option value="professional_technical">Professional, Technical or Supervisory</option>
            <option value="managerial">Managerial or Executive</option>
            <option value="self_employed">Self-employed</option>
        </select>


        <p>36. Was the curriculum you had in college relevant to your first job?</p>
        <select class="form-control" name="curriculum_relevance">
            <option value="" disabled selected>Select one</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>

        <p>37. If YES, what competencies learned in college did you find very useful in your first job?</p>
        <select class="form-control" name="competencies_used_in_first_job">
            <option value="" disabled selected>Select one</option>
            <option value="communication_skills">Communication skills</option>
            <option value="human_relations_skills">Human Relations skills</option>
            <option value="entrepreneurial_skills">Entrepreneurial skills</option>
            <option value="problem_solving_skills">Problem-solving skills</option>
            <option value="critical_thinking_skills">Critical Thinking skills</option>
            <option value="other_skills">Other (Specify)</option>
        </select>
        <input type="text" class="form-control mt-2" name="other_skills_specify" placeholder="Specify if other"
            style="display: none;">

        <div class="mb-3">
            <label class="form-label">38. Suggestions to improve your course curriculum:</label>
            <textarea name="suggestions_for_curriculum" class="form-control" rows="4"></textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="agree" name="agree" required>
            <label class="form-check-label" for="agree">
                By submitting this form, you confirm that the information provided is accurate and complete. Your
                data
                will be
                kept confidential and used only for alumni tracking, research, and program development.
                Participation is
                voluntary,
                and you may request data modification or removal. By proceeding, you agree to be contacted for
                verification or
                alumni-related updates.
            </label>
        </div>

        <button type="submit" class="btn btn-success w-100">Submit</button>
    </form>
    <?php include_once __DIR__ . '/../templates/employmentModal.php'; ?>
</div>


<script>
document.querySelectorAll('.step').forEach(step => {
    step.addEventListener('click', function() {
        const stepNumber = this.getAttribute('data-step');
        const formContainer = document.getElementById(`step${stepNumber}-form`);
        formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
        this.classList.toggle('active');
    });
});
</script>
</div>
</div>