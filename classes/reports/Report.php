<?php

//require_once('libraries/vendor/TCPDF/tcpdf_include.php');

require_once('libraries/vendor/TCPDF/config/tcpdf_config.php');
require_once('libraries/vendor/TCPDF/tcpdf.php');

// extend TCPF with custom functions
class Report extends TCPDF {



	// Colored table
	public function ColoredTable($columns, $headers, $data) {


		/*
		// Colors, line width and bold font
		$this->setFillColor(255, 0, 0);
		$this->setTextColor(255);
		$this->setDrawColor(128, 0, 0);
		$this->setLineWidth(0.3);
		$this->setFont('', 'B');
		// Header
		$w = array(10, 80, 80);
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		}
		$this->Ln();
		// Color and font restoration
		$this->setFillColor(224, 235, 255);
		$this->setTextColor(0);
		$this->setFont('');
		// Data
		$fill = 0;

		
		foreach($data as $row) {
			
			$this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 6, $row[2], 'LR', 0, 'L', $fill);

			//$this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
			//$this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);

			$this->Ln();
			$fill=!$fill;
		}
		$this->Cell(array_sum($w), 0, '', 'T');
		*/

		$tbl = '<table  border="1" cellpadding="2" cellspacing="2" style="border-collapse:collapse;">';

		$tbl .= '<thead>';
		$tbl .= '<tr style="background-color:#0C4E72;color:#EBF2F7;">';
		//headers section
		foreach($headers as $header) {
			$tbl .= '<th align="center"><b>' . $header . '</b></th>';
		}
		$tbl .= '</tr>';
		$tbl .= '</thead>';


		$tbl .= '<tbody>';




		for( $i = 0; $i < count($data) ;$i++ ) {

			$tbl .= '<tr>';
			for($c=0; $c < count($columns);$c++)
			{
				$colname = $columns[$c];
				$tbl .= '<td>' . $data[$i][ $colname ]. '</td>';
			}



			$tbl .= '</tr>';
		}
		

		$tbl .= '</tbody>';



		$tbl .= '</table>';

		//echo $tbl;

		$this->writeHTML($tbl, true, false, false, false, '');


	}


}

?>