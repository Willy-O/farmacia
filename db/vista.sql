--
-- PostgreSQL database dump
--

-- Dumped from database version 10.9
-- Dumped by pg_dump version 10.9

-- Started on 2019-11-08 22:53:05

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

CREATE TABLE public.anaquel (
    id_medicamento integer,
    id_factura integer,
    fecha_vencimiento date,
    precio_facturado integer,
    cantidad_medicamento integer,
    id integer NOT NULL
);


ALTER TABLE public.anaquel OWNER TO postgres;

CREATE SEQUENCE public.anaquel_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.anaquel_id_seq OWNER TO postgres;

ALTER SEQUENCE public.anaquel_id_seq OWNED BY public.anaquel.id;

CREATE TABLE public.asegurado (
    nombre character varying(30) NOT NULL,
    apellido character varying(30) NOT NULL,
    cedula numeric(11,0) NOT NULL,
    cant_familiares numeric(1,0),
    direccion text,
    nom_ente character varying(10),
    statu boolean NOT NULL,
    id_asegurado integer,
    numero_celular numeric(13,0),
    numero_habitacion numeric(13,0)
);


ALTER TABLE public.asegurado OWNER TO postgres;

CREATE TABLE public.despacho (
    fecha_despacho date NOT NULL,
    ced_ase_despacho numeric(10,0) NOT NULL,
    cantidad_despacho numeric(10,0),
    comentario text,
    id_medicamento_inv integer,
    id integer NOT NULL,
    id_med_despacho integer
);


ALTER TABLE public.despacho OWNER TO postgres;

CREATE SEQUENCE public.despacho_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.despacho_id_seq OWNER TO postgres;

ALTER SEQUENCE public.despacho_id_seq OWNED BY public.despacho.id;

CREATE TABLE public.entes (
    nom_ente character varying(50) NOT NULL,
    rif_ente character varying(20),
    id integer NOT NULL
);


ALTER TABLE public.entes OWNER TO postgres;

CREATE SEQUENCE public.entes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.entes_id_seq OWNER TO postgres;

ALTER SEQUENCE public.entes_id_seq OWNED BY public.entes.id;

CREATE TABLE public.factura (
    fecha_factura date NOT NULL,
    proveedor character varying(30) NOT NULL,
    comentario text,
    precio_total_factura numeric,
    num_factura character varying(255),
    id integer NOT NULL,
    id_usuario integer
);


ALTER TABLE public.factura OWNER TO postgres;

CREATE SEQUENCE public.factura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.factura_id_seq OWNER TO postgres;

ALTER SEQUENCE public.factura_id_seq OWNED BY public.factura.id;

CREATE TABLE public.familia (
    nombre character varying(30) NOT NULL,
    apellido character varying(30) NOT NULL,
    cedula numeric(10,0) NOT NULL,
    parentesco character varying(15) NOT NULL,
    direccion text,
    id_familia integer NOT NULL,
    ced_ase_familia numeric(10,0) NOT NULL
);


ALTER TABLE public.familia OWNER TO postgres;

CREATE TABLE public.inventario (
    cantidad numeric(10,0) NOT NULL,
    precio_unitario numeric,
    id integer NOT NULL,
    id_medicamento integer
);


ALTER TABLE public.inventario OWNER TO postgres;

CREATE SEQUENCE public.inventario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inventario_id_seq OWNER TO postgres;

ALTER SEQUENCE public.inventario_id_seq OWNED BY public.inventario.id;

CREATE TABLE public.medicamento (
    nombre character varying(50) NOT NULL,
    concentracion numeric(5,0) NOT NULL,
    informacion text,
    forma_farmaceutica character varying(30) NOT NULL,
    unidosis boolean NOT NULL,
    dosis character varying(25),
    codigo_med character varying(25),
    id integer NOT NULL
);


ALTER TABLE public.medicamento OWNER TO postgres;

CREATE SEQUENCE public.medicamento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.medicamento_id_seq OWNER TO postgres;

ALTER SEQUENCE public.medicamento_id_seq OWNED BY public.medicamento.id;

CREATE TABLE public.patologia (
    id_patologia character varying(10) NOT NULL,
    tipo_enfermedad character varying(30) NOT NULL,
    id_med_patologia character varying(10),
    nom_enfermedad character varying(50) NOT NULL
);


ALTER TABLE public.patologia OWNER TO postgres;

CREATE TABLE public.usuario (
    nombre character varying(30) NOT NULL,
    apellido character varying(30) NOT NULL,
    cargo character varying(15) NOT NULL,
    nom_user character varying(30) NOT NULL,
    contrasenna character varying(50) NOT NULL,
    cedula integer NOT NULL,
    id integer NOT NULL
);


ALTER TABLE public.usuario OWNER TO postgres;

CREATE SEQUENCE public.usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_seq OWNER TO postgres;

ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;

ALTER TABLE ONLY public.anaquel ALTER COLUMN id SET DEFAULT nextval('public.anaquel_id_seq'::regclass);

ALTER TABLE ONLY public.despacho ALTER COLUMN id SET DEFAULT nextval('public.despacho_id_seq'::regclass);

ALTER TABLE ONLY public.entes ALTER COLUMN id SET DEFAULT nextval('public.entes_id_seq'::regclass);

ALTER TABLE ONLY public.factura ALTER COLUMN id SET DEFAULT nextval('public.factura_id_seq'::regclass);

ALTER TABLE ONLY public.inventario ALTER COLUMN id SET DEFAULT nextval('public.inventario_id_seq'::regclass);

ALTER TABLE ONLY public.medicamento ALTER COLUMN id SET DEFAULT nextval('public.medicamento_id_seq'::regclass);


ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);

ALTER TABLE ONLY public.anaquel
    ADD CONSTRAINT anaquel_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.asegurado
    ADD CONSTRAINT cedula PRIMARY KEY (cedula);

ALTER TABLE ONLY public.familia
    ADD CONSTRAINT cedula_fam PRIMARY KEY (cedula);

ALTER TABLE ONLY public.despacho
    ADD CONSTRAINT despacho_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.entes
    ADD CONSTRAINT entes_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.factura
    ADD CONSTRAINT factura_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.inventario
    ADD CONSTRAINT inventario_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.medicamento
    ADD CONSTRAINT medicamento_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);

CREATE INDEX fki_ced_ase_despacho ON public.despacho USING btree (ced_ase_despacho);

CREATE INDEX fki_ced_ase_familia ON public.familia USING btree (ced_ase_familia);

CREATE INDEX fki_entes_fk_ase ON public.asegurado USING btree (nom_ente);

CREATE INDEX fki_id_factura ON public.anaquel USING btree (id_factura);

CREATE INDEX fki_id_med_despacho ON public.despacho USING btree (id_med_despacho);

CREATE INDEX fki_id_medicamento ON public.anaquel USING btree (id_medicamento);

ALTER TABLE ONLY public.despacho
    ADD CONSTRAINT ced_ase_despacho FOREIGN KEY (ced_ase_despacho) REFERENCES public.asegurado(cedula) NOT VALID;

ALTER TABLE ONLY public.familia
    ADD CONSTRAINT ced_ase_familia FOREIGN KEY (ced_ase_familia) REFERENCES public.asegurado(cedula) NOT VALID;

ALTER TABLE ONLY public.anaquel
    ADD CONSTRAINT id_factura FOREIGN KEY (id_factura) REFERENCES public.factura(id) NOT VALID;

ALTER TABLE ONLY public.despacho
    ADD CONSTRAINT id_med_despacho FOREIGN KEY (id_med_despacho) REFERENCES public.medicamento(id) NOT VALID;

ALTER TABLE ONLY public.inventario
    ADD CONSTRAINT id_medicamento FOREIGN KEY (id_medicamento) REFERENCES public.medicamento(id) NOT VALID;

ALTER TABLE ONLY public.anaquel
    ADD CONSTRAINT id_medicamento FOREIGN KEY (id_medicamento) REFERENCES public.medicamento(id) NOT VALID;

ALTER TABLE ONLY public.despacho
    ADD CONSTRAINT id_medicamento_inv FOREIGN KEY (id_medicamento_inv) REFERENCES public.inventario(id) NOT VALID;

ALTER TABLE ONLY public.factura
    ADD CONSTRAINT id_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuario(id) NOT VALID;