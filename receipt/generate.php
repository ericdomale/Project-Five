<?php 

require ('fpdf182/fpdf.php');

$conn = mysqli_connect("127.0.0.1:3307", "root", "", "receipt");
       if ($conn->connect_error) {
        die("Connection Failed:". $conn->connect_error);
        }

    
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

     $pdf->Image('watermark.jpg',50,20,180);
     $pdf->Image('giwcbg.png',20,6,40);
     $pdf->SetFont('Helvetica','B',15);
     $pdf->Cell(276,5,'GLORIOUS IMPACT WORSHIP CENTER',0,0,'C');
     $pdf->Ln();
     $pdf->SetFont('Helvetica','B',10);
     $pdf->Cell(276,5,'P. O. BOX BT 173',0,0,'C');
     $pdf->Ln();
     $pdf->SetFont('Helvetica','B',10);
     $pdf->Cell(276,5,'Tema, Ghana, TIRA COM.2 ',0,0,'C');
     $pdf->Ln();
     $pdf->SetFont('Helvetica','B',10);
     $pdf->Cell(276,5,'gloriousimpact2005@yahoo.com',0,0,'C');
     $pdf->Ln();
     $pdf->SetFont('Helvetica','B',10);
     $pdf->Cell(276,5,'Tel: +233 24 286 7100',0,0,'C');
     $pdf->Ln();

     $pdf->SetFont('Helvetica','U',20);
     $pdf->Cell(276,10,'IMPACT CITY PROJECT',0,0,'C');
     $pdf->Ln(20);
     $pdf->SetFont('Times','B',20);
     $pdf->Cell(276,0,'OFFICIAL RECEIPT', 0, 0,'C');
     $pdf->Ln(20);
    
    if (isset($_GET['id'])){
        $id = $_GET['id'];
     $sql = "SELECT * FROM pledgetable WHERE id=$id ORDER BY id DESC";
     $result = $conn-> query($sql);
                            
     if ($result-> num_rows > 0) {
     while ($row = $result-> fetch_array())
{

    $pdf->SetFont('Arial','BIU',15);
    $pdf->Cell(35,10,'SERIAL NO:',0,0,'L');
    $pdf->SetFont('Helvetica','',15);
    $pdf->Cell(25,10,$row['serialno'],0,0,'L');
    $pdf->SetFont('Arial','BI',15);
    $pdf->Cell(150,10,'DATE:',0,0,'R');
    $pdf->SetFont('Helvetica','I',20);
    $pdf->Cell(40,10,$row['pdate'],1,0,'R');
    $pdf->Ln(15);

  $pdf->SetFont('Times','B',20);
  $pdf->Cell(83,10,'NAME OF INDIVIDUAL:',0,0,'L');
  $pdf->SetFont('Helvetica','',25);
  $pdf->Cell(25,10,$row['pname'],0,0,'L');
  $pdf->Ln(10);

  $pdf->SetFont('Times','B',20);
  $pdf->Cell(40,10,'CONTACT:',0,0,'L');
  $pdf->SetFont('Helvetica','',25);
  $pdf->Cell(15,10, $row['contact'],0,0,'L');
  $pdf->Ln(20);

  $pdf->SetFont('Times','B',20);
  $pdf->Cell(72,10,'PLEDGED AMOUNT:',0,0,'L');
  $pdf->SetFont('Helvetica','U',20);
  $pdf->Cell(15,10,'GHS '.number_format($row['pamount']),0,0,'L');

  $pdf->SetFont('Times','B',20);
  $pdf->Cell(100,10,'PAID:',0,0,'R');
  $pdf->SetFont('Helvetica','U',20);
  $pdf->Cell(40,10,'GHS '.number_format($row['paid']),0,0,'R');
  $pdf->Ln(10);

  $pdf->SetFont('Times','B',20);
  $pdf->Cell(93,10,'OUTSTANDING/BALANCE:',0,0,'L');
  $pdf->SetFont('Helvetica','U',20);
  $pdf->Cell(15,10,'GHS '.number_format($row['balance']),0,0,'L');
  $pdf->Ln(10);

  $pdf->SetFont('Times','B',20);
  $pdf->Cell(63,10,'PAYMENT MODE:',0,0,'L');
  $pdf->SetFont('Helvetica','',20);
  $pdf->Cell(30,10,$row['payment'],0,0,'L');
  $pdf->Ln(19);

  $pdf->SetFont('Times','B',20);
  $pdf->Cell(250,10,'....................................',0,0,'R');
  $pdf->Ln();
  $pdf->SetFont('Times','B',20);
  $pdf->Cell(250,10,'Authorized Signature',0,0,'R');
  $pdf->Ln();

  $pdf->SetFont('Helvetica','I',10);
  $pdf->Cell(276,10,'........GIWC-Impacting Our Generation........',0,0,'C');
  
     }
 
 

 



$pdf->AliasNbPages();
$pdf->Output();

 
      
        echo "</table>";
        }else {
        echo "0 result";
        }
        $conn-> close();
    }
      
?>