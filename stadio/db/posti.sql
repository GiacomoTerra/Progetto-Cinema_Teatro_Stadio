
CREATE TABLE public.posti
(
    settore character varying(5) COLLATE pg_catalog."default" NOT NULL,
    posto character varying(5) COLLATE pg_catalog."default" NOT NULL,
    codpersona integer NOT NULL,
    CONSTRAINT posti_codpersona_fkey FOREIGN KEY (codpersona)
        REFERENCES public.utente (idpersona) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE public.posti
    OWNER to postgres;