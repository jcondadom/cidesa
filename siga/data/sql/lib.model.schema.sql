
-----------------------------------------------------------------------------
-- ruta
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ruta" CASCADE;

DROP SEQUENCE IF EXISTS "ruta_seq";

CREATE SEQUENCE "ruta_seq";


CREATE TABLE "ruta"
(
  "descripcion" VARCHAR(100)  NOT NULL,
  "atestados_id" INTEGER  NOT NULL,
  "atmunicipios_id" INTEGER  NOT NULL,
  "atparroquias_id" INTEGER  NOT NULL,
  "zona_limi_desde" VARCHAR(100)  NOT NULL,
  "zona_limi_hasta" VARCHAR(100)  NOT NULL,
  "dia_visita" INTEGER  NOT NULL,
  "dia_despacho" INTEGER  NOT NULL,
  "status" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ruta_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ruta" IS '';


ALTER TABLE "ruta" ADD CONSTRAINT "ruta_FK_1" FOREIGN KEY ("atestados_id") REFERENCES "atestados" ("id");

ALTER TABLE "ruta" ADD CONSTRAINT "ruta_FK_2" FOREIGN KEY ("atmunicipios_id") REFERENCES "atmunicipios" ("id");

ALTER TABLE "ruta" ADD CONSTRAINT "ruta_FK_3" FOREIGN KEY ("atparroquias_id") REFERENCES "atparroquias" ("id");

-----------------------------------------------------------------------------
-- metas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "metas" CASCADE;

DROP SEQUENCE IF EXISTS "metas_seq";

CREATE SEQUENCE "metas_seq";


CREATE TABLE "metas"
(
  "vendedores_id" INTEGER  NOT NULL,
  "catproductos_id" INTEGER  NOT NULL,
  "cantidad" INTEGER  NOT NULL,
  "mes_asignacion" INTEGER  NOT NULL,
  "anio_asignacion" INTEGER  NOT NULL,
  "status" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('metas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "metas" IS '';


ALTER TABLE "metas" ADD CONSTRAINT "metas_FK_1" FOREIGN KEY ("vendedores_id") REFERENCES "vendedores" ("id");

ALTER TABLE "metas" ADD CONSTRAINT "metas_FK_2" FOREIGN KEY ("catproductos_id") REFERENCES "catproductos" ("id");

-----------------------------------------------------------------------------
-- rutavendedor
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rutavendedor" CASCADE;

DROP SEQUENCE IF EXISTS "rutavendedor_seq";

CREATE SEQUENCE "rutavendedor_seq";


CREATE TABLE "rutavendedor"
(
  "atestados_id" INTEGER  NOT NULL,
  "atmunicipios_id" INTEGER  NOT NULL,
  "atparroquias_id" INTEGER  NOT NULL,
  "facliente_id" INTEGER  NOT NULL,
  "vendedores_id" INTEGER  NOT NULL,
  "fecha_visita" DATE  NOT NULL,
  "fecha_despacho" DATE  NOT NULL,
  "status" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('rutavendedor_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rutavendedor" IS '';


ALTER TABLE "rutavendedor" ADD CONSTRAINT "rutavendedor_FK_1" FOREIGN KEY ("atestados_id") REFERENCES "atestados" ("id");

ALTER TABLE "rutavendedor" ADD CONSTRAINT "rutavendedor_FK_2" FOREIGN KEY ("atmunicipios_id") REFERENCES "atmunicipios" ("id");

ALTER TABLE "rutavendedor" ADD CONSTRAINT "rutavendedor_FK_3" FOREIGN KEY ("atparroquias_id") REFERENCES "atparroquias" ("id");

ALTER TABLE "rutavendedor" ADD CONSTRAINT "rutavendedor_FK_4" FOREIGN KEY ("facliente_id") REFERENCES "facliente" ("id");

ALTER TABLE "rutavendedor" ADD CONSTRAINT "rutavendedor_FK_5" FOREIGN KEY ("vendedores_id") REFERENCES "vendedores" ("id");

-----------------------------------------------------------------------------
-- vendedores
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "vendedores" CASCADE;

DROP SEQUENCE IF EXISTS "vendedores_seq";

CREATE SEQUENCE "vendedores_seq";


CREATE TABLE "vendedores"
(
  "codcon" VARCHAR(16),
  "nomcon" VARCHAR(510),
  "dircon" VARCHAR(1000),
  "telcon" VARCHAR(20),
  "faxcon" VARCHAR(20),
  "email" VARCHAR(40),
  "percon" VARCHAR(510),
  "id" INTEGER  NOT NULL DEFAULT nextval('vendedores_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "vendedores" IS '';


-----------------------------------------------------------------------------
-- radarventas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "radarventas" CASCADE;

DROP SEQUENCE IF EXISTS "radarventas_seq";

CREATE SEQUENCE "radarventas_seq";


CREATE TABLE "radarventas"
(
  "ruta_id" INTEGER  NOT NULL,
  "facliente_id" INTEGER  NOT NULL,
  "vendedores_id" INTEGER  NOT NULL,
  "catproductos_id" INTEGER  NOT NULL,
  "fecha" DATE  NOT NULL,
  "status" VARCHAR(1)  NOT NULL,
  "cantidad" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('radarventas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "radarventas" IS '';


ALTER TABLE "radarventas" ADD CONSTRAINT "radarventas_FK_1" FOREIGN KEY ("ruta_id") REFERENCES "ruta" ("id");

ALTER TABLE "radarventas" ADD CONSTRAINT "radarventas_FK_2" FOREIGN KEY ("facliente_id") REFERENCES "facliente" ("id");

ALTER TABLE "radarventas" ADD CONSTRAINT "radarventas_FK_3" FOREIGN KEY ("vendedores_id") REFERENCES "vendedores" ("id");

ALTER TABLE "radarventas" ADD CONSTRAINT "radarventas_FK_4" FOREIGN KEY ("catproductos_id") REFERENCES "catproductos" ("id");

-----------------------------------------------------------------------------
-- rutacliente
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rutacliente" CASCADE;

DROP SEQUENCE IF EXISTS "rutacliente_seq";

CREATE SEQUENCE "rutacliente_seq";


CREATE TABLE "rutacliente"
(
  "ruta_id" INTEGER  NOT NULL,
  "facliente_id" INTEGER  NOT NULL,
  "status" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('rutacliente_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rutacliente" IS '';


ALTER TABLE "rutacliente" ADD CONSTRAINT "rutacliente_FK_1" FOREIGN KEY ("ruta_id") REFERENCES "ruta" ("id");

ALTER TABLE "rutacliente" ADD CONSTRAINT "rutacliente_FK_2" FOREIGN KEY ("facliente_id") REFERENCES "facliente" ("id");

-----------------------------------------------------------------------------
-- rutavendedores
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rutavendedores" CASCADE;

DROP SEQUENCE IF EXISTS "rutavendedores_seq";

CREATE SEQUENCE "rutavendedores_seq";


CREATE TABLE "rutavendedores"
(
  "ruta_id" INTEGER  NOT NULL,
  "vendedores_id" INTEGER  NOT NULL,
  "status" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('rutavendedores_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rutavendedores" IS '';


ALTER TABLE "rutavendedores" ADD CONSTRAINT "rutavendedores_FK_1" FOREIGN KEY ("ruta_id") REFERENCES "ruta" ("id");

ALTER TABLE "rutavendedores" ADD CONSTRAINT "rutavendedores_FK_2" FOREIGN KEY ("vendedores_id") REFERENCES "vendedores" ("id");

-----------------------------------------------------------------------------
-- catproductos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catproductos" CASCADE;

DROP SEQUENCE IF EXISTS "catproductos_seq";

CREATE SEQUENCE "catproductos_seq";


CREATE TABLE "catproductos"
(
  "codart" VARCHAR(20),
  "desart" VARCHAR(1500),
  "id" INTEGER  NOT NULL DEFAULT nextval('catproductos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catproductos" IS '';


-----------------------------------------------------------------------------
-- cuentaxcobrar_clientes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cuentaxcobrar_clientes" CASCADE;

DROP SEQUENCE IF EXISTS "cuentaxcobrar_clientes_seq";

CREATE SEQUENCE "cuentaxcobrar_clientes_seq";


CREATE TABLE "cuentaxcobrar_clientes"
(
  "codcliente" VARCHAR(15)  NOT NULL,
  "cliente" VARCHAR(1500)  NOT NULL,
  "cuentaxcobrar" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cuentaxcobrar_clientes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cuentaxcobrar_clientes" IS '';


COMMENT ON COLUMN "cuentaxcobrar_clientes"."cuentaxcobrar" IS 'null';
