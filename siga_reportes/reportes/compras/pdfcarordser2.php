<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/general/funciones.php");
  require_once("../../lib/general/Herramientas.class.php");
  require_once("../../lib/modelo/sqls/compras/Carordser.class.php");


  class pdfreporte extends FPDF
  {

    var $i=0;
    var $bd;
    var $arrp=array();
    var $cab;
    var $titulo;
    var $ordcomdes;
    var $ordcomhas;
    var $codprodes;
    var $codprohas;
    var $codartdes;
    var $codarthas;
    var $fecorddes;
    var $fecordhas;
    var $status;
    var $tipcom;
    var $despacho;
    var $condicion;
    var $conf;
    var $dircon;
    var $dirgen;
    var $dircoo;

    function pdfreporte()
    {
      $this->conf="p";
      $this->fpdf($this->conf,"mm","Letter");
      $this->cab=new cabecera();
      //$this->bd=new basedatosAdo();
      $this->ordcomdes=str_replace('*',' ',H::GetPost("ordcomdes"));
      $this->ordcomhas=str_replace('*',' ',H::GetPost("ordcomhas"));
      $this->codprodes=str_replace('*',' ',H::GetPost("codprodes"));
      $this->codprohas=str_replace('*',' ',H::GetPost("codprohas"));
      $this->codartdes=str_replace('*',' ',H::GetPost("codartdes"));
      $this->codarthas=str_replace('*',' ',H::GetPost("codarthas"));
      $this->fecorddes=str_replace('*',' ',H::GetPost("fecorddes"));
      $this->fecordhas=str_replace('*',' ',H::GetPost("fecordhas"));
      $this->status=str_replace('*',' ',H::GetPost("status"));
      $this->tipcom=str_replace('*',' ',H::GetPost("tipcom"));
      $this->despacho=str_replace('*',' ',H::GetPost("despacho"));
      $this->coorcom=str_replace('*',' ',H::GetPost("coorcom"));
      $this->presidente=str_replace('*',' ',H::GetPost("presidente"));
      $this->dirgenr=str_replace('*',' ',H::GetPost("dirgenr"));
      $this->dirplappt=str_replace('*',' ',H::GetPost("dirplappt"));
      $this->dirgadm=str_replace('*',' ',H::GetPost("dirgadm"));
      $this->dircom=str_replace('*',' ',H::GetPost("dircom"));
      $this->analista=str_replace('*',' ',H::GetPost("analista"));
      $this->anabancins=str_replace('*',' ',H::GetPost("anabancins"));
      $this->dirbancins=str_replace('*',' ',H::GetPost("dirbancins"));
      $this->bd = new Carordser();
      $this->arrp = $this->bd->sqlp($this->ordcomdes,$this->ordcomhas,$this->codprodes,$this->codprohas,$this->codartdes,$this->codarthas,$this->fecorddes,$this->fecordhas,$this->status,$this->despacho,$this->tipcom);
    }


    function Header()
    {
      $this->SetAutoPageBreak(true,0.5);
      $this->SetFont("Arial","B",9);
      $this->formato();
      if ($this->arrp[$this->i]["staord"]=='Anulado')
      {
        $this->SetLineWidth(1);
        $this->SetDrawColor(100,1,1);
        $this->SetFont("Arial","B",84);
        $this->SetTextColor(100,1,1);
        //$this->SetAlpha(0.5);
        $this->Rotate(45,40,160);
        $this->RoundedRect(40, 160, 150, 25, 2.5, 'D');
        $this->Text(42,183,'ANULADA');
        $this->Rotate(0);
        $this->SetDrawColor(0);
        $this->SetTextColor(0);
        //$this->SetAlpha(1);
        $this->SetLineWidth(0);
      }

      /////////////////////////////////////////

      /*$this->SetXY(180,30);
      $this->SetFont("Arial","B",11);
      $this->Cell(20,4,$this->arrp[$this->i]["ordcom"]);
      $this->SetXY(155,34);
      $this->SetFont("Arial","B",11);
      $this->Cell(20,3,$this->arrp[$this->i]["fecord"]);
      $ano= substr($this->arrp[$this->i]["fecord"],6,4);*/

      //Vamosa buscar la unidad solicitante
      $uni=$this->bd->sql_unidad($this->arrp[$this->i]["ordcom"]);
      $this->SetFont("Arial","",7);
      $this->SetXY(67,46);
      $this->Cell(40,3,$uni[0]["desubi"]);

      $this->SetFont("Arial","",11);
      $codarray=explode("-",trim($this->arrp[$this->i]["codcat"]));
      $numarray=count($codarray);
      $descat=$this->bd->sql_cpniveles();
      $indcat=0;
      $this->SetY(41);
      $this->SetFont("Arial","",7);
      $arrcod=array();
      foreach($descat as $cat)
      {
      $this->SetX(32);
      array_push($arrcod,$codarray[$indcat]);
      if($indcat<$numarray)
      {
        $arrdes=$this->bd->sql_nompre(implode("-",$arrcod));
        //$this->Cell(1,3,$cat["nomext"].": ".$codarray[$indcat]." - ".$arrdes[0]["nombre"]);
      //  $this->Cell(1,3,$arrdes[0]["nombre"]);
      }
      else
      {
        $this->Cell(1,3,$cat["nomext"].": No Aplica");
        continue;
      }
      $this->Ln(5);
      $indcat++;
      }
      $this->SetFont("Arial","",7);
      $this->SetXY(33,66);
      $this->MultiCell(170,3,$this->arrp[$this->i]["desord"]);
      $this->SetFont("Arial","",8);
      $this->SetXY(35,51);
      $this->MultiCell(100,3,$this->arrp[$this->i]["nompro"]);
      $this->SetXY(160,51);
      $this->Cell(12,3,$this->arrp[$this->i]["codpro"]);
      $this->SetXY(33,61);
      $this->SetFont("Arial","",7);
      $this->MultiCell(160,3,$this->arrp[$this->i]["dirpro"]);
      $this->SetFont("Arial","",8);
      $this->SetXY(20,56);
      $this->Cell(12,3,$this->arrp[$this->i]["nrocei"]); //OJO rcn
          $this->SetXY(90,56);
      $this->Cell(12,3,$this->arrp[$this->i]["telpro"]);
      //Vamos a buscar la requsision
      $req=$this->bd->sql_req($this->arrp[$this->i]["ordcom"]);
      $this->SetXY(130,46);

      if($req[0]["req"]!='') $nroreq = $req[0]["req"]; else $nroreq='N/A';
      if($req[0]["fecha"]!='') $fecreq = $req[0]["fecha"]; else $fecreq='N/A';

      $this->SetXY(128,46);
      $this->Cell(10,3,$nroreq);
      $this->SetXY(164,46);
      $this->Cell(10,3,$fecreq);
      //Vamosa buscar la Forma de Entrega
      $ent=$this->bd->sql_ent($this->arrp[$this->i]["ordcom"]);
      $this->SetXY(50,77);
      $this->Cell(10,3,$ent[0]["desforent"]);
      //Vamosa buscar la Condicion de Pago(efectivo / cheque/ otro)
      $cond=$this->bd->sql_conpag($this->arrp[$this->i]["ordcom"]);
      $this->SetXY(140,77);
      $this->Cell(10,3,$cond[0]["desconpag"]);

      $this->SetXY(50,73);
      $this->Cell(180,3,$uni[0]["desubi"]);
      $this->SetY(135);
    }



  function formato()
    {
            $this->setTextColor(0,0,0);
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
      //$this->Line(10,40,205,40);
      $this->SetFont("Arial","B",8);
     /* $this->SetXY(10,23);
      $this->Cell(10,3,'SUMINISTROS VENEZOLANOS INSDUSTRIALES C.A SUVINCA.');
      $this->SetXY(10,26);
      $this->SetFont("Arial","",8);
      $this->Cell(10,3,'RIF G-200079843');
      $this->SetXY(10,40);
      $this->SetFont("Arial","B",12);
      $this->Cell(205,5,"ORDEN DE SERVICIO",0,0,'C');
      $this->SetXY(31,45);
      $this->SetFont("Arial","",8);
          if ($this->tipcom=='OSCD' OR $this->tipcom=='OCCP'){
      $this->Cell(100,5," COMERCIALIZACION",0,0,'C'); }
        if ($this->tipcom=='OSAD' OR $this->tipcom=='OCAP'){
      $this->Cell(100,5," ADMINISTRACIÓN",0,0,'C'); }
      $this->SetFont("Arial","",9);
      $this->SetXY(145,30);
      $this->Cell(10,4,'Orden de Servicio Nro.:');
      $this->SetXY(145,34);
      $this->Cell(10,3,'Fecha:');*/

        $this->Line(10,45,205,45);
      $this->Line(10,50,205,50);
      $this->Line(10,55,205,55);
        $this->Line(150,45,150,55);
        $this->Line(99,45,99,50);
      $this->Line(10,60,205,60);
      $this->Line(10,65,205,65);
        $this->Line(68,55,68,60);
        $this->Line(136,55,136,60);
      $this->Line(10,72,205,72);
        $this->Line(98,76,98,80);
      $this->Line(10,80,205,80);


      $this->SetFont("Arial","",9);
      $this->SetXY(12,46);
      $this->Cell(55,3,'UNIDAD QUE GENERA LA ORDEN:',0,0,'C');
      $this->SetXY(100,46);
      $this->Cell(55,3,'REQUISICION Nº:');
      $this->SetXY(12,51);
      $this->Cell(10,3,'PROVEEDOR:');
      $this->SetXY(150,46);
      $this->Cell(10,3,'FECHA:');
      $this->SetXY(12,51);
      //$this->Cell(10,3,'PROVEEDOR:');
      $this->SetXY(150,51);
      $this->Cell(10,3,'RIF:');
      $this->SetXY(12,56);
      $this->Cell(10,3,'RNC:');
      $this->SetXY(70,56);
      $this->Cell(10,3,'TELEFONO:');
      $this->SetXY(140,56);
      $this->Cell(45,3,'CODIGO POSTAL:');
      $this->SetXY(12,61);
      $this->Cell(50,3,'DIRECCIÓN:');
      $this->SetXY(12,66);
      $this->Cell(50,3,'CONCEPTO:');
      $this->SetXY(12,73);
      $this->Cell(90,3,'UNIDAD SOLICITANTE:');
      $this->Line(10,76,205,76);
      $this->SetXY(12,77);
      $this->Cell(50,3,'FORMA DE ENTREGA:');
      $this->SetXY(100,77);
      $this->Cell(50,3,'CONDICION DE PAGO:');
      $this->SetXY(12,100);
//////////////////DETALLE

      $this->Line(10,85,205,85);
      $this->SetXY(11,81);
      $this->Cell(90,3,'RENGLON');
        $this->Line(29,80,29,150);//ojo estaba hasta 220
      $this->SetXY(40,81);
      $this->Cell(90,3,'DESCRIPCION');
        $this->Line(86,80,86,150);
      $this->SetXY(87,81);
      $this->Cell(90,3,'UNIDAD DE MEDIDA');
        $this->Line(119,80,119,150);
      $this->SetXY(120,81);
      $this->Cell(90,3,'CANTIDAD');
        $this->Line(140,80,140,168);
      $this->SetXY(143,81);
      $this->Cell(90,3,'PRECIO UNITARIO');
        $this->Line(174,80,174,150);
      $this->SetXY(178,81);
      $this->Cell(90,3,'TOTAL');

      $this->Line(10,150,205,150);//estaba en 220

      $this->SetXY(11,151);
      $this->Cell(90,3,'MONTO TOTAL EN LETRAS:');
      $this->SetXY(120,153);
      //$this->Cell(90,3,'MONTO TOTAL BsF.:');
      //$this->Line(155,150,155,160);
      $this->Line(10,163,140,163);
      $this->SetXY(10,164);
      $this->Cell(90,3,'OBSERVACIÓN:');
      $this->SetXY(10,169);
      $this->Cell(205,3,'IMPUTACIÓN PRESUPUESTARIA',0,0,'C');
      $this->Line(10,168,205,168);
      $this->SetFont("Arial","B",5);
      $this->SetXY(12,172.5);
      $this->Cell(90,2,'PROYECTO/ACCIÓN');
      $this->SetXY(14,174);
      $this->Cell(90,2,'CENTRALIZADA');
      $this->SetXY(158,172.5);
      $this->Cell(45,2,'UNIDAD');
      $this->SetXY(156,174);
      $this->Cell(45,2,'EJECUTORA');
      $this->Line(34,172,34,215);
      $this->SetFont("Arial","B",7);
      $this->SetXY(34,173);
      $this->Cell(90,3,'ACC. ESPECIFICA');
      $this->Line(58,172,58,215);
      $this->SetXY(63,173);
      $this->Cell(45,3,'PARTIDA');

      $this->SetXY(154,177);
      //$this->Cell(45,3,'EJECUTORA');
      $this->Line(82,172,82,215);
      $this->SetXY(110,167);
      //$this->Cell(90,3,'SUB PARTIDA');
      $this->SetXY(85,173);
      $this->Cell(90,3,'GENERICA' );
      $this->SetXY(108,173);
      $this->Cell(90,3,'ESPECIFICA' );
      $this->SetXY(138,173);
      $this->Cell(90,3,'SUB 1' );
      //$this->Line(82 ,170,154,170);
      $this->Line(106,172,106,215);
      $this->Line(130,172,130,215);
      $this->Line(154,172,154,215);
      $this->Line(170,172,170,215);
      $this->SetXY(180,173);
      $this->Cell(90,3,'MONTO');
          $this->SetXY(10,264);
          $this->SetFont("Arial","B");
          $this->Line(10,172,205,172);
          $this->Line(10,176,205,176);
          $this->Line(10,215,205,215);

      $this->Line(10,231,205,231);

      $this->Line(62,215,62,231);
      $this->Line(114,215,114,231);
      $this->Line(166,215,166,231);
            //Observaciones
            $this->SetFont("Arial","",4.5);
      $this->SetXY(11,216);
      $this->MultiCell(51,2.5,'FIANZA DE FIEL CUMPLIMIENTO:'.chr(10).chr(13).'AL APROBARSE ESTA ORDEN AL BENEFICIARIO FIANZA DE FIEL CUMPLIMIENTO EQUIVALENTE AL ___% DEL MONTO DE ESTA ORDEN OTORGADA POR BANCO O COMPAÑIA DE SEGUROS VIGENTE HASTA LA TOTAL ENTREGA DE LA MERCANCIA');
      $this->SetXY(63,216);
      $this->MultiCell(51,2.5,'CLAUSULA PENAL:'.chr(10).chr(13).'QUEDA ESTABLECIDA LA CLAUSULA PENAL SEGÚN LA CUAL EL PROVEEDOR PAGARA AL FISCO EL ___% SOBRE EL MONTO DE LA MERCANCIA RESPECTIVA POR CADA DIA HABIL DE RETARDO EN LA ENTREGA');
      $this->SetXY(115,216);
      $this->MultiCell(51,2.5,'CLAUSULA ESPECIAL:'.chr(10).chr(13).'EL ORGANISMO SE RESERVA EL DERECHO DE ANULAR UNILATERALMENTE LA PRESENTE ORDEN DE COMPRA SIN INDEMNIZACIÓN DE CONFORMIDAD CON LAS PREVISIONES LEGALES QUE RIGEN LA MATERIA ');
      $this->SetXY(167,216);
      $this->MultiCell(36,2.5,'NOTA:'.chr(10).chr(13).'LA PRESENTE ORDEN SE ENCUENTRA SUJETA A LAS RETENCIONES DE LOS IMPUESTOS DE LEY');


      $this->SetFont("Arial","B",7);
      $this->SetXY(10,231);
      $this->Cell(180,3,'FIRMAS Y SELLOS PARA LA APROBACIÓN DE LA ORDEN DE COMPRA',0,0,'C');


      $this->Line(10,253,205,253);
      $this->Line(10,256,205,256);

      $this->Line(75,256,75,264);
      $this->Line(140,256,140,264);

      $this->Line(10,264,205,264);

      $this->SetXY(10,253);
      $this->Cell(180,3,'RECEPCIÓN CONFORME DE LA COMPRA POR EL PROVEEDOR',0,0,'C');
      $this->SetXY(10,256);
      $this->Cell(65,3,'APELLIDOS (S) Y NOMBRES (S)',0,0,'C');
      $this->SetXY(76,256);
      $this->Cell(65,3,'C.I. Nº',0,0,'C');
      $this->SetXY(141,256);
      $this->Cell(65,3,'FIRMA Y FECHA DE RECIBIDO',0,0,'C');

      $this->SetXY(10,264);
      $this->SetFont("Arial","B",4.5);
      $this->MultiCell(190,3,'NOTA: DE CONFORMIDAD CON LO ESTABLECIDO EN EL NUMERAL 19 DEL ARTÍCULO 6 DEL DECRETO CON RAGO, VALOR Y FUERZA DE LEY DE CONTRATACIONES PÚBLICAS, PUBLICADO EN LA GACETA OFICIAL DE LA REPUBLICA BOLIVARIANA DE VENEZUELA N° 38.895 DE FECHA 25 DE MARZO DE 2008, EL OFERENTE DEBE ESTABLECER EN SU OFERTA DE SERVICIOS EL CUMPLIMIENTO DEL COMPROMISO DE RESPONSABILIDAD SOCIAL, MEDIANTE EL APORTE PORCENTUAL SOBRE EL PRECIO BASE DE SU COTIZACIÓN, PARA DESTINARLO A PROGRAMAS SOCIALES DETERMINADOS POR EL ESTADO O INSTITUCIONES SIN FINES DE LUCRO');

            $this->SetFont("Arial","B",4);
      if ($this->tipcom=='OSCD' OR $this->tipcom=='OSCP'){

      $this->Line(42.5,234,42.5,253);
      $this->Line(75,234,75,253);
      $this->Line(107.5,234,107.5,253);
      $this->Line(140,234,140,253);
      $this->Line(172.5,234,172.5,253);

      $this->SetXY(16,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(48,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(81,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(114,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(147,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(178,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(16,247.5);
      $this->Cell(20,5,'ANALISTA COMERCIALIZACION',0,0,'C');
      $this->SetXY(48,247.5);
      $this->Cell(20,5,'DIRECTOR(A) DE COMERCIALIZACION',0,0,'C');
      $this->SetXY(81,247.5);
      $this->Cell(20,5,'DIRECTOR(A) DE GESTION ADMINISTRATIVA',0,0,'C');
            $this->SetXY(114,247.5);
      $this->Cell(20,5,'DIRECTOR(A) DE PLANIFICACION Y PPTO',0,0,'C');
      $this->SetXY(147,247.5);
      $this->Cell(20,5,'DIRECTOR(A) GENERAL',0,0,'C');
      $this->SetXY(178,247.5);
      $this->Cell(20,5,'PRESIDENTE(A)',0,0,'C');

      $this->SetXY(16,246);
      $this->Cell(20,5,$this->analista,0,0,'C');
      $this->SetXY(48,246);
      $this->Cell(20,5,$this->dircom,0,0,'C');
      $this->SetXY(81,246);
      $this->Cell(20,5,$this->dirgadm,0,0,'C');
      $this->SetXY(114,246);
      $this->Cell(20,5,$this->dirplappt,0,0,'C');
        $this->SetXY(147,246);
      $this->Cell(20,5,$this->dirgenr,0,0,'C');
        $this->SetXY(178,246);
      $this->Cell(20,5,$this->presidente,0,0,'C');
      }
      if ($this->tipcom=='OSAD' OR $this->tipcom=='OSAP'){

      $this->Line(49,234,49,253);
      $this->Line(88,234,88,253);
      $this->Line(127,234,127,253);
      $this->Line(166,234,166,253);


      $this->SetXY(20,246);
      $this->Cell(20,5,'___________________________________________',0,0,'C');
      $this->SetXY(60,246);
      $this->Cell(20,5,'___________________________________________',0,0,'C');
      $this->SetXY(99,246);
      $this->Cell(20,5,'___________________________________________',0,0,'C');
      $this->SetXY(135,246);
      $this->Cell(20,5,'___________________________________________',0,0,'C');
      $this->SetXY(175,246);
      $this->Cell(20,5,'___________________________________________',0,0,'C');



      $this->SetXY(20,247.5);
      $this->Cell(20,5,'DIRECTOR(A) DE GESTION ADMINISTRATIVA',0,0,'C');
      $this->SetXY(60,247.5);
      $this->Cell(20,5,'DIRECTOR(A) GENERAL',0215,0,'C');
      $this->SetXY(99,247.5);
      $this->Cell(20,5,'DIRECTOR(A) DE PLANIFICACION Y PPTO',0,0,'C');
            $this->SetXY(135,247.5);
      $this->Cell(20,5,'PRESIDENTE(A)',0,0,'C');
      $this->SetXY(175,247.5);
      $this->Cell(20,5,'COODINADOR(A) DE COMPRA',0,0,'C');

      $this->SetXY(20,246);
      $this->Cell(20,5,$this->dirgadm,0,0,'C');
      $this->SetXY(60,246);
      $this->Cell(20,5,$this->dirgenr,0,0,'C');
      $this->SetXY(99,246);
      $this->Cell(20,5,$this->dirplappt,0,0,'C');
        $this->SetXY(135,246);
      $this->Cell(20,5,$this->presidente,0,0,'C');
        $this->SetXY(175,246);
      $this->Cell(20,5,$this->coorcom,0,0,'C');
      }

      if ($this->tipcom=='OSBI' ){

      $this->Line(42.5,234,42.5,253);
      $this->Line(75,234,75,253);
      $this->Line(107.5,234,107.5,253);
      $this->Line(140,234,140,253);
      $this->Line(172.5,234,172.5,253);

      $this->SetXY(16,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(48,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(81,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(114,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(147,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(178,246);
      $this->Cell(20,5,'_____________________________________',0,0,'C');
      $this->SetXY(16,247.5);
      $this->Cell(20,5,'ANALISTA BANCO INSUMO',0,0,'C');
      $this->SetXY(48,247.5);
      $this->Cell(20,5,'DIRECTOR(A) BANCO INSUMO',0,0,'C');
      $this->SetXY(81,247.5);
      $this->Cell(20,5,'DIRECTOR(A) DE GESTION ADMINISTRATIVA',0,0,'C');
            $this->SetXY(114,247.5);
      $this->Cell(20,5,'DIRECTOR(A) DE PLANIFICACION Y PPTO',0,0,'C');
      $this->SetXY(147,247.5);
      $this->Cell(20,5,'DIRECTOR(A) GENERAL',0,0,'C');
      $this->SetXY(178,247.5);
      $this->Cell(20,5,'PRESIDENTE(A)',0,0,'C');

      $this->SetXY(16,246);
      $this->Cell(20,5,$this->anabancins,0,0,'C');
      $this->SetXY(48,246);
      $this->Cell(20,5,$this->dirbancins,0,0,'C');
      $this->SetXY(81,246);
      $this->Cell(20,5,$this->dirgadm,0,0,'C');
      $this->SetXY(114,246);
      $this->Cell(20,5,$this->dirplappt,0,0,'C');
        $this->SetXY(147,246);
      $this->Cell(20,5,$this->dirgenr,0,0,'C');
        $this->SetXY(178,246);
      $this->Cell(20,5,$this->presidente,0,0,'C');
      }

      //$this->Cell(90,3,'GERENTE DE ADMINISTRACIÓN DE OPERACIONES');
      //$this->SetX(140);
      //$this->Cell(65,3,'COORDINADOR DE ADMINISTRACIÓN',0,0,'C');
      //$this->Line(68,310,68,340);
      //$this->Line(138,310,138,340);

    }



    function Cuerpo()
    {
      $eof=count($this->arrp);
      $ref=$this->arrp[$this->i]["ordcom"];
      $contador=1;
      $primeravez=true;
      $subtotal=0;
      $subtotal2=0;
      $iva=0;
      $total=0;
      $fecha=explode("/",$this->arrp[$this->i]["fecord"]);
      $detcat=false;
      $aun=false;
      $touch=false;
      $this->SetXY(11,86);
      while($this->i < $eof and $ref==$this->arrp[$this->i]["ordcom"])
      {
        $x=$this->GetX();
        $y=$this->GetY();
        if(!$detcat)
        {
          if(!$touch)
          //$this->SetY(253);
            $this->SetY(176);
          if(!$aun)
          {
            $this->SetY(176);
            $imput=$this->bd->sql_imp($this->arrp[$this->i]["ordcom"]);
            $indimp=0;
            $numimp=count($imput);
          }
          while($indimp<$numimp and !$touch)
          {
            $this->SetWidths(array(24,24,24,24,24,24,12,25));
            $this->SetAligns(array('C','C','C','C','C','C','C','R'));
            $codpre=explode("-",trim($imput[$indimp]["codigo"]));
            array_pad($codpre,9,'');
            $this->Row(array($codpre[0],$codpre[1],$codpre[2],$codpre[3],$codpre[4],$codpre[5],$imput[$indimp]["coduni"],H::FormatoMonto($imput[$indimp]["monto"])));

            $indimp++;
            if($indimp>=$numimp)
            {
              $detcat=true;
            }
            elseif($this->GetY() > 215)
            {
              $aun=true;
              $touch=true;
            }
          }

        }
        $this->SetXY($x,$y);
        $this->SetFont("Arial","",8);
        $this->SetWidths(array(19,55,38,10,34,31));
        $this->SetAligns(array('C','L','C','R','R','R'));
        $paginaantes=$this->PageNo();
        $this->Row(array((string)$contador."   ",rtrim($this->arrp[$this->i]["desres"]),"   ".$this->arrp[$this->i]["unimed"],H::FormatoMonto($this->arrp[$this->i]["cantot"]),H::FormatoMonto($this->arrp[$this->i]["preart"]),H::FormatoMonto(($this->arrp[$this->i]["cantot"]*$this->arrp[$this->i]["preart"]))));
        $subtotal2=$subtotal2+($this->arrp[$this->i]["cantot"]*$this->arrp[$this->i]["preart"]);
        $observ=$this->arrp[$this->i]["obs"];


        if($this->GetY()>135){
          $this->SetFont("Arial","",8);
          $this->SetXY(152,148+2);
          $this->Cell(10,3,'VAN...');
          $this->SetX(164);
          $this->Cell(31,3,H::FormatoMonto($subtotal2),0,0,"R");
          $this->SetXY(10,155);
          $this->MultiCell(130,4,H::obtenermontoescrito($subtotal2));
          //$subtotal2=0;
            $this->AddPage();
            //mando a imprimir la imputación para varias hojas cuando la orden tiene mas de una hoja
                  $this->SetY(176);
          $this->SetY(176);
                    $imput2=$this->bd->sql_imp($this->arrp[$this->i]["ordcom"]);
          $indimp2=0;
          $numimp2=count($imput2);

          while($indimp2<$numimp2 )
          {
            $this->SetWidths(array(24,24,24,24,24,24,12,25));
            $this->SetAligns(array('C','C','C','C','C','C','C','R'));
            $codpre2=explode("-",trim($imput2[$indimp2]["codigo"]));
            array_pad($codpre2,9,'');
            $this->Row(array($codpre2[0],$codpre2[1],$codpre2[2],$codpre2[3],$codpre2[4],$codpre2[5],$imput2[$indimp]["coduni"],H::FormatoMonto($imput2[$indimp2]["monto"])));
            $indimp2++;
                    }
                    //fin de imputación
        $this->SetXY(11,86); }

        if($paginaantes<$this->PageNo())
        $touch=false;
        $subtotal=$subtotal+($this->arrp[$this->i]["cantot"]*$this->arrp[$this->i]["preart"]);
        $descuentos+=$this->arrp[$this->i]["dcto"];

        $this->i++;
        $contador++;
        if($ref!=$this->arrp[$this->i]["ordcom"])
        {
        if($ref!=$this->arrp[$this->i]["ordcom"])
        {
          $ref=$this->arrp[$this->i]["ordcom"];
          $this->bdm=new basedatosAdo();
          $this->sql= "select a.monrgo,b.monrgo as suma from carecarg a,cargosol b where b.reqart='".$this->arrp[$this->i-1]["ordcom"]."' and a.codrgo=b.codrgo";
          //print '<pre>'; print $this->sql; exit;

              $tb1=$this->bdm->select($this->sql);
              $eof2=count($tb1);
              $this->j=0;

          //$iva=$tb1->fields["suma"];

          //$this->Line(178,148+1,205,148+1);
          $this->SetFont("Arial","",7);
          $this->SetXY(142,148+2);
          $this->Cell(10,3,'SUB TOTAL:');
          $this->SetX(174);
          $this->Cell(31,3,H::FormatoMonto($subtotal),0,0,"R");
          if ($tb1->fields["monrgo"]!='')
          {
          $this->SetXY(142,$this->GetY()+3);
          $this->Cell(10,3,'DESCUENTO:');
          $this->SetX(174);
          $this->Cell(31,3,H::FormatoMonto(-1*$this->arrp[$this->i-1]["dtoord"]),0,0,"R");
          $subtotal=$subtotal-$this->arrp[$this->i-1]["dtoord"];
          }
          if ($descuentos!=""){
          $this->SetXY(142,$this->GetY()+3);
          $this->Cell(10,3,'DESCUENTO:');
          $this->SetX(174);
          $this->Cell(31,3,H::FormatoMonto($descuentos),0,0,"R");
          $subtotal=$subtotal-$descuentos;
          $descuentos=0;
          }

//          $this->sql= "SELECT sum(rgoart) as suma FROM caartord where ordcom='".$this->arrp[$this->i]["ordcom"]."'";
//              $tb1=$this->bd->select($this->sql);
          while(!$tb1->EOF ){
          $this->SetXY(142,$this->GetY()+3);
          $iva=$tb1->fields["suma"];
          $ivaacum+=$iva;
          $this->Cell(10,3,'I.V.A. ('.(int)$tb1->fields["monrgo"].'%):');
          $this->SetX(174);
          $this->Cell(31,3,H::FormatoMonto($iva),0,0,"R");
          $tb1->MoveNext();
                }

                        while($indimp<$numimp and !$touch)
          {
            $this->SetWidths(array(24,24,24,24,24,24,12,25));
            $this->SetAligns(array('C','C','C','C','C','C','C','R'));
            $codpre=explode("-",trim($imput[$indimp]["codigo"]));
            array_pad($codpre,9,'');
            $this->Row(array($codpre[0],$codpre[1],$codpre[2],$codpre[3],$codpre[4],$codpre[5],$imput[$indimp]["coduni"],H::FormatoMonto($imput[$indimp]["monto"])));

            $indimp++;
            if($indimp>=$numimp)
            {
              $detcat=true;
            }
            elseif($this->GetY() > 215)
            {
              $aun=true;
              $touch=true;
            }
          }

          $this->Line(178,$this->GetY()+3,205,$this->GetY()+3);
          $this->SetXY(142,$this->GetY()+3);
          $this->Cell(10,5,'TOTAL:');
          $this->SetX(174);
          $this->Cell(31,3,H::FormatoMonto($subtotal+$ivaacum),0,0,"R");
          $this->SetXY(10,155);
          $this->MultiCell(130,4,H::obtenermontoescrito($subtotal+$ivaacum));
          $this->SetXY(174,153);
          $this->SetFont("Arial","",5);
          $this->SetXY(35,164);
              $this->multiCell(100,2,$observ);
              $this->SetFont("Arial","",7);
              $subtotal2=0;
        //  $this->Cell(31,5,H::FormatoMonto($subtotal+$iva),0,0,"R");

          if($this->i < $eof)
          {
            $this->AddPage();
            $detcat=false;
            $aun=false;
          }
          $contador=1;
          $subtotal=0;
          $this->SetXY(11,86);
        }
      }

    }
    }
  }
?>
