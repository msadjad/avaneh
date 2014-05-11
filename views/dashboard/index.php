<h1>راهنمای سایت</h1>

<?php echo $this->result."<br/>"; ?>
<form method="post" action="http://localhost/travelguidedss/help/addtoDB/<?php echo $this->id+1;?>">
    <label>مبدا</label><input type="text" name="source"/><br/>
    <label>مقصد</label><input type="text" name="destination"/><br/>
    <label>مسافت</label><input type="text" name="distance"/><br/>
    <label>زمان سفر</label><input type="text" name="time"/><br/>
    <label>هزینه</label><input type="text" name="price"/><br/>
    <label>نوع</label>
    <select name="type">
        <option value="bus">اتوبوس</option>
        <option value="metro">مترو</option>
        <option value="walk" selected>پیاده</option>
    </select>
    <input type="submit" name="submit" value="افزودن مسیر"/>
</form>
<p>
این سایت به منظور استفاده هدفمندتر از منابع مقاله و پایان نامه طراحی شده است
</p>
<?php
    foreach($this->allNodes as $key => $value)
    {
        echo "{$value['id']} - {$value['node_name']}<br/>";
    }
?>