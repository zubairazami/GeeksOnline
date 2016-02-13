<!DOCTYPE HTML>
<html>
    
    <head>
        <title>Geeks Online</title>
        <link href="/ip/css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src = "/ip/js/signupvalidation.js"></script>
    </head>

    <body>
        
    <div id = "wholesection" >

        <div id = "top" >  
            
            <div id="topLogo">
               <img src="images/logo.png" height = "59px"> 
           </div>
           
            <div id = "loginregister">

                    <table id = "logintable" cellspacing ="5" cellpadding ="5">

                        <tr>
                            <td><a href="/ip/signin.php">Sign in</a></td>
                            <td><a href="/ip/signup.php">Sign up</a><td>
                        </tr>
                    </table>
            </div>
        </div>

        <div id = "middlebody" >
                
                <div id = "leftbody">
                    <img src="/ip/images/g.png" width = "400px" height = "350px">
                </div>
                <!--  -->
                <div id = "signupdiv">
                        <form id = "signupform" name="signupform"  onsubmit=" return validateForm()" action ='/ip/signup.php'  method = 'POST'>    

                            <table id = "signupformtable" >

                                <tr>
                                    <td align = "center" colspan = "5"> <h1> Sign Up </h1> </td>
                                </tr>
                                <tr>
                                    <td align = "center" colspan = "2"> <span id = "textofform">Username : </span> </td>
                                    <td align = "left" colspan = "3" ><input type='text' id="inputfield" name="username" required/></td>
                                </tr>
                                <tr>
                                    <td align = "center" colspan = "2"> <span id = "textofform">Email : </span> </td>
                                    <td align = "left"  colspan = "3" ><input type="email" id="inputfield" name="mail" x-moz-errormessage="This is not a valid e-mail" required/></td>
                                </tr>   
                                <tr>
                                    <td align = "center" colspan = "2"> <span id = "textofform"> Password : </span> </td>
                                    <td align = "left" colspan = "3" ><input type='password' id="inputfield"  name="password" required/></td>
                                </tr>

                                <tr>
                                    <td align = "center" colspan = "2"> <span id = "textofform">Re-Enter Password : </span> </td>
                                    <td align = "left"  colspan = "3" ><input type='password' id="inputfield" name="retypepassword" required/></td>
                                </tr>

                                <tr>
                                    <td align = "center" colspan = "2"> <span id = "textofform"> Date of Birth : </span> </td>
                                     <td >
                                        
                                        <input type = 'date' id = "birthdaydropdown" name = "dateofbirth"  required>
                                    </td>
                                </tr>

                                <tr>
                                    <td align = "center" colspan = "2"> <span id = "textofform">Sex : </span> </td>
                                    
                                    <td colspan = "3" >
                                        <div id = "sexdivmale">
                                            <input type= "radio" id= "male" name = "sex" value = "male" required/> 
                                            <label for= "male">Male</label>
                                        </div>
                                        <div id = "sexdivfemale">
                                            <input type= "radio" id= "female" name = "sex" value = "female" required/> 
                                            <label for= "female">Female</label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td align = "center" colspan = "2"> <span id = "textofform">Occupation : </span> </td>
                                    <td align = "left" colspan colspan = "3" ><input type='text' id="inputfield" name = "occupation" required/></td>
                                </tr>


                                <tr>
                                    <td align = "center" colspan = "2"> <span id = "textofform">Country :  </span> </td>
                                    <td align = "left" colspan colspan = "3" >
                                        <select id="inputfielddropdownmenu" name="country" required> 
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antartica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo">Congo, the Democratic Republic of the</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                            <option value="Croatia">Croatia (Hrvatska)</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="France Metropolitan">France, Metropolitan</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                            <option value="Holy See">Holy See (Vatican City State)</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran (Islamic Republic of)</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                            <option value="Korea">Korea, Republic of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao">Lao People's Democratic Republic</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon" selected>Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia">Micronesia, Federated States of</option>
                                            <option value="Moldova">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                            <option value="Saint LUCIA">Saint LUCIA</option>
                                            <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                            <option value="Span">Spain</option>
                                            <option value="SriLanka">Sri Lanka</option>
                                            <option value="St. Helena">St. Helena</option>
                                            <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan, Province of China</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania, United Republic of</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Viet Nam</option>
                                            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                            <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                            <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Yugoslavia">Yugoslavia</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <input type = "submit" id = "signupbutton"  name = "sign_up" value = "Register" > 
                        </form>


                        
                </div>
        </div>
         <div id = "footer">
                <hr>
                <p>Copyright : Zubair Azami Badhon</p>
        </div>
    </div>    
       
    </body>
</html>


<!-- _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ start of base php coding _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _   -->


<?php  

    require 'connect.php';
    if(isset($_POST['sign_up']) && !empty($_POST['sign_up']))
    {
    
        $username = htmlentities($_POST['username']);
        $mail = htmlentities($_POST['mail']);
        $password = htmlentities($_POST['password']);
        $retypepassword =htmlentities( $_POST['retypepassword']);
        $dateofbirth = htmlentities($_POST['dateofbirth']);
        $sex = htmlentities($_POST['sex']);
        $occupation =htmlentities( $_POST['occupation']);
        $country =htmlentities( $_POST['country']);
        $userid  = '-1';
        
        if($password==$retypepassword)
          {
            
            $password = md5($password);

            $query1 = "INSERT INTO  `geeksonline`.`login` (`username` ,`email` ,`password`)VALUES ('$username',  '$mail',  '$password')";
            
            if($query_run1=mysql_query($query1))
            {
                $query2 = "SELECT `userid` FROM  `login` where `username`='$username'";
                
                if($queryrun2 = mysql_query($query2))
                {
                    while($query_row=mysql_fetch_assoc($queryrun2))
                        {
                                $userid=$query_row['userid'];
                        }
                }
                else
                {
                     $errorno = mysql_errno();
                     $errormessage = mysql_error();
                     echo '<script type="text/javascript"> alert("Error ('.$errorno.') : '.$errormessage.'"); </script>';
                }
                
                $query3 = "INSERT INTO  `geeksonline`.`userprofile` (`username` ,`userid` ,`rating` ,`photolink` ,`dateofbirth` ,`sex` ,`occupation` ,`country`)
                VALUES ('$username',  '$userid',  '0',  'not updated yet',  '$dateofbirth',  '$sex',  '$occupation',  '$country')";
                
                if($queryrun3=mysql_query($query3))
                {
                    echo '<script type="text/javascript"> alert("Registration Successful"); </script>';
                }
                else
                {
                    $errorno = mysql_errno();
                    $errormessage = mysql_error();
                    echo '<script type="text/javascript"> alert("Error ('.$errorno.') : '.$errormessage.'"); </script>';
                }
            }
            else
            {
                $errorno = mysql_errno();
                $errormessage = mysql_error();
                echo '<script type="text/javascript"> alert("Error ('.$errorno.') : '.$errormessage.'"); </script>';
            }
          }
        else
        {
            echo '<script type="text/javascript"> alert("Password is not same"); </script>';
            
        }    
    }
    else
    {

    }
?>













    
