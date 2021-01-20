<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);

class Dompdf extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('pdf');
    }
    public function index(){
         $dompdf->load_view('hello world');
         // (Optional) Setup the paper size and orientation
         $dompdf->setPaper('A4', 'landscape');
         // Render the HTML as PDF
         $dompdf->render();
         // Output the generated PDF to Browser
         $dompdf->stream();
    }
}
