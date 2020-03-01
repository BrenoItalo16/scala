/* scala */

CREATE database scala
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

CREATE TABLE usuario (
    id_usuario INTEGER auto_increment PRIMARY KEY,
    nome Varchar(30),
    email Varchar(40),
    senha Varchar(50)
);

CREATE TABLE ano (
    id_ano INTEGER PRIMARY KEY
);

CREATE TABLE mes (
    id_mes INTEGER PRIMARY KEY,
    nome_mes VARCHAR(11),
    fk_ano_mes INTEGER
);

CREATE TABLE dia (
    id_dia INTEGER PRIMARY KEY,
    fk_dia_mes INTEGER,
    fk_dia_semana INTEGER,
    fk_dia_pessoa INTEGER
);

CREATE TABLE semana (
    id_semana INTEGER PRIMARY KEY,
    dia_semana VARCHAR(20)
);

CREATE TABLE pessoa (
    id_user INTEGER PRIMARY KEY,
    nome VARCHAR(40),
    imagem VARCHAR(100)
);

CREATE TABLE escala (
    id_escala INTEGER auto_increment PRIMARY KEY,
    pregador Varchar(30),
    inicialum Varchar(30),
    inicialdois Varchar(30),
    especialum Varchar(30),
    especialdois Varchar(30),
    diaconoum Varchar(30),
    diaconodois Varchar(30),
    plataformaum Varchar(30),
    plataformadois Varchar(30)
);
 
ALTER TABLE mes ADD CONSTRAINT FK_mes_2
    FOREIGN KEY (fk_ano_mes)
    REFERENCES ano (id_ano);
 
ALTER TABLE dia ADD CONSTRAINT FK_dia_2
    FOREIGN KEY (fk_dia_mes)
    REFERENCES mes (id_mes)
    ON DELETE RESTRICT;
 
ALTER TABLE dia ADD CONSTRAINT FK_dia_3
    FOREIGN KEY (fk_dia_pessoa)
    REFERENCES pessoa (id_user);
 
ALTER TABLE dia ADD CONSTRAINT FK_dia_4
    FOREIGN KEY (fk_dia_semana)
    REFERENCES semana (id_semana);

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES 
    (NULL, 'Breno Italo', 'srbrenoitalo16@gmail.com', 'a72325099d140e918a2e538fa3dbcdef'),
    (NULL, 'Roney Stepherson', 'roney@adventista.com', ' a00924400cf71ce8b431f04b3acdd4a0'),
    (NULL, 'Yana', 'yana@adventista.com', ' a00924400cf71ce8b431f04b3acdd4a0'),
    (NULL, 'Rafaela', 'rafaela@adventista.com', ' a00924400cf71ce8b431f04b3acdd4a0');
    
INSERT INTO `ano`(`id_ano`) VALUES
(2020),
(2021);

INSERT INTO `mes`(`id_mes`, `nome_mes`, `fk_ano_mes`) VALUES
(1,"janeiro",2020),
(2,"fevereiro",2020),
(3,"março",2020),
(4,"abril",2020),
(5,"mail",2020),
(6,"junho",2020),
(7,"julho",2020),
(8,"agosto",2020),
(9,"setembro",2020),
(10,"outubro",2020),
(11,"novembro",2020),
(12,"dezembro",2020);

INSERT INTO `semana`(`id_semana`, `dia_semana`) VALUES
(1,"domingo"),
(2,"segunda-feira"),
(3,"terça-feira"),
(4,"quarta-feira"),
(5,"quinta-feira"),
(6,"sexta-feira"),
(7,"sábado");

INSERT INTO `pessoa`(`id_user`, `nome`, `imagem`) VALUES
(1,"Breno","breno.jpg"),
(2,"Carly","carly.jpg"),
(3,"Roney","roney.jpg"),
(4,"Batista","batista.jpg"),
(5,"Tales","tales.png"),
(6,"Jusaína","user.jpg"),
(7,"José","jose.jpg"),
(8,"Yana","yana.jpg"),
(9,"Rafaela","rafaela.jpg"),
(10,"Iza","iza.jpg"),
(11,"Walison","walison.jpg"),
(12,"Sandra","sandra.jpg"),
(13,"Vinícius","vinicius.jpg"),
(14,"Nielison","user.jpg"),
(15,"Raíla","user.jpg"),
(16,"Raylan","raylan.jpg"),
(17,"Dairla","dairla.jpg"),
(18,"Wladmir","wladmir.jpg"),
(19,"Maria Luiza","maria.jpg"),
(20,"Jair","jair.jpg");

INSERT INTO `dia`(`id_dia`) VALUES
(1),(2),(3),(4),(5),(6),(7),(8),(9),(10),
(11),(12),(13),(14),(15),(16),(17),(18),(19),(20),
(21),(22),(23),(24),(25),(26),(27),(28),(29),(30),(31);