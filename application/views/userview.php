<!DOCTYPE html>

<html>
    <head>
    
    <meta charset="utf-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>99Friday Task</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <style>
            body {
                font-family:tahoma;
                font-size:12px;
                padding-top:15px;
            }

            #signup-step {
                margin:auto;
                padding:0;
                width:50%
            }

            #signup-step li {
                list-style:none; 
                float:left;
                padding:5px 10px;
                border-top:#000 1px solid;
                border-left:#000 1px solid;
                border-right:#000 1px solid;
                border-radius:5px 5px 0 0;
            }
            .loaderdiv{
              position: fixed; left: 0; top: 0; z-index: 999; width: 100%; height: 100%; overflow: visible; background: #333 ;opacity: 0.5;
              }
          .loader {
          margin: 0px auto;
            margin-top: 21%;
}
            .active {
                color:#FFF;
            }

            #signup-step li.active {
                background-color:#000;
            }

            #signup-form {
                clear:both;
                box-shadow:0 0 5px #000;
                padding:20px;
                width:50%;
                margin:auto;
            }

            .demoInputBox {
                padding: 10px;
                border: #CDCDCD 1px solid;
                border-radius: 4px;
                background-color: #FFF;
                width: 70%;
                margin-bottom:20px;
            }

            .signup-error {
                color:#FF0000; 
                padding-left:15px;
            }

            .message {
                color: #00FF00;
                font-weight: bold;
                width: 100%;
                padding: 10;
            }

            .btnAction {
                padding: 5px 10px;
                background-color: #F00;
                border: 0;
                color: #FFF;
                cursor: pointer;
                margin-top:15px;
            }

            label {
                line-height:35px;
            }

        </style>

        
    </head>
    <body>
    <div class="loaderdiv" style="display:none" id="loading"><div class="loader" ></div></div>
        <ul id="signup-step">
            <li id="personal" class="active">Personal</li>
            <li id="contact">Contact</li>
            <li id="photo">Photo</li>
        </ul>

        <?php
        if (isset($success)) {
            echo '<div class="success">User record inserted successfully</div>';
        }

        $attributes = array('name' => 'frmRegistration', 'id' => 'signup-form','autocomplete'=>'on');
        echo form_open_multipart($this->uri->uri_string(), $attributes);
        ?>
        <div id="personal-field">
            <div>
            <input type="text" name="name" id="name" class="demoInputBox" placeholder="First Name" onkeyup='saveValue(this);' />
            <span id="name-error" class="signup-error"></span>
           </div>
           <div>
            <input type="text" name="surname" id="surname" class="demoInputBox" placeholder="Last Name" onkeyup='saveValue(this);'/>
        </div>
        <div>
            <input type="date" name="dob" id="dob" class="demoInputBox" placeholder="Date of Birth" onkeyup='saveValue(this);'/>
            <span id="dob-error" class="signup-error"></span>
        </div>
        <div>
            <input type="text" name="age" id="age" class="demoInputBox" placeholder="Age" onkeyup='saveValue(this);'/>
        </div>
        <div>
            <input type="text" name="education" id="education" class="demoInputBox" placeholder="Education" onkeyup='saveValue(this);'/>
            <span id="edu-error" class="signup-error"></span>
        </div>
        <div>
            <input type="text" name="skills" id="skills" class="demoInputBox" placeholder="Skills" onkeyup='saveValue(this);'/>
            
        </div>
        <div>
            <input type="text" name="experience" id="experience" class="demoInputBox" placeholder="Experience" onkeyup='saveValue(this);'/>
            
        </div>
        <div>
            <input type="text" name="hobbies" id="hobbies" class="demoInputBox" placeholder="Hobby" onkeyup='saveValue(this);'/>
            
        </div>
        <div>
            <input type="text" name="strength" id="strength" class="demoInputBox" placeholder="Strength" onkeyup='saveValue(this);'/>
            
        </div>
        <div>
            <input type="text" name="weekness" id="weekness" class="demoInputBox" placeholder="Weekness" onkeyup='saveValue(this);'/>
            
        </div>
            
        </div>

        <div id="contact-field" style="display:none;">
        <label>Enter Usrname</label><span id="username-error" class="signup-error"></span>
            <div><input type="text" name="username" id="username" class="demoInputBox" /></div>
            <label>Enter Password</label><span id="password-error" class="signup-error"></span>
            <div><input type="password" name="password" id="user-password" class="demoInputBox" /></div>
            <label>Re-enter Password</label><span id="confirm-password-error" class="signup-error"></span>
            <div><input type="password" name="confirm-password" id="confirm-password" class="demoInputBox" /></div>
            <div>
                <select name="gender" id="gender" class="demoInputBox">
                    <option value="male">Male</option>
                    <option value="female">Female</option>                                                                         
                </select>
            </div>
            <label>Phone</label><span id="phone-error" class="signup-error"></span>
            <div><input type="text" name="phone" id="phone" class="demoInputBox" /></div>
            <label>Whatsapp</label>
            <div><input type="text" name="whatsapp" id="whatsapp" class="demoInputBox" /></div>
            <label>Email</label><span id="email-error" class="signup-error"></span>
            <div><input type="text" name="email" id="email" class="demoInputBox" /></div>
            <label>Address</label><span id="address-error" class="signup-error"></span>
            <div><textarea name="address" id="address" class="demoInputBox" rows="5" cols="50"></textarea></div>
        </div>

        <div id="photo-field" style="display:none;">
        <label>Add Photo</label><span id="photo-error" class="signup-error"></span>
        <input type="file" class="demoInputBox" id="fileupload"  name="image"   onchange="readURL(this)" >
        <input type="button" value="delete FIle" id="deleteimage" style="display:none"/>
                        <div id="dvPreview" style="margin:10px">
                        <img id="blah" src="#" alt="your image" />
                        </div>
        </div>

        <div>
            <input class="btn btn-warning" type="button" name="back" id="back" value="Back" style="display:none;">
            <input class="btn btn-success" type="button" name="next" id="next" value="Next" >
            <input class="btn btn-success" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
        </div>
        <?php echo form_close(); ?>

        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

        <script>

        document.getElementById("name").value = getSavedValue("name");    // set the value to this input
        document.getElementById("surname").value = getSavedValue("surname");
        document.getElementById("dob").value = getSavedValue("dob");
        document.getElementById("age").value = getSavedValue("age");
        document.getElementById("education").value = getSavedValue("education");
        document.getElementById("experience").value = getSavedValue("experience");
        document.getElementById("strength").value = getSavedValue("strength");
        document.getElementById("skills").value = getSavedValue("skills");
        document.getElementById("weekness").value = getSavedValue("weekness");
        document.getElementById("hobbies").value = getSavedValue("hobbies");

function readURL(input) {
    
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(100);
                    $("#deleteimage").attr("style", "display:block");
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#deleteimage").click(function() {
    $("#fileupload").val('');
    
    $('#blah').attr('src', '');
    });

    function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }

            function validate() {
                var output = true;
                $(".signup-error").html('');

                if ($("#personal-field").css('display') != 'none') {
                    if (!($("#name").val())) {
                        output = false;
                        $("#name-error").html("Name required!");
                    }

                    if (!($("#dob").val())) {
                        output = false;
                        $("#dob-error").html("Date of Birth required!");
                    }
                    if (!($("#education").val())) {
                        output = false;
                        $("#edu-error").html("Education required!");
                    }
                }

                if ($("#contact-field").css('display') != 'none') {

                    if (!($("#username").val())) {
                        output = false;
                        $("#username-error").html("Username required!");
                    }
                    if (!($("#user-password").val())) {
                        output = false;
                        $("#password-error").html("Password required!");
                    }

                    if (!($("#confirm-password").val())) {
                        output = false;
                        $("#confirm-password-error").html("Confirm password required!");
                    }

                    if ($("#user-password").val() != $("#confirm-password").val()) {
                        output = false;
                        $("#confirm-password-error").html("Password not matched!");
                    }
                }

                if ($("#photo-field").css('display') != 'none') {
                    if (!($("#fileupload").val())) {
                        output = false;
                        $("#photo-error").html("Photo required!"); 
                } 
                }

                return output;
            }

            $(document).ready(function () {
                function de() {
               $("#deleteimage").attr("style", "display:none");
}

                $("#next").click(function () {
                    var output = validate();
                    if (output === true) {
                        var current = $(".active");
                        var next = $(".active").next("li");
                        if (next.length > 0) {
                            $("#" + current.attr("id") + "-field").hide();
                            $("#" + next.attr("id") + "-field").show();
                            $("#back").show();
                            $("#finish").hide();
                            $(".active").removeClass("active");
                            next.addClass("active");
                            if ($(".active").attr("id") == $("li").last().attr("id")) {
                                $("#next").hide();
                                $("#finish").show();
                            }
                        }
                    }
                });


                $("#back").click(function () {
                    var current = $(".active");
                    var prev = $(".active").prev("li");
                    if (prev.length > 0) {
                        $("#" + current.attr("id") + "-field").hide();
                        $("#" + prev.attr("id") + "-field").show();
                        $("#next").show();
                        $("#finish").hide();
                        $(".active").removeClass("active");
                        prev.addClass("active");
                        if ($(".active").attr("id") == $("li").first().attr("id")) {
                            $("#back").hide();
                        }
                    }
                });

                $("input#finish").click(function (e) {
                    var output = validate();
                    var current = $(".active");

                    if (output === true) {
                        $('#loading').show();
                        return true;
                    } else {
                        //prevent refresh
                        e.preventDefault();
                        $("#" + current.attr("id") + "-field").show();
                        $("#back").show();
                        $("#finish").show();
                    }
                });
            });
        </script>


    </body>
</html>