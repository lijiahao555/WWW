
$(document).ready(function(){
   $(function() {

           $("#userName4").click(function() {
                $('input[name="choose"]').attr("checked",this.checked); 
            });
            var $choose = $("input[name='choose']");
            $choose.click(function(){
                $("#userName4").attr("checked",$choose.length == $("input[name='choose']:checked").length ? true : false);
            });

        });

$("#suresendbox").click(function(){

  var inputLength = $('.check_box');
  var cansend = true;
  for (var i = 0; i < inputLength.length;i++) { 
      console.log($(inputLength[i]).prop("checked"));
       if($(inputLength[i]).prop("checked") == true){
            //可以赠送
        cansend = false;
         window.location.href = "givesuccess.html"; 
        return false;
       }else{
        cansend = true;
       }
  }

  if(cansend == true){
     alert("未选择赠送用户！");
        return false;
  }

})

    $('#mynumber').keyup(function() {

    //判断当前数量参数是否为数值，如果不是数值则终止计算。
    if (!$(this).val().match(/^[0-9]+$/)) {
        alert("只能输入数字！")
        return false;
    }else{
        var ex = /^\d+$/;
        var v =$("#mynumber").val()/1000;
        if (!ex.test(v)) {
         alert(" 只能购买1000的倍数！")
           return false;
        }

      var a = 0.01 * $('#mynumber').val();
       $('#alldate').val("￥" + a);
        $('#alldated').val("￥" + a);
    }
    
  
  
})

   $('#serchdate').keyup(function() {

    //判断当前数量参数是否为数值，如果不是数值则终止计算。
    if (!$(this).val().match(/^[0-9]+$/)) {
        alert("只能输入数字！")
        return false;
    }else{
      var a = 0.01 * $('#serchdate').val();
       $('#alldated').val("￥" + a);
      
    }  
})
 $('#senpaynow').click(function() {
 
             var ex = /^\d+$/;
             var v =$("#serchdate").val()/1000;
        if (ex.test(v)) {
           window.location.href = "confirmorder.html"; 
           return false;
          
        }else{
          alert(" 只能购买1000的倍数！")
           return false;
        }
            
})


   

$('#senpay').click(function() {
    if ( $('#alldate').val() == 0 || $('#alldate').val() == null || $('#alldate').val() == NaN || $('#alldate').val() =="") {

      alert("未购买积分，无法支付！")

    }else{
      window.location.href = "paysuccess.html";   
    }
  
    
  
  
})

      $('#give_number').keyup(function() {

    //判断当前数量参数是否为数值，如果不是数值则终止计算。
    if (!$(this).val().match(/^[0-9]+$/)) {
        alert("只能输入数字！")
        return false;
    }else{
      var a = 0.01 * $('#give_number').val();
       $('#give_number_all').val("￥" + a);
    }
    
  
  
})
 

  $('#sendlogin').click(function(){
                      
                  if( $("#username").val() == "" && $("#userkey").val() == "") {
                                          alert("用户名和密码为空！");
                                          return false;
                      }else if($("#username").val() == ""){
                                            alert("密码为空！");
                                          return false;
                      } else if ( $("#userkey").val() == "") {
                                             alert("密码为空！");
                       }else{

                                 judge();                                           
                    }
                              
                                

   });
 
 
            function judge(){          var name=false;
                                       var pass=false;
                                     var pattern= /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,50}$/;             
                                      console.log($('#username').val().length)
                                        if($("#username").val().match(pattern)){
                                          //   console.log("#username"+$('#username').val())
                                          // console.log("#username.length"+$('#username').val().length)
              
                                              if($("#username").val().length<8){
                                                alert("用户名不得小于8位字符！且为字母和数字组合。");
                                                return false;
                                              }else{
                                                name=true;
                                                // console.log("name" + name);
                                 
                                              }

                                        }else{
                                          alert("用户名不得小于8位字符！且为字母和数字组合。");
                                         
                                          return false;
                                        }
                                         if($("#userkey").val().match(pattern)){
                                            console.log("#userkey"+$('#userkey').val())
                                          console.log("#userkey.length"+$('#userkey').val().length)
              
                                              if($("#userkey").val().length<8){
                                                alert("密码不得小于8位字符！且为字母和数字组合。");
                                                return false;
                                              }else{
                                                pass=true;
                                                console.log("pass" + pass);
                                 
                                              }

                                        }else{
                                          alert("密码不得小于8位字符！且为字母和数字组合。");
                                         
                                          return false;
                                        }
                              
                                 if(name == true && pass == true){
                                    window.location.href = "home.html";   
                                 }else{
                                  return false;
                                 }    

                             }

$("#detilbox_home_slid_box").click(function(){
    $(".detilbox_home_slid").slideToggle("slow");
      $("#span_icon_rid_n").toggle("fast");
     $("#span_icon_rid_h").toggle();

})
        


$('.serchbox').click(function(){
                      
                  if( $("#userNameserch").val()=="") {
                                          toast.show("未输入搜索内容！");
                                          return false;
                      }
                              
                                

   });
           






});
