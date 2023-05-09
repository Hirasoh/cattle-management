<!DOCTYPE html>
<html>
<head>
	<title><?php echo NAME_; ?></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta charset="UTF-8">
   <!-- FILE BASED -->
   <link rel="stylesheet" href="./plugin/w3.css">
   <link rel="stylesheet" href="./plugin/bootstrap.min.css">
   <script src="./plugin/jquery-2.2.4.min.js"></script>
   <script src="./plugin/bootstrap.min.js"></script>
   <link rel="stylesheet" href="./plugin/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <!-- CDN BASED  -->
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
   <!-- <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script> -->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
   <style>
      body {
          font-family: 'arial';
          background-color: floralwhite;
      }

      .m-bg-img {
         background-image: url(../farm_management_system/img/welcome.jpg);
         background-size: cover;
         background-position: center;
         background-repeat: no-repeat;
         min-height: 550px !important;
      }

   </style>
   <script>
    $(document).ready(function(){
       $('#table').DataTable();
   });

    $(document).ready(function(){
    	 $('#table_cow').DataTable();
       
    })
   </script>
   <script>
   	$.fn.datepicker.defaults.format = "yyyy-mm-dd";
   	$('.datepicker').datepicker();
   </script>
</head>
<body>