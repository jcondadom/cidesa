
  ALTER TABLE "ccopcgen" ADD CONSTRAINT "ccopcgen_FK_1" FOREIGN KEY ("tipcom") REFERENCES "cpdoccom" ("tipcom") ON UPDATE RESTRICT ON DELETE RESTRICT;
  
ALTER TABLE "ccactana" ALTER COLUMN observ TYPE character varying;
        
ALTER TABLE "ccactana" ALTER COLUMN nomact TYPE character varying;
        
ALTER TABLE "ccactana" ALTER COLUMN desact TYPE character varying;
        
ALTER TABLE "ccactana" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccacteco" ALTER COLUMN nomacteco TYPE character varying;
        
ALTER TABLE "ccacteco" ALTER COLUMN desacteco TYPE character varying;
        
ALTER TABLE "ccactivi" ALTER COLUMN nomact TYPE character varying;
        
ALTER TABLE "ccactivi" ALTER COLUMN desact TYPE character varying;
        
ALTER TABLE "ccagenci" ALTER COLUMN dirage TYPE character varying;
        
ALTER TABLE "ccagenci" ALTER COLUMN telage TYPE character varying;
        
ALTER TABLE "ccagenci" ALTER COLUMN telage2 TYPE character varying;
        
ALTER TABLE "ccagenci" ALTER COLUMN faxage TYPE character varying;
        
ALTER TABLE "ccagenci" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccagenci" ALTER COLUMN codaretel2 TYPE character varying;
        
ALTER TABLE "ccagenci" ALTER COLUMN codarefax TYPE character varying;
        
ALTER TABLE "ccamoact" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccamoactresp" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccamopag" ALTER COLUMN cedrifcue TYPE character varying;
        
ALTER TABLE "ccamopag" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccamoprin" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccanalis" ALTER COLUMN nomana TYPE character varying;
        
ALTER TABLE "ccanalis" ALTER COLUMN sexana TYPE character varying;
        
ALTER TABLE "ccanalis" ALTER COLUMN telana TYPE character varying;
        
ALTER TABLE "ccanalis" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccanalis" ALTER COLUMN codarecel TYPE character varying;
        
ALTER TABLE "ccanalis" ALTER COLUMN dirana TYPE character varying;
        
ALTER TABLE "ccanalis" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccareger" ALTER COLUMN nomare TYPE character varying;
        
ALTER TABLE "ccareger" ALTER COLUMN desare TYPE character varying;
        
ALTER TABLE "ccareger" ALTER COLUMN objare TYPE character varying;
        
ALTER TABLE "ccavalis" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccavalis" ALTER COLUMN codarecel TYPE character varying;
        
ALTER TABLE "ccavalis" ALTER COLUMN codareotro TYPE character varying;
        
ALTER TABLE "ccbanco" ALTER COLUMN nomban TYPE character varying;
        
ALTER TABLE "ccbanco" ALTER COLUMN abrban TYPE character varying;
        
ALTER TABLE "ccbanco" ALTER COLUMN dirban TYPE character varying;
        
ALTER TABLE "ccbanco" ALTER COLUMN nompercon TYPE character varying;
        
ALTER TABLE "ccbanco" ALTER COLUMN telpercon TYPE character varying;
        
ALTER TABLE "ccbanco" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccbaremo" ALTER COLUMN nombar TYPE character varying;
        
ALTER TABLE "ccbenefi" ALTER COLUMN nomben TYPE character varying;
        
ALTER TABLE "ccbenefi" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccbenefi" ALTER COLUMN codarecel TYPE character varying;
        
ALTER TABLE "ccbenefi" ALTER COLUMN codarefax TYPE character varying;
        
ALTER TABLE "ccbenefi" ALTER COLUMN espacteco TYPE character varying;
        
ALTER TABLE "ccbieadq" ALTER COLUMN diaofe TYPE character varying;
        
ALTER TABLE "cccargo" ALTER COLUMN nomcar TYPE character varying;
        
ALTER TABLE "cccargo" ALTER COLUMN descar TYPE character varying;
        
ALTER TABLE "ccclaact" ALTER COLUMN nomclaact TYPE character varying;
        
ALTER TABLE "ccclaact" ALTER COLUMN desclaact TYPE character varying;
        
ALTER TABLE "ccclainf" ALTER COLUMN nominf TYPE character varying;
        
ALTER TABLE "ccclainf" ALTER COLUMN desinf TYPE character varying;
        
ALTER TABLE "cccodare" ALTER COLUMN codarea TYPE character varying;
        
ALTER TABLE "cccodtra" ALTER COLUMN descodtra TYPE character varying;
        
ALTER TABLE "cccodtra" ALTER COLUMN observ TYPE character varying;
        
ALTER TABLE "ccconbalger" ALTER COLUMN nomconbalger TYPE character varying;
        
ALTER TABLE "ccconben" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccconben" ALTER COLUMN codarecel TYPE character varying;
        
ALTER TABLE "ccconcep" ALTER COLUMN nomcon TYPE character varying;
        
ALTER TABLE "ccconcep" ALTER COLUMN descon TYPE character varying;
        
ALTER TABLE "ccconcep" ALTER COLUMN codpar TYPE character varying;
        
ALTER TABLE "ccconpag" ALTER COLUMN tipo TYPE character varying;
        
ALTER TABLE "cccredit" ALTER COLUMN numexp TYPE character varying;
        
ALTER TABLE "cccredit" ALTER COLUMN natcre TYPE character varying;
        
ALTER TABLE "cccredit" ALTER COLUMN destino TYPE character varying;
        
ALTER TABLE "cccredit" ALTER COLUMN actapr TYPE character varying;
        
ALTER TABLE "cccredit" ALTER COLUMN numcue TYPE character varying;
        
ALTER TABLE "cccredit" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "cccredit" ALTER COLUMN observ TYPE character varying;
        
ALTER TABLE "cccrereg" ALTER COLUMN observ TYPE character varying;
        
ALTER TABLE "cccrereg" ALTER COLUMN protoc TYPE character varying;
        
ALTER TABLE "cccrereg" ALTER COLUMN trimes TYPE character varying;
        
ALTER TABLE "cccreses" ALTER COLUMN motivo TYPE character varying;
        
ALTER TABLE "cccreses" ALTER COLUMN obsres TYPE character varying;
        
ALTER TABLE "cccreses" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "cccuades" ALTER COLUMN orddes TYPE character varying;
        
ALTER TABLE "cccuades" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "cccueban" ALTER COLUMN numcue TYPE character varying;
        
ALTER TABLE "cccueban" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccdebcueres" ALTER COLUMN observ TYPE character varying;
        
ALTER TABLE "ccdeducc" ALTER COLUMN nomded TYPE character varying;
        
ALTER TABLE "ccdeducc" ALTER COLUMN unided TYPE character varying;
        
ALTER TABLE "ccdeducc" ALTER COLUMN codcta TYPE character varying;
        
ALTER TABLE "ccdefamo" ALTER COLUMN observ TYPE character varying;
        
ALTER TABLE "ccdircorben" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccdircorben" ALTER COLUMN codarecel TYPE character varying;
        
ALTER TABLE "ccdircorben" ALTER COLUMN codarefax TYPE character varying;
        
ALTER TABLE "ccdocane" ALTER COLUMN nomdocane TYPE character varying;
        
ALTER TABLE "ccdocane" ALTER COLUMN desdocane TYPE character varying;
        
ALTER TABLE "ccestado" ALTER COLUMN nomest TYPE character varying;
        
ALTER TABLE "ccestado" ALTER COLUMN nomcoo TYPE character varying;
        
ALTER TABLE "ccestado" ALTER COLUMN telcoo TYPE character varying;
        
ALTER TABLE "ccestado" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccestado" ALTER COLUMN dirofi TYPE character varying;
        
ALTER TABLE "ccestatu" ALTER COLUMN alias TYPE character varying;
        
ALTER TABLE "ccestatu" ALTER COLUMN nombre TYPE character varying;
        
ALTER TABLE "ccestatu" ALTER COLUMN comentario TYPE character varying;
        
ALTER TABLE "ccestcred" ALTER COLUMN memo TYPE character varying;
        
ALTER TABLE "ccfiador" ALTER COLUMN nomfia TYPE character varying;
        
ALTER TABLE "ccfiador" ALTER COLUMN cedfia TYPE character varying;
        
ALTER TABLE "ccfiador" ALTER COLUMN telfia TYPE character varying;
        
ALTER TABLE "ccfiador" ALTER COLUMN celfia TYPE character varying;
        
ALTER TABLE "ccfiador" ALTER COLUMN dirfia TYPE character varying;
        
ALTER TABLE "ccfiador" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccfiador" ALTER COLUMN codarecel TYPE character varying;
        
ALTER TABLE "ccfreneco" ALTER COLUMN nomfre TYPE character varying;
        
ALTER TABLE "ccfreneco" ALTER COLUMN desfre TYPE character varying;
        
ALTER TABLE "ccfuefin" ALTER COLUMN nomfuefin TYPE character varying;
        
ALTER TABLE "ccfuefin" ALTER COLUMN alias TYPE character varying;
        
ALTER TABLE "ccfuefin" ALTER COLUMN rif TYPE character varying;
        
ALTER TABLE "ccgarant" ALTER COLUMN nomgar TYPE character varying;
        
ALTER TABLE "ccgarant" ALTER COLUMN desgar TYPE character varying;
        
ALTER TABLE "ccgarsol" ALTER COLUMN nomgar TYPE character varying;
        
ALTER TABLE "ccgarsol" ALTER COLUMN desgar TYPE character varying;
        
ALTER TABLE "ccgerenc" ALTER COLUMN nomger TYPE character varying;
        
ALTER TABLE "ccgerenc" ALTER COLUMN desger TYPE character varying;
        
ALTER TABLE "ccgerenc" ALTER COLUMN objger TYPE character varying;
        
ALTER TABLE "ccgescob" ALTER COLUMN tipacc TYPE character varying;
        
ALTER TABLE "ccgescob" ALTER COLUMN numdep TYPE character varying;
        
ALTER TABLE "ccindica" ALTER COLUMN nomind TYPE character varying;
        
ALTER TABLE "ccindica" ALTER COLUMN formula TYPE character varying;
        
ALTER TABLE "ccindica" ALTER COLUMN operandos TYPE character varying;
        
ALTER TABLE "ccinform" ALTER COLUMN titulo TYPE character varying;
        
ALTER TABLE "ccinform" ALTER COLUMN conten TYPE character varying;
        
ALTER TABLE "ccliquid" ALTER COLUMN ordliq TYPE character varying;
        
ALTER TABLE "ccliquid" ALTER COLUMN numche TYPE character varying;
        
ALTER TABLE "ccliquid" ALTER COLUMN estche TYPE character varying;
        
ALTER TABLE "ccmunici" ALTER COLUMN nommun TYPE character varying;
        
ALTER TABLE "ccopcion" ALTER COLUMN nomopc TYPE character varying;
        
ALTER TABLE "ccopcion" ALTER COLUMN desopc TYPE character varying;
        
ALTER TABLE "ccpago" ALTER COLUMN numtra TYPE character varying;
        
ALTER TABLE "ccpago" ALTER COLUMN numcue TYPE character varying;
        
ALTER TABLE "ccpago" ALTER COLUMN cedrifcue TYPE character varying;
        
ALTER TABLE "ccpagres" ALTER COLUMN detres TYPE character varying;
        
ALTER TABLE "ccpagter" ALTER COLUMN nomter TYPE character varying;
        
ALTER TABLE "ccpagter" ALTER COLUMN rifter TYPE character varying;
        
ALTER TABLE "ccpagter" ALTER COLUMN telter TYPE character varying;
        
ALTER TABLE "ccpagter" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccpagter" ALTER COLUMN dirtel TYPE character varying;
        
ALTER TABLE "ccpagter" ALTER COLUMN observ TYPE character varying;
        
ALTER TABLE "ccparamo" ALTER COLUMN nombre TYPE character varying;
        
ALTER TABLE "ccparpro" ALTER COLUMN coduni TYPE character varying;
        
ALTER TABLE "ccparroq" ALTER COLUMN nompar TYPE character varying;
        
ALTER TABLE "ccpartid" ALTER COLUMN nompar TYPE character varying;
        
ALTER TABLE "ccperben" ALTER COLUMN nomperben TYPE character varying;
        
ALTER TABLE "ccperben" ALTER COLUMN cedperben TYPE character varying;
        
ALTER TABLE "ccperben" ALTER COLUMN dirperben TYPE character varying;
        
ALTER TABLE "ccperben" ALTER COLUMN telperben TYPE character varying;
        
ALTER TABLE "ccperben" ALTER COLUMN celular TYPE character varying;
        
ALTER TABLE "ccperben" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccperben" ALTER COLUMN codarecel TYPE character varying;
        
ALTER TABLE "ccperben" ALTER COLUMN sexperben TYPE character varying;
        
ALTER TABLE "ccperben" ALTER COLUMN email TYPE character varying;
        
ALTER TABLE "ccperiod" ALTER COLUMN desper TYPE character varying;
        
ALTER TABLE "ccperiod" ALTER COLUMN alias TYPE character varying;
        
ALTER TABLE "ccperparamo" ALTER COLUMN nomper TYPE character varying;
        
ALTER TABLE "ccperparamo" ALTER COLUMN desper TYPE character varying;
        
ALTER TABLE "ccprogra" ALTER COLUMN nompro TYPE character varying;
        
ALTER TABLE "ccprogra" ALTER COLUMN coduni TYPE character varying;
        
ALTER TABLE "ccprogra" ALTER COLUMN codcat TYPE character varying;
        
ALTER TABLE "ccprogra" ALTER COLUMN objeto TYPE character varying;
        
ALTER TABLE "ccprogra" ALTER COLUMN destino TYPE character varying;
        
ALTER TABLE "ccprogra" ALTER COLUMN condic TYPE character varying;
        
ALTER TABLE "ccprogra" ALTER COLUMN garant TYPE character varying;
        
ALTER TABLE "ccprogra" ALTER COLUMN recaud TYPE character varying;
        
ALTER TABLE "ccprogra" ALTER COLUMN plafin TYPE character varying;
        
ALTER TABLE "ccprogra" ALTER COLUMN nomprocom TYPE character varying;
        
ALTER TABLE "ccprogra" ALTER COLUMN tipcom TYPE character varying;
        
  ALTER TABLE "ccprogra" ADD CONSTRAINT "ccprogra_FK_3" FOREIGN KEY ("tipcom") REFERENCES "cpdoccom" ("tipcom") ON UPDATE RESTRICT ON DELETE RESTRICT;
  
ALTER TABLE "ccproyec" ALTER COLUMN introd TYPE character varying;
        
ALTER TABLE "ccproyec" ALTER COLUMN resume TYPE character varying;
        
ALTER TABLE "ccproyec" ALTER COLUMN estmer TYPE character varying;
        
ALTER TABLE "ccproyec" ALTER COLUMN tamloc TYPE character varying;
        
ALTER TABLE "ccproyec" ALTER COLUMN ingpro TYPE character varying;
        
ALTER TABLE "ccproyec" ALTER COLUMN aposoc TYPE character varying;
        
ALTER TABLE "ccproyec" ALTER COLUMN invfin TYPE character varying;
        
ALTER TABLE "ccproyec" ALTER COLUMN profin TYPE character varying;
        
ALTER TABLE "ccproyec" ALTER COLUMN anafin TYPE character varying;
        
ALTER TABLE "ccproyec" ALTER COLUMN anexos TYPE character varying;
        
ALTER TABLE "ccproyec" ALTER COLUMN recome TYPE character varying;
        
ALTER TABLE "ccproyec" ALTER COLUMN observ TYPE character varying;
        
ALTER TABLE "ccrecaud" ALTER COLUMN nomrec TYPE character varying;
        
ALTER TABLE "ccrecaud" ALTER COLUMN desrec TYPE character varying;
        
ALTER TABLE "ccrecaud" ALTER COLUMN alias TYPE character varying;
        
ALTER TABLE "ccrecdes" ALTER COLUMN obsrec TYPE character varying;
        
ALTER TABLE "ccrecdes" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccrecpro" ALTER COLUMN obsrec TYPE character varying;
        
ALTER TABLE "ccrecprocre" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccregnot" ALTER COLUMN nomregnot TYPE character varying;
        
ALTER TABLE "ccregnot" ALTER COLUMN desregnot TYPE character varying;
        
ALTER TABLE "ccregnot" ALTER COLUMN dirregnot TYPE character varying;
        
ALTER TABLE "ccregnot" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccregnot" ALTER COLUMN numtelreg TYPE character varying;
        
ALTER TABLE "ccregnot" ALTER COLUMN codaretel2 TYPE character varying;
        
ALTER TABLE "ccregnot" ALTER COLUMN numtelreg2 TYPE character varying;
        
ALTER TABLE "ccrepben" ALTER COLUMN codaretel TYPE character varying;
        
ALTER TABLE "ccrepben" ALTER COLUMN codarecel TYPE character varying;
        
ALTER TABLE "ccrepben" ALTER COLUMN codarefax TYPE character varying;
        
ALTER TABLE "ccresbar" ALTER COLUMN descri TYPE character varying;
        
ALTER TABLE "ccrespue" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccrespue" ALTER COLUMN nomfis TYPE character varying;
        
ALTER TABLE "ccrespue" ALTER COLUMN observ TYPE character varying;
        
ALTER TABLE "ccrevisi" ALTER COLUMN coment TYPE character varying;
        
ALTER TABLE "ccrevisi" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccsesion" ALTER COLUMN observ TYPE character varying;
        
ALTER TABLE "ccsesion" ALTER COLUMN hora TYPE character varying;
        
ALTER TABLE "ccsesion" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccsoldes" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccsoldes" ALTER COLUMN observacion TYPE character varying;
        
ALTER TABLE "ccsoldes" ALTER COLUMN desanu TYPE character varying;
        
ALTER TABLE "ccsolinf" ALTER COLUMN nomsolinf TYPE character varying;
        
ALTER TABLE "ccsolinf" ALTER COLUMN obssolinf TYPE character varying;
        
ALTER TABLE "ccsolliq" ALTER COLUMN numsolliq TYPE character varying;
        
ALTER TABLE "ccsolliq" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "ccsolliq" ALTER COLUMN observ TYPE character varying;
        
ALTER TABLE "ccsolliq" ALTER COLUMN desanu TYPE character varying;
        
ALTER TABLE "ccsolses" ALTER COLUMN motivo TYPE character varying;
        
ALTER TABLE "ccsolses" ALTER COLUMN obsres TYPE character varying;
        
ALTER TABLE "ccsolses" ALTER COLUMN estatu TYPE character varying;
        
ALTER TABLE "cctipana" ALTER COLUMN nomtipana TYPE character varying;
        
ALTER TABLE "cctipana" ALTER COLUMN destipana TYPE character varying;
        
ALTER TABLE "cctipcar" ALTER COLUMN nomtipcar TYPE character varying;
        
ALTER TABLE "cctipcar" ALTER COLUMN destipcar TYPE character varying;
        
ALTER TABLE "cctipdes" ALTER COLUMN nomtipdes TYPE character varying;
        
ALTER TABLE "cctipdes" ALTER COLUMN destipdes TYPE character varying;
        
ALTER TABLE "cctipgar" ALTER COLUMN nomtipgar TYPE character varying;
        
ALTER TABLE "cctipgar" ALTER COLUMN destipgar TYPE character varying;
        
ALTER TABLE "cctipint" ALTER COLUMN nomtipint TYPE character varying;
        
ALTER TABLE "cctipliq" ALTER COLUMN nomtipliq TYPE character varying;
        
ALTER TABLE "cctipliq" ALTER COLUMN destipliq TYPE character varying;
        
ALTER TABLE "cctipmon" ALTER COLUMN nomtipmon TYPE character varying;
        
ALTER TABLE "cctipmon" ALTER COLUMN abrtipmon TYPE character varying;
        
ALTER TABLE "cctippro" ALTER COLUMN nomtippro TYPE character varying;
        
ALTER TABLE "cctippro" ALTER COLUMN destippro TYPE character varying;
        
ALTER TABLE "cctippro" ALTER COLUMN empcoop TYPE character varying;
        
ALTER TABLE "cctiptra" ALTER COLUMN nomtiptra TYPE character varying;
        
ALTER TABLE "cctiptra" ALTER COLUMN destiptra TYPE character varying;
        
ALTER TABLE "cctipups" ALTER COLUMN nomtipups TYPE character varying;
        
ALTER TABLE "cctipups" ALTER COLUMN destipups TYPE character varying;
        
ALTER TABLE "cctitulo" ALTER COLUMN pregunta TYPE character varying;
        
ALTER TABLE "ccvariab" ALTER COLUMN nomvar TYPE character varying;
        