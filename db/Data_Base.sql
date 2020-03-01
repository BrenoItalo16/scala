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

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES (NULL, 'Breno Italo', 'srbrenoitalo16@gmail.com', 'a72325099d140e918a2e538fa3dbcdef');
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