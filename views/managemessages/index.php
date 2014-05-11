<table>
    <tr>
        <td style="width: 70%;">
            <h2 dir="rtl">اطلاعات عمومی مسیریابی</h2>
            <form method="post" action="<?php echo URL; ?>main/findpath">
                <label>مبدا</label>
                <select name="source" dir="rtl">
                    <?php
                        foreach ($this->allNodes as $key => $row) 
                        {
                            echo "<option value={$row["id"]} selected>{$row["node_name"]}</option><br/>";
                        }
                    ?>
                </select><br/>
                <label>مقصد</label>
                <select name="destination" dir="rtl">
                    <?php
                        foreach ($this->allNodes as $key => $row) 
                        {
                            echo "<option value={$row["id"]} selected>{$row["node_name"]}</option><br/>";
                        }
                    ?>
                </select><br/>
                <pre>              <input type="radio" checked/>مسیریابی با وسایل حمل و نقل عمومی<br/>
                    <input type="checkbox" checked disabled="true"/>استفاده از اتوبوس<br/>
                    <input type="checkbox" checked disabled="true"/>استفاده از مترو<br/>
                    <input type="checkbox" checked disabled="true"/>مسیر شامل پیاده روی هم باشد<br/>
              <input type="radio" disabled="true"/>مسیریابی با وسیله شخصی<br/>
                </pre>
                <label>&nbsp;</label><input type="submit" value="مسیریابی انجام شود"/>
            </form>
        </td>
        <td>
            <div id="googleMap" style="width:500px;height:500px;"></div>
        </td>
    </tr>
</table>

