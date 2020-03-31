--
-- PostgreSQL database dump
--

-- Dumped from database version 10.9
-- Dumped by pg_dump version 10.9

-- Started on 2019-11-06 20:49:17

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

--
-- TOC entry 1 (class 3079 OID 12924)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2885 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 202 (class 1259 OID 16772)
-- Name: asegurado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.asegurado (
    nombre character varying(30) NOT NULL,
    apellido character varying(30) NOT NULL,
    cedula numeric(11,0) NOT NULL,
    cant_familiares numeric(1,0),
    direccion text,
    id_ent_asegurado character varying(10),
    statu boolean NOT NULL,
    id_asegurado integer,
    numero_celular numeric(13,0),
    numero_habitacion numeric(13,0)
);


ALTER TABLE public.asegurado OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 16754)
-- Name: despacho; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.despacho (
    id_despacho character varying(10) NOT NULL,
    fecha_despacho date NOT NULL,
    id_inv_despacho character varying(10) NOT NULL,
    ced_ase_despacho numeric(10,0) NOT NULL,
    cantidad_despacho numeric(10,0),
    comentario text
);


ALTER TABLE public.despacho OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16766)
-- Name: entes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.entes (
    id_ente character varying(10) NOT NULL,
    nom_ente character varying(50) NOT NULL,
    rif_ente character varying(20)
);


ALTER TABLE public.entes OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16802)
-- Name: factura; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.factura (
    fecha_factura date NOT NULL,
    proveedor character varying(30) NOT NULL,
    comentario text,
    ced_usu_factura numeric(10,0),
    cantidad_med_factura numeric,
    precio_total_factura numeric,
    num_factura character varying,
    id_factura integer NOT NULL
);


ALTER TABLE public.factura OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 17260)
-- Name: factura_id_factura_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.factura_id_factura_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.factura_id_factura_seq OWNER TO postgres;

--
-- TOC entry 2886 (class 0 OID 0)
-- Dependencies: 207
-- Name: factura_id_factura_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.factura_id_factura_seq OWNED BY public.factura.id_factura;


--
-- TOC entry 200 (class 1259 OID 16760)
-- Name: familia; Type: TABLE; Schema: public; Owner: postgres
--

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

--
-- TOC entry 204 (class 1259 OID 16796)
-- Name: inventario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.inventario (
    cantidad numeric(10,0) NOT NULL,
    fecha_ven date NOT NULL,
    id_med_inventario character varying(10) NOT NULL,
    precio_unitario numeric,
    id_inventario integer NOT NULL,
    id_fac_inventario integer NOT NULL
);


ALTER TABLE public.inventario OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 17272)
-- Name: inventario_id_fac_inventario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.inventario_id_fac_inventario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inventario_id_fac_inventario_seq OWNER TO postgres;

--
-- TOC entry 2887 (class 0 OID 0)
-- Dependencies: 208
-- Name: inventario_id_fac_inventario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.inventario_id_fac_inventario_seq OWNED BY public.inventario.id_fac_inventario;


--
-- TOC entry 206 (class 1259 OID 17248)
-- Name: inventario_id_inventario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.inventario_id_inventario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inventario_id_inventario_seq OWNER TO postgres;

--
-- TOC entry 2888 (class 0 OID 0)
-- Dependencies: 206
-- Name: inventario_id_inventario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.inventario_id_inventario_seq OWNED BY public.inventario.id_inventario;


--
-- TOC entry 198 (class 1259 OID 16737)
-- Name: medicamento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.medicamento (
    id_med character varying(10) NOT NULL,
    nombre character varying(50) NOT NULL,
    concentracion numeric(5,0) NOT NULL,
    informacion text,
    forma_farmaceutica character varying(30) NOT NULL,
    unidosis boolean NOT NULL,
    dosis character varying(25),
    codigo_med character varying(25)
);


ALTER TABLE public.medicamento OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16778)
-- Name: patologia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.patologia (
    id_patologia character varying(10) NOT NULL,
    tipo_enfermedad character varying(30) NOT NULL,
    id_med_patologia character varying(10),
    nom_enfermedad character varying(50) NOT NULL
);


ALTER TABLE public.patologia OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 16731)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id_usuario integer NOT NULL,
    nombre character varying(30) NOT NULL,
    apellido character varying(30) NOT NULL,
    cedula numeric(10,0) NOT NULL,
    cargo character varying(15) NOT NULL,
    nom_user character varying(30) NOT NULL,
    contrasenna character varying(50) NOT NULL
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16729)
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_usuario_seq OWNER TO postgres;

--
-- TOC entry 2889 (class 0 OID 0)
-- Dependencies: 196
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_usuario_seq OWNED BY public.usuario.id_usuario;


--
-- TOC entry 2717 (class 2604 OID 17262)
-- Name: factura id_factura; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.factura ALTER COLUMN id_factura SET DEFAULT nextval('public.factura_id_factura_seq'::regclass);


--
-- TOC entry 2715 (class 2604 OID 17250)
-- Name: inventario id_inventario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inventario ALTER COLUMN id_inventario SET DEFAULT nextval('public.inventario_id_inventario_seq'::regclass);


--
-- TOC entry 2716 (class 2604 OID 17274)
-- Name: inventario id_fac_inventario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inventario ALTER COLUMN id_fac_inventario SET DEFAULT nextval('public.inventario_id_fac_inventario_seq'::regclass);


--
-- TOC entry 2714 (class 2604 OID 16734)
-- Name: usuario id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuario_id_usuario_seq'::regclass);


--
-- TOC entry 2871 (class 0 OID 16772)
-- Dependencies: 202
-- Data for Name: asegurado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.asegurado (nombre, apellido, cedula, cant_familiares, direccion, id_ent_asegurado, statu, id_asegurado, numero_celular, numero_habitacion) FROM stdin;
pedro	perez	777	3	12esad	\N	f	\N	\N	\N
pp	jaja	2222	2	dfdffd	1	t	\N	\N	\N
pp	jaja	222	2	dfdffd	2	t	\N	\N	\N
pp	jaja	22442	2	dfdffd	2	t	\N	\N	\N
pp	jaja	221442	2	dfdffd	2	f	\N	\N	\N
pp	jaja	2214492	2	dfdffd	6	t	\N	\N	\N
fulano	fulanito	22222	5	xxx	4	f	\N	\N	\N
\.


--
-- TOC entry 2868 (class 0 OID 16754)
-- Dependencies: 199
-- Data for Name: despacho; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.despacho (id_despacho, fecha_despacho, id_inv_despacho, ced_ase_despacho, cantidad_despacho, comentario) FROM stdin;
\.


--
-- TOC entry 2870 (class 0 OID 16766)
-- Dependencies: 201
-- Data for Name: entes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.entes (id_ente, nom_ente, rif_ente) FROM stdin;
2	la casota	2
4	casa	212
6	the house	1214114
1	la casita	sdasda
\.


--
-- TOC entry 2874 (class 0 OID 16802)
-- Dependencies: 205
-- Data for Name: factura; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.factura (fecha_factura, proveedor, comentario, ced_usu_factura, cantidad_med_factura, precio_total_factura, num_factura, id_factura) FROM stdin;
2017-12-10	pedro	completo	27047723	\N	\N	\N	1
2017-12-10	pedro	completo	27047723	\N	\N	\N	2
2010-01-10	pedro	completo	27047723	\N	\N	\N	3
\.


--
-- TOC entry 2869 (class 0 OID 16760)
-- Dependencies: 200
-- Data for Name: familia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.familia (nombre, apellido, cedula, parentesco, direccion, id_familia, ced_ase_familia) FROM stdin;
\.


--
-- TOC entry 2873 (class 0 OID 16796)
-- Dependencies: 204
-- Data for Name: inventario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.inventario (cantidad, fecha_ven, id_med_inventario, precio_unitario, id_inventario, id_fac_inventario) FROM stdin;
4	2019-10-10	4	\N	1	1
4	2019-10-10	4	\N	2	2
4	2019-10-15	4	\N	3	3
4	2019-10-15	4	\N	4	4
4	2019-10-15	4	\N	5	5
4	2019-10-15	4	\N	6	6
4	2019-10-15	4	\N	7	7
4	2019-10-18	5	\N	8	8
4	2019-10-18	5	\N	9	9
4	2019-10-18	5	\N	10	10
4	2019-10-20	7	\N	11	11
4	2019-10-20	7	\N	12	12
4	2019-10-20	7	\N	13	13
3	2019-11-05	4	\N	14	14
3	2019-11-05	5	\N	15	15
5	2019-12-10	4	1200	10	3
\.


--
-- TOC entry 2867 (class 0 OID 16737)
-- Dependencies: 198
-- Data for Name: medicamento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.medicamento (id_med, nombre, concentracion, informacion, forma_farmaceutica, unidosis, dosis, codigo_med) FROM stdin;
4	ibuprofeno	10	ppeproeprk	tableta	f	\N	\N
5	dol	10	ppeproeprk	tableta	f	\N	\N
6	atamel	10	ppeproeprk	tableta	f	\N	\N
7	cefalocidro	10	ppeproeprk	tableta	f	\N	\N
gg	hhh	444	sds	jarabe	t	\N	\N
2	clonasepan	10	ppeproeprk	tableta	t	\N	\N
ibu	ibuprofeno	30		gotas	f	gramos	\N
fer	ferrol	100		jarabe	f	mililitros	\N
parmol	paracetamolito	120		pastillas	t	miligramos	\N
\.


--
-- TOC entry 2872 (class 0 OID 16778)
-- Dependencies: 203
-- Data for Name: patologia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.patologia (id_patologia, tipo_enfermedad, id_med_patologia, nom_enfermedad) FROM stdin;
\.


--
-- TOC entry 2866 (class 0 OID 16731)
-- Dependencies: 197
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id_usuario, nombre, apellido, cedula, cargo, nom_user, contrasenna) FROM stdin;
51	Willy	Orozco	224466889	farmaceuta	WillyJose	123456
52	Yargrelis	Quintero	113355779	coordinador	Danney	123456
1	Willy	orozco	27047723	administrador	admin	123456
53	Maricela	Casas	9342136	farmaceuta	Diocelina	789456
54	sheila	rodriguez	3972868	farmaceuta	sheirodri	abc25
\.


--
-- TOC entry 2890 (class 0 OID 0)
-- Dependencies: 207
-- Name: factura_id_factura_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.factura_id_factura_seq', 3, true);


--
-- TOC entry 2891 (class 0 OID 0)
-- Dependencies: 208
-- Name: inventario_id_fac_inventario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.inventario_id_fac_inventario_seq', 15, true);


--
-- TOC entry 2892 (class 0 OID 0)
-- Dependencies: 206
-- Name: inventario_id_inventario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.inventario_id_inventario_seq', 16, true);


--
-- TOC entry 2893 (class 0 OID 0)
-- Dependencies: 196
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_usuario_seq', 54, true);


--
-- TOC entry 2732 (class 2606 OID 16867)
-- Name: asegurado cedula; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.asegurado
    ADD CONSTRAINT cedula PRIMARY KEY (cedula);


--
-- TOC entry 2727 (class 2606 OID 17129)
-- Name: familia cedula_fam; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familia
    ADD CONSTRAINT cedula_fam PRIMARY KEY (cedula);


--
-- TOC entry 2730 (class 2606 OID 17022)
-- Name: entes entes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.entes
    ADD CONSTRAINT entes_pkey PRIMARY KEY (id_ente);


--
-- TOC entry 2725 (class 2606 OID 17102)
-- Name: despacho id_despacho; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.despacho
    ADD CONSTRAINT id_despacho PRIMARY KEY (id_despacho);


--
-- TOC entry 2738 (class 2606 OID 17271)
-- Name: factura id_factura; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.factura
    ADD CONSTRAINT id_factura PRIMARY KEY (id_factura);


--
-- TOC entry 2721 (class 2606 OID 17151)
-- Name: medicamento id_med; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.medicamento
    ADD CONSTRAINT id_med PRIMARY KEY (id_med);


--
-- TOC entry 2719 (class 2606 OID 17193)
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (cedula);


--
-- TOC entry 2722 (class 1259 OID 17227)
-- Name: fki_ced_ase_despacho; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_ced_ase_despacho ON public.despacho USING btree (ced_ase_despacho);


--
-- TOC entry 2728 (class 1259 OID 17238)
-- Name: fki_ced_ase_familia; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_ced_ase_familia ON public.familia USING btree (ced_ase_familia);


--
-- TOC entry 2736 (class 1259 OID 17288)
-- Name: fki_ced_usu_factura; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_ced_usu_factura ON public.factura USING btree (ced_usu_factura);


--
-- TOC entry 2733 (class 1259 OID 17084)
-- Name: fki_entes_fk_ase; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_entes_fk_ase ON public.asegurado USING btree (id_ent_asegurado);


--
-- TOC entry 2734 (class 1259 OID 17287)
-- Name: fki_id_fac_inventario; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_id_fac_inventario ON public.inventario USING btree (id_fac_inventario);


--
-- TOC entry 2723 (class 1259 OID 17109)
-- Name: fki_id_inv_des; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_id_inv_des ON public.despacho USING btree (id_inv_despacho);


--
-- TOC entry 2735 (class 1259 OID 17210)
-- Name: fki_id_med_inventario; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX fki_id_med_inventario ON public.inventario USING btree (id_med_inventario);


--
-- TOC entry 2739 (class 2606 OID 17222)
-- Name: despacho ced_ase_despacho; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.despacho
    ADD CONSTRAINT ced_ase_despacho FOREIGN KEY (ced_ase_despacho) REFERENCES public.asegurado(cedula) NOT VALID;


--
-- TOC entry 2740 (class 2606 OID 17233)
-- Name: familia ced_ase_familia; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.familia
    ADD CONSTRAINT ced_ase_familia FOREIGN KEY (ced_ase_familia) REFERENCES public.asegurado(cedula) NOT VALID;


--
-- TOC entry 2741 (class 2606 OID 17228)
-- Name: asegurado id_ent_asegurado; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.asegurado
    ADD CONSTRAINT id_ent_asegurado FOREIGN KEY (id_ent_asegurado) REFERENCES public.entes(id_ente) NOT VALID;


--
-- TOC entry 2742 (class 2606 OID 17282)
-- Name: inventario id_fac_inventario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inventario
    ADD CONSTRAINT id_fac_inventario FOREIGN KEY (id_fac_inventario) REFERENCES public.factura(id_factura) NOT VALID;


--
-- TOC entry 2743 (class 2606 OID 17205)
-- Name: inventario id_med_inventario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inventario
    ADD CONSTRAINT id_med_inventario FOREIGN KEY (id_med_inventario) REFERENCES public.medicamento(id_med) NOT VALID;


-- Completed on 2019-11-06 20:49:21

--
-- PostgreSQL database dump complete
--

