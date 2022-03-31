/*
ナビボタン
*/
document,addEventListener('DOMContentLoaded', function(){
  document.getElementById("menuButton").addEventListener("click", function(){
    this.classList.toggle("-open");
    document.getElementById('globalNav').classList.toggle("-open");

  })
});


/*
文字アニメーション
*/
const animationText = document.querySelectorAll(".textAnimation");
for (let i = 0; i < animationText.length; i ++){
  const targetElement = animationText[i],
  texts = targetElement.textContent,
  textsArray=[];
  targetElement.textContent ="";

  for(let j =0; j < texts.split("").length; j++){

    if(texts.split("")[j] === " "){
      textsArray.push(" ");
    }else{
      textsArray.push('<span style=" animation-delay:'+ (j * .1 + .3) + 's;">'+ texts.split("")[j] + '</span>')
    }
  } 
  for(let k =0; k< textsArray.length; k++){
    targetElement.innerHTML += textsArray[k];
  }
}


/*
ページスクロール
*/
document.querySelectorAll('a[href^="#"]').forEach(link =>{
  link.addEventListener("click", e =>{
    e.preventDefault()

    const target =document.querySelector(link.hash),
    offsetTop =window.pageYOffset + target.getBoundingClientRect().top
    
    window.scrollTo({
      top:offsetTop,
      behavior:"smooth"
    })
  } )
})


/*
ヘッダー表示非表示
*/
const header = document.getElementById("header");
const hH = header.clientHeight;
const winH = window.innerHeight;
const docH = document.documentElement.scrollHeight;
const windBtm = docH - winH;
let pos = 0;
let lastPos = 0;
const Btm = document.getElementById("footer_sec");

const onScroll = function () {
  const distance = Btm.getBoundingClientRect().bottom;

  if (pos > hH && pos > lastPos || winH >= distance) {
    header.classList.remove("-open");
  }

  if(window.innerHeight < distance){
    if (pos < hH || pos < lastPos) {
      header.classList.add("-open");
    }
  }

  lastPos = pos;
};

window.addEventListener("scroll", () => {
  pos = window.scrollY;
  onScroll();
});

//スクロールするたびに、イベント発生させる
const targetElement = document.querySelectorAll(".animationTarget");
document.addEventListener("scroll", function(){
  for (let i=0; i< targetElement.length; i++){
    const getElementDistance =targetElement[i].getBoundingClientRect().top 
    if(window.innerHeight > getElementDistance){   
      targetElement[i].classList.add("show");
    }
  }
})
