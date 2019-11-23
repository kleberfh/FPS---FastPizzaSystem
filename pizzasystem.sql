-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 23-Nov-2019 às 00:07
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pizzasystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `cpf`, `rua`, `numero`, `bairro`, `cep`, `complemento`, `created_at`, `updated_at`) VALUES
(1, 'Kleber', '14991146621', '36386365852', 'bla bla', '254', 'centro', '14014220', '', '2019-11-22 22:15:48', '2019-11-22 22:15:48'),
(2, 'Cassio', '156498798', '19879879879', '8sdajhfasdjf', '542', 'lkasdfjsadlkf', '1418719', '', '2019-11-22 23:37:03', '2019-11-22 23:37:03'),
(3, 'Vitao', '165746878', '3598789541', 'dskjahfkjasdhfas', '548', 'kjasdfhskdhgfa', '265417616899', '', '2019-11-22 23:37:29', '2019-11-22 23:37:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `tipo_pizza` int(11) NOT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `tipo_pizza`, `valor`, `descricao`, `cliente`) VALUES
(1, 1, '40.00', 'Borda recheada\n - Sabores: Napolitana', 'Kleber'),
(2, 2, '52.00', 'Sem borda recheada\r\n - Sabores: Frango,4 Queijos', 'Vitao'),
(3, 1, '20.00', 'Sem lombo\n - Sabores: Lombo', 'Cassio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `valor`, `descricao`) VALUES
(1, 'Coca cola', '9.00', '2L');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sabores`
--

CREATE TABLE `sabores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sabores`
--

INSERT INTO `sabores` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, 'Carne moída', 'a carne moída dessa pizza tem uma função dois em um ela serve como massa e recheio. Para preparar essa receita só é necessário temperar a carne moída, forrar uma frigideira com ela, virar o lado depois que estiver dourada e por último, cobrir com muçarela, tomate, sal e orégano.', '30,00'),
(3, 'Margherita', 'o recheio dessa pizza é feito com molho de tomate, mussarela de búfala, manjericão, queijo parmesão ralado e azeite. É uma pizza margherita bem tradicional e saborosa que você pode preparar e servir para seus amigos', '30,00'),
(4, 'Bacon', 'essa é uma opção de recheio bem simples. Basta cortar o bacon em tiras e colocar em uma frigideira para fritar. É interessante acrescentar muçarela ao recheio também.', '30,00'),
(5, 'Portuguesa', 'o recheio dessa pizza é feito com chouriço ou calabresa, tomates, muçarela, cebolas e azeitonas pretas. Você só precisa picar os ingredientes e depois espalhá-los pela massa da pizza.', '30,00'),
(6, 'Calabresa', 'para preparar o recheio dessa pizza você só precisa colocar sobre a massa molho de tomate, muçarela, calabresa, cebola e parmesão. Depois é só levar ao forno para assar.', '30,00'),
(7, 'Frango', 'para rechear essa pizza você vai precisar de um frango desfiado. Além da carne, a sugestão é acrescentar molho de tomate, queijo muçarela, milho verde, pimentão, azeitonas e orégano.', '30,00'),
(8, 'Napolitana', 'a pizza napolitana é uma ótima opção para quem gosta de sabores fortes. O recheio é feito com anchovas, azeitonas pretas, alcaparras e muçarela.', '30,00'),
(9, '4Queijos', 'os queijos escolhidos para rechear essa pizza foram muçarela, gorgonzola, requeijão e parmesão.', '30,00'),
(10, 'Atum', 'esse é um recheio que dá pouquíssimo trabalho para ser preparado. Basta escorrer o líquido (azeite ou água) da lata de atum e espalhar pela massa da pizza. A sugestão é acrescentar muçarela, tomate cereja, alcaparras, azeitonas pretas, azeite e orégano.', '30,00'),
(11, 'Muçarela', 'parmesão e bacon,a combinação de queijo e bacon é atrativa para muitos paladares, então, porque não acrescentar esses ingredientes no recheio da sua pizza? Você também pode acrescentar tomates e orégano.', '30,00'),
(12, 'Rúcula com tomate seco', 'além da rúcula e do tomate seco, o recheio dessa pizza também usa azeite e molho de tomate. Você só precisa lavar e picar os ingredientes.', '30,00'),
(13, 'Lombo', 'para quem gosta de carne de porco, essa é uma ótima e simples opção. Além do lombo, você vai precisar de molho de tomate, muçarela, azeitonas verdes e orégano.', '30,00'),
(14, 'Tropical', 'os ingredientes para rechear a pizza tropical são muçarela, camarão, bacon e abacaxi. Em uma única pizza é possível sentir o sabor salgado, doce e azedo.', '30,00'),
(15, 'FrangoComCatupiry', 'A mistura de proteína e cremosidade que deu muito certo.', '30,00'),
(16, 'Frango com linguiça', 'o frango usado para o recheio dessa pizza é desfiado, além dele e da linguiça, a sugestão é acrescentar pimentão vermelho, queijo ralado, orégano e pimenta.', '30,00'),
(17, 'Filé e 4 queijos', 'para preparar o recheio dessa pizza o filé deve ser cortado em tiras e selado. Os queijos escolhidos foram pecorino, petit cantal, provolone e grana padano, mas você pode substituir por queijos de sua preferência, como gorgonzola e muçarela, por exemplo.', '30,00'),
(18, 'Brie', 'presunto e rúcula,preparar o recheio dessa pizza é um trabalho bem simples. Você só precisa espalhar molho de tomate pela massa e depois espalhar muçarela, brie, presunto e rúcula picados. Quando sua pizza estiver montada, basta levar ao forno para assar.', '30,00'),
(19, 'Bacon e pepperoni', 'além do bacon e do pepperoni, essa receita sugere usar outros ingredientes para rechear sua pizza, são eles pimentão verde, cebola, champignon e pedacinhos de bacon, além de molho de tomate e muçarela.', '30,00'),
(20, 'Mexicana', 'quer inovar no recheio da sua pizza? Que tal escolher os mesmos ingredientes usados para preparar os famosos tacos mexicanos? Para preparar essa receita você vai precisar de doritos, pimentão vermelho, carne moída, muçarela e temperos.', '30,00'),
(21, 'Queijo', 'tomate e alho-poró,o queijo escolhido para esse recheio foi o branco, além de tomate e alho-poró, a receita também usa cebola roxa e manjericão.', '30,00'),
(22, 'Brie com pera', 'a combinação de queijo brie com pera é muito interessante, pois mescla a cremosidade e o sabor salgado do queijo com a fruta adocicada. É uma boa opção para quem gosta de pratos agridoces.', '30,00'),
(23, 'Cebola caramelizada com queijo de cabra', 'para caramelizar as cebolas, você só precisa colocá-las em uma frigideira com manteiga derretida e acrescentar açúcar mascavo. Depois que as cebolas estiverem prontas, basta colocar as cebolas e o queijo sobre a massa. Se quiser um sabor extra, depois de tirar a pizza do forno, acrescente manjericão fresco.', '30,00'),
(24, '4 queijos', 'para esse recheio de pizza os queijos escolhidos foram muçarela, emmental, cheddar e brie. Mas você pode substituir pelos queijos de sua preferência.', '30,00'),
(25, 'Abobrinha', 'a sugestão para esse recheio é deixar a abobrinha marinando por 2 dias antes do preparo. Além da abobrinha, você também pode usar molho de tomate, molho de soja, vinagre balsâmico e tofu.', '30,00'),
(26, 'Bioqueijo', 'além do bioqueijo, essa receita sugere usar rúcula, milho, ervilha, tomate e azeitona para o recheio da sua pizza.', '30,00'),
(27, 'Rúcula', ' tomate e champignon,o recheio dessa pizza é feito com molho de tomate, muçarela picada, mini tomates, champignon, azeitona preta, manjericão fresco e rúcula. Só é preciso picar os ingredientes e depois espalhar pela massa.', '30,00'),
(28, 'Peito de peru com brócolis', 'além do peito de peru e do brócolis, o recheio dessa pizza é feito com requeijão, muçarela, cebola e tomate. Para preparar o recheio só é preciso picar e espalhar os ingredientes sobre a massa. Se você quer uma pizza leve, opte por uma massa integral, de brócolis ou couve-flor.', '30,00'),
(29, 'Abobrinha', 'se você quer um recheio bem leve para sua pizza, essa é uma boa opção. Além da abobrinha, você vai precisar de molho de tomate, queijo parmesão ralado, sal e pimenta.', '30,00'),
(30, 'Carne acebolada e creme de tofu', 'para preparar esse recheio você vai precisar de carne cortada em tiras, cebola, creme de tofu, tomates e orégano. O preparo do recheio é bem simples e saboroso.', '30,00'),
(31, 'Frango e rúcula', 'essa sugestão de recheio diz para usar molho de tomate, frango desfiado, rúcula e tomate. Dependendo da opção de massa, sua pizza pode ficar bem leve.', '30,00'),
(32, 'Carne e tomate lowcarb', 'para que sua pizza fique mais leve escolha uma carne com baixa quantidade de gordura, como o patinho. Além da carne o do tomate, você também pode acrescentar creme de tofu e orégano.', '30,00'),
(33, 'Sem lactose', 'o recheio dessa pizza é feito com atum, milho e creme de tofu. Além da sugestão de recheio, essa receita ensina como preparar uma massa sem leite e sem ovos.', '30,00'),
(34, 'Presunto e queijo', 'presunto e queijo muçarela são dois ingredientes que fazem uma combinação muito querida. Você também pode acrescentar ao seu recheio tomate seco e manjericão, além de temperos.', '30,00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Administrador', 'admin@email.com', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sabores`
--
ALTER TABLE `sabores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sabores`
--
ALTER TABLE `sabores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
