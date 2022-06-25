CREATE TABLE Empregado (
    idEmpregado INT PRIMARY KEY AUTO_INCREMENT,
    nomeEmpregado CHAR(200),
	tipoEmpregado VARCHAR(200),
    empregadoDepto INT,
    empregadoProjeto INT,
    FOREIGN KEY (empregadoProjeto) REFERENCES Projeto (idProjeto)
    FOREIGN KEY (empregadoDepto) REFERENCES Departamento (idDepto));

CREATE TABLE Departamento (
    idDepto INT PRIMARY KEY AUTO_INCREMENT,
    nomeDepto CHAR(200));

CREATE TABLE Projeto (
    nomeProjeto CHAR(200),
    dataProjeto DATE,
    idProjeto INT PRIMARY KEY AUTO_INCREMENT);