< <?php
ini_set('max_execution_time',0);
ini_set('memory_limit', '-1');*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C HTML 4.01 Transitional//EN" "htpp://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Export Excel</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ios-8859-1">
	</head>

	<body>
		<?php
			generate_excel();

			function generate_excel(){
				mysql_connect("localhost","root"," ");
				mysql_select_db("path");

				//Error reporting
				if(PHP_SAPI == 'cli')
					dis('This example should only be run from a Web Browser');

				//Include PHPExcel
				require_once dirname(_FILE_) . '/Classes/PHPExcel.php';

				//Set doucument properties
				$jobPHPExcel->getPerties()->setCreator("Amit Andipara");
									      ->setLastModifiedBy("Amit Andipara");
									      ->setTitle("extract data");
									      ->setSubject("extract data");
									      ->setDescription("extract data");
									      ->setKeywords("extract data");
									      ->setCategory("extract data");
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A1','ลำดับที่')
				->setCellValue('B1','ชื่อ - นามสกุล')
				->setCellValue('C1','ตำแหน่ง')
				->setCellValue('D1','ระยะทาง(กิโลเมตร)')
				->setCellValue('E1','เวลา(นาที)')
				;
				
				$a=1;
				@foreach($table_route as $row)
					$a=$a+1;
					$a1='A',$a;
					$b1='B',$a;
					$c1='C',$a;
					$d1='D',$a;
					$e1='E',$a;

					$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue($a1,$row["Sequence"])
					->setCellValue($a1,$row["Name"])
					->setCellValue($a1,$row["House_number Village Subdistrict City Province"])
					->setCellValue($a1,$row["District"])
					->setCellValue($a1,$row["Time"])
				@endforeach*/
			}
				//Rename worksgeet
				$jobPHPExcel->getActiveSheet()->setTitle('Simple');
				//set active sheet index to the first sheet, so Excel opens this as the first sheet
				$jobPHPExcel->setActiveSheetIndex(0);
				//Redirect output to a client's a wed drowser (Excel5)
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
				$objWriter->save('amit.xls');*/
		}	
		?>
	</body>
	</html>




	<!-- <!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Export Data to Excal</title>
	<script src="htpps://ajax.googleapis.com/ajax/libs/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/css">
		.box{
		width:600px;
		margin:0 auto;
		border:1px solid #ccc;
	}		
	</script>
</head>
<body>
	<br>
	<div class="container"> 
		<h3 align="center">Export Data to Excel</h3>

		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
		            <td style="text-align: center!important;">ลำดับที่</td>
		            <td>ชื่อ - นามสกุล</td>
		            <td">ตำแหน่ง</td>
		            <td style="text-align: center!important;">ระยะทาง(กิโลเมตร)</td>
		            <td style="text-align: center!important;">เวลา(นาที)</td>
		        </tr>
		      		@foreach($table_route as $row)
		        <tr>
		            <td style="text-align: center!important;">{{ $row->Sequence}} </td>
		            <td>{{ $row->Name }}</td>
		            <td>{{ $row->House_number }} ม.{{ $row->Village }} ต.{{$row->Subdistrict}} อ.{{$row->City}} จ.{{ $row->Province }} </td>
		            <td id="dis" style="text-align: center!important;" >{{ $row->District}} </td>
		            <td style="text-align: center!important;">{{ $row->Time}}</td>
		        </tr>
		    		@endforeach				
			</table>
		</div>
	</div>
</body>
</html>
 -->