<?php
class Pdf
{
	function __construct()
	{
		include_once APPPATH . '/third_party/fpdf/fpdf.php';
	}
	function Header()
	{
		$this->SetFont('Arial', 'B', 16);
		$this->Cell(190, 7, 'Sekolah Tinggi Teknologi Payakumbuh', 0, 1, 'C');
		$this->Image('assets/img/logoo.png', 10, 6, 30);
		$this->Ln(2);
		$this->SetFont('Arial', 'B', 9);
		$this->Cell(0, 4, 'Jl.Khatib Sulaiman, Kota Payakumbuh, Sumatera Barat. Website: www.sttpayakumbuh.ac.id', 0, 1, 'C');
		$this->Cell(0, 4, 'Email: sttpayakumbuh@mail.com Telp. Office: (021) xxxxxxx, xxxxxxx', 0, 1, 'C');
		$this->Ln(1);
		// $this->MultiCell(0,4,'------------------------------------------------------------------------',0,1,'C');
		$this->Cell(0, 1, " ", "B");
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial', 'I', 8);
		$this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
	}
}
