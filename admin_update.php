<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
$cat = getAllCatInfo($conn);
?>
<?php


if (isset($_POST['title']) AND $_POST['title'] !='') {
    $title = $_POST['title'];
    $quotes = $_POST['quotes'];
    $description = $_POST['description'];
    $category=$_POST['category'];
    $tags = trim($_POST['tag']);
    $tags = explode(",", $tags);
    $newTags = [];
    for ($i = 0; $i < count($tags); $i++){
        if (trim($tags[$i])!='') {
            $newTags[] = trim($tags[$i]);
        }
    }
    $conn = connect();

    if ($_FILES['image']['name']!='') {
        move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name']);
        $sql = "UPDATE phrases set title = '".$title."', quotes = '".$quotes."', description = '".$description."', category = '".$category."', image = '".$_FILES['image']['name']."' WHERE id=".$_GET['id'];
    }
    else {
        $sql = "UPDATE phrases set title = '".$title."', quotes = '".$quotes."', description = '".$description."', category = '".$category."' WHERE id=".$_GET['id'];
    }

    if (mysqli_query($conn, $sql)) {
        $sql = "DELETE FROM tag WHERE post=".$_GET['id'];
        mysqli_query($conn, $sql);

        for ($i = 0; $i < count($newTags); $i++){
            $sql = "INSERT INTO tag (tag, post) VALUES ('".$newTags[$i]."', ".$_GET['id'].")";
            mysqli_query($conn, $sql);
        }
        // var_dump($lastId); 
        setcookie('bd_create_success', 1, time()+10);
        header('Location: /admin.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    close($conn);
}

?>
<?php
    $sql = 'SELECT * FROM phrases WHERE id='.$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql = 'SELECT tag FROM tag WHERE post='.$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $t = array();
    while($tag = mysqli_fetch_assoc($result)) {
        $t[] = $tag['tag'];
    }
?>
<?php

require_once('template/header_admin.php');
?>
<div class="container">
    <div class="row">
    <div class="col-lg-12">
    <h2>Update post id=<?php echo $_GET['id']; ?></h2>
    <form action="" method="POST"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" id="title" value="<?php echo $row['title'];?>">
        </div>
        <div class="form-group">
            <label for="quotes">Quotes</label>
            <input type="text" name="quotes" class="form-control" id="quotes" value="<?php echo $row['quotes'];?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description"><?php echo $row['description'];?></textarea>
        </div>
        <div class="form-group">
            <img src="/images/<?php echo $row['image'];?>" alt="">
        </div>
        <div class="form-group">
            <label for="image">Photo</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>
        <div class="form-group">
            <label for="tag">Tags</label>
            <input type="text" name="tag" class="form-control" id="tag" placeholder="one,two" value="<?php echo join(',',$t);?>">
        </div>
        <div class="form-group">
					<label for="category">Categories</label>
					<input type="text" name="category" class="form-control" id="category" placeholder="one">
				</div>
        <div class="form-group text-right">
            <input type="submit" value="update article" class="btn btn-success">
        </div>
    </form>
        </div>
    </div>
</div>


<?php 
    require_once('template/footer.php');
?>