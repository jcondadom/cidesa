
  ALTER TABLE "atdenuncias" ADD CONSTRAINT "atdenuncias_FK_1" FOREIGN KEY ("atciudadano_id") REFERENCES "atciudadano" ("id");
  
  ALTER TABLE "atdetest" ADD CONSTRAINT "atdetest_FK_2" FOREIGN KEY ("atdenuncias_id") REFERENCES "atdenuncias" ("id");
  