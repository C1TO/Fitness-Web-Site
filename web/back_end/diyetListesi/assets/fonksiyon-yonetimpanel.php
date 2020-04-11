<?php 
ob_start();
try {
	$baglanti=new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8","root","123");
	$baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

	die($e->getMessage());

}

class yonetim {

	private $veriler=array();
	//vt === veritabanı bağlantısı
	function sorgum($vt,$sorgu,$tercih=0)
	{

		$al=$vt->prepare($sorgu);
		$al->execute();
		//verileri çekeceğimiz zaman tercih 1 i kullanacağız
		if($tercih == 1):
			return $al->fetch();
			// döngü olduğu zaman tercih 2 yi kullanacağız
		elseif($tercih==2):
			return $al;
		endif;
	}


	function siteayar($baglanti) 	
	{	
		$sonuc=$this->sorgum($baglanti,"select * from ayarlar",1);

		if($_POST):
			// sol tarafta $ olanlar değişken ismi 
			// post ile olanlar kutucuğa girilen değer 
			$title=htmlspecialchars($_POST["title"]);
			$metatitle=htmlspecialchars($_POST["metatitle"]);
			$metadesc=htmlspecialchars($_POST["metadesc"]);
			$metakey=htmlspecialchars($_POST["metakey"]);
			$metaaut=htmlspecialchars($_POST["metaaut"]);
			$metaown=htmlspecialchars($_POST["metaown"]);
			$metacopy=htmlspecialchars($_POST["metacopy"]);
			$logoyazi=htmlspecialchars($_POST["logoyazi"]);
			$twitter=htmlspecialchars($_POST["twitter"]);
			$facebook=htmlspecialchars($_POST["facebook"]);
			$instagram=htmlspecialchars($_POST["instagram"]);
			$telno=htmlspecialchars($_POST["telno"]);
			$adres=htmlspecialchars($_POST["adres"]);
			$mailadres=htmlspecialchars($_POST["mailadres"]);
			$slogan=htmlspecialchars($_POST["slogan"]);
			$refsayfabas=htmlspecialchars($_POST["refsayfabas"]);
			$filosayfabas=htmlspecialchars($_POST["filosayfabas"]);
			$yorumsayfabas=htmlspecialchars($_POST["yorumsayfabas"]);
			$iletisimsayfabas=htmlspecialchars($_POST["iletisimsayfabas"]);

			//bunlar tablodaki değişkenlerin ismi ? demek ne ile güncelleyeceğiz
			$guncelleme=$baglanti->prepare("update ayarlar set 
				title=?, 
				metatitle=?,
				metadesc=?,
				metakey=?,
				metaauthor=?,
				metaowner=?,
				metacopy=?,
				logoyazisi=?,
				twitter=?,
				facebook=?,
				instagram=?,
				telefonno=?,
				adres=?,
				mailadres=?,
				slogan=?,
				referansbaslik=?,
				filobaslik=?,
				yorumbaslik=?,
				iletisimbaslik=?
				");
			// SAYI YAZDIĞIM YER KAÇINCI SORU İŞARETİNİ TEMSİL EDECEĞİNİ BELLİRLER STR DEMEK STRİNG DEMEK INT YAZDIĞIN DA İNTEGER DEMEK
			//aldığımız değişkeni 1 vb sayılara a yaz demek 
			$guncelleme->bindParam(1,$title,PDO::PARAM_STR);
			$guncelleme->bindParam(2,$metatitle,PDO::PARAM_STR);
			$guncelleme->bindParam(3,$metadesc,PDO::PARAM_STR);
			$guncelleme->bindParam(4,$metakey,PDO::PARAM_STR);
			$guncelleme->bindParam(5,$metaaut,PDO::PARAM_STR);
			$guncelleme->bindParam(6,$metaown,PDO::PARAM_STR);
			$guncelleme->bindParam(7,$metacopy,PDO::PARAM_STR);
			$guncelleme->bindParam(8,$logoyazi,PDO::PARAM_STR);
			$guncelleme->bindParam(9,$twitter,PDO::PARAM_STR);
			$guncelleme->bindParam(10,$facebook,PDO::PARAM_STR);
			$guncelleme->bindParam(11,$instagram,PDO::PARAM_STR);
			$guncelleme->bindParam(12,$telno,PDO::PARAM_STR);
			$guncelleme->bindParam(13,$adres,PDO::PARAM_STR);
			$guncelleme->bindParam(14,$mailadres,PDO::PARAM_STR);
			$guncelleme->bindParam(15,$slogan,PDO::PARAM_STR);
			$guncelleme->bindParam(16,$refsayfabas,PDO::PARAM_STR);
			$guncelleme->bindParam(17,$filosayfabas,PDO::PARAM_STR);
			$guncelleme->bindParam(18,$yorumsayfabas,PDO::PARAM_STR);
			$guncelleme->bindParam(19,$iletisimsayfabas,PDO::PARAM_STR);
			$guncelleme->execute();

			echo '<div class="alert alert-success mt-5" role="alert">
			<strong>Site ayarları </strong> başarıyla güncellendi.
			</div>'; 
			// 2 saniye sonra beni bu sayfaya gönder demek
			header("refresh:1,url=control.php?sayfa=siteayar");
		else :
			?>

			<form action="control.php?sayfa=siteayar" method="POST">

				<div class="row ">
					<div class="col-lg-7 mx-auto mt-2 " >
						<h3 class="text-info">SİTE AYARLARI</h3>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Title</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="title" class="form-control" value="<?php echo  $sonuc["title"]; ?>" />
							</div>
						</div>
					</div>
					<!-- ********************-->

					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Meta Title</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="metatitle" class="form-control" value="<?php echo  $sonuc["metatitle"]; ?>" />
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Sayfa Açıklama</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="metadesc" class="form-control" value="<?php echo  $sonuc["metadesc"]; ?>" />
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Anahtar Kelimeler</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="metakey" class="form-control" value="<?php echo  $sonuc["metakey"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Yapımcı</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="metaaut" class="form-control" value="<?php echo  $sonuc["metaauthor"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Firma</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="metaown" class="form-control" value="<?php echo  $sonuc["metaowner"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Copyright</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="metacopy" class="form-control" value="<?php echo  $sonuc["metacopy"]; ?>" />
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Logo Yazısı</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="logoyazi" class="form-control" value="<?php echo  $sonuc["logoyazisi"]; ?>" />
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Twitter</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="twitter" class="form-control" value="<?php echo  $sonuc["twitter"]; ?>" />
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Facebook</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="facebook" class="form-control" value="<?php echo  $sonuc["facebook"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">İnstagram</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="instagram" class="form-control" value="<?php echo  $sonuc["instagram"]; ?>" />
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Telefon Numarası</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="telno" class="form-control" value="<?php echo  $sonuc["telefonno"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Adres</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="adres" class="form-control" value="<?php echo  $sonuc["adres"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Mail Adresi</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="mailadres" class="form-control" value="<?php echo  $sonuc["mailadres"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Slogan</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="slogan" class="form-control" value="<?php echo  $sonuc["slogan"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Referans Sayfa Başlık</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="refsayfabas" class="form-control" value="<?php echo  $sonuc["referansbaslik"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Filo Sayfa Başlık</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="filosayfabas" class="form-control" value="<?php echo  $sonuc["filobaslik"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row ">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">Yorum Sayfa Başlık</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="yorumsayfabas" class="form-control" value="<?php echo  $sonuc["yorumbaslik"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->
					<div class="col-lg-7 mx-auto mt-2 border" >
						<div class="row">

							<div class="col-lg-3 border-right pt-3 text-left">
								<span style="font-size: 18px">İletişim Sayfa Başlık</span>
							</div>


							<div class="col-lg-9 p-1">
								<input type="text" name="iletisimsayfabas" class="form-control" value="<?php echo  $sonuc["iletisimbaslik"]; ?>"/>
							</div>
						</div>
					</div>
					<!-- ********************-->

					<div class="col-lg-7 mx-auto mt-2 border-bottom" >
						<input type="submit" name="buton" class="btn btn-rounded btn-info m-1" value="GÜNCELLE" />
					</div>

				</div>
			</div>
		</form>
		<?php  

	endif;	

}

function sifrele($veri)
{	
	//verilenen verinin şifrelenmesini sağlıyor
	// gzdeflate(gzcompress(serialize())) bunlarında her biri şifreleme fonksiyonu
	return base64_encode(gzdeflate(gzcompress(serialize($veri))));
}

function coz($veri)
{
	//şifrelenmiş veriyi çözme
	return unserialize(gzuncompress(gzinflate(base64_decode($veri))));
}


function kuladial($vt)
{
	//aşağıda cookideki id yi al ve çöz fonksiyonuna gönder ki şifreli hali çözülsün
	$cookid=$_COOKIE["kulbilgi"];
	$cozduk=self::coz($cookid);
	$sorgusonuc=self::sorgum($vt,"select * from yonetim where yonetim_id=$cozduk",1);
	return $sorgusonuc["kulad"];
}

function giriskontrol($kulad,$sifre,$vt)
{	
	//gelen şifreyi güvenli olsun diye şifreledik yani şifre 1234 ise md5 ve sha1 qwewqqweqw5sad falan yapıyor	
	$sifrelihal=md5(sha1(md5($sifre)));


	$sor=$vt->prepare("select * from yonetim where kulad='$kulad' and sifre='$sifrelihal'");
	$sor->execute();
	

	// GİRİLEN BİLGİLERDE VERİTABANINDA ÖYLE BİR EŞLEŞME YOK İSE
	if($sor->rowCount() == 0):

		echo '
		<div class="container-fluid bg-white">
		<div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto pt-3 text-danger font-14 font-weight-bold"><img src="25.gif" class="mr-3">BİLGİLER HATALI! YÖNLENDİRİLİYOR</div>
		</div>';
		header("refresh:2,url=index.php");

	else :

		$gelendeger=$sor->fetch();
		// girilen kişinin aktifliğini bir yap 
		$sor=$vt->prepare("update yonetim set aktif=1 where kulad='$kulad' and sifre='$sifrelihal' ");
		$sor->execute();

		echo '
		<div class="container-fluid bg-white">
		<div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto pt-3 text-success font-14 font-weight-bold"><img src="25.gif" class="mr-3">GİRİŞ YAPILIYOR. LÜTFEN BEKLEYİNİZ</div>
		</div>';
		header("refresh:2,url=control.php");

		//cookie
		//this gibi aynı yerdeki değişkeni belli eder
		//giren kullanıcının idsini şifrele
		$id=self::sifrele($gelendeger["yonetim_id"]);
		//kulbilgi deişkeni ile cookie sayesinde giriş yapan kişinin id si ile bilgilerini tuttu 60*60*24 1 gün tut süre zarfında 
		setcookie("kulbilgi" ,$id,time() + 60*60*24);

	endif;
}

function cikis($vt)
{
	$cookid=$_COOKIE["kulbilgi"];
	$cozduk=self::coz($cookid);
	self::sorgum($vt,"update yonetim set aktif=0 where yonetim_id=$cozduk ",0);
	//cookiyi öldürdük ki bilgi gitsin
	setcookie("kulbilgi" ,$cookid,time() - 5);

	echo '
	<div class="container-fluid bg-white">
	<div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto pt-3 text-success font-14 font-weight-bold"><img src="25.gif" class="mr-3">ÇIKIŞ YAPILIYOR. LÜTFEN BEKLEYİNİZ</div>
	</div>';
	header("refresh:2,url=index.php");
}

function kontrolet($sayfa)
{	
	
	if(isset($_COOKIE["kulbilgi"])) :

		if ($sayfa=="ind") : 
			header("url=control.php"); 
		endif;

	else:
		if ($sayfa=="cot") : 
			header("url=index.php");
		endif;
	endif;
}

// --------------------------------------------- İNTRO -------------------------------------- 


function introayar($vt) // mevcut introlar getiriliyor
{

	echo '<div class="row text-center"><div class="col-lg-12 border-bottom"><h3 class="float-left m-3 text-info ">İNTRO RESİMLERİ</h3><a href="control.php?sayfa=introresimekle" class="btn btn-success btn-sm m-2 float-right">+</a></div>';

	// 2 deme sebebimiz fotoğraflar olacağı için while döngüsü alacağız
	$introbilgiler=self::sorgum($vt,"select * from intro" ,2);

	while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):

		echo '<div class="col-lg-4">

		<div class="row border border-light p-1 m-1">
		<div class="col-lg-12">
		<img src="../'.$sonbilgi["resimyol"].'">
		</div>

		<div class="col-lg-6 text-right">
		<a href="control.php?sayfa=introresimguncelle&id='.$sonbilgi["intro_id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px;"></a>
		</div>

		<div class="col-lg-6 text-left">
		<a href="control.php?sayfa=introresimsil&id='.$sonbilgi["intro_id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px;"></a>
		</div>

		</div>
		</div>';

	endwhile;

	echo '</div>';
}  

function introresimekle($vt)
{

	echo '<div class="row text-center">
	<div class="col-lg-12">
	';

	if($_POST):
		//ilk dosyanın boş olup olmadığı
		//dosya boyutu
		//dosya uzantısı
		//mutlu son

		if($_FILES["dosya"] ["name"] =="") :

			echo '<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş olamaz </div>';
			header("refresh:2,url=control.php?sayfa=introresimekle");

			else : // boş değilse
			// 5 mb denk gelmekte
			if($_FILES["dosya"] ["size"] > (1024*1024*5)) :

				echo '<div class="alert alert-danger mt-5">Dosya boyutu çok fazla. </div>';
				header("refresh:2,url=control.php?sayfa=introresimekle");

				else : // boyutta bir problem yok ise
				$izinverilen=array("image/jpeg" ,"image/png");
				//gelen uzantı array ın içinde ki eşleşen yok ise
				if(!in_array($_FILES["dosya"] ["type"] , $izinverilen)) :

					echo '<div class="alert alert-danger mt-5">İzin verilen uzantı değil </div>';
					header("refresh:2,url=control.php?sayfa=introresimekle");

					else : // artık her şey tamam 

					$dosyaminyolu='../img/carousel/'.$_FILES["dosya"] ["name"] ;

					move_uploaded_file($_FILES["dosya"] ["tmp_name"], $dosyaminyolu);
					echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA YÜKLENDİ</div>';
					header("refresh:2,url=control.php?sayfa=introayar");

					//DOSYAYI FOTOĞRAFLAR KLASÖRÜNE KAYDETTİK 
					//ŞİMDİ VERİTABANINA KAYIT EDİYORUZ
					$dosyaminyolu2=str_replace('../','', $dosyaminyolu);
					$kayitekle=self::sorgum($vt ,"insert into intro (resimyol) VALUES ('$dosyaminyolu2')" ,0);

				endif;
			endif;

		endif;



	else:
		?>

		<div class = "col-lg-4 mx-auto mt-2">
			<div class="card card-bordered">
				<div class="card-body">
					<h5 class="title border-bottom">İntro Resim Yükleme Formu</h5>
					<form action="" method="POST" enctype="multipart/form-data">
						<p class="card-text"> <input type="file"  name="dosya" /></p>
						<input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
					</form>
					<p class="card-text text-left text-danger border-top">*İzin verilen formatlar : jpg-png <br/>*İzin verilen max. boyut :5 MB</p>
				</div>
			</div>
		</div>
		<?php

	endif;

	echo '</div>
	</div></div> ';

}

function introresimsil($vt)
{
	// bu get in içindeki id değişkeni ? sonra kendimiz id dediğimiz için
	$introid=$_GET["id"];

	$verial=self::sorgum($vt,"select *from intro where intro_id=$introid" , 1);

	echo '<div class="row text-center">
	<div class="col-lg-12">';

	//veritabanı veri silme işlemi 

	self::sorgum($vt,"delete from intro where intro_id=$introid" , 0);

	//dosyayı silme işlemi 

	unlink('../'.$verial["resimyol"]);
	echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA SİLİNDİ</div>';

	echo '</div></div>';

	header("refresh:2,url=control.php?sayfa=introayar");

}

function introresimguncelle($vt)
{

	$gelenintroid=$_GET["id"];
	// bu get in içindeki id değişkeni ? sonra kendimiz id dediğimiz için
	echo '<div class="row text-center">
	<div class="col-lg-12">
	';

	if($_POST):
		//ilk dosyanın boş olup olmadığı
		//dosya boyutu
		//dosya uzantısı
		//mutlu son
		$formdangelenid=$_POST["introid"];

		if($_FILES["dosya"] ["name"] =="") :

			echo '<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş olamaz </div>';
			header("refresh:2,url=control.php?sayfa=introayar");

			else : // boş değilse
			// 5 mb denk gelmekte
			if($_FILES["dosya"] ["size"] > (1024*1024*5)) :

				echo '<div class="alert alert-danger mt-5">Dosya boyutu çok fazla. </div>';
				header("refresh:2,url=control.php?sayfa=introayar");

				else : // boyutta bir problem yok ise
				$izinverilen=array("image/jpeg" ,"image/png");
				//gelen uzantı array ın içinde ki eşleşen yok ise
				if(!in_array($_FILES["dosya"] ["type"] , $izinverilen)) :

					echo '<div class="alert alert-danger mt-5">İzin verilen uzantı değil </div>';
					header("refresh:2,url=control.php?sayfa=introayar");

					else : // artık her şey tamam 

					//mevcut dosyayı silmemiz gerekmekte ve yeni dosya yolunu kayıt etmeliyiz
					// güncelle butonuna bastıktan sonra gelen id yi sorgu da bulduk onu dbgelenyol a attık ve dosyadan sildik
					$resimyolunabak=self::sorgum($vt ,"select * from intro where intro_id=$gelenintroid" ,1);
					$dbgelenyol='../'.$resimyolunabak["resimyol"];
					unlink($dbgelenyol);


					$dosyaminyolu='../img/carousel/'.$_FILES["dosya"] ["name"] ;
					move_uploaded_file($_FILES["dosya"] ["tmp_name"], $dosyaminyolu);

					$dosyaminyolu2=str_replace('../','', $dosyaminyolu);
					self::sorgum($vt ,"update intro set resimyol='$dosyaminyolu2' where intro_id=$gelenintroid" ,0);

					echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA GÜNCELLENDİ</div>';
					header("refresh:2,url=control.php?sayfa=introayar");

					//DOSYAYI FOTOĞRAFLAR KLASÖRÜNE KAYDETTİK 
					//ŞİMDİ VERİTABANINA KAYIT EDİYORUZ
					

				endif;
			endif;

		endif;



	else:
		?>

		<div class = "col-lg-4 mx-auto mt-2">
			<div class="card card-bordered">
				<div class="card-body">
					<h5 class="title border-bottom">İntro Resim Güncelleme Formu</h5>
					<form action="" method="POST" enctype="multipart/form-data">
						<p class="card-text"> <input type="file"  name="dosya" /></p>
						<p class="card-text"> <input type="hidden"  name="introid" value="<?php echo $gelenintroid; ?>" /></p>
						<input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />

					</form>
					<p class="card-text text-left text-danger border-top">*İzin verilen formatlar : jpg-png <br/>*İzin verilen max. boyut :5 MB</p>
				</div>
			</div>
		</div>
		<?php

	endif;

	echo '</div>
	</div></div> ';

}

	// --------------------------------------------- ARAÇ FİLOSU -------------------------------------- 

function filoayar($vt) // mevcut filo araçlar getiriliyor
{

	echo '<div class="row text-center"><div class="col-lg-12 border-bottom"><h3 class="float-left m-3 text-info ">ARAÇ FİLO RESİMLERİ</h3><a href="control.php?sayfa=filoresimekle" class="btn btn-success btn-sm m-2 float-right">+</a></div>';

	// 2 deme sebebimiz fotoğraflar olacağı için while döngüsü alacağız
	$filobilgiler=self::sorgum($vt,"select * from filo" ,2);

	while($sonbilgi=$filobilgiler->fetch(PDO::FETCH_ASSOC)):

		// "../'.$sonbilgi["resimyol"].' yapma sebimiz fotoğraflarımız bu klasörün bi üst klasörde olması
		echo '<div class="col-lg-4">

		<div class="row border border-light p-1 m-1">
		<div class="col-lg-12">
		<img src="../'.$sonbilgi["resimyol"].'">
		</div>

		<div class="col-lg-6 text-right">
		<a href="control.php?sayfa=filoresimguncelle&id='.$sonbilgi["filo_id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px;"></a>
		</div>

		<div class="col-lg-6 text-left">
		<a href="control.php?sayfa=filoresimsil&id='.$sonbilgi["filo_id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px;"></a>
		</div>

		</div>
		</div>';

	endwhile;

	echo '</div>';
}  

function filoresimekle($vt)
{

	echo '<div class="row text-center">
	<div class="col-lg-12">
	';

	if($_POST):
		//ilk dosyanın boş olup olmadığı
		//dosya boyutu
		//dosya uzantısı
		//mutlu son

		if($_FILES["dosya"] ["name"] =="") :

			echo '<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş olamaz </div>';
			header("refresh:2,url=control.php?sayfa=filoresimekle");

			else : // boş değilse
			// 5 mb denk gelmekte
			if($_FILES["dosya"] ["size"] > (1024*1024*5)) :

				echo '<div class="alert alert-danger mt-5">Dosya boyutu çok fazla. </div>';
				header("refresh:2,url=control.php?sayfa=filoresimekle");

				else : // boyutta bir problem yok ise
				$izinverilen=array("image/jpeg" ,"image/png");
				//gelen uzantı array ın içinde ki eşleşen yok ise
				if(!in_array($_FILES["dosya"] ["type"] , $izinverilen)) :

					echo '<div class="alert alert-danger mt-5">İzin verilen uzantı değil </div>';
					header("refresh:2,url=control.php?sayfa=filoresimekle");

					else : // artık her şey tamam 

					$dosyaminyolu='../img/filo/'.$_FILES["dosya"] ["name"] ;

					move_uploaded_file($_FILES["dosya"] ["tmp_name"], $dosyaminyolu);
					echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA YÜKLENDİ</div>';
					header("refresh:2,url=control.php?sayfa=filoayar");

					//DOSYAYI FOTOĞRAFLAR KLASÖRÜNE KAYDETTİK 
					//ŞİMDİ VERİTABANINA KAYIT EDİYORUZ
					$dosyaminyolu2=str_replace('../','', $dosyaminyolu);
					$kayitekle=self::sorgum($vt ,"insert into filo (resimyol) VALUES ('$dosyaminyolu2')" ,0);

				endif;
			endif;

		endif;



	else:
		?>

		<div class = "col-lg-4 mx-auto mt-2">
			<div class="card card-bordered">
				<div class="card-body">
					<h5 class="title border-bottom">Araç Filo Resim Yükleme Formu</h5>
					<form action="" method="POST" enctype="multipart/form-data">
						<p class="card-text"> <input type="file"  name="dosya" /></p>
						<input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
					</form>
					<p class="card-text text-left text-danger border-top">*İzin verilen formatlar : jpg-png <br/>*İzin verilen max. boyut :5 MB</p>
				</div>
			</div>
		</div>
		<?php

	endif;

	echo '</div>
	</div></div> ';

}

function filoresimsil($vt)
{
	// bu get in içindeki id değişkeni ? sonra kendimiz id dediğimiz için
	$filoid=$_GET["id"];

	$verial=self::sorgum($vt,"select * from filo where filo_id=$filoid" , 1);

	echo '<div class="row text-center">
	<div class="col-lg-12">';

	//veritabanı veri silme işlemi 

	self::sorgum($vt,"delete from filo where filo_id=$filoid" , 0);

	//dosyayı silme işlemi 

	unlink('../'.$verial["resimyol"]);
	echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA SİLİNDİ</div>';

	echo '</div></div>';

	header("refresh:2,url=control.php?sayfa=filoayar");

}

function filoresimguncelle($vt)
{

	$gelenfiloid=$_GET["id"];
	// bu get in içindeki id değişkeni ? sonra kendimiz id dediğimiz için
	echo '<div class="row text-center">
	<div class="col-lg-12">
	';

	if($_POST):
		//ilk dosyanın boş olup olmadığı
		//dosya boyutu
		//dosya uzantısı
		//mutlu son
		$formdangelenid=$_POST["filoid"];

		if($_FILES["dosya"] ["name"] =="") :

			echo '<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş olamaz </div>';
			header("refresh:2,url=control.php?sayfa=filoayar");

			else : // boş değilse
			// 5 mb denk gelmekte
			if($_FILES["dosya"] ["size"] > (1024*1024*5)) :

				echo '<div class="alert alert-danger mt-5">Dosya boyutu çok fazla. </div>';
				header("refresh:2,url=control.php?sayfa=filoayar");

				else : // boyutta bir problem yok ise
				$izinverilen=array("image/jpeg" ,"image/png");
				//gelen uzantı array ın içinde ki eşleşen yok ise
				if(!in_array($_FILES["dosya"] ["type"] , $izinverilen)) :

					echo '<div class="alert alert-danger mt-5">İzin verilen uzantı değil </div>';
					header("refresh:2,url=control.php?sayfa=filoayar");

					else : // artık her şey tamam 

					//mevcut dosyayı silmemiz gerekmekte ve yeni dosya yolunu kayıt etmeliyiz
					// güncelle butonuna bastıktan sonra gelen id yi sorgu da bulduk onu dbgelenyol a attık ve dosyadan sildik
					$resimyolunabak=self::sorgum($vt ,"select * from filo where filo_id=$gelenfiloid" ,1);
					$dbgelenyol='../'.$resimyolunabak["resimyol"];
					unlink($dbgelenyol);


					$dosyaminyolu='../img/filo/'.$_FILES["dosya"] ["name"] ;
					move_uploaded_file($_FILES["dosya"] ["tmp_name"], $dosyaminyolu);

					$dosyaminyolu2=str_replace('../','', $dosyaminyolu);
					self::sorgum($vt ,"update filo set resimyol='$dosyaminyolu2' where filo_id=$gelenfiloid" ,0);

					echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA GÜNCELLENDİ</div>';
					header("refresh:2,url=control.php?sayfa=filoayar");

					//DOSYAYI FOTOĞRAFLAR KLASÖRÜNE KAYDETTİK 
					//ŞİMDİ VERİTABANINA KAYIT EDİYORUZ
					

				endif;
			endif;

		endif;



	else:
		?>

		<div class = "col-lg-4 mx-auto mt-2">
			<div class="card card-bordered">
				<div class="card-body">
					<h5 class="title border-bottom">Filo Araç Resim Güncelleme Formu</h5>
					<form action="" method="POST" enctype="multipart/form-data">
						<p class="card-text"> <input type="file"  name="dosya" /></p>
						<p class="card-text"> <input type="hidden"  name="filoid" value="<?php echo $gelenfiloid; ?>" /></p>
						<input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />

					</form>
					<p class="card-text text-left text-danger border-top">*İzin verilen formatlar : jpg-png <br/>*İzin verilen max. boyut :5 MB</p>
				</div>
			</div>
		</div>
		<?php

	endif;

	echo '</div>
	</div></div> ';

}

// --------------------------------------------- HAKKIMIZDA --------------------------------------

function hakkimizdaayar($vt) 
{

	echo '<div class="row text-center">
	<div class="col-lg-12 border-bottom"><h3 class="m-3 text-info">HAKKIMIZDA AYARLARI</h3></div>';

	if(!$_POST): // forma basılmadıysa


	// 2 deme sebebimiz fotoğraflar olacağı için while döngüsü alacağız
	$hakkimizdabilgiler=$this->sorgum($vt,"select * from hakkimizda" ,1);

		// "../'.$sonbilgi["resimyol"].' yapma sebimiz fotoğraflarımız bu klasörün bi üst klasörde olması

	//RESİM GÜNCELLEYECEĞİN ZAMAN BU enctype="multipart/form-data" ŞEYİ FORMA KESİNLİKLE YAZIYORSUNN KESİNLİKLEEEE ----------------------------
	echo '<div class="col-lg-6 mx-auto">

	<div class="row card-bordered p-1 m-1">



	<div class="col-lg-3 border-bottom bg-light" style=" padding-top:20%; font-size: 20px;">
	Resim
	</div>

	<div class="col-lg-9 border-bottom ">
	<img src="../'.$hakkimizdabilgiler["resimyol"].'"><br><br>
	<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="dosya">
	</div>

	<div class="col-lg-3 border-bottom bg-light pt-3" style="font-size: 20px;">
	Başlık
	</div>

	<div class="col-lg-9 border-bottom ">
	<input type="text" name="baslik" class="form-control m-2" value="'.$hakkimizdabilgiler["baslik"].'">
	</div>

	<div class="col-lg-3 bg-light pt-5" style=" padding-top: 20%; font-size: 20px;">
	İçerik
	</div>

	<div class="col-lg-9">
	<textarea name="icerik" class="form-control" rows="8">'.$hakkimizdabilgiler["icerik"].'</textarea> 
	</div>


	<div class="col-lg-12 border-top">
	<input type="submit" name="guncel" value="GÜNCELLE" class="btn btn-primary m-s">
	</form>
	</div>

	</div>';
else: 

	$resim=@$_FILES["dosya"] ["name"];
	$baslik=$_POST["baslik"];
	$icerik=$_POST["icerik"];


// forma basıldıysa
	if(@$_FILES["dosya"] ["name"] != ""):

		if($_FILES["dosya"] ["size"] < (1024*1024*5)):

			$izinverilen=array("image/jpeg" ,"image/png");

			if(in_array($_FILES["dosya"] ["type"] , $izinverilen)):


				$dosyaminyolu='../img/'.$_FILES["dosya"] ["name"];

				move_uploaded_file($_FILES["dosya"] ["tmp_name"], $dosyaminyolu);
				

					//DOSYAYI FOTOĞRAFLAR KLASÖRÜNE KAYDETTİK 
					//ŞİMDİ VERİTABANINA KAYIT EDİYORUZ
				$veritabaniicin=str_replace('../','', $dosyaminyolu);

			endif;
		endif;
	endif;

	if(@$_FILES["dosya"] ["name"] != ""):
		self::sorgum($vt,"update hakkimizda set baslik='$baslik' , icerik='$icerik' , resimyol='$veritabaniicin'" ,0);

		echo '<div class="col-lg-6 mx-auto">
		<div class="alert alert-success mt-5">GÜNCELLEME BAŞARILI</div>
		</div>';
		header("refresh:2,url=control.php?sayfa=hakkimizdaayar");
	else:
		self::sorgum($vt,"update hakkimizda set baslik='$baslik' , icerik='$icerik'" ,0);
		echo '<div class="col-lg-6 mx-auto">
		<div class="alert alert-success mt-5">GÜNCELLEME BAŞARILI</div>
		</div>';
		header("refresh:2,url=control.php?sayfa=hakkimizdaayar");
	endif;
	echo '</div>';
	
endif; // ana if in endif i
}


// --------------------------------------------- HİZMETLERİMİZ --------------------------------------

function hizmetlerayar($vt) // 
{

	echo '<div class="row text-center"><div class="col-lg-12 border-bottom"><h3 class="float-left m-3 text-info ">HİZMETLERİMİZ</h3><a href="control.php?sayfa=hizmetekle" class="btn btn-success btn-sm m-2 float-right">+</a></div>';

	$hizmetlerbilgi=self::sorgum($vt,"select * from hizmetler" ,2);

	while($sonbilgi=$hizmetlerbilgi->fetch(PDO::FETCH_ASSOC)):

		
		echo '<div class="col-lg-6 text-center">

		<div class="row border border-light p-1 m-1 bg-light">
		<div class="col-lg-11 pt-3 ">
		<h5>'.$sonbilgi["baslik"].'</h5>
		</div>

		<div class="col-lg-1 text-right">
		<a href="control.php?sayfa=hizmetguncelle&id='.$sonbilgi["hizmetler_id"].'" class="fa fa-edit text-success" style="font-size:25px;"></a>
		<a href="control.php?sayfa=hizmetsil&id='.$sonbilgi["hizmetler_id"].'" class="fa fa-trash  text-danger" style="font-size:25px;"></a>
		</div>


		<div class="col-lg-11  border-top text-secondary text-left bg-white">
		'.$sonbilgi["icerik"].'
		</div>
		
		</div>
		</div>';

	endwhile;

	echo '</div>';
}  


function hizmetekle($vt) // 
{

	echo '<div class="row text-center"><div class="col-lg-12 border-bottom"><h3 class=" m-3 text-info ">HİZMET EKLE</h3></div>';

	$hizmetlerbilgi=self::sorgum($vt,"select * from hizmetler" ,2);

	if(!$_POST):

		echo '<div class="col-lg-6 mx-auto">

		<div class="row border border-light p-1 m-1 bg-light">


		<div class="col-lg-12 pt-3">
		Başlık
		</div>

		<div class="col-lg-12 p-2 ">
		<form action="" method="POST">
		<input type="text" name="baslik" class="form-control ">
		</div>

		<div class="col-lg-12 p-2 ">
		İçerik
		</div>
		<div class="col-lg-12  p-2 ">
		<textarea name="icerik" rows="5" class="form-control"></textarea>
		</div>

		<div class="col-lg-12  p-2 ">
		<input type="submit" name="buton" value="HİZMET EKLE" class="btn btn-primary">
		</form>
		</div>


		</div>
		</div>';

	else:

		$baslik=htmlspecialchars($_POST['baslik']);
		$icerik=htmlspecialchars($_POST['icerik']);

		if($baslik == "" && $icerik == "" ) :


			echo ' <div class="col-lg-6 mx-auto">
			<div class="alert alert-danger mt-5">Veriler boş olamaz </div> </div>';

			header("refresh:2 , url=control.php?sayfa=hizmetlerayar");

		else:

			self::sorgum($vt,"insert into hizmetler (baslik,icerik) VALUES ('$baslik' ,'$icerik')" ,0);

			echo '<div class="col-lg-6 mx-auto">
			<div class="alert alert-success mt-5">HİZMET EKLEME BAŞARILI </div> </div>';

			header("refresh:2 , url=control.php?sayfa=hizmetlerayar");

		endif;

	endif;


	echo '</div>';
}  


function hizmetguncelle($vt) // 
{

	echo '<div class="row text-center"><div class="col-lg-12 border-bottom"><h3 class=" m-3 text-info ">HİZMET GÜNCELLEME</h3></div>';


	$hizmetid=$_GET['id'];

	$hizmetbilgial=self::sorgum($vt,"select * from hizmetler where hizmetler_id=$hizmetid",1);

	if(!$_POST):

		echo '<div class="col-lg-6 mx-auto">

		<div class="row border border-light p-1 m-1 bg-light">


		<div class="col-lg-12 pt-3">
		Başlık
		</div>

		<div class="col-lg-12 p-2 ">
		<form action="" method="POST">
		<input type="text" name="baslik" class="form-control" value="'.$hizmetbilgial['baslik'].'">
		</div>

		<div class="col-lg-12 p-2 ">
		İçerik
		</div>
		<div class="col-lg-12  p-2 ">
		<textarea name="icerik" rows="5" class="form-control">'.$hizmetbilgial['icerik'].'</textarea>
		</div>

		<div class="col-lg-12  p-2 ">
		<input type="hidden" name="kayitidsi" value="'.$hizmetid.'">
		<input type="submit" name="buton" value="HİZMET GÜNCELLE" class="btn btn-primary">
		</form>
		</div>


		</div>
		</div>';

	else:

		$baslik=htmlspecialchars($_POST['baslik']);
		$icerik=htmlspecialchars($_POST['icerik']);
		$kayitidsi=htmlspecialchars($_POST['kayitidsi']);

		if($baslik == "" && $icerik == "" ) :


			echo ' <div class="col-lg-6 mx-auto">
			<div class="alert alert-danger mt-5">Veriler boş olamaz </div> </div>';

			header("refresh:2 , url=control.php?sayfa=hizmetlerayar");

		else:

			self::sorgum($vt,"update hizmetler  set baslik='$baslik' ,icerik='$icerik' where hizmetler_id=$kayitidsi" ,0);

			echo '<div class="col-lg-6 mx-auto">
			<div class="alert alert-success mt-5">GÜNCELLEME BAŞARILI </div> </div>';

			header("refresh:2 , url=control.php?sayfa=hizmetlerayar");

		endif;

	endif;


	echo '</div>';
}  


function hizmetsil($vt)
{
	// bu get in içindeki id değişkeni ? sonra kendimiz id dediğimiz için
	$hizmetid=$_GET["id"];

	echo '<div class="row text-center">
	<div class="col-lg-12">';

	//veritabanı veri silme işlemi 

	self::sorgum($vt,"delete from hizmetler where hizmetler_id=$hizmetid" , 0);


	
	echo '<div class="alert alert-success mt-5">SİLME BAŞARILI</div>';

	echo '</div></div>';

	header("refresh:2,url=control.php?sayfa=hizmetlerayar");

}

// --------------------------------------------- REFERANSLAR --------------------------------------

function referansayar($vt) // mevcut filo araçlar getiriliyor
{

	echo '<div class="row text-center"><div class="col-lg-12 border-bottom"><h3 class="float-left m-3 text-info ">REFERANSLAR</h3><a href="control.php?sayfa=referansekle" class="btn btn-success btn-sm m-2 float-right">+</a></div>';

	// 2 deme sebebimiz fotoğraflar olacağı için while döngüsü alacağız
	$referansbilgiler=self::sorgum($vt,"select * from referanslar" ,2);

	while($sonbilgi=$referansbilgiler->fetch(PDO::FETCH_ASSOC)):

		// "../'.$sonbilgi["resimyol"].' yapma sebimiz fotoğraflarımız bu klasörün bi üst klasörde olması
		echo '<div class="col-lg-2 bg-light">

		<div class="row card-bordered p-1 m-1">
		<div class="col-lg-12">
		<img src="../'.$sonbilgi["resimyol"].'">
		<a href="control.php?sayfa=referanssil&id='.$sonbilgi["referans_id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px;"></a>
		</div>


		</div>
		</div>';

	endwhile;

	echo '</div>';
}  

function referansekle($vt)
{

	echo '<div class="row text-center">
	<div class="col-lg-12">
	';

	if($_POST):
		//ilk dosyanın boş olup olmadığı
		//dosya boyutu
		//dosya uzantısı
		//mutlu son

		if($_FILES["dosya"] ["name"] =="") :

			echo '<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş olamaz </div>';
			header("refresh:2,url=control.php?sayfa=referansekle");

			else : // boş değilse
			// 5 mb denk gelmekte
			if($_FILES["dosya"] ["size"] > (1024*1024*5)) :

				echo '<div class="alert alert-danger mt-5">Dosya boyutu çok fazla. </div>';
				header("refresh:2,url=control.php?sayfa=referansekle");

				else : // boyutta bir problem yok ise
				$izinverilen=array("image/jpeg" ,"image/png");
				//gelen uzantı array ın içinde ki eşleşen yok ise
				if(!in_array($_FILES["dosya"] ["type"] , $izinverilen)) :

					echo '<div class="alert alert-danger mt-5">İzin verilen uzantı değil </div>';
					header("refresh:2,url=control.php?sayfa=referansekle");

					else : // artık her şey tamam 

					$dosyaminyolu='../img/referans/'.$_FILES["dosya"] ["name"] ;

					move_uploaded_file($_FILES["dosya"] ["tmp_name"], $dosyaminyolu);
					echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA YÜKLENDİ</div>';
					header("refresh:2,url=control.php?sayfa=referansayar");

					//DOSYAYI FOTOĞRAFLAR KLASÖRÜNE KAYDETTİK 
					//ŞİMDİ VERİTABANINA KAYIT EDİYORUZ
					$dosyaminyolu2=str_replace('../','', $dosyaminyolu);
					$kayitekle=self::sorgum($vt ,"insert into referanslar (resimyol) VALUES ('$dosyaminyolu2')" ,0);

				endif;
			endif;

		endif;



	else:
		?>

		<div class = "col-lg-4 mx-auto mt-2">
			<div class="card card-bordered">
				<div class="card-body">
					<h5 class="title border-bottom">Rereferans Ekleme Formu</h5>
					<form action="" method="POST" enctype="multipart/form-data">
						<p class="card-text"> <input type="file"  name="dosya" /></p>
						<input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
					</form>
					<p class="card-text text-left text-danger border-top">*İzin verilen formatlar : jpg-png <br/>*İzin verilen max. boyut :5 MB</p>
				</div>
			</div>
		</div>
		<?php

	endif;

	echo '</div>
	</div></div> ';

}

function referanssil($vt)
{
	// bu get in içindeki id değişkeni ? sonra kendimiz id dediğimiz için
	$referansid=$_GET["id"];

	$verial=self::sorgum($vt,"select * from referanslar where referans_id=$referansid" , 1);

	echo '<div class="row text-center">
	<div class="col-lg-12">';

	//veritabanı veri silme işlemi 

	self::sorgum($vt,"delete from referanslar where referans_id=$referansid" , 0);

	//dosyayı silme işlemi 

	unlink('../'.$verial["resimyol"]);
	echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA SİLİNDİ</div>';

	echo '</div></div>';

	header("refresh:2,url=control.php?sayfa=referansayar");

}


// ---------------------------------------------MÜŞTERİ YORUMLARI --------------------------------------

function yorumayar($vt) // 
{

	echo '<div class="row text-center"><div class="col-lg-12 border-bottom"><h3 class="float-left m-3 text-info ">MÜŞTERİ YORUMLARI</h3><a href="control.php?sayfa=yorumekle" class="btn btn-success btn-sm m-2 float-right">+</a></div>';

	$yorumlarbilgi=self::sorgum($vt,"select * from yorumlar" ,2);

	while($sonbilgi=$yorumlarbilgi->fetch(PDO::FETCH_ASSOC)):

		
		echo '<div class="col-lg-3 text-center">

		<div class="row border border-light p-1 m-1 bg-light style="border-raduis:10px" ">
		<div class="col-lg-9 pt-1  text-left">
		<h4>Müşteri İsmi : '.$sonbilgi["isim"].'</h4>
		</div>

		<div class="col-lg-3 text-right p-2">
		<a href="control.php?sayfa=yorumguncelle&id='.$sonbilgi["yorumlar_id"].'" class="fa fa-edit text-success" style="font-size:25px;"></a>
		<a href="control.php?sayfa=yorumsil&id='.$sonbilgi["yorumlar_id"].'" class="fa fa-trash  text-danger" style="font-size:25px;"></a>
		</div>


		<div class="col-lg-11  border-top text-secondary text-left bg-white">
		'.$sonbilgi["mesaj"].'
		</div>
		
		</div>
		</div>';

	endwhile;

	echo '</div>';
}  


function yorumekle($vt) // 
{

	echo '<div class="row text-center"><div class="col-lg-12 border-bottom"><h3 class=" m-3 text-info ">YORUM EKLE</h3></div>';

	$yorumlarbilgi=self::sorgum($vt,"select * from yorumlar" ,2);

	if(!$_POST):

		echo '<div class="col-lg-6 mx-auto">

		<div class="row border border-light p-1 m-1 bg-light">


		<div class="col-lg-12 pt-2 "  style="font-size:25px;">
		Müşteri İsmi
		</div>

		<div class="col-lg-12 p-2 ">
		<form action="" method="POST">
		<input type="text" name="isim" class="form-control ">
		</div>

		<div class="col-lg-12 p-2 "  style="font-size:25px;">
		Mesaj
		</div>
		<div class="col-lg-12  p-2 ">
		<textarea name="mesaj" rows="5" class="form-control"></textarea>
		</div>

		<div class="col-lg-12  p-2 ">
		<input type="submit" name="buton" value="YORUM EKLE" class="btn btn-primary">
		</form>
		</div>


		</div>
		</div>';

	else:

		$isim=htmlspecialchars($_POST['isim']);
		$mesaj=htmlspecialchars($_POST['mesaj']);

		if($isim == "" && $mesaj == "" ) :


			echo ' <div class="col-lg-6 mx-auto">
			<div class="alert alert-danger mt-5">Veriler boş olamaz </div> </div>';

			header("refresh:2 , url=control.php?sayfa=yorumayar");

		else:

			self::sorgum($vt,"insert into yorumlar (isim,mesaj) VALUES ('$isim' ,'$mesaj')" ,0);

			echo '<div class="col-lg-6 mx-auto">
			<div class="alert alert-success mt-5">YORUM EKLEME BAŞARILI </div> </div>';

			header("refresh:2 , url=control.php?sayfa=yorumayar");

		endif;

	endif;


	echo '</div>';
}  


function yorumguncelle($vt) // 
{

	echo '<div class="row text-center"><div class="col-lg-12 border-bottom"><h3 class=" m-3 text-info ">YORUM GÜNCELLEME</h3></div>';


	$yorumid=$_GET['id'];

	$yorumbilgial=self::sorgum($vt,"select * from yorumlar where yorumlar_id=$yorumid",1);

	if(!$_POST):

		echo '<div class="col-lg-6 mx-auto">

		<div class="row border border-light p-1 m-1 bg-light">


		<div class="col-lg-12 pt-2">
		Müşteri İsmi
		</div>

		<div class="col-lg-12 p-2 ">
		<form action="" method="POST">
		<input type="text" name="isim" class="form-control" value="'.$yorumbilgial['isim'].'">
		</div>

		<div class="col-lg-12 p-2 ">
		Mesaj
		</div>
		<div class="col-lg-12  p-2 ">
		<textarea name="mesaj" rows="5" class="form-control">'.$yorumbilgial['mesaj'].'</textarea>
		</div>

		<div class="col-lg-12  p-2 ">
		<input type="hidden" name="kayitidsi" value="'.$yorumid.'">
		<input type="submit" name="buton" value="YORUM GÜNCELLE" class="btn btn-primary">
		</form>
		</div>


		</div>
		</div>';

	else:

		$isim=htmlspecialchars($_POST['isim']);
		$mesaj=htmlspecialchars($_POST['mesaj']);
		$kayitidsi=htmlspecialchars($_POST['kayitidsi']);

		if($isim == "" && $mesaj == "" ) :


			echo ' <div class="col-lg-6 mx-auto">
			<div class="alert alert-danger mt-5">Veriler boş olamaz </div> </div>';

			header("refresh:2 , url=control.php?sayfa=yorumayar");

		else:

			self::sorgum($vt,"update yorumlar  set isim='$isim' ,mesaj='$mesaj' where yorumlar_id=$kayitidsi" ,0);

			echo '<div class="col-lg-6 mx-auto">
			<div class="alert alert-success mt-5">GÜNCELLEME BAŞARILI </div> </div>';

			header("refresh:2 , url=control.php?sayfa=yorumayar");

		endif;

	endif;


	echo '</div>';
}  


function yorumsil($vt)
{
	// bu get in içindeki id değişkeni ? sonra kendimiz id dediğimiz için
	$yorumid=$_GET["id"];

	echo '<div class="row text-center">
	<div class="col-lg-12">';

	//veritabanı veri silme işlemi 

	self::sorgum($vt,"delete from yorumlar where yorumlar_id=$yorumid" , 0);


	
	echo '<div class="alert alert-success mt-5">SİLME BAŞARILI</div>';

	echo '</div></div>';

	header("refresh:2,url=control.php?sayfa=yorumayar");

}

// ---------------------------------------------GELEN MESAJLAR --------------------------------------

private function mailgetir($vt,$veriler)
{

	$sor=$vt->prepare("select * from $veriler[0] where durum=$veriler[1]");
	$sor->execute();

	return $sor;

}

function mesajayar($vt)
{
	echo '<div class="row">
	<div class="col-lg-12 mt-2">
	<div class="card">
	<div class="card-body">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item">
	<a class="nav-link active" id="gelen-tab" data-toggle="tab" href="#gelen" role="tab"
	aria-control="gelen" aria-selected="true"><kbd>'.self::mailgetir($vt,array("gelenmail", 0))->rowCount().'</kbd>Gelen Mesajlar</a>
	</li>
	<li class="nav-item">
	<a class="nav-link"  id="okunmus-tab" data-toggle="tab" href="#okunmus" role="tab"
	aria-control="okunmus" aria-selected="false"><kbd>'.self::mailgetir($vt,array("gelenmail", 1))->rowCount().'</kbd>Okunmus Mesajlar</a>
	</li>
	<li class="nav-item">
	<a class="nav-link"  id="arsiv-tab" data-toggle="tab" href="#arsiv" role="tab"
	aria-control="arsiv" aria-selected="false"><kbd>'.self::mailgetir($vt,array("gelenmail", 2))->rowCount().'</kbd>Arsivlenmiş Mesajlar</a>
	</li>
	</ul>


	<div class="tab-content mt-3" id="benimTab">


	<div class="tab-pane fade show active" id="gelen" role="tabpanel" aria-labelbdy="gelen-tab">';

	$sonuc=self::mailgetir($vt,array("gelenmail", 0));

	if($sonuc->rowCount()!=0):

		//eğer mesaj varsa 

		while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):

			echo '<div class="row">
			<div class="col-lg-12 bg-light mt-2 font-weight-bold">
			<div class="row border-bottom">

			<div class="col-lg-1 p-1">Ad & Ünvan</div>
			<div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>

			<div class="col-lg-1 p-1">Mail Adresi</div>
			<div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>

			<div class="col-lg-1 p-1">Konu</div>
			<div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>

			<div class="col-lg-1 p-1">Tarih</div>
			<div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
			<div class="col-lg-1 p-1">

			<a href="control.php?sayfa=mesajoku&id='.$sonucson["gelenmail_id"].'">
			<i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
			<a href="control.php?sayfa=mesajarsivle&id='.$sonucson["gelenmail_id"].'">
			<i class="fa fa-share border-right pr-2 text-dark"></i></a>
			<a href="control.php?sayfa=mesajsil&id='.$sonucson["gelenmail_id"].'">
			<i class="fa fa-close  pr-2 text-dark"></i></a>
			</div></div></div>
			</div>';

		endwhile;
	else:
		echo '<div class="alert alert-info">Gelen mesaj yok</div>';
	endif;
	echo'</div>

	<div class="tab-pane fade show" id="okunmus" role="tabpanel" arial-labelledby="okunmus-tab">';

	$sonuc=self::mailgetir($vt,array("gelenmail", 1));

	if($sonuc->rowCount()!=0):

		//eğer mesaj varsa 

		while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):

			echo '<div class="row">
			<div class="col-lg-12 bg-light mt-2 font-weight-bold">
			<div class="row border-bottom">

			<div class="col-lg-1 p-1">Ad & Ünvan</div>
			<div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>

			<div class="col-lg-1 p-1">Mail Adresi</div>
			<div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>

			<div class="col-lg-1 p-1">Konu</div>
			<div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>

			<div class="col-lg-1 p-1">Tarih</div>
			<div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
			<div class="col-lg-1 p-1">

			<a href="control.php?sayfa=mesajoku&id='.$sonucson["gelenmail_id"].'">
			<i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
			<a href="control.php?sayfa=mesajarsivle&id='.$sonucson["gelenmail_id"].'">
			<i class="fa fa-share border-right pr-2 text-dark"></i></a>
			<a href="control.php?sayfa=mesajsil&id='.$sonucson["gelenmail_id"].'">
			<i class="fa fa-close  pr-2 text-dark"></i></a>
			</div></div></div>
			</div>';

		endwhile;
	else:
		echo '<div class="alert alert-info">Okunmuş Mesaj Yok</div>';
	endif;
	echo'</div>

	<div class="tab-pane fade show " id="arsiv" role="tabpanel" arial-labelledby="arsiv-tab">';

	$sonuc=self::mailgetir($vt,array("gelenmail", 2));

	if($sonuc->rowCount()!=0):

		//eğer mesaj varsa 

		while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):

			echo '<div class="row">
			<div class="col-lg-12 bg-light mt-2 font-weight-bold">
			<div class="row border-bottom">

			<div class="col-lg-1 p-1">Ad & Ünvan</div>
			<div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>

			<div class="col-lg-1 p-1">Mail Adresi</div>
			<div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>

			<div class="col-lg-1 p-1">Konu</div>
			<div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>

			<div class="col-lg-1 p-1">Tarih</div>
			<div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
			<div class="col-lg-1 p-1">

			<a href="control.php?sayfa=mesajoku&id='.$sonucson["gelenmail_id"].'">
			<i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
			<a href="control.php?sayfa=mesajarsivle&id='.$sonucson["gelenmail_id"].'">
			<i class="fa fa-share border-right pr-2 text-dark"></i></a>
			<a href="control.php?sayfa=mesajsil&id='.$sonucson["gelenmail_id"].'">
			<i class="fa fa-close  pr-2 text-dark"></i></a>
			</div></div></div>
			</div>';

		endwhile;
	else:
		echo '<div class="alert alert-info">Arşivlenmiş Mesaj Yok</div>';
	endif;
	echo' </div>

	</div></div></div></div></div>';
}

function mesajoku($vt,$id)
{

	$mesajbilgi=self::sorgum($vt,"select * from gelenmail where gelenmail_id=$id",1);

	echo '<div class="row m-2">
	<div class="col-lg-12 bg-light mt-2 font-weight-bold">
	<div class="row border-bottom">

	<div class="col-lg-1 p-1">Ad & Ünvan</div>
	<div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["ad"].'</div>

	<div class="col-lg-1 p-1">Mail Adresi</div>
	<div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["mailadres"].'</div>

	<div class="col-lg-1 p-1">Konu</div>
	<div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["konu"].'</div>

	<div class="col-lg-1 p-1">Tarih</div>
	<div class="col-lg-1 p-1 text-primary">'.$mesajbilgi["zaman"].'</div>
	<div class="col-lg-1 p-1">

	<a href="control.php?sayfa=mesajarsivle&id='.$mesajbilgi["gelenmail_id"].'">
	<i class="fa fa-share border-right pr-2 text-dark"></i></a>
	<a href="control.php?sayfa=mesajsil&id='.$mesajbilgi["gelenmail_id"].'">
	<i class="fa fa-close  pr-2 text-dark"></i></a>
	</div>

	</div>

	<div class="row text-left p-2">

	<div class="col-lg-12">'.$mesajbilgi["mesaj"].'</div>

	</div>
	</div>
	</div> 
	</div>';

	//mesajın durumunu güncelliyorum
	$mesajbilgi=self::sorgum($vt,"update gelenmail set durum=1 where gelenmail_id=$id",0);


}

function mesajarsivle($vt,$id)
{
	echo '<div class="row m-2">

	<div class="col-lg-12 mt-2 font-weight-bold">
	<div class="alert alert-info mt-5">MESAJ ARŞİVLENDİ</div>

	</div> 
	</div>';

	//mesajın durumunu güncelliyorum
	$mesajbilgi=self::sorgum($vt,"update gelenmail set durum=2 where gelenmail_id=$id",0);

	header("refresh:2 ,url=control.php?sayfa=mesajayar");

}

function mesajsil($vt,$id)
{
	echo '<div class="row m-2">

	<div class="col-lg-12 mt-2 font-weight-bold">
	<div class="alert alert-info mt-5">MESAJ SİLİNDİ</div>

	</div> 
	</div>';

	self::sorgum($vt,"delete from gelenmail where gelenmail_id=$id" , 0);

	header("refresh:2,url=control.php?sayfa=mesajayar");

}


// ---------------------------------------------MAİL AYARLAR--------------------------------------

function mailayar($baglanti) {
	$sonuc=self::sorgum($baglanti,"SELECT * FROM gelenmailayar",1 );
	if($_POST):
		$host=htmlspecialchars($_POST["host"]);
		$mailadres=htmlspecialchars($_POST["mailadres"]);
		$sifre=htmlspecialchars($_POST["sifre"]);
		$port=htmlspecialchars($_POST["port"]);

		$guncelleme=$baglanti->prepare("update gelenmailayar set 
			host=?,mailadres=?,sifre=?,port=?");
		$guncelleme->bindParam(1,$host,PDO::PARAM_STR);
		$guncelleme->bindParam(2,$mailadres,PDO::PARAM_STR);
		$guncelleme->bindParam(3,$sifre,PDO::PARAM_STR);
		$guncelleme->bindParam(4,$port,PDO::PARAM_INT);
		$guncelleme->execute();
		echo '<div class="alert alert-success mt-5">
		<strong>Mail ayarları</strong> başarıyla güncellendi.
		</div>';
		header("refresh:2,url=control.php?sayfa=mailayar");
	else:
		?>
		<form action="control.php?sayfa=mailayar" method="post">
			<div class="row text-center">
				<div class="col-lg-6 mx-auto">
					<div class="col-lg-12 mx-auto mt-2">
						<h3 class="text-info">Mail Ayarları

						</h3>
					</div>
					<div class="col-lg-12 mx-auto border">
						<div class="row">
							<div class="col-lg-3 border-right pt-3 text-left">
								<span id="siteayarfont">Host</span>
							</div>
							<div class="col-lg-9 p-1">
								<input type="text" name="host" class="form-control" value="<?php echo $sonuc['host']; ?>" />
							</div>
						</div>
					</div>
					<!--ara-->
					<div class="col-lg-12 mx-auto border">
						<div class="row">
							<div class="col-lg-3 border-right pt-3 text-left">
								<span id="siteayarfont">Mail Adresi</span>
							</div>
							<div class="col-lg-9 p-1">
								<input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc['mailadres'];?>" />
							</div>
						</div>
					</div>
					<!--ara-->
					<div class="col-lg-12 mx-auto border">
						<div class="row">
							<div class="col-lg-3 border-right pt-3 text-left">
								<span id="siteayarfont">Host Sifre</span>
							</div>
							<div class="col-lg-9 p-1">
								<input type="text" name="sifre" class="form-control" value="<?php echo $sonuc["sifre"];?>" />
							</div>
						</div>
					</div>
					<!--ara-->
					<div class="col-lg-12 mx-auto border">
						<div class="row">
							<div class="col-lg-3 border-right pt-3 text-left">
								<span id="siteayarfont">Port</span>
							</div>
							<div class="col-lg-9 p-1">
								<input type="text" name="port" class="form-control" value="<?php echo $sonuc["port"];?>" />
							</div>
						</div>
					</div>


					<div class="col-lg-12 mx-auto mt-2">
						<input type="submit" name="buton" class="btn btn-info m-1" value="Guncelle" />
					</div>
				</div>
			</div>
		</form>
		<?php
	endif;

}

}	


?>