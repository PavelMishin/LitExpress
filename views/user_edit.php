<?php include ROOT . '/views/layouts/header.php'; ?>

<main>
    <div class="container user-edit-page">
        <h2>Редактирование профиля</h2>
        <form action="#" name="edit-form" method="post" >
            <fieldset>
                <legend>Регистрационные данные</legend>
                <label>Введите E-mail: 
                    <input type="e-mail" name="email" placeholder="E-mail" value="<?= $email ?>" pattern="([0-9a-z]+@[a-z]+.[a-z]{0,3})">
                </label>
                <label>Введите пароль: 
                    <input type="text" name="password" placeholder="не менее 6 символов" value="<?= $password ?>" pattern="([0-9a-zA-Zа-яА-ЯёЁ.,\\\\- ]{6,})">
                </label>
            </fieldset>
            <fieldset>
                <legend>Личные данные</legend>
                <label>Ф.И.О.
                    <input type="text" name="fio" placeholder="Фамилия Имя Отчество" value="<?= $fio ?>">
                </label>
                <label>Адрес
                    <textarea name="address" placeholder="Адрес" rows="4"><?= $address ?></textarea>
                </label>
                <label>Телефон
                    <input type="text" name="telephone" placeholder="Телефон" value="<?php if (empty($telephone)) echo '+7 '; else echo $telephone ?>" pattern="[0-9+- ]+" >
                </label>
            </fieldset>
            <input type="submit" name="edit" value="Принять изменения">
        </form>
        <b><?php if (isset($result)) echo 'Данные успешно отредактированы' ?></b>
    </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>