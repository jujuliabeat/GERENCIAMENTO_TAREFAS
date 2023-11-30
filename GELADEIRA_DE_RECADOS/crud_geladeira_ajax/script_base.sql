-- Cadastro de Usuários:

-- Tabela para armazenar informações dos usuários, como nome, e-mail, senha, etc.
-- Cadastro de Recados:

-- Tabela para armazenar os recados, como descrito anteriormente, com campos para o conteúdo, cor, data de criação e data de expiração.
-- Relacionamento entre Usuários e Recados:

-- Se mais de um usuário estiver usando a aplicação, você pode ter uma tabela de associação entre usuários e recados para registrar quem criou ou está associado a cada recado.
-- Categorias ou Etiquetas:

-- Campo adicional na tabela de recados para categorizar ou etiquetar os recados. Isso pode ajudar os usuários a organizar e filtrar suas atividades.
-- Status de Leitura:

-- Permita que os usuários ordenem ou filtrem seus recados com base em diferentes critérios, como data de criação, data de expiração ou categoria.
-- Edição e Exclusão de Recados:

-- Funcionalidades para permitir que os usuários editem ou removam recados conforme necessário.


/* TABELA usuários */
-- TABELA usuários
CREATE TABLE usuarios ( 
  id int AUTO_INCREMENT, 
  nome varchar(70) NOT NULL, 
  login varchar(15) NOT NULL,
  senha varchar(15) NOT NULL, 
  email varchar(50),
  CONSTRAINT PKusuarios PRIMARY KEY (id) 
);

ALTER TABLE usuarios ADD CONSTRAINT uk_usuarios UNIQUE KEY (login);

-- TABELA Tarefas
CREATE TABLE Tarefas (
    IDTarefa INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    IDUsuario INT,
    categoria VARCHAR(50) NOT NULL,
    nomeTarefa VARCHAR(50) NOT NULL,
    Descr TEXT NOT NULL,
    FOREIGN KEY (IDUsuario) REFERENCES usuarios (id)
);

-- Inserts tarefas
INSERT INTO Tarefas (categoria) VALUES ('Trabalhos para Casa');
INSERT INTO Tarefas (categoria) VALUES ('Trabalhos Escolares');
INSERT INTO Tarefas (categoria) VALUES ('Trabalhos Diversos');
INSERT INTO Tarefas (categoria) VALUES ('Exercícios Físicos');

-- TABELA Recados
CREATE TABLE Recados (
   id int AUTO_INCREMENT NOT NULL,
   Cor VARCHAR(20) NOT NULL,
   DataCriacao DATETIME NOT NULL,
   DataExpiracao DATETIME NOT NULL,
   IDTarefa INT,
   IDUsuario INT,
   CONSTRAINT PKrecados PRIMARY KEY (id),
   FOREIGN KEY (IDTarefa) REFERENCES Tarefas (IDTarefa),
   FOREIGN KEY (IDUsuario) REFERENCES usuarios (id)
);

-- Inserts usuarios
INSERT INTO usuarios (nome, login, senha, email) VALUES ('Sr. Administrador', 'admin', 'admin', 'admin@example.com');
INSERT INTO usuarios (nome, login, senha, email) VALUES ('Sr. Root', 'root', 'root', 'root@example.com');
INSERT INTO usuarios (nome, login, senha, email) VALUES ('Sra.Juh', 'juh', 'juh', 'juh@example.com');
INSERT INTO usuarios (nome, login, senha, email) VALUES ('Sra. Geovana', 'geo', 'geo', 'geo@example.com');

-- TABELA RecadosTarefas
CREATE TABLE RecadosTarefas (
    IDRecadoTarefa INT PRIMARY KEY AUTO_INCREMENT,
    IDRecado INT,
    IDTarefa INT,
    FOREIGN KEY (IDRecado) REFERENCES Recados(ID),
    FOREIGN KEY (IDTarefa) REFERENCES Tarefas(IDTarefa)
);
