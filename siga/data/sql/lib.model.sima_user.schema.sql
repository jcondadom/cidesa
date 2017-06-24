
ALTER TABLE "empresa" ALTER COLUMN nomemp TYPE character varying(50);
        
ALTER TABLE "empresa" ALTER COLUMN diremp TYPE character varying(50);
        
  ALTER TABLE "segperesp" ADD CONSTRAINT "segperesp_FK_1" FOREIGN KEY ("cedemp") REFERENCES "usuarios" ("cedemp");
  
ALTER TABLE "publicidad" ALTER COLUMN id TYPE character varying;
        
ALTER TABLE "detpublic" ALTER COLUMN id_pub TYPE character varying;
        
ALTER TABLE "detpublic" ALTER COLUMN id TYPE character varying;
        
ALTER TABLE "logs_impresoras" ALTER COLUMN numero_factura TYPE character varying;
        
ALTER TABLE "logs_impresoras" ALTER COLUMN numero_devolucion TYPE character varying;
        
ALTER TABLE "logs_impresoras" ALTER COLUMN error TYPE character varying;
        
ALTER TABLE "logs_impresoras" ALTER COLUMN serial_impresora TYPE character varying;
        
ALTER TABLE "logs_impresoras" ALTER COLUMN fecha TYPE character varying;
        
ALTER TABLE "logs_impresoras" ALTER COLUMN hora TYPE character varying;
        