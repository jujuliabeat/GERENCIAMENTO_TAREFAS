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

/* TABELA usuários */
CREATE TABLE usuarios ( 
  id int AUTO_INCREMENT, 
  nome varchar(70) NOT NULL, 
  login varchar(15) NOT NULL,
  senha varchar(15) NOT NULL, 
  email varchar(50) NOT NULL,
  PRIMARY KEY (id) 
);
ALTER TABLE usuarios ADD CONSTRAINT uk_usuarios UNIQUE KEY (login);


/*Inserts usuarios*/
INSERT INTO usuarios (nome, login, senha) VALUES ('Sr. Administrador', 'admin', 'admin');
INSERT INTO usuarios (nome, login, senha) VALUES ('Sr. Root', 'root', 'root');
INSERT INTO usuarios (nome, login, senha) VALUES ('Sra.Juh', 'juh', 'juh');
INSERT INTO usuarios (nome, login, senha) VALUES ('Sra. Geovana', 'geo', 'geo');

/* TABELA projetos */
CREATE TABLE projetos ( 
  id int AUTO_INCREMENT NOT NULL, 
  codigo varchar(3) NOT NULL, /* Abreviatura de 3 letras*/
  nome varchar(30) NOT NULL,
  descProject varchar(30) NOT NULL,
  dtInicio date NOT NULL,
  CONSTRAINT PKprojetos PRIMARY KEY(id),
  id_usuario int not null
);


/* neste pensei no caso de o usuário ter o nome do projeto que está gerindo */

/*Insertes de projeto*/
-- ALTER TABLE projetos ADD CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) REFERENCES usuario (id);

INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('OAS', 'Organizar a agência semanal', 1);
INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('CKE', 'Check emails', 1);
INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('RTV', 'Relatórios trabalho voluntário', 1);

INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('EPH', 'Estudar PHP', 2);
INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('ECS', 'Entender Códigos', 2);
INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('OAV', 'Organizar a vida', 2);

INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('ART', 'Pinturas para entregar', 3);
INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('CCO', 'Conclusão de curso online', 3);
INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('FTS', 'Finalizar trabalhos', 3);

INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('PDV', 'Planejamento de viagem', 4);
INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('CPS', 'Cuidados pessoais', 4);
INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('PII', 'Pratica de idiomas (inglês)', 4);


-- -- Obtém o ID do usuário recém-inserido
-- SET @id_usuario = LAST_INSERT_ID();

-- -- Permite que o novo usuário insira um projeto imediatamente
-- INSERT INTO projetos (codigo, nome, id_usuario) VALUES ('', '', @id_usuario);

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

ALTER TABLE tarefas ADD CONSTRAINT fk_projetos FOREIGN KEY (id_projeto) REFERENCES projetos (id);

ALTER TABLE tarefas ADD CONSTRAINT fk_usuarios FOREIGN KEY (id_usuario) REFERENCES usuarios (id); 



