CREATE TABLE public.utente
(
    nome character varying(30) COLLATE pg_catalog."default" NOT NULL,
    cognome character varying(40) COLLATE pg_catalog."default" NOT NULL,
    email character varying(50) COLLATE pg_catalog."default" NOT NULL,
    telefono numeric NOT NULL,
    vaccino boolean NOT NULL,
    password character varying COLLATE pg_catalog."default",
    idpersona integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    citta character varying COLLATE pg_catalog."default",
    stato character varying COLLATE pg_catalog."default",
    indirizzo character varying COLLATE pg_catalog."default",
    cap character varying COLLATE pg_catalog."default",
    CONSTRAINT utente_pkey PRIMARY KEY (idpersona)
)

TABLESPACE pg_default;

ALTER TABLE public.utente
    OWNER to postgres;