 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>search</title>
</head>
<body>
    <?php 
    require_once '../Includes/header.php'; 
    require_once '../Includes/config.php';
    ?>
    <main class="container">
        <div class="page-header">
            <h1>Advanced Search</h1>
        </div>

        <form method="GET" action="search.php" class="search-form">
            <input type="text" name="query" placeholder="Search by email..." 
                value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
            <button type="submit" class="btn">Search Now</button>
        </form>

        <?php
        if (isset($_GET['query']) && $_GET['query'] != '') {
            require_once '../Includes/config.php';
            $q = $conn->real_escape_string($_GET['query']);
            
            // استعلام شامل
            $sql = "SELECT s.*, d.department_name 
                    FROM students s 
                    LEFT JOIN departments d ON s.department_id = d.department_id
                    WHERE s.first_name LIKE '%$q%' 
                    OR s.last_name LIKE '%$q%' 
                    OR s.email LIKE '%$q%' 
                    OR s.university_id LIKE '%$q%'";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='data-table'>
                        <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Dept</th></tr></thead>
                        <tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['university_id']}</td>
                            <td>{$row['first_name']} {$row['last_name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['department_name']}</td>
                        </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No results found for '$q'.</p>";
            }
        }
        ?>
    </main>

    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>