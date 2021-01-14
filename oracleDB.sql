CREATE TABLE TESTTT(
 id NUMBER(2) PRIMARY KEY
);
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

DROP TABLE RETETA;

select * from tratament;


CREATE TABLE RETETA(
    idReteta NUMBER(6),
    codfiscal VARCHAR(255),
	unitatemedicala VARCHAR(255),
	judet VARCHAR(255),
	nr_casa_asig_medic NUMBER(10),
    CONSTRAINT pk_idReteta PRIMARY KEY (idReteta)
);

DROP TABLE MEDIC;

CREATE TABLE MEDIC(
    idMedic NUMBER(6),
    nume VARCHAR(255),
    prenume VARCHAR(255),
    CONSTRAINT pk_idMedic PRIMARY KEY (idMedic)
);

DROP TABLE PACIENT;

CREATE TABLE PACIENT(
    idPacient NUMBER(6),
    CONSTRAINT pk_idPacient PRIMARY KEY (idPacient),
    cnp NUMBER(13),
    nume VARCHAR(255),
    prenume VARCHAR(255),
    tip_asigurare VARCHAR(255)
);

--add tables

CREATE TABLE PACIENTRETERA(
    idPacientReteta NUMBER(6),
    idPacient NUMBER(6),
    idReteta NUMBER(6),
    CONSTRAINT pk_idPacientReteta PRIMARY KEY (idPacientReteta),
    CONSTRAINT fk_idPacient FOREIGN KEY(idPacient) REFERENCES PACIENT(idPacient),
    CONSTRAINT fk_idReteta FOREIGN KEY(idReteta) REFERENCES RETETA(idReteta)
);

CREATE TABLE MEDICRETETA(
    idMedicReteta NUMBER(6),
    idMedic NUMBER(6),
    idRetetaMedicFK NUMBER(6),
    CONSTRAINT pk_idMedicReteta PRIMARY KEY (idMedicReteta),
    CONSTRAINT fk_idMedic FOREIGN KEY(idMedic) REFERENCES MEDIC(idMedic),
    CONSTRAINT fk_idRetetaMedicFK FOREIGN KEY(idRetetaMedicFK) REFERENCES RETETA(idReteta)
);


CREATE SEQUENCE seq_medicament INCREMENT BY 1
MINVALUE 1 MAXVALUE 123489 NOCYCLE NOCACHE ORDER;

--DELETE FROM MEDICAMENT;

CREATE SEQUENCE seq_diagnostic INCREMENT BY 1
MINVALUE 1 MAXVALUE 123489 NOCYCLE NOCACHE ORDER;

CREATE SEQUENCE seq_tratament INCREMENT BY 1
MINVALUE 1 MAXVALUE 123489 NOCYCLE NOCACHE ORDER;


CREATE SEQUENCE seq_reteta INCREMENT BY 1
MINVALUE 1 MAXVALUE 123489 NOCYCLE NOCACHE ORDER;

CREATE SEQUENCE seq_medic INCREMENT BY 1
MINVALUE 1 MAXVALUE 123489 NOCYCLE NOCACHE ORDER;

CREATE SEQUENCE seq_pacient INCREMENT BY 1
MINVALUE 1 MAXVALUE 123489 NOCYCLE NOCACHE ORDER;

CREATE SEQUENCE seq_pacientReteta INCREMENT BY 1
MINVALUE 1 MAXVALUE 123489 NOCYCLE NOCACHE ORDER;

CREATE SEQUENCE seq_medicReteta INCREMENT BY 1
MINVALUE 1 MAXVALUE 123489 NOCYCLE NOCACHE ORDER;

--add values

INSERT INTO MEDICAMENT VALUES(seq_medicament.nextval,'paracetamol',20);
INSERT INTO MEDICAMENT VALUES(seq_medicament.nextval,'nor',400);
INSERT INTO MEDICAMENT VALUES(seq_medicament.nextval,'coldhl',390);


INSERT INTO DIAGNOSTIC VALUES(seq_diagnostic.nextval,'denumireDiagnostic1','tip1');
INSERT INTO DIAGNOSTIC VALUES(seq_diagnostic.nextval,'denumireDiagnostic2','tip2');
INSERT INTO DIAGNOSTIC VALUES(seq_diagnostic.nextval,'denumireDiagnostic3','tip3');

INSERT INTO TRATAMENT VALUES(seq_tratament.nextval,'descrieretratament1',6);
INSERT INTO TRATAMENT VALUES(seq_tratament.nextval,'descrieretratament2',6);
INSERT INTO TRATAMENT VALUES(seq_tratament.nextval,'descriere tratament 3',7);




INSERT INTO RETETA VALUES(seq_reteta.nextval,'codfiscal1','unitatemedicala1','judet1',123,4,3);
INSERT INTO RETETA VALUES(seq_reteta.nextval,'codfiscal2','unitatemedicala2','judet2',1133,4,3);
INSERT INTO RETETA VALUES(seq_reteta.nextval,'codfiscal3','unitatemedicala3','judet3',153,4,3);
INSERT INTO RETETA VALUES(seq_reteta.nextval,'codfiscal4','unitatemedicala4','judet4',223,4,3);
INSERT INTO RETETA VALUES(seq_reteta.nextval,'codfiscal5','unitatemedicala5','judet5',15,4,3);


DELETE FROM MEDICAMENT;
select * from TRATAMENT;
select * from MEDICAMENT;

