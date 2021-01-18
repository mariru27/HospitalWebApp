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
DROP TABLE TRATAMENT;

CREATE TABLE TRATAMENT(
    idTratament NUMBER(6),
    descriere VARCHAR(500),
    IdDiagnostic NUMBER(6),
    CONSTRAINT pk_idTratament PRIMARY KEY (idTratament),
    CONSTRAINT fk_idDiagnostic FOREIGN KEY (idDiagnostic) REFERENCES DIAGNOSTIC(idDiagnostic)
    ON DELETE CASCADE
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

DROP TABLE PACIENTRETERA;

CREATE TABLE PACIENTRETERA(
    idPacientReteta NUMBER(6),
    idPacient NUMBER(6),
    idReteta NUMBER(6),
    CONSTRAINT pk_idPacientReteta PRIMARY KEY (idPacientReteta),
    CONSTRAINT fk_idPacient FOREIGN KEY(idPacient) REFERENCES PACIENT(idPacient)
    ON DELETE CASCADE,
    CONSTRAINT fk_idReteta FOREIGN KEY(idReteta) REFERENCES RETETA(idReteta)
    ON DELETE CASCADE

);

DROP TABLE MEDICRETETA;

CREATE TABLE MEDICRETETA(
    idMedicReteta NUMBER(6),
    idMedic NUMBER(6),
    idRetetaMedicFK NUMBER(6),
    CONSTRAINT pk_idMedicReteta PRIMARY KEY (idMedicReteta),
    CONSTRAINT fk_idMedic FOREIGN KEY(idMedic) REFERENCES MEDIC(idMedic)
    ON DELETE CASCADE,
    CONSTRAINT fk_idRetetaMedicFK FOREIGN KEY(idRetetaMedicFK) REFERENCES RETETA(idReteta)
    ON DELETE CASCADE
);

CREATE TABLE MEDICAMENTRETETA(
    idMedicamentReteta NUMBER(6),
    idMedicament_reteta NUMBER(6),
    idReteta_medicament NUMBER(6),
    CONSTRAINT pk_idMedicamentReteta PRIMARY KEY (idMedicamentReteta),
    CONSTRAINT fk_idMedicament_reteta FOREIGN KEY(idMedicament_reteta) REFERENCES MEDICAMENT(idMedicament)
    ON DELETE CASCADE,
    CONSTRAINT fk_idReteta_medicament FOREIGN KEY(idReteta_medicament) REFERENCES RETETA(idReteta)
    ON DELETE CASCADE
);


CREATE SEQUENCE seq_medicament INCREMENT BY 1s
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

CREATE SEQUENCE seq_medicamentReteta INCREMENT BY 1
MINVALUE 1 MAXVALUE 123489 NOCYCLE NOCACHE ORDER;

--add values

INSERT INTO MEDICAMENT VALUES(seq_medicament.nextval,'paracetamol',20);
INSERT INTO MEDICAMENT VALUES(seq_medicament.nextval,'nor',400);
INSERT INTO MEDICAMENT VALUES(seq_medicament.nextval,'coldhl',390);


INSERT INTO DIAGNOSTIC VALUES(seq_diagnostic.nextval,'denumireDiagnostic1','tip1');
INSERT INTO DIAGNOSTIC VALUES(seq_diagnostic.nextval,'denumireDiagnostic2','tip2');
INSERT INTO DIAGNOSTIC VALUES(seq_diagnostic.nextval,'denumireDiagnostic3','tip3');

INSERT INTO TRATAMENT VALUES(seq_tratament.nextval,'descrieretratament1',13);
INSERT INTO TRATAMENT VALUES(seq_tratament.nextval,'descrieretratament2',14);
INSERT INTO TRATAMENT VALUES(seq_tratament.nextval,'descriere tratament 3',15);


INSERT INTO MEDIC VALUES(seq_medic.nextval,'nume medic','prenume medic');
INSERT INTO MEDIC VALUES(seq_medic.nextval,'nume medic1','prenume medic1');


INSERT INTO PACIENT VALUES(seq_pacient.nextval,1234567890123,'nume','prenume','tipasigurare');
INSERT INTO PACIENT VALUES(seq_pacient.nextval,1234564342422,'nume1','prenume1','tipasigurare1');
INSERT INTO PACIENT VALUES(seq_pacient.nextval,1234565555555,'nume2','prenume2','tipasigurare2');


INSERT INTO RETETA VALUES(seq_reteta.nextval,'codfiscal1','unitatemedicala1','judet1',123);
INSERT INTO RETETA VALUES(seq_reteta.nextval,'codfiscal2','unitatemedicala2','judet2',1133);
INSERT INTO RETETA VALUES(seq_reteta.nextval,'codfiscal3','unitatemedicala3','judet3',153);
INSERT INTO RETETA VALUES(seq_reteta.nextval,'codfiscal4','unitatemedicala4','judet4',223);
INSERT INTO RETETA VALUES(seq_reteta.nextval,'codfiscal5','unitatemedicala5','judet5',15);


INSERT INTO PACIENTRETERA VALUES(seq_pacientReteta.nextval,11,11);
INSERT INTO PACIENTRETERA VALUES(seq_pacientReteta.nextval,12,13);
INSERT INTO PACIENTRETERA VALUES(seq_pacientReteta.nextval,13,14);
INSERT INTO PACIENTRETERA VALUES(seq_pacientReteta.nextval,11,12);

INSERT INTO MEDICRETETA VALUES(seq_medicReteta.nextval,3,11);
INSERT INTO MEDICRETETA VALUES(seq_medicReteta.nextval,3,12);
INSERT INTO MEDICRETETA VALUES(seq_medicReteta.nextval,3,13);
INSERT INTO MEDICRETETA VALUES(seq_medicReteta.nextval,3,14);
INSERT INTO MEDICRETETA VALUES(seq_medicReteta.nextval,4,15);


INSERT INTO MEDICAMENTRETETA VALUES(seq_medicamentReteta.nextval,13,14);
INSERT INTO MEDICAMENTRETETA VALUES(seq_medicamentReteta.nextval,13,13);
INSERT INTO MEDICAMENTRETETA VALUES(seq_medicamentReteta.nextval,14,14);
INSERT INTO MEDICAMENTRETETA VALUES(seq_medicamentReteta.nextval,14,13);
INSERT INTO MEDICAMENTRETETA VALUES(seq_medicamentReteta.nextval,15,13);
INSERT INTO MEDICAMENTRETETA VALUES(seq_medicamentReteta.nextval,13,15);


DELETE FROM medicament;
select * from TRATAMENT;
select * from RETETA;
select * from PACIENT;
select * from MEDIC;
select * from DIAGNOSTIC;
select * from MEDICAMENT;
select * from MEDICRETETA;


UPDATE TRATAMENT SET DESCRIERE='descriere editata' WHERE IDTRATAMENT = 6; 

DELETE FROM TRATAMENT WHERE IDTRATAMENT=9;




COMMIT 




