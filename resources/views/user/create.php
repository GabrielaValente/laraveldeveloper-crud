<?php include 'head.php'; ?>
<!-- Importando CSS e bootstrap da head.php  -->

<div class="container">
    <h1>Formulário de Cadastro </h1>

    <form action="<?= url("/user/store"); ?>" method="post">

        <?= csrf_field(); ?>

        <div class="form-group">
            <label for="name">Informe o nome</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="CPF">Informe o CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf">
        </div>

        <div class="form-group">
            <label for="email">Informe o e-mail</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="adress">Informe o endereço</label>
            <select id="adress_id" class="form-control" name="adress_id">
                <option value=""> --Selecione--</option>
                <?php
                foreach ($adresses as $adress) {
                    echo "<option value='{$adress->id}'>{$adress->city} </option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="profile_id">Informe o perfil do usuário</label>
            <select id="profile_id" class="form-control" name="profile_id">
                <option value=""> --Selecione--</option>
                <?php
                foreach ($profiles as $profile) {
                    echo "<option value='{$profile->id}'>{$profile->name} </option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Informe uma senha</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Cadastrar usuário</button>
    </form>
</div>

<?php include 'footer.php'; ?>
