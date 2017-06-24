
ALTER TABLE "cadefalm" ALTER COLUMN codtip TYPE integer;
        
  ALTER TABLE "cadefalm" ADD CONSTRAINT "cadefalm_FK_1" FOREIGN KEY ("codtip") REFERENCES "catipalm" ("id");
  
ALTER TABLE "cadefalm" ALTER COLUMN catipalm_id TYPE integer;
        
  ALTER TABLE "cadefalm" ADD CONSTRAINT "cadefalm_FK_2" FOREIGN KEY ("catipalm_id") REFERENCES "catipalm" ("id");
  
  ALTER TABLE "cadphart" ADD CONSTRAINT "cadphart_FK_1" FOREIGN KEY ("codalmusu") REFERENCES "cadefalm" ("codalm");
  
  ALTER TABLE "carcpart" ADD CONSTRAINT "carcpart_FK_1" FOREIGN KEY ("codalmusu") REFERENCES "cadefalm" ("codalm");
  
  ALTER TABLE "carecpro" ADD CONSTRAINT "carecpro_FK_1" FOREIGN KEY ("codpro") REFERENCES "caprovee" ("codpro");
  
ALTER TABLE "cargosol" ALTER COLUMN monaju TYPE numeric(14);
        
  ALTER TABLE "caordcom" ADD CONSTRAINT "caordcom_FK_1" FOREIGN KEY ("codpro") REFERENCES "caprovee" ("codpro");
  
  ALTER TABLE "cacotiza" ADD CONSTRAINT "cacotiza_FK_1" FOREIGN KEY ("codpro") REFERENCES "caprovee" ("codpro");
  
  ALTER TABLE "caentalm" ADD CONSTRAINT "caentalm_FK_2" FOREIGN KEY ("codalmusu") REFERENCES "cadefalm" ("codalm");
  
  ALTER TABLE "casalalm" ADD CONSTRAINT "casalalm_FK_2" FOREIGN KEY ("codalmusu") REFERENCES "cadefalm" ("codalm");
  
  ALTER TABLE "catraalm" ADD CONSTRAINT "catraalm_FK_1" FOREIGN KEY ("codemptra") REFERENCES "faemptra" ("codemptra");
  
ALTER TABLE "caartrcp" ALTER COLUMN montot TYPE numeric(14,2);
        
ALTER TABLE "cadetent" ALTER COLUMN montot TYPE numeric(14,2);
        
ALTER TABLE "cadetsal" ALTER COLUMN totart TYPE numeric(14,2);
        
  ALTER TABLE "cadefcenaco" ADD CONSTRAINT "cadefcenaco_FK_1" FOREIGN KEY ("codpai") REFERENCES "ocpais" ("codpai");
  
  ALTER TABLE "cadefcenaco" ADD CONSTRAINT "cadefcenaco_FK_2" FOREIGN KEY ("codedo") REFERENCES "ocestado" ("codedo");
  
  ALTER TABLE "cadefcenaco" ADD CONSTRAINT "cadefcenaco_FK_3" FOREIGN KEY ("codciu") REFERENCES "occiudad" ("codciu");
  
  ALTER TABLE "cadefcenaco" ADD CONSTRAINT "cadefcenaco_FK_4" FOREIGN KEY ("codmun") REFERENCES "ocmunici" ("codmun");
  
  ALTER TABLE "carelartsiga" ADD CONSTRAINT "carelartsiga_FK_1" FOREIGN KEY ("codart") REFERENCES "caregart" ("codart");
  
  ALTER TABLE "causualm" ADD CONSTRAINT "causualm_FK_1" FOREIGN KEY ("codalm") REFERENCES "cadefalm" ("codalm");
  
  ALTER TABLE "cadetpda" ADD CONSTRAINT "cadetpda_FK_2" FOREIGN KEY ("codpro") REFERENCES "caprovee" ("codpro");
  
  ALTER TABLE "caevadespro" ADD CONSTRAINT "caevadespro_FK_1" FOREIGN KEY ("codpro") REFERENCES "caprovee" ("codpro");
  