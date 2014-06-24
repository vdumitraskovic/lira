<?php
$pageTitle = "Laboratorija za ispitivanje radioaktivnosti - Lira";
$section = "anketa";

$nalog = "lira";
$lozinka = "lira";
$lab = "ispitivanje";

include 'inc/db.php';
$sql = "SELECT * FROM `anketa` where `lab` = '" . $lab . "';";
?>

<?php include 'inc/head.php'; ?>
<div class="container">
 <div id="top-head" class="four columns alpha">
    <?php include 'inc/navigation.php' ?>
</div>
<div id="main" class="twelve columns omega">
    <header>
        <h1 class="title">Anketa</h1>
    </header>
    <?php
    $result = $db->query($sql) or die("Query error");
                // see if any rows were returned 
    if ($result->rowCount() > 0) { 
    // yes 
    // print them one after another 
        echo "<div style='width:100%;overflow-x:auto'><table style='width:100%;font-size:80%' cellpadding=10 border=1>"; 
        echo "<thead><tr><th>Ime i prezime</th>".
             "<th>Telefon</th>".
             "<th>Email</th>".
             "<th>Usluge</th>".
             "<th>Osoblje</th>".
             "<th>Brzina</th>".
             "<th>Izvestaj</th>".
             "<th>Dalje</th>".
             "<th>Promene</th>".
             "<th>Unaprediti</th>".
             "</tr></thead>";
        while($row = $result->fetch()) { 
            echo "<tr>"; 
            echo "<td>".$row['ime i prezime']."</td>"; 
            echo "<td>".$row['telefon']."</td>"; 
            echo "<td>".$row['email']."</td>"; 
            echo "<td>".$row['usluge']."</td>";
            echo "<td>".$row['osoblje']."</td>"; 
            echo "<td>".$row['brzina']."</td>";
            echo "<td>".$row['izvestaj']."</td>";
            echo "<td>".$row['dalje']."</td>";
            echo "<td>".$row['promene']."</td>";
            echo "<td>".$row['unaprediti']."</td>";
            echo "</tr>"; 
        } 
        echo "</table></div>"; 
    } 
    else { 
    // no 
    // print status message 
        echo "No rows found!"; 
    } 
    ?>
</div>                        
<?php include("inc/footer.php"); ?>

</div>
<?php include 'inc/foot.php'?>