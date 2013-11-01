<?php

/**
 * Konfiguration 
 *
 * Bitte passen Sie die folgenden Werte an, bevor Sie das Script benutzen!
 * 
 * Das Skript bitte in UTF-8 abspeichern (ohne BOM).
 */
 
// An welche Adresse sollen die Mails gesendet werden?
$zieladresse = 's@goerke.net';

// Welche Adresse soll als Absender angegeben werden?
// (Manche Hoster lassen diese Angabe vor dem Versenden der Mail ueberschreiben)
$absenderadresse = 'anfrageprofil@venturaonline.de';

// Welcher Absendername soll verwendet werden?
$absendername = 'Anfrageprofil Webseite';

// Welchen Betreff sollen die Mails erhalten?
$betreff = 'Anfrageprofil Webseite';

// Zu welcher Seite soll als "Danke-Seite" weitergeleitet werden?
// Wichtig: Sie muessen hier eine gueltige HTTP-Adresse angeben!
$urlDankeSeite = 'kunde-anfrageprofil-danke.php';

// Welche(s) Zeichen soll(en) zwischen dem Feldnamen und dem angegebenen Wert stehen?
$trenner = ":\t"; // Doppelpunkt + Tabulator

/**
 * Ende Konfiguration
 */


if ($_SERVER['REQUEST_METHOD'] === "POST") {

	$header = array();
	$header[] = "From: ".mb_encode_mimeheader($absendername, "utf-8", "Q")." <".$absenderadresse.">";
	$header[] = "MIME-Version: 1.0";
	$header[] = "Content-type: text/plain; charset=utf-8";
	$header[] = "Content-transfer-encoding: 8bit";
	
    $mailtext = "";

//Dynamisches Abfangen sämtlicher ausgefüllten felder 
foreach( $_POST as $key => $wert ) {
 if( !empty( $wert ) ) {
  $mailtext .= $key.":\t".$wert."\n"; 



        } else {
            $mailtext .= ""; "\n";
        }
    }

    mail(
    	$zieladresse, 
    	mb_encode_mimeheader($betreff, "utf-8", "Q"), 
    	$mailtext,
    	implode("\n", $header)
    ) or die("Die Mail konnte nicht versendet werden.");
    header("Location: $urlDankeSeite");
    exit;
}

header("Content-type: text/html; charset=utf-8");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ventura | Kunde | Ihr Anfrageprofil</title>
<link href="css/print.css" rel="stylesheet" type="text/css" media="print" />
<link href="css/formular.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onload="MM_preloadImages('img/button-druck-m.png','img/button-facebook-m.png','img/button-mail-m.png')">
<div id="container">
<div id="header">
<ul id="navigation">
    <li><a href="kunde.php"><span>Kunde</span></a></li>
    <li><a href="personal.php">Personal</a></li>
    <li><a href="bewerber.php">Bewerber</a></li>
    <li><a href="index.php">Start</a></li>
</ul>
</div> <!--header-->

<div id="buehne">

<div id="rubrikKunde" style="background-image:url(img/ventura-kunde.jpg);"></div>
  
  <ul id="subnavigation">
    <li><a href="kunde-anfrageprofil.php"><span>Ihr Anfrageprofil</span></a></li>
    <li><a href="kunde-ansprechpartner.php">Ihre Ansprechpartner</a></li>
    <li><a href="kunde-zusammenarbeit.php">Unsere Zusammenarbeit</a></li>
</ul>

<div id="textkasten">

<div class="formTextKasten">
<div class="formText">Schön, dass Sie sich für unsere Mitarbeiter interessieren. <br />
Damit wir Sie schnellstmöglich unterstützen 
können, ist es hilfreich, wenn Sie uns kurz in 
nebenstehendem Formular angeben, welche 
Arbeitskräfte Sie benötigen. <br />
Damit können wir Ihnen im nächsten Schritt die passenden Mitarbeiter anbieten.<br /><br />

<span>>> Bitte absenden</span>
</div></div>

<div class="formFormularKasten" style="background-color:#d9d9d9; height:410px;">

<form id="form1" method="post" name="registration" action="" onSubmit="return v.exec()">

  
  
<div class="formHL">Anfrageprofil für Personal</div>

  <div class="reihe">
    <span class="label">
    <label for="Qualifikation">Qualifikation*</label></span>
    <span class="feld"><input type="text" class="defbreite" size="30" height="45px" width="170px" id="Qualifikation" name="Qualifikation" /></span>
  </div>

  <div class="reihe">
    <span class="label">
    <label for="vorname">Vorname*</label></span>
    <span class="feld"><input type="text" class="defbreite" size="30" height="45px" width="490px" id="vorname" name="Vorname" /></span>
  </div>

<div class="reihe">
    <span class="label">
    <label for="strasse">Straße/Hausnummer</label></span>
    <span class="feld"><input type="text" class="defbreite" size="80" height="45px" width="490px" id="strasse" name="Straße/Hausnummer" /></span>
  </div>

<div class="reihe">
    <span class="label">
    <label for="ort">PLZ/Ort</label></span>
    <span class="feld"><input type="text" class="defbreite" size="80" height="45px" width="490px" id="ort" name="PLZ/Ort" /></span>
  </div>
  
<div class="reihe">
    <span class="label">
    <label for="telfax">Tel./Fax-Nr.*</label>
    </span>
    <span class="feld"><input type="text" class="defbreite" size="80" height="45px" width="490px" id="telfax" name="Tel./Fax-Nr." /></span>
  </div>

<div class="reihe">
    <span class="label">
    <label for="teltag">Tel. tagsüber</label>
    </span>
    <span class="feld"><input type="text" class="defbreite" size="80" height="45px" width="490px" id="teltag" name="Tel tagsüber" /></span>
  </div>

<div class="reihe">
    <span class="label">
    <label for="email">E-Mail*</label>
    </span>
    <span class="feld"><input type="text" class="defbreite" size="80" height="45px" width="490px" id="email" name="E-Mail" /></span>
  </div>

<div class="reihe">
    <span class="label">
    <label for="versnummer">Versicherungs-Nr. (Falls vorhanden)</label>
    </span>
    <span class="feld"><input type="text" class="defbreite" size="80" height="45px" width="490px" id="versnummer" name="Versicherungs-Nr." /></span>
  </div>



<div class="reihehoch">
    <span class="label">
    <label for="informationen">Bitte informieren Sie mich/uns <br>
über folgende Themen:</label>
    </span>
    <span class="feld">
    <textarea name="Bitte informieren Sie mich über" cols="80" rows="5" class="defbreitehoch" id="informationen" height="160px" width="490px"></textarea>
    </span>
  </div>

<div class="reihe">
    <span class="label">
    <label for="wunschtermin">Wunschtermin</label>
    </span>
    <span class="feld"><input type="text" class="defbreite" size="80" height="45px" width="490px" id="wunschtermin" name="Wunschtermin" /></span>
  </div>


<div class="absenden">
<input type="image" width="149" height="38" border="none" name="button" id="button" value="Senden" src="assets/img/formular_absenden.png" class="senden"> <input type="reset" name="Formular löschen" value="" class="reset">


</div>    

  </form>

</div> <!--formFormularKasten-->

</div> <!--textkasten-->

</div> <!--buehne-->

<div id="footer">
<div class="footertext" style="margin-left:42px;">Hotline <span>0202–26934850</span></div>
<div class="footertext" style="margin-left:370px; margin-top:45px;"><a href="kontakt-anfahrt.php">Kontakt|Anfahrt</a></div>
<div class="footertext" style="margin-left:530px; margin-top:45px;"><a href="agb.php">AGB</a></div>
<div class="footertext" style="margin-left:600px; margin-top:45px;"><a href="impressum.php">Impressum</a></div>

<div class="footertext" style="margin-left:800px; margin-top:40px;"><a href="mailto:info@venturaonline.de" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('mail','','img/button-mail-m.png',1)"><img src="img/button-mail.png" alt="E-Mail" width="42" height="30" id="mail" /></a></div>

<div class="footertext" style="margin-left:860px; margin-top:40px;"><a href="#" onclick="window.print();" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('druck','','img/button-druck-m.png',1)"><img src="img/button-druck.png" alt="Drucken" width="42" height="30" id="druck" /></a></div>

<div class="footertext" style="margin-left:920px; margin-top:40px;"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('facebook','','img/button-facebook-m.png',1)"><img src="img/button-facebook.png" alt="Facebook" width="42" height="30" id="facebook" /></a></div>

</div> <!--footer-->

</div> <!--container-->

<!--Für den Ausdruck-->
<!--<img class="nurimdruck" src="img/header.png" width="1000" height="164" />-->

<!----------------------- start validator check ----------------------->
<script>
// form fields description structure
var a_fields = {
	/*'Kundennummer': {
		'l': 'Kundennummer',  // label
		'r': true,    // required
		't': 'highlight_kundennummer',// id of the element to highlight if input not validated
		
		'm': null,     // must match specified form field
		'mn': 3,       // minimum length
		'mx': 50       // maximum length
	},*/
	
	'name': {
		'l': 'Name',  // label
		'r': true,    // required
		't': 'name',// id of the element to highlight if input not validated
		
		'm': null,     // must match specified form field
		'mn': 3,       // minimum length
		'mx': 50       // maximum length
	},
	
	'vorname': {
		'l': 'Vorname',  // label
		'r': true,    // required
		't': 'vorname',// id of the element to highlight if input not validated
		
		'm': null,     // must match specified form field
		'mn': 3,       // minimum length
		'mx': 50       // maximum length
	},
	
/*	'Strasse': {
		'l': 'Strasse',  // label
		'r': true,    // required
		't': 'highlight_strasse',// id of the element to highlight if input not validated
		
		'm': null,     // must match specified form field
		'mn': 2,       // minimum length
		'mx': 20       // maximum length
	},
	
	'PLZOrt': {
		'l': 'PLZ/Ort',  // label
		'r': true,    // required
		't': 'highlight_plzort',// id of the element to highlight if input not validated
		
		'm': null,     // must match specified form field
		'mn': 2,       // minimum length
		'mx': 20       // maximum length
	},*/
	
	'telfax': {
		'l': 'Tel./Fax-Nr.',  // label
		'r': true,    // required
		't': 'telfax',// id of the element to highlight if input not validated
		
		'm': null,     // must match specified form field
		'mn': 4,       // minimum length
		'mx': 24       // maximum length
	},
	
	'email': {
		'l': 'E-Mail',  // label
		'f': 'email',  // format (see below)
		'r': true,    // required
		't': 'email',// id of the element to highlight if input not validated
		
		'm': null,     // must match specified form field
		'mn': 4,       // minimum length
		'mx': 40       // maximum length
	},
	
/*	'Kundennummer': {
		'l': 'Kundennummer',  // label
		'r': true,    // required
		't': 'highlight_kundennummer',// id of the element to highlight if input not validated
		
		'm': null,     // must match specified form field
		'mn': 4,       // minimum length
		'mx': 20       // maximum length
	},
*/	
/*	'first_name':{'l':'Vorname','r':true,'f':'alpha','t':'t_first_name'},
	'last_name':{'l':'Nachname','r':true,'f':'alpha','t':'t_last_name'},
	'company':{'l':'Firma','r': true,'t':'t_company'},
	'company_number':{'l':'Company Number','r':false,'f':'unsigned','t':'t_company_number'},
	'street_address':{'l':'Straße','r':true,'t':'t_street_address'},
	'city':{'l':'Stadt','r':true,'f':'alpha','t':'t_city'},
	'county':{'l':'County','r':false,'f':'alphanum','t':'t_county'},
	'post_code':{'l':'Post Code','r':true,'f':'unsigned','t':'t_post_code'},
	'country':{'l':'Country','r':true,'t':'t_country'},
	'telephone_number':{'l':'Telephone Number','r':true,'f':'phone','t':'t_telephone_number'},
	'email':{'l':'E-mail','r':true,'f':'email','t':'t_email'},
	'general_information':{'l':'General information','r':true,'t':'t_general_information'}
*/},

o_config = {
	'to_disable' : ['Submit', 'Reset'],
	'alert' : 1
}

// validator constructor call
var v = new validator('registration', a_fields, o_config);
</script>
<!----------------------- end validator check ----------------------->




</body>
</html>
