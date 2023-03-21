<?php

require('./dbconnect.php');

$total = $dbh->query("select sum(study_time) FROM records")->fetchColumn();
// $total = $dbh->query("select sum(study_time) FROM records")->fetchAll(PDO::FETCH_ASSOC);
// var_dump($total[0]['sum(study_time)']);

$objDateTime = new DateTime();
$today = $objDateTime->format('Y-m-d');
// var_dump("select sum(study_time) FROM records WHERE study_date BETWEEN " . $today . " 00:00:00 AND " . $today . " 23:59:59");
$daily= $dbh->query("select sum(study_time) FROM records WHERE study_date BETWEEN '" . $today . " 00:00:00' AND '" . $today . " 23:59:59'")->fetchColumn();

$startDate = new DateTime('first day of this month');
    //月終わり
$endDate  = new DateTime('last day of this month');

$month_s= $startDate->format('Y-m-d');
$month_e= $endDate->format('Y-m-d');


$monthly= $dbh->query("select sum(study_time) FROM records WHERE study_date BETWEEN '" . $month_s . " 00:00:00' AND '" . $month_e . " 23:59:59'")->fetchColumn();


// var_dump($dbh);
// var_dump($daily);


?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/recet.css" />
    <link rel="stylesheet" href="./assets/styles/common.css" />
    <script
      type="text/javascript"
      src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    ></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="./assets/scripts/modal.js" defer></script>
  </head>
  <body>
    <header>
      <div class="header-left">
        <div class="header-logo">
          <img src="./assets/img/logo.svg" alt="" />
        </div>
        <div class="header-th-week">4th week</div>
      </div>
      <button id="openModal" class="header-log-button to-media" data-target="#modalPost">
        記録・投稿
      </button>
    </header>

    <main>
      <div class="log">
        <div class="log-hour" id="A">
          <div class="hour-theme">Today</div>
          <div class="hour-count"><?= $daily ?></div>
          <div class="hour-hour">hour</div>
        </div>
        <div class="log-hour" id="B">
          <div class="hour-theme">Month</div>
          <div class="hour-count"><?= $monthly ?></div>
          <div class="hour-hour">hour</div>
        </div>
        <div class="log-hour" id="C">
          <div class="hour-theme">Total</div>
          <div class="hour-count"><?= $total ?></div>
          <div class="hour-hour">hour</div>
        </div>

        <div class="log-chart" id="D">
          <canvas
            id="var-chart"
            class="var-chart"
            width="550px"
            height="350px"
          ></canvas>
        </div>

        <div class="log-graph" id="E">
          <div class="D-theme">　　学習言語</div>
          <canvas id="language-chart" width="245px" height="230px"> </canvas>

        </div>
        <div class="log-graph" id="F">
          <div class="D-theme">　学習コンテンツ</div>
          <canvas
            id="content-chart"
            class="content-shart"
            width="245px"
            height="230px"
          ></canvas>
        </div>
        <button id="openModal2 " class="header-log-button media-none" data-target="#modalPost">
        記録・投稿
        </button>
      </div>
      
      <section class="modal" id="modalArea">
        <!-- <div class="modal-background" id="modalBg"></div> -->

        <div class="post__close" id="closeModal">x</div>
        <div class="post__inner" id="modalContent">
          <div class="post__left">
            <div class="post__contents">
              <h3 class="post__lead">学習日</h3>
              <label for="studied-date">
                <input class="text-box" type="text" id="datepicker" />
              </label>
            </div>
            <div class="post__learnings">
              <h3 class="post__lead lead-content">学習コンテンツ（複数選択可）</h3>
              <ul class="post__learnings__items">
                <li class="post__learnings__item" id="I-A">
                  <label class="checkbox" for="Nyobiko">
                    <input
                      class="checkbox__input"
                      type="checkbox"
                      name="content"
                      id="Nyobiko"
                    />
                    <span class="checkbox__text">N予備</span>
                  </label>
                </li>
                <li class="post__learnings__item " id="I-B">
                  <label class="checkbox" for="dotinstall">
                    <input
                      class="checkbox__input"
                      type="checkbox"
                      name="content"
                      id="dotinstall"
                    />
                    <span class="checkbox__text">ドットインストール</span>
                  </label>
                </li>
                <li class="post__learnings__item" id="I-C">
                  <label class="" for="POSSEkadai">
                    <input
                      class="checkbox__input"
                      type="checkbox"
                      name="content"
                      id="POSSEkadai"
                    />
                    <span class="checkbox__text">POSSE課題</span>
                  </label>
                </li>
              </ul>
            </div>
            <div class="post__learnings">
              <h3 class="post__lead">学習言語(複数選択可)</h3>
              <ul class="post__learnings__languages">
                <li class="post__learnings__item">
                  <label class="checkbox" for="html">
                    <input
                      class="checkbox__input"
                      type="checkbox"
                      name="language"
                      id="html"
                    />
                    <span class="checkbox__text">HTML</span>
                  </label>
                </li>
                <li class="post__learnings__item">
                  <label class="checkbox" for="css">
                    <input
                      class="checkbox__input"
                      type="checkbox"
                      name="language"
                      id="css"
                    />
                    <span class="checkbox__text">CSS</span>
                  </label>
                </li>
                <li class="post__learnings__item">
                  <label class="checkbox" for="php">
                    <input
                      class="checkbox__input"
                      type="checkbox"
                      name="language"
                      id="php"
                    />
                    <span class="checkbox__text">PHP</span>
                  </label>
                </li>
                <li class="post__learnings__item">
                  <label class="checkbox" for="laravel">
                    <input
                      class="checkbox__input"
                      type="checkbox"
                      name="language"
                      id="laravel"
                    />
                    <span class="checkbox__text">Laravel</span>
                  </label>
                </li>
                <li class="post__learnings__item">
                  <label class="checkbox" for="sql">
                    <input
                      class="checkbox__input"
                      type="checkbox"
                      name="language"
                      id="sql"
                    />
                    <span class="checkbox__text">SQL</span>
                  </label>
                </li>
                <li class="post__learnings__item">
                  <label class="checkbox" for="shell">
                    <input
                      class="checkbox__input"
                      type="checkbox"
                      name="language"
                      id="shell"
                    />
                    <span class="checkbox__text">SHELL</span>
                  </label>
                </li>
                <li class="post__learnings__item" id="L-7">
                  <label class="" for="others" id="L-7">
                    <input
                      class="checkbox__input"
                      type="checkbox"
                      name="language"
                      id="others"
                    />
                    <span class="checkbox__text"
                      >情報システム基礎知識（その他）</span
                    >
                  </label>
                </li>
              </ul>
            </div>
          </div>
          <div class="post__right">
            <div class="post__contents">
              <h3 class="post__lead ">学習時間</h3>
              <label for="studied-time" >
                <input
                  class="post__text"
                  type="text"
                  name="time"
                  id="studied-time"
                />
              </label>
            </div>
            <div class="post__twitter">
              <h3 class="post__lead twitter-comment">Twitter用コメント</h3>
              <textarea
                name="comment"
                id="TwitterComment"
                class="post__textarea"
                onkeyup="GetTweet(value)"
              ></textarea>
            </div>
            <label class="checkbox checkbox__twitter"  for="twitter">
              <input
                class="checkbox__input checkbox__twitter__input"
                type="checkbox"
                name="twitter"
                id="twitter"
                checked
              />
              <span class="checkbox__text checkbox__twitter__text" id="TWEET"
                >Twitterにシェアする</span
              >
            </label>
          </div>
          <button class="button post__button post-all" id="modalPost">記録・投稿</button>
        </div>