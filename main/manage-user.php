<?php include_once 'header.php';
session_start();
if(isset($_GET['action']) && $_GET['action'] == 'add') { ?>
    <div class="container">
        <div class="box">
            <h2>Add User</h2>
            <form action="action" method="post">
                <input type="hidden" name="action_name" value="user">
                <input type="hidden" name="action_type" value="add">
                <div class="form_group">
                    <label for="name">User Name</label>
                    <input required type="text" name="name">
                </div>
                <div class="form_group">
                    <label for="email">User Email</label>
                    <input required type="email" name="email">
                </div>
                <div class="form_group">
                    <label for="mobile">User Mobile</label>
                    <input required type="number" name="mobile">
                </div>
                <div class="form_group">
                    <label for="maximum_hits">Maximum Hits</label>
                    <input required type="number" name="maximum_hits">
                </div>
                <div class="form_group">
                    <label for="status">User Status</label>
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