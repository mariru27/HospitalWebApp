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


CREATE TABLE MEDIC(
    idMedic NUMBER(6),
    nume VARCHAR(255),
    prenume VARCHAR(255),
    idReteta NUMBER(6),
    CONSTRAINT pk_idMedic PRIMARY KEY (idMedic),
    CONSTRAINT fk_idReteta FOREIGN KEY (idReteta) REFERENCES RETETA(idReteta)
);

CREATE TABLE PACIENT(
    cnp NUMBER(13),
    nume VARCHAR(255),
    prenume VARCHAR(255),
    tip_asigurare VARCHAR(255),
    idRetetaPacient NUMBER(6),
    CONSTRAINT pk_cnp PRIMARY KEY(cnp),
    CONSTRAINT fk_idRetetaPacient FOREIGN KEY(idRetetaPacient) REFERENCES RETETA(idReteta)
);
