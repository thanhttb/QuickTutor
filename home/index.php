<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		/* #####################################################################
   #
   #   Project       : Modal Login with jQuery Effects
   #   Author        : Rodrigo Amarante (rodrigockamarante)
   #   Version       : 1.0
   #   Created       : 07/28/2015
   #   Last Change   : 08/02/2015
   #
   ##################################################################### */
   
@import url(http://fonts.googleapis.com/css?family=Roboto);

* {
    font-family: 'Roboto', sans-serif;
}

#login-modal .modal-dialog {
    width: 350px;
}

#login-modal input[type=text], input[type=password] {
    margin-top: 10px;
}

#div-login-msg,
#div-lost-msg,
#div-register-msg {
    border: 1px solid #dadfe1;
    height: 30px;
    line-height: 28px;
    transition: all ease-in-out 500ms;
}

#div-login-msg.success,
#div-lost-msg.success,
#div-register-msg.success {
    border: 1px solid #68c3a3;
    background-color: #c8f7c5;
}

#div-login-msg.error,
#div-lost-msg.error,
#div-register-msg.error {
    border: 1px solid #eb575b;
    background-color: #ffcad1;
}

#icon-login-msg,
#icon-lost-msg,
#icon-register-msg {
    width: 30px;
    float: left;
    line-height: 28px;
    text-align: center;
    background-color: #dadfe1;
    margin-right: 5px;
    transition: all ease-in-out 500ms;
}

#icon-login-msg.success,
#icon-lost-msg.success,
#icon-register-msg.success {
    background-color: #68c3a3 !important;
}

#icon-login-msg.error,
#icon-lost-msg.error,
#icon-register-msg.error {
    background-color: #eb575b !important;
}

#img_logo {
    max-height: 100px;
    max-width: 100px;
}

/* #########################################
   #    override the bootstrap configs     #
   ######################################### */

.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: .8;
}

.modal-content {
    background-color: #ececec;
    border: 1px solid #bdc3c7;
    border-radius: 0px;
    outline: 0;
}

.modal-header {
    min-height: 16.43px;
    padding: 15px 15px 15px 15px;
    border-bottom: 0px;
}

.modal-body {
    position: relative;
    padding: 5px 15px 5px 15px;
}

.modal-footer {
    padding: 15px 15px 15px 15px;
    text-align: left;
    border-top: 0px;
}

.checkbox {
    margin-bottom: 0px;
}

.btn {
    border-radius: 0px;
}

.btn:focus,
.btn:active:focus,
.btn.active:focus,
.btn.focus,
.btn:active.focus,
.btn.active.focus {
    outline: none;
}

.btn-lg, .btn-group-lg>.btn {
    border-radius: 0px;
}

.btn-link {
    padding: 5px 10px 0px 0px;
    color: #95a5a6;
}

.btn-link:hover, .btn-link:focus {
    color: #2c3e50;
    text-decoration: none;
}

.glyphicon {
    top: 0px;
}

.form-control {
  border-radius: 0px;
}

	</style>
	<script type="text/javascript">
		/* #####################################################################
   #
   #   Project       : Modal Login with jQuery Effects
   #   Author        : Rodrigo Amarante (rodrigockamarante)
   #   Version       : 1.0
   #   Created       : 07/29/2015
   #   Last Change   : 08/04/2015
   #
   ##################################################################### */
   
$(function() {
    
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("form").submit(function () {
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
                if ($lg_username == "ERROR") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                } else {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                }
                return false;
                break;
            case "lost-form":
                var $ls_email=$('#lost_email').val();
                if ($ls_email == "ERROR") {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Send error");
                } else {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Send OK");
                }
                return false;
                break;
            case "register-form":
                var $rg_username=$('#register_username').val();
                var $rg_email=$('#register_email').val();
                var $rg_password=$('#register_password').val();
                if ($rg_username == "ERROR") {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Register error");
                } else {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", "Register OK");
                }
                return false;
                break;
            default:
                return false;
        }
        return false;
    });
    
    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
    $('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
    $('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
    $('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });
    
    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }
    
    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }
    
    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
        }, $msgShowTime);
    }
});
	</script>
</head>
<body>
	<nav class="navbar navbar-inverse" style="margin-bottom: 0px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Gia sư Online</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Mới</a></li>
      <li><a href="#">Hot</a></li> 
      <li><a href="#">Liên hệ</a></li> 
      <li><form>
      	<input type="text" placeholder="Tìm gia sư" style="margin-top:10px; width:450px; height:35px">
      </form></li>
      <li style="margin-top:10px; text-align: right;margin-left:10px; "><button type="button" class="btn btn-danger" role="button" data-toggle="modal" data-target="#login-modal">Sign in</button></li> 
      <li style="margin-top:10px; text-align: right; margin-left:10px"><button type="button" class="btn btn-primary">Sign up</button></li> 
    </ul>
  </div>
</nav>


<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<img class="img-circle" id="img_logo" src="http://myclock.esy.es/img/anh-cuoi-logo.jpg">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id="login-form">
		                <div class="modal-body">
				    		<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type your username and password.</span>
                            </div>
				    		<input id="login_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
				    		<input id="login_password" class="form-control" type="password" placeholder="Password" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
        		    	</div>
				        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>
				    	    <div>
                                <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                                <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
                            </div>
				        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
                    <form id="lost-form" style="display:none;">
    	    		    <div class="modal-body">
		    				<div id="div-lost-msg">
                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-lost-msg">Type your e-mail.</span>
                            </div>
		    				<input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                            </div>
                            <div>
                                <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                                <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Lost Password Form -->
                    
                    <!-- Begin | Register Form -->
                    <form id="register-form" style="display:none;">
            		    <div class="modal-body">
		    				<div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Register an account.</span>
                            </div>
		    				<input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
                            <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                            <input id="register_password" class="form-control" type="password" placeholder="Password" required>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                            </div>
                            <div>
                                <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                                <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
	</div>
    <!-- END # MODAL LOGIN -->
    <div class="container">
          <div class="row">
            <div class="col-*-*"></div>
          </div>
          <div class="row">
            <div class="col-*-*"></div>
            <div class="col-*-*"></div>
            <div class="col-*-*"></div>
          </div>
    </div>
<div class="container-fluid" style="min-height: 800px; background-color: #1abc9c">
	<div class="row" style="color:#ffffff">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-4" >
                    <section style="padding-top: 10px">
                        <img src="img/thanh_profile.jpg" width="25%" height="25%">
                    </section>
                    <hr>
                    <section>
                        Ngày sinh: 16/11/1995
                    </section>
                    <hr>
                    <section>
                        Quê quán: Hà nội
                    </section>
                </div>
                <div class="col-sm-8" style="font-size: 25px; padding-top: 10px">
                    <section>
                        <h3>Chuyên dạy các môn</h3>
                        <p>Toán, Hóa, Sinh, Lý lớp 6-9</p>
                    </section>
                </div>
            </div>    

            <hr>

            <div class="row">
                <div class="col-sm-4" >
                    <section style="padding-top: 10px">
                        <img src="img/thuat_profile.png" width="25%" height="25%">
                    </section>
                    <hr>
                    <section>
                        Ngày sinh: 06/05/1996
                    </section>
                    <hr>
                    <section>
                        Quê quán: Mê Linh
                    </section>
                </div>
                <div class="col-sm-8" style="font-size: 25px; padding-top: 10px">
                    <section>
                        <h3>Mô tả bản thân</h3>
                        <p>Sát gái</p>
                    </section>
                </div>
            </div>    

            <hr>

            <div class="row">
                <div class="col-sm-4" >
                    <section style="padding-top: 10px">
                        <img src="img/hong_profile.jpg" width="25%" height="25%">
                    </section>
                    <hr>
                    <section>
                        Ngày sinh: 09/10/l 996
                    </section>
                    <hr>
                    <section>
                        Quê quán: Hà Đông
                    </section>
                </div>
                <div class="col-sm-8" style="font-size: 25px; padding-top: 10px">
                    <section>
                        <h3>Trình độ học vấn</h3>
                        <p>Sinh viên năm 3</p>
                    </section>
                </div>
            </div>  

            <hr>


        </div>
        <div class="col-sm-3" style="color:#000000; padding-top: 10px">
            <div style="width:100%; height:300px; background-color: #ffffff; border-radius: 20px">
                <div style="color:blue; font-size: 25px; text-align: center;background-color: yellow; border-radius: 20px;margin-bottom: 20px"> Tìm theo </div>
                <form>
                    <div class = "row" >
                        <div class="col-sm-6" style="text-align: center">
                            Môn học    
                        </div>
                        <div class="col-sm-6">
                            <select>
                              <option value="">Toán</option>
                              <option value="">Lý</option>
                              <option value="">Hóa</option>
                              <option value="">Văn</option>
                            </select>        
                        </div>
                        
                    </div>

                    <div class = "row" >
                        <div class="col-sm-6" style="text-align: center">
                            Khối    
                        </div>
                        <div class="col-sm-6">
                            <select>
                              <option value="">6</option>
                              <option value="">7</option>
                              <option value="">9</option>
                              <option value="">10</option>
                              <option value="">11</option>
                              <option value="">12</option>
                            </select>        
                        </div>
                        
                    </div>
                    <hr>
                    <div style="padding-left: 10px">
                        <input type="submit" value="Search" name="">      
                    </div>
                   
                </form>
            </div>
            <div style="background-color: #ffffff; width:100%; height:100px; border-radius: 20px; margin-top: 20px">
                <div style="color:blue; font-size: 25px; text-align: center;background-color: yellow; border-radius: 20px;margin-bottom: 20px"> Hotline </div>
                <div style="color:blue;text-align: center;font-size: 30px">1900 2535</div>
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <ul class="pagination">
            <li><a href="#">pre</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li class="disabled"><a href="#">...</a></li>
            <li><a href="#">100</a></li>
            <li><a href="#">next</a></li>
        </ul>
    </div>
</div>
<div class="container-fluid" style="background-color: #000000;text-align: center; font-size: 25px;color: #ffffff; height: 100px; line-height: 100px">
    Created By Lien
</div>
</body>
</html>