
ALTER TABLE "contaba" ALTER COLUMN loncta TYPE numeric(2);
        
ALTER TABLE "contaba" ALTER COLUMN numrup TYPE numeric(2);
        
  ALTER TABLE "contabb1" ADD CONSTRAINT "contabb1_FK_1" FOREIGN KEY ("codcta") REFERENCES "contabb" ("codcta");
  
  ALTER TABLE "contabc1" ADD CONSTRAINT "contabc1_FK_1" FOREIGN KEY ("numcom") REFERENCES "contabc" ("numcom");
  
  ALTER TABLE "contabc1" ADD CONSTRAINT "contabc1_FK_2" FOREIGN KEY ("codcta") REFERENCES "contabb" ("codcta");
  
ALTER TABLE "contabc1" ALTER COLUMN numasi TYPE numeric(3);
        
  ALTER TABLE "contabc1m" ADD CONSTRAINT "contabc1m_FK_1" FOREIGN KEY ("numcom") REFERENCES "contabcm" ("numcom");
  
  ALTER TABLE "contabc1m" ADD CONSTRAINT "contabc1m_FK_2" FOREIGN KEY ("codcta") REFERENCES "contabb" ("codcta");
  
ALTER TABLE "contabc1m" ALTER COLUMN numasi TYPE numeric(3);
        
CREATE INDEX "contabc1m_index_01" ON "contabc1m" ("numcon","codcta","feccom");

  ALTER TABLE "contabb1his" ADD CONSTRAINT "contabb1his_FK_1" FOREIGN KEY ("codcta") REFERENCES "contabb" ("codcta");
  