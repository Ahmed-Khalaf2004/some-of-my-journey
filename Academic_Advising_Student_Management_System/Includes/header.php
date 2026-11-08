     <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<header>
    <nav>
    <div class="logo">AdvisingSystem</div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
        <li>><a href="../Backend/logout.php" style="color: red;">Logout</a></li>
        <?php else: ?>
        <li><a href="login.php">Login</a></li>
        <?php endif; ?>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="departments.php">Departments</a></li>
        <li><a href="advisors.php">Advisors</a></li>
        <li><a href="Courses.php">Courses</a></li>
        <li><a href="students.php">Students</a></li>
        <li><a href="registration.php">registration</a></li>
        <li><a href="advising.php">Advising</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href="reports.php">Reports</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</nav>
</header>