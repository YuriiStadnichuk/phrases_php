<?php
require_once('template/header.php');
$data = getPostFromCategory($conn);
$catList = getCatInfo($conn);
close($conn);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
<?php
    echo "<h1 >{$catList['category']}</h1>";
?>
                </div>
                <div class="col-lg-12">
<?php
    echo "<div class='mb-5 mt-5 color-blue-h text-center'>".$catList['description']."</div>";
?>
                </div>
            </div>
            <div class="row">
<?php
    $out = '';
    for ($i=0; $i < count($data); $i++){
        $out .='<div class="col-lg-4 col-md-6">';
        $out .='<div class="card">';
        $out .="<img src='/images/{$data[$i]['image']}' class='card-img-top'>";
        $out .='<div class="card-body">';
        $out .="<h5 class='card-title'>{$data[$i]['title']}</h5>";
        $out .="<p class='card-text'>{$data[$i]['quotes']}</p>";
        $out .='<p class="text-right"><a href="/article.php?id='.$data[$i]['id'].'" class="btn btn-primary">Read more...</a></p>';
        $out .='</div>';
        $out .='</div>';
        $out .='</div>';
    }
    echo $out;
?>
            </div>
        </div>
        <div class="col-lg-3">
<?php require_once('template/nav.php'); ?>
        </div>
    </div>
</div>
<?php 
    require_once('template/footer.php');
?>