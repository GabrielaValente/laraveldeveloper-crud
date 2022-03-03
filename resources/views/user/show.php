<?php include 'head.php'; ?>
<!-- Importando CSS e bootstrap da head.php  -->

<div class="container mt-4">
    <h1 class="mb-4">Página de detalhamento</h1>

    <div class="card p-5">
        <div class="class-body">
            <?php

            if (!empty($users)) {

                foreach ($users as $user) {
            ?>
                    <h5>Nome: <?= $user->name; ?></h5>
                    <p>CPF: <?= $user->CPF; ?></p>
                    <p>Email: <?= $user->email; ?></p>
                    <p>Endereço: <?= $user->adress; ?></p>
                    <p>Perfil: <?= $user->profile; ?></p>
            <?php
                }}
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</div>
