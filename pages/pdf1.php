<?php 
require_once("identifier1.php");
require_once("../tcpdf/tcpdf.php");
require_once("connexion.php");
$nfacture=htmlspecialchars($_GET['idf']);
$requete="select * from facture where N_facture='$nfacture'";
$select=$connex->query($requete);
            $tab=$select->fetch();
     $date=$tab['date_facture'];
    $client=$tab['idclient'];
$tp=$tab['id_paiement'];
$requete1="select * from client where id_client='$client'";
$select1=$connex->query($requete1);
$nomclient=$select1->fetch()['nomComplet'];
$requete2="select * from type_paiement where id_paiement='$tp'";
$select2=$connex->query($requete2);
$tp=$select2->fetch()['type_paiement'];
$ut=isset($_GET['idu'])?$_GET['idu']:"";
$requete3="select * from utilisateurs where id_utilisateur='$ut'";
$select3=$connex->query($requete3);
$pharmacie=$select3->fetch()['pharmacie'];
class PDF extends TCPDF{

    public function Header(){
        $imagefile=K_PATH_IMAGES.'logo5.png';
     $this->Image($imagefile,80,5,60,'','PNG','','T',false,600,'',false,false,0,false,false,0,false,false,false);
      

        $this->Ln(5);
        
    }
    public function LoadData() {
        // Read file lines
      
    }

    // Colored table
    public function ColoredTable($header) {
        
        $connex=new PDO("mysql:host=localhost;dbname=gestion_pharmacie;port=3306;charset=utf8mb4",'root','');
        $nfacture=htmlspecialchars($_GET['idf']);
        $requete="select * from facture where N_facture='$nfacture'";
        $select=$connex->query($requete);
        $tab=$select->fetch();
        
        $nbrproducts=$tab['nbrproduits'];
        $mt=$tab['MHT'];
       $ttc=$tab['MTTC'];
       $avance=$tab['avance'];
        $reste=$ttc-$avance;
        
        $tva=$mt*0.2;
        $remise=$tab['remise'];
       
        $requete1="select * from comporter where nfacture='$nfacture'";
        $select1=$connex->query($requete1);

        // Colors, line width and bold font
        $this->SetFillColor(0, 212, 255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 212, 255);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(45, 45, 45, 45);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        while($ligne=$select1->fetch()){
            $codel=$ligne['code_medica'];
            $requete="select * from medicament where code='$codel'";
            $select=$connex->query($requete);
            $tab=$select->fetch();
            $libelle=$tab['libellé'];
            $prixu=$tab['prixvente'];
            $total=$prixu*$ligne['quantite'];
            $this->Cell($w[0], 6, $libelle, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $ligne['quantite'], 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $prixu, 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, $total, 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill=!$fill;
        } $this->Cell(array_sum($w), 0, '', 'T');
        $this->Ln(10);
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 212, 255);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(45, 45, 45, 45);
        $this->Cell($w[0], 6, "", 0, 0, 'C', $fill);
        
        $this->Cell($w[1], 6, "", 0, 0, 'C', $fill);
        $this->Cell($w[0], 6, "MONTANT HT: ", 1, 0, 'C', $fill);
        $this->SetFont('times','I',13);
            $this->Cell($w[1], 6, $mt, 1, 1, 'C', $fill);
            $this->Cell($w[0], 6, "", 0, 0, 'C', $fill);
        $this->Cell($w[1], 6, "", 0, 0, 'C', $fill);
        $this->SetFont('', 'B');
            $this->Cell($w[0], 6, "TVA(20%) :", 1, 0, 'C', $fill);
            $this->SetFont('times','I',13);
            $this->Cell($w[1], 6, $tva, 1, 1, 'C', $fill);
            $this->Cell($w[0], 6, "", 0, 0, 'C', $fill);
        $this->Cell($w[1], 6, "", 0, 0, 'C', $fill);
        $this->SetFont('', 'B');
            $this->Cell($w[0], 6, "Remise :", 1, 0, 'C', $fill);
            $this->SetFont('times','I',13);
            $this->Cell($w[1], 6, $remise, 1, 1, 'C', $fill);
            $this->Cell($w[0], 6, "", 0, 0, 'C', $fill);
        $this->Cell($w[1], 6, "", 0, 0, 'C', $fill);
        $this->SetFont('', 'B');
            $this->Cell($w[0], 6, "Montant TTC :", 1, 0, 'C', $fill);
            $this->SetFont('times','I',13);
            $this->Cell($w[1], 6, $ttc, 1, 1, 'C', $fill);
            $this->Cell($w[0], 6, "", 0, 0, 'C', $fill);
            $this->Cell($w[1], 6, "", 0, 0, 'C', $fill);
            $this->SetFont('', 'B');
            $this->Cell($w[0], 6, "Avance :", 1, 0, 'C', $fill);
            $this->SetFont('times','I',13);
            $this->Cell($w[1], 6, $avance, 1, 1, 'C', $fill);
            $this->Cell($w[0], 6, "", 0, 0, 'C', $fill);
            $this->Cell($w[1], 6, "", 0, 0, 'C', $fill);
            $this->SetFont('', 'B');
                    $this->Cell($w[0], 6, "Reste A Payer :", 1, 0, 'C', $fill);
                    $this->SetFont('times','I',13);
                    $this->Cell($w[1], 6, $reste, 1, 0, 'C', $fill);
            $this->Ln();
            $fill=!$fill;
       
    }
    

}

$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set document information

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
    // set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);



// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
$pdf->Ln(40);


$pdf->Cell(30,10,"FACTURE N:",0,0);
$pdf->SetFont('timesi', '', 14, '', true);
$pdf->Cell(30,10,$nfacture,0,0);
$pdf->SetFont('timesi', '', 13, '', true);
$pdf->Cell(120,10,"DATE:".$date,0,1,'R');

$pdf->Ln(5);
$pdf->SetFont('times','B',14);
$pdf->Cell(35,10,"PHARMACIE: ",0,0);
$pdf->SetFont('times','I',14);
$pdf->Cell(35,10,$pharmacie,0,1);
$pdf->SetFont('times','B',13);
$pdf->Cell(30,10,"Nom client: ",0,0);
$pdf->SetFont('times','I',13);
$pdf->Cell(30,10,$nomclient,0,1);
$pdf->SetFont('times','B',13);
$pdf->Cell(40,10,"Type de paiement: ",0,0);
$pdf->SetFont('times','I',13);
$pdf->Cell(30,10,$tp,0,1);
$pdf->Ln(13);
$header = array('Médicament', ' Quantité', 'Prix U', 'Montant');

// data loading
$data = $pdf->LoadData();

// print colored table
$pdf->ColoredTable($header);
$pdf->Ln(13);
$pdf->Cell(160,10,"merci pour votre visite",0,1,'R');

   

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('pdf1.pdf', 'I');

?>