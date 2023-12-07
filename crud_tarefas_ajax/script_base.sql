/* TABELA usuários */
CREATE TABLE usuarios ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL, 
  login varchar(15) NOT NULL,
  senha varchar(15) NOT NULL, 
  email varchar(50) NOT NULL,
  CONSTRAINT pk_usuarios PRIMARY KEY(id)
);
ALTER TABLE usuarios ADD CONSTRAINT uk_usuarios UNIQUE KEY (login);


/*Inserts usuarios*/
INSERT INTO usuarios (nome, login, senha, email) VALUES ('Sr. Administrador', 'admin', 'admin', 'admin@ifpr.edu.br');
INSERT INTO usuarios (nome, login, senha, email) VALUES ('Sr. Root', 'root', 'root', 'root@ifpr.edu.br');
INSERT INTO usuarios (nome, login, senha, email) VALUES ('Sra.Juh', 'juh', 'juh', 'juh@ifpr.edu.br');
INSERT INTO usuarios (nome, login, senha, email) VALUES ('Sra. Geovana', 'geo', 'geo', 'geo@ifpr.edu.br');

/* TABELA projetos */
CREATE TABLE projetos ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(30) NOT NULL,
  descProject varchar(30),
  dtInicio date,
  id_usuario int NOT NULL,
  CONSTRAINT pk_projetos PRIMARY KEY(id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios (id)
);


/* neste pensei no caso de o usuário ter o nome do projeto que está gerindo */

/*Insertes de projeto*/
-- ALTER TABLE projetos ADD CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) REFERENCES usuario (id);

INSERT INTO projetos (nome, id_usuario) VALUES ('Organizar a agência semanal', 1);
INSERT INTO projetos (nome, id_usuario) VALUES ('Check emails', 1);
INSERT INTO projetos (nome, id_usuario) VALUES ('Relatórios trabalho voluntário', 1);

INSERT INTO projetos (nome, id_usuario) VALUES ('Estudar PHP', 2);
INSERT INTO projetos (nome, id_usuario) VALUES ('Entender Códigos', 2);
INSERT INTO projetos (nome, id_usuario) VALUES ('Organizar a vida', 2);

INSERT INTO projetos (nome, id_usuario) VALUES ('Pinturas para entregar', 3);
INSERT INTO projetos (nome, id_usuario) VALUES ('Conclusão de curso online', 3);
INSERT INTO projetos (nome, id_usuario) VALUES ('Finalizar trabalhos', 3);

INSERT INTO projetos (nome, id_usuario) VALUES ('Planejamento de viagem', 4);
INSERT INTO projetos (nome, id_usuario) VALUES ('Cuidados pessoais', 4);
INSERT INTO projetos (nome, id_usuario) VALUES ('Pratica de idiomas (inglês)', 4);


/* TABELA tarefas */
CREATE TABLE tarefas ( 
  id int AUTO_INCREMENT NOT NULL, 
  titulo varchar(30) NOT NULL,
  descricao VARCHAR(50) NOT NULL,
  dtCriacao date NOT NULL,
  TrStatus char (1) NOT NULL,
  id_usuario int NOT NULL,
  id_projetos int NOT NULL,
  CONSTRAINT PKtarefas PRIMARY KEY(id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios (id),
  FOREIGN KEY (id_projetos) REFERENCES projetos (id)
);




