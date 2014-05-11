<div id="content">
<h1>ویرایش حساب کاربری</h1>
<form method="post" action="<?php echo URL; ?>register/editSave/<?php echo $this->id ?>">
    <label>نام کاربری</label><input type="text" name="username" value="<?php echo $this->username;?>"/><br />
    <label>کلمه عبور</label><input type="password" name="password" /><br />
    <label>تکرار کلمه عبور</label><input type="password" name="password2" /><br />
    <label>نام</label><input type="text" name="first_name" value="<?php echo $this->fname;?>"/><br />
    <label>نام میانی</label><input type="text" name="middle_name" value="<?php echo $this->mname;?>"/><br />
    <label>نام خانوادگی</label><input type="text" name="last_name" value="<?php echo $this->lname;?>"/><br />
    <label>&nbsp;</label><input type="submit" value="ویرایش"/>
</form>
</div>