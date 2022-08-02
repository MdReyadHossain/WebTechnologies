<h3>Enter data</h3>

<form action="sort.php" method="GET" onsubmit="bubblesort(this); return false;"> 
    <?php
        if(isset($_GET['data'])) {
            $size_of_data = $_GET['data'];
        }
        
        for($i = 0; $i < $size_of_data; $i++) {
            echo "<input type='number' name='data$i' style='width: 4em;'> ";
        }
    ?>
    <input type="submit">
    <!-- <select name='sort' onchange="this.form.submit()">
        <option selcted.disabled>Select sort by</option>
        <option value='ascending'>sort by ascending</option>
        <option value='descending'>sort by descending</option>
    </select> -->
</form>
<br>
<div id='sorted'>Change will here...</div>

<script>
    function bubblesort(sort) {
        const dataMethod = sort.method;
        const dataURL = sort.action;

        <?php
            for($i = 0; $i < $size_of_data; $i++) {
                echo "let data$i = sort.data$i.value;";
            }
        ?>
        let xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            document.getElementById('sorted').innerHTML = this.responseText;
        }

        xhttp.open("GET", dataURL + "?data0=" + data0);
        xhttp.send();
        // let xhttp = new XMLHttpRequest();
        // xhttp.onload = function(){
        //     document.getElementById("sorted").innerHTML = this.responseText;
        // }

        // xhttp.open("POST", "sort.php");    
        // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // xhttp.send("data0=" + data0);
        
    }
</script>


