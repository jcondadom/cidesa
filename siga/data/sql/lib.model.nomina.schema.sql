
ALTER TABLE "npbonocont" ALTER COLUMN diauti TYPE numeric(10,5);
        
ALTER TABLE "npbonocont" ALTER COLUMN diavac TYPE numeric(10,5);
        
ALTER TABLE "npbonocont" ALTER COLUMN diapro TYPE numeric(10,5);
        
  ALTER TABLE "npconsalint" ADD CONSTRAINT "npconsalint_FK_1" FOREIGN KEY ("codnom") REFERENCES "npnomina" ("codnom");
  
  ALTER TABLE "npconsalint" ADD CONSTRAINT "npconsalint_FK_2" FOREIGN KEY ("codcon") REFERENCES "npdefcpt" ("codcon");
  
-----------------------------------------------------------------------------
-- nphiscon_06022007_sincambio
-----------------------------------------------------------------------------

CREATE SEQUENCE "nphiscon_06022007_sincambio_seq";


CREATE TABLE "nphiscon_06022007_sincambio"
(
  "codnom" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codcar" VARCHAR(16),
  "codcon" VARCHAR(3),
  "fecnom" DATE,
  "monto" NUMERIC(14,2),
  "codcat" VARCHAR(32),
  "codpar" VARCHAR(16),
  "codescuela" VARCHAR(7),
  "codniv" VARCHAR(32),
  "codtipgas" VARCHAR(4),
  "nomcon" VARCHAR(100),
  "numrec" NUMERIC(14,2),
  "cantidad" NUMERIC(18,3),
  "fecnomdes" DATE,
  "especial" VARCHAR(1),
  "fecnomespdes" DATE,
  "fecnomesphas" DATE,
  "codnomesp" VARCHAR(3),
  "nomnomesp" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('nphiscon_06022007_sincambio_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nphiscon_06022007_sincambio" IS '';


COMMENT ON COLUMN "nphiscon_06022007_sincambio"."id" IS 'Identificador Único del registro';

ALTER TABLE "npinffam" ALTER COLUMN porseghcm TYPE numeric(3,2);
        
  ALTER TABLE "npprocar" ADD CONSTRAINT "npprocar_FK_1" FOREIGN KEY ("codprofes") REFERENCES "npprofesion" ("codprofes");
  
  ALTER TABLE "npprocar" ADD CONSTRAINT "npprocar_FK_2" FOREIGN KEY ("codcar") REFERENCES "npcargos" ("codcar");
  
-----------------------------------------------------------------------------
-- npsalint_03022007
-----------------------------------------------------------------------------

CREATE SEQUENCE "npsalint_03022007_seq";


CREATE TABLE "npsalint_03022007"
(
  "codcon" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codasi" VARCHAR(3),
  "monasi" NUMERIC(14,2),
  "fecinicon" DATE,
  "fecfincon" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npsalint_03022007_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npsalint_03022007" IS '';


COMMENT ON COLUMN "npsalint_03022007"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npsalint_05022007
-----------------------------------------------------------------------------

CREATE SEQUENCE "npsalint_05022007_seq";


CREATE TABLE "npsalint_05022007"
(
  "codcon" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codasi" VARCHAR(3),
  "monasi" NUMERIC(14,2),
  "fecinicon" DATE,
  "fecfincon" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npsalint_05022007_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npsalint_05022007" IS '';


COMMENT ON COLUMN "npsalint_05022007"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npsalint_06022007
-----------------------------------------------------------------------------

CREATE SEQUENCE "npsalint_06022007_seq";


CREATE TABLE "npsalint_06022007"
(
  "codcon" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codasi" VARCHAR(3),
  "monasi" NUMERIC(14,2),
  "fecinicon" DATE,
  "fecfincon" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npsalint_06022007_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npsalint_06022007" IS '';


COMMENT ON COLUMN "npsalint_06022007"."id" IS 'Identificador Único del registro';

ALTER TABLE "npdefespparpre" ALTER COLUMN factorbonfinanofra TYPE numeric(14,2);
        
  ALTER TABLE "npconsalintfid" ADD CONSTRAINT "npconsalintfid_FK_1" FOREIGN KEY ("codnom") REFERENCES "npnomina" ("codnom");
  
  ALTER TABLE "npconsalintfid" ADD CONSTRAINT "npconsalintfid_FK_2" FOREIGN KEY ("codcon") REFERENCES "npdefcpt" ("codcon");
  