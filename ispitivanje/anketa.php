<?php
$pageTitle = "Laboratorija za ispitivanje radioaktivnosti - Lira";
$section = "anketa";

$nalog = "";
$anketa = "";
$lab = "ispitivanje";

if (isset($_POST['username'])){
    include 'inc/db.php';
    $sql = "SELECT count(*) FROM login WHERE username = '" . htmlspecialchars($_POST['username']) . "' AND password = '" . htmlspecialchars($_POST['password']) . "' LIMIT 1";
    $result = $db->query($sql);
      
    $rows = $result->fetch(PDO::FETCH_NUM);

   if ($rows[0] <= 0) { $nalog="los"; }
      elseif ((!isset($_POST['usluge'])) || (!isset($_POST['osoblje'])) || (!isset($_POST['brzina'])) || (!isset($_POST['izvestaj'])) || (!isset($_POST['dalje']))) { $anketa = "los"; } 
      else {
        $sql = "INSERT INTO `anketa` (`lab`,
                `login_id`,`ime i prezime`,
                `telefon`,`email`,
                `usluge`,`osoblje`,`brzina`,
                `izvestaj`,`dalje`,`promene`,`unaprediti`)
                VALUES (\"" . $lab . "\"," . $rows[0] .
                ",\"" . $_POST['name'] .  "\",\"" . 
                $_POST['phone'] .  "\",\"" . 
                $_POST['email'] .  "\",\"" . 
                $_POST['usluge'] .  "\",\"" . 
                $_POST['osoblje'] .  "\",\"" . 
                $_POST['brzina'] .  "\",\"" . 
                $_POST['izvestaj'] .  "\",\"" . 
                $_POST['dalje'] .  "\",\"" . 
                $_POST['promene'] .  "\",\"" . 
                $_POST['unaprediti'] .  "\");";
        
                $db->exec($sql);

                header( 'Location: anketa2.php' );
                exit ();       
        } 
    }
?>

<?php include 'inc/head.php'; ?>
        <div class="container">
			<div id="top-head" class="four columns alpha">
                <?php include 'inc/navigation.php' ?>
            </div>
            <div id="main" class="twelve columns omega">
				<header>
                    <h1 class="title">Anketa</h1>
                    <h2>Da li ste zadovoljni našim uslugama?</h2>
                </header>
                
                <footer class="intro fourteen offset-by-one columns">
                    U cilju uspešnije saradnje i poboljšanja usluga laboratorija za ispitivanje radioaktivnosti, molimo Vas da izdvojite par minuta i popunite anketu.<br>

                    Vaše sugestije, primedbe i pohvale doprineće poboljšanju naših usluga na obostrano zadovoljstvo.
                    <hr>
                </footer>
                
                <form method="post" action="anketa.php"> 
                    <div class="ten offset-by-three columns">
                    <fieldset class="sixteen columns left-1">
                    <legend>Korisnički nalog</legend>
                        <div id="nalog" class="<?php echo $nalog; ?>">Neispravna lozinka ili korisničko ime!</div> 
                        <label for="username">Korisničko ime:</label><input type="text" id="username" name="username" value="<?php if(isset($_POST['username'])){echo htmlspecialchars($_POST['username']);} ?>">
                        <label for="password">Lozinka:</label><input type="password" id="password" name="password" >
                    </fieldset>
                    </div>
                    
                    <div class="sixteen columns">
                    <fieldset class="seven offset-by-one columns left1">
                    <legend>Lični podaci</legend>
                        <label for="name">Ime i prezime:</label><input type="text" id="name" name="name" value="<?php if(isset($_POST['name'])){echo htmlspecialchars($_POST['name']);} ?>">
                        <label for="phone">Kontakt telefon:</label><input type="tel" id="phone" name="phone" value="<?php if(isset($_POST['phone'])){echo htmlspecialchars($_POST['phone']);} ?>">
                        <label for="email">Email:</label><input type="email" id="email" name="email" value="<?php if(isset($_POST['email'])){echo htmlspecialchars($_POST['email']);} ?>">
                    </fieldset>
                    <fieldset class="seven columns left2">
                    <legend>Anketa</legend>
                        <div id="anketa" class="<?php echo $anketa; ?>">Molimo popunite anketu!</div> 
                        <label for="usluge">Kako ocenjujete kvalitet naših usluga?</label>
                        <select id="usluge" name="usluge">
                            <option value="" <?php if(!isset($_POST['usluge'])){echo 'selected="selected"';} ?> disabled="disabled">Izaberi</option>
                            <option value="5" <?php if(isset($_POST['usluge'])){if($_POST['usluge'] == 5){echo 'selected="selected"';}} ?>>Odličan</option>
                            <option value="4" <?php if(isset($_POST['usluge'])){if($_POST['usluge'] == 4){echo 'selected="selected"';}} ?>>Vrlo dobar</option>
                            <option value="3"<?php if(isset($_POST['usluge'])){if($_POST['usluge'] == 3){echo 'selected="selected"';}} ?>>Dobar</option>
                            <option value="2" <?php if(isset($_POST['usluge'])){if($_POST['usluge'] == 2){echo 'selected="selected"';}} ?>>Zadovoljavajući</option>
                            <option value="1" <?php if(isset($_POST['usluge'])){if($_POST['usluge'] == 1){echo 'selected="selected"';}} ?>>Nezadovoljavajući</option>
                        </select>
                        
                        <label class="osoblje">Kako ocenjujete kvalitet komunikacije sa našim osobljem?</label>
                        <select id="osoblje" name="osoblje">
                            <option value="" <?php if(!isset($_POST['osoblje'])){echo 'selected="selected"';} ?> disabled="disabled">Izaberi</option>
                            <option value="5" <?php if(isset($_POST['osoblje'])){if($_POST['osoblje'] == 5){echo 'selected="selected"';}} ?>>Odličan</option>
                            <option value="4" <?php if(isset($_POST['osoblje'])){if($_POST['osoblje'] == 4){echo 'selected="selected"';}} ?>>Vrlo dobar</option>
                            <option value="3" <?php if(isset($_POST['osoblje'])){if($_POST['osoblje'] == 3){echo 'selected="selected"';}} ?>>Dobar</option>
                            <option value="2" <?php if(isset($_POST['osoblje'])){if($_POST['osoblje'] == 2){echo 'selected="selected"';}} ?>>Zadovoljavajući</option>
                            <option value="1" <?php if(isset($_POST['osoblje'])){if($_POST['osoblje'] == 1){echo 'selected="selected"';}} ?>>Nezadovoljavajući</option>
                        </select>
                    
                        <label for="brzina">Kako biste ocenili brzinu naših odgovora na Vaše zahteve?</label>
                        <select id="brzina" name="brzina">
                            <option value="" <?php if(!isset($_POST['brzina'])){echo 'selected="selected"';}  ?> disabled="disabled">Izaberi</option>
                            <option value="5" <?php if(isset($_POST['brzina'])){if($_POST['brzina'] == 5){echo 'selected="selected"';}} ?>>5</option>
                            <option value="4" <?php if(isset($_POST['brzina'])){if($_POST['brzina'] == 4){echo 'selected="selected"';}} ?>>4</option>
                            <option value="3" <?php if(isset($_POST['brzina'])){if($_POST['brzina'] == 3){echo 'selected="selected"';}} ?>>3</option>
                            <option value="2" <?php if(isset($_POST['brzina'])){if($_POST['brzina'] == 2){echo 'selected="selected"';}} ?>>2</option>
                            <option value="1" <?php if(isset($_POST['brzina'])){if($_POST['brzina'] == 1){echo 'selected="selected"';}} ?>>1</option>
                        </select>
                        
                        <label for="izvestaj">Da li ste zadovoljni uverenjem/izveštajem?</label>
                        <select id="izvestaj" name="izvestaj">
                            <option value="" <?php if(!isset($_POST['izvestaj'])){echo 'selected="selected"';}  ?> disabled="disabled">Izaberi</option>
                            <option value="5" <?php if(isset($_POST['izvestaj'])){if($_POST['izvestaj'] == 5){echo 'selected="selected"';}} ?>>Izveštaj je odličan</option>
                            <option value="4" <?php if(isset($_POST['izvestaj'])){if($_POST['izvestaj'] == 4){echo 'selected="selected"';}} ?>>Izveštaj je vrlo dobar</option>
                            <option value="3" <?php if(isset($_POST['izvestaj'])){if($_POST['izvestaj'] == 3){echo 'selected="selected"';}} ?>>Izveštaj je dobar</option>
                            <option value="2" <?php if(isset($_POST['izvestaj'])){if($_POST['izvestaj'] == 2){echo 'selected="selected"';}} ?>>Izveštaj je zadovoljavajući</option>
                            <option value="1" <?php if(isset($_POST['izvestaj'])){if($_POST['izvestaj'] == 1){echo 'selected="selected"';}} ?>>Izveštaj je nezadovoljavajući</option>
                        </select>
                    
                        <label for="dalje">Da li ćete i dalje koristiti naše usluge?</label>
                        <select id="dalje" name="dalje">
                            <option value="" <?php if(!isset($_POST['dalje'])){echo 'selected="selected"';}  ?> disabled="disabled">Izaberi</option>
                            <option value="5" <?php if(isset($_POST['dalje'])){if($_POST['dalje'] == 5){echo 'selected="selected"';}} ?>>Sigurno</option>
                            <option value="4" <?php if(isset($_POST['dalje'])){if($_POST['dalje'] == 4){echo 'selected="selected"';}} ?>>Najverovatnije</option>
                            <option value="3" <?php if(isset($_POST['dalje'])){if($_POST['dalje'] == 3){echo 'selected="selected"';}} ?>>Mozda</option>
                            <option value="2" <?php if(isset($_POST['dalje'])){if($_POST['dalje'] == 2){echo 'selected="selected"';}} ?>>Ne verujem</option>
                            <option value="1" <?php if(isset($_POST['dalje'])){if($_POST['dalje'] == 1){echo 'selected="selected"';}} ?>>Nikako</option>
                        </select>
                                         
                    </fieldset>
                    </div>

                    <fieldset class="sixteen columns">
                    <legend>Vaše sugestije</legend>
                        <label for="promene">Šta po Vašem mišljenju treba promeniti?</label>
                        <textarea name="promene" id="promene" ><?php if(isset($_POST['promene'])){echo htmlspecialchars($_POST['promene']);} ?></textarea>
                           
                        <label for="unaprediti">Šta po Vašem mišljenju treba unaprediti?</label>
                        <textarea name="unaprediti" id="unaprediti" ><?php if(isset($_POST['unaprediti'])){echo htmlspecialchars($_POST['unaprediti']);} ?></textarea>
                    </fieldset>

                        <div class="row">
                            <input class="right s15" name="submit" type="submit" title="Posalji">
                        </div>
                    </form>
            </div>
            
                        
            <?php include("inc/footer.php"); ?>

	    </div>
<?php include 'inc/foot.php'?>