<?php include 'head.php'; ?>
<!-- Importando CSS e bootstrap da head.php  -->

<div class="container mt-4">
<h1>Listagem de Usuários</h1>
<a class="btn btn-primary mb-3 mt-3" href="<?= url('/user/novo'); ?>">Cadastrar novo usuário</a>

    <?php

    if (!empty($users)) {

        echo '<table class="table table-striped">';
        echo '<thead class="thead-dark">
            <tr>
            <th scope="col">Nome</td>
            <th scope="col">CPF</td>
            <th scope="col">E-mail</td>
            <th scope="col">Ações</td>
            </tr>
            </thead>';

        echo "<tbody>";
        foreach ($users as $user) {

            $linkReadMore = url("/user/" . $user->id); // Opção de "leia mais" ao lado do usuário.
            $linkEditItem = url("/user/editar/" . $user->id); // Opção de editar o item/informações do usuário.
            $linkRemoveItem = url("/user/remover/" . $user->id); // Opção de remover o item/informações do usuário.

            echo "<tr>
                    <td> {$user->name}</td>
                    <td> {$user->CPF}</td>
                    <td> {$user->email}</td>

                    <td><a href='{$linkReadMore}'>Ver mais</a>  |  <a href='{$linkEditItem}'>Editar</a>  |  <a href='{$linkRemoveItem}'>Remover</a></td>
            </tr>";
        }
        echo "</tbody>";
        echo "</table";
    }
    ?>
</div>
<?php include 'footer.php'; ?>
