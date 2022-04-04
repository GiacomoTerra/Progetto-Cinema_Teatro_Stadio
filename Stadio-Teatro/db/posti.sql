create table posti (
	nome character varying(30) NOT NULL,
	cognome character varying(40) NOT NULL,
	email character varying(50) NOT NULL,
	telefono numeric NOT NULL,
	settore character varying(5) NOT NULL,
	posto character varying(5) NOT NULL,
	vaccino boolean NOT NULL,
	primary key (settore, posto)
);