'use strict'
const contents = JSON.parse('<?= $content ?>');

  const languages = JSON.parse('<?= $language ?>');

  const study_times = JSON.parse('<?= $study_times ?>');

  const study_date = JSON.parse('<?= $study_date ?>');

  const contenttimes = JSON.parse('<?= $content_times ?>');
  
  const languagetimes = JSON.parse('<?= $language_times ?>');
  

// 円グラフ

var context = document.querySelector("#language-chart").getContext("2d");
new Chart(context, {
  type: "doughnut",
  data: {
    labels: [
      "HTML",
      "CSS",
      "PHP",
      "JavaScript",
      "SHELL",
      "SQL",
      "Laravel",
      "その他",
    ],
    datasets: [
      {
        backgroundColor: [
          "#00BFFF",
          "#1E90FF",
          "#6495ED",
          "#7B68EE",
          "#4169E1",
          "#0000FF",
          "#0000CD",
          "#00BFFF",
        ],
        data: [27, 24, 16, 12, 8, 8, 4, 1],
      },
    ],
  },
  options: {
    responsive: false,
    plugins: {
      datalabels: {
        font: {
          size: 13,
        },
        formatter: function (value, context) {
          return value.toString() + "%";
        },
      },
      legend: { position: "bottom" },
    },
  },
  plugins: [ChartDataLabels],
});

var context = document.querySelector("#content-chart").getContext("2d");
new Chart(context, {
  type: "doughnut",
  data: {
    labels: ["N予備校", "課題", "どっとインストール"],
    datasets: [
      {
        backgroundColor: ["#00BFFF", "#1E90FF", "#6495ED"],
        data: [42, 33, 25],
      },
    ],
  },
  options: {
    responsive: false,
    plugins: {
      datalabels: {
        font: {
          size: 13,
        },
        formatter: function (value, context) {
          return value.toString() + "%";
        },
      },
      legend: { position: "bottom" },
    },
  },
  plugins: [ChartDataLabels],
});

//棒グラフ
var context = document.querySelector("#var-chart").getContext("2d");
new Chart(context, {
  type: "bar",
  data: {
    labels: [
      "",
      "2",
      "",
      "4",
      "",
      "8",
      "",
      "10",
      "",
      "12",
      "",
      "14",
      "",
      "16",
      "",
      "18",
      "",
      "20",
      "",
      "22",
      "",
      "24",
      "",
      "26",
      "",
      "28",
      "",
      "30",
    ],
    datasets: [
      {
        label: "",
        data: [
          6, 3, 4, 2, 5, 6, 5, 2, 8, 2, 7, 2, 7, 2, 4, 5, 7, 5, 7, 6, 8,
          2, 5, 2, 1, 2, 4, 2, 3, 2,
        ],
        backgroundColor: ["#6495ED", "#7B68EE", "#00BFFF"],
      },
    ],
  },
  options: {
    responsive: false,
    scales: {
      y: { grid: { display: false } },
      x: {
        grid: { display: false },
        ticks: {
          color: "#bdd1e1",
          autoSkip: false,
        },
      },
    },
  },
});

$(function () {
  $("#openModal").click(function () {
    $("#modalArea").fadeIn();
  });
  $("#closeModal , #modalBg").click(function () {
    $("#modalArea").fadeOut();
  });
});

// to-modalLoadingと言うidをもつDOMを取得する
const toModalLoading = document.getElementById('modalPost');

// toModalLoadingがclickイベントを拾えるようにする
toModalLoading.addEventListener('click', ()=>{
$('#modalContent').css("display", "none")
;
$('#modalLoading').css("display", "block");

// 2秒後にtoModalSuccessを呼び出す
setTimeout(function(){
$('#modalLoading').css("display", "none")
;
$('#postCompletion').css("display", "block");
}, 2000)
})

function GetTweet(){
const TwitterPost = document.getElementById('TwitterComment').value;
TWEET.innerHTML = '<a class="twitter_button" href="https://twitter.com/intent/tweet?text=' + TwitterPost + '" target="_blank">Twitterにシェアする</a>'

}

$("#datepicker").datepicker();

