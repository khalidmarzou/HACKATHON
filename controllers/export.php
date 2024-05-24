<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require dirname(__DIR__) . '/database/database.php';

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $db = new Database();

    // get data 
    $db->query('SELECT * FROM Laureat WHERE valide = :valide ;');
    $db->bind(':valide',1);
    $db->execute();
    $results = $db->resultSet();

   
    

    if($_POST['exportType'] == 'csv'){
        header('Content-type: text/plain');
        header('Content-Disposition: attachement; filename=laureat.csv');

        echo '"Identifiant","nom","Prenom","email","Tel","promotion","Filiere","Etablissement","Fonction","Employeur","valide"' . PHP_EOL;

        foreach($results as $result) {
            echo '"' . $result->Identifiant . '","' . $result->nom . '","' . $result->Prenom . '","' . $result->email . '","' . $result->Tel . '","' . $result->promotion . '","' . $result->Filiere . '","' . $result->Etablissement . '","' . $result->Fonction . '","' . $result->Employeur . '","' . $result->valide . '"' . PHP_EOL;
        }


        
    }else{

        require dirname(__DIR__) . '/modules/fpdf186/fpdf.php';


$pdf = new FPDF();
$pdf->AddPage();

$path =  dirname(__DIR__) . '/views/asset/Logo_ofppt.png';

$pdf->Image($path, 5, 5, 33); 

$pdf->Ln(35);

$pdf->SetFont('Arial', 'B', 7); 

$headerColor = array(0, 163, 166); // RGB for #00A3A6
$pdf->SetFillColor($headerColor[0], $headerColor[1], $headerColor[2]);

$pdf->SetTextColor(255, 255, 255); 

$pdf->Cell(10, 8, 'ID', 1, 0, 'C', true); 
$pdf->Cell(15, 8, 'Nom', 1, 0, 'C', true); 
$pdf->Cell(15, 8, 'Prenom', 1, 0, 'C', true); 
$pdf->Cell(40, 8, 'Email', 1, 0, 'C', true); 
$pdf->Cell(15, 8, 'Tel', 1, 0, 'C', true); 
$pdf->Cell(15, 8, 'Promo', 1, 0, 'C', true); 
$pdf->Cell(15, 8, 'Filiere', 1, 0, 'C', true); 
$pdf->Cell(25, 8, 'Etablissement', 1, 0, 'C', true); 
$pdf->Cell(20, 8, 'Fonction', 1, 0, 'C', true); 
$pdf->Cell(15, 8, 'Employeur', 1, 0, 'C', true); 
$pdf->Cell(10, 8, 'Valide', 1, 1, 'C', true); 
$pdf->SetFont('Arial', '', 7); 

$pdf->SetTextColor(0, 0, 0); 

foreach ($results as $result) {
    $pdf->Cell(10, 8, $result->Identifiant, 1, 0, 'C');
    $pdf->Cell(15, 8, $result->nom, 1, 0, 'C'); 
    $pdf->Cell(15, 8, $result->Prenom, 1, 0, 'C'); 
    $pdf->Cell(40, 8, $result->email, 1, 0, 'C'); 
    $pdf->Cell(15, 8, $result->Tel, 1, 0, 'C'); 
    $pdf->Cell(15, 8, $result->promotion, 1, 0, 'C'); 
    $pdf->Cell(15, 8, $result->Filiere, 1, 0, 'C'); 
    $pdf->Cell(25, 8, $result->Etablissement, 1, 0, 'C'); 
    $pdf->Cell(20, 8, $result->Fonction, 1, 0, 'C'); 
    $pdf->Cell(15, 8, $result->Employeur, 1, 0, 'C'); 
    $pdf->Cell(10, 8, $result->valide, 1, 1, 'C'); }

$pdf->Output('D', 'laureat.pdf'); 

exit; 




    }







}
