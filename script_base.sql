/*
Tabela de Tarefas:
        Armazena informações sobre as tarefas, como título, 
        descrição, data de criação, data de conclusão prevista, 
        status (pendente, em andamento, concluída), etc.

    Tabela de Projetos:
        Permite aos usuários organizar tarefas em projetos. 
        Cada projeto pode ter um nome, descrição e data de início.

    Tabela de Usuários:
        Contém informações sobre os usuários do sistema,
        incluindo nome, e-mail, senha, etc.
*/

/* TABELA tarefas */
CREATE TABLE tarefas ( 
  id int AUTO_INCREMENT NOT NULL, 
  titulo varchar(30) NOT NULL,
  descricao VARCHAR(50) NOT NULL,
  dtCriacao date NOT NULL,
  TrStatus char (1)NOT NULL,  /* Pensei em P = pendente, A = Andamento e C = Conclusão*/
  id_projeto int not null,
  id_usuario int not null,
  CONSTRAINT PKtarefas PRIMARY KEY(id)
);

/* TABELA projetos */
CREATE TABLE projetos ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(30) NOT NULL,
  descProject VARCHAR(50) NOT NULL,
  dtInicio date NOT NULL,
  CONSTRAINT PKprojetos PRIMARY KEY(id)
);

/* TABELA usuários */
CREATE TABLE usuarios (
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(40) NOT NULL, 
  email varchar(50) NOT NULL,
  senhar varchar(10) NOT NULL,
  CONSTRAINT PKusuario PRIMARY KEY(id)
);

ALTER TABLE tarefas ADD CONSTRAINT fk_projetos FOREIGN KEY (id_projeto) REFERENCES projetos (id);

ALTER TABLE tarefas ADD CONSTRAINT fk_usuarios FOREIGN KEY (id_usuario) REFERENCES usuarios (id); 
/* neste pensei no caso de o usuário ter o nome do projeto que está gerindo */

/*Insertes de projeto*/
INSERT INTO projetos (nome, descProject, dtInicio) VALUES ('PROJETO1', 'DESCPROJETO1', '20230912');

/*Insertes de usuario*/
INSERT INTO usuarios (nome, email, senhar) VALUES ('ju', 'juju123@gmail.com', '12345');

