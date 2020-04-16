<?php

/* @var $this yii\web\View */
/* @var $patterntitle  */
/* @var $patterncomment  */
/* @var $ret  */

$this->title = 'Pattern ' . $patterntitle ;
?>
<div class="site-index">

    <div class="jumbotron">
        <p><a class="btn btn-lg btn-success" href="#"><?= $patterntitle ?></a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h2><?= $ret ?></h2>

                <p><?= $patterncomment ?></p>

            </div>
        </div>

    </div>
</div>
