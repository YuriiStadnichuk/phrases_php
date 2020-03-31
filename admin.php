<?php
require_once('template/header_admin.php');

$data=select($conn);
close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>phrases</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
								echo   $flash;
								echo '<h2>Admin-panel</h2>';
								echo '<div class="mt-2 mb-2 text-right">';
								echo '<div><a href="/admin_create.php"><button class="btn btn-success">Add new</button></a></div>';
								$out = '<table class="table table-striped">';
								$out .='<tr><th>ID</th><th>Title</th><th>Quotes</th><th>Description</th><th>Image</th><th>Update</th><th>Action</th></tr>';
								for ($i = 0; $i < count($data); $i++) {
										$out .= "<tr><td>{$data[$i]['id']}</td>";
										$out .= "<td>{$data[$i]['title']}</td>";
										$out .= "<td><i>{$data[$i]['quotes']}</i></td>";
										$out .= "<td>{$data[$i]['description']}</td>";
										$out .= "<td><img src='/images/{$data[$i]['image']}' width='70'></td>";
										$out .= "<td><div> <a href='/admin_update.php?id={$data[$i]['id']}' class='btn btn-success'>update</a></div> </td>";
										$out .="<td><div href=' ' class='check-delete btn btn-success' data='{$data[$i]['id']}'>del</div></td></tr>";
								}
								$out .= '</table>';
								echo $out;
								?>
			</div>
		</div>
	</div>
	<script>
    window.onload= function(){
        let checkDelete = document.querySelectorAll('.check-delete');
        checkDelete.forEach(function(element){
            element.onclick = checkDeleteFunction;
        })
        function checkDeleteFunction(event){
            event.preventDefault();
            let a = confirm('Do you want delete');
            if (a == true) {
                location.href = '/admin_delete.php?id='+this.getAttribute('data');
            }
            return false;
        }
    }
</script>
	<?php 
    require_once('template/footer.php');
?>