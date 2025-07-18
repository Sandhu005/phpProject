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
                            <td colspan=8><input type="text" oninput="search(this.value)" id="search"></td>
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

<script>
    function search(){
        let searchInput = document.getElementById("search").value;
        let xhr = new XMLHttpRequest();
            xhr.open("GET", "searchCars.php?search="+searchInput, true);
        xhr.onload = function(){
            document.getElementById("search").innerHTML = xhr.this;
        }
        xhr.send();
    }
    search();
</script>
<!-- Footer -->
<?php
include("adminFooter.php");
?>