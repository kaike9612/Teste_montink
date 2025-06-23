Este projeto é um sistema de gerenciamento simples (ERP) que permite o controle de pedidos, produtos, cupons e estoque. O sistema foi desenvolvido utilizando PHP e MySQL, com uma interface de usuário responsiva construída com Bootstrap.

## Tecnologias Utilizadas

- **Backend**: PHP (puro ou CodeIgniter 3)
- **Banco de Dados**: MySQL
- **Frontend**: HTML, CSS, Bootstrap
- **API de CEP**: ViaCEP

## Funcionalidades

- **Cadastro de Produtos**: Permite a criação e atualização de produtos com informações como nome, preço, variações e controle de estoque.
- **Gerenciamento de Estoque**: Associa produtos ao estoque e permite o controle de quantidades.
- **Carrinho de Compras**: Gerencia um carrinho em sessão, calculando o subtotal e o frete com base nas regras definidas.
- **Cálculo de Frete**: Implementa regras de frete com base no subtotal do pedido.
- **Cupons de Desconto**: Permite a criação e gerenciamento de cupons com validade e regras de valor mínimo.
- **Envio de E-mail**: Envia um e-mail ao cliente ao finalizar o pedido.
- **Webhook**: Recebe atualizações de status de pedidos e atualiza o banco de dados conforme necessário.

## Estrutura do Banco de Dados

O banco de dados é composto por quatro tabelas:

1. **produtos**: Armazena informações sobre os produtos.
2. **estoque**: Controla a quantidade de cada produto disponível.
3. **cupons**: Gerencia os cupons de desconto.
4. **pedidos**: Registra os pedidos realizados pelos clientes.

### Script de Criação do Banco de Dados

```sql
CREATE DATABASE mini_erp;

USE mini_erp;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    variacoes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE estoque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);

CREATE TABLE cupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(50) NOT NULL,
    validade DATE NOT NULL,
    valor_minimo DECIMAL(10, 2) NOT NULL,
    desconto DECIMAL(10, 2) NOT NULL
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    subtotal DECIMAL(10, 2) NOT NULL,
    status ENUM('pendente', 'concluido', 'cancelado') DEFAULT 'pendente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);

1. Como Executar o Projeto:
Clone o repositório

2. Configurar o Banco de Dados:

Crie um banco de dados MySQL usando o script fornecido.
Configure as credenciais do banco de dados no arquivo de configuração do seu projeto.
Instalar Dependências:

3. Se estiver usando Composer (para Laravel), execute

4. Executar o Servidor:

Para PHP puro, você pode usar o servidor embutido

5. Acessar a Aplicação:

Abra o navegador e acesse http://localhost:8000 ou http://localhost:8000 (dependendo do servidor que você está usando).

Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para abrir uma issue ou enviar um pull request.
