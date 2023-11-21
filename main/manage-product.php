<?php include_once 'header.php';
include_once '../configs/config.php';
session_start();

$action = mysqli_query($conn, "SELECT * FROM categories WHERE status = 1 ORDER BY name ASC");

$categories = array();

if ($action && mysqli_num_rows($action) > 0) {
    while ($row = mysqli_fetch_assoc($action)) {
        $categories[] = $row;
    }
}

?>

<?php
if(isset($_GET['action']) && $_GET['action'] == 'add') { ?>
<div class="container">
    <div class="box">
        <h2>Add Product</h2>
        <form action="action" method="post">
        <input type="hidden" name="action_name" value="product">
                <input type="hidden" name="action_type" value="add">
            <div class="form_group">
                <label for="name">Product Name</label>
                <input required type="text" name="name">
            </div>
            <div class="form_group">
                <label for="cost">Product Cost</label>
                <input required type="number" name="cost">
            </div>
            <div class="form_group">
                <label for="cost">Product Category</label>
                <select required name="category_id">
                <option hidden value="">Choose Category</option>
                    <?php if (!empty($categories)) { ?>
                    <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category['category_id'] ?>"><?= $category['name'] ?></option>
                    <?php } ?>
                    <?php } else { ?>
                    <option value="">No categories available</option>
                    <?php } ?>
                </select>
            </div>
            <div class="form_group">
                    <label for="status">Product Status</label>
                    <select required name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            <button class="btn">Add</button>
        </form>
    </div>
</div>
<?php }
else if(isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['product_id']) && $_GET['product_id']!="") { ?>
<div class="container">
    <div class="box">
        <h2>Edit Product</h2>
        <form action="">
            <div class="form_group">
                <label for="name">Product Name</label>
                <input type="text" name="name">
            </div>
            <div class="form_group">
                <label for="cost">Product Cost</label>
                <input type="number" name="cost">
            </div>
            <div class="form_group">
                <label for="category">Product Category</label>
                <select name="category">  
                    <?php if (!empty($categories)) { ?>
                    <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category['category_id'] ?>"><?= $category['name'] ?></option>
                    <?php } ?>
                    <?php } else { ?>
                    <option value="">No categories available</option>
                    <?php } ?>
                </select>
            </div>
            <div class="form_group">
                    <label for="status">Product Status</label>
                    <select required name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            <button class="btn">Update</button>
        </form>
    </div>
</div>

<?php }
?>

<?php include_once 'footer.php'; ?>