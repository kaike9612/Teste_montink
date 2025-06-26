session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto_id = $_POST['produto_id'];
    $quantidade = $_POST['quantidade'];
    
    // Adiciona o produto ao carrinho
    $_SESSION['carrinho'][$produto_id] = $quantidade;
    // Calcula o subtotal
    $subtotal = 0;
    foreach ($_SESSION['carrinho'] as $id => $qtd) {
        // Aqui você deve buscar o preço do produto no banco de dados
        $preco = buscarPrecoProduto($id); // Função fictícia
        $subtotal += $preco * $qtd;
    }
    // Calcula o frete
    if ($subtotal >= 52 && $subtotal <= 166.59) {
        $frete = 15.00;
    } elseif ($subtotal > 200) {
        $frete = 0.00;
    } else {
        $frete = 20.00;
    }
    // Exibe o subtotal e o frete
    echo "Subtotal: R$" . number_format($subtotal, 2, ',', '.') . "<br>";
    echo "Frete: R$" . number_format($frete, 2, ',', '.') . "<br>";
}
