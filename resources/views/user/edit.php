<?php include 'head.php'; ?>
<!-- Importando CSS e bootstrap da head.php  -->

<div class="container">
    <h1 class="mt-4 mb-4">Formulário de Edição </h1>

    <?php
    $user = $user[0];
    ?>

    <form action="<?= url("/user/update", ['id' => $user->id]); ?>" method="post">

        <?php echo csrf_field();
        echo method_field('PUT'); ?>
        <!--Setando que o método do formulário de edição será "put" e não "post"-->

        <div class="form-group">
            <label for="title">Nome do usuário </label>
            <input type="text" class="form-control" name="name" id="name" value=" <?= $user->name; ?>"> <!-- Essa tag em php está trazendo a informação a ser editada em cada o campo, ao invés de vazio -->
        </div>


        <div class="form-group">
            <label for="description">CPF do usuário</label>
            <input type="text" class="form-control" name="CPF" id="CPF" value=" <?= $user->CPF; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email do usuário</label>
            <input type="email" class="form-control" name="email" id="email" value=" <?= $user->email; ?>">
        </div>

        <div class="form-group">
            <label for="adress">Endereço do usuário</label>
            <select id="adress_id" class="form-control" name="adress_id">
                <?php
                foreach ($adresses as $adress) {
                    echo "<option value='{$adress->id}'".(isset($adress->id) && $adress->id == $user->adress_id ? 'selected' : '').">{$adress->city} </option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="profile">Perfil do usuário</label>
            <select id="profile_id" class="form-control" name="profile_id">
                <?php
                foreach ($profiles as $profile) {
                    echo "<option value='{$profile->id}'".(isset($profile->id) && $profile->id == $user->profile_id ? 'selected' : '').">{$profile->name} </option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-block btn-success">Atualizar registro</button>
    </form>
    </body>

    </html>
</div>
<?php include 'footer.php'; ?>
