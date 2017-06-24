
  ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_2" FOREIGN KEY ("id_usuario") REFERENCES "usuarios" ("id");
  
ALTER TABLE "dfatendocdet" ALTER COLUMN id_dfmedtra TYPE integer;
        
  ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_6" FOREIGN KEY ("id_dfmedtra") REFERENCES "dfmedtra" ("id");
  
  ALTER TABLE "dfatendocobs" ADD CONSTRAINT "dfatendocobs_FK_2" FOREIGN KEY ("id_usuario") REFERENCES "usuarios" ("id");
  