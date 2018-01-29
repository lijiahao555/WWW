
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

$("#username").focus(function(){

alert("字母和数字组合，不少于8位")

});

$("#userkey").focus(function(){

alert("字母和数字组合，不少于8位")


});


  $('#sendlogin').click(function(){
                                if( $("#username").value=="" || $("#username").value==null || $("#userkey").value=="" || $("#userkey").value==null){
                                     if( $("#username").val() == "")
                                          {
                                          alert("用户名为空！");
                                          return false;
                                          }else if($("#userkey").val() == ""){

                                            alert("密码为空！");
                                          return false;
                                          }
                                }else{
                                        var pattern=/^([0-9a-zA-Z]{8,16})$/g;
                                        var pattnum=/^([0-9]{8,16})$/g;
                                        var pattzimu=/^([a-zA-Z]{8,16})$/g; 
                                        if($("#username").value==pattern){
                                              if($("#username").length<8){
                                                alert("用户名不得小于8位字符！且为字母和数字组合。");
                                                return false;
                                              }
                                        }else if( $("#username").value==pattnum){
                                                alert("用户名不得为纯数字！");
                                                return false;
                                        }else if( $("#username").value==pattzimu){
                                             alert("用户名不得为纯字母！字母和数字组合。");
                                                return false;
                                        }
                                        
                                        if($("#userkey").value==pattern){
                                              if($("#userkey").length<8){
                                                alert("用户名不得小于8位字符！");
                                                return false;
                                              }
                                        }else if( $("#userkey").value==pattnum){
                                                alert("用户名不得为纯数字！字母和数字组合。");
                                                return false;
                                        }else if( $("#userkey").value==pattzimu){
                                             alert("用户名不得为纯字母！字母和数字组合。");
                                                return false;
                                        }
                                             var name = $("#username").val();
                                             var pwd = $("#userkey").val();
                                          
                                }
                                window.location.href = "home.html";
                                

   });
 
 





            


});
