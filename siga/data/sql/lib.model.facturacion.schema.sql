
ALTER TABLE "faartpvp" ALTER COLUMN despvp TYPE character varying(50);
        
ALTER TABLE "fafactur" ALTER COLUMN conpag TYPE integer;
        
  ALTER TABLE "fafactur" ADD CONSTRAINT "fafactur_FK_2" FOREIGN KEY ("codalmusu") REFERENCES "cadefalm" ("codalm");
  
ALTER TABLE "faforpag" ALTER COLUMN tippag TYPE integer;
        
  ALTER TABLE "fapedido" ADD CONSTRAINT "fapedido_FK_2" FOREIGN KEY ("codalmusu") REFERENCES "cadefalm" ("codalm");
  
ALTER TABLE "fadescto" ALTER COLUMN diasapl TYPE numeric(4);
        
-----------------------------------------------------------------------------
-- faconsignatario
-----------------------------------------------------------------------------

CREATE SEQUENCE "faconsignatario_seq";


CREATE TABLE "faconsignatario"
(
  "codcon" VARCHAR(15)  NOT NULL,
  "nomcon" VARCHAR(250)  NOT NULL,
  "dircon" VARCHAR(500),
  "telcon" VARCHAR(30),
  "faxcon" VARCHAR(15),
  "email" VARCHAR(100),
  "percon" VARCHAR(500),
  "id" INTEGER  NOT NULL DEFAULT nextval('faconsignatario_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faconsignatario" IS '';


COMMENT ON COLUMN "faconsignatario"."id" IS 'Identificador Único del registro';

  ALTER TABLE "faentcre" ADD CONSTRAINT "faentcre_FK_1" FOREIGN KEY ("codzon") REFERENCES "fadefzon" ("codzon");
  
  ALTER TABLE "faemptra" ADD CONSTRAINT "faemptra_FK_1" FOREIGN KEY ("codzon") REFERENCES "fadefzon" ("codzon");
  
  ALTER TABLE "falisprc" ADD CONSTRAINT "falisprc_FK_1" FOREIGN KEY ("codprg") REFERENCES "fadefprg" ("codprg");
  
  ALTER TABLE "falisprc" ADD CONSTRAINT "falisprc_FK_2" FOREIGN KEY ("codtipcli") REFERENCES "fatipcte" ("id");
  
  ALTER TABLE "falisprc" ADD CONSTRAINT "falisprc_FK_4" FOREIGN KEY ("codart") REFERENCES "caregart" ("codart");
  
  ALTER TABLE "fadefveh" ADD CONSTRAINT "fadefveh_FK_1" FOREIGN KEY ("codemptra") REFERENCES "faemptra" ("codemptra");
  
  ALTER TABLE "fadefcarord" ADD CONSTRAINT "fadefcarord_FK_1" FOREIGN KEY ("codprg") REFERENCES "fadefprg" ("codprg");
  
  ALTER TABLE "faapecaj" ADD CONSTRAINT "faapecaj_FK_1" FOREIGN KEY ("codalm") REFERENCES "cadefalm" ("codalm");
  
  ALTER TABLE "faciecaj" ADD CONSTRAINT "faciecaj_FK_1" FOREIGN KEY ("codalm") REFERENCES "cadefalm" ("codalm");
  
  ALTER TABLE "fadefcho" ADD CONSTRAINT "fadefcho_FK_1" FOREIGN KEY ("codemptra") REFERENCES "faemptra" ("codemptra");
  
  ALTER TABLE "facarord" ADD CONSTRAINT "facarord_FK_1" FOREIGN KEY ("codentcre") REFERENCES "faentcre" ("codentcre");
  
  ALTER TABLE "facarord" ADD CONSTRAINT "facarord_FK_3" FOREIGN KEY ("ramart") REFERENCES "caramart" ("ramart");
  
  ALTER TABLE "facarord" ADD CONSTRAINT "facarord_FK_5" FOREIGN KEY ("codalmusu") REFERENCES "cadefalm" ("codalm");
  
  ALTER TABLE "fadetcar" ADD CONSTRAINT "fadetcar_FK_1" FOREIGN KEY ("codart") REFERENCES "caregart" ("codart");
  