<?php
include 'php/connect.php';

$sql = "SELECT s.student_id, s.firstname, s.lastname, c.club_name, e.enrollment_date 
        FROM enrollments e
        JOIN students s ON e.student_id = s.student_id
        JOIN clubs c ON e.club_id = c.club_id
        ORDER BY s.student_id, e.enrollment_date";

$result = $conn->query($sql);

echo "<div class='container'><h2>📊 Student Club Enrollments</h2>";
echo "<table><tr><th>Student ID</th><th>Name</th><th>Club</th><th>Date</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['student_id']}</td>
            <td>{$row['firstname']} {$row['lastname']}</td>
            <td>{$row['club_name']}</td>
            <td>{$row['enrollment_date']}</td>
          </tr>";
}

echo "</table></div>";
$conn->close();
?>
