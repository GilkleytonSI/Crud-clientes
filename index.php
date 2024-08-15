<?php
include_once 'ClienteController.php';

$controller = new ClienteController();
$clienteEditando = null;

// Criar um novo cliente
if (isset($_POST['criar'])) {
    $controller->criarCliente($_POST['nome'], $_POST['email']);
}

// Atualizar cliente
if (isset($_POST['atualizar'])) {
    $controller->atualizarCliente($_POST['id'], $_POST['nome'], $_POST['email']);
}

// Excluir cliente
if (isset($_GET['excluir'])) {
    $controller->excluirCliente($_GET['id']);
}

// Buscar cliente para edição
if (isset($_GET['editar'])) {
    $clientes = $controller->listarClientes();
    while ($cliente = $clientes->fetch(PDO::FETCH_ASSOC)) {
        if ($cliente['id'] == $_GET['id']) {
            $clienteEditando = $cliente;
            break;
        }
    }
}

// Listar todos os clientes
$clientes = $controller->listarClientes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Clientes</title>
    <!-- Link para Font Awesome (Ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Link para o CSS externo -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container">
    <h1>Cadastro de Clientes</h1>

    <!-- Formulário de Criar/Editar Cliente -->
    <form action="index.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $clienteEditando['id'] ?? ''; ?>">
        <input type="text" name="nome" placeholder="Nome" value="<?php echo $clienteEditando['nome'] ?? ''; ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?php echo $clienteEditando['email'] ?? ''; ?>" required>
        <?php if ($clienteEditando): ?>
            <button type="submit" name="atualizar">Atualizar Cliente</button>
        <?php else: ?>
            <button type="submit" name="criar">Criar Cliente</button>
        <?php endif; ?>
    </form>

    <h2>Lista de Clientes</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php while ($cliente = $clientes->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?php echo $cliente['id']; ?></td>
            <td><?php echo $cliente['nome']; ?></td>
            <td><?php echo $cliente['email']; ?></td>
            <td>
                <a href="index.php?editar&id=<?php echo $cliente['id']; ?>" class="icon icon-edit"><i class="fas fa-edit"></i></a>
                <a href="index.php?excluir&id=<?php echo $cliente['id']; ?>" class="icon icon-delete"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
