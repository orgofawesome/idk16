<?php if (!str_contains($_SERVER['HTTP_USER_AGENT'], "ROBLOX")): ?>
    <footer class="container-footer">
    <div class="footer">
        <ul class="row footer-links">
                <li class="col-4 col-xs-1 footer-link">
                    <a href="http://corp.<?= $domain ?>" class="text-footer-nav roblox-interstitial" target="_blank">
                        About Us
                    </a>
                </li>
                <li class="col-4 col-xs-1 footer-link">
                    <a href="http://corp.<?= $domain ?>/jobs" class="text-footer-nav roblox-interstitial" target="_blank">
                        Jobs
                    </a>
                </li>
            <li class="col-4 col-xs-1 footer-link">
                <a href="http://blog.<?= $domain ?>" class="text-footer-nav" target="_blank">
                    Blog
                </a>
            </li>
            <li class="col-4 col-xs-1 footer-link">
                <a href="http://corp.<?= $domain ?>/parents" class="text-footer-nav roblox-interstitial" target="_blank">
                    Parents
                </a>
            </li>
            <li class="col-4 col-xs-1 footer-link">
                <a href="http://en.help.<?= $domain ?>/" class="text-footer-nav roblox-interstitial" target="_blank">
                    Help
                </a>
            </li>
            <li class="col-4 col-xs-1 footer-link">
                <a href="https://www.<?= $domain ?>/Info/terms-of-service" class="text-footer-nav" target="_blank">
                    Terms
                </a>
            </li>
            <li class="col-4 col-xs-1 footer-link">
                <a href="https://www.<?= $domain ?>/Info/Privacy.aspx" class="text-footer-nav privacy" target="_blank">
                    Privacy
                </a>
            </li>
        </ul>
        <!-- NOTE: "ROBLOX Corporation" is a healthcheck; be careful when updating! -->
        <p class="text-footer footer-note">
            ©2016 ROBLOX Corporation
        </p>
    </div>
</footer>
<?php endif; ?>