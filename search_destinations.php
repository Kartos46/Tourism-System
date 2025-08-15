<?php
include 'check_auth.php';
require_once 'config.php';

$search_term = isset($_GET['search']) ? trim($_GET['search']) : '';

$sql = "SELECT * FROM destinations 
        WHERE name LIKE ? 
        OR description LIKE ? 
        OR location LIKE ? 
        ORDER BY created_at DESC";

$stmt = $conn->prepare($sql);
$search_param = "%$search_term%";
$stmt->bind_param("sss", $search_param, $search_param, $search_param);
$stmt->execute();
$result = $stmt->get_result();
?>

<?php include 'header.php'; ?>

<div class="container">
    <h2>Search Results</h2>
    
    <div class="search-box">
        <form method="GET" action="search_destinations.php">
            <input type="text" name="search" placeholder="Search destinations..." value="<?php echo htmlspecialchars($search_term); ?>">
            <button type="submit">Search</button>
        </form>
    </div>
    
    <?php if ($result->num_rows > 0): ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td>
                            <a href="edit_destination.php?id=<?php echo $row['id']; ?>">Edit</a> |
                            <a href="delete_destination.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No destinations found matching your search.</p>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>