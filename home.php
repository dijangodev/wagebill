<!DOCTYPE HTML>
<html>
<head>
<title>OyazFishHogog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="/normalize.min.css">
<link rel='stylesheet' href='/animate.min.css'><link rel="stylesheet" href="./style.css">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>بارگذاری فیش‌ها</title>
</head>
<body>
<?php 
	@print_r($_FILES);
	if (isset($_FILES['doc']) && ($_FILES['doc']['error'] == UPLOAD_ERR_OK)) {
		$xml = file_get_contents($_FILES['doc']['tmp_name']);
		$items[] = (explode("<SalaryReceiptItem>", $xml));
		unset($items[0][0]);
		unset($items[0][0]);
		$receipt[] = array();
		$read[] = array();
		$save=array();
		foreach ($items[0] as $item){
			unset($receipt);
			unset($read);
			$indexes = array('تیتر'=>'Textbox32=','تاریخ فیش'=>'Textbox45=','تاریخ گزارش'=>'Textbox1=','مرکز هزینه'=>'CostCenterFullTitle=','نام و نام خانوادگی'=>'FullName=','کد پرسنلی'=>'Code=','کد ملی'=>'Textbox7=','جمع حقوق و مزایا'=>'Textbox18=','جمع کسور'=>'Textbox20=','مانده مرخصی'=>'Textbox8=','خالص پرداختی'=>'Textbox25=','شماره حساب'=>'Textbox23=');
			foreach ($indexes as $index=>$value){
				$pos = strpos($item, $value);
				$receipt[$index] = substr($item, $pos+1+strlen($value),strpos(substr($item, $pos+1+strlen($value)), '"'));
			}
			$value='<SalaryReceiptDeduction>';
			$pos = strpos($item, $value);
			$raw = substr($item, $pos+1+strlen($value),strpos(substr($item, $pos+1+strlen($value)), '</SalaryReceiptDeduction>'));
			$value='<Details_Collection>';
			$pos = strpos($raw, $value);
			$raw2 = substr($raw, $pos+strlen($value),strpos(substr($raw, $pos+strlen($value)), '</Details_Collection>'));
			$raw3 = explode('<Details>', $raw2);
			unset($raw3[0]);
			foreach ($raw3 as $deduct){
				$key = substr($deduct, strpos($deduct, "FactorTitle=")+1+strlen("FactorTitle="),strpos(substr($deduct, strpos($deduct, "FactorTitle=")+1+strlen("FactorTitle=")), '"'));
				$val = substr($deduct, strpos($deduct, "Value=")+1+strlen("Value="),strpos(substr($deduct, strpos($deduct, "Value=")+1+strlen("Value=")), '"'));
				$receipt['کسور'][$key] = $val;
			}
			$value='<SalaryReceiptPayment>';
			$pos = strpos($item, $value);
			$raw = substr($item, $pos+1+strlen($value),strpos(substr($item, $pos+1+strlen($value)), '</SalaryReceiptPayment>'));
			$value='<Details_Collection>';
			$pos = strpos($raw, $value);
			$raw2 = substr($raw, $pos+strlen($value),strpos(substr($raw, $pos+strlen($value)), '</Details_Collection>'));
			$raw3 = explode('<Details>', $raw2);
			unset($raw3[0]);
			foreach ($raw3 as $deduct){
				$key = substr($deduct, strpos($deduct, "FactorTitle1=")+1+strlen("FactorTitle1="),strpos(substr($deduct, strpos($deduct, "FactorTitle1=")+1+strlen("FactorTitle1=")), '"'));
				$val = substr($deduct, strpos($deduct, "Value=")+1+strlen("Value="),strpos(substr($deduct, strpos($deduct, "Value=")+1+strlen("Value=")), '"'));
				$receipt['حقوق و مزایا'][$key] = $val;
			}
			$value='<SalaryReceiptAttendance>';
			$pos = strpos($item, $value);
			$raw = substr($item, $pos+1+strlen($value),strpos(substr($item, $pos+1+strlen($value)), '</SalaryReceiptAttendance>'));
			$value='<Details_Collection>';
			$pos = strpos($raw, $value);
			$raw2 = substr($raw, $pos+strlen($value),strpos(substr($raw, $pos+strlen($value)), '</Details_Collection>'));
			$raw3 = explode('<Details', $raw2);
			unset($raw3[0]);
			foreach ($raw3 as $deduct){
				$key = substr($deduct, strpos($deduct, "Title=")+1+strlen("Title="),strpos(substr($deduct, strpos($deduct, "Title=")+1+strlen("Title=")), '"'));
				$val = substr($deduct, strpos($deduct, "Value=")+1+strlen("Value="),strpos(substr($deduct, strpos($deduct, "Value=")+1+strlen("Value=")), '"'));
				$receipt['کارکرد'][$key] = $val;
			}
			unset($receipt[0]);
			$read[] = $receipt;
			$save[]=$receipt;
			unset($read[0]);
			<?php 
			@print_r($_FILES);
			if (isset($_FILES['doc']) && ($_FILES['doc']['error'] == UPLOAD_ERR_OK)) {
				$xml = file_get_contents($_FILES['doc']['tmp_name']);
				$items[] = (explode("<SalaryReceiptItem>", $xml));
				unset($items[0][0]);
				unset($items[0][0]);
				$receipt[] = array();
				$read[] = array();
				$save=array();
				foreach ($items[0] as $item){
					unset($receipt);
					unset($read);
					$indexes = array('تیتر'=>'Textbox32=','تاریخ فیش'=>'Textbox45=','تاریخ گزارش'=>'Textbox1=','مرکز هزینه'=>'CostCenterFullTitle=','نام و نام خانوادگی'=>'FullName=','کد پرسنلی'=>'Code=','کد ملی'=>'Textbox7=','جمع حقوق و مزایا'=>'Textbox18=','جمع کسور'=>'Textbox20=','مانده مرخصی'=>'Textbox8=','خالص پرداختی'=>'Textbox25=','شماره حساب'=>'Textbox23=');
					foreach ($indexes as $index=>$value){
						$pos = strpos($item, $value);
						$receipt[$index] = substr($item, $pos+1+strlen($value),strpos(substr($item, $pos+1+strlen($value)), '"'));
					}
					$value='<SalaryReceiptDeduction>';
					$pos = strpos($item, $value);
					$raw = substr($item, $pos+1+strlen($value),strpos(substr($item, $pos+1+strlen($value)), '</SalaryReceiptDeduction>'));
					$value='<Details_Collection>';
					$pos = strpos($raw, $value);
					$raw2 = substr($raw, $pos+strlen($value),strpos(substr($raw, $pos+strlen($value)), '</Details_Collection>'));
					$raw3 = explode('<Details>', $raw2);
					unset($raw3[0]);
					foreach ($raw3 as $deduct){
						$key = substr($deduct, strpos($deduct, "FactorTitle=")+1+strlen("FactorTitle="),strpos(substr($deduct, strpos($deduct, "FactorTitle=")+1+strlen("FactorTitle=")), '"'));
						$val = substr($deduct, strpos($deduct, "Value=")+1+strlen("Value="),strpos(substr($deduct, strpos($deduct, "Value=")+1+strlen("Value=")), '"'));
						$receipt['کسور'][$key] = $val;
					}
					$value='<SalaryReceiptPayment>';
					$pos = strpos($item, $value);
					$raw = substr($item, $pos+1+strlen($value),strpos(substr($item, $pos+1+strlen($value)), '</SalaryReceiptPayment>'));
					$value='<Details_Collection>';
					$pos = strpos($raw, $value);
					$raw2 = substr($raw, $pos+strlen($value),strpos(substr($raw, $pos+strlen($value)), '</Details_Collection>'));
					$raw3 = explode('<Details>', $raw2);
					unset($raw3[0]);
					foreach ($raw3 as $deduct){
						$key = substr($deduct, strpos($deduct, "FactorTitle1=")+1+strlen("FactorTitle1="),strpos(substr($deduct, strpos($deduct, "FactorTitle1=")+1+strlen("FactorTitle1=")), '"'));
						$val = substr($deduct, strpos($deduct, "Value=")+1+strlen("Value="),strpos(substr($deduct, strpos($deduct, "Value=")+1+strlen("Value=")), '"'));
						$receipt['حقوق و مزایا'][$key] = $val;
					}
					$value='<SalaryReceiptAttendance>';
					$pos = strpos($item, $value);
					$raw = substr($item, $pos+1+strlen($value),strpos(substr($item, $pos+1+strlen($value)), '</SalaryReceiptAttendance>'));
					$value='<Details_Collection>';
					$pos = strpos($raw, $value);
					$raw2 = substr($raw, $pos+strlen($value),strpos(substr($raw, $pos+strlen($value)), '</Details_Collection>'));
					$raw3 = explode('<Details', $raw2);
					unset($raw3[0]);
					foreach ($raw3 as $deduct){
						$key = substr($deduct, strpos($deduct, "Title=")+1+strlen("Title="),strpos(substr($deduct, strpos($deduct, "Title=")+1+strlen("Title=")), '"'));
						$val = substr($deduct, strpos($deduct, "Value=")+1+strlen("Value="),strpos(substr($deduct, strpos($deduct, "Value=")+1+strlen("Value=")), '"'));
						$receipt['کارکرد'][$key] = $val;
					}
					unset($receipt[0]);
					$read[] = $receipt;
					$save[]=$receipt;
					unset($read[0]);
					
		}
		$write = $save;
		include('db.php');
		if(!isset($save[0])){
		    
		    var_dump($save);
		    die();
			echo('<script>alert("بارگذاری با خطا مواجه شد! '.print_r($save).' ");</script>');
 			header("Location: upload.php?err");
			exit();
		}
		foreach ($save as $main) {
			$imain = array_values($main);
			$qmain="null, '";
			
			for ($i = 0; $i <= 11; $i++) {
				$qmain = $qmain.$imain[$i]."','";
			}
			$qmain=$qmain.base64_encode(serialize($imain[12]))."', '".base64_encode(serialize($imain[13]))."', '".base64_encode(serialize($imain[14]))."'";
			$query='INSERT INTO reportsnew VALUES('.$qmain.');';
			if(!$db->query($query)){
				exit('<script>alert("بارگذاری با خطا مواجه شد!");</script>');
			}
		}
		header("Location: upload.php?scc");
		
	}else{
	if(isset($_GET['err'])){echo('<script>alert("بارگذاری با خطا مواجه شد!");</script>');}
	if(isset($_GET['scc'])){echo('<script>alert("بارگذاری با موفقیت انجام شد!");</script>');}
?>
	
	

	<div class='box'>
  <div class='box-form'>
    <div class='box-login-tab'></div>
    <div class='box-login-title'>
      <div class='i i-login'></div><h2>OYAZ</h2>
    </div>
    <div class='box-login'>
	
      <div class='fieldset-body' id='login_form'>
	  
		<form action="upload.php" method="post" enctype="multipart/form-data" style="/* display: block; */padding: 20px;margin: 20px;width: 300px;" >
		<input type="file" name="doc" style="/* width: inherit; */width: 225px;background: #c63c53;color: white;"> 
		<input type="submit" value='بارگذاری در دیتابیس'>	

<div class='box'>
<div class='box-form'>
<div class='box-login-tab'></div>
<div class='box-login-title'>
  <div class='i i-login'></div><h2>OYAZ</h2>
</div>
<div class='box-login'>

  <div class='fieldset-body' id='login_form'>
  
	<form action="upload.php" method="post" enctype="multipart/form-data" style="/* display: block; */padding: 20px;margin: 20px;width: 300px;" >
	<input type="file" name="doc" style="/* width: inherit; */width: 225px;background: #c63c53;color: white;"> 
	<input type="submit" value='بارگذاری در دیتابیس'>
	</form>
          

        	
      </div>
	  	</form>
    </div>
  </div>
  
</div>

// create a trigger for setting time and date fields
// i want to show stimulusoft report in the html file

<?php
$sql = "CREATE TRIGGER `time_date_trigger` BEFORE INSERT ON `table_name` 
FOR EACH ROW SET NEW.time = NOW(), NEW.date = CURDATE();"; 
if (mysqli_query($conn, $sql)) { 
    echo "Trigger created successfully"; 
} else { 
    echo "Error creating trigger: " . mysqli_error($conn); 
} 
?>

	
	
	<?php }	?>
	
	if(0=0){

		
	}
	
	 <div class='icon-credits'>Icons made by, from <a href="http://www.ServerNet.ir" title="Flaticon">www.ServerNet.ir</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

  <script src='/jquery.min.js'></script>
<script src='/modernizr.min.js'></script><script  src="./script.js"></script>

</body>
</html>
