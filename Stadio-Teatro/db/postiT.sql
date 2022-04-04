CREATE TABLE public.postiT
(
    posto character varying(5) COLLATE pg_catalog."default" NOT NULL,
	email character varying(50) COLLATE pg_catalog."default" NOT NULL,
	password character varying COLLATE pg_catalog."default",
    codpersona character varying COLLATE pg_catalog."default",
	PRIMARY KEY (giorno, orario, posto),
    CONSTRAINT posti_codpersona_fkey FOREIGN KEY (codpersona)
        REFERENCES public.utente (idpersona) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE public.posti
    OWNER to postgres;