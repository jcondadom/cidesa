
  ALTER TABLE "fcapulic" ADD CONSTRAINT "fcapulic_FK_1" FOREIGN KEY ("rifcon") REFERENCES "fcconrep" ("rifcon");
  
  ALTER TABLE "fcapulic" ADD CONSTRAINT "fcapulic_FK_2" FOREIGN KEY ("rifrep") REFERENCES "fcconrep" ("rifcon");
  
ALTER TABLE "fcconrep" ALTER COLUMN tem TYPE numeric(8);
        
ALTER TABLE "fcdefins" ALTER COLUMN loncodact TYPE numeric(2);
        
ALTER TABLE "fcdefins" ALTER COLUMN loncodveh TYPE numeric(2);
        
ALTER TABLE "fcdefins" ALTER COLUMN loncodcat TYPE numeric(2);
        
ALTER TABLE "fcdefins" ALTER COLUMN loncodubifis TYPE numeric(2);
        
ALTER TABLE "fcdefins" ALTER COLUMN loncodubimag TYPE numeric(2);
        
ALTER TABLE "fcdefins" ALTER COLUMN rupact TYPE numeric(2);
        
ALTER TABLE "fcdefins" ALTER COLUMN rupveh TYPE numeric(2);
        
ALTER TABLE "fcdefins" ALTER COLUMN rupcat TYPE numeric(2);
        
ALTER TABLE "fcdefins" ALTER COLUMN rupubifis TYPE numeric(2);
        
ALTER TABLE "fcdefins" ALTER COLUMN rupubimag TYPE numeric(2);
        
ALTER TABLE "fcdefnca" ALTER COLUMN numniv TYPE numeric(2);
        
ALTER TABLE "fcdefnca" ALTER COLUMN tamano1 TYPE numeric(1);
        
ALTER TABLE "fcdefnca" ALTER COLUMN tamano2 TYPE numeric(1);
        
ALTER TABLE "fcdefnca" ALTER COLUMN tamano3 TYPE numeric(1);
        
ALTER TABLE "fcdefnca" ALTER COLUMN tamano4 TYPE numeric(1);
        
ALTER TABLE "fcdefnca" ALTER COLUMN tamano5 TYPE numeric(1);
        
ALTER TABLE "fcdefnca" ALTER COLUMN tamano6 TYPE numeric(1);
        
ALTER TABLE "fcdefnca" ALTER COLUMN tamano7 TYPE numeric(1);
        
ALTER TABLE "fcdefnca" ALTER COLUMN tamano8 TYPE numeric(1);
        
ALTER TABLE "fcdefnca" ALTER COLUMN tamano9 TYPE numeric(1);
        
ALTER TABLE "fcdefnca" ALTER COLUMN tamano10 TYPE numeric(10);
        
ALTER TABLE "fcdefnca" ALTER COLUMN numper TYPE numeric(3);
        
ALTER TABLE "fcdprinm" ALTER COLUMN antinm TYPE numeric;
        
ALTER TABLE "fcfuepre" ALTER COLUMN frecob TYPE numeric(3);
        
ALTER TABLE "fcfuepre" ALTER COLUMN permor TYPE numeric(3);
        
ALTER TABLE "fcfuepre" ALTER COLUMN perppg TYPE numeric(3);
        
ALTER TABLE "fcfuepre" ALTER COLUMN liqact TYPE numeric(15);
        
ALTER TABLE "fcfuepre" ALTER COLUMN diavso TYPE numeric(3);
        
ALTER TABLE "fcfuepre" ALTER COLUMN diaven TYPE numeric(10);
        
ALTER TABLE "fcmodlic" ALTER COLUMN capsoc TYPE numeric(15);
        
ALTER TABLE "fcmodlic" ALTER COLUMN discli TYPE numeric(10);
        
ALTER TABLE "fcmodlic" ALTER COLUMN disbar TYPE numeric(10);
        
ALTER TABLE "fcmodlic" ALTER COLUMN disdis TYPE numeric(10);
        
ALTER TABLE "fcmodlic" ALTER COLUMN disins TYPE numeric(10);
        
ALTER TABLE "fcmodlic" ALTER COLUMN disfun TYPE numeric(10);
        
ALTER TABLE "fcmodlic" ALTER COLUMN disest TYPE numeric(10);
        
ALTER TABLE "fcmodlic" ALTER COLUMN taslic TYPE numeric(15);
        
ALTER TABLE "fcmodlic" ALTER COLUMN deuanl TYPE numeric(15);
        
ALTER TABLE "fcmodlic" ALTER COLUMN deuacl TYPE numeric(15);
        
ALTER TABLE "fcmodlic" ALTER COLUMN implic TYPE numeric(15);
        
ALTER TABLE "fcmodlic" ALTER COLUMN deuanp TYPE numeric(15);
        
ALTER TABLE "fcmodlic" ALTER COLUMN deuacp TYPE numeric(15);
        
ALTER TABLE "fcmodlic" ALTER COLUMN capact TYPE numeric(15);
        
ALTER TABLE "fcmodlic" ALTER COLUMN impext TYPE numeric(15);
        
ALTER TABLE "fcmodlic" ALTER COLUMN imptotal TYPE numeric(15);
        
ALTER TABLE "fcmodveh" ALTER COLUMN anoveh TYPE numeric(4);
        
ALTER TABLE "fcmodveh" ALTER COLUMN anovehant TYPE numeric(4);
        
ALTER TABLE "fcrangosdes" ALTER COLUMN diasdesde TYPE numeric;
        
ALTER TABLE "fcrangosdes" ALTER COLUMN diashasta TYPE numeric;
        
ALTER TABLE "fcrangosdes" ALTER COLUMN valor TYPE numeric;
        
ALTER TABLE "fcrangosmul" ALTER COLUMN diasdesde TYPE numeric;
        
ALTER TABLE "fcrangosmul" ALTER COLUMN diashasta TYPE numeric;
        
ALTER TABLE "fcrangosmul" ALTER COLUMN valor TYPE numeric;
        
ALTER TABLE "fcrangosrec" ALTER COLUMN diasdesde TYPE numeric;
        
ALTER TABLE "fcrangosrec" ALTER COLUMN diashasta TYPE numeric;
        
ALTER TABLE "fcrangosrec" ALTER COLUMN valor TYPE numeric;
        
ALTER TABLE "fcrecdes" ALTER COLUMN dias TYPE numeric(3);
        
ALTER TABLE "fcrecdesg" ALTER COLUMN dias TYPE numeric(3);
        
ALTER TABLE "fcrepliq" ALTER COLUMN moning TYPE numeric(14,2);
        
ALTER TABLE "fcrepliq" ALTER COLUMN monimp TYPE numeric(14,2);
        
ALTER TABLE "fcsollic" ALTER COLUMN capsoc TYPE numeric(15);
        
ALTER TABLE "fcsollic" ALTER COLUMN discli TYPE numeric(10);
        
ALTER TABLE "fcsollic" ALTER COLUMN disbar TYPE numeric(10);
        
ALTER TABLE "fcsollic" ALTER COLUMN disdis TYPE numeric(10);
        
ALTER TABLE "fcsollic" ALTER COLUMN disins TYPE numeric(10);
        
ALTER TABLE "fcsollic" ALTER COLUMN disfun TYPE numeric(10);
        
ALTER TABLE "fcsollic" ALTER COLUMN disest TYPE numeric(10);
        
ALTER TABLE "fcsollic" ALTER COLUMN taslic TYPE numeric(15);
        
ALTER TABLE "fcsollic" ALTER COLUMN deuanl TYPE numeric(15);
        
ALTER TABLE "fcsollic" ALTER COLUMN deuacl TYPE numeric(15);
        
ALTER TABLE "fcsollic" ALTER COLUMN implic TYPE numeric(15);
        
ALTER TABLE "fcsollic" ALTER COLUMN deuanp TYPE numeric(15);
        
ALTER TABLE "fcsollic" ALTER COLUMN deuacp TYPE numeric(15);
        
ALTER TABLE "fcsollic" ALTER COLUMN capact TYPE numeric(15);
        
ALTER TABLE "fcsollic" ALTER COLUMN impext TYPE numeric(15);
        
ALTER TABLE "fcsollic" ALTER COLUMN imptotal TYPE numeric(15);
        
ALTER TABLE "fctasban" ALTER COLUMN tasmes TYPE numeric(2);
        
ALTER TABLE "fcregveh" ALTER COLUMN anoveh TYPE numeric(4);
        
ALTER TABLE "fcregveh" ALTER COLUMN capveh TYPE numeric;
        
ALTER TABLE "fcregveh" ALTER COLUMN pesveh TYPE numeric;
        
ALTER TABLE "fcregveh" ALTER COLUMN tipveh TYPE numeric;
        
  ALTER TABLE "fcdetliq" ADD CONSTRAINT "fcdetliq_FK_1" FOREIGN KEY ("numliq") REFERENCES "fcliqpag" ("numliq");
  
  ALTER TABLE "fcdetliq" ADD CONSTRAINT "fcdetliq_FK_2" FOREIGN KEY ("numpag") REFERENCES "fcpagos" ("numpag");
  
  ALTER TABLE "fcdetliq" ADD CONSTRAINT "fcdetliq_FK_3" FOREIGN KEY ("rifcon") REFERENCES "fcconrep" ("rifcon");
  