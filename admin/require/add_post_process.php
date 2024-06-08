<?php 
require_once('../../require/connection.php');

if (isset($_REQUEST['add_post'])) {
    $blog_id            = $_POST['blog_id'];
    $category_id        = $_POST['category_id'];
    $post_title         = $_POST['title'];
    $post_summary       = $_POST['summary'];
    $post_description   = $_POST['description'];
    $image_name         = $_FILES['image']['name'];
    $tmp_name           = $_FILES['image']['tmp_name'];
    $post_status        = 'Active';

    move_uploaded_file($tmp_name, "../../upload_images/" . $image_name);

    $stmt = $connection->prepare("INSERT INTO post (blog_id, post_title, post_summary, post_description, featured_image, post_status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $blog_id, $post_title, $post_summary, $post_description, $image_name, $post_status);

    if ($stmt->execute()) {
        $post_id = $connection->insert_id;
        $stmt = $connection->prepare("INSERT INTO post_category (post_id, category_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $post_id, $category_id);
        $stmt->execute();

        $message = "Data has been inserted successfully.";
        header("location:../add_post.php?message=$message");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
