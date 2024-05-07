<?php

function get_all_brand()
{
    global $conn;
    $sql = "SELECT * FROM brands";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
    }
}

function get_all_toys($brand_id, $order)
{
    global $conn;
    $sql = "SELECT * FROM toys";
    if ($brand_id != 0) {
        $sql .= " WHERE brand_id = " . $brand_id;
    }
    if (!empty($order)) {
        $sql .= " ORDER BY " . $order;
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . $row['name'] . "</h2>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p>Price: $" . $row['price'] . "</p>";
            echo "</div>";
        }
    }
}
?>
