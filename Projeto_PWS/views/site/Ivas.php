<?php
$ivas = $params;
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <h2>Ivas</h2>
    <h2 class="top-space"></h2>
    <div class="row">
        <div class="col-sm-12">
            <table class="table tablestriped">
                <thead>
                <th><h3>Id</h3></th>
                <th><h3>Percentagem</h3></th>
                <th><h3>Descrição</h3></th>
                <th><h3>Vigor</h3></th>
                <th><h3>Acções</h3></th>
                </thead>
                <tbody>
                <?php foreach ($ivas as $iva) { ?>
                    <tr>
                        <td><?=$iva->id?></td>
                        <td><?=$iva->percentagem?>%</td>
                        <td><?=$iva->descricao?></td>
                        <td><?php switch ($iva->vigor) {
                                case 1:
                                    echo 'Ativo';
                                    break;
                                case 0:
                                    echo 'Inativo';
                                    break;
                                default:
                                    echo 'ERRO';
                                    break;
                            }?></td>
                        <td>
                            <a href="router.php?c=ivas&a=details&id=<?=$iva->id ?>"
                               class="btn btn-info" role="button">Details</a>
                            <a href="router.php?c=ivas&a=edit&id=<?=$iva->id ?>"
                               class="btn btn-info" role="button">Edit</a>
                            <?php if($iva->id > 3){
                            ?>   <a href='router.php?c=ivas&a=delete&id=<?$iva->id?>'
                                 class='btn btn-warning' role='button'>Delete</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <h3>Create a new IVA</h3>
            <p>
                <a href="router.php?c=ivas&a=create" class="btn btn-info"
                   role="button">New</a>
                <a href="router.php?c=site&a=index" class="btn btn-info"
                   role="button">Homepage</a>
            </p>
        </div>
    </div>


<?php
