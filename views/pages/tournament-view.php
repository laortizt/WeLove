<?php
require_once "./controller/controllerTournament.php";
$insTournament = new controllerTournament();

$equipments = $insTournament->get_equipments_controller();
$randomized = $insTournament->get_equipments_randomized_controller();
?>

<div class="row">
    <div class="col-12 col-m-12 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="header-class">
                    <h1 class="title">Lista de Equipos</h1>
                    <?php include "./views/modules/menuTournament.php"; ?>
                </div>
                <div class="row">
                    <div class="col-4 col-m-4 col-sm-12">

                        <ul class="list-team">
                            <?php
                            foreach ($equipments as $equipment) {
                                echo '<li><i class="fas fa-futbol"> </i>' .  $equipment['equipmentName'] . '</li>';
                            }
                            ?>
                        </ul>

                    </div>

                    <div class="col-8 col-m-8 col-sm-12">
                        <div class="col-1-3">
                            <ul class="matchup">
                                <li>
                                    <span class="seed">1</span>
                                    <?= isset($randomized[0]) ? $randomized[0]['equipmentName'] : '--' ?>
                                    <span class="score"></span>
                                </li>
                                <li>
                                    <span class="seed">8</span>
                                    <?= isset($randomized[7]) ? $randomized[7]['equipmentName'] : '--' ?>
                                    <span class="score"></span>
                                </li>
                            </ul>
                            <ul class="matchup">
                                <li>
                                    <span class="seed">4</span>
                                    <?= isset($randomized[3]) ? $randomized[3]['equipmentName'] : '--' ?>
                                    <span class="score"></span>
                                </li>
                                <li>
                                    <span class="seed">5</span>
                                    <?= isset($randomized[4]) ? $randomized[4]['equipmentName'] : '--' ?>
                                    <span class="score"></span>
                                </li>
                            </ul>
                            <ul class="matchup">
                                <li>
                                    <span class="seed">2</span>
                                    <?= isset($randomized[1]) ? $randomized[1]['equipmentName'] : '--' ?>
                                    <span class="score"></span>
                                </li>
                                <li>
                                    <span class="seed">7</span>
                                    <?= isset($randomized[6]) ? $randomized[6]['equipmentName'] : '--' ?>
                                    <span class="score"></span>
                                </li>
                            </ul>
                            <ul class="matchup">
                                <li>
                                    <span class="seed">3</span>
                                    <?= isset($randomized[2]) ? $randomized[2]['equipmentName'] : '--' ?>
                                    <span class="score"></span>
                                </li>
                                <li>
                                    <span class="seed">6</span>
                                    <?= isset($randomized[5]) ? $randomized[5]['equipmentName'] : '--' ?>
                                    <span class="score"></span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-1-3">
                            <div class="round-two-top">
                                <ul class="matchup">
                                    <li>
                                        <span class="seed">-</span>
                                        --
                                        <span class="score"></span>
                                    </li>
                                    <li>
                                        <span class="seed">-</span>
                                        --
                                        <span class="score"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="round-two-bottom">
                                <ul class="matchup round-two-bottom">
                                    <li>
                                        <span class="seed">-</span>
                                        --
                                        <span class="score"></span>
                                    </li>
                                    <li>
                                        <span class="seed">-</span>
                                        --
                                        <span class="score"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-1-3 champ">
                            <div class="round-three">
                                <ul class="matchup">
                                    <li>
                                        <span class="seed">-</span>
                                        --
                                        <span class="score"></span>
                                    </li>
                                    <li>
                                        <span class="seed">-</span>
                                        --
                                        <span class="score"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>