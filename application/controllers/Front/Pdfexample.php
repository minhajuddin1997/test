<?php
class Pdfexample extends CI_Controller{ 
    public function __construct(){ 
        parent::__construct(); 
        $this->load->library('Pdf');
    } 
    public function index(){
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Pdf Example');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage();
        $html = <<<EOF

<table width="100%" border="0" align="center" bgcolor="#fff">
			<tr>
				<td align="left" valign="top">
					<table width="600" border="0" align="center" bgcolor="#fff" style="border-bottom: 1px solid #d5af69;">
						<tr>
							<td width="2" align="left" valign="top">
							
							</td>
							<td width="540" align="center" valign="top">
								<img src="https://cdn.shortpixel.ai/spai/q_lossy+ret_img/https://www.dynistybranding.com/wp-content/uploads/2020/04/cropped-cropped-logo.png" alt="logo" style="width: 170px;" />
							</td>
							<td width="2" align="right" valign="top">
							
							</td>
						</tr>
					</table>
					<table width="550" border="0" align="center"  bgcolor="#fff" style="border-bottom: 2px solid #333;" >
						<tr>
							<td width="545" align="center" valign="top">
								<p style="font-size: 13px;
									margin: 20px 0;">Thank you for your interest in Dynisty Brandings. Here is the invoice. </p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
EOF;
$pdf->writeHTML($html);

        $fileatt = $pdf->Output('pdfexample.pdf',  'E'); 
        $data = chunk_split($fileatt);
        return $data;
    }
}
?>