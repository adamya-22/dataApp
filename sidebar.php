<style>
    .sidebar{
        position: relative;
        left: 0;
        /* height:100vh; */
        width:20vw;
        background-color: #e3e2dfa3;
    }
    .sidebar_menu{
        display: inline-block;
        padding: 20px 0px;
        display: block;
        text-align: center;
    }
    .sidebar_menu a{
        color: darkblue;
    }
    .logout {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
    .logout div button {
        color: aliceblue;
        background-color: darkred;
        font-weight: bold;
        padding: 10px 20px;
        border: 0;
    }

</style>
<div class="sidebar">
    <div class="sidebar_menu"><a href="add-product.php">Add Products</a></div><hr>
    <div class="sidebar_menu"><a href="view-product-listing.php">View Listing</a></div><hr>
    <div class="sidebar_menu"><a href="add-collection.php">Add Collection</a></div><hr>
    <div class="sidebar_menu"><a href="view_collection-list.php">Collection Listing</a></div><hr>
    <div class="sidebar_menu"><a href="view-orders.php">Orders Received</a></div><hr>
    <!-- Inside the HTML body of admin_panel.php -->
    <div class="sidebar_menu"><a href="download_csv.php" class="btn btn-primary">Download Product CSV</a></div>
    <form method="post"  class="logout">
            <div><button type="submit" name="logout">Logout</button></div>
    </form>
    

</div>