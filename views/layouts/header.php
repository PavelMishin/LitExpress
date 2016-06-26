<!DOCTYPE html>
<html lang="ru">
<head>
  <title>LitExpress</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/views/css/normalize.min.css">
  <link rel="stylesheet" href="/views/css/style.css">
  <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Merriweather:400,400italic,700&subset=latin,cyrillic">
</head>
<body>
    <header>
    <div class="container">
      <div class="logo-quotation">
        <div class="logo-header">
            <a href="/">LitExpress</a>
        </div>
        <div class="quotation">
          <blockquote>
              "<?php $quotation = Quotations::getRandomQuatation();
               echo $quotation['quotation']; ?>"
          </blockquote>
          <div class="author-quotation">
              <cite><?= $quotation['author']; ?></cite>
          </div>
        </div>
      </div>
      <div class="search-contacts">
        <form action='/catalog/search' class="search" method="post">
          <input type="search" name="search" placeholder="Быстрый поиск">
          <input type="submit">
        </form>
        <div class="contacts-header">
          <div class="telephone">
              <a href="tel: 8-934-933-83-55">Телефон: <span>8-934-933-83-55</span></a>
            <a href="/call" class="call">Заказать звонок</a>
          </div>
          <div class="e-mail">
            <span>E-mail: litexpress@gmail.com</span>
            <a href="/feedback" class="write">Написать нам</a>
          </div>
        </div>
      </div>
      <div class="cart">
          <a href="/cart">Корзина: <span id="count"></span></a>
      </div>
      <div class="user">
        <?php if (!isset($_SESSION['user'])): ?>
          <form action="/user/login" name="login" method="post">
            <input type="submit" value="Войти">
            <div class='identify'>
                <input type="e-mail" name="e-mail" placeholder="E-mail" pattern="([0-9a-z]+@[a-z]+.[a-z]{0,3})" required>
                <input type="password" name="password" placeholder="Пароль" required>
            </div>
          </form>
            <div class="user-links">
                <a href="/user/registration" class="registration">Регистрация</a>
                <a href="/user/forgot" class="forgot">Забыли пароль?</a>
            </div>
        <?php else: ?>
          <h2><?= User::getUserById($_SESSION['user'])['email'] ?></h2>
            <div class="user-links">
                <a href="/user/cabinet">Личный кабинет</a>
                <a href="/user/logout">Выйти</a>
            </div>
        <?php endif ?>
      </div>
      <nav class="header-navigation">
        <ul>
          <li>
            <a href="/">Главная</a>
          </li>
          <li>
            <a href="/catalog">Каталог</a>
          </li>
          <li>
            <a href="/news">Новости</a>
          </li>
          <li>
            <a href="/delivery">Доставка и оплата</a>
          </li>
          <li>
            <a href="/about">О компании</a>
          </li>
          <li>
            <a href="/contacts">Контакты</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
