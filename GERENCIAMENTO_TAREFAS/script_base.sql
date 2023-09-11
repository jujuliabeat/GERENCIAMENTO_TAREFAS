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
  TrStatus char (1)NOT NULL  /* Pensei em P = pendente, A = Andamento e C = Conclusão*/
);

/* TABELA projetos */
CREATE TABLE projetos ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(30) NOT NULL,
  descProject VARCHAR(50) NOT NULL,
  dtInicio date NOT NULL,
);

/* TABELA usuários */
CREATE TABLE usuario (
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(40) NOT NULL, 
  email varchar(50) NOT NULL,
  senhar varchar(10) NOT NULL, 
);

ALTER TABLE projetos ADD CONSTRAINT fk_tarefas FOREIGN KEY (id_tarefas) REFERENCES tarefas (id);

ALTER TABLE usuario ADD CONSTRAINT fk_projetos FOREIGN KEY (id_projetos) REFERENCES projetos (id); 
/* neste pensei no caso de o usuário ter o nome do projeto que está gerindo */

