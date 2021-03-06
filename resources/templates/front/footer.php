<footer class="bg-dark text-white">
    <div class="row">
        <div class="col-lg-4">
            <div>
                <img src="images/logo_light.svg" alt="logo bianco">
                <h4 class="d-inline">Studio Legale Turlon</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="lostudio.php">Lo Studio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aree.php">Le Aree di Attività</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="professionisti.php">I Professionisti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pubblicazioni.php">Pubblicazioni ed eventi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="consulenza.php">Consulenza Online</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contatti.php">Contatti</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-4">
            <h4>Le nostre sedi</h4>
<!-- Get studios list via PHP -->
<?php 
foreach($studi as $s) {
$studio = <<<DELIMETER

<div>
    <a href="sede.php?id={$s->get_id()}"><h5>Sede di {$s->get_city()}</h5></a>
    <p>{$s->get_adress()}</p>
    <p>{$s->get_phone()}</p>
</div>

DELIMETER;
echo $studio;
}
?>
<!-- -->
        </div>
        <div class="col-lg-4">
            <h5>Contatti</h5>
            <p>federica.turlon@studiolegaleturlon.it</p>
            <p>federica.turlon@servicepec.it</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <p>P.IVA 09304481006 <span>Privacy Policy</span> <span>Cookie Policy</span></p>
        </div>
        <div class="col-lg-6">
            <a role="button" class="btn btn-secondary" href="login.php"><i class="fas fa-key"></i></a>
        </div>
    </div>
</footer>