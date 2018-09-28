<h3>КАТАЛОГ ТОВАРОВ</h3>
<div class="cartochka">
    <?php foreach ($product as $item):?>
        <div class="div_cart">
            <div class="cart_header">
                <a href="/product/card?id=<?=$item->id?>"><h4 class="cart_title"><?=$item->name?></h4></a>
                <p class="desc_card"><?=$item->description?></p>
                <p class="producer"><?=$item->producer?></p>
                <span class="cart_cena">&#36; <?=$item->price?></span>
                <hr>
            </div>
        </div>
    <? endforeach;?>
</div>