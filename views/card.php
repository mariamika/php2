<form action="/basket/add" method="post">
    <div style="margin: 50px; display: block; float: right; width: 460px; margin-right: 600px;">
        <span style="font-family: 'Open Sans', sans-serif; font-size: 18px; margin-top: 20px;"><?=$product->name?></span><br><br>
        <p><?=$product->description?></p><br>
        <span style="font-family: 'Open Sans', sans-serif; font-size: 16px">&#8381; <?=$product->price?></span>

        <select name="amount" style="float: right;">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <span style="float: right; padding-right: 20px;">Quentity:</span>
        <br><br><br>
        <input type="hidden" name="id" value="<?=$product->id?>">
        <input type="submit" style="width: 200px; background: #3277cc;
                                        font-size: 20px; font-family: 'Open Sans', sans-serif;
                                        border-radius: 5px; padding: 10px" value="BUY">
    </div>
</form>