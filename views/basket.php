<div class="container">
    <h3>Корзина</h3>
    <?php foreach ($product as $item):?>
        <form action="/basket" method="post">
            <div style="margin: 50px;">
                <div style="display: inline-block; margin-left: 50px; "><?=$item->name?></div>
                <div style="display: inline-block; margin-left: 50px; ">
                    <input type="text" name="amount" value="<?=$item->amount?>">
                    <button formaction="/basket/change">OK</button>
                </div>
                <img src="/img/mult.png" alt="img" width="15px;" style="margin-left: 50px">
                <div style="display: inline-block; margin-left: 50px; ">&#8381; <?=$item->price?></div>
                <div style="display: inline-block; margin-left: 100px; color: #d64d60; font-family: 'lato-regular', sans-serif">
                    &#8381; <?=$item->amount*$item->price?>
                </div>
                <input type="hidden" name="id" value="<?=$item->id?>">
                <input type="hidden" name="count" value="1">
                <button formaction="/basket/del">DELETE</button>
            </div>
        </form>

    <? endforeach;?>
    <div style="margin-bottom: 80px; float: right; display: block;
                    font-size: 24px; font-family: 'lato-regular', sans-serif">Total Price: &nbsp; <?=$totalCost?>
    </div>
</div>
