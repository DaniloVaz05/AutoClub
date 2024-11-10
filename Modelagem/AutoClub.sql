CREATE SCHEMA IF NOT EXISTS `AutoClub` DEFAULT CHARACTER SET utf8 ;
USE `AutoClub` ;


CREATE TABLE IF NOT EXISTS `AutoClub`.`assinatura` (
  `id_assinatura` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_assinatura`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `AutoClub`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `nomeMaterno` VARCHAR(80) NOT NULL,
  `dataNasc` DATE NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `telefone` VARCHAR(16) NOT NULL,
  `logradouro` VARCHAR(120) NOT NULL,
  `numero` VARCHAR(6) NOT NULL,
  `bairro` VARCHAR(120) NOT NULL,
  `cidade` VARCHAR(120) NOT NULL,
  `uf` CHAR(2) NOT NULL,
  `cep` VARCHAR(30) NOT NULL,
  `email` VARCHAR(120) NOT NULL,
  `senha` VARCHAR(400) NOT NULL,
  `nivel` INT NOT NULL,
  `foto` VARCHAR(400) NULL,
  `id_assinatura` INT NOT NULL,
  PRIMARY KEY (`id_usuario`, `id_assinatura`),
  INDEX `fk_usuario_assinatura1_idx` (`id_assinatura` ASC) ,
  CONSTRAINT `fk_usuario_assinatura1`
    FOREIGN KEY (`id_assinatura`)
    REFERENCES `AutoClub`.`assinatura` (`id_assinatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `AutoClub`.`adm` (
  `id_adm` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NOT NULL,
  `login` VARCHAR(30) NOT NULL,
  `senha` VARCHAR(400) NOT NULL,
  `foto` VARCHAR(400) NULL,
  `nivel` INT NOT NULL,
  PRIMARY KEY (`id_adm`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `AutoClub`.`log` (
  `id_log` INT NOT NULL AUTO_INCREMENT,
  `dataLog` DATE NOT NULL,
  `acaoLog` VARCHAR(120) NOT NULL,
  `horaLog` TIME NOT NULL,
  `id_usuario` INT NULL,
  `id_adm` INT NULL,
  PRIMARY KEY (`id_log`),
  INDEX `fk_log_usuario1_idx` (`id_usuario` ASC) ,
  INDEX `fk_log_adm1_idx` (`id_adm` ASC) ,
  CONSTRAINT `fk_log_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `AutoClub`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_log_adm1`
    FOREIGN KEY (`id_adm`)
    REFERENCES `AutoClub`.`adm` (`id_adm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `AutoClub`.`autopecas` (
  `id_autopecas` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NOT NULL,
  `cnpj` VARCHAR(30) NOT NULL,
  `logradouro` VARCHAR(120) NOT NULL,
  `numero` VARCHAR(6) NOT NULL,
  `bairro` VARCHAR(120) NOT NULL,
  `cidade` VARCHAR(120) NOT NULL,
  `uf` CHAR(2) NOT NULL,
  `cep` VARCHAR(30) NOT NULL,
  `telefone` VARCHAR(16) NOT NULL,
  `email` VARCHAR(120) NOT NULL,
  `senha` VARCHAR(400) NOT NULL,
  `nivel` INT NOT NULL,
  `foto` VARCHAR(400) NULL,
  `id_assinatura` INT NOT NULL,
  PRIMARY KEY (`id_autopecas`, `id_assinatura`),
  INDEX `fk_autopecas_assinatura1_idx` (`id_assinatura` ASC) ,
  CONSTRAINT `fk_autopecas_assinatura1`
    FOREIGN KEY (`id_assinatura`)
    REFERENCES `AutoClub`.`assinatura` (`id_assinatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `AutoClub`.`pecas` (
  `id_pecas` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `id_usuario` INT NOT NULL,
  `id_autopecas` INT NOT NULL,
  PRIMARY KEY (`id_pecas`, `id_usuario`, `id_autopecas`),
  INDEX `fk_pecas_usuario1_idx` (`id_usuario` ASC) ,
  INDEX `fk_pecas_autopecas1_idx` (`id_autopecas` ASC) ,
  CONSTRAINT `fk_pecas_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `AutoClub`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pecas_autopecas1`
    FOREIGN KEY (`id_autopecas`)
    REFERENCES `AutoClub`.`autopecas` (`id_autopecas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `AutoClub`.`carro` (
  `id_carro` INT NOT NULL AUTO_INCREMENT,
  `placa` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `ano` VARCHAR(45) NOT NULL,
  `ultimaRevisao` DATE NOT NULL,
  `combustivel` VARCHAR(45) NOT NULL,
  `motor` VARCHAR(45) NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_carro`, `id_usuario`),
  INDEX `fk_carro_usuario1_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_carro_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `AutoClub`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `AutoClub`.`estetica` (
  `id_estetica` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NOT NULL,
  `cnpj` VARCHAR(30) NOT NULL,
  `logradouro` VARCHAR(120) NOT NULL,
  `numero` VARCHAR(6) NOT NULL,
  `bairro` VARCHAR(120) NOT NULL,
  `cidade` VARCHAR(120) NOT NULL,
  `uf` CHAR(2) NOT NULL,
  `cep` VARCHAR(30) NOT NULL,
  `telefone` VARCHAR(16) NOT NULL,
  `email` VARCHAR(120) NOT NULL,
  `senha` VARCHAR(400) NOT NULL,
  `nivel` INT NOT NULL,
  `foto` VARCHAR(400) NULL,
  `id_assinatura` INT NOT NULL,
  PRIMARY KEY (`id_estetica`, `id_assinatura`),
  INDEX `fk_estetica_assinatura1_idx` (`id_assinatura` ASC) ,
  CONSTRAINT `fk_estetica_assinatura1`
    FOREIGN KEY (`id_assinatura`)
    REFERENCES `AutoClub`.`assinatura` (`id_assinatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `AutoClub`.`servicos` (
  `id_servicos` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_servicos`, `id_usuario`),
  INDEX `fk_servicos_usuario1_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_servicos_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `AutoClub`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `AutoClub`.`oficina` (
  `id_oficina` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NOT NULL,
  `cnpj` VARCHAR(30) NOT NULL,
  `logradouro` VARCHAR(120) NOT NULL,
  `numero` VARCHAR(6) NOT NULL,
  `bairro` VARCHAR(120) NOT NULL,
  `cidade` VARCHAR(120) NOT NULL,
  `uf` CHAR(2) NOT NULL,
  `cep` VARCHAR(30) NOT NULL,
  `telefone` VARCHAR(16) NOT NULL,
  `email` VARCHAR(120) NOT NULL,
  `senha` VARCHAR(400) NOT NULL,
  `nivel` INT NOT NULL,
  `foto` VARCHAR(400) NULL,
  `id_assinatura` INT NOT NULL,
  PRIMARY KEY (`id_oficina`, `id_assinatura`),
  INDEX `fk_oficina_assinatura1_idx` (`id_assinatura` ASC) ,
  CONSTRAINT `fk_oficina_assinatura1`
    FOREIGN KEY (`id_assinatura`)
    REFERENCES `AutoClub`.`assinatura` (`id_assinatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `AutoClub`.`servicos_estetica` (
  `id_servicoEstetica` INT NOT NULL AUTO_INCREMENT,
  `id_servicos` INT NOT NULL,
  `id_estetica` INT NOT NULL,
  PRIMARY KEY (`id_servicoEstetica`, `id_servicos`, `id_estetica`),
  INDEX `fk_servicos_has_estetica_estetica1_idx` (`id_estetica` ASC) ,
  INDEX `fk_servicos_has_estetica_servicos1_idx` (`id_servicos` ASC) ,
  CONSTRAINT `fk_servicos_has_estetica_servicos1`
    FOREIGN KEY (`id_servicos`)
    REFERENCES `AutoClub`.`servicos` (`id_servicos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicos_has_estetica_estetica1`
    FOREIGN KEY (`id_estetica`)
    REFERENCES `AutoClub`.`estetica` (`id_estetica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `AutoClub`.`estetica_carro` (
  `id_esteticaCarro` INT NOT NULL AUTO_INCREMENT,
  `id_estetica` INT NOT NULL,
  `id_carro` INT NOT NULL,
  PRIMARY KEY (`id_esteticaCarro`, `id_estetica`, `id_carro`),
  INDEX `fk_estetica_has_carro_carro1_idx` (`id_carro` ASC) ,
  INDEX `fk_estetica_has_carro_estetica1_idx` (`id_estetica` ASC) ,
  CONSTRAINT `fk_estetica_has_carro_estetica1`
    FOREIGN KEY (`id_estetica`)
    REFERENCES `AutoClub`.`estetica` (`id_estetica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estetica_has_carro_carro1`
    FOREIGN KEY (`id_carro`)
    REFERENCES `AutoClub`.`carro` (`id_carro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `AutoClub`.`carro_oficina` (
  `id_carroOficina` INT NOT NULL AUTO_INCREMENT,
  `id_carro` INT NOT NULL,
  `id_oficina` INT NOT NULL,
  PRIMARY KEY (`id_carroOficina`, `id_carro`, `id_oficina`),
  INDEX `fk_carro_has_oficina_oficina1_idx` (`id_oficina` ASC) ,
  INDEX `fk_carro_has_oficina_carro1_idx` (`id_carro` ASC) ,
  CONSTRAINT `fk_carro_has_oficina_carro1`
    FOREIGN KEY (`id_carro`)
    REFERENCES `AutoClub`.`carro` (`id_carro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carro_has_oficina_oficina1`
    FOREIGN KEY (`id_oficina`)
    REFERENCES `AutoClub`.`oficina` (`id_oficina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `AutoClub`.`servicos_oficina` (
  `id_servicoOficina` INT NOT NULL AUTO_INCREMENT,
  `id_servicos` INT NOT NULL,
  `id_oficina` INT NOT NULL,
  PRIMARY KEY (`id_servicoOficina`, `id_servicos`, `id_oficina`),
  INDEX `fk_servicos_has_oficina_oficina1_idx` (`id_oficina` ASC) ,
  INDEX `fk_servicos_has_oficina_servicos1_idx` (`id_servicos` ASC) ,
  CONSTRAINT `fk_servicos_has_oficina_servicos1`
    FOREIGN KEY (`id_servicos`)
    REFERENCES `AutoClub`.`servicos` (`id_servicos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicos_has_oficina_oficina1`
    FOREIGN KEY (`id_oficina`)
    REFERENCES `AutoClub`.`oficina` (`id_oficina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW TABLES;

SET sql_safe_updates = 0;

INSERT INTO assinatura(id_assinatura, descricao)
VALUES(default, "Assinante"),
	  (default, "Parceiro");

INSERT INTO adm(id_adm, nome, login, senha, foto, nivel)
VALUES(default, "Luis", "admin", "123","", 0),
	  (default, "Maria", "admin", "456","", 0),
	  (default, "Danilo", "admin", "789","", 0);
      

INSERT INTO usuario(id_usuario, nome, cpf, nomeMaterno, dataNasc, sexo, telefone, logradouro, numero, bairro, cidade, uf, cep, email, senha, nivel, foto, id_assinatura)
VALUES(default, "Matheus Fernandes", "254.987.365-98", "Claudia Fernandes", "1999-03-14", "M", "(21)96352-8754", "Rua A", "456", "Anchieta", "Rio de Janeiro", "RJ", "21547-875", "matheusf@gmail.com", "228675AS", 1, "",1 ),
	  (default, "Gabriela da Silva", "654.982.348-78", "Mônica da Silva", "1991-07-22", "F", "(21)93254-8306", "Rua B", "54", "Pavuna", "Rio de Janeiro", "RJ", "32587-156", "gabidasilva@gmail.com", "61369A!2", 1, "", 1),
	  (default, "Carolina Pereira", "026.874.654-45", "Fátima Pereira", "1989-10-01", "F", "(21)93057-2549", "Rua C", "456", "Bangu", "Rio de Janeiro", "RJ", "24569-785", "carolpereira@gmail.com", "32697PI@", 1, "", 1);


INSERT INTO autopecas(id_autopecas, nome, cnpj, logradouro, numero, bairro, cidade, uf, cep, telefone, email, senha, nivel, foto, id_assinatura)
VALUES(default, "Autopeças Anchieta", "12.648.698/0001-65", "Estrada do Engenho Novo", "116A", "Anchieta", "Rio de Janeiro", "RJ","21620-242", "(21)2455-3232", "autopecasanchieta@gmail.com", "23654KG!", 1, "", 1),
	  (default, "Lupi Autopeças", "35.548.315/3157-02", "Rua dos Topázios", "171", "Rocha Miranda", "Rio de Janeiro", "RJ","21540-020", "(21)2471-0200", "lupiautopecas@gmail.com", "365@KU98", 1, "", 1),
	  (default, "Guigo Autopeças", "74.954.657/1598-74", "Avenida Cipriano Barata", "100", "Anchieta", "Rio de Janeiro", "RJ","21620-190", "(21)3339-7261", "guigoautopecas@gmail.com", "364$KUH8", 1, "", 2);


INSERT INTO estetica(id_estetica, nome, cnpj, logradouro, numero, bairro, cidade, uf, cep, telefone, email, senha, nivel, foto, id_assinatura)
VALUES(default, "Alfa Estética Automotiva", "65.789.024/3054-01", "Rua General Fernando Batalha", "26", "Vila Valqueire", "Rio de Janeiro", "RJ","21330-760", "(21)99108-4065", "alfaesteticaautomotiva@gmail.com", "HGR%#697", 1, "", 2),
	  (default, "Washplus Estética Automotiva", "78.035.794/7896-45", "Rua Marechal Castelo Branco", "90", "Nilópolis", "Rio de Janeiro", "RJ","26521-116", "(21)96492-6023", "washplusesteticaautomotiva@gmail.com", "698HY*$3", 1, "", 1),
	  (default, "Ágape Estética Automotiva", "30.178.258/3489-53", "Avenida Comendador Teles", "Qd30", "São João de Meriti", "Rio de Janeiro", "RJ","25561-162", "(21)98314-2281", "agapeesteticaautomotiva@gmail.com", "KU&98$", 1, "", 1);


INSERT INTO oficina(id_oficina, nome, cnpj, logradouro, numero, bairro, cidade, uf, cep, telefone, email, senha, nivel, foto, id_assinatura)
VALUES(default, "Mecânica Auto Giro", "37.168.741/0697-20", "Rua Embaú", "2200", "Parque Colúmbia", "Rio de Janeiro", "RJ","21535-125", "(00)0000-0000", "mecanicaautogiro@gmail.com", "KIU#$654", 1, "", 2),
	  (default, "Auto Hope", "35.471.234/2201-46", "Estrada Marechal Alencastro", "3709", "Anchieta", "Rio de Janeiro", "RJ","21625-001", "(21)2455-2939", "autohope@gmail.com", "JH@98%HG", 1, "", 2),
	  (default, "Oficina França Car", "20.685.649/3487-52", "Avenida Carolina Pereira Cossick", "44", "São João de Meriti", "Rio de Janeiro", "RJ","25555-070", "(21)98843-9955", "oficinafrancacar@gmail.com", "KUY$@98&", 1, "", 1);


INSERT INTO log(id_log, dataLog, acaoLog, horaLog, id_adm, id_usuario)
VALUES(default,"2024-10-27", "Criou um perfil", "14:45", 1, 3),
	  (default,"2024-10-16", "Editou um perfil", "23:30", 1,2 ),
      (default,"2024-10-02", "Excluiu um perfil", "02:00", 3, 1);


INSERT INTO pecas(id_pecas, nome, preco, id_usuario, id_autopecas)
VALUES(default, "Filtro de Óleo", 140.00, 3, 1),
	  (default, "Radiador", 200.00, 1, 2),
	  (default, "Bateria", 170.00, 2, 3);


INSERT INTO carro(id_carro, placa, marca, modelo, ano, ultimaRevisao, combustivel, motor, id_usuario)
VALUES(default,"JRD1H68", "Chevrolet", "Celta", "2002","2024-10-27", "Gasolina", "1.0",1),
	  (default,"LWU5H73", "Renault", "Kwid", "2023","2024-04-14", "Gasolina", "1.0",3),
	  (default,"EQL0Y67", "Honda", "Civic", "2016","2024-06-05", "Gasolina", "1.0",2);


INSERT INTO servicos(id_servicos, nome, preco, id_usuario)
VALUES(default, "Limpeza de Motor", 120.00,3),
	  (default, "Enceramento Técnico", 100.00,1),
	  (default, "Higienização", 80.00,2);


INSERT INTO servicos_estetica(id_servicoEstetica, id_servicos, id_estetica)
VALUES(default, 1, 3),
	  (default, 3, 2),
	  (default, 2, 1);


INSERT INTO estetica_carro(id_esteticaCarro, id_estetica, id_carro)
VALUES(default, 1, 2),
	  (default, 3, 1),
	  (default, 1, 2);


INSERT INTO carro_oficina(id_carroOficina, id_carro, id_oficina)
VALUES(default, 1, 3),
	  (default, 3, 2),
	  (default, 2, 3);


INSERT INTO servicos_oficina(id_servicoOficina, id_servicos, id_oficina)
VALUES(default, 1, 3),
	  (default, 3, 3),
	  (default, 2, 1);
   

SELECT * FROM assinatura;
SELECT * FROM adm;
SELECT * FROM usuario;
SELECT * FROM autopecas;
SELECT * FROM estetica;
SELECT * FROM oficina;
SELECT * FROM log;
SELECT * FROM pecas;
SELECT * FROM carro;
SELECT * FROM servicos;
SELECT * FROM servicos_estetica;
SELECT * FROM estetica_carro;
SELECT * FROM carro_oficina;
SELECT * FROM servicos_oficina;