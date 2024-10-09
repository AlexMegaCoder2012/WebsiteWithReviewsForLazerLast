jQuery(document).ready(function(){
    //скрипт смены фоновой картинки
    var images = new Array();
    var i = 0;
    
    images[0] = 'MediaFiles/images/1.jpg';
    images[1] = 'MediaFiles/images/2.jpg';
    images[2] = 'MediaFiles/images/3.jpg';
    images[3] = 'MediaFiles/images/4.jpg';
    images[4] = 'MediaFiles/images/5.jpg';
    images[5] = 'MediaFiles/images/6.jpg';
    images[6] = 'MediaFiles/images/7.jpg';
    images[7] = 'MediaFiles/images/8.png';
    images[8] = 'MediaFiles/images/9.jpg';
    images[9] = 'MediaFiles/images/10.jpg';
    
    document.getElementById("img_main").src = images[0];
    
    function Rotator() {
        document.getElementById("img_main").src = images[i];
        i=i+1;
        if (i == 10) {i=0}
    }
    setInterval(Rotator, 10000);
    setInterval(Rotator, 10000);
    
    //Скрипт подсчёта введёных пользователем в отзыв символов и вывод этого значения в тег <text>
    jQuery("#Text_review").keyup(function() {
        var NumChar=this.value.length;
        document.getElementById('Numchar').innerHTML = '<text>Символов написано '+NumChar+'/300</text>';
    if (this.value.length > 300) {
        this.value = this.value.substr(0, 300);
        document.getElementById('Numchar').innerHTML = '<text style="color:red;">Превышено кол-во символов:'+NumChar+'/300</text>';
    } 
    });
    
    //модальное окно
    document.addEventListener("DOMContentLoaded", function () {
      var scrollbar = document.body.clientWidth - window.innerWidth + 'px';
      console.log(scrollbar);
      document.querySelector('[href="#openModal"]').addEventListener('click', function () {
        document.body.style.overflow = 'hidden';
        document.querySelector('#openModal').style.marginLeft = scrollbar;
      });
      document.querySelector('[href="#close"]').addEventListener('click', function () {
        document.body.style.overflow = 'visible';
        document.querySelector('#openModal').style.marginLeft = '0px';
      });
    });
    
     //Проверка на пустые поля
   var button2 = document.getElementById("confirm")
   button2.onclick = CheckOne;
                                
    function CheckOne() {
        var InLogin = document.getElementById("one");
        var InPass = document.getElementById("two");
        var but = InLogin.value;
        var but2 = InPass.value;
        if(but == ""){
            document.getElementById('one').style.borderColor='red';
            return false;
        }
        
        if(but2 == ""){
            document.getElementById('two').style.borderColor='red';
            return false;
        } else {
            return true;
        }
    }
    
    $('button[name="EnterConfirm1"]').click(function () {
                    location.href = "index.php";
                });
});