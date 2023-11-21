<?php include_once 'header.php';
session_start();
?>

<?php
if(isset($_GET['action']) && $_GET['action'] == 'add') { ?>
    <div class="container">
        <div class="box">
            <h2>Add Category</h2>
            <form action="action" method="post">
                <input type="hidden" name="action_name" value="category">
                <input type="hidden" name="action_type" value="add">
                <div class="form_group">
                    <label for="name">Category Name</label>
                    <input required type="text" name="name">
                </div>
                <div class="form_group">
                    <label for="status">Category Status</label>
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
else if(isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['category_id']) && $_GET['category_id']!="") { ?>
 <div class="container">
        <div class="box">
            <h2>Edit category</h2>
            <form action="">
            <div class="form_group">
                    <label for="name">Category Name</label>
                    <input required type="text" name="name">
                </div>
                <div class="form_group">
                    <label for="status">Category Status</label>
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