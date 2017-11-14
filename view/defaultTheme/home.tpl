<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?= $title ?></title>
</head>
<body >
    <h1><?= $title ?></h1>
    <?PHP 
    if($river){ ?>
    <table width="100%">
    <?PHP 
    foreach($river as $post){
    ?>
    <tr>
            <?PHP
            foreach($post as $key =>  $data){ 
                if($key=="image"){ ?>
                <td><img src="<?= $data['src']?>" width="<?= $data['width']?>" height="<?= $data['height']?>"/></td>
                <?PHP }else{ ?>
                <td><?= $data?></td>
                <?PHP } ?>           
            <?PHP }?>
             
    </tr>
    <?PHP }?>
    </table>
    <?PHP } ?>
</body>
</html>
