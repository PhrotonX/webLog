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
                <label for="signup-birthyear">Birth year:</label>
            </td>
            <td>
                {{-- <select id="signup-birthyear" name="signup-birthyear">
                    <option selected disabled hidden>Year</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                    <option value="1990">1990</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1987">1987</option>
                    <option value="1986">1986</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1983">1983</option>
                    <option value="1982">1982</option>
                    <option value="1981">1981</option>
                    <option value="1980">1980</option>
                    <option value="1979">1979</option>
                    <option value="1978">1978</option>
                    <option value="1977">1977</option>
                    <option value="1976">1976</option>
                    <option value="1975">1975</option>
                    <option value="1974">1974</option>
                    <option value="1973">1973</option>
                    <option value="1972">1972</option>
                    <option value="1971">1971</option>
                    <option value="1970">1970</option>
                    <option value="1969">1969</option>
                    <option value="1968">1968</option>
                    <option value="1967">1967</option>
                    <option value="1966">1966</option>
                    <option value="1965">1965</option>
                    <option value="1964">1964</option>
                    <option value="1963">1963</option>
                    <option value="1962">1962</option>
                    <option value="1961">1961</option>
                    <option value="1960">1960</option>
                    <option value="1959">1959</option>
                    <option value="1958">1958</option>
                    <option value="1957">1957</option>
                    <option value="1956">1956</option>
                    <option value="1955">1955</option>
                    <option value="1954">1954</option>
                    <option value="1953">1953</option>
                    <option value="1952">1952</option>
                    <option value="1951">1951</option>
                    <option value="1950">1950</option>
                    <option value="1949">1949</option>
                    <option value="1948">1948</option>
                    <option value="1947">1947</option>
                    <option value="1948">1946</option>
                    <option value="1945">1945</option>
                    <option value="1944">1944</option>
                    <option value="1943">1943</option>
                    <option value="1942">1942</option>
                    <option value="1941">1941</option>
                    <option value="1940">1940</option>
                    <option value="1939">1939</option>
                    <option value="1938">1938</option>
                    <option value="1937">1937</option>
                    <option value="1936">1936</option>
                    <option value="1935">1935</option>
                    <option value="1934">1934</option>
                    <option value="1933">1933</option>
                    <option value="1932">1932</option>
                    <option value="1931">1931</option>
                    <option value="1930">1930</option>
                    <option value="1929">1929</option>
                    <option value="1928">1928</option>
                    <option value="1927">1927</option>
                    <option value="1928">1926</option>
                    <option value="1925">1925</option>
                    <option value="1924">1924</option>
                    <option value="1923">1923</option>
                    <option value="1922">1922</option>
                    <option value="1921">1921</option>
                    <option value="1920">1920</option>
                    <option value="1919">1919</option>
                    <option value="1918">1918</option>
                    <option value="1917">1917</option>
                    <option value="1916">1916</option>
                    <option value="1915">1915</option>
                    <option value="1914">1914</option>
                    <option value="1913">1913</option>
                    <option value="1912">1912</option>
                    <option value="1911">1911</option>
                    <option value="1910">1910</option>
                    <option value="1909">1909</option>
                    <option value="1908">1908</option>
                    <option value="1907">1907</option>
                    <option value="1906">1906</option>
                    <option value="1905">1905</option>
                    <option value="1904">1904</option>
                    <option value="1903">1903</option>
                    <option value="1902">1902</option>
                    <option value="1901">1901</option>
                    <option value="1900">1900</option>
                    <option value="1899">1899</option>
                    <option value="1898">1898</option>
                    <option value="1897">1897</option>
                    <option value="1896">1896</option>
                    <option value="1895">1895</option>
                    <option value="1894">1894</option>
                    <option value="1893">1893</option>
                    <option value="1892">1892</option>
                    <option value="1891">1891</option>
                    <option value="1890">1890</option>
                    <option value="1889">1889</option>
                    <option value="1888">1888</option>
                    <option value="1887">1887</option>
                    <option value="1886">1886</option>
                    <option value="1885">1885</option>
                    <option value="1884">1884</option>
                    <option value="1883">1883</option>
                    <option value="1882">1882</option>
                    <option value="1881">1881</option>
                    <option value="1880">1880</option>
                    <option value="1879">1879</option>
                    <option value="1878">1878</option>
                    <option value="1877">1877</option>
                    <option value="1876">1876</option>
                    <option value="1875">1875</option>
                    <option value="1874">1874</option>
                    <option value="1873">1873</option>
                    <option value="1872">1872</option>
                    <option value="1871">1871</option>
                    <option value="1870">1870</option>
                    <option value="1869">1869</option>
                    <option value="1868">1868</option>
                    <option value="1867">1867</option>
                    <option value="1866">1866</option>
                    <option value="1865">1865</option>
                    <option value="1864">1864</option>
                    <option value="1863">1863</option>
                    <option value="1862">1862</option>
                    <option value="1861">1861</option>
                    <option value="1860">1860</option>
                </select> --}}
                <select id="signup-birthyear" name="signup-birthyear">

                </select>
                <script>
                    
                    
                </script>
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