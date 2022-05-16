<?php 
require_once("identifier1.php");
require_once("../tcpdf/tcpdf.php");
require_once("connexion.php");
if(isset($_POST['imprimer'])){
     $nfacture=htmlspecialchars($_POST['nfacture']);
$date=htmlspecialchars($_POST['date']);
$client=htmlspecialchars($_POST['client']);
$tp=htmlspecialchars($_POST['tp']);
$pharmacie=htmlspecialchars($_POST['ph']);


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
        $libelle=$_POST['libelle'];
        $quantite=$_POST['quantite'];
        $prixu=$_POST['prixu'];
        $total=$_POST['total'];
        $ht=$_POST['Ht'];
        $avance=$_POST['avance'];
        $reste=$_POST['reste'];
$tva=htmlspecialchars($_POST['tva']);
$remise=htmlspecialchars($_POST['remise']);
$ttc=htmlspecialchars($_POST['ttc']);
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
        for($i=0;$i<count($libelle);$i++){
            $this->Cell($w[0], 6, $libelle[$i], 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $quantite[$i], 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $prixu[$i], 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, $total[$i], 'LR', 0, 'C', $fill);
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
            $this->Cell($w[1], 6, $ht, 1, 1, 'C', $fill);
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
            $this->Cell($w[1], 6, $ttc, 1,1, 'C', $fill);
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
$pdf->Cell(30,10,$client,0,1);
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
$pdf->SetFont('', 'B');
$pdf->Cell(160,10,"merci pour votre visite",0,1,'R');
}
   

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('pdf.pdf', 'I');

?>