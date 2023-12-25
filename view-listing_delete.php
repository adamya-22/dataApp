<?php
                $servername = "localhost";
                $user = "root";
                $password = "";
                $dbname = "dataapp";

                // Create connection
                $conn = mysqli_connect($servername, $user, $password, $dbname);
                // Check connection
                if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
                }
                else{
                    
                    header("view-product-listing.php");
                }
                // sql to delete a record
                $sql = "DELETE FROM `add-product` where `uniqueid`=".$_GET['uniqueid'];
                
                if (mysqli_query($conn, $sql)) {
                echo "Record deleted successfully";
                header("view-product-listing.php");
                } else {
                echo "Error deleting record: " . mysqli_error($conn);
                }

                mysqli_close($conn);
                exit;
            ?>