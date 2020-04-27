<?php

class credential extends CI_Controller {

//    public function __construct()
//    {
//        parent::__construct();
//        $this->load->library('Ciqrcode');
//        // $this->load->database(); ya esta autoload
//    }

    public function index(){
        $this->load->view('plantilla/header');
        $this->load->view('credential/index');
        $this->load->view('plantilla/footer');
    }
    public function target($hash){

        include 'TCPDF/tcpdf.php';

        $row=$this->db->query("SELECT * FROM persona WHERE hash='$hash'")->row();
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Adimer paul');
        $pdf->SetTitle('Credential');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------

// set font
        $pdf->SetFont('helvetica', 'B', 13);

// add a page
        $pdf->AddPage();

// set some text to print
        $txt = <<<EOD
TCPDF Example 002

Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
EOD;


// print a block of text using Write()
//        $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
//        QRcode::png('PHP QR Code :)','a.png');

        $pdf->Image('dist/images/credential.png', 2, 2, 205);
        // set style for barcode
        $style = array(
            'border' => 0,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => array(255,255,255),
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        if (file_exists("dist/personas/$row->r_foto") && $row->r_foto!="" ){
            $url="dist/personas/$row->r_foto";
//                        $url="si";
        }else{
            $url="dist/personas/user.png";
//                        $url="no";
        }
        $pdf->Image($url, 80, 8, 20);
// QRCODE,L : QR-CODE Low error correction
        $pdf->write2DBarcode('http://localhost/control/Credential/location/'.$hash, 'QRcode', 105, 8, 42, 42, $style);
//        $pdf->Text(20, 25, 'QRCODE L');




        $pdf->Text(148,17,$row->nombre);
        $pdf->Text(148,26,$row->apellido);
        $pdf->Text(148,35,"C.I. ".$row->ci);
//        $pdf->Image('dist/images/credential.png', 2, 68+2, 205);
//        $pdf->Image('dist/images/credential.png', 2, 68*2+2, 205);
//        $pdf->Image('dist/images/credential.png', 2, 68*3+2, 205);
// ---------------------------------------------------------

//Close and output PDF document
        $pdf->Output('example_002.pdf', 'I');

    }
    function location($hash){
        $query=$this->db->query("SELECT * FROM persona WHERE hash='$hash'");
//        var_dump($row);
        if ($query->num_rows()==0){
            echo "Denegado";
        }else{
            $row=$query->row();
            $data=$row;
//        exit;
            $this->load->view('plantilla/header2');
            $this->load->view('credential/location',$data);
            $this->load->view('plantilla/footer');
        }

    }
    function insertLocation(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        $id_persona=$_POST['id_persona'];
        $latitud=$_POST['latitud'];
        $longitud=$_POST['longitud'];
        $this->db->query("INSERT INTO localizacion SET id_persona='$id_persona',latitud='$latitud',longitud='$longitud'");
//        var_dump($_POST);
//        $id_persona=$_POST['id_persona'];
        echo 1;
    }
}
