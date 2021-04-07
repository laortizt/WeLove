<?php
require_once "./controller/controllerProfile.php";
$insProfile = new controllerProfile();
?>

<div class="row">
    <div class="col-12 col-m-12 col-sm-12">
        <div class="card">
            <div class="card-content">

                <div class="col-1-8">
                    <ul class="matchup">
                        <li><span class="seed">1</span> Bill<span class="score"></span></li>
                        <li><span class="seed">8</span> Tom<span class="score"></span></li>
                    </ul>
                    <ul class="matchup">
                        <li><span class="seed">4</span> Chris<span class="score"></span></li>
                        <li><span class="seed">5</span> Bob<span class="score"></span></li>
                    </ul>
                    <ul class="matchup">
                        <li><span class="seed">2</span> Jerry<span class="score"></span></li>
                        <li><span class="seed">7</span> Sam<span class="score"></span></li>
                    </ul>
                    <ul class="matchup">
                        <li><span class="seed">3</span> Ken<span class="score"></span></li>
                        <li><span class="seed">6</span> Bill<span class="score"></span></li>
                    </ul>
                </div>
                <div class="col-1-8">
                    <div class="round-two-top">
                        <ul class="matchup">
                            <li><span class="seed">1</span> Bill<span class="score"></span></li>
                            <li><span class="seed">4</span> Chris<span class="score"></span></li>
                        </ul>
                    </div>
                    <div class="round-two-bottom">
                        <ul class="matchup round-two-bottom">
                            <li><span class="seed">2</span> Jerry<span class="score"></span></li>
                            <li><span class="seed">3</span> Ken<span class="score"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-1-8 champ">
                    <div class="round-three">
                        <ul class="matchup">
                            <li><span class="seed">1</span> Bill<span class="score"></span></li>
                            <li><span class="seed">3</span> Ken<span class="score"></span></li>
                        </ul>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>