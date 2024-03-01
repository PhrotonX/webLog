@extends('layout.master')

@section('content')
@section('title', 'Sign Up')

<h1>Sign Up</h1>

<script src="{{asset('js/src/months.js')}}"></script>

<form method="post" action="{{route('user.store')}}" name="signup-form" autocomplete="on">
    @csrf
    @method("POST")
    <table class="form-table">
        <colgroup>
            <col class="form-table-label"/>
            <col class="form-table-field"/>
        </colgroup>
        <tr>
            <td>
                <label for="signup-username">Username:</label>
            </td>
            <td>
                <input class="input-text" type="text" name="signup-username" id="signup-username" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="signup-handle">Handle:</label>
            </td>
            <td>
                <input class="input-text" type="text" name="signup-handle" id="signup-handle"
                placeholder="@ sign is added automatically" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="signup-email">Email Address:</label>
            </td>
            <td>
                <input class="input-text" type="text" name="signup-email" id="signup-email"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="signup-password">Password:</label>
            </td>
            <td>
                <input class="input-text" type="password" name="signup-password" id="signup-password" required/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Name:</label>
            </td>
            <td>
                <input class="input-text" type="text" name="signup-firstname" id="signup-firstname" placeholder="First Name"/>
                <input class="input-text" type="text" name="signup-middlename" id="signup-middlename" placeholder="Middle Name"/>
                <input class="input-text" type="text" name="signup-lastname" id="signup-lastname" placeholder="Last Name"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="signup-country">Country or Dependency:</label>
            </td>
            <td>
                <select id="signup-country" name="signup-country" required>
                    <option selected disabled hidden>Choose a country...</option>
                    <option>Abkhazia</option>
                    <option>Afghanistan</option>
                    <option>Akrotiri and Dhekelia (United Kingdom)</option>
                    <option>&#197;land (Finland)</option>
                    <option>Albania</option>
                    <option>Algeria</option>
                    <option>American Samoa (United States)</option>
                    <option>Andorra</option>
                    <option>Angola</option>
                    <option>Anguilla (United Kingdom)</option>
                    <option>Antarctica</option>
                    <option>Antigua and Barbuda</option>
                    <option>Argentina</option>
                    <option>Armenia</option>
                    <option>Artsakh</option>
                    <option>Aruba (Netherlands)</option>
                    <option>Ashmore and Cartier islands (Australia)</option>
                    <option>Australia</option>
                    <option>Austria</option>
                    <option>Azerbaijan</option>
                    <option>Bahamas</option>
                    <option>Bahrain</option>
                    <option>Bangladesh</option>
                    <option>Barbados</option>
                    <option>Belarus</option>
                    <option>Belgium</option>
                    <option>Belize</option>
                    <option>Benin</option>
                    <option>Bermuda (United Kingdom)</option>
                    <option>Bhutan</option>
                    <option>Bir Tawil (terra nullius)</option>
                    <option>Bolivia</option>
                    <option>Bonaire (Netherlands)</option>
                    <option>Bosnia and Herzegovina</option>
                    <option>Botswana</option>
                    <option>Bouvet Islands (Norway)</option>
                    <option>Brazil</option>
                    <option>British Indian Ocean Territory (United Kingdom)</option>
                    <option>British Virgin Islands (United Kingdom)</option>
                    <option>Brunei</option>
                    <option>Bulgaria</option>
                    <option>Burkina Faso</option>
                    <option>Burundi</option>
                    <option>Cambodia</option>
                    <option>Cameroon</option>
                    <option>Canada</option>
                    <option>Cape Verde</option>
                    <option>Cayman Islands (United Kindom)</option>
                    <option>Central African Republic</option>
                    <option>Chad</option>
                    <option>Chile</option>
                    <option>China</option>
                    <option>Christmas Islands (Australia)</option>
                    <option>Clipperton Island (France)</option>
                    <option>Cocos (Keeling Islands) (Australia)</option>
                    <option>Colombia</option>
                    <option>Comoros</option>
                    <option>Congo (Republic of)</option>
                    <option>Cook Islands (New Zealand)</option>
                    <option>Coral Sea Islands (Australia)</option>
                    <option>Costa Rica</option>
                    <option>Croatia</option>
                    <option>Cuba</option>
                    <option>Cura&#231;ao (Netherlands)</option>
                    <option>Cyprus</option>
                    <option>Czech Republic</option>
                    <option>Democratic Republic of Congo</option>
                    <option>Denmark</option>
                    <option>Djibouti</option>
                    <option>Dominica</option>
                    <option>Dominican Republic</option>
                    <option>Donetsk</option>
                    <option>East Timor</option>
                    <option>Ecuador</option>
                    <option>Egypt</option>
                    <option>El Salvador</option>
                    <option>Equatorial Guinea</option>
                    <option>Eritrea</option>
                    <option>Estonia</option>
                    <option>Eswatini</option>
                    <option>Ethiopia</option>
                    <option>Falkland Islands (United Kingdom)</option>
                    <option>Faroe Isalnds (Denmark)</option>
                    <option>Fiji</option>
                    <option>Finland</option>
                    <option>France</option>
                    <option>French Polynesia (France)</option>
                    <option>French Guiana</option>
                    <option>French Southern Territories (France)</option>
                    <option>Gabon</option>
                    <option>Gambia</option>
                    <option>Georgia</option>
                    <option>Germany</option>
                    <option>Ghana</option>
                    <option>Gibraltar (United Kingdom)</option>
                    <option>Greece</option>
                    <option>Greenland (Denmark)</option>
                    <option>Guam (United States)</option>
                    <option>Guatemala</option>
                    <option>Guernsey (British Crown dependency)</option>
                    <option>Guinea</option>
                    <option>Guine-Bissau</option>
                    <option>Guyana</option>
                    <option>Haiti</option>
                    <option>Heard Island and McDonald Islands (Australia)</option>
                    <option>Honduras</option>
                    <option>Hong Kong SAR (China)</option>
                    <option>Hungary</option>
                    <option>Iceland</option>
                    <option>India</option>
                    <option>Indonesia</option>
                    <option>Iran</option>
                    <option>Iraq</option>
                    <option>Ireland</option>
                    <option>Isle of Man (British Crown Dependency)</option>
                    <option>Israel</option>
                    <option>Italy</option>
                    <option>Ivory Coast</option>
                    <option>Jamaica</option>
                    <option>Jan Mayen (Norway)</option>
                    <option>Japan</option>
                    <option>Jersey (British Crown Dependency)</option>
                    <option>Jordan</option>
                    <option>Kazakhstan</option>
                    <option>Kenya</option>
                    <option>Kiribati</option>
                    <option>Kosovo (Serbia)</option>
                    <option>Kuwait</option>
                    <option>Kyrgyzstan</option>
                    <option>Laos</option>
                    <option>Latvia</option>
                    <option>Lebanon</option>
                    <option>Lesotho</option>
                    <option>Liberia</option>
                    <option>Libya</option>
                    <option>Liechtenstein</option>
                    <option>Lithuania</option>
                    <option>Luhansk</option>
                    <option>Luxembourg</option>
                    <option>Macau (China)</option>
                    <option>Madagascar</option>
                    <option>Malawi</option>
                    <option>Malaysia</option>
                    <option>Maldives</option>
                    <option>Mali</option>
                    <option>Malta</option>
                    <option>Marshall Islands</option>
                    <option>Mauritius</option>
                    <option>Mexico</option>
                    <option>Micronesia</option>
                    <option>Moldova</option>
                    <option>Monaco</option>
                    <option>Mongolia</option>
                    <option>Montenegro</option>
                    <option>Montserrat (United Kingdom)</option>
                    <option>Morocco</option>
                    <option>Mozambique</option>
                    <option>Myanmar</option>
                    <option>Namibia</option>
                    <option>Nauru</option>
                    <option>Nepal</option>
                    <option>Netherlands</option>
                    <option>New Caledonia</option>
                    <option>New Zealand</option>
                    <option>Nicaragua</option>
                    <option>Niger</option>
                    <option>Nigeria</option>
                    <option>Niue (New Zealand)</option>
                    <option>Nortfolk Islands (Australia)</option>
                    <option>North Korea</option>
                    <option>North Macedonia</option>
                    <option>Northern Cyprus</option>
                    <option>North Mariania Islands (United States)</option>
                    <option>Norway</option>
                    <option>Oman</option>
                    <option>Pakistan</option>
                    <option>Palau</option>
                    <option>Palestine</option>
                    <option>Panama</option>
                    <option>Papua New Guinea</option>
                    <option>Paraguay</option>
                    <option>Peru</option>
                    <option>Philippines</option>
                    <option>Pitcarin Islands (United Kingdom)</option>
                    <option>Poland</option>
                    <option>Portugal</option>
                    <option>Puerto Rico (United States)</option>
                    <option>Qatar</option>
                    <option>Romania</option>
                    <option>Russia</option>
                    <option>Rwanda</option>
                    <option>Saba (Netherlands)</option>
                    <option>Sahrawi Arab Democratic Republic</option>
                    <option>Saint Barth&#233;lemy (France)</option>
                    <option>Saint Helena, Ascension and Tristan da Cunha (United Kingdom)</option>
                    <option>Saint Kitts &amp; Nevis</option>
                    <option>Saint Lucia</option>
                    <option>Saint Martin (France)</option>
                    <option>Saint Pierre and Miquelon (France)</option>
                    <option>Saint Vincent and the Grenadines</option>
                    <option>Samoa</option>
                    <option>San Marino</option>
                    <option>S&#227;o Tom&#233; and Pr&#237;ncipe</option>
                    <option>Saudi Arabia</option>
                    <option>Senegal</option>
                    <option>Serbia</option>
                    <option>Seychelles</option>
                    <option>Sierra Leone</option>
                    <option>Singapore</option>
                    <option>Sint Maarten (Netherlands)</option>
                    <option>Slovakia</option>
                    <option>Slovenia</option>
                    <option>Solomon Islands</option>
                    <option>Somalia</option>
                    <option>Somaliland</option>
                    <option>South Africa</option>
                    <option>South Georgia and the South Sandwich Islands (United Kingdom)</option>
                    <option>South Korea</option>
                    <option>South Ossetia</option>
                    <option>South Sudan</option>
                    <option>Spain</option>
                    <option>Spratly Islands</option>
                    <option>Sri Lanka</option>
                    <option>Sudan</option>
                    <option>Suriname</option>
                    <option>Svalbard (Norway)</option>
                    <option>Sweden</option>
                    <option>Switzerland</option>
                    <option>Syria</option>
                    <option>Taiwan</option>
                    <option>Tajikistan</option>
                    <option>Tanzania</option>
                    <option>Thailand</option>
                    <option>Togo</option>
                    <option>Tokelau (New Zealand)</option>
                    <option>Tonga</option>
                    <option>Transnistria</option>
                    <option>Trinidad and Tobago</option>
                    <option>Tunisia</option>
                    <option>Turkey</option>
                    <option>Turkmenistan</option>
                    <option>Turks and Caicos Islands (United Kingdom)</option>
                    <option>Tuvalu</option>
                    <option>Uganda</option>
                    <option>Ukraine</option>
                    <option>United Arab Emirates</option>
                    <option>United Kingdom</option>
                    <option>United States</option>
                    <option>U.S. Virgin Islands (United States)</option>
                    <option>Uruguay</option>
                    <option>Uzbekistan</option>
                    <option>Vanuatu</option>
                    <option>Vatican City</option>
                    <option>Venezuela</option>
                    <option>Vietnam</option>
                    <option>Wallis and Futuna (France)</option>
                    <option>Yemen</option>
                    <option>Zambia</option>
                    <option>Zimbabwe</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="signup-birthyear">Birth year:</label>
            </td>
            <td>
                <select id="signup-birthyear" name="signup-birthyear">

                </select>
                <script>
                    
                    
                </script>
            </td>
        </tr>
        <tr>
            <td>
                <label for="signup-birthmonth">Birth month:</label>
            </td>
            <td>
                <select id="signup-birthmonth" name="signup-birthmonth">
                    <option selected disabled hidden>Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="signup-birthday">Birthday:</label>
                <!-- @TODO: Use JavaScript and use any technology to disable days 29, 30, and 31
                depending on month. 
            
                Disabling February 29 should be dependent on the year number (e.g. 2020 and 2024) -->
            </td>
            <td>
                <select id="signup-birthday" name="signup-birthday">
                    <option selected disabled hidden>Day</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="signup-gender">Gender:</label>
            </td>
            <td>
                <input type="radio" id="signip-gender-male" name="signup-gender" value="Male" required>
                <label for="signup-gender-male">Male</label>
                <input type="radio" id="signip-gender-female" name="signup-gender" value="Female" required>
                <label for="signup-gender-female">Female</label>
            </td>
        </tr>
        <tr>
            <td>
                <input class="small-button" type="submit" name="singup-submit">
                <input class="small-button" type="reset" name="signup-reset">
            </td>
        </tr>
    </table>
</form>

<script src="{{asset('js/src/user/create.js')}}"></script>

@stop