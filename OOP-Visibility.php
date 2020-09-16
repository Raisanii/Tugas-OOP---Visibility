<?php 
	class Produk {

		public $namaBarang, 
				$jenisBarang, 
				$merk;
		protected $diskon;
		private $harga;

		public function __construct($namaBarang = "Nama Barang", $jenisBarang = "Jenis Barang", $merk = "Merk", $harga = 0){

			$this->namaBarang = $namaBarang;
			$this->jenisBarang = $jenisBarang;
			$this->merk = $merk;
			$this->harga = $harga;

		}

		public function getLabel(){
			return "$this->jenisBarang, $this->merk";
		}

		public function getInfoProduk(){
			$str = "{$this->namaBarang} | {$this->getLabel()} (Rp. {$this->harga})";
			return $str;
		}

		public function getHarga() {
		return $this->harga - ($this->harga * $this->diskon /100 );
		}

	}

	class Baju extends Produk {

		public $uk_B;
		public function __construct ($namaBarang = "Nama Barang", $jenisBarang = "Jenis Barang", $merk = "Merk", $harga = 0,$uk_B = "ukuran"){

			parent::__construct($namaBarang, $jenisBarang, $merk, $harga);
			$this->uk_B = $uk_B;
		}

		public function getInfoProduk(){
			$str = "Pakaian : " .parent::getInfoProduk(). "- ukuran ( {$this->uk_B} ).";
			return $str;
		}
	}

	class Sepatu extends Produk{

		public $uk_S;
		public function __construct($namaBarang = "Nama Barang", $jenisBarang = "Jenis Barang", $merk = "Merk", $harga = 0, $uk_S = 0){
			parent::__construct($namaBarang, $jenisBarang, $merk, $harga);
			$this->uk_S = $uk_S;
		}

		public function getInfoProduk(){
			$str = "Sepatu : " .parent::getInfoProduk(). "- ukuran ( {$this->uk_S} Cm).";
			return $str;
		}

		 public function setDiskon($diskon){
        $this->diskon=$diskon;
    }
	}  

	class CetakInfoProduk{
 	public function cetak( Produk $produk ){
		$str = "{$produk->namaBarang} | {$produk->getlabel()} (Rp. {$produk->harga})";
		return $str;
 	}
 } 

$produk1 = new Baju("Baju", "Sweater", "H&M", 150000, "M");

$produk2 = new Sepatu("Sepatu Olahraga", "Air Jordan", "Nike", 1148000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
$produk2->setDiskon(50);
echo $produk2->getInfoProduk(). "<b> >>>Diskon menjadi (Rp ".$produk2->getHarga(). ")<<< <b>";
echo "<hr>";




 ?>