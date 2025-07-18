<!-- Header and Database Connection -->
<?php
include("adminHeader.php");
include("config.php");
?>

<!-- Display Table -->
<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-10">
            <table class="table">
                <thead>
                    <tr>
                        <input type="text" oninput="searchText(this.value)" placeholder="Search Here..">
                    </tr>
                    <tr>
                        <!-- Displaying Get msg -->
                        <?php
                        if (isset($_GET['msg'])) {
                            echo "<tr><td colspan='8'><div class='alert alert-success' role='alert'>" . $_GET['msg'] . 
                            "</div></td></tr>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Price/Day</th>
                        <th scope="col">Image</th>
                        <th scope="col">Despription</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody id="data">

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- AJAX -->
<script>
    function searchText(inputText="") {
        let xhr = new XMLHttpRequest;
        xhr.open("GET", "searchCars.php?search=" + inputText, true);
        xhr.onload = function() {
            document.getElementById("data").innerHTML = xhr.responseText;
        }
        xhr.send();
    }
    searchText();
</script>

<!-- Footer -->
<?php
include("adminFooter.php");
?>