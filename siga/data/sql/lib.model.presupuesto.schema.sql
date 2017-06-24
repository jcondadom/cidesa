
  ALTER TABLE "cpajuste" ADD CONSTRAINT "cpajuste_FK_1" FOREIGN KEY ("tipaju") REFERENCES "cpdocaju" ("tipaju");
  
  ALTER TABLE "cpasiini" ADD CONSTRAINT "cpasiini_FK_1" FOREIGN KEY ("codpre") REFERENCES "cpdeftit" ("codpre");
  
  ALTER TABLE "cpcompro" ADD CONSTRAINT "cpcompro_FK_1" FOREIGN KEY ("tipcom") REFERENCES "cpdoccom" ("tipcom");
  
ALTER TABLE "cpdefniv" ALTER COLUMN coraep TYPE integer;
        
ALTER TABLE "cpdefniv" ALTER COLUMN corfue TYPE integer;
        
ALTER TABLE "cpdeftit" ALTER COLUMN codpre TYPE character varying(50);
        
ALTER TABLE "cpdeftit" ALTER COLUMN nompre TYPE character varying(500);
        
  ALTER TABLE "cpdeftit" ADD CONSTRAINT "cpdeftit_FK_1" FOREIGN KEY ("codcta") REFERENCES "contabb" ("codcta");
  
  ALTER TABLE "cpimpcom" ADD CONSTRAINT "cpimpcom_FK_1" FOREIGN KEY ("refcom") REFERENCES "cpcompro" ("refcom");
  
  ALTER TABLE "cpimpcom" ADD CONSTRAINT "cpimpcom_FK_2" FOREIGN KEY ("codpre") REFERENCES "cpdeftit" ("codpre");
  
  ALTER TABLE "cpimppag" ADD CONSTRAINT "cpimppag_FK_1" FOREIGN KEY ("refpag") REFERENCES "cppagos" ("refpag");
  
  ALTER TABLE "cpimpprc" ADD CONSTRAINT "cpimpprc_FK_1" FOREIGN KEY ("refprc") REFERENCES "cpprecom" ("refprc");
  
  ALTER TABLE "cpimpprc" ADD CONSTRAINT "cpimpprc_FK_2" FOREIGN KEY ("codpre") REFERENCES "cpdeftit" ("codpre");
  
  ALTER TABLE "cpmovadi" ADD CONSTRAINT "cpmovadi_FK_1" FOREIGN KEY ("refadi") REFERENCES "cpadidis" ("refadi");
  
  ALTER TABLE "cpmovadi" ADD CONSTRAINT "cpmovadi_FK_2" FOREIGN KEY ("codpre") REFERENCES "cpdeftit" ("codpre");
  
  ALTER TABLE "cpmovaju" ADD CONSTRAINT "cpmovaju_FK_1" FOREIGN KEY ("refaju") REFERENCES "cpajuste" ("refaju");
  
  ALTER TABLE "cpmovaju" ADD CONSTRAINT "cpmovaju_FK_2" FOREIGN KEY ("codpre") REFERENCES "cpdeftit" ("codpre");
  
  ALTER TABLE "cppagos" ADD CONSTRAINT "cppagos_FK_1" FOREIGN KEY ("tippag") REFERENCES "cpdocpag" ("tippag");
  
  ALTER TABLE "cppagos" ADD CONSTRAINT "cppagos_FK_2" FOREIGN KEY ("cedrif") REFERENCES "opbenefi" ("cedrif");
  
  ALTER TABLE "cpprecom" ADD CONSTRAINT "cpprecom_FK_1" FOREIGN KEY ("tipprc") REFERENCES "cpdocprc" ("tipprc");
  
  ALTER TABLE "cpsoltrasla" ADD CONSTRAINT "cpsoltrasla_FK_1" FOREIGN KEY ("codart") REFERENCES "cpartley" ("codart");
  
  ALTER TABLE "cpcausad" ADD CONSTRAINT "cpcausad_FK_1" FOREIGN KEY ("tipcau") REFERENCES "cpdoccau" ("tipcau");
  
  ALTER TABLE "cpcausad" ADD CONSTRAINT "cpcausad_FK_2" FOREIGN KEY ("refcom") REFERENCES "cpcompro" ("refcom");
  
  ALTER TABLE "cpcausad" ADD CONSTRAINT "cpcausad_FK_3" FOREIGN KEY ("cedrif") REFERENCES "opbenefi" ("cedrif");
  
  ALTER TABLE "cpsolmovadi" ADD CONSTRAINT "cpsolmovadi_FK_1" FOREIGN KEY ("refadi") REFERENCES "cpsoladidis" ("refadi");
  
  ALTER TABLE "cpsolmovtra" ADD CONSTRAINT "cpsolmovtra_FK_1" FOREIGN KEY ("reftra") REFERENCES "cpsoltrasla" ("reftra");
  
  ALTER TABLE "cpsoladidis" ADD CONSTRAINT "cpsoladidis_FK_1" FOREIGN KEY ("codart") REFERENCES "cpartley" ("codart");
  
ALTER TABLE "cpniveles" ALTER COLUMN consec TYPE numeric(2);
        
ALTER TABLE "cpniveles" ALTER COLUMN lonniv TYPE numeric(2);
        
  ALTER TABLE "cpmovtra" ADD CONSTRAINT "cpmovtra_FK_2" FOREIGN KEY ("codori") REFERENCES "cpdeftit" ("codpre");
  
  ALTER TABLE "cpmovtra" ADD CONSTRAINT "cpmovtra_FK_3" FOREIGN KEY ("coddes") REFERENCES "cpdeftit" ("codpre");
  
ALTER TABLE "hisconb" ALTER COLUMN codcta TYPE character varying(18);
        
ALTER TABLE "hisconb" ALTER COLUMN descta TYPE character varying(40);
        
ALTER TABLE "hisconb" ALTER COLUMN salant TYPE numeric(12,2);
        
ALTER TABLE "hisconb1" ALTER COLUMN codcta TYPE character varying(18);
        
ALTER TABLE "hisconc" ALTER COLUMN descom TYPE character varying(50);
        
ALTER TABLE "hisconc1" ALTER COLUMN codcta TYPE character varying(18);
        
ALTER TABLE "hisconc1" ALTER COLUMN refasi TYPE character varying(8);
        
ALTER TABLE "hisconc1" ALTER COLUMN desasi TYPE character varying(30);
        
  ALTER TABLE "cpcomext" ADD CONSTRAINT "cpcomext_FK_1" FOREIGN KEY ("tipcom") REFERENCES "cpdoccom" ("tipcom");
  
  ALTER TABLE "cpcomext" ADD CONSTRAINT "cpcomext_FK_2" FOREIGN KEY ("cedrif") REFERENCES "opbenefi" ("cedrif");
  
  ALTER TABLE "cpimpcomext" ADD CONSTRAINT "cpimpcomext_FK_1" FOREIGN KEY ("refcomext") REFERENCES "cpcomext" ("refcomext");
  
  ALTER TABLE "cpimpcomext" ADD CONSTRAINT "cpimpcomext_FK_2" FOREIGN KEY ("codpre") REFERENCES "cpdeftit" ("codpre");
  
  ALTER TABLE "cpdetptocta" ADD CONSTRAINT "cpdetptocta_FK_1" FOREIGN KEY ("codpre") REFERENCES "cpdeftit" ("codpre");
  
  ALTER TABLE "cpsolmovadiper" ADD CONSTRAINT "cpsolmovadiper_FK_1" FOREIGN KEY ("refadi") REFERENCES "cpsoladidis" ("refadi");
  
  ALTER TABLE "cpmovadiper" ADD CONSTRAINT "cpmovadiper_FK_1" FOREIGN KEY ("refadi") REFERENCES "cpadidis" ("refadi");
  
  ALTER TABLE "cpmovadiper" ADD CONSTRAINT "cpmovadiper_FK_2" FOREIGN KEY ("codpre") REFERENCES "cpdeftit" ("codpre");
  
  ALTER TABLE "cpsolmovtraperori" ADD CONSTRAINT "cpsolmovtraperori_FK_1" FOREIGN KEY ("reftra") REFERENCES "cpsoltrasla" ("reftra");
  
  ALTER TABLE "cpsolmovtraperdes" ADD CONSTRAINT "cpsolmovtraperdes_FK_1" FOREIGN KEY ("reftra") REFERENCES "cpsoltrasla" ("reftra");
  
  ALTER TABLE "cpmovtraperori" ADD CONSTRAINT "cpmovtraperori_FK_2" FOREIGN KEY ("codori") REFERENCES "cpdeftit" ("codpre");
  
  ALTER TABLE "cpmovtraperdes" ADD CONSTRAINT "cpmovtraperdes_FK_2" FOREIGN KEY ("coddes") REFERENCES "cpdeftit" ("codpre");
  