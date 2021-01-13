DROP TABLE MEDICAMENT;
DROP TABLE DIAGNOSTIC;

CREATE TABLE MEDICAMENT(
    idMedicament NUMBER(6),
    denumire VARCHAR(255),
    cantitate VARCHAR(255),
    CONSTRAINT pk_idMedicament PRIMARY KEY (idMedicament)
);

CREATE TABLE DIAGNOSTIC(
    IdDiagnostic NUMBER(6),
    denumire VARCHAR(255),
    tip VARCHAR(255),
    CONSTRAINT pk_idDiagnostic PRIMARY KEY (idDiagnostic)
);

CREATE TABLE TRATAMENT(
    idTratament NUMBER(6),
    descriere VARCHAR(500),
    IdDiagnostic NUMBER(6),
    CONSTRAINT pk_idTratament PRIMARY KEY (idTratament),
    CONSTRAINT fk_idDiagnostic FOREIGN KEY (idDiagnostic) REFERENCES DIAGNOSTIC(idDiagnostic)
);

CREATE TABLE RETETA(
    idReteta NUMBER(6),
    codfiscal VARCHAR(255),
	unitatemedicala VARCHAR(255),
	judet VARCHAR(255),
	nr_casa_asig_medic NUMBER(10),
    idMedicament NUMBER(6),
    idTratament NUMBER(6),
    CONSTRAINT pk_idReteta PRIMARY KEY (idReteta),
    CONSTRAINT fk_idMedicament FOREIGN KEY (idMedicament) REFERENCES MEDICAMENT(idMedicament),
    CONSTRAINT fk_idTratament FOREIGN KEY (idTratament) REFERENCES TRATAMENT(idTratament)
);


--need to create tables

CREATE TABLE TRATAMENT(
    idTratament NUMBER(6) PRIMARY KEY,
    descriere VARCHAR(500),
    CONSTRAINT FK_Reteta FOREIGN KEY (idDiagnostic),
    REFERENCES DIAGNOSTIC(idDiagnostic)
);

CREATE TABLE MEDIC(
    idMedic NUMBER(6) PRIMARY KEY,
    nume VARCHAR(255),
    prenume VARCHAR(255),
    CONSTRAINT FK_Reteta FOREIGN KEY (idReteta),
    REFERENCES RETETA(idReteta)
);

CREATE TABLE PACIENT(
    cnp NUMBER(13) PRIMARY KEY,
    nume VARCHAR(255),
    prenume VARCHAR(255),
    tip_asigurare VARCHAR(255),
    CONSTRAINT FK_Reteta FOREIGN KEY (idReteta),
    REFERENCES RETETA(idReteta)
);

CREATE TABLE RETETA(
    idReteta NUMBER(6),
    codfiscal VARCHAR(255),
	unitatemedicala VARCHAR(255),
	judet VARCHAR(255),
	nr_casa_asig_medic NUMBER(10),
    CONSTRAINT FK_Medicament FOREIGN KEY (idMedicament),
    REFERENCES MEDICAMENT(idMedicament)
    CONSTRAINT FK_Tratament FOREIGN KEY (idTratament),
    REFERENCES TRATAMENT(idTratament)
);


