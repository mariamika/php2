<h3>КОРЗИНА</h3>
    <?php foreach ($product as $item):?>
        <form action="" method="post">
            <div style="margin: 50px;">
                <div style="display: inline-block; margin-left: 50px; "><?=$item->name?></div>
                <div style="display: inline-block; margin-left: 50px; "><?=$item->amount?></div>
                <div style="display: inline-block; margin-left: 50px; ">&#36; <?=$item->price?></div>
                <div style="display: inline-block; margin-left: 100px; color: #d64d60; font-family: 'lato-regular', sans-serif">
                    &#36; <?=$item->amount*$item->price?>
                </div>
                <input type="hidden" name="id" value="<?=$item->id?>">
                <input type="hidden" name="count" value="1">
                <input type="submit" name="delete" value="Delete">
            </div>
        </form>

    <? endforeach;?>
    <div style="margin-bottom: 80px; float: right; display: block;
                    font-size: 24px; font-family: 'lato-regular', sans-serif">Total Price: &nbsp;<?php echo"123ccc"?>
</div>