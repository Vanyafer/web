<?php

    include 'FPDF/fpdf.php';

    class PDFController extends FPDF {

        public function header() {
			$this->Image('source/build/img/soccer-ball.png');
			$this->SetFont('Arial','B',14);
			$this->Cell(276, 5, 'FACTURA', 0, 0, 'C');
			$this->Ln();
			$this->SetFont('Times', '', 12);
			$this->Cell(276, 10, 'Tienda de Deportes', 0,0,'C');
			$this->Ln(20);
		}
		public function Footer() {
			$this->SetY(-15);
			$this->SetFont('Arial', '', 8);
			$this->Cell(0, 10, utf8_decode('Página '. $this->PageNo().'/{nb}'),0,0,'C');
		}

		public function headerTable() {
			$this->SetFont('Times', 'B', 12);
			$this->Cell(72, 10, utf8_decode('Nombre'), 1, 0, 'C');
			$this->Cell(120, 10, utf8_decode('Descripción'), 1, 0, 'C');
			$this->Cell(28, 10, utf8_decode('Precio'), 1, 0, 'C');
			$this->Cell(28, 10, utf8_decode('Cantidad'), 1, 0, 'C');
			$this->Cell(28, 10, utf8_decode('Subtotal'), 1, 0, 'C');
			$this->Ln();
        }
        
        public function setContentTable($name, $price, $desc, $qty, $sub) {
			$this->SetFont('Helvetica', 'B', 9);
			$cellWidth = 120;
			$cellHeight = 10;
			if($this->GetStringWidth($desc) < $cellWidth):
				$line = 1;
			else:
				$textLength = strlen($desc);
				$errMargin = 10;
				$startChar = 0;
				$maxChar = 0;
				$textarray = array();
				$tmp = "";
				while($startChar < $textLength):
					while($this->GetStringWidth($tmp) < ($cellWidth - $errMargin) && ($startChar+$maxChar) < $textLength):
						$maxChar++;
						$tmp = substr($desc, $startChar, $maxChar);
					endwhile;
					$startChar = $startChar + $maxChar;
					array_push($textarray, $tmp);
					$maxChar = 0;
					$tmp = '';
				endwhile;
				$line = count($textarray);
			endif;

			$this->Cell(72, ($line * $cellHeight), utf8_decode($name), 1, 0, 'C'); 
			$xPos = $this->GetX();
			$yPos = $this->GetY();
			$this->MultiCell($cellWidth, $cellHeight, utf8_decode($desc), 1, 'C');
			$this->SetXY($xPos + $cellWidth, $yPos);
			$this->Cell(28, ($line * $cellHeight), utf8_decode('$ '.$price), 1, 0, 'C');
			$this->Cell(28, ($line * $cellHeight), utf8_decode($qty), 1, 0, 'C');
            $this->Cell(28, ($line * $cellHeight), utf8_decode('$ '.$sub), 1, 0, 'C');
			$this->Ln();
        }

        public function details($name, $lastname, $address, $id, $cp, $fp, $fe, $qty) {
			$this->SetFont('Times', '', 12);
			$this->Cell(276, 10, utf8_decode('Id de factura: '.$id), 0,0,'L');
			$this->Ln();
			$this->Cell(138, 10, utf8_decode('Nombre: '.$name), 0,0,'L');
			$this->Cell(138, 10, utf8_decode('Apellidos: '.$lastname), 0,0,'L');
			$this->Ln();
			$this->Cell(138, 10, utf8_decode('Dirección: '.$address), 0,0,'L');
			$this->Cell(138, 10, utf8_decode('Código Postal: '.$cp), 0,0,'L');
			$this->Ln();
			$this->Cell(138, 10, utf8_decode('Fecha de Pedido: '.$fp), 0,0,'L');
			$this->Cell(138, 10, utf8_decode('Fecha de Entrega: '.$fe), 0,0,'L');
			$this->Ln();
			$this->Cell(276, 10, utf8_decode('Cantidad Total de Productos: '.$qty), 0, 0, 'L');
			$this->Ln();
			$this->Ln();
		}

		public function setTotal($total) {
			$this->SetFont('Times', 'B', 10);
			$this->Cell(248, 10, utf8_decode(''), 1, 0, 'C', true);
			$this->Cell(28, 10, utf8_decode('$ '.$total), 1, 0, 'C');
			$this->Ln();
		}

    }

?>