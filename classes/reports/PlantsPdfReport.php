<?php

include_once "Report.php";

class PlantsPdfReport extends Report {


    public function __construct() {
		parent::__construct(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
	}




    public function GenerateReport($pdfFileName, $title, $header, $columns, $titles, $data)
    {
        //Delete all  the outp precedent...
        ob_end_clean();

        //$pdf = new Report();

                // set document information
        $this->setCreator(PDF_CREATOR);
        $this->setAuthor('Emanuel Jauregui');
        $this->setTitle('Lista de Plantas');
        $this->setSubject('Plants');
        $this->setKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $this->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, $header);

        // set header and footer fonts
        $this->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $this->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $this->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $this->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $this->setHeaderMargin(PDF_MARGIN_HEADER);
        $this->setFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $this->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $this->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $this->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $this->setFont('helvetica', '', 12);

        // add a page
        $this->AddPage();

        // column titles
        $header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');

        // data loading
        //$data = $pdf->LoadData('data/table_data_demo.txt');

        // print colored table
        $this->ColoredTable($columns, $titles, $data);

        // ---------------------------------------------------------

        // close and output PDF document
        $this->Output($pdfFileName, 'I');

    }

}



?>