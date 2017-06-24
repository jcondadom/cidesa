
  ALTER TABLE "liregforpagcont" ADD CONSTRAINT "liregforpagcont_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "lidetactforpag" ADD CONSTRAINT "lidetactforpag_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "lidetactforpag" ADD CONSTRAINT "lidetactforpag_FK_2" FOREIGN KEY ("numact") REFERENCES "liactas" ("numact");
  
  ALTER TABLE "liactas" ADD CONSTRAINT "liactas_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "liactas" ADD CONSTRAINT "liactas_FK_2" FOREIGN KEY ("codtipact") REFERENCES "litipact" ("codtipact");
  
  ALTER TABLE "liactas" ADD CONSTRAINT "liactas_FK_3" FOREIGN KEY ("codempadm") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "liactas" ADD CONSTRAINT "liactas_FK_4" FOREIGN KEY ("codempeje") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "liregfiacont" ADD CONSTRAINT "liregfiacont_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "liregfiacont" ADD CONSTRAINT "liregfiacont_FK_2" FOREIGN KEY ("codcomres") REFERENCES "liccomres" ("codcomres");
  
  ALTER TABLE "lidetactfiacont" ADD CONSTRAINT "lidetactfiacont_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "lidetactfiacont" ADD CONSTRAINT "lidetactfiacont_FK_2" FOREIGN KEY ("numact") REFERENCES "liactas" ("numact");
  
  ALTER TABLE "livaluaciones" ADD CONSTRAINT "livaluaciones_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "livaluaciones" ADD CONSTRAINT "livaluaciones_FK_2" FOREIGN KEY ("codempadm") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "livaluaciones" ADD CONSTRAINT "livaluaciones_FK_3" FOREIGN KEY ("codempeje") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "lidetparval" ADD CONSTRAINT "lidetparval_FK_1" FOREIGN KEY ("numval") REFERENCES "livaluaciones" ("numval");
  
  ALTER TABLE "liinspecciones" ADD CONSTRAINT "liinspecciones_FK_1" FOREIGN KEY ("numval") REFERENCES "livaluaciones" ("numval");
  
  ALTER TABLE "liinspecciones" ADD CONSTRAINT "liinspecciones_FK_2" FOREIGN KEY ("codempadm") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "liinspecciones" ADD CONSTRAINT "liinspecciones_FK_3" FOREIGN KEY ("codempeje") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "lidetparins" ADD CONSTRAINT "lidetparins_FK_1" FOREIGN KEY ("numins") REFERENCES "liinspecciones" ("numins");
  
  ALTER TABLE "lidetactins" ADD CONSTRAINT "lidetactins_FK_1" FOREIGN KEY ("numins") REFERENCES "liinspecciones" ("numins");
  
  ALTER TABLE "lidetactins" ADD CONSTRAINT "lidetactins_FK_2" FOREIGN KEY ("numact") REFERENCES "liactas" ("numact");
  
  ALTER TABLE "lientregas" ADD CONSTRAINT "lientregas_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "lientregas" ADD CONSTRAINT "lientregas_FK_2" FOREIGN KEY ("codempadm") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "lientregas" ADD CONSTRAINT "lientregas_FK_3" FOREIGN KEY ("codempeje") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "lidetcroentcont" ADD CONSTRAINT "lidetcroentcont_FK_1" FOREIGN KEY ("nument") REFERENCES "lientregas" ("nument");
  
  ALTER TABLE "lidetcroentcont" ADD CONSTRAINT "lidetcroentcont_FK_2" FOREIGN KEY ("coduniadm") REFERENCES "liuniadm" ("coduniadm");
  
  ALTER TABLE "lidetcroentcont" ADD CONSTRAINT "lidetcroentcont_FK_3" FOREIGN KEY ("licroent_id") REFERENCES "licroent" ("id");
  
  ALTER TABLE "lidetcroentcontob" ADD CONSTRAINT "lidetcroentcontob_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "lidetcroentcontob" ADD CONSTRAINT "lidetcroentcontob_FK_2" FOREIGN KEY ("coduniadm") REFERENCES "liuniadm" ("coduniadm");
  
  ALTER TABLE "lidetcroentcontob" ADD CONSTRAINT "lidetcroentcontob_FK_3" FOREIGN KEY ("licroent_id") REFERENCES "licroent" ("id");
  
  ALTER TABLE "lidetactcroent" ADD CONSTRAINT "lidetactcroent_FK_1" FOREIGN KEY ("numsolpag") REFERENCES "lisolpag" ("numsolpag");
  
  ALTER TABLE "lidetactcroent" ADD CONSTRAINT "lidetactcroent_FK_2" FOREIGN KEY ("numact") REFERENCES "liactas" ("numact");
  
  ALTER TABLE "liactdescont" ADD CONSTRAINT "liactdescont_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "liactdescont" ADD CONSTRAINT "liactdescont_FK_2" FOREIGN KEY ("codempadm") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "liactdescont" ADD CONSTRAINT "liactdescont_FK_3" FOREIGN KEY ("codempeje") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "lidetactactdescont" ADD CONSTRAINT "lidetactactdescont_FK_1" FOREIGN KEY ("numactdes") REFERENCES "liactdescont" ("numactdes");
  
  ALTER TABLE "lidetactactdescont" ADD CONSTRAINT "lidetactactdescont_FK_2" FOREIGN KEY ("numact") REFERENCES "liactas" ("numact");
  
  ALTER TABLE "lisolpag" ADD CONSTRAINT "lisolpag_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "lisolpag" ADD CONSTRAINT "lisolpag_FK_2" FOREIGN KEY ("numval") REFERENCES "livaluaciones" ("numval");
  
  ALTER TABLE "lisolpag" ADD CONSTRAINT "lisolpag_FK_3" FOREIGN KEY ("codempadm") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "lisolpag" ADD CONSTRAINT "lisolpag_FK_4" FOREIGN KEY ("codempeje") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "lidetactsolpag" ADD CONSTRAINT "lidetactsolpag_FK_1" FOREIGN KEY ("numsolpag") REFERENCES "lisolpag" ("numsolpag");
  
  ALTER TABLE "lidetactsolpag" ADD CONSTRAINT "lidetactsolpag_FK_2" FOREIGN KEY ("numact") REFERENCES "liactas" ("numact");
  
  ALTER TABLE "lipenalizaciones" ADD CONSTRAINT "lipenalizaciones_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "lipenalizaciones" ADD CONSTRAINT "lipenalizaciones_FK_2" FOREIGN KEY ("codtippen") REFERENCES "litippen" ("codtippen");
  
  ALTER TABLE "lipenalizaciones" ADD CONSTRAINT "lipenalizaciones_FK_3" FOREIGN KEY ("codempadm") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "lipenalizaciones" ADD CONSTRAINT "lipenalizaciones_FK_4" FOREIGN KEY ("codempeje") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "lidetactpen" ADD CONSTRAINT "lidetactpen_FK_1" FOREIGN KEY ("numpen") REFERENCES "lipenalizaciones" ("numpen");
  
  ALTER TABLE "lidetactpen" ADD CONSTRAINT "lidetactpen_FK_2" FOREIGN KEY ("numact") REFERENCES "liactas" ("numact");
  
  ALTER TABLE "liregcondet" ADD CONSTRAINT "liregcondet_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "liregconrgo" ADD CONSTRAINT "liregconrgo_FK_1" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "limodcont" ADD CONSTRAINT "limodcont_FK_1" FOREIGN KEY ("tipmod") REFERENCES "litipmod" ("codtipmod");
  
  ALTER TABLE "limodcont" ADD CONSTRAINT "limodcont_FK_2" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "limodcont" ADD CONSTRAINT "limodcont_FK_3" FOREIGN KEY ("codtipmod") REFERENCES "litipmod" ("codtipmod");
  
  ALTER TABLE "limodcont" ADD CONSTRAINT "limodcont_FK_4" FOREIGN KEY ("codempadm") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "limodcont" ADD CONSTRAINT "limodcont_FK_5" FOREIGN KEY ("codempeje") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "liregmodcondet" ADD CONSTRAINT "liregmodcondet_FK_1" FOREIGN KEY ("nummod") REFERENCES "limodcont" ("nummod");
  
  ALTER TABLE "liaddendum" ADD CONSTRAINT "liaddendum_FK_1" FOREIGN KEY ("tipadd") REFERENCES "litipadd" ("codtipadd");
  
  ALTER TABLE "liaddendum" ADD CONSTRAINT "liaddendum_FK_2" FOREIGN KEY ("numcont") REFERENCES "licontrat" ("numcont");
  
  ALTER TABLE "liaddendum" ADD CONSTRAINT "liaddendum_FK_3" FOREIGN KEY ("codtipmod") REFERENCES "litipmod" ("codtipmod");
  
  ALTER TABLE "liaddendum" ADD CONSTRAINT "liaddendum_FK_4" FOREIGN KEY ("codempadm") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "liaddendum" ADD CONSTRAINT "liaddendum_FK_5" FOREIGN KEY ("codempeje") REFERENCES "lidatstedet" ("codemp");
  
  ALTER TABLE "liregaddcondet" ADD CONSTRAINT "liregaddcondet_FK_1" FOREIGN KEY ("numadd") REFERENCES "liaddendum" ("numadd");
  
  ALTER TABLE "lidetactmod" ADD CONSTRAINT "lidetactmod_FK_1" FOREIGN KEY ("nummod") REFERENCES "limodcont" ("nummod");
  
  ALTER TABLE "lidetactmod" ADD CONSTRAINT "lidetactmod_FK_2" FOREIGN KEY ("numact") REFERENCES "liactas" ("numact");
  
  ALTER TABLE "lidetactadd" ADD CONSTRAINT "lidetactadd_FK_1" FOREIGN KEY ("numadd") REFERENCES "liaddendum" ("numadd");
  
  ALTER TABLE "lidetactadd" ADD CONSTRAINT "lidetactadd_FK_2" FOREIGN KEY ("numact") REFERENCES "liactas" ("numact");
  
  ALTER TABLE "lidetcroentmodcont" ADD CONSTRAINT "lidetcroentmodcont_FK_1" FOREIGN KEY ("nummod") REFERENCES "limodcont" ("nummod");
  
  ALTER TABLE "lidetcroentmodcont" ADD CONSTRAINT "lidetcroentmodcont_FK_2" FOREIGN KEY ("coduniadm") REFERENCES "liuniadm" ("coduniadm");
  
  ALTER TABLE "lidetcroentmodcont" ADD CONSTRAINT "lidetcroentmodcont_FK_3" FOREIGN KEY ("lidetcroentcontob_id") REFERENCES "lidetcroentcontob" ("id");
  
  ALTER TABLE "liregforpagmodcont" ADD CONSTRAINT "liregforpagmodcont_FK_1" FOREIGN KEY ("nummod") REFERENCES "limodcont" ("nummod");
  
  ALTER TABLE "lidetcroentaddcont" ADD CONSTRAINT "lidetcroentaddcont_FK_1" FOREIGN KEY ("numadd") REFERENCES "liaddendum" ("numadd");
  
  ALTER TABLE "lidetcroentaddcont" ADD CONSTRAINT "lidetcroentaddcont_FK_2" FOREIGN KEY ("coduniadm") REFERENCES "liuniadm" ("coduniadm");
  
  ALTER TABLE "lidetcroentaddcont" ADD CONSTRAINT "lidetcroentaddcont_FK_3" FOREIGN KEY ("lidetcroentcont_id") REFERENCES "lidetcroentcont" ("id");
  
  ALTER TABLE "liregforpagaddcont" ADD CONSTRAINT "liregforpagaddcont_FK_1" FOREIGN KEY ("numadd") REFERENCES "liaddendum" ("numadd");
  