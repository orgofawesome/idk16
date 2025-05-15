<?php 
if (!str_contains($_SERVER['HTTP_USER_AGENT'], "ROBLOX")): ?>
<div id="header"
     class="navbar-fixed-top rbx-header"
     data-isfriendshiprealtimeupdateenabled="true"
     data-isauthenticated="<?php if ($isUserAuthenticated) echo 'true'; else echo 'false'; ?>"
     data-isnavigationuserdatafromclientsideenabled="false"
     role="navigation">
    <div class="container-fluid">
        <div class="rbx-navbar-header">
		<?php if ($isUserAuthenticated): ?>
            <div data-behavior="nav-notification" class="rbx-nav-collapse" onselectstart="return false;">
                    <span class="icon-nav-menu"></span>


            </div>
		<?php endif; ?>
            <div class="navbar-header">
                <a class="navbar-brand" href="https://www.<?= $domain ?>/">
                    <span class="icon-logo"></span>
                    <span class="icon-logo-r"></span>
                </a>
            </div>
        </div>
        <ul class="nav rbx-navbar hidden-xs hidden-sm col-md-4 col-lg-3">
            <li>
                <a class="nav-menu-title" href="https://www.<?= $domain ?>/games">Games</a>
            </li>
            <li>
                <a class="nav-menu-title" href="https://www.<?= $domain ?>/catalog/">Catalog</a>
            </li>
            <li>
                <a class="nav-menu-title" href="https://www.<?= $domain ?>/develop">Develop</a>
            </li>
            <li>
                <a class="buy-robux nav-menu-title" href="https://www.<?= $domain ?>/upgrades/robux?ctx=nav">ROBUX</a>
            </li>
        </ul><!--rbx-navbar-->
        <div id="navbar-universal-search" class="navbar-left rbx-navbar-search col-xs-5 col-sm-6 col-md-3" data-behavior="univeral-search" role="search">
            <div class="input-group">

                <input id="navbar-search-input" class="form-control input-field" type="text" placeholder="Search" maxlength="120" />
                <div class="input-group-btn">
                    <button id="navbar-search-btn" class="input-addon-btn" type="submit">
                        <span class="icon-nav-search"></span>
                    </button>
                </div>
            </div>
            <ul data-toggle="dropdown-menu" class="dropdown-menu" role="menu">
                <li class="rbx-navbar-search-option selected" data-searchurl="https://www.<?= $domain ?>/games/?Keyword=">
                    <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Games</span>
                </li>
                        <li class="rbx-navbar-search-option" data-searchurl="https://www.<?= $domain ?>/search/users?keyword=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in People</span>
                        </li>
                        <li class="rbx-navbar-search-option" data-searchurl="https://www.<?= $domain ?>/catalog/browse.aspx?CatalogContext=1&amp;Keyword=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Catalog</span>
                        </li>
                        <li class="rbx-navbar-search-option" data-searchurl="https://www.<?= $domain ?>/groups/search.aspx?val=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Groups</span>
                        </li>
                        <li class="rbx-navbar-search-option" data-searchurl="https://www.<?= $domain ?>/develop/library?CatalogContext=2&amp;Category=6&amp;Keyword=">
                            <span class="rbx-navbar-search-text">Search <span class="rbx-navbar-search-string"></span> in Library</span>
                        </li>
            </ul>
        </div><!--rbx-navbar-search--><?php if ($isUserAuthenticated): ?>
        <div class="navbar-right rbx-navbar-right col-xs-4 col-sm-3">

<ul class="nav navbar-right rbx-navbar-icon-group">
    <li id="navbar-setting" class="navbar-icon-item">
        <a class="rbx-menu-item roblox-popover-close" data-toggle="popover" data-bind="popover-setting" data-viewport="#header">
            <span class="icon-nav-settings roblox-popover-close" id="nav-settings"></span>
            <span class="notification-red nav-setting-highlight hidden">0</span>
        </a>
        <div class="rbx-popover-content" data-toggle="popover-setting">
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a class="rbx-menu-item" href="https://www.<?= $domain ?>/my/account">
                        Settings
                        <span class="notification-blue nav-setting-highlight hidden">0</span>
                    </a>
                </li>
                <li><a class="rbx-menu-item" href="https://www.<?= $domain ?>/Help/Builderman.aspx" target="_blank">Help</a></li>
                <li><a class="rbx-menu-item" data-behavior="logout" data-bind="https://www.<?= $domain ?>/authentication/logout">Logout</a></li>
            </ul>
        </div>
    </li>
    <li id="navbar-robux" class="navbar-icon-item">
        <a id="nav-robux-icon" class="rbx-menu-item" data-toggle="popover" data-bind="popover-robux">
            <span class="icon-nav-robux roblox-popover-close" id="nav-robux"></span>
            <span class="rbx-text-navbar-right" id="nav-robux-amount"><?= formatNumber($userInfo["robuxBalance"]) ?></span>
        </a>
        <div class="rbx-popover-content" data-toggle="popover-robux">
            <ul class="dropdown-menu" role="menu">
                <li><a href="https://www.<?= $domain ?>/My/Money.aspx#/#Summary_tab" id="nav-robux-balance" class="rbx-menu-item"><?= number_format($userInfo["robuxBalance"]) ?> ROBUX</a></li>
                <li><a href="https://www.<?= $domain ?>/upgrades/robux?ctx=navpopover" class="rbx-menu-item">Buy ROBUX</a></li>
            </ul>
        </div>
    </li>

<?php /*
<li ng-modules="robloxApp, notificationStreamIcon"
    ng-controller="notificationStreamIconController" 
    class="navbar-icon-item notification-stream"
    ng-class="{'inApp': library.inApp}">
    <div notification-indicator></div>
    
</li>
*/ ?>

    <li class="rbx-navbar-right-search" data-toggle="toggle-search">
        <a class="rbx-menu-icon rbx-menu-item">
            <span class="icon-nav-search-white"></span>
        </a>
    </li>
</ul>        </div><?php else:?>
<div class="navbar-right rbx-navbar-right col-xs-4 col-sm-3">
                <ul class="nav navbar-right rbx-navbar-right-nav" data-display-opened="False">
                        <li>
                            <a id="head-login" class="rbx-navbar-login nav-menu-title" data-behavior="login" data-viewport="#header">Log In</a>
                        </li>
                        <div id="iFrameLogin" class="iFrameLogin popover bottom in" role="menu">
                            <div class="arrow"></div>
                                <iframe id="iframe-login" name="iframe-nav-login" class="rbx-navbar-login-iframe" data-delaysrc="https://www.<?= $domain ?>/Login/iFrameLogin.aspx?parentUrl=<?= urlencode($requestUrl) ?>" scrolling="no" frameborder="0" width="320"></iframe>
                        </div>
                        <li>
                            <a class="rbx-navbar-signup nav-menu-title" href="https://www.<?= $domain ?>/account/signupredir">Sign Up</a>
                        </li>
                        <li class="rbx-navbar-right-search" data-toggle="toggle-search">
                            <a class="rbx-menu-icon">
                                <span class="icon-nav-search-white"></span>
                            </a>
                        </li>
                </ul>
        </div><?php endif; ?><!-- navbar right-->
        <ul class="nav rbx-navbar hidden-md hidden-lg col-xs-12">
            <li>
                <a class="nav-menu-title" href="https://www.<?= $domain ?>/games">Games</a>
            </li>
            <li>
                <a class="nav-menu-title" href="https://www.<?= $domain ?>/catalog/">Catalog</a>
            </li>
            <li>
                <a class="nav-menu-title" href="https://www.<?= $domain ?>/develop">Develop</a>
            </li>
            <li>
                <a class="buy-robux nav-menu-title" href="https://www.<?= $domain ?>/upgrades/robux?ctx=nav">ROBUX</a>
            </li>
        </ul><!--rbx-navbar-->
    </div>
</div>


<!-- LEFT NAV MENU -->
<?php if ($isUserAuthenticated): ?>
    <div id="navigation" class="rbx-left-col" data-behavior="left-col">
        <ul>
            <li class="text-lead">
                <a class="text-overflow" href="https://www.<?= $domain ?>/users/<?= $userInfo['id'] ?>/profile"><?= htmlspecialchars($userInfo['name']) ?></a>
            </li>
            <li class="rbx-divider"></li>
        </ul>

        <div class="rbx-scrollbar" data-toggle="scrollbar" onselectstart="return false;">
            <ul>
                <li><a href="https://www.<?= $domain ?>/home" id="nav-home"><span class="icon-nav-home"></span><span>Home</span></a></li>
                <li><a href="https://www.<?= $domain ?>/users/<?= $userInfo['id'] ?>/profile" id="nav-profile"><span class="icon-nav-profile"></span><span>Profile</span></a></li>
                <li id="navigation-messages">
                    <a href="https://www.<?= $domain ?>/my/messages/#!/inbox" id="nav-message" data-count="0">
                        <span class="icon-nav-message"></span><span>Messages</span>
                        <span class="notification-blue hide" title="0"></span>
                    </a>
                </li>
                <li id="navigation-friends">
                    <?php $friendCount = UserAuthentication::getUserInfo("friendRequestsCount"); ?>
                    <a href="https://www.<?= $domain ?>/users/<?= $userInfo['id'] ?>/friends" id="nav-friends" data-count="<?= $friendCount ?>">
                        <span class="icon-nav-friends"></span><span>Friends</span>
                        <span class="notification-blue <?php if ($friendCount == 0) echo 'hide'; ?>" title="<?= $friendCount ?>"><?php if ($friendCount !== 0) echo $friendCount; ?></span>
                    </a>
                </li>
                <li>
                    <a href="https://www.<?= $domain ?>/my/character.aspx" id="nav-character">
                        <span class="icon-nav-charactercustomizer"></span><span>Avatar</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.<?= $domain ?>/users/<?= $userInfo['id'] ?>/inventory" id="nav-inventory">
                        <span class="icon-nav-inventory"></span><span>Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.<?= $domain ?>/my/money.aspx#/#TradeItems_tab" id="nav-trade">
                        <span class="icon-nav-trade"></span><span>Trade</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.<?= $domain ?>/my/groups.aspx" id="nav-group">
                        <span class="icon-nav-group"></span><span>Groups</span>
                    </a>
                </li>
                <li>
                    <a href="https://forum.<?= $domain ?>/forum/" id="nav-forum">
                        <span class="icon-nav-forum"></span><span>Forum</span>
                    </a>
                </li>
                <li>
                    <a href="http://blog.<?= $domain ?>" id="nav-blog">
                        <span class="icon-nav-blog"></span><span>Blog</span>
                    </a>
                </li>
                    <li>
                        <a id="nav-shop" class="roblox-shop-interstitial">
                            <span class="icon-nav-shop"></span><span>Shop</span>
                        </a>
                    </li>
                <?php if ($userInfo['membershipType'] >= 1): ?>
                    <li class="rbx-upgrade-now">
                        <a href="https://www.<?= $domain ?>/premium/membership?ctx=leftnav" class="btn-secondary-md" id="upgrade-now-button">Builders Club</a>
                    </li>
                <?php else: ?>
                    <li class="rbx-upgrade-now">
                        <a href="https://www.<?= $domain ?>/premium/membership?ctx=leftnav" class="btn-secondary-md" id="upgrade-now-button">Upgrade Now</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
<?php endif; ?>