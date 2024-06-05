CREATE DATABASE dados_pessoas;

USE dados_pessoas;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(255)
);

CREATE TABLE cursos (
    id_curso INT AUTO_INCREMENT PRIMARY KEY,
    nome_curso VARCHAR(100)
);

CREATE TABLE professores (
    id_professor INT AUTO_INCREMENT PRIMARY KEY,
    nome_professor VARCHAR(100)
);

CREATE TABLE curso_professor (
    id_curso INT,
    id_professor INT,
    FOREIGN KEY (id_curso) REFERENCES cursos(id_curso),
    FOREIGN KEY (id_professor) REFERENCES professores(id_professor),
    PRIMARY KEY (id_curso, id_professor)
);

CREATE TABLE alunos (
    id_aluno INT AUTO_INCREMENT PRIMARY KEY,
    nome_aluno VARCHAR(100)
);

CREATE TABLE matricula (
    id_curso INT,
    id_aluno INT,
    FOREIGN KEY (id_curso) REFERENCES cursos(id_curso),
    FOREIGN KEY (id_aluno) REFERENCES alunos(id_aluno),
    PRIMARY KEY (id_curso, id_aluno)
);

CREATE TABLE periodo (
    id_periodo INT AUTO_INCREMENT PRIMARY KEY,
    nome_periodo VARCHAR(50) NOT NULL,
    id_curso INT,
    FOREIGN KEY (id_curso) REFERENCES cursos(id_curso)
);

INSERT INTO usuarios (nome, email, senha) VALUES 
('Prof. Carlos', 'joao@email.com', 'senha123'),
('Prof. Ana', 'ana@email.com', 'senha456'),
('Prof. Luiz', 'luiz@email.com', 'senha789'),
('Teste', 'teste@email.com', '1');

INSERT INTO cursos (nome_curso) VALUES 
('Matemática'),
('História'),
('Ciências');

INSERT INTO professores (nome_professor) VALUES 
('Prof. Carlos'),
('Prof. Ana'),
('Prof. Luiz');

INSERT INTO curso_professor (id_curso, id_professor) VALUES 
(1, 1), 
(2, 2), 
(3, 3); 


INSERT INTO alunos (nome_aluno) VALUES 
('Maria Oliveira'),
('José Santos'),
('Ana Silva');

INSERT INTO matricula (id_curso, id_aluno) VALUES 
(1, 1), 
(2, 2), 
(3, 3); 

INSERT INTO periodo (nome_periodo, id_curso) VALUES 
('Manhã', 1), 
('Tarde', 2), 
('Noite', 3);