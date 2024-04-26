DROP DATABASE SoftwareSalud_DB;
CREATE DATABASE SoftwareSalud_DB;
USE SoftwareSalud_DB;

CREATE TABLE Paciente(
	ID_Paciente int primary key NOT NULL,
	Nombre longtext NOT NULL,
    Fecha_Nacimiento date NOT NULL,
	Genero varchar(15) NOT NULL,
	Direccion varchar(90) NOT NULL,
    Telefono varchar (15) NOT NULL
);
CREATE TABLE Medico(
	ID_Medico int primary key NOT NULL,
	Nombre longtext NOT NULL,
	Especialidad varchar(30) NOT NULL,
    Telefono varchar (15) NOT NULL
);

CREATE TABLE ConsultasClinicas(
	Cod_Consulta int primary key auto_increment NOT NULL,
    ID_Paciente int NOT NULL,
    ID_Medico int NOT NULL,
	Fecha datetime NOT NULL,
	DiagnosticoPaciente longtext NULL,
    ResultadosConsulta longtext NULL,
	constraint FK_ID_PacienteCC foreign key(ID_Paciente) references Paciente(ID_Paciente),
    constraint FK_ID_MedicoCC foreign key(ID_Medico) references Medico(ID_Medico)
);

CREATE TABLE RecetasClinicas(
	Cod_Receta int primary key auto_increment NOT NULL,
    ID_Paciente int NOT NULL,
    ID_Medico int NOT NULL,
	Fecha datetime NOT NULL,
	Medicamento varchar(60) NOT NULL,
    DetalleMedicamento longtext NOT NULL,
	constraint FK_ID_PacienteRC foreign key(ID_Paciente) references Paciente(ID_Paciente),
    constraint FK_ID_MedicoRC foreign key(ID_Medico) references Medico(ID_Medico)
);

CREATE TABLE HistorialMedico(
	ID_HistoriaClinica int primary key auto_increment NOT NULL,
    ID_Paciente int NOT NULL,
	CondicionMedica longtext NULL,
    ResultadoMedico longtext NULL,
	constraint FK_ID_PacienteHM foreign key(ID_Paciente) references Paciente(ID_Paciente)
);

-- Insertar datos de prueba para la tabla de pacientes
INSERT INTO paciente () VALUES (123456789, 'Juan Pérez', '1990-05-15', 'Masculino', 'Carrera 10 #25-35, Bogotá', '3101234567');
INSERT INTO paciente () VALUES (987654321, 'María González', '1985-10-20', 'Femenino', 'Calle 5 #15-20, Medellín', '3209876543');
INSERT INTO paciente () VALUES (456789123, 'Carlos Ramírez', '1978-03-08', 'Masculino', 'Carrera 7 #30-45, Cali', '3006543210');
INSERT INTO paciente () VALUES (789123456, 'Luz Díaz', '1995-12-12', 'Femenino', 'Avenida 20 #10-15, Barranquilla', '3108765432');
INSERT INTO paciente () VALUES (321654987, 'Jorge López', '1982-07-30', 'Masculino', 'Carrera 15 #8-25, Cartagena', '3102345678');
INSERT INTO paciente () VALUES (654987321, 'Ana Martínez', '1993-01-05', 'Femenino', 'Calle 25 #40-30, Pereira', '3207654321');
INSERT INTO paciente () VALUES (852963741, 'Andrés Silva', '1989-09-18', 'Masculino', 'Carrera 12 #18-10, Manizales', '3105432167');
INSERT INTO paciente () VALUES (369852147, 'Sofía Gómez', '1976-06-25', 'Femenino', 'Calle 30 #5-12, Bucaramanga', '3008765432');
INSERT INTO paciente () VALUES (147258369, 'Pedro Rojas', '1998-11-03', 'Masculino', 'Avenida 10 #12-5, Ibague', '3109876543');
INSERT INTO paciente () VALUES (258369147, 'Laura Sánchez', '1987-04-28', 'Femenino', 'Carrera 25 #15-8, Cúcuta', '3206543210');

-- Insertar datos de prueba para la tabla de médicos
INSERT INTO medico () VALUES (123456789, 'Carlos Rodríguez', 'Cardiología', '3101234567');
INSERT INTO medico () VALUES (987654321, 'María López', 'Pediatría', '3209876543');
INSERT INTO medico () VALUES (456789123, 'Juan García', 'Cirugía General', '3006543210');
INSERT INTO medico () VALUES (789123456, 'Luz Martínez', 'Ginecología', '3108765432');
INSERT INTO medico () VALUES (321654987, 'Andrés Sánchez', 'Dermatología', '3102345678');
INSERT INTO medico () VALUES (654987321, 'Ana Ramírez', 'Oftalmología', '3207654321');
INSERT INTO medico () VALUES (852963741, 'Sofía González', 'Neurología', '3105432167');

-- Insertar datos de prueba para la tabla de ConsultasClinicas
INSERT INTO ConsultasClinicas() VALUES (NULL, 987654321,789123456,'2024-02-15 15:40','Infección Cutanea','Mejorias al usar la crema CuraBuena');
INSERT INTO ConsultasClinicas() VALUES (NULL, 147258369,456789123,'2024-04-02 15:40',NULL,NULL);

-- Insertar datos de prueba para la tabla de HistorialMedico
INSERT INTO HistorialMedico() VALUES(NULL, 456789123,'Hipertenso','Tensión en niveles estables');
INSERT INTO HistorialMedico() VALUES(NULL, 456789123,'Hipertenso','Bajar las comidas grasas por gran probabilidad de obstrucción en alas arterias');
INSERT INTO HistorialMedico() VALUES(NULL, 456789123,'Hipertenso','Niveles estables de azucares y tensión baja');
INSERT INTO HistorialMedico() VALUES(NULL, 369852147,'Saludable','Sin novedades fisicas, se recomienda realizar examenes de laboratorio');

SELECT * FROM PACIENTE;
SELECT * FROM MEDICO;
SELECT * FROM HistorialMedico;


select HM.*,P.Nombre AS paciente from HistorialMedico HM INNER JOIN Paciente P ON HM.ID_Paciente=P.ID_Paciente
where HM.CondicionMedica<>'' AND HM.ResultadoMedico<>'';