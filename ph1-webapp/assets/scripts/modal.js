'use strict'

{

  // to-modalLoadingと言うidをもつDOMを取得する
  const toModalLoading = document.getElementById('to-modalLoading');

  // toModalLoadingがclickイベントを拾えるようにする
  toModalLoading.addEventListener('click', ()=>{
      // 投稿モーダルを非表示にし、ローディングモーダルを表示する
      // これも関数に切り出しても良いかもね
      $('#modalPost').modal('hide');
      $('#modalLoading').modal('show');

      // 2秒後にtoModalSuccessを呼び出す
      setTimeout(function(){
          toModalSuccess();
      }, 2000)
  })

  function toModalSuccess(){
    $('#modalLoading').modal('hide');
    $('#modalSuccess').modal('show');
  }
}
