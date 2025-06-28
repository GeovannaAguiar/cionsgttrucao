<?php
include 'conexao.php';
 
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
 
echo "<h2>Lista de Produtos</h2>";
 
if ($result->num_rows > 0) {
  echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Preço</th><th>Categoria</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['descricao']}</td>
            <td>R$ {$row['preco']}</td>
            <td>{$row['categoria']}</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "Nenhum produto cadastrado.";
}
 
$conn->close();
?>
 