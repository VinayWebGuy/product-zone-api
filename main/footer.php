        <div class="error-popup">
            <div class="error-msg">

            </div>
        </div>
        <div class="success-popup">
            <div class="success-msg">

            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="../assets/app.js"></script>

    <?php
      if (isset($_SESSION['success_message'])) {
        echo '<script>showSuccess("' . $_SESSION['success_message'] . '")</script>';
        unset($_SESSION['success_message']);
    }
      if (isset($_SESSION['error_message'])) {
        echo '<script>showError("' . $_SESSION['error_message'] . '")</script>';
        unset($_SESSION['error_message']);
    }
    ?>
</body>

</html>