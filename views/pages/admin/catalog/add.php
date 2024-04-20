<?php
/** 
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Session\Session $session
*/
?>

<?php $view->component('start') ?>
<h1>Add catalog page</h1>

<form action="/admin/catalog/add" method="post">
    <p>Name</p>
    <div>
    <input type="text" name="name">
    </div>
    <?php if($session->has(key:'name')){ ?>
    <div>
        <ul>
            <?php foreach($session->getFlash(key:'name') as $error){ ?>
                <li><?= $error ?></li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
    <div>
    <button>Add</button>
    </div>
</form>
<?php $view->component('end') ?>
