<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Unitel</title>
  <LINK REL="stylesheet" TYPE="text/css" HREF="CSS/estilos.css">
</head>

<body>

<div class="container">

  <!-- Empieza Header -->
	<header>
		<img src="IMG/unitel.jpg">
	</header>
<!-- Finaliza Header -->

<!-- Empieza Menu -->
	<nav>
		<ul>
		<!--	<li><a href="#">Item 1</a></li>
			<li><a href="#">Item 2</a></li>
			<li><a href="#">Item 3</a></li>
			<li><a href="#">Item 4</a></li>
		</ul>-->
	</nav>
<!-- Finaliza Menu -->

<!-- Empieza Seccion de contenido                                 i-->
	<section>
		<h2>
			Procesar Spool
    </h2>
			<form name="texto" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
	<label>Archivo a procesar</label>
	<br>
	<br>
	<input type="file" name="archivo" class="btn">
	<br>
	<p>-------------------------------------------------------------</p>
	<br>
	<input type="submit" name="enviar" value="Procesar" class="btn">
	<br>
	<br>
</form>

<div class="progreso">
    <div class="barra">

<?php

//remplaza palabras especificas en archivo txt seleccionado
function replace_string_in_file($filename, $string_to_replace, $replace_with){
	$content=file_get_contents($filename);
	$content_chunks=explode($string_to_replace, $content);
	$content=implode($replace_with, $content_chunks);
	file_put_contents($filename, $content);

}

if (isset($_POST['enviar'])) {
	$archivo=$_FILES['archivo']['name'];
	$arc=explode('.',$archivo);

	for ($i=0; $i <count($arc) ; $i++) {
		$nombre=$arc[0];
		$extension=$arc[1];
	}
	//nombre y ruta del archivo a modificar
	$nomArc="FIFAS/".$nombre.".".$extension;
   //Remplazar todos los caracteres G por Ç
	$result=replace_string_in_file($nomArc,'G','Ç');

//array1 (palabras a remplazar)
$textOld=['XÇF','Telifono','BLÇ','PAÇO','ÇRACIAS','BOÇOTA','§Ç','CARÇO','ÇRANDES','BODEÇA','ARAÇON','BURÇUER','CORREÇ','TRAINÇ','FOÇEL','RODRIÇUEZ','ARTEAÇA','TECNOLOÇIA','LAÇUNA','MIÇRACION','INÇENIERIA','ÇILMEDICA','JORÇE','MEÇA','ORÇANIZACION','ENERÇIA','MENÇA','ANTIÇUA','IBARÇUREN','OXIÇENOS','ÇENERAL','INTEÇRADOS','COMPA?IA','QUIROÇA','LOÇISTICS','BDÇ','INÇ','ÇUILLERMO','SERVIÇRAFIC','AÇUDELO','ÇARCIA','DESINÇ','ÇARAJE','RODRIÇO','KINÇ','PÇI','BODÇ','BUÇA','TIÇ','ITAÇUI','BUCARAMANÇ','CAMPOALEÇR','ENVIÇADO','ZARAÇOZA','CARTAÇO','IBAÇU','SAMANIEÇO','ÇUACARI','ÇUADALAJAR','Ç«Ç(415)','CARTAÇENA','SERVIENTREÇA','BRENNTAÇ','COPIDROÇAS','HOLDINÇS','TONIÇ','PIÇ','CHICAÇO','DIAÇ','ÇAL','VIRÇINI','BUÇALAÇRAN','INÇENIO','SANTIAÇO','ARÇENTINA','ÇUACARI','ARTUNDUAÇA','VARÇAS','ALMECIÇA','ÇUAYAQUIL','ZULUAÇA','ÇALARZA','ÇOMEZ','ANÇEL','DIAÇNOSTICA','ÇTECH','FOREIÇN','HOLDINÇS','ÇIRALDO','MONDRAÇON','REÇATA','SEÇURIDAD','ÇRANADA','COMFINAÇRO','SERÇENTE','INÇENIEROS','LOÇISTICA','AÇRARIO','PAÇOS','ÇIROS','REFUÇIO','COLSEÇUROS','COLEÇIO','COLÇAS','VIÇES','IBAÇUE','J.Ç.B','ÇANE','AÇENCIA','ÇIRARDOT','AÇUIRRE','ÇENITH','JUEÇOS','ÇUAYACANES','MANÇOS','ESÇUERRA','ÇARCES','CHAMPAÇNAT','ANÇELICA','HUNÇA','WAÇONLIT','ÇUEVARA','ÇALVEZ','ÇUSTAVO','DOMINÇUEZ','ÇIL','ÇLORIA','PAÇAR','MIÇUEL','BLI','ÇCARÇO','INT <CÇ'];

//array2 (nuevas palabras)
$textNew=['XGF','Telefono','BLG','PAGO','GRACIAS','BOGOTA','§G','CARGO','GRANDES','BODEGA','ARAGON','BURGUER','CORREG','TRAING','FOGEL','RODRIGUEZ','ARTEAGA','TECNOLOGIA','LAGUNA','MIGRACION','INGENIERIA','GILMEDICA','JORGE','MEGA','ORGANIZACION','ENERGIA','MENGA','ANTIGUA','IBARGUREN','OXIGENOS','GENERAL','INTEGRADOS','COMPA?IA','QUIROGA','LOGISTICS','BDG','ING','GUILLERMO','SERVIGRAFIC','AGUDELO','GARCIA','DESING','GARAJE','RODRIGO','KING','PGI','BODG','BUGA','TIG','ITAGUI','BUCARAMANG','CAMPOALEGR','ENVIGADO','ZARAGOZA','CARTAGO','IBAGU','SAMANIEGO','GUACARI','GUADALAJAR','G«G(415)','CARTAGENA','SERVIENTREGA','BRENNTAG','COPIDROGAS','HOLDINGS','TONIG','PIG','CHICAGO','DIAG','GAL','VIRGINI','BUGALAGRAN','INGENIO','SANTIAGO','ARGENTINA','GUACARI','ARTUNDUAGA','VARGAS','ALMECIGA','GUAYAQUIL','ZULUAGA','GALARZA','GOMEZ','ANGEL','DIAGNOSTICA','GTECH','FOREIGN','HOLDINGS','GIRALDO','MONDRAGON','REGATA','SEGURIDAD','GRANADA','COMFINAGRO','SERGENTE','INGENIEROS','LOGISTICA','AGRARIO','PAGOS','GIROS','REFUGIO','COLSEGUROS','COLEGIO','COLGAS','VIGES','IBAGUE','J.G.B','GANE','AGENCIA','GIRARDOT','AGUIRRE','GENITH','JUEGOS','GUAYACANES','MANGOS','ESGUERRA','GARCES','CHAMPAGNAT','ANGELICA','HUNGA','WAGONLIT','GUEVARA','GALVEZ','GUSTAVO','DOMINGUEZ','GIL','GLORIA','PAGAR','MIGUEL','BLI','ÇCARGO','INT <CG'];

//echo count($textOld);
$contador=0;

for($i=0;$i<50;$i++)
        {
            echo '<span style="width:10px;" class="avance"></span>';
            flush();
            ob_flush();
            sleep(9);

            // si el usuario cierra el navegador, el script sigue ejecutándose
ignore_user_abort(true);
// cancela el límite de tiempo de ejecución de php
set_time_limit(0);
        }

for ($i=0; $i <count($textOld); $i++) {
	$old1= $textOld[0];
	$old2= $textOld[1];
	$old3= $textOld[2];
	$old4= $textOld[3];
	$old5= $textOld[4];
	$old6= $textOld[5];
	$old7= $textOld[6];
	$old8= $textOld[7];
	$old9= $textOld[8];
	$old10= $textOld[9];
	$old11= $textOld[10];
	$old12= $textOld[11];
	$old13= $textOld[12];
	$old14= $textOld[13];
	$old15= $textOld[14];
	$old16= $textOld[15];
	$old17= $textOld[16];
	$old18= $textOld[17];
	$old19= $textOld[18];
	$old20= $textOld[19];
	$old21= $textOld[20];
	$old22= $textOld[21];
	$old23= $textOld[22];
	$old24= $textOld[23];
	$old25= $textOld[24];
	$old26= $textOld[25];
	$old27= $textOld[26];
	$old28= $textOld[27];
	$old29= $textOld[28];
	$old30= $textOld[29];
	$old31= $textOld[30];
	$old32= $textOld[31];
	$old33= $textOld[32];
	$old34= $textOld[33];
	$old35= $textOld[34];
	$old36= $textOld[35];
	$old37= $textOld[36];
	$old38= $textOld[37];
	$old39= $textOld[38];
	$old40= $textOld[39];
	$old41= $textOld[40];
	$old42= $textOld[41];
	$old43= $textOld[42];
	$old44= $textOld[43];
	$old45= $textOld[44];
	$old46= $textOld[45];
	$old47= $textOld[46];
	$old48= $textOld[47];
	$old49= $textOld[48];
	$old50= $textOld[49];
	$old51= $textOld[50];
	$old52= $textOld[51];
	$old53= $textOld[52];
	$old54= $textOld[53];
	$old55= $textOld[54];
	$old56= $textOld[55];
	$old57= $textOld[56];
	$old58= $textOld[57];
	$old59= $textOld[58];
	$old60= $textOld[59];
	$old61= $textOld[60];
	$old62= $textOld[61];
	$old63= $textOld[62];
	$old64= $textOld[63];
	$old65= $textOld[64];
	$old66= $textOld[65];
	$old67= $textOld[66];
	$old68= $textOld[67];
	$old69= $textOld[68];
	$old70= $textOld[69];
	$old71= $textOld[70];
	$old72= $textOld[71];
	$old73= $textOld[72];
	$old74= $textOld[73];
	$old75= $textOld[74];
	$old76= $textOld[75];
	$old77= $textOld[76];
	$old78= $textOld[77];
	$old79= $textOld[78];
	$old80= $textOld[79];
	$old81= $textOld[80];
	$old82= $textOld[81];
	$old83= $textOld[82];
	$old84= $textOld[83];
	$old85= $textOld[84];
	$old86= $textOld[85];
	$old87= $textOld[86];
	$old88= $textOld[87];
	$old89= $textOld[88];
	$old90= $textOld[89];
	$old91= $textOld[90];
	$old92= $textOld[91];
	$old93= $textOld[92];
	$old94= $textOld[93];
	$old95= $textOld[94];
	$old96= $textOld[95];
	$old97= $textOld[96];
	$old98= $textOld[97];
	$old99= $textOld[98];
	$old100= $textOld[99];
	$old101= $textOld[100];
	$old102= $textOld[101];
	$old103= $textOld[102];
	$old104= $textOld[103];
	$old105= $textOld[104];
	$old106= $textOld[105];
	$old107= $textOld[106];
	$old108= $textOld[107];
	$old109= $textOld[108];
	$old110= $textOld[109];
	$old111= $textOld[110];
	$old112= $textOld[111];
	$old113= $textOld[112];
	$old114= $textOld[113];
	$old115= $textOld[114];
	$old116= $textOld[115];
	$old117= $textOld[116];
	$old118= $textOld[117];
	$old119= $textOld[118];
	$old120= $textOld[119];
	$old121= $textOld[120];
	$old122= $textOld[121];
	$old123= $textOld[122];
	$old124= $textOld[123];
	$old125= $textOld[124];
	$old126= $textOld[125];
	$old127= $textOld[126];
	$old128= $textOld[127];
	$old129= $textOld[128];
	$old130= $textOld[129];
	$old131= $textOld[130];
	$old132= $textOld[131];

}

for ($i=0; $i <count($textNew); $i++) {
	$new1= $textNew[0];
	$new2= $textNew[1];
	$new3= $textNew[2];
	$new4= $textNew[3];
	$new1= $textNew[0];
	$new5= $textNew[4];
	$new6= $textNew[5];
	$new7= $textNew[6];
	$new8= $textNew[7];
	$new9= $textNew[8];
	$new10= $textNew[9];
	$new11= $textNew[10];
	$new12= $textNew[11];
	$new13= $textNew[12];
	$new14= $textNew[13];
	$new15= $textNew[14];
	$new16= $textNew[15];
	$new17= $textNew[16];
	$new18= $textNew[17];
	$new19= $textNew[18];
	$new20= $textNew[19];
	$new21= $textNew[20];
	$new22= $textNew[21];
	$new23= $textNew[22];
	$new24= $textNew[23];
	$new25= $textNew[24];
	$new26= $textNew[25];
	$new27= $textNew[26];
	$new28= $textNew[27];
	$new29= $textNew[28];
	$new30= $textNew[29];
	$new31= $textNew[30];
	$new32= $textNew[31];
	$new33= $textNew[32];
	$new34= $textNew[33];
	$new35= $textNew[34];
	$new36= $textNew[35];
	$new37= $textNew[36];
	$new38= $textNew[37];
	$new39= $textNew[38];
	$new40= $textNew[39];
	$new41= $textNew[40];
	$new42= $textNew[41];
	$new43= $textNew[42];
	$new44= $textNew[43];
	$new45= $textNew[44];
	$new46= $textNew[45];
	$new47= $textNew[46];
	$new48= $textNew[47];
	$new49= $textNew[48];
	$new50= $textNew[49];
	$new51= $textNew[50];
	$new52= $textNew[51];
	$new53= $textNew[52];
	$new54= $textNew[53];
	$new55= $textNew[54];
	$new56= $textNew[55];
	$new57= $textNew[56];
	$new58= $textNew[57];
	$new59= $textNew[58];
	$new60= $textNew[59];
	$new61= $textNew[60];
	$new62= $textNew[61];
	$new63= $textNew[62];
	$new64= $textNew[63];
	$new65= $textNew[64];
	$new66= $textNew[65];
	$new67= $textNew[66];
	$new68= $textNew[67];
	$new69= $textNew[68];
	$new70= $textNew[69];
	$new71= $textNew[70];
	$new72= $textNew[71];
	$new73= $textNew[72];
	$new74= $textNew[73];
	$new75= $textNew[74];
	$new76= $textNew[75];
	$new77= $textNew[76];
	$new78= $textNew[77];
	$new79= $textNew[78];
	$new80= $textNew[79];
	$new81= $textNew[80];
	$new82= $textNew[81];
	$new83= $textNew[82];
	$new84= $textNew[83];
	$new85= $textNew[84];
	$new86= $textNew[85];
	$new87= $textNew[86];
	$new88= $textNew[87];
	$new89= $textNew[88];
	$new90= $textNew[89];
	$new91= $textNew[90];
	$new92= $textNew[91];
	$new93= $textNew[92];
	$new94= $textNew[93];
	$new95= $textNew[94];
	$new96= $textNew[95];
	$new97= $textNew[96];
	$new98= $textNew[97];
	$new99= $textNew[98];
	$new100= $textNew[99];
	$new101= $textNew[100];
	$new102= $textNew[101];
	$new103= $textNew[102];
	$new104= $textNew[103];
	$new105= $textNew[104];
	$new106= $textNew[105];
	$new107= $textNew[106];
	$new108= $textNew[107];
	$new109= $textNew[108];
	$new110= $textNew[109];
	$new111= $textNew[110];
	$new112= $textNew[111];
	$new113= $textNew[112];
	$new114= $textNew[113];
	$new115= $textNew[114];
	$new116= $textNew[115];
	$new117= $textNew[116];
	$new118= $textNew[117];
	$new119= $textNew[118];
	$new120= $textNew[119];
	$new121= $textNew[120];
	$new122= $textNew[121];
	$new123= $textNew[122];
	$new124= $textNew[123];
	$new125= $textNew[124];
	$new126= $textNew[125];
	$new127= $textNew[126];
	$new128= $textNew[127];
	$new129= $textNew[128];
	$new130= $textNew[129];
	$new131= $textNew[130];
	$new132= $textNew[131];
}

$result=replace_string_in_file($nomArc,$old1,$new1);
$result=replace_string_in_file($nomArc,$old2,$new2);
$result=replace_string_in_file($nomArc,$old3,$new3);
$result=replace_string_in_file($nomArc,$old4,$new4);
$result=replace_string_in_file($nomArc,$old5,$new5);
$result=replace_string_in_file($nomArc,$old6,$new6);
$result=replace_string_in_file($nomArc,$old7,$new7);
$result=replace_string_in_file($nomArc,$old8,$new8);
$result=replace_string_in_file($nomArc,$old9,$new9);
$result=replace_string_in_file($nomArc,$old10,$new10);
$result=replace_string_in_file($nomArc,$old11,$new11);
$result=replace_string_in_file($nomArc,$old12,$new12);
$result=replace_string_in_file($nomArc,$old13,$new13);
$result=replace_string_in_file($nomArc,$old14,$new14);
$result=replace_string_in_file($nomArc,$old15,$new15);
$result=replace_string_in_file($nomArc,$old16,$new16);
$result=replace_string_in_file($nomArc,$old17,$new17);
$result=replace_string_in_file($nomArc,$old18,$new18);
$result=replace_string_in_file($nomArc,$old19,$new19);
$result=replace_string_in_file($nomArc,$old20,$new20);
$result=replace_string_in_file($nomArc,$old21,$new21);
$result=replace_string_in_file($nomArc,$old22,$new22);
$result=replace_string_in_file($nomArc,$old23,$new23);
$result=replace_string_in_file($nomArc,$old24,$new24);
$result=replace_string_in_file($nomArc,$old25,$new25);
$result=replace_string_in_file($nomArc,$old26,$new26);
$result=replace_string_in_file($nomArc,$old27,$new27);
$result=replace_string_in_file($nomArc,$old28,$new28);
$result=replace_string_in_file($nomArc,$old29,$new29);
$result=replace_string_in_file($nomArc,$old30,$new30);
$result=replace_string_in_file($nomArc,$old31,$new31);
$result=replace_string_in_file($nomArc,$old32,$new32);
$result=replace_string_in_file($nomArc,$old33,$new33);
$result=replace_string_in_file($nomArc,$old34,$new34);
$result=replace_string_in_file($nomArc,$old35,$new35);
$result=replace_string_in_file($nomArc,$old36,$new36);
$result=replace_string_in_file($nomArc,$old37,$new37);
$result=replace_string_in_file($nomArc,$old38,$new38);
$result=replace_string_in_file($nomArc,$old39,$new39);
$result=replace_string_in_file($nomArc,$old40,$new40);
$result=replace_string_in_file($nomArc,$old41,$new41);
$result=replace_string_in_file($nomArc,$old42,$new42);
$result=replace_string_in_file($nomArc,$old43,$new43);
$result=replace_string_in_file($nomArc,$old44,$new44);
$result=replace_string_in_file($nomArc,$old45,$new45);
$result=replace_string_in_file($nomArc,$old46,$new46);
$result=replace_string_in_file($nomArc,$old47,$new47);
$result=replace_string_in_file($nomArc,$old48,$new48);
$result=replace_string_in_file($nomArc,$old49,$new49);
$result=replace_string_in_file($nomArc,$old50,$new50);
$result=replace_string_in_file($nomArc,$old51,$new51);
$result=replace_string_in_file($nomArc,$old52,$new52);
$result=replace_string_in_file($nomArc,$old53,$new53);
$result=replace_string_in_file($nomArc,$old54,$new54);
$result=replace_string_in_file($nomArc,$old55,$new55);
$result=replace_string_in_file($nomArc,$old56,$new56);
$result=replace_string_in_file($nomArc,$old57,$new57);
$result=replace_string_in_file($nomArc,$old58,$new58);
$result=replace_string_in_file($nomArc,$old59,$new59);
$result=replace_string_in_file($nomArc,$old60,$new60);
$result=replace_string_in_file($nomArc,$old61,$new61);
$result=replace_string_in_file($nomArc,$old62,$new62);
$result=replace_string_in_file($nomArc,$old63,$new63);
$result=replace_string_in_file($nomArc,$old64,$new64);
$result=replace_string_in_file($nomArc,$old65,$new65);
$result=replace_string_in_file($nomArc,$old66,$new66);
$result=replace_string_in_file($nomArc,$old67,$new67);
$result=replace_string_in_file($nomArc,$old68,$new68);
$result=replace_string_in_file($nomArc,$old69,$new69);
$result=replace_string_in_file($nomArc,$old70,$new70);
$result=replace_string_in_file($nomArc,$old71,$new71);
$result=replace_string_in_file($nomArc,$old72,$new72);
$result=replace_string_in_file($nomArc,$old73,$new74);
$result=replace_string_in_file($nomArc,$old75,$new75);
$result=replace_string_in_file($nomArc,$old76,$new76);
$result=replace_string_in_file($nomArc,$old77,$new77);
$result=replace_string_in_file($nomArc,$old78,$new78);
$result=replace_string_in_file($nomArc,$old79,$new79);
$result=replace_string_in_file($nomArc,$old80,$new80);
$result=replace_string_in_file($nomArc,$old81,$new81);
$result=replace_string_in_file($nomArc,$old82,$new82);
$result=replace_string_in_file($nomArc,$old83,$new83);
$result=replace_string_in_file($nomArc,$old84,$new84);
$result=replace_string_in_file($nomArc,$old85,$new85);
$result=replace_string_in_file($nomArc,$old86,$new86);
$result=replace_string_in_file($nomArc,$old87,$new87);
$result=replace_string_in_file($nomArc,$old88,$new88);
$result=replace_string_in_file($nomArc,$old89,$new89);
$result=replace_string_in_file($nomArc,$old90,$new90);
$result=replace_string_in_file($nomArc,$old91,$new91);
$result=replace_string_in_file($nomArc,$old92,$new92);
$result=replace_string_in_file($nomArc,$old93,$new93);
$result=replace_string_in_file($nomArc,$old94,$new94);
$result=replace_string_in_file($nomArc,$old95,$new95);
$result=replace_string_in_file($nomArc,$old96,$new96);
$result=replace_string_in_file($nomArc,$old97,$new97);
$result=replace_string_in_file($nomArc,$old98,$new98);
$result=replace_string_in_file($nomArc,$old99,$new99);
$result=replace_string_in_file($nomArc,$old100,$new100);
$result=replace_string_in_file($nomArc,$old101,$new101);
$result=replace_string_in_file($nomArc,$old102,$new102);
$result=replace_string_in_file($nomArc,$old103,$new103);
$result=replace_string_in_file($nomArc,$old104,$new104);
$result=replace_string_in_file($nomArc,$old105,$new105);
$result=replace_string_in_file($nomArc,$old106,$new106);
$result=replace_string_in_file($nomArc,$old107,$new107);
$result=replace_string_in_file($nomArc,$old108,$new108);
$result=replace_string_in_file($nomArc,$old109,$new109);
$result=replace_string_in_file($nomArc,$old110,$new110);
$result=replace_string_in_file($nomArc,$old111,$new111);
$result=replace_string_in_file($nomArc,$old112,$new112);
$result=replace_string_in_file($nomArc,$old113,$new113);
$result=replace_string_in_file($nomArc,$old114,$new114);
$result=replace_string_in_file($nomArc,$old115,$new115);
$result=replace_string_in_file($nomArc,$old116,$new116);
$result=replace_string_in_file($nomArc,$old117,$new117);
$result=replace_string_in_file($nomArc,$old118,$new118);
$result=replace_string_in_file($nomArc,$old119,$new119);
$result=replace_string_in_file($nomArc,$old120,$new120);
$result=replace_string_in_file($nomArc,$old121,$new121);
$result=replace_string_in_file($nomArc,$old122,$new122);
$result=replace_string_in_file($nomArc,$old123,$new123);
$result=replace_string_in_file($nomArc,$old124,$new124);
$result=replace_string_in_file($nomArc,$old125,$new125);
$result=replace_string_in_file($nomArc,$old126,$new126);
$result=replace_string_in_file($nomArc,$old127,$new127);
$result=replace_string_in_file($nomArc,$old128,$new128);
$result=replace_string_in_file($nomArc,$old129,$new129);
$result=replace_string_in_file($nomArc,$old130,$new130);
$result=replace_string_in_file($nomArc,$old131,$new131);
$result=replace_string_in_file($nomArc,$old132,$new132);

}

?>
</div>
    </div>
	</section>
<!-- Finaliza Seccion de contenido -->

<!-- Empieza barra lateral -->
	<aside>
    <h2>A tener en cuenta</h2>
    <ul>
<li>Solo se pueden procesar archivos con extension txt.</li>
<li>No deben nombrarse con guiones.</li>
</ul>
  </aside>
<!-- Finaliza barra lateral -->

<!-- Empieza pie de pagina -->
	<footer>
		<a href="#">By: Marco Marin</a>
	</footer>
<!-- Empieza pie de pagina -->

</div>
</body>
</html>