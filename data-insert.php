<?php

$page_title = "新增資料";
$page_name = "data-insert";
require __DIR__ . "/parts/__connect_db.php";
?>

<?php include __DIR__ . '/parts/__html_head.php'; ?>

<style>
    span.red-stars {
        color: red;
    }

    small.error-msg {
        color: red;
    }
</style>

<?php include __DIR__ . '/parts/__navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div id="infobar" class="alert alert-success" role="alert">
                A simple success alert—check it out!
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>

                    <form name="form1" onsubmit="return checkForm()">
                        <div class="form-group">
                            <label for="name"><span class="red-stars">**</span>name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">mobile</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>


        </div>
    </div>





</div>

<?php include __DIR__ . '/parts/__scripts.php'; ?>
<script>
    const email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $name = document.querySelector('#name');
    const $email = document.querySelector('#email');
    const $mobile = document.querySelector('#mobile');

    const r_fields = [$name, $email, $mobile]


    function checkForm() {
        let isPass = true;

        r_fields.forEach(el => {
            el.style.borderColor = "#cccccc";
            el.nextElementSibling.innerHTML = "";
        })

        //TODO : 檢查資料格式
        if ($name.value.length < 2) {
            isPass = false;
            $name.style.borderColor = "red";
            $name.nextElementSibling.innerHTML = "請填寫正確的姓名";
        };

        if (!email_pattern.test($email.value)) {
            isPass = false;
            $email.style.borderColor = 'red';
            $email.nextElementSibling.innerHTML = '請填寫正確格式的電子郵箱';
        }

        if (!mobile_pattern.test($mobile.value)) {
            isPass = false;
            $mobile.style.borderColor = 'red';
            $mobile.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
        };

        const fd = new FormData(document.form1);

        fetch('data-insert-api.php', {

                method: 'POST',
                body: fd
            })
            .then(r => r.text())
            .then(str => {
                console.log(str);
            });
        return false;
    }
</script>
<?php include __DIR__ . '/parts/__html_foot.php'; ?>