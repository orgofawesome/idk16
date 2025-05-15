<?php
$pageName = "BlueCity";
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- MachineID: <?= $webServerName ?> -->
        <title>ROBLOX</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="ROBLOX Corporation" />
<meta name="description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration." />
<meta name="keywords" content="free games, online games, building games, virtual worlds, free mmo, gaming cloud, physics engine" />
    <meta property="og:site_name" content="ROBLOX" />
    <meta property="og:title" content="ROBLOX" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $requestUrl ?>" />
    <meta property="og:description" content="ROBLOX is powered by a growing community of over 300,000 creators who produce an infinite variety of highly immersive experiences. These experiences range from 3D multiplayer games and competitions, to interactive adventures where friends can take on new personas imagining what it would be like to be a dinosaur, a miner in a quarry or an astronaut on a space exploration."/>
    <meta property="og:image" content="https://images.idk18.xyz/fb70fd2b56107a0d43f2f98658885702.jpg" />

        
<link rel='stylesheet' href='https://static.idk18.xyz/css/reset___90041b2af2fb6b9b7864ee66001ba812_m.css/fetch' />

        
<link rel='stylesheet' href='https://static.idk18.xyz/css/MainCSS___58dd044044005dc0e887c80110c9a567_m.css/fetch' />

        
<link rel='stylesheet' href='https://static.idk18.xyz/css/page___b18df6d07e41619a4b45c94729ef7656_m.css/fetch' />

        <script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-1.11.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js'></script>
<script type='text/javascript'>window.jQuery || document.write("<script type='text/javascript' src='/js/jquery/jquery-migrate-1.2.1.js'><\/script>")</script>
<script type='text/javascript' src='//ajax.aspnetcdn.com/ajax/4.0/1/MicrosoftAjax.js'></script>
<script type='text/javascript'>window.Sys || document.write("<script type='text/javascript' src='/js/Microsoft/MicrosoftAjax.js'><\/script>")</script>

<?php require_once("../includes/googleanalytics.php"); ?>


    <script type="text/javascript">function urchinTracker() {}</script>

        
        <script type='text/javascript' src='https://js.idk18.xyz/86411e39f51e0ef39c7fa2f1f92fe7b3.js'></script>

        <script type='text/javascript' src='https://js.idk18.xyz/5baed24247b56734ab05cc2d2b54d4cd.js'></script>


            <link href="https://images.idk18.xyz/7aee41db80c1071f60377c3575a0ed87.ico" rel="icon" />
        

        

                <?php require_once("../includes/eventstreaminit.php"); ?>



<script type="text/javascript">
    if (Roblox && Roblox.PageHeartbeatEvent) {
        Roblox.PageHeartbeatEvent.Init([2,8,20,60]);
    }
</script>        <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
Roblox.Endpoints.Urls['/api/item.ashx'] = 'https://www.<?= $domain ?>/api/item.ashx';
Roblox.Endpoints.Urls['/asset/'] = 'https://assetgame.<?= $domain ?>/asset/';
Roblox.Endpoints.Urls['/client-status/set'] = 'https://www.<?= $domain ?>/client-status/set';
Roblox.Endpoints.Urls['/client-status'] = 'https://www.<?= $domain ?>/client-status';
Roblox.Endpoints.Urls['/game/'] = 'https://assetgame.<?= $domain ?>/game/';
Roblox.Endpoints.Urls['/game-auth/getauthticket'] = 'https://www.<?= $domain ?>/game-auth/getauthticket';
Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.<?= $domain ?>/game/edit.ashx';
Roblox.Endpoints.Urls['/game/getauthticket'] = 'https://assetgame.<?= $domain ?>/game/getauthticket';
Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.<?= $domain ?>/game/placelauncher.ashx';
Roblox.Endpoints.Urls['/game/preloader'] = 'https://assetgame.<?= $domain ?>/game/preloader';
Roblox.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.<?= $domain ?>/game/report-stats';
Roblox.Endpoints.Urls['/game/report-event'] = 'https://assetgame.<?= $domain ?>/game/report-event';
Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'https://assetgame.<?= $domain ?>/game/updateprerollcount';
Roblox.Endpoints.Urls['/login/default.aspx'] = 'https://www.<?= $domain ?>/login/default.aspx';
Roblox.Endpoints.Urls['/my/character.aspx'] = 'https://www.<?= $domain ?>/my/character.aspx';
Roblox.Endpoints.Urls['/my/money.aspx'] = 'https://www.<?= $domain ?>/my/money.aspx';
Roblox.Endpoints.Urls['/chat/chat'] = 'https://www.<?= $domain ?>/chat/chat';
Roblox.Endpoints.Urls['/presence/users'] = 'https://www.<?= $domain ?>/presence/users';
Roblox.Endpoints.Urls['/presence/user'] = 'https://www.<?= $domain ?>/presence/user';
Roblox.Endpoints.Urls['/friends/list'] = 'https://www.<?= $domain ?>/friends/list';
Roblox.Endpoints.Urls['/navigation/getCount'] = 'https://www.<?= $domain ?>/navigation/getCount';
Roblox.Endpoints.Urls['/catalog/browse.aspx'] = 'https://www.<?= $domain ?>/catalog/browse.aspx';
Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.<?= $domain ?>/catalog/html';
Roblox.Endpoints.Urls['/catalog/json'] = 'https://search.<?= $domain ?>/catalog/json';
Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.<?= $domain ?>/catalog/contents';
Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.<?= $domain ?>/catalog/lists.aspx';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://assetgame.<?= $domain ?>/asset-hash-thumbnail/image';
Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.<?= $domain ?>/asset-hash-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail-3d/json';
Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/image';
Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/json';
Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'https://assetgame.<?= $domain ?>/asset-thumbnail/url';
Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'https://assetgame.<?= $domain ?>/asset/request-thumbnail-fix';
Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'https://www.<?= $domain ?>/avatar-thumbnail-3d/json';
Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = 'https://www.<?= $domain ?>/avatar-thumbnail/image';
Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = 'https://www.<?= $domain ?>/avatar-thumbnail/json';
Roblox.Endpoints.Urls['/avatar-thumbnails'] = 'https://www.<?= $domain ?>/avatar-thumbnails';
Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://www.<?= $domain ?>/avatar/request-thumbnail-fix';
Roblox.Endpoints.Urls['/bust-thumbnail/json'] = 'https://www.<?= $domain ?>/bust-thumbnail/json';
Roblox.Endpoints.Urls['/group-thumbnails'] = 'https://www.<?= $domain ?>/group-thumbnails';
Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = 'https://www.<?= $domain ?>/groups/getprimarygroupinfo.ashx';
Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = 'https://www.<?= $domain ?>/headshot-thumbnail/json';
Roblox.Endpoints.Urls['/item-thumbnails'] = 'https://www.<?= $domain ?>/item-thumbnails';
Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = 'https://www.<?= $domain ?>/outfit-thumbnail/json';
Roblox.Endpoints.Urls['/place-thumbnails'] = 'https://www.<?= $domain ?>/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/asset/'] = 'https://www.<?= $domain ?>/thumbnail/asset/';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshot'] = 'https://www.<?= $domain ?>/thumbnail/avatar-headshot';
Roblox.Endpoints.Urls['/thumbnail/avatar-headshots'] = 'https://www.<?= $domain ?>/thumbnail/avatar-headshots';
Roblox.Endpoints.Urls['/thumbnail/user-avatar'] = 'https://www.<?= $domain ?>/thumbnail/user-avatar';
Roblox.Endpoints.Urls['/thumbnail/resolve-hash'] = 'https://www.<?= $domain ?>/thumbnail/resolve-hash';
Roblox.Endpoints.Urls['/thumbnail/place'] = 'https://www.<?= $domain ?>/thumbnail/place';
Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = 'https://www.<?= $domain ?>/thumbnail/get-asset-media';
Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = 'https://www.<?= $domain ?>/thumbnail/remove-asset-media';
Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = 'https://www.<?= $domain ?>/thumbnail/set-asset-media-sort-order';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'https://www.<?= $domain ?>/thumbnail/place-thumbnails';
Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = 'https://www.<?= $domain ?>/thumbnail/place-thumbnails-partial';
Roblox.Endpoints.Urls['/thumbnail_holder/g'] = 'https://www.<?= $domain ?>/thumbnail_holder/g';
Roblox.Endpoints.Urls['/users/{id}/profile'] = 'https://www.<?= $domain ?>/users/{id}/profile';
Roblox.Endpoints.Urls['/service-workers/push-notifications'] = 'https://www.<?= $domain ?>/service-workers/push-notifications';
Roblox.Endpoints.Urls['/notification-stream/notification-stream-data'] = 'https://www.<?= $domain ?>/notification-stream/notification-stream-data';
Roblox.Endpoints.Urls['/api/friends/acceptfriendrequest'] = 'https://www.<?= $domain ?>/api/friends/acceptfriendrequest';
Roblox.Endpoints.Urls['/api/friends/declinefriendrequest'] = 'https://www.<?= $domain ?>/api/friends/declinefriendrequest';
Roblox.Endpoints.addCrossDomainOptionsToAllRequests = true;
</script>

        <script type="text/javascript">
if (typeof(Roblox) === "undefined") { Roblox = {}; }
Roblox.Endpoints = Roblox.Endpoints || {};
Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
</script>

    </head>
    <body>
<?php require_once("../includes/robloxLinkify.php"); ?>
        <div id="fb-root"></div>
        <script>
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div id="Container">
            <div style="clear: both"></div>
            <div id="Body" style="width: 970px">
                
<script type="text/javascript">
    Roblox = Roblox || {};
    Roblox.Resources = Roblox.Resources || {};
    Roblox.Resources.AnimatedSignupFormValidator = {
        //<sl:translate>
        doesntMatch: "Doesn't match",
        requiredField: "Required",
        tooLong: "Too long",
        tooShort: "Too short",
        maxValid: "Too many accounts use this email",
        needsFourLetters: "Needs 4 letters",
        needsTwoNumbers: "Needs 2 numbers",
        noSpaces: "No spaces allowed",
        weakKey: "Weak key combination.",
        invalidName: "Can't be your avatar name",
        alreadyTaken: "Already taken",
        cantBeUsed: "Can't be used",
        invalidBirthday: "Invalid birthday",
        loginFieldsRequired: "Username and Password are required.",
        loginFieldsIncorrect: "Your username or password is incorrect.",
        invalidEmail: "Invalid email"
        //</sl:translate>
    };

    Roblox.Resources.CaptchaModal = {
        //<sl:translate>
        title: "Are you human?",
        message: "To finish, please verify that you are human.",
        finish: "Finish"
        //</sl:translate>
    };
</script>
<style type="text/css">
    body {
        background: url("https://images.idk18.xyz/c24cd7ef11cd058ed9392bae5b81e0d7.jpg") repeat-x;
        padding-top: 35px;
    }
</style>
<div id="rbx-body" class="hidden"
     data-performance-relative-value="0.005"
     data-internal-page-name="BlueCity"
     data-send-event-percentage="0.01"></div>
<div id="Experimental" class="ShadowedStandardBox">
    <div class="Content">
        <div id="animatedHeader">
            <div id="headerLogo">
                <img src="https://images.idk18.xyz/1d93c921bb85b2a67ac8ea164a909278.png" alt="ROBLOX" />
            </div>
            <div id="headerTextTop">Join millions of builders</div>
            <div id="headerTextBottom">and explore their creations</div>
        </div>
        <div id="animatedBodyWrapper">
            <div id="animatedBody">
                <div class="ImageContainer" style="float: left;">
                    <img src="https://images.idk18.xyz/a53fcaef613b178ec86dc2937d677451.jpg" alt="Roblox Landing Page Image" width="380" height="250" />
                    <div class="slogan-container">
                        <div id="slogan">What will you build?</div>
                    </div>
                </div>
                <div id="animated-wrapper" data-first-visit="True">
                    <div class="sign-up-row">
                        <div class="sign-up-inner-row">
                            <span id="animated-tab-signup" class="animated-tab">Sign up</span>
                            <span class="animated-tab">|</span>
                            <span id="animated-tab-login" class="animated-tab">Login</span>
                        </div>
                    </div>
                    <div id="animated-login" style="display: none;">
                        <form id="login-form" method="POST" action="https://www.<?= $domain ?>/newlogin">
                            <div class="sign-up-row">
                                <div class="sign-up-inner-row">
                                    <span id="login-error" class="required-text error" style="display: none;"></span>
                                </div>
                            </div>
                            <div class="sign-up-row">
                                <div>
                                    <input type="text" id="loginUsername" name="username" class="text-box text-box-large" tabindex="1" placeholder="Username"  />

                                </div>
                            </div>
                            <div class="sign-up-row">
                                <div>
                                    <input type="password" id="loginPassword" name="password" class="text-box text-box-large" tabindex="2" placeholder="Password" />
                                </div>
                            </div>
                            <div>
                                <a  onclick="return Roblox.AnimatedLoginFormValidator.validateLoginForm();" tabindex="3" class="btn-large btn-primary" id="login-button">Login</a>
                            </div>
                        </form>
                        <br />
                        <div id="login-footer" class="sign-up-row">
                            <div class="sign-up-inner-row">
                                <a href="https://www.<?= $domain ?>/Login/ResetPasswordRequest.aspx">Forgot your username/password?</a>
                            </div>
                            <div>
                                Don't have an account? <a href="#" onclick="$('#animated-tab-signup').click();"> Sign up</a>
                            </div>
                        </div>
                    </div>
                    <div id="animated-signup" style="display: none;">
                        <form method="post" id="signup-form" action="https://www.<?= $domain ?>/landing/signup?isNewVisitor=True">
                            <div class="sign-up-row">
                                <div class="sign-up-inner-row">
                                    <span id="birthdayGood" class="good-text" style="display: none;">OK</span>
                                    <span id="birthdayError" class="required-text error" style="display: none;"></span>
                                    <span id="birthdayText">Birthday</span>
                                </div>
                                <div>
                                    <select id="lstMonths" name="lstMonths" onchange="Roblox.AnimatedSignupFormValidator.checkBirthday()" tabindex="1"><option selected="selected" value="0">Month</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
                                    <select id="lstDays" name="lstDays" onchange="Roblox.AnimatedSignupFormValidator.checkBirthday()" tabindex="2"><option selected="selected" value="0">Day</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
                                    <select id="lstYears" name="lstYears" onchange="Roblox.AnimatedSignupFormValidator.checkBirthday(false)" tabindex="3"><option selected="selected" value="0">Year</option>
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
<option value="1946">1946</option>
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
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
</select>
                                </div>
                                <div>
                                    <span class="sign-up-description">
                                        Enter your birthday for a personalized experience.<br />
                                        It will not be given to any third party.
                                    </span>
                                </div>
                            </div>
                            <div class="sign-up-row">
                                <div class="sign-up-inner-row">
                                    <span id="genderGood" class="good-text" style="display: none;">OK</span>
                                    <span id="genderError" class="required-text error" style="display: none;"></span>
                                    <span id="genderText">Gender</span>
                                </div>
                                <div>
                                    <input id="MaleBtn" name="gender" onclick="Roblox.AnimatedSignupFormValidator.checkGender();" tabindex="4" type="radio" value="Male" />
                                    <label for="MaleBtn">Male</label>
                                    <input id="FemaleBtn" name="gender" onclick="Roblox.AnimatedSignupFormValidator.checkGender();" tabindex="5" type="radio" value="Female" />
                                    <label for="FemaleBtn">Female</label>
                                </div>
                            </div>
                            <div class="sign-up-row">
                                <div class="sign-up-inner-row">
                                    <span id="usernameGood" class="good-text" style="display: none;">OK</span>
                                    <span id="usernameError" class="required-text error" style="display: none;"></span>
                                    <span id="usernameText">Username</span>
                                </div>
                                <div>
                                    <input type="text" id="username" name="username" class="text-box text-box-large" tabindex="6" onblur="Roblox.AnimatedSignupFormValidator.checkUsername()" autofocus=&quot;autofocus&quot; />

                                </div>
                                <div>
                                    <span class="sign-up-description">Don't use your real name</span>
                                </div>
                            </div>
                            <div class="sign-up-row">
                                <div class="sign-up-inner-row">
                                    <span id="passwordGood" class="good-text" style="display: none;">OK</span>
                                    <span id="passwordError" class="required-text error" style="display: none;"></span>
                                    <span id="passwordText">Password</span>
                                </div>
                                <div>
                                    <input name="password" id="password" class="text-box text-box-large" tabindex="7" type="password" onkeyup="Roblox.AnimatedSignupFormValidator.checkPassword();" />
                                </div>
                                <div>
                                    <span class="sign-up-description">6-20 characters, minimum of 4 letters & 2 numbers</span>
                                </div>
                            </div>
                            <div class="sign-up-row">
                                <div class="sign-up-inner-row">
                                    <span id="passwordConfirmGood" class="good-text" style="display: none;">OK</span>
                                    <span id="passwordConfirmError" class="required-text error" style="display: none;"></span>
                                    <span id="passwordConfirmText">Confirm Password</span>
                                </div>
                                <div>
                                    <input name="passwordConfirm" id="passwordConfirm" class="text-box text-box-large" tabindex="8" type="password" onkeyup="Roblox.AnimatedSignupFormValidator.checkPasswordConfirm();" />
                                </div>
                            </div>

                            <div class="legal-text-container">
                                By signing up you agree to our <a class="text-link privacy" href="https://www.<?= $domain ?>/info/terms-of-service" target="_blank">Terms</a> and <a class="text-link privacy" href="https://www.<?= $domain ?>/Info/Privacy.aspx" target="_blank">Privacy Policy</a>
                            </div>
                            <div>
                                <a  onclick="return Roblox.AnimatedSignupFormValidator.validateForm();" tabindex="11" class="btn-large btn-primary roblox-signup" id="SignUpButton">Sign Up</a>
                            </div>
                            <input type="hidden" id="view" name="view" value="bc">
                            <input name="__RequestVerificationToken" type="hidden" value="vBPqS-6MmUqCJ7vksV98Hhz5VctgrL_lbPsMiiEVW2a8VQos30MMrs2_fqLXdFUi_zjAUYs65p7F49844d7FjT2HnCQ1" />
                        </form>
                    </div>
                    <script type="text/javascript">
                        if (typeof Roblox === "undefined") {
                            Roblox = {};
                        }

                        $(".roblox-signup").click(function () {
                            if (Roblox.AnimatedSignupFormValidator.validateForm()) {
                                $('#signup-form').submit();
                            }
                        });

                        $("#lstMonths").val();
                        $("#lstDays").val();
                        $("#lstYears").val();

                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
 

<img src="/timg/rbx" style="position: absolute"/>


<?php require_once("../includes/modals/legacygenericconfirmationmodal.php"); ?>

            </div>


        <div class="Footer Experimental">
            <div class="FooterContent">
                <p class="FooterParagraph">
                    <a href="http://corp.<?= $domain ?>/" ref="landingsignup-company">Company</a> &nbsp;|&nbsp;
                    <a href="http://corp.<?= $domain ?>/careers" ref="landingsignup-jobs">Careers</a> &nbsp;|&nbsp;
                    <a href="http://blog.<?= $domain ?>" ref="landingsignup-blog">Blog</a> &nbsp;|&nbsp;
                    <a href="http://corp.<?= $domain ?>/parents" ref="landingsignup-parents">Parents</a> &nbsp;|&nbsp;
                    <a href="https://www.<?= $domain ?>/Help/Builderman.aspx" ref="landingsignup-help">Help</a>&nbsp;|&nbsp;
                    <a href="https://www.<?= $domain ?>/Info/terms-of-service" ref="landingsignup-terms">Terms</a>&nbsp;|&nbsp;
                    <a href="https://www.<?= $domain ?>/Info/Privacy.aspx" ref="landingsignup-privacy" class="privacy">Privacy Policy</a>
                </p>
                <div class="FooterKidSafeLegaleseContainer">
                    <!-- NOTE: "ROBLOX Corporation" is a healthcheck; be careful when updating! -->
                    ©2016 ROBLOX Corporation
                    <br />
                    <span class="footer-kid-safe-logo">


<a href="//www.kidsafeseal.com/certifiedproducts/roblox.html" target="_blank">
    <img border="0" 
         width="130"
         height="50"
         alt="<?= $domain ?> (under-13 user experience) is certified by the kidSAFE Seal Program." 
         src="https://www.kidsafeseal.com/sealimage/20308902961041304386/roblox_medium_darktm.png">
</a>
                    </span>
                </div>
            </div>
        </div>
        </div> 


<?php require_once("../includes/eventmanager.php"); ?>


        

    <script type="text/javascript">function urchinTracker() {}</script>

<?php require_once("../includes/jserrortrackerinit.php"); ?>
        <script type='text/javascript' src='https://js.idk18.xyz/b560aaf89d754868a477736f28166bf4.js'></script>

        <script type='text/javascript' src='https://js.idk18.xyz/69be0925e5d8623e6d05bebcd00421a0.js'></script>

        
        <script type="text/javascript">
            $(function () {
                $('.tooltip').tipsy();
                $('.tooltip-top').tipsy({ gravity: 's' });
                $('.tooltip-right').tipsy({ gravity: 'w' });
                $('.tooltip-left').tipsy({ gravity: 'e' });
                $('.tooltip-bottom').tipsy({ gravity: 'n' });
            });
        </script>
    </body>
</html>