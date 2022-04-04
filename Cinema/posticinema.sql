
CREATE TABLE public.posticinema
(
    date date NOT NULL,
    "time" time without time zone NOT NULL,
    seats character varying(5) COLLATE pg_catalog."default" NOT NULL,
    codpersona integer NOT NULL,
    cinemaid integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    film character varying COLLATE pg_catalog."default",
    CONSTRAINT posticinema_codpersona_fkey FOREIGN KEY (codpersona)
        REFERENCES public.utente (idpersona) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE public.posticinema
    OWNER to postgres;