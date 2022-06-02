<?php
$empresas = $params;
?>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    !-->
    <link href="../../public/css/Empresas.css">
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    !-->

    <h2>Empresas</h2>
    <h2 class="top-space"></h2>
    <div class="row">
        <div class="col-sm-12">
            <table class="table tablestriped">
                <thead>
                <th><h3>Id</h3></th>
                <th><h3>Name</h3></th>
                <th><h3>Email</h3></th>
                <th><h3>Telefone</h3></th>
                <th><h3>Nif</h3></th>
                <th><h3>Morada</h3></th>
                <th><h3>Codigo postal</h3></th>
                <th><h3>Localidade</h3></th>
                <th><h3>Capital</h3></th>
                <th><h3>Acções</h3></th>
                </thead>
                <tbody>
                <?php foreach ($empresas as $empresa) { ?>
                    <tr>
                        <td><?=$empresa->id?></td>
                        <td><?=$empresa->designacao?></td>
                        <td><?=$empresa->email?></td>
                        <td><?=$empresa->telefone?></td>
                        <td><?=$empresa->nif?></td>
                        <td><?=$empresa->morada?></td>
                        <td><?=$empresa->codpostal?></td>
                        <td><?=$empresa->localidade?></td>
                        <td><?=$empresa->capital?></td>
                        <td>
                            <a href="router.php?c=empresas&a=details&id=<?=$empresa->id ?>"
                               class="btn btn-info" role="button">Details</a>
                            <a href="router.php?c=empresas&a=edit&id=<?=$empresa->id ?>" class="listButton" role="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M480.1 160.1L316.3 325.7L186.3 195.7L302.1 80L288.1 66.91C279.6 57.54 264.4 57.54 255 66.91L168.1 152.1C159.6 162.3 144.4 162.3 135 152.1C125.7 143.6 125.7 128.4 135 119L221.1 32.97C249.2 4.853 294.8 4.853 322.9 32.97L336 46.06L351 31.03C386.9-4.849 445.1-4.849 480.1 31.03C516.9 66.91 516.9 125.1 480.1 160.1V160.1zM229.5 412.5C181.5 460.5 120.3 493.2 53.7 506.5L28.71 511.5C20.84 513.1 12.7 510.6 7.03 504.1C1.356 499.3-1.107 491.2 .4662 483.3L5.465 458.3C18.78 391.7 51.52 330.5 99.54 282.5L163.7 218.3L293.7 348.3L229.5 412.5z"/></svg></a>
                        </td    >
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
                <a href="router.php?c=site&a=index" class="btn btn-info"
                   role="button">Homepage</a>
            </p>
        </div>
    </div>