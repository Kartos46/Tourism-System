<?php
require_once 'config.php';

// Get search term from URL parameter
$search_term = isset($_GET['search']) ? trim($_GET['search']) : '';

// Prepare SQL query to search destinations
$sql = "SELECT * FROM destinations 
        WHERE name LIKE ? 
        OR description LIKE ? 
        OR location LIKE ?";

$stmt = $conn->prepare($sql);
$search_param = "%$search_term%";
$stmt->bind_param("sss", $search_param, $search_param, $search_param);
$stmt->execute();
$result = $stmt->get_result();

include 'header.php'; // Include your header
?>

<div class="container">
    <h2>Search Results for "<?php echo htmlspecialchars($search_term); ?>"</h2>
    
    <?php if ($result->num_rows > 0): ?>
        <div class="destination-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="destination-card">
                    <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['name']; ?>">
                    <h3><?php echo $row['name']; ?></h3>
                    <p><?php echo substr($row['description'], 0, 100); ?>...</p>
                    <a href="destination_details.php?id=<?php echo $row['id']; ?>" class="btn">View Details</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No destinations found matching your search.</p>
    <?php endif; ?>
</div>

<?php include 'footer.php'; // Include your footer ?>