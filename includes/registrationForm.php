<div class="signup-input-area" ng-form name="signupForm" rbx-form-context context="RollerCoaster">
             


            <div class="form-group" ng-class="{'has-error' : (badSubmit || signupForm.username.$dirty) && signupForm.username.$invalid, 'has-success': (signupForm.username.$dirty && signupForm.username.$valid) }">
                <input id="signup-username"  ng-trim="false" ng-change="onChange()" name="username" class="form-control input-field" type="text" tabindex="1" rbx-valid-username rbx-form-interaction rbx-form-validation placeholder="Username (don&#39;t use your real name)" value="" ng-model="signup.username"/>
                <p id="signup-usernameInputValidation" class="form-control-label input-validation text-error" ng-bind="(badSubmit || signupForm.username.$dirty) ? signupForm.username.$validationMessage : ''"></p>
            </div>
            <div class="form-group" ng-class="{'has-error' : (badSubmit || signupForm.password.$dirty) && signupForm.password.$invalid, 'has-success': (signupForm.password.$dirty && signupForm.password.$valid) }">
                <input id="signup-password" ng-trim="false" name="password" class="form-control input-field" type="password" tabindex="2" rbx-valid-password rbx-form-interaction rbx-form-validation rbx-form-validation-redact-input placeholder="Password (minimum length 8)" ng-model="signup.password">
                <p id="signup-passwordInputValidation" class="form-control-label input-validation text-error" ng-bind="(badSubmit || signupForm.password.$dirty) ? signupForm.password.$validationMessage : ''"></p>
            </div>
            <div class="form-group" ng-class="{'has-error' : (badSubmit || signupForm.passwordConfirm.$dirty) && signupForm.passwordConfirm.$invalid, 'has-success': (signupForm.passwordConfirm.$dirty && signupForm.passwordConfirm.$valid) }">
                <input id="signup-password-confirm" ng-trim="false" name="passwordConfirm" class="form-control input-field" match="signup.password" rbx-valid-password-confirm rbx-form-interaction rbx-form-validation rbx-form-validation-redact-input type="password" tabindex="3" placeholder="Confirm Password" ng-model="signup.passwordConfirm" />
                <p id="signup-passwordConfirmInputValidation" class="form-control-label input-validation text-error" ng-bind="(badSubmit || signupForm.passwordConfirm.$dirty) ? signupForm.passwordConfirm.$validationMessage : ''"></p>
            </div>
            <div class="birthday-container">
                <div class="form-group" ng-class="{'has-error' : showBirthdayValidation(), 'has-success' : signupForm.birthdayMonth.$dirty && signupForm.birthdayDay.$dirty && signupForm.birthdayYear.$dirty && !showBirthdayValidation() }">
                    <div class="form-control fake-input-lg">
                        <label class="birthday-label">Birthday</label>
                        <div class="rbx-select-group month">
                                <select class="input-field rbx-select" id="MonthDropdown" tabindex="4" rbx-valid-birthday rbx-form-interaction rbx-form-validation name="birthdayMonth" ng-model="signup.birthdayMonth">
                                    <option value="" disabled selected>Month</option>
                                    <option value="Jan">January</option>
                                    <option value="Feb">February</option>
                                    <option value="Mar">March</option>
                                    <option value="Apr">April</option>
                                    <option value="May">May</option>
                                    <option value="Jun">June</option>
                                    <option value="Jul">July</option>
                                    <option value="Aug">August</option>
                                    <option value="Sep">September</option>
                                    <option value="Oct">October</option>
                                    <option value="Nov">November</option>
                                    <option value="Dec">December</option>
                                </select>
                        </div>
                        <div class="rbx-select-group day">
                            <select class="input-field rbx-select" id="DayDropdown" tabindex="5" rbx-valid-birthday rbx-form-interaction rbx-form-validation name="birthdayDay" ng-model="signup.birthdayDay">
                                <option value="" disabled selected>Day</option>
                                    <option value="1"
                                            >



                                        01
                                    </option>
                                    <option value="2"
                                            >



                                        02
                                    </option>
                                    <option value="3"
                                            >



                                        03
                                    </option>
                                    <option value="4"
                                            >



                                        04
                                    </option>
                                    <option value="5"
                                            >



                                        05
                                    </option>
                                    <option value="6"
                                            >



                                        06
                                    </option>
                                    <option value="7"
                                            >



                                        07
                                    </option>
                                    <option value="8"
                                            >



                                        08
                                    </option>
                                    <option value="9"
                                            >



                                        09
                                    </option>
                                    <option value="10"
                                            >



                                        10
                                    </option>
                                    <option value="11"
                                            >



                                        11
                                    </option>
                                    <option value="12"
                                            >



                                        12
                                    </option>
                                    <option value="13"
                                            >



                                        13
                                    </option>
                                    <option value="14"
                                            >



                                        14
                                    </option>
                                    <option value="15"
                                            >



                                        15
                                    </option>
                                    <option value="16"
                                            >



                                        16
                                    </option>
                                    <option value="17"
                                            >



                                        17
                                    </option>
                                    <option value="18"
                                            >



                                        18
                                    </option>
                                    <option value="19"
                                            >



                                        19
                                    </option>
                                    <option value="20"
                                            >



                                        20
                                    </option>
                                    <option value="21"
                                            >



                                        21
                                    </option>
                                    <option value="22"
                                            >



                                        22
                                    </option>
                                    <option value="23"
                                            >



                                        23
                                    </option>
                                    <option value="24"
                                            >



                                        24
                                    </option>
                                    <option value="25"
                                            >



                                        25
                                    </option>
                                    <option value="26"
                                            >



                                        26
                                    </option>
                                    <option value="27"
                                            >



                                        27
                                    </option>
                                    <option value="28"
                                            >



                                        28
                                    </option>
                                    <option value="29"
                                            >



                                        29
                                    </option>
                                    <option value="30"
                                            ng-show=isValidBirthday(30)>



                                        30
                                    </option>
                                    <option value="31"
                                            ng-show=isValidBirthday(31)>



                                        31
                                    </option>
                            </select>
                        </div>
                        <div class="rbx-select-group year">
                            <select class="input-field rbx-select" id="YearDropdown" rbx-valid-birthday rbx-form-interaction rbx-form-validation tabindex="6" name="birthdayYear" ng-model="signup.birthdayYear">
                                <option value="" disabled selected>Year</option>
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
                    </div>
                    <p id="signup-BirthdayInputValidation" class="form-control-label input-validation text-error" ng-bind="showBirthdayValidation() ? 'Invalid birthday' : ''"></p>
                </div>

            </div>
            <div class="gender-container">
                <div class="form-group" ng-class="{'has-error' : (badSubmit && !(signup.gender == 2 || signup.gender == 3)), 'has-success': signup.gender == 2 || signup.gender == 3 }">
                    <div class="form-control fake-input-lg">
                        <label>Gender</label>
                            <div id="FemaleButton" class="gender-circle" tabindex="7" rbx-form-interaction name="genderFemale" ng-class="{ 'selected-gender': signup.gender == 3 }" ng-click="setGender($event, 3)" ng-keypress="setGender($event, 3)">
                                <div class="cover-sprite gender female"></div>
                            </div>
                            <div id="MaleButton" class="gender-circle" tabindex="8" rbx-form-interaction name="genderMale" ng-class="{ 'selected-gender': signup.gender == 2 }" ng-click="setGender($event, 2)" ng-keypress="setGender($event, 2)">
                                <div class="cover-sprite gender male"></div>
                    </div>
                    </div>
                    <p id="signup-GenderInputValidation" class="form-control-label input-validation text-error" ng-bind="(badSubmit && !(signup.gender == 2 || signup.gender == 3)) ? 'Gender is required' : ''"></p>
                </div>
            </div>
            <div class="legal-text-container">
                By signing up you agree to our <a href="https://www.<?= $domain ?>/info/terms-of-service" target="_blank">Terms</a> and <a href="https://www.<?= $domain ?>/Info/Privacy.aspx" target="_blank">Privacy Policy</a>
            </div>

            <p id="captcha-text" class="captcha-text text-error" ng-bind="!isSectionShown ? '	Are you a robot?' : ''"></p>
            <div class="captcha-container" ng-controller="CaptchaController" ng-form name="captchaForm" rbx-form-context context="RollerCoaster" ng-cloak ng-show="isSectionShown">
                <div class="g-recaptcha" data-sitekey="6Lcl2IAkAAAAAN3r5lttU-ra-RvDGMh-m2eIjRPb"></div>
                <button id="CaptchaSubmitButton" class="btn-primary-md signup-submit-button"
                    data-signup-captcha-api-url="https://api.<?= $domain ?>/captcha/validate/signup"
                    data-log-in-captcha-api-url="https://api.<?= $domain ?>/captcha/validate/login"
                    ng-click="submitCaptcha($event)"
                    ng-disabled="isSubmitting"
                    rbx-form-interaction name="captchaSubmit">
                    Sign Up
                </button>
            </div>
            <button id="signup-button" type="button" tabindex="9" class="btn-primary-md signup-submit-button" rbx-form-interaction name="signupSubmit" ng-disabled="isSubmitting" ng-show="isSectionShown" data-signup-api-url="https://api.<?= $domain ?>/signup/v1" ng-click="submitSignup($event)" ng-keypress="submitSignup($event)">Sign Up</button>
            <noscript>
                <div class="text-danger">
                    <strong>JavaScript is required to submit this form.</strong>
                </div>
            </noscript>
            <div id="GeneralErrorText" class="input-validation-large alert-warning font-bold" ng-cloak ng-show="signupForm.$generalError" ng-bind="signupForm.$generalErrorText" ng-click="signupForm.$generalError=false"></div>
        </div>