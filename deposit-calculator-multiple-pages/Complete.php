<?php
    session_start();
    if(isset( $_SESSION["CustomerInfo"]))
    {
       $info = $_SESSION["CustomerInfo"];
       $name = $info["name"];
       $emailAddress = $info["emailAddress"];
    }
    include 'inc/Header.php';
    include 'inc/Functions.php';
?>
<div class="container">  
    <?php if(isset($_SESSION["CustomerInfo"])): ?>
        <h2>Thank you, <?php echo $name; ?>, for using our deposit calculation tool.</h2>
        <p>An email about the details of our GIC has been sent to <?php echo $emailAddress; ?>.</p>
    <?php else: ?>
        <h2>Thank you for using our deposit calculator tool.</h2>
    <?php endif; ?>
</div>
<?php
    session_destroy();    
    include 'inc/Footer.php';

