<!DOCTYPE html>
<html xml:lang=en xmlns:fb=http://www.facebook.com/2008/fbml>

<head data-machine-id=WEB1846>
	<title>Develop - roblox</title>
	<meta http-equiv=X-UA-Compatible content="IE=edge,requiresActiveX=true">
	<meta charset=UTF-8>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name=author content="Roblox Corporation">
	<meta name=description content="Roblox is a global platform that brings people together through play.">
	<meta name=keywords content="free games,online games,building games,virtual worlds,free mmo,gaming cloud,physics engine">
	<meta name=apple-itunes-app content="app-id=431946152">
	<script type=application/ld+json> { "@context" : "http://schema.org", "@type" : "Organization", "name" : "Roblox", "url" : "https://www.roblox.com/", "logo": "https://images.rbxcdn.com/c69b74f49e785df33b732273fad9dbe0.png", "sameAs" : [ "https://www.facebook.com/ROBLOX/", "https://twitter.com/roblox", "https://www.linkedin.com/company/147977", "https://www.instagram.com/roblox/", "https://www.youtube.com/user/roblox", "https://plus.google.com/+roblox", "https://www.twitch.tv/roblox" ] } </script>
	<meta name=user-data data-userid=886284560 data-name=pepsiboy6000 data-isunder13=false>
	<meta name=locale-data data-language-code=en_us data-language-name=English data-locale-api-url=https://locale.roblox.com>
	<meta name=device-meta data-device-type=computer data-is-in-app=false data-is-desktop=true data-is-phone=false data-is-tablet=false data-is-console=false data-is-android-app=false data-is-ios-app=false data-is-uwp-app=false data-is-xbox-app=false data-is-amazon-app=false data-is-studio=false data-app-type=unknown>
	<meta name=page-meta data-internal-page-name=Create>
	<script>
	var Roblox = Roblox || {};
	Roblox.BundleVerifierConstants = {
		isMetricsApiEnabled: true,
		eventStreamUrl: "//ecsv2.roblox.com/pe?t=diagnostic",
		deviceType: "Computer",
		cdnLoggingEnabled: JSON.parse("true")
	};
	</script>
	<script>
	var Roblox = Roblox || {};
	Roblox.BundleDetector = (function() {
		var isMetricsApiEnabled = Roblox.BundleVerifierConstants && Roblox.BundleVerifierConstants.isMetricsApiEnabled;
		var loadStates = {
			loadSuccess: "loadSuccess",
			loadFailure: "loadFailure",
			executionFailure: "executionFailure"
		};
		var bundleContentTypes = {
			javascript: "javascript",
			css: "css"
		};
		var ephemeralCounterNames = {
			cdnPrefix: "CDNBundleError_",
			unknown: "CDNBundleError_unknown",
			cssError: "CssBundleError",
			jsError: "JavascriptBundleError",
			jsFileError: "JsFileExecutionError",
			resourceError: "ResourcePerformance_Error",
			resourceLoaded: "ResourcePerformance_Loaded"
		};
		return {
			jsBundlesLoaded: {},
			bundlesReported: {},
			counterNames: ephemeralCounterNames,
			loadStates: loadStates,
			bundleContentTypes: bundleContentTypes,
			timing: undefined,
			setTiming: function(windowTiming) {
				this.timing = windowTiming;
			},
			getLoadTime: function() {
				if(this.timing && this.timing.domComplete) {
					return this.getCurrentTime() - this.timing.domComplete;
				}
			},
			getCurrentTime: function() {
				return new Date().getTime();
			},
			getCdnProviderName: function(bundleUrl, callBack) {
				if(Roblox.BundleVerifierConstants.cdnLoggingEnabled) {
					var xhr = new XMLHttpRequest();
					xhr.open('GET', bundleUrl, true);
					xhr.onreadystatechange = function() {
						if(xhr.readyState === xhr.HEADERS_RECEIVED) {
							try {
								var headerValue = xhr.getResponseHeader("rbx-cdn-provider");
								if(headerValue) {
									callBack(headerValue);
								} else {
									callBack();
								}
							} catch(e) {
								callBack();
							}
						}
					};
					xhr.onerror = function() {
						callBack();
					};
					xhr.send();
				} else {
					callBack();
				}
			},
			getCdnProviderAndReportMetrics: function(bundleUrl, bundleName, loadState, bundleContentType) {
				this.getCdnProviderName(bundleUrl, function(cdnProviderName) {
					Roblox.BundleDetector.reportMetrics(bundleUrl, bundleName, loadState, bundleContentType, cdnProviderName);
				});
			},
			reportMetrics: function(bundleUrl, bundleName, loadState, bundleContentType, cdnProviderName) {
				if(!isMetricsApiEnabled || !bundleUrl || !loadState || !loadStates.hasOwnProperty(loadState) || !bundleContentType || !bundleContentTypes.hasOwnProperty(bundleContentType)) {
					return;
				}
				var xhr = new XMLHttpRequest();
				var metricsApiUrl = (Roblox.EnvironmentUrls && Roblox.EnvironmentUrls.metricsApi) || "https://metrics.roblox.com";
				xhr.open("POST", metricsApiUrl + "/v1/bundle-metrics/report", true);
				xhr.setRequestHeader("Content-Type", "application/json");
				xhr.withCredentials = true;
				xhr.send(JSON.stringify({
					bundleUrl: bundleUrl,
					bundleName: bundleName || "",
					bundleContentType: bundleContentType,
					loadState: loadState,
					cdnProviderName: cdnProviderName,
					loadTimeInMilliseconds: this.getLoadTime() || 0
				}));
			},
			logToEphemeralStatistics: function(sequenceName, value) {
				var deviceType = Roblox.BundleVerifierConstants.deviceType;
				sequenceName += "_" + deviceType;
				var xhr = new XMLHttpRequest();
				xhr.open('POST', '/game/report-stats?name=' + sequenceName + "&value=" + value, true);
				xhr.withCredentials = true;
				xhr.send();
			},
			logToEphemeralCounter: function(ephemeralCounterName) {
				var deviceType = Roblox.BundleVerifierConstants.deviceType;
				ephemeralCounterName += "_" + deviceType;
				var xhr = new XMLHttpRequest();
				xhr.open('POST', '/game/report-event?name=' + ephemeralCounterName, true);
				xhr.withCredentials = true;
				xhr.send();
			},
			logToEventStream: function(failedBundle, ctx, cdnProvider, status) {
				var esUrl = Roblox.BundleVerifierConstants.eventStreamUrl,
					currentPageUrl = encodeURIComponent(window.location.href);
				var deviceType = Roblox.BundleVerifierConstants.deviceType;
				ctx += "_" + deviceType;
				var duration = 0;
				if(window.performance) {
					var perfTiming = window.performance.getEntriesByName(failedBundle);
					if(perfTiming.length > 0) {
						var data = perfTiming[0];
						duration = data.duration || 0;
					}
				}
				var params = "&evt=webBundleError&url=" + currentPageUrl + "&ctx=" + ctx + "&fileSourceUrl=" + encodeURIComponent(failedBundle) + "&cdnName=" + (cdnProvider || "unknown") + "&statusCode=" + (status || "unknown") + "&loadDuration=" + Math.floor(duration);
				var img = new Image();
				img.src = esUrl + params;
			},
			getCdnInfo: function(failedBundle, ctx, fileType) {
				if(Roblox.BundleVerifierConstants.cdnLoggingEnabled) {
					var xhr = new XMLHttpRequest();
					var counter = this.counterNames;
					xhr.open('GET', failedBundle, true);
					var cdnProvider;
					xhr.onreadystatechange = function() {
						if(xhr.readyState === xhr.HEADERS_RECEIVED) {
							cdnProvider = xhr.getResponseHeader("rbx-cdn-provider");
							if(cdnProvider && cdnProvider.length > 0) {
								Roblox.BundleDetector.logToEphemeralCounter(counter.cdnPrefix + cdnProvider + "_" + fileType);
							} else {
								Roblox.BundleDetector.logToEphemeralCounter(counter.unknown + "_" + fileType);
							}
						} else if(xhr.readyState === xhr.DONE) {
							Roblox.BundleDetector.logToEventStream(failedBundle, ctx, cdnProvider, xhr.status);
						}
					};
					xhr.onerror = function() {
						Roblox.BundleDetector.logToEphemeralCounter(counter.unknown + "_" + fileType);
						Roblox.BundleDetector.logToEventStream(failedBundle, ctx, counter.unknown);
					};
					xhr.send();
				} else {
					this.logToEventStream(failedBundle, ctx);
				}
			},
			reportResourceError: function(resourceName) {
				var ephemeralCounterName = this.counterNames.resourceError + "_" + resourceName;
				this.logToEphemeralCounter(ephemeralCounterName);
			},
			reportResourceLoaded: function(resourceName) {
				var loadTimeInMs = this.getLoadTime();
				if(loadTimeInMs) {
					var sequenceName = this.counterNames.resourceLoaded + "_" + resourceName;
					this.logToEphemeralStatistics(sequenceName, loadTimeInMs);
				}
			},
			reportBundleError: function(bundleTag) {
				var ephemeralCounterName, failedBundle, ctx, contentType;
				if(bundleTag.rel && bundleTag.rel === "stylesheet") {
					ephemeralCounterName = this.counterNames.cssError;
					failedBundle = bundleTag.href;
					ctx = "css";
					contentType = bundleContentTypes.css;
				} else {
					ephemeralCounterName = this.counterNames.jsError;
					failedBundle = bundleTag.src;
					ctx = "js";
					contentType = bundleContentTypes.javascript;
				}
				this.bundlesReported[failedBundle] = true;
				this.logToEphemeralCounter(ephemeralCounterName);
				this.getCdnInfo(failedBundle, ctx, ctx);
				var bundleName;
				if(bundleTag.dataset) {
					bundleName = bundleTag.dataset.bundlename;
				} else {
					bundleName = bundleTag.getAttribute('data-bundlename');
				}
				this.getCdnProviderAndReportMetrics(failedBundle, bundleName, loadStates.loadFailure, contentType);
			},
			bundleDetected: function(bundleName) {
				this.jsBundlesLoaded[bundleName] = true;
			},
			verifyBundles: function(document) {
				var ephemeralCounterName = this.counterNames.jsFileError,
					eventContext = ephemeralCounterName;
				var scripts = (document && document.scripts) || window.document.scripts;
				var errorsList = [];
				var bundleName;
				var monitor;
				for(var i = 0; i < scripts.length; i++) {
					var item = scripts[i];
					if(item.dataset) {
						bundleName = item.dataset.bundlename;
						monitor = item.dataset.monitor;
					} else {
						bundleName = item.getAttribute('data-bundlename');
						monitor = item.getAttribute('data-monitor');
					}
					if(item.src && monitor && bundleName) {
						if(!Roblox.BundleDetector.jsBundlesLoaded.hasOwnProperty(bundleName)) {
							errorsList.push(item);
						}
					}
				}
				if(errorsList.length > 0) {
					for(var j = 0; j < errorsList.length; j++) {
						var script = errorsList[j];
						if(!this.bundlesReported[script.src]) {
							this.logToEphemeralCounter(ephemeralCounterName);
							this.getCdnInfo(script.src, eventContext, 'js');
							if(script.dataset) {
								bundleName = script.dataset.bundlename;
							} else {
								bundleName = script.getAttribute('data-bundlename');
							}
							this.getCdnProviderAndReportMetrics(script.src, bundleName, loadStates.executionFailure, bundleContentTypes.javascript);
						}
					}
				}
			}
		};
	})();
	window.addEventListener("load", function(evt) {
		Roblox.BundleDetector.verifyBundles();
	});
	Roblox.BundleDetector.setTiming(window.performance.timing);
	</script>
	<link rel=canonical href="https://www.roblox.com/develop?close=1">
	<link rel=manifest href=https://notifications.roblox.com/v2/push-notifications/chrome-manifest crossorigin=use-credentials>
	<link href=https://images.rbxcdn.com/23421382939a9f4ae8bbe60dbe2a3e7e.ico.gzip rel=icon>
	<link onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) rel=stylesheet href=https://static.rbxcdn.com/css/MainCSS___295b4427258f7e3745f94dc8cc202f44_m.css/fetch>
	<link onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) rel=stylesheet data-bundlename=LegacyStyleGuide href=https://static.rbxcdn.com/css/c967387e43f177d9bc21e9f9a1e64d066ef0759faacbaf6e8532eaa88bedc618.css/fetch>
	<link onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) rel=stylesheet data-bundlename=NotificationStream href=https://static.rbxcdn.com/css/8e03cf8e84202810e737631ed5ee4dae790b444bf7607217cccc44be5c36133a.css/fetch>
	<link onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) rel=stylesheet href=https://static.rbxcdn.com/css/page___91825b3be413a38849e2e953de59bd55_m.css/fetch>
	<link onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) rel=stylesheet data-bundlename=Chat href=https://static.rbxcdn.com/css/d4ea5fce70b8009044c02f73117827c92c07782ab871b64a0b22a078e74989e3.css/fetch>
	<script>
	var Roblox = Roblox || {};
	(function() {
		var dnt = navigator.doNotTrack || window.doNotTrack || navigator.msDoNotTrack;
		if(typeof window.external !== "undefined" && typeof window.external.msTrackingProtectionEnabled !== "undefined") {
			dnt = dnt || window.external.msTrackingProtectionEnabled();
		}
		Roblox.browserDoNotTrack = dnt == "1" || dnt == "yes" || dnt === true;
	})();
	</script>
	<script>
	var _gaq = _gaq || [];
	window.GoogleAnalyticsDisableRoblox2 = true;
	_gaq.push(['b._setAccount', 'UA-486632-1']);
	_gaq.push(['b._setSampleRate', '10']);
	_gaq.push(['b._setCampSourceKey', 'rbx_source']);
	_gaq.push(['b._setCampMediumKey', 'rbx_medium']);
	_gaq.push(['b._setCampContentKey', 'rbx_campaign']);
	_gaq.push(['b._setDomainName', 'roblox.com']);
	_gaq.push(['b._setCustomVar', 1, 'Visitor', 'Member', 2]);
	_gaq.push(['b._setPageGroup', 1, 'Create']);
	_gaq.push(['b._trackPageview']);
	_gaq.push(['c._setAccount', 'UA-26810151-2']);
	_gaq.push(['c._setSampleRate', '1']);
	_gaq.push(['c._setDomainName', 'roblox.com']);
	_gaq.push(['c._setPageGroup', 1, 'Create']);
	(function() {
		if(!Roblox.browserDoNotTrack) {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		}
	})();
	</script>
	<script>
	var Roblox = Roblox || {};
	Roblox.RealTimeSettings = Roblox.RealTimeSettings || {
		NotificationsEndpoint: "https://realtime.roblox.com",
		MaxConnectionTime: "21600000",
		IsEventPublishingEnabled: false,
		IsDisconnectOnSlowConnectionDisabled: true,
		IsSignalRClientTransportRestrictionEnabled: true,
		IsLocalStorageInRealTimeEnabled: true,
		IsDebuggerEnabled: "False"
	}
	</script>
	<script>
	var Roblox = Roblox || {};
	Roblox.EnvironmentUrls = Roblox.EnvironmentUrls || {};
	Roblox.EnvironmentUrls = {
		abtestingApiSite: "https://abtesting.roblox.com",
		accountInformationApi: "https://accountinformation.roblox.com",
		accountSettingsApi: "https://accountsettings.roblox.com",
		amazonStoreLink: "http://amzn.com/B00NUF4YOA",
		apiGatewayUrl: "https://apis.roblox.com",
		apiProxyUrl: "https://api.roblox.com",
		appProtocolUrl: "robloxmobile://",
		appStoreLink: "https://itunes.apple.com/us/app/roblox-mobile/id431946152",
		authApi: "https://auth.roblox.com",
		authAppSite: "https://authsite.roblox.com",
		avatarApi: "https://avatar.roblox.com",
		avatarAppSite: "https://avatarsite.roblox.com",
		badgesApi: "https://badges.roblox.com",
		billingApi: "https://billing.roblox.com",
		captchaApi: "https://captcha.roblox.com",
		catalogApi: "https://catalog.roblox.com",
		chatApi: "https://chat.roblox.com",
		contactsApi: "https://contacts.roblox.com",
		developApi: "https://develop.roblox.com",
		domain: "roblox.com",
		economyApi: "https://economy.roblox.com",
		followingsApi: "https://followings.roblox.com",
		friendsApi: "https://friends.roblox.com",
		friendsAppSite: "https://friendsite.roblox.com",
		gamesApi: "https://games.roblox.com",
		gamesAppSite: "https://gamesite.roblox.com",
		gameInternationalizationApi: "https://gameinternationalization.roblox.com",
		googlePlayStoreLink: "https://play.google.com/store/apps/details?id=com.roblox.client&amp;hl=en",
		groupsApi: "https://groups.roblox.com",
		inventoryApi: "https://inventory.roblox.com",
		itemConfigurationApi: "https://itemconfiguration.roblox.com",
		iosAppStoreLink: "https://itunes.apple.com/us/app/roblox-mobile/id431946152",
		localeApi: "https://locale.roblox.com",
		localizationTablesApi: "https://localizationtables.roblox.com",
		metricsApi: "https://metrics.roblox.com",
		midasApi: "https://midas.roblox.com",
		notificationApi: "https://notifications.roblox.com",
		notificationAppSite: "https://notificationsite.roblox.com",
		premiumFeaturesApi: "https://premiumfeatures.roblox.com",
		presenceApi: "https://presence.roblox.com",
		publishApi: "https://publish.roblox.com",
		surveysAppSite: "https://surveyssite.roblox.com",
		thumbnailsApi: "https://thumbnails.roblox.com",
		translationRolesApi: "https://translationroles.roblox.com",
		voiceApi: "https://voice.roblox.com",
		websiteUrl: "https://www.roblox.com",
		windowsStoreLink: "https://www.microsoft.com/en-us/store/games/roblox/9nblgggzm6wm",
		xboxStoreLink: "https://www.microsoft.com/en-us/p/roblox/bq1tn1t79v9k"
	}
	</script>
	<script>
	var Roblox = Roblox || {};
	Roblox.GaEventSettings = {
		gaDFPPreRollEnabled: "false" === "true",
		gaLaunchAttemptAndLaunchSuccessEnabled: "false" === "true",
		gaPerformanceEventEnabled: "false" === "true"
	};
	</script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=header src=https://js.rbxcdn.com/f81dd87546cb880834226adb5f94d432.js.gzip></script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=RealTime src=https://js.rbxcdn.com/2a27a86cbeb8a17802e9cca5ac801621a17b7c9f88f9c9bbb82e3d06203313b0.js></script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=CrossTabCommunication src=https://js.rbxcdn.com/a3d58af86c198c153ba6efea6e93cf05a1343c124f70e763f9194684644a9c52.js></script>
	<script>
	if(Roblox && Roblox.EventStream) {
		Roblox.EventStream.Init("//ecsv2.roblox.com/www/e.png", "//ecsv2.roblox.com/www/e.png", "//ecsv2.roblox.com/pe?t=studio", "//ecsv2.roblox.com/pe?t=diagnostic");
	}
	</script>
	<script>
	if(Roblox && Roblox.PageHeartbeatEvent) {
		Roblox.PageHeartbeatEvent.Init([2, 8, 20, 60]);
	}
	</script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=intl-polyfill src=https://js.rbxcdn.com/ee40f2a1a1a92c3ddcfbd6941428ebc0.js.gzip></script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=InternationalCore src=https://js.rbxcdn.com/b7765265afdb7c76d94552b635c3d3b9003e39e810227f3d25432466a817b0f1.js></script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=TranslationResources src=https://js.rbxcdn.com/73a89de8a6dbe8005fb3d6be12e361fddac57c13295171d3a8d5f397e761615d.js></script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=base src=https://js.rbxcdn.com/a4062d50fadc0708f9439e0ac5a5e6c5.js.gzip></script>
	<script>
	Roblox.config.externalResources = [];
	Roblox.config.paths['Pages.Catalog'] = 'https://js.rbxcdn.com/baa0c90950583c77f295ecd0748e32ce.js.gzip';
	Roblox.config.paths['Pages.CatalogShared'] = 'https://js.rbxcdn.com/fac702cb852bab6006d426d83c56f8ab.js.gzip';
	Roblox.config.paths['Widgets.AvatarImage'] = 'https://js.rbxcdn.com/76e30b0ae6a1be83cbf018579681b891.js.gzip';
	Roblox.config.paths['Widgets.DropdownMenu'] = 'https://js.rbxcdn.com/c948a7edd36e01db699c8cf19303376d.js.gzip';
	Roblox.config.paths['Widgets.GroupImage'] = 'https://js.rbxcdn.com/3afc03adcc2aaca01500baaf69b52d9c.js.gzip';
	Roblox.config.paths['Widgets.HierarchicalDropdown'] = 'https://js.rbxcdn.com/c90aea1e430a241776db6775e98c3e03.js.gzip';
	Roblox.config.paths['Widgets.ItemImage'] = 'https://js.rbxcdn.com/de56e6c24a3e70ee7d1ec900c24042e8.js.gzip';
	Roblox.config.paths['Widgets.PlaceImage'] = 'https://js.rbxcdn.com/6003f8790df31d5445169faea5c04fd7.js.gzip';
	</script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=CoreUtilities src=https://js.rbxcdn.com/e39d717145fdd1164dc2880ed356b8e529fa8124c5dfbed43c20a5614fc3821f.js></script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=CoreRobloxUtilities src=https://js.rbxcdn.com/ccc5b6b92eb7dba88eef70b0f6da0f5df2ed8da5168b590d67f69856068983af.js></script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=React src=https://js.rbxcdn.com/3485182d26ebdd16cc205fc1dc5d7de152529918cf897b07865339de5d5abfce.js></script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=ReactStyleGuide src=https://js.rbxcdn.com/f686b3f78964914c1e500373348a30f7bab55ef4dd196044f191e2862be822c0.js></script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=ReactUtilities src=https://js.rbxcdn.com/3bfcca1f8bb2298e510c1baa286b2033ae6209a08bdf8967dacd2de45229730e.js></script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=angular src=https://js.rbxcdn.com/ae5b5a047c32177e8d21426c506865aa.js.gzip></script>
	<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=page src=https://js.rbxcdn.com/ef653c76672de145916c9dafa5f20959.js.gzip></script>
	<script>
	$(function() {
		Roblox.JSErrorTracker.initialize({
			'suppressConsoleError': true
		});
	});
	</script>
	<script>
	var Roblox = Roblox || {};
	Roblox.UpsellAdModal = Roblox.UpsellAdModal || {};
	Roblox.UpsellAdModal.Resources = {
		title: "Remove Ads Like This",
		body: "Builders Club members do not see external ads like these.",
		accept: "Upgrade Now",
		decline: "No, thanks"
	};
	</script>
	<script>
	Roblox.XsrfToken.setToken('7BeqSUnCkLHh');
	</script>
	<script>
	Roblox.FixedUI.gutterAdsEnabled = false;
	</script>
	<script>
	var Roblox = Roblox || {};
	Roblox.jsConsoleEnabled = false;
	</script>
	<script>
	$(function() {
		Roblox.DeveloperConsoleWarning.showWarning();
	});
	</script>
	<script>
	if(typeof(Roblox) === "undefined") {
		Roblox = {};
	}
	Roblox.Endpoints = Roblox.Endpoints || {};
	Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
	Roblox.Endpoints.Urls['/api/item.ashx'] = 'https://www.roblox.com/api/item.ashx';
	Roblox.Endpoints.Urls['/asset/'] = 'https://assetgame.roblox.com/asset/';
	Roblox.Endpoints.Urls['/client-status/set'] = 'https://www.roblox.com/client-status/set';
	Roblox.Endpoints.Urls['/client-status'] = 'https://www.roblox.com/client-status';
	Roblox.Endpoints.Urls['/game/'] = 'https://assetgame.roblox.com/game/';
	Roblox.Endpoints.Urls['/game-auth/getauthticket'] = 'https://www.roblox.com/game-auth/getauthticket';
	Roblox.Endpoints.Urls['/game/edit.ashx'] = 'https://assetgame.roblox.com/game/edit.ashx';
	Roblox.Endpoints.Urls['/game/getauthticket'] = 'https://assetgame.roblox.com/game/getauthticket';
	Roblox.Endpoints.Urls['/game/get-hash'] = 'https://assetgame.roblox.com/game/get-hash';
	Roblox.Endpoints.Urls['/game/placelauncher.ashx'] = 'https://assetgame.roblox.com/game/placelauncher.ashx';
	Roblox.Endpoints.Urls['/game/preloader'] = 'https://assetgame.roblox.com/game/preloader';
	Roblox.Endpoints.Urls['/game/report-stats'] = 'https://assetgame.roblox.com/game/report-stats';
	Roblox.Endpoints.Urls['/game/report-event'] = 'https://assetgame.roblox.com/game/report-event';
	Roblox.Endpoints.Urls['/game/updateprerollcount'] = 'https://assetgame.roblox.com/game/updateprerollcount';
	Roblox.Endpoints.Urls['/login/default.aspx'] = 'https://www.roblox.com/login/default.aspx';
	Roblox.Endpoints.Urls['/my/avatar'] = 'https://www.roblox.com/my/avatar';
	Roblox.Endpoints.Urls['/my/money.aspx'] = 'https://www.roblox.com/my/money.aspx';
	Roblox.Endpoints.Urls['/navigation/userdata'] = 'https://www.roblox.com/navigation/userdata';
	Roblox.Endpoints.Urls['/chat/chat'] = 'https://www.roblox.com/chat/chat';
	Roblox.Endpoints.Urls['/chat/data'] = 'https://www.roblox.com/chat/data';
	Roblox.Endpoints.Urls['/presence/users'] = 'https://www.roblox.com/presence/users';
	Roblox.Endpoints.Urls['/presence/user'] = 'https://www.roblox.com/presence/user';
	Roblox.Endpoints.Urls['/friends/list'] = 'https://www.roblox.com/friends/list';
	Roblox.Endpoints.Urls['/navigation/getcount'] = 'https://www.roblox.com/navigation/getCount';
	Roblox.Endpoints.Urls['/regex/email'] = 'https://www.roblox.com/regex/email';
	Roblox.Endpoints.Urls['/catalog/browse.aspx'] = 'https://www.roblox.com/catalog/browse.aspx';
	Roblox.Endpoints.Urls['/catalog/html'] = 'https://search.roblox.com/catalog/html';
	Roblox.Endpoints.Urls['/catalog/json'] = 'https://search.roblox.com/catalog/json';
	Roblox.Endpoints.Urls['/catalog/contents'] = 'https://search.roblox.com/catalog/contents';
	Roblox.Endpoints.Urls['/catalog/lists.aspx'] = 'https://search.roblox.com/catalog/lists.aspx';
	Roblox.Endpoints.Urls['/catalog/items'] = 'https://search.roblox.com/catalog/items';
	Roblox.Endpoints.Urls['/asset-hash-thumbnail/image'] = 'https://assetgame.roblox.com/asset-hash-thumbnail/image';
	Roblox.Endpoints.Urls['/asset-hash-thumbnail/json'] = 'https://assetgame.roblox.com/asset-hash-thumbnail/json';
	Roblox.Endpoints.Urls['/asset-thumbnail-3d/json'] = 'https://assetgame.roblox.com/asset-thumbnail-3d/json';
	Roblox.Endpoints.Urls['/asset-thumbnail/image'] = 'https://assetgame.roblox.com/asset-thumbnail/image';
	Roblox.Endpoints.Urls['/asset-thumbnail/json'] = 'https://assetgame.roblox.com/asset-thumbnail/json';
	Roblox.Endpoints.Urls['/asset-thumbnail/url'] = 'https://assetgame.roblox.com/asset-thumbnail/url';
	Roblox.Endpoints.Urls['/asset/request-thumbnail-fix'] = 'https://assetgame.roblox.com/asset/request-thumbnail-fix';
	Roblox.Endpoints.Urls['/avatar-thumbnail-3d/json'] = 'https://www.roblox.com/avatar-thumbnail-3d/json';
	Roblox.Endpoints.Urls['/avatar-thumbnail/image'] = 'https://www.roblox.com/avatar-thumbnail/image';
	Roblox.Endpoints.Urls['/avatar-thumbnail/json'] = 'https://www.roblox.com/avatar-thumbnail/json';
	Roblox.Endpoints.Urls['/avatar-thumbnails'] = 'https://www.roblox.com/avatar-thumbnails';
	Roblox.Endpoints.Urls['/avatar/request-thumbnail-fix'] = 'https://www.roblox.com/avatar/request-thumbnail-fix';
	Roblox.Endpoints.Urls['/bust-thumbnail/json'] = 'https://www.roblox.com/bust-thumbnail/json';
	Roblox.Endpoints.Urls['/group-thumbnails'] = 'https://www.roblox.com/group-thumbnails';
	Roblox.Endpoints.Urls['/groups/getprimarygroupinfo.ashx'] = 'https://www.roblox.com/groups/getprimarygroupinfo.ashx';
	Roblox.Endpoints.Urls['/headshot-thumbnail/json'] = 'https://www.roblox.com/headshot-thumbnail/json';
	Roblox.Endpoints.Urls['/item-thumbnails'] = 'https://www.roblox.com/item-thumbnails';
	Roblox.Endpoints.Urls['/outfit-thumbnail/json'] = 'https://www.roblox.com/outfit-thumbnail/json';
	Roblox.Endpoints.Urls['/place-thumbnails'] = 'https://www.roblox.com/place-thumbnails';
	Roblox.Endpoints.Urls['/thumbnail/asset/'] = 'https://www.roblox.com/thumbnail/asset/';
	Roblox.Endpoints.Urls['/thumbnail/avatar-headshot'] = 'https://www.roblox.com/thumbnail/avatar-headshot';
	Roblox.Endpoints.Urls['/thumbnail/avatar-headshots'] = 'https://www.roblox.com/thumbnail/avatar-headshots';
	Roblox.Endpoints.Urls['/thumbnail/user-avatar'] = 'https://www.roblox.com/thumbnail/user-avatar';
	Roblox.Endpoints.Urls['/thumbnail/resolve-hash'] = 'https://www.roblox.com/thumbnail/resolve-hash';
	Roblox.Endpoints.Urls['/thumbnail/place'] = 'https://www.roblox.com/thumbnail/place';
	Roblox.Endpoints.Urls['/thumbnail/get-asset-media'] = 'https://www.roblox.com/thumbnail/get-asset-media';
	Roblox.Endpoints.Urls['/thumbnail/remove-asset-media'] = 'https://www.roblox.com/thumbnail/remove-asset-media';
	Roblox.Endpoints.Urls['/thumbnail/set-asset-media-sort-order'] = 'https://www.roblox.com/thumbnail/set-asset-media-sort-order';
	Roblox.Endpoints.Urls['/thumbnail/place-thumbnails'] = 'https://www.roblox.com/thumbnail/place-thumbnails';
	Roblox.Endpoints.Urls['/thumbnail/place-thumbnails-partial'] = 'https://www.roblox.com/thumbnail/place-thumbnails-partial';
	Roblox.Endpoints.Urls['/thumbnail_holder/g'] = 'https://www.roblox.com/thumbnail_holder/g';
	Roblox.Endpoints.Urls['/users/{id}/profile'] = 'https://www.roblox.com/users/{id}/profile';
	Roblox.Endpoints.Urls['/service-workers/push-notifications'] = 'https://www.roblox.com/service-workers/push-notifications';
	Roblox.Endpoints.Urls['/notification-stream/notification-stream-data'] = 'https://www.roblox.com/notification-stream/notification-stream-data';
	Roblox.Endpoints.Urls['/api/friends/acceptfriendrequest'] = 'https://www.roblox.com/api/friends/acceptfriendrequest';
	Roblox.Endpoints.Urls['/api/friends/declinefriendrequest'] = 'https://www.roblox.com/api/friends/declinefriendrequest';
	Roblox.Endpoints.Urls['/authentication/is-logged-in'] = 'https://www.roblox.com/authentication/is-logged-in';
	Roblox.Endpoints.addCrossDomainOptionsToAllRequests = true;
	</script>
	<script>
	if(typeof(Roblox) === "undefined") {
		Roblox = {};
	}
	Roblox.Endpoints = Roblox.Endpoints || {};
	Roblox.Endpoints.Urls = Roblox.Endpoints.Urls || {};
	</script>
	<script>
	Roblox = Roblox || {};
	Roblox.AbuseReportPVMeta = {
		desktopEnabled: true,
		phoneEnabled: false,
		inAppEnabled: false
	};
	</script>

	<body id=rbx-body data-performance-relative-value=0.005 data-internal-page-name=Create data-send-event-percentage=0>
		<div id=roblox-linkify data-enabled=true data-regex="(https?\:\/\/)?(?:www\.)?([a-z0-9-]{2,}\.)*(((m|de|www|web|api|blog|wiki|corp|polls|bloxcon|developer|devforum|forum)\.roblox\.com|robloxlabs\.com)|(www\.shoproblox\.com)|help\.roblox\.com(?![A-Za-z0-9\/.]*\/attachments\/))(?!\/[A-Za-z0-9-+&amp;@#\/=~_|!:,.;]*%)((\/[A-Za-z0-9-+&amp;@#\/%?=~_|!:,.;]*)|(?=\s|\b))" data-regex-flags=gm data-as-http-regex=(([^.]help|polls)\.roblox\.com)></div>
		<div id=image-retry-data data-image-retry-max-times=10 data-image-retry-timer=1500 data-ga-logging-percent=10></div>
		<div id=http-retry-data data-http-retry-max-timeout=0 data-http-retry-base-timeout=0 data-http-retry-max-times=1></div>
		<div ng-modules=baseTemplateApp>
			<script src=https://js.rbxcdn.com/cbd9a121217c4887264ffe32686ecd52.js.gzip></script>
		</div>
		<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=LegacyStyleGuide src=https://js.rbxcdn.com/b819b6f478b3d1c43fdcdd11a19b526769c5fae5dadbcf7b9c8590cca1407da0.js></script>
		<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=NotificationStream src=https://js.rbxcdn.com/8247b4782d09fc937d74cfd74b7e524b8ca057239d691ce1af2a488392df0499.js></script>
		<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=Chat src=https://js.rbxcdn.com/54b3d6bacb9354a5abe5524e4160eadd123934187d8b81fb37b025f992299c0b.js></script>
		<div ng-modules=pageTemplateApp>
			<script>
			"use strict";
			angular.module("pageTemplateApp", []).run(['$templateCache', function($templateCache) {}]);
			</script>
		</div>
		<div id=fb-root></div>
		<div id=modal-confirmation class=modal-confirmation data-modal-type=confirmation>
			<div id=modal-dialog class=modal-dialog>
				<div class=modal-content>
					<div class=modal-header>
						<button type=button class=close data-dismiss=modal> <span aria-hidden=true><span class=icon-close></span></span><span class=sr-only>Close</span> </button>
						<h5 class=modal-title></h5></div>
					<div class=modal-body>
						<div class=modal-top-body>
							<div class=modal-message></div>
							<div class="modal-image-container roblox-item-image" data-image-size=medium data-no-overlays data-no-click><img class=modal-thumb alt="generic image"></div>
							<div class="modal-checkbox checkbox">
								<input id=modal-checkbox-input type=checkbox>
								<label for=modal-checkbox-input></label>
							</div>
						</div>
						<div class=modal-btns><a href="" id=confirm-btn><span></span></a> <a href="" id=decline-btn><span></span></a></div>
						<div class="loading modal-processing"><img class=loading-default src=https://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif alt=Processing...></div>
					</div>
					<div class="modal-footer text-footer"></div>
				</div>
			</div>
		</div>
		<div class="nav-container no-gutter-ads">
			<div id=header class="navbar-fixed-top rbx-header gotham-font" data-isauthenticated=true role=navigation>
				<div class=container-fluid>
					<div class=rbx-navbar-header>
						<div data-behavior=nav-notification class=rbx-nav-collapse onselectstart="return false"><span class=icon-nav-menu></span></div>
						<div class=navbar-header>
							<a class=navbar-brand href="https://www.roblox.com/"> <span class=icon-logo></span> <span class=icon-logo-r></span> </a>
						</div>
					</div>
					<ul class="nav rbx-navbar hidden-xs hidden-sm col-md-4 col-lg-3">
						<li class=cursor-pointer><a class="font-header-2 nav-menu-title text-header" href=https://www.roblox.com/games>Games</a>
							<li class=cursor-pointer><a class="font-header-2 nav-menu-title text-header" href="https://www.roblox.com/catalog/">Catalog</a>
								<li class=cursor-pointer><a class="font-header-2 nav-menu-title text-header" href=https://www.roblox.com/develop>Create</a>
									<li class=cursor-pointer><a class="font-header-2 buy-robux nav-menu-title text-header" href="https://www.roblox.com/upgrades/robux?ctx=nav">Robux</a></ul>
					<div id=navbar-universal-search class="navbar-left rbx-navbar-search col-xs-5 col-sm-6 col-md-3" data-behavior=univeral-search role=search>
						<div class=input-group>
							<input id=navbar-search-input class="form-control input-field" type=text placeholder=Search maxlength=120>
							<div class=input-group-btn>
								<button id=navbar-search-btn class=input-addon-btn type=submit> <span class=icon-nav-search></span> </button>
							</div>
						</div>
						<ul data-toggle=dropdown-menu class=dropdown-menu role=menu>
							<li class="rbx-navbar-search-option rbx-clickable-li selected" data-searchurl="https://www.roblox.com/develop/library?CatalogContext=2&amp;Category=6&amp;Keyword=">
								<a class=rbx-navbar-search-anchor href="https://www.roblox.com/develop/library?CatalogContext=2&amp;Category=6&amp;Keyword="> <span class=rbx-navbar-search-text> Search "<span class=rbx-navbar-search-string></span>" in Library</span>
								</a>
								<li class="rbx-navbar-search-option rbx-clickable-li" data-searchurl="https://www.roblox.com/search/users?keyword=">
									<a class=rbx-navbar-search-anchor href="https://www.roblox.com/search/users?keyword="> <span class=rbx-navbar-search-text> Search "<span class=rbx-navbar-search-string></span>" in Players</span>
									</a>
									<li class="rbx-navbar-search-option rbx-clickable-li" data-searchurl="https://www.roblox.com/games/?Keyword=">
										<a class=rbx-navbar-search-anchor href="https://www.roblox.com/games/?Keyword="> <span class=rbx-navbar-search-text> Search "<span class=rbx-navbar-search-string></span>" in Games</span>
										</a>
										<li class="rbx-navbar-search-option rbx-clickable-li" data-searchurl="https://www.roblox.com/catalog/browse.aspx?CatalogContext=1&amp;Keyword=">
											<a class=rbx-navbar-search-anchor href="https://www.roblox.com/catalog/browse.aspx?CatalogContext=1&amp;Keyword="> <span class=rbx-navbar-search-text> Search "<span class=rbx-navbar-search-string></span>" in Catalog</span>
											</a>
											<li class="rbx-navbar-search-option rbx-clickable-li" data-searchurl="https://www.roblox.com/search/groups?keyword=">
												<a class=rbx-navbar-search-anchor href="https://www.roblox.com/search/groups?keyword="> <span class=rbx-navbar-search-text> Search "<span class=rbx-navbar-search-string></span>" in Groups</span>
												</a>
						</ul>
					</div>
					<div class="navbar-right rbx-navbar-right">
						<ul class="nav navbar-right rbx-navbar-icon-group">
							<li id=navbar-setting class=navbar-icon-item>
								<a class="rbx-menu-item roblox-popover-close" data-toggle=popover data-bind=popover-setting data-viewport=#header> <span class="icon-nav-settings roblox-popover-close" id=nav-settings></span> <span class="notification-red notification nav-setting-highlight">1</span> </a>
								<div class=rbx-popover-content data-toggle=popover-setting>
									<ul class=dropdown-menu role=menu>
										<li><a class=rbx-menu-item href=https://www.roblox.com/my/account> Settings <span class="notification-blue notification nav-setting-highlight">1</span> </a>
											<li><a class=rbx-menu-item href="https://www.roblox.com/info/help?locale=en_us" target=_blank>Help</a>
												<li><a class=rbx-menu-item data-behavior=logout data-bind=https://auth.roblox.com/v2/logout>Logout</a></ul>
								</div>
								<li id=navbar-robux class=navbar-icon-item>
									<a id=nav-robux-icon class="nav-robux-icon rbx-menu-item" data-toggle=popover data-bind=popover-robux> <span class="icon-nav-robux roblox-popover-close" id=nav-robux></span> <span class="rbx-text-navbar-right text-header" id=nav-robux-amount></span> </a>
									<div class=rbx-popover-content data-toggle=popover-robux>
										<ul class=dropdown-menu role=menu>
											<li><a href=https://www.roblox.com/My/Money.aspx#/#Summary_tab id=nav-robux-balance class=rbx-menu-item> Robux</a>
												<li><a href="https://www.roblox.com/upgrades/robux?ctx=navpopover" class=rbx-menu-item>Buy Robux</a></ul>
									</div>
									<li class="navbar-icon-item navbar-stream">
										<div id=notification-stream-icon-container notification-stream-icon></div>
										<li class=rbx-navbar-right-search data-toggle=toggle-search>
											<a class="rbx-menu-icon rbx-menu-item"> <span class=icon-nav-search-white></span> </a>
						</ul>
						<div class="xsmall age-bracket-label text-header"><span class="age-bracket-label-username font-caption-header">pepsiboy6000: </span>13+</div>
					</div>
					<ul class="nav rbx-navbar hidden-md hidden-lg col-xs-12">
						<li class=cursor-pointer><a class="font-header-2 nav-menu-title text-header" href=https://www.roblox.com/games>Games</a>
							<li class=cursor-pointer><a class="font-header-2 nav-menu-title text-header" href="https://www.roblox.com/catalog/">Catalog</a>
								<li class=cursor-pointer><a class="font-header-2 nav-menu-title text-header" href=https://www.roblox.com/develop>Create</a>
									<li class=cursor-pointer><a class="font-header-2 buy-robux nav-menu-title text-header" href="https://www.roblox.com/upgrades/robux?ctx=nav">Robux</a></ul>
				</div>
			</div>
			<div id=navigation class="rbx-left-col gotham-font" data-behavior=left-col>
				<ul>
					<li class=text-lead><a class="text-nav font-header-2 text-overflow" href=https://www.roblox.com/users/886284560/profile>pepsiboy6000</a>
						<li class=rbx-divider>
				</ul>
				<div class=rbx-scrollbar data-toggle=scrollbar onselectstart="return false">
					<ul class=left-col-list>
						<li>
							<a href=https://www.roblox.com/home id=nav-home class="dynamic-overflow-container text-nav">
								<div><span class=icon-nav-home></span></div><span class="font-header-2 dynamic-ellipsis-item">Home</span> </a>
							<li>
								<a href=https://www.roblox.com/users/886284560/profile id=nav-profile class="dynamic-overflow-container text-nav">
									<div><span class=icon-nav-profile></span></div><span class="font-header-2 dynamic-ellipsis-item">Profile</span> </a>
								<li id=navigation-messages>
									<a href=https://www.roblox.com/my/messages/#!/inbox id=nav-message data-count=0 class="dynamic-overflow-container text-nav">
										<div><span class=icon-nav-message></span></div><span class="font-header-2 dynamic-ellipsis-item" title=Messages>Messages</span>
										<div class="dynamic-width-item align-right"><span class="notification-blue notification hide" title=0></span></div>
									</a>
									<li id=navigation-friends>
										<a href="" id=nav-friends data-count=0 class="dynamic-overflow-container text-nav">
											<div><span class=icon-nav-friends></span></div><span class="font-header-2 dynamic-ellipsis-item" title=Friends>Friends</span>
											<div class="dynamic-width-item align-right"><span class="notification-blue notification hide" title=0></span></div>
										</a>
										<li>
											<a href=https://www.roblox.com/my/avatar id=nav-character class="dynamic-overflow-container text-nav">
												<div><span class=icon-nav-charactercustomizer></span></div><span class="font-header-2 dynamic-width-item">Avatar</span> </a>
											<li>
												<a href=https://www.roblox.com/users/886284560/inventory id=nav-inventory class="dynamic-overflow-container text-nav">
													<div><span class=icon-nav-inventory></span></div><span class="font-header-2 dynamic-width-item">Inventory</span> </a>
												<li>
													<a href=https://www.roblox.com/my/money.aspx#/#TradeItems_tab id=nav-trade class="dynamic-overflow-container text-nav">
														<div><span class=icon-nav-trade></span></div><span class="font-header-2 dynamic-ellipsis-item">Trade</span>
														<div class="dynamic-width-item align-right"><span class="notification-blue notification hide"></span></div>
													</a>
													<li>
														<a href=https://www.roblox.com/my/groups id=nav-group class="dynamic-overflow-container text-nav">
															<div><span class=icon-nav-group></span></div><span class="font-header-2 dynamic-ellipsis-item">Groups</span> </a>
														<li>
															<a href="https://www.roblox.com/feeds/" id=nav-my-feed class="dynamic-overflow-container text-nav">
																<div><span class=icon-nav-my-feed></span></div><span class="font-header-2 dynamic-ellipsis-item">My Feed</span> </a>
															<li>
																<a href=https://blog.roblox.com id=nav-blog class="dynamic-overflow-container text-nav">
																	<div><span class=icon-nav-blog></span></div><span class="font-header-2 dynamic-ellipsis-item">Blog</span> </a>
																<li>
																	<a id=nav-shop class="dynamic-overflow-container text-nav roblox-shop-interstitial">
																		<div><span class=icon-nav-shop></span></div><span class="font-header-2 dynamic-ellipsis-item">Shop</span> </a>
																	<li class=rbx-upgrade-now><a href="https://www.roblox.com/premium/membership?ctx=leftnav" class="btn-growth-md btn-secondary-md" id=upgrade-now-button>Upgrade Now</a>
																		<li class="font-bold small text-nav">Events
																			<li class=rbx-nav-sponsor ng-non-bindable>
																				<a class="text-nav menu-item" href=https://www.roblox.com/sponsored/weeklygames title=weeklygames> <img src=https://images.rbxcdn.com/20fca360a84928e9a10145540f759331> </a>
																				<li class=rbx-nav-sponsor ng-non-bindable>
																					<a class="text-nav menu-item" href=https://www.roblox.com/sponsored/creatorgodzilla title=creatorgodzilla> <img src=https://images.rbxcdn.com/aba8bf01efe1ae9942498eb94e0a0498> </a>
					</ul>
				</div>
			</div>
			<div id=i18nForAmazonShopSwitch data-is-i18n-enabled-for-shop-amazon-dialog=true data-amazon-store-url="https://www.amazon.com/roblox?&amp;_encoding=UTF8&amp;tag=r05d13-20&amp;linkCode=ur2&amp;linkId=4ba2e1ad82f781c8e8cc98329b1066d0&amp;camp=1789&amp;creative=9325" style=display:none></div>
			<script>
			var Roblox = Roblox || {};
			(function() {
				if(Roblox && Roblox.Performance) {
					Roblox.Performance.setPerformanceMark("navigation_end");
				}
			})();
			</script>
			<div id=navContent class="nav-content logged-in">
				<div class=nav-content-inner>
					<div id=MasterContainer>
						<script>
						if(top.location != self.location) {
							top.location = self.location.href;
						}
						</script>
						<script>
						$(function() {
							function trackReturns() {
								function dayDiff(d1, d2) {
									return Math.floor((d1 - d2) / 86400000);
								}
								if(!localStorage) {
									return false;
								}
								var cookieName = 'RBXReturn';
								var cookieOptions = {
									expires: 9001
								};
								var cookieStr = localStorage.getItem(cookieName) || "";
								var cookie = {};
								try {
									cookie = JSON.parse(cookieStr);
								} catch(ex) {}
								try {
									if(typeof cookie.ts === "undefined" || isNaN(new Date(cookie.ts))) {
										localStorage.setItem(cookieName, JSON.stringify({
											ts: new Date().toDateString()
										}));
										return false;
									}
								} catch(ex) {
									return false;
								}
								var daysSinceFirstVisit = dayDiff(new Date(), new Date(cookie.ts));
								if(daysSinceFirstVisit == 1 && typeof cookie.odr === "undefined") {
									RobloxEventManager.triggerEvent('rbx_evt_odr', {});
									cookie.odr = 1;
								}
								if(daysSinceFirstVisit >= 1 && daysSinceFirstVisit <= 7 && typeof cookie.sdr === "undefined") {
									RobloxEventManager.triggerEvent('rbx_evt_sdr', {});
									cookie.sdr = 1;
								}
								try {
									localStorage.setItem(cookieName, JSON.stringify(cookie));
								} catch(ex) {
									return false;
								}
							}
							GoogleListener.init();
							RobloxEventManager.initialize(true);
							RobloxEventManager.triggerEvent('rbx_evt_pageview');
							trackReturns();
							RobloxEventManager._idleInterval = 450000;
							RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_start');
							RobloxEventManager.registerCookieStoreEvent('rbx_evt_ftp');
							RobloxEventManager.registerCookieStoreEvent('rbx_evt_initial_install_success');
							RobloxEventManager.registerCookieStoreEvent('rbx_evt_fmp');
							RobloxEventManager.startMonitor();
						});
						</script>
						<div>
							<div class=alert-container>
								<noscript>
									<div class=alert-info>Please enable Javascript to use all the features on this site.</div>
								</noscript>
							</div>
							<div id=AdvertisingLeaderboard>
								<iframe name=Roblox_Default_Top_728x90 allowtransparency=true frameborder=0 height=110 scrolling=no data-src="" src=https://www.roblox.com/user-sponsorship/1 width=728 data-js-adtype=iframead data-ad-slot=Roblox_Default_Top_728x90></iframe>
							</div>
							<div id=BodyWrapper>
								<div id=RepositionBody>
									<div id=Body class=body-width>
										<div id=TosAgreementInfo data-terms-check-needed=True></div>
										<input name=__RequestVerificationToken type=hidden value=Ec4y_K8LiE04p0fzCWwwWIYY78dkQitS7GsNGibV2Z9WYmNO2WtB0EPYT4Zg1WOEvc_NRbKqfqcIpOYPZZVjp99-4EiauGyW_kjli9osvqLBXKTU0>
										<div id=DevelopTabs class=tab-container>
											<div id=MyCreationsTabLink class=tab-active data-url=/develop>My Creations</div>
											<div id=GroupCreationsTabLink data-url=/develop/groups data-default-get-url=/build/buildview style=display:none>Group Creations</div>
											<div id=LibraryTabLink data-url=/develop/library data-library-get-url="/catalog/contents?CatalogContext=DevelopOnly&amp;Category=Models">Library</div>
											<div id=DevExTabLink data-url=/develop/developer-exchange>Developer Exchange</div>
										</div>
										<div>
											<div id=MyCreationsTab class=tab-active>
												<div class=BuildPageContent data-groupid="">
													<input id=assetTypeId name=assetTypeId type=hidden value=0>
													<input data-val=true data-val-required="The IsTgaUploadEnabled field is required." id=isTgaUploadEnabled name=isTgaUploadEnabled type=hidden value=True>
													<table id=build-page data-asset-type-id=0 data-showcases-enabled=true data-edit-opens-studio=False>
														<tr>
															<td class="menu-area divider-right"><a href="https://www.roblox.com/develop?Page=universes" class="tab-item tab-item-selected">Games</a> <a href="https://www.roblox.com/develop?View=9" class=tab-item>Places</a> <a href="https://www.roblox.com/develop?View=10" class=tab-item>Models</a> <a href="https://www.roblox.com/develop?View=13" class=tab-item>Decals</a> <a href="https://www.roblox.com/develop?View=21" class=tab-item>Badges</a> <a href="https://www.roblox.com/develop?Page=game-passes" class=tab-item>Game Passes</a> <a href="https://www.roblox.com/develop?View=3" class=tab-item>Audio</a> <a href="https://www.roblox.com/develop?View=24" class=tab-item>Animations</a> <a href="https://www.roblox.com/develop?View=40" class=tab-item>Meshes</a> <a href="https://www.roblox.com/develop?Page=ads" class=tab-item>User Ads</a> <a href="https://www.roblox.com/develop?Page=sponsored-games" class=tab-item>Sponsored Games</a> <a href="https://www.roblox.com/develop?View=11" class=tab-item>Shirts</a> <a href="https://www.roblox.com/develop?View=2" class=tab-item>T-Shirts</a> <a href="https://www.roblox.com/develop?View=12" class=tab-item>Pants</a> <a href="https://www.roblox.com/develop?View=38" class=tab-item>Plugins</a>
																<div id=StudioWidget>
																	<div class=widget-name>
																		<h3>Developer Resources</h3></div>
																	<div class=content>
																		<div id=LeftColumn>
																			<div class=studio-icon><img src=https://images.rbxcdn.com/3da410727fa2670dcb4f31316643138a.svg.gzip></div>
																		</div>
																		<div id=RightColumn>
																			<ul>
																				<li><a href="https://www.robloxdev.com/">Docs</a>
																					<li><a href="https://devforum.roblox.com/">Community</a></ul>
																		</div>
																	</div>
																</div>
																<td class=content-area><a href=https://www.roblox.com/places/create id=CreatePlace class="create-new-button btn-medium btn-primary">Create New Game</a>
																	<table class=section-header>
																		<tr>
																			<td class=content-title>
																				<div>
																					<h2 class=header-text>Games</h2><span class=aside-text data-active-count=1 data-max-active-count=200></span>
																					<label class="checkbox-label active-only-checkbox">
																						<input type=checkbox>Show Public Only</label>
																				</div>
																	</table>
																	<div class=items-container>
																		<table class=item-table data-item-id=945325985 data-rootplace-id=2633036893 data-in-showcase=false data-configure-url="https://www.roblox.com/universes/configure?id=945325985" data-configure-localization-url=https://www.roblox.com/localization/games/945325985/configure data-create-badge-url="https://www.roblox.com/develop?selectedPlaceId=2633036893&amp;View=21" data-create-gamepass-url="https://www.roblox.com/develop?selectedPlaceId=2633036893&amp;View=34" data-developerstats-url=https://www.roblox.com/places/2633036893/stats data-advertise-url="https://www.roblox.com/My/NewUserAd.aspx?targetId=2633036893&amp;targettype=Asset" data-activate-universe-url=https://develop.roblox.com/v1/universes/945325985/activate data-deactivate-universe-url=https://develop.roblox.com/v1/universes/945325985/deactivate data-type=universes>
																			<tr>
																				<td class="image-col universe-image-col" style=text-align:center>
																					<a href="https://www.roblox.com/universes/configure?id=945325985" class=game-image> <img src=https://t0.rbxcdn.com/f57581e621a200d45ac8f2144f4665de alt="pepsiboy6000's Place"> </a>
																					<td class=universe-name-col><a class="title notranslate" href="https://www.roblox.com/universes/configure?id=945325985">pepsiboy6000&#39;s Place</a>
																						<table class=details-table>
																							<tr>
																								<td class=item-universe><span>Start Place:</span> <a class="title notranslate start-place-url" href=https://www.roblox.com/games/2633036893/pepsiboy6000s-Place>pepsiboy6000&#39;s Place</a>
																									<tr class=activate-cell>
																										<td><a class=place-active href="https://www.roblox.com/universes/configure?id=945325985">Public</a></tr>
																						</table>
																						<td class=edit-col><a class="roblox-edit-button btn-control btn-control-large" href=javascript:>Edit</a>
																							<td class=menu-col>
																								<div class=gear-button-wrapper>
																									<a href=# class=gear-button></a>
																								</div>
																		</table>
																		<div class=separator></div><a href=javascript: class="load-more-universes btn-control btn-control-small">More Games</a></div>
																	<div class=build-loading-container style=display:none>
																		<div class=buildpage-loading-container><img alt=^_^ src=https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif></div>
																	</div>
													</table>
													<div id=build-dropdown-menu><a href=# data-href-reference=configure-url>Configure Game</a> <a href=# data-require-root-place=true data-configure-place-template=https://www.roblox.com/places/0/update>Configure Start Place</a> <a href=# data-href-reference=configure-localization-url id=configure-localization-link>Configure Localization</a> <a href=# class=divider-top data-href-reference=create-badge-url data-require-root-place=true>Create Badge</a> <a href=# data-href-reference=create-gamepass-url data-require-root-place=true>Create Game Pass</a> <a href="https://www.roblox.com/catalog/browse.aspx?Category=5&amp;showInstructions=true" data-require-root-place=true>Add Gear</a> <a href=# data-href-reference=developerstats-url data-require-root-place=true>Developer Stats</a> <a href=# data-href-reference=advertise-url class=divider-top>Advertise</a> <a href=# class=sponsorGameLink data-href-template=https://www.roblox.com/sponsored-games/create/0 data-require-root-place=true>Sponsor</a> <a class="shutdown-all-servers-button divider-top" href=# data-require-root-place=true>Shut Down All Servers</a></div>
													<div class="PlaceSelectorModal modalPopup unifiedModal" style=display:none>
														<div class=Title>Select Place</div>
														<div class="GenericModalBody text">
															<div class=place-selector-modal data-place-loader-url="/universes/get-places-by-context?creationContext=NonGameCreation&amp;universeId=0&amp;groupId=">
																<div class=place-selector-container>
																	<div id=PlaceSelectorItemContainer class=place-selector-item-container></div>
																	<div id=PlaceSelectorPagerContainer class=place-selector-pager-container></div>
																</div>
																<div class="place-selector selectable template" title=Place style=display:none>
																	<div class=place-image data-retry-url-template="/asset-thumbnail/json?height=100&amp;width=160&amp;format=jpeg&amp;returnAutoGenerated=True"><img alt=^_^ class=item-image src=https://images.rbxcdn.com/ec5c01d220bf1b73403fa51519267742.gif></div>
																	<div class=InfoContainer>
																		<div class=place-name></div>
																		<div class=game-name><span class=form-label>Game: </span><span class=game-name-text></span></div>
																		<div class=root-place style=display:none><span>Cannot choose start places</span></div>
																	</div>
																	<div style=clear:both></div>
																</div>
															</div>
														</div>
													</div>
													<script>
													$(function() {
														Roblox.PlaceSelector.Init();
														Roblox.PlaceSelector.Resources = {
															anErrorOccurred: 'An error occurred, please try again.'
														};
													});
													</script>
													<div class="GenericModal modalPopup unifiedModal smallModal" style=display:none>
														<div class=Title></div>
														<div class=GenericModalBody>
															<div>
																<div class=ImageContainer><img class=GenericModalImage alt="generic image"></div>
																<div class=Message></div>
															</div>
															<div class=GenericModalButtonContainer><a class="ImageButton btn-neutral btn-large roblox-ok">OK</a></div>
														</div>
													</div>
													<script>
													Roblox = Roblox || {};
													Roblox.BuildPage = Roblox.BuildPage || {};
													Roblox.BuildPage.AlertURL = "https://images.rbxcdn.com/43ac54175f3f3cd403536fedd9170c10.png";
													</script>
												</div>
												<div class=Ads_WideSkyscraper>
													<iframe name=Roblox_Build_Right_160x600 allowtransparency=true frameborder=0 height=612 scrolling=no data-src="" src=https://www.roblox.com/user-sponsorship/2 width=160 data-js-adtype=iframead data-ad-slot=Roblox_Build_Right_160x600></iframe>
												</div>
												<script>
												if(typeof Roblox === "undefined") {
													Roblox = {};
												}
												if(typeof Roblox.BuildPage === "undefined") {
													Roblox.BuildPage = {};
												}
												Roblox.BuildPage.Resources = {
													active: "Public",
													inactive: "Private",
													activatePlace: "Make Place Public",
													editGame: "Edit Game",
													ok: "OK",
													robloxStudio: "ROBLOX Studio",
													openIn: "To edit this game, open to this page in ",
													placeInactive: "Make Place Private",
													toBuileHere: "To build here, please activate this place by clicking the ",
													inactiveButton: "inactive button. ",
													createModel: "Create Model",
													toCreate: "To create models, please use ",
													makeActive: "Make Public",
													makeInactive: "Make Private",
													purchaseComplete: "Purchase Complete!",
													youHaveBid: "You have successfully bid ",
													confirmBid: "Confirm the Bid",
													placeBid: "Place Bid",
													cancel: "Cancel",
													errorOccurred: "Error Occurred",
													adDeleted: "Ad Deleted",
													theAdWasDeleted: "The Ad has been deleted.",
													confirmDelete: "Confirm Deletion",
													areYouSureDelete: "Are you sure you want to delete this Ad?",
													bidRejected: "Your bid was Rejected",
													bidRange: "Bid value must be a number between ",
													bidRange2: "Bid value must be a number greater than ",
													and: " and ",
													yourRejected: "Your bid was Rejected",
													estimatorExplanation: "This estimator uses data from ads run yesterday to guess how many impressions your ad will recieve.",
													estimatedImpressions: "Estimated Impressions ",
													makeAdBid: "Make Ad Bid",
													wouldYouLikeToBid: "Would you like to bid ",
													verify: "Verify",
													emailVerifiedTitle: "Verify Your Email",
													emailVerifiedMessage: "You must verify your email before you can work on your place. You can verify your email on the <a href='https://www.roblox.com/my/account?confirmemail=1'>Account</a> page.",
													continueText: "Continue",
													profileRemoveTitle: "Remove from profile?",
													profileRemoveMessage: "This game is private and listed on your profile, do you wish to remove it?",
													profileAddTitle: "Add to profile?",
													profileAddMessage: "This game is public, but not listed on your profile, do you wish to add it?",
													deactivateTitle: "Make Game Private",
													deactivateBody: "This will shut down any running games <br /><br />Do you still want to make this game private?",
													deactivateButton: "Make Private",
													questionmarkImgUrl: "https://static.rbxcdn.com/images/Buttons/questionmark-12x12.png",
													activationRequestFailed: "Request to make game public failed. Please retry in a few minutes!",
													deactivationRequestFailed: "Request to make game private failed. Please retry in a few minutes!",
													tooManyActiveMessage: "You have reached the maximum number of public places for your membership level. Make one of your existing places private before making this place public.",
													activeSlotsMessage: "{0} of {1} public slots used"
												};
												</script>
											</div>
											<div id=GroupCreationsTab style=display:none>
												<div class=BuildPageContent data-groupid="">
													<input id=assetTypeId name=assetTypeId type=hidden value=0>
													<input data-val=true data-val-required="The IsTgaUploadEnabled field is required." id=isTgaUploadEnabled name=isTgaUploadEnabled type=hidden value=True>
													<table id=build-page data-asset-type-id=0 data-showcases-enabled=true data-edit-opens-studio=False>
														<tr>
															<td class="menu-area divider-right"><a href="https://www.roblox.com/develop?Page=universes" class="tab-item tab-item-selected">Games</a> <a href="https://www.roblox.com/develop?View=9" class=tab-item>Places</a> <a href="https://www.roblox.com/develop?View=10" class=tab-item>Models</a> <a href="https://www.roblox.com/develop?View=13" class=tab-item>Decals</a> <a href="https://www.roblox.com/develop?View=21" class=tab-item>Badges</a> <a href="https://www.roblox.com/develop?Page=game-passes" class=tab-item>Game Passes</a> <a href="https://www.roblox.com/develop?View=3" class=tab-item>Audio</a> <a href="https://www.roblox.com/develop?View=24" class=tab-item>Animations</a> <a href="https://www.roblox.com/develop?View=40" class=tab-item>Meshes</a> <a href="https://www.roblox.com/develop?Page=ads" class=tab-item>User Ads</a> <a href="https://www.roblox.com/develop?Page=sponsored-games" class=tab-item>Sponsored Games</a> <a href="https://www.roblox.com/develop?View=11" class=tab-item>Shirts</a> <a href="https://www.roblox.com/develop?View=2" class=tab-item>T-Shirts</a> <a href="https://www.roblox.com/develop?View=12" class=tab-item>Pants</a> <a href="https://www.roblox.com/develop?View=38" class=tab-item>Plugins</a>
																<div id=StudioWidget>
																	<div class=widget-name>
																		<h3>Developer Resources</h3></div>
																	<div class=content>
																		<div id=LeftColumn>
																			<div class=studio-icon><img src=https://images.rbxcdn.com/3da410727fa2670dcb4f31316643138a.svg.gzip></div>
																		</div>
																		<div id=RightColumn>
																			<ul>
																				<li><a href="https://www.robloxdev.com/">Docs</a>
																					<li><a href="https://devforum.roblox.com/">Community</a></ul>
																		</div>
																	</div>
																</div>
																<td class=content-area><a href=https://www.roblox.com/places/create id=CreatePlace class="create-new-button btn-medium btn-primary">Create New Game</a>
																	<table class=section-header>
																		<tr>
																			<td class=content-title>
																				<div>
																					<h2 class=header-text>Games</h2><span class=aside-text data-active-count=1 data-max-active-count=200></span>
																					<label class="checkbox-label active-only-checkbox">
																						<input type=checkbox>Show Public Only</label>
																				</div>
																	</table>
																	<div class=items-container>
																		<table class=item-table data-item-id=945325985 data-rootplace-id=2633036893 data-in-showcase=false data-configure-url="https://www.roblox.com/universes/configure?id=945325985" data-configure-localization-url=https://www.roblox.com/localization/games/945325985/configure data-create-badge-url="https://www.roblox.com/develop?selectedPlaceId=2633036893&amp;View=21" data-create-gamepass-url="https://www.roblox.com/develop?selectedPlaceId=2633036893&amp;View=34" data-developerstats-url=https://www.roblox.com/places/2633036893/stats data-advertise-url="https://www.roblox.com/My/NewUserAd.aspx?targetId=2633036893&amp;targettype=Asset" data-activate-universe-url=https://develop.roblox.com/v1/universes/945325985/activate data-deactivate-universe-url=https://develop.roblox.com/v1/universes/945325985/deactivate data-type=universes>
																			<tr>
																				<td class="image-col universe-image-col" style=text-align:center>
																					<a href="https://www.roblox.com/universes/configure?id=945325985" class=game-image> <img src=https://t0.rbxcdn.com/f57581e621a200d45ac8f2144f4665de alt="pepsiboy6000's Place"> </a>
																					<td class=universe-name-col><a class="title notranslate" href="https://www.roblox.com/universes/configure?id=945325985">pepsiboy6000&#39;s Place</a>
																						<table class=details-table>
																							<tr>
																								<td class=item-universe><span>Start Place:</span> <a class="title notranslate start-place-url" href=https://www.roblox.com/games/2633036893/pepsiboy6000s-Place>pepsiboy6000&#39;s Place</a>
																									<tr class=activate-cell>
																										<td><a class=place-active href="https://www.roblox.com/universes/configure?id=945325985">Public</a></tr>
																						</table>
																						<td class=edit-col><a class="roblox-edit-button btn-control btn-control-large" href=javascript:>Edit</a>
																							<td class=menu-col>
																								<div class=gear-button-wrapper>
																									<a href=# class=gear-button></a>
																								</div>
																		</table>
																		<div class=separator></div><a href=javascript: class="load-more-universes btn-control btn-control-small">More Games</a></div>
																	<div class=build-loading-container style=display:none>
																		<div class=buildpage-loading-container><img alt=^_^ src=https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif></div>
																	</div>
													</table>
													<div id=build-dropdown-menu><a href=# data-href-reference=configure-url>Configure Game</a> <a href=# data-require-root-place=true data-configure-place-template=https://www.roblox.com/places/0/update>Configure Start Place</a> <a href=# data-href-reference=configure-localization-url id=configure-localization-link>Configure Localization</a> <a href=# class=divider-top data-href-reference=create-badge-url data-require-root-place=true>Create Badge</a> <a href=# data-href-reference=create-gamepass-url data-require-root-place=true>Create Game Pass</a> <a href="https://www.roblox.com/catalog/browse.aspx?Category=5&amp;showInstructions=true" data-require-root-place=true>Add Gear</a> <a href=# data-href-reference=developerstats-url data-require-root-place=true>Developer Stats</a> <a href=# data-href-reference=advertise-url class=divider-top>Advertise</a> <a href=# class=sponsorGameLink data-href-template=https://www.roblox.com/sponsored-games/create/0 data-require-root-place=true>Sponsor</a> <a class="shutdown-all-servers-button divider-top" href=# data-require-root-place=true>Shut Down All Servers</a></div>
													<div class="PlaceSelectorModal modalPopup unifiedModal" style=display:none>
														<div class=Title>Select Place</div>
														<div class="GenericModalBody text">
															<div class=place-selector-modal data-place-loader-url="/universes/get-places-by-context?creationContext=NonGameCreation&amp;universeId=0&amp;groupId=">
																<div class=place-selector-container>
																	<div id=PlaceSelectorItemContainer class=place-selector-item-container></div>
																	<div id=PlaceSelectorPagerContainer class=place-selector-pager-container></div>
																</div>
																<div class="place-selector selectable template" title=Place style=display:none>
																	<div class=place-image data-retry-url-template="/asset-thumbnail/json?height=100&amp;width=160&amp;format=jpeg&amp;returnAutoGenerated=True"><img alt=^_^ class=item-image src=https://images.rbxcdn.com/ec5c01d220bf1b73403fa51519267742.gif></div>
																	<div class=InfoContainer>
																		<div class=place-name></div>
																		<div class=game-name><span class=form-label>Game: </span><span class=game-name-text></span></div>
																		<div class=root-place style=display:none><span>Cannot choose start places</span></div>
																	</div>
																	<div style=clear:both></div>
																</div>
															</div>
														</div>
													</div>
													<script>
													$(function() {
														Roblox.PlaceSelector.Init();
														Roblox.PlaceSelector.Resources = {
															anErrorOccurred: 'An error occurred, please try again.'
														};
													});
													</script>
													<div class="GenericModal modalPopup unifiedModal smallModal" style=display:none>
														<div class=Title></div>
														<div class=GenericModalBody>
															<div>
																<div class=ImageContainer><img class=GenericModalImage alt="generic image"></div>
																<div class=Message></div>
															</div>
															<div class=GenericModalButtonContainer><a class="ImageButton btn-neutral btn-large roblox-ok">OK</a></div>
														</div>
													</div>
													<script>
													Roblox = Roblox || {};
													Roblox.BuildPage = Roblox.BuildPage || {};
													Roblox.BuildPage.AlertURL = "https://images.rbxcdn.com/43ac54175f3f3cd403536fedd9170c10.png";
													</script>
												</div>
												<div class=Ads_WideSkyscraper>
													<iframe name=Roblox_Build_Right_160x600 allowtransparency=true frameborder=0 height=612 scrolling=no data-src="" src=https://www.roblox.com/user-sponsorship/2 width=160 data-js-adtype=iframead data-ad-slot=Roblox_Build_Right_160x600></iframe>
												</div>
												<script>
												if(typeof Roblox === "undefined") {
													Roblox = {};
												}
												if(typeof Roblox.BuildPage === "undefined") {
													Roblox.BuildPage = {};
												}
												Roblox.BuildPage.Resources = {
													active: "Public",
													inactive: "Private",
													activatePlace: "Make Place Public",
													editGame: "Edit Game",
													ok: "OK",
													robloxStudio: "ROBLOX Studio",
													openIn: "To edit this game, open to this page in ",
													placeInactive: "Make Place Private",
													toBuileHere: "To build here, please activate this place by clicking the ",
													inactiveButton: "inactive button. ",
													createModel: "Create Model",
													toCreate: "To create models, please use ",
													makeActive: "Make Public",
													makeInactive: "Make Private",
													purchaseComplete: "Purchase Complete!",
													youHaveBid: "You have successfully bid ",
													confirmBid: "Confirm the Bid",
													placeBid: "Place Bid",
													cancel: "Cancel",
													errorOccurred: "Error Occurred",
													adDeleted: "Ad Deleted",
													theAdWasDeleted: "The Ad has been deleted.",
													confirmDelete: "Confirm Deletion",
													areYouSureDelete: "Are you sure you want to delete this Ad?",
													bidRejected: "Your bid was Rejected",
													bidRange: "Bid value must be a number between ",
													bidRange2: "Bid value must be a number greater than ",
													and: " and ",
													yourRejected: "Your bid was Rejected",
													estimatorExplanation: "This estimator uses data from ads run yesterday to guess how many impressions your ad will recieve.",
													estimatedImpressions: "Estimated Impressions ",
													makeAdBid: "Make Ad Bid",
													wouldYouLikeToBid: "Would you like to bid ",
													verify: "Verify",
													emailVerifiedTitle: "Verify Your Email",
													emailVerifiedMessage: "You must verify your email before you can work on your place. You can verify your email on the <a href='https://www.roblox.com/my/account?confirmemail=1'>Account</a> page.",
													continueText: "Continue",
													profileRemoveTitle: "Remove from profile?",
													profileRemoveMessage: "This game is private and listed on your profile, do you wish to remove it?",
													profileAddTitle: "Add to profile?",
													profileAddMessage: "This game is public, but not listed on your profile, do you wish to add it?",
													deactivateTitle: "Make Game Private",
													deactivateBody: "This will shut down any running games <br /><br />Do you still want to make this game private?",
													deactivateButton: "Make Private",
													questionmarkImgUrl: "https://static.rbxcdn.com/images/Buttons/questionmark-12x12.png",
													activationRequestFailed: "Request to make game public failed. Please retry in a few minutes!",
													deactivationRequestFailed: "Request to make game private failed. Please retry in a few minutes!",
													tooManyActiveMessage: "You have reached the maximum number of public places for your membership level. Make one of your existing places private before making this place public.",
													activeSlotsMessage: "{0} of {1} public slots used"
												};
												</script>
											</div>
											<div id=LibraryTab>
												<div class=loading id=LibraryLoadingIndicatorContainer><img id=LibraryLoadingIndicator src=https://images.rbxcdn.com/ec4e85b0c4396cf753a06fade0a8d8af.gif alt=Progress></div>
											</div>
											<div id=DeveloperExchangeTab>
												<div id=TosAgreementInfo data-terms-check-needed=True></div>
												<div id=DevExLeftColumn class=columnar-container>
													<h2>Welcome to the Roblox Developer Exchange!</h2>
													<p class=indet>The Developer Exchange Program (also known as DevEx) allows you to earn money by creating awesome games on Roblox.
														<p>Once you earn 100,000 Robux or more, you are eligible to convert your virtual earnings to real-world cash.
															<p>To use DevEx, you must agree to DevEx Terms of Service and meet the simple requirements set out in those Terms, some of which are as follows:
																<ul>
																	<li>Member of the <a href="https://www.roblox.com/premium/membership?cashout=obc">Outrageous Builders Club;</a>
																		<li>Minimum of 100,000 earned Robux in your account;
																			<li>Have a <a href="https://www.roblox.com/my/account?confirmemail=1">verified</a> email address;
																				<li>Valid DevEx portal account;
																					<li>13 years of age or older; and
																						<li>Community member in good standing, having complied with <a href=https://www.roblox.com/info/terms>Roblox's Terms of Use</a>.</ul>
																<p>When you meet all the requirements, you will see a "Cash Out" button on this page. Click it and follow the instructions to get your payment started.
																	<p>We recommend that you familiarize yourself with the tax treatment of DevEx payments and the fees associated with different payment methods on DevEx transactions before you cash out.
																		<p>If your request is approved, and if this is your first time cashing out, you will receive an email inviting you to create an account on our DevEx portal. You will be prompted to enter your information at account creation. <strong> Please make sure your information is entered accurately into the DevEx portal, and is kept up to date at all times. </strong> The information you provide is used to ensure all payments comply with laws and regulations. Inaccuracies in information provided could impact your payment.
																			<p>
																				<div><a href=https://en.help.roblox.com/hc/en-us/articles/203314100 target=_blank>More info about DevEx</a></div>
																				<div><a href=https://www.roblox.com/developer-exchange/tos target=_blank>DevEx Terms of Service</a></div>
												</div>
												<div id=DevExRightColumn class=columnar-container>
													<div id=CashOutWidget data-modal="">
														<h2>Developer Exchange: Create games, earn money.</h2>
														<div>
															<h3 id=ExchangeRatesHeader class=space-above>Current Exchange Rates <span>*</span> :</h3>
															<div class=subtitle>
																<div>100K Robux for <span class=robux-text>$350 USD</span></div>
																<div>250K Robux for <span class=robux-text>$875 USD</span></div>
																<div>500K Robux for <span class=robux-text>$1,750 USD</span></div>
																<div>1M Robux for <span class=robux-text>$3,500 USD</span></div>
																<div>2M Robux for <span class=robux-text>$7,000 USD</span></div>
																<div>4M Robux for <span class=robux-text>$14,000 USD</span></div>
																<div>7M Robux for <span class=robux-text>$24,500 USD</span></div>
																<div>10M Robux for <span class=robux-text>$35,000 USD</span></div>
																<div>15M Robux for <span class=robux-text>$52,500 USD</span></div>
																<div>20M Robux for <span class=robux-text>$70,000 USD</span></div>
																<div>30M Robux for <span class=robux-text>$105,000 USD</span></div>
																<div>40M Robux for <span class=robux-text>$140,000 USD</span></div>
																<div>60M Robux for <span class=robux-text>$210,000 USD</span></div>
																<div>80M Robux for <span class=robux-text>$280,000 USD</span></div>
																<div>115M Robux for <span class=robux-text>$402,500 USD</span></div>
																<div>150M Robux for <span class=robux-text>$525,000 USD</span></div>
																<div>225M Robux for <span class=robux-text>$787,500 USD</span></div>
																<div>300M Robux for <span class=robux-text>$1,050,000 USD</span></div>
																<div>450M Robux for <span class=robux-text>$1,575,000 USD</span></div>
																<div>600M Robux for <span class=robux-text>$2,100,000 USD</span></div>
															</div>
														</div>
														<div class=xsmall>
															<br> * Old Robux may be cashed out at a different rate. Please click <a href=https://en.help.roblox.com/hc/en-us/articles/203314100 target=_blank>here</a> for more information.</div>
													</div>
												</div>
											</div>
										</div>
										<div id=AdPreviewModal class=simplemodal-data style=display:none>
											<div id=ConfirmationDialog style=overflow:hidden>
												<div id=AdPreviewContainer style=overflow:hidden></div>
											</div>
										</div>
										<script>
										Roblox.CatalogValues = Roblox.CatalogValues || {};
										Roblox.CatalogValues.CatalogContentsUrl = "/catalog/contents";
										Roblox.CatalogValues.CatalogContext = 2;
										Roblox.CatalogValues.CatalogContextDevelopOnly = 2;
										Roblox.CatalogValues.ContainerID = "LibraryTab";
										$(function() {
											if(Roblox && Roblox.AdsHelper && Roblox.AdsHelper.AdRefresher) {
												Roblox.AdsHelper.AdRefresher.globalCreateNewAdEnabled = true;
												Roblox.AdsHelper.AdRefresher.adRefreshRateInMilliseconds = 3000;
											}
										});
										</script>
										<div style=clear:both></div>
									</div>
								</div>
							</div>
							<footer class=container-footer>
								<div class=footer>
									<ul class="row footer-links">
										<li class=footer-link><a href="https://www.roblox.com/info/about-us?locale=en_us" class="text-footer-nav roblox-interstitial" target=_blank> About Us </a>
											<li class=footer-link><a href="https://www.roblox.com/info/jobs?locale=en_us" class="text-footer-nav roblox-interstitial" target=_blank> Jobs </a>
												<li class=footer-link><a href="https://www.roblox.com/info/blog?locale=en_us" class=text-footer-nav target=_blank> Blog </a>
													<li class=footer-link><a href="https://www.roblox.com/info/parents?locale=en_us" class="text-footer-nav roblox-interstitial" target=_blank> Parents </a>
														<li class=footer-link><a href="https://www.roblox.com/info/help?locale=en_us" class="text-footer-nav roblox-interstitial" target=_blank> Help </a>
															<li class=footer-link><a href="https://www.roblox.com/info/terms?locale=en_us" class=text-footer-nav target=_blank> Terms </a>
																<li class=footer-link><a href="https://www.roblox.com/info/privacy?locale=en_us" class="text-footer-nav privacy" target=_blank> Privacy </a></ul>
									<div class="row copyright-wrapper">
										<div class="col-sm-6 col-md-3">
											<div class="rbx-select-group icon-dropdown">
												<select class="rbx-select language-select" id=language-switcher>
													<option value=de_de data-is-supported=true> Deutsch
														<option value=en_us data-is-supported=true selected> English
															<option value=es_es data-is-supported=true> Espa&#241;ol
																<option value=fr_fr data-is-supported=true> Fran&#231;ais
																	<option value=pt_br data-is-supported=true> Portugu&#234;s (Brasil)
																		<option value=ko_kr data-is-supported=true> 한국어
																			<option value=zh_cn data-is-supported=true> 中文(简体)
																				<option value=zh_tw data-is-supported=true> 中文(繁體)
																					<option value=id_id data-is-supported=false> Bahasa Indonesia*
																						<option value=ms_my data-is-supported=false> bahasa Melayu*
																							<option value=nb_no data-is-supported=false> bokm&#229;l*
																								<option value=cs_cz data-is-supported=false> čeština*
																									<option value=da_dk data-is-supported=false> dansk*
																										<option value=et_ee data-is-supported=false> eesti*
																											<option value=fil_ph data-is-supported=false> Filipino*
																												<option value=hr_hr data-is-supported=false> hrvatski*
																													<option value=it_it data-is-supported=false> Italiano*
																														<option value=lv_lv data-is-supported=false> latviešu*
																															<option value=lt_lt data-is-supported=false> lietuvių*
																																<option value=hu_hu data-is-supported=false> magyar*
																																	<option value=nl_nl data-is-supported=false> Nederlands*
																																		<option value=pl_pl data-is-supported=false> polski*
																																			<option value=ro_ro data-is-supported=false> rom&#226;nă*
																																				<option value=sq_al data-is-supported=false> shqipe*
																																					<option value=sk_sk data-is-supported=false> slovenčina*
																																						<option value=sl_sl data-is-supported=false> slovenski*
																																							<option value=fi_fi data-is-supported=false> suomi*
																																								<option value=sv_se data-is-supported=false> svenska*
																																									<option value=vi_vn data-is-supported=false> Tiếng Việt Nam*
																																										<option value=tr_tr data-is-supported=false> T&#252;rk&#231;e*
																																											<option value=el_gr data-is-supported=false> ελληνικά*
																																												<option value=bs_ba data-is-supported=false> босански*
																																													<option value=bg_bg data-is-supported=false> български*
																																														<option value=kk_kz data-is-supported=false> қазақ тілі*
																																															<option value=ru_ru data-is-supported=false> Русский*
																																																<option value=sr_rs data-is-supported=false> српски*
																																																	<option value=uk_ua data-is-supported=false> україньска*
																																																		<option value=ka_ge data-is-supported=false> ქართული*
																																																			<option value=hi_in data-is-supported=false> हिन्दी*
																																																				<option value=bn_bd data-is-supported=false> বাংলা*
																																																					<option value=si_lk data-is-supported=false> සිංහල*
																																																						<option value=th_th data-is-supported=false> ภาษาไทย*
																																																							<option value=my_mm data-is-supported=false> ဗမာစာ*
																																																								<option value=km_kh data-is-supported=false> ភាសាខ្មែរ*
																																																									<option value=ja_jp data-is-supported=false> 日本語* </select> <span class="icon-arrow icon-down-16x16"></span></div>
											<div class=input-group-btn>
												<button type=button class=input-dropdown-btn data-toggle=dropdown> <span class=icon-globe></span> <span class=rbx-selection-label data-bind=label> English </span> <span class=icon-down-16x16></span> </button>
												<ul data-toggle=dropdown-menu class=dropdown-menu role=menu>
													<li><a href=# class=locale-option data-locale=de_de data-is-supported=true> Deutsch </a>
														<li><a href=# class=locale-option data-locale=en_us data-is-supported=true> English </a>
															<li><a href=# class=locale-option data-locale=es_es data-is-supported=true> Espa&#241;ol </a>
																<li><a href=# class=locale-option data-locale=fr_fr data-is-supported=true> Fran&#231;ais </a>
																	<li><a href=# class=locale-option data-locale=pt_br data-is-supported=true> Portugu&#234;s (Brasil) </a>
																		<li><a href=# class=locale-option data-locale=ko_kr data-is-supported=true> 한국어 </a>
																			<li><a href=# class=locale-option data-locale=zh_cn data-is-supported=true> 中文(简体) </a>
																				<li><a href=# class=locale-option data-locale=zh_tw data-is-supported=true> 中文(繁體) </a>
																					<li><a href=# class=locale-option data-locale=id_id data-is-supported=false> Bahasa Indonesia* </a>
																						<li><a href=# class=locale-option data-locale=ms_my data-is-supported=false> bahasa Melayu* </a>
																							<li><a href=# class=locale-option data-locale=nb_no data-is-supported=false> bokm&#229;l* </a>
																								<li><a href=# class=locale-option data-locale=cs_cz data-is-supported=false> čeština* </a>
																									<li><a href=# class=locale-option data-locale=da_dk data-is-supported=false> dansk* </a>
																										<li><a href=# class=locale-option data-locale=et_ee data-is-supported=false> eesti* </a>
																											<li><a href=# class=locale-option data-locale=fil_ph data-is-supported=false> Filipino* </a>
																												<li><a href=# class=locale-option data-locale=hr_hr data-is-supported=false> hrvatski* </a>
																													<li><a href=# class=locale-option data-locale=it_it data-is-supported=false> Italiano* </a>
																														<li><a href=# class=locale-option data-locale=lv_lv data-is-supported=false> latviešu* </a>
																															<li><a href=# class=locale-option data-locale=lt_lt data-is-supported=false> lietuvių* </a>
																																<li><a href=# class=locale-option data-locale=hu_hu data-is-supported=false> magyar* </a>
																																	<li><a href=# class=locale-option data-locale=nl_nl data-is-supported=false> Nederlands* </a>
																																		<li><a href=# class=locale-option data-locale=pl_pl data-is-supported=false> polski* </a>
																																			<li><a href=# class=locale-option data-locale=ro_ro data-is-supported=false> rom&#226;nă* </a>
																																				<li><a href=# class=locale-option data-locale=sq_al data-is-supported=false> shqipe* </a>
																																					<li><a href=# class=locale-option data-locale=sk_sk data-is-supported=false> slovenčina* </a>
																																						<li><a href=# class=locale-option data-locale=sl_sl data-is-supported=false> slovenski* </a>
																																							<li><a href=# class=locale-option data-locale=fi_fi data-is-supported=false> suomi* </a>
																																								<li><a href=# class=locale-option data-locale=sv_se data-is-supported=false> svenska* </a>
																																									<li><a href=# class=locale-option data-locale=vi_vn data-is-supported=false> Tiếng Việt Nam* </a>
																																										<li><a href=# class=locale-option data-locale=tr_tr data-is-supported=false> T&#252;rk&#231;e* </a>
																																											<li><a href=# class=locale-option data-locale=el_gr data-is-supported=false> ελληνικά* </a>
																																												<li><a href=# class=locale-option data-locale=bs_ba data-is-supported=false> босански* </a>
																																													<li><a href=# class=locale-option data-locale=bg_bg data-is-supported=false> български* </a>
																																														<li><a href=# class=locale-option data-locale=kk_kz data-is-supported=false> қазақ тілі* </a>
																																															<li><a href=# class=locale-option data-locale=ru_ru data-is-supported=false> Русский* </a>
																																																<li><a href=# class=locale-option data-locale=sr_rs data-is-supported=false> српски* </a>
																																																	<li><a href=# class=locale-option data-locale=uk_ua data-is-supported=false> україньска* </a>
																																																		<li><a href=# class=locale-option data-locale=ka_ge data-is-supported=false> ქართული* </a>
																																																			<li><a href=# class=locale-option data-locale=hi_in data-is-supported=false> हिन्दी* </a>
																																																				<li><a href=# class=locale-option data-locale=bn_bd data-is-supported=false> বাংলা* </a>
																																																					<li><a href=# class=locale-option data-locale=si_lk data-is-supported=false> සිංහල* </a>
																																																						<li><a href=# class=locale-option data-locale=th_th data-is-supported=false> ภาษาไทย* </a>
																																																							<li><a href=# class=locale-option data-locale=my_mm data-is-supported=false> ဗမာစာ* </a>
																																																								<li><a href=# class=locale-option data-locale=km_kh data-is-supported=false> ភាសាខ្មែរ* </a>
																																																									<li><a href=# class=locale-option data-locale=ja_jp data-is-supported=false> 日本語* </a></ul>
											</div>
										</div>
										<div class="col-sm-6 col-md-9">
											<p class="text-footer footer-note">&#169;2019 Roblox Corporation. Roblox, the Roblox logo and Powering Imagination are among our registered and unregistered trademarks in the U.S. and other countries.</div>
									</div>
								</div>
							</footer>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="notification-stream-base gotham-font" notification-stream-base></div>
		<div id=chat-container class="chat chat-container gotham-font" chat-base></div>
		<script>
		function urchinTracker() {}
		</script>
		<script>
		if(typeof Roblox === "undefined") {
			Roblox = {};
		}
		if(typeof Roblox.PlaceLauncher === "undefined") {
			Roblox.PlaceLauncher = {};
		}
		Roblox.PlaceLauncher.Resources = {
			RefactorEnabled: "True",
			IsProtocolHandlerBaseUrlParamEnabled: "False",
			ProtocolHandlerAreYouInstalled: {
				play: {
					content: "<img src='https://images.rbxcdn.com/6304dfebadecbb3b338a79a6a528936c.svg.gzip' width='90' height='90' alt='R'/><p>You&#39;re moments away from getting into the game!</p>",
					buttonText: "Download and Install Roblox",
					footerContent: "<a href='https://assetgame.roblox.com/game/help'class= 'text-name small' target='_blank' >Click here for help</a> "
				},
				studio: {
					content: "<img src='https://images.rbxcdn.com/3da410727fa2670dcb4f31316643138a.svg.gzip' width='95' height='95' alt='R' /><p>Get started creating your own games!</p>",
					buttonText: "Download Studio"
				}
			},
			ProtocolHandlerStartingDialog: {
				play: {
					content: "<img src='https://images.rbxcdn.com/6304dfebadecbb3b338a79a6a528936c.svg.gzip' width='90' height='90' alt='R'/><p>Roblox is now loading. Get ready to play!</p>"
				},
				studio: {
					content: "<img src='https://images.rbxcdn.com/3da410727fa2670dcb4f31316643138a.svg.gzip' width='95' height='95' alt='R' /><p>Checking for Roblox Studio...</p>"
				},
				loader: "<span class='spinner spinner-default'></span>"
			}
		};
		</script>
		<div id=PlaceLauncherStatusPanel style=display:none;width:300px data-new-plugin-events-enabled=True data-event-stream-for-plugin-enabled=True data-event-stream-for-protocol-enabled=True data-is-game-launch-interface-enabled=False data-is-protocol-handler-launch-enabled=True data-is-user-logged-in=True data-os-name=Unknown data-protocol-name-for-client=roblox-player data-protocol-name-for-studio=roblox-studio data-protocol-roblox-locale=en_us data-protocol-game-locale=en_us data-protocol-url-includes-launchtime=true data-protocol-detection-enabled=true data-protocol-separate-script-parameters-enabled=true data-protocol-avatar-parameter-enabled=true data-protocol-sending-locales-enabled=true data-protocol-enable-api-site-authentication-tickets=true data-protocol-enable-authentication-tickets=true>
			<div class="modalPopup blueAndWhite PlaceLauncherModal" style=min-height:160px>
				<div id=Spinner class=Spinner style="padding:20px 0"><img data-delaysrc=https://images.rbxcdn.com/e998fb4c03e8c2e30792f2f3436e9416.gif height=32 width=32 alt=Progress></div>
				<div id=status style="min-height:40px;text-align:center;margin:5px 20px">
					<div id=Starting class="PlaceLauncherStatus MadStatusStarting" style=display:block>Starting Roblox...</div>
					<div id=Waiting class="PlaceLauncherStatus MadStatusField">Connecting to Players...</div>
					<div id=StatusBackBuffer class="PlaceLauncherStatus PlaceLauncherStatusBackBuffer MadStatusBackBuffer"></div>
				</div>
				<div style=text-align:center;margin-top:1em>
					<input type=button class="Button CancelPlaceLauncherButton translate" value=Cancel>
				</div>
			</div>
		</div>
		<div id=ProtocolHandlerClickAlwaysAllowed class=ph-clickalwaysallowed style=display:none>
			<p class=larger-font-size><span class=icon-moreinfo></span> Check <strong>Always open links for URL: Roblox Protocol</strong> and click <strong>Open URL: Roblox Protocol</strong> in the dialog box above to join games faster in the future!</div>
		<div id=videoPrerollPanel style=display:none>
			<div id=videoPrerollTitleDiv>Gameplay sponsored by:</div>
			<div id=content>
				<video id=contentElement style=width:0;height:0>
			</div>
			<div id=videoPrerollMainDiv></div>
			<div id=videoPrerollCompanionAd></div>
			<div id=videoPrerollLoadingDiv>Loading <span id=videoPrerollLoadingPercent>0%</span> - <span id=videoPrerollMadStatus class=MadStatusField>Starting game...</span><span id=videoPrerollMadStatusBackBuffer class=MadStatusBackBuffer></span>
				<div id=videoPrerollLoadingBar>
					<div id=videoPrerollLoadingBarCompleted></div>
				</div>
			</div>
			<div id=videoPrerollJoinBC><span>Get more with Builders Club!</span> <a href="https://www.roblox.com/premium/membership?ctx=preroll" target=_blank class="btn-medium btn-primary" id=videoPrerollJoinBCButton>Join Builders Club</a></div>
		</div>
		<script>
		$(function() {
			var videoPreRollDFP = Roblox.VideoPreRollDFP;
			if(videoPreRollDFP) {
				var customTargeting = Roblox.VideoPreRollDFP.customTargeting;
				videoPreRollDFP.showVideoPreRoll = false;
				videoPreRollDFP.loadingBarMaxTime = 33000;
				videoPreRollDFP.videoLoadingTimeout = 11000;
				videoPreRollDFP.videoPlayingTimeout = 41000;
				videoPreRollDFP.videoLogNote = "";
				videoPreRollDFP.logsEnabled = true;
				videoPreRollDFP.adUnit = "/1015347/VideoPreroll";
				videoPreRollDFP.adTime = 15;
				videoPreRollDFP.includedPlaceIds = "707652019,447452406,461482416,2563455047,2056459358";
				videoPreRollDFP.isSwfPreloaderEnabled = false;
				videoPreRollDFP.isPrerollShownEveryXMinutesEnabled = true;
				videoPreRollDFP.isAgeTargetingEnabled = true;
				videoPreRollDFP.isAgeOrSegmentTargetingEnabled = true;
				videoPreRollDFP.isCompanionAdRenderedByGoogleTag = true;
				customTargeting.userAge = "13";
				customTargeting.userAgeOrSegment = "13";
				customTargeting.userGender = "Male";
				customTargeting.gameGenres = "";
				customTargeting.environment = "Production";
				customTargeting.adTime = "15";
				customTargeting.PLVU = false;
				$(videoPreRollDFP.checkEligibility);
			}
		});
		</script>
		<script>
		function checkRobloxInstall() {
			window.location = 'https://www.roblox.com/install/unsupported.aspx?osx=10.5';
			return false;
		}
		</script>
		<div id=InstallationInstructions style=display:none>
			<div class=ph-installinstructions>
				<div class=ph-modal-header><span class="icon-close simplemodal-close"></span>
					<h3 class=title>Thanks for playing Roblox</h3></div>
				<div class=modal-content-container>
					<div class=ph-installinstructions-body>
						<ul class=modal-col-4>
							<li class=step1-of-4>
								<h2>1</h2>
								<p class=larger-font-size>Click <strong>RobloxPlayer.exe</strong> to run the Roblox installer, which just downloaded via your web browser.</p><img data-delaysrc=https://images.rbxcdn.com/28eaa93b899b93461399aebf21c5346f.png>
								<li class=step2-of-4>
									<h2>2</h2>
									<p class=larger-font-size>Click <strong>Run</strong> when prompted by your computer to begin the installation process.</p><img data-delaysrc=https://images.rbxcdn.com/51328932dedb5d8d61107272cc1a27db.png>
									<li class=step3-of-4>
										<h2>3</h2>
										<p class=larger-font-size>Click <strong>Ok</strong> once you've successfully installed Roblox.</p><img data-delaysrc=https://images.rbxcdn.com/3797745629baca2d1b9496b76bc9e6dc.png>
										<li class=step4-of-4>
											<h2>4</h2>
											<p class=larger-font-size>After installation, click <strong>Play</strong> below to join the action!
												<div class="VisitButton VisitButtonContinueGLI"><a class="btn btn-primary-lg disabled btn-full-width">Play</a></div>
						</ul>
					</div>
				</div>
				<div class=xsmall>The Roblox installer should download shortly. If it doesn’t, start the <a id=GameLaunchManualInstallLink href=# class=text-link>download now.</a>
					<script>
					if(Roblox.ProtocolHandlerClientInterface && typeof Roblox.ProtocolHandlerClientInterface.attachManualDownloadToLink === 'function') {
						Roblox.ProtocolHandlerClientInterface.attachManualDownloadToLink();
					}
					</script>
				</div>
			</div>
		</div>
		<div class=InstallInstructionsImage data-modalwidth=970 style=display:none></div>
		<div id=pluginObjDiv style=height:1px;width:1px;visibility:hidden;position:absolute;top:0></div>
		<iframe id=downloadInstallerIFrame name=downloadInstallerIFrame style=visibility:hidden;height:0;width:1px;position:absolute></iframe>
		<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=clientinstaller src=https://js.rbxcdn.com/3f2a863e0026fe90136944e1837e13df.js.gzip></script>
		<script>
		Roblox.Client._skip = '/install/unsupported.aspx';
		Roblox.Client._CLSID = '';
		Roblox.Client._installHost = '';
		Roblox.Client.ImplementsProxy = false;
		Roblox.Client._silentModeEnabled = false;
		Roblox.Client._bringAppToFrontEnabled = false;
		Roblox.Client._currentPluginVersion = '';
		Roblox.Client._eventStreamLoggingEnabled = false;
		Roblox.Client._installSuccess = function() {
			if(GoogleAnalyticsEvents) {
				GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
				GoogleAnalyticsEvents.FireEvent(['Plugin', 'Install Success']);
				if(Roblox.Client._eventStreamLoggingEnabled && typeof Roblox.GamePlayEvents != "undefined") {
					Roblox.GamePlayEvents.SendInstallSuccess(Roblox.Client._launchMode, play_placeId);
				}
			}
		}
		if((window.chrome || window.safari) && window.location.hash == '#chromeInstall') {
			window.location.hash = '';
			var continuation = '(' + $.cookie('chromeInstall') + ')';
			play_placeId = $.cookie('chromeInstallPlaceId');
			Roblox.GamePlayEvents.lastContext = $.cookie('chromeInstallLaunchMode');
			$.cookie('chromeInstallPlaceId', null);
			$.cookie('chromeInstallLaunchMode', null);
			$.cookie('chromeInstall', null);
			RobloxLaunch._GoogleAnalyticsCallback = function() {
				var isInsideRobloxIDE = 'website';
				if(Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) {
					isInsideRobloxIDE = 'Studio';
				};
				GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);
				GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);
				EventTracker.fireEvent('GameLaunchAttempt_Unknown', 'GameLaunchAttempt_Unknown_Plugin');
				if(typeof Roblox.GamePlayEvents != 'undefined') {
					Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId);
				}
			};
			Roblox.Client.ResumeTimer(eval(continuation));
		}
		</script>
		<div class="ConfirmationModal modalPopup unifiedModal smallModal" data-modal-handle=confirmation style=display:none>
			<a class="genericmodal-close ImageButton closeBtnCircle_20h"></a>
			<div class=Title></div>
			<div class=GenericModalBody>
				<div class=TopBody>
					<div class="ImageContainer roblox-item-image" data-image-size=small data-no-overlays data-no-click><img class=GenericModalImage alt="generic image"></div>
					<div class=Message></div>
				</div>
				<div class="ConfirmationModalButtonContainer GenericModalButtonContainer"><a href="" id=roblox-confirm-btn><span></span></a> <a href="" id=roblox-decline-btn><span></span></a></div>
				<div class=ConfirmationModalFooter></div>
			</div>
			<script>
			Roblox = Roblox || {};
			Roblox.Resources = Roblox.Resources || {};
			Roblox.Resources.GenericConfirmation = {
				yes: "Yes",
				No: "No",
				Confirm: "Confirm",
				Cancel: "Cancel"
			};
			</script>
		</div>
		<script>
		$(function() {
			Roblox.CookieUpgrader.domain = 'roblox.com';
			Roblox.CookieUpgrader.upgrade("GuestData", {
				expires: Roblox.CookieUpgrader.thirtyYearsFromNow
			});
			Roblox.CookieUpgrader.upgrade("RBXSource", {
				expires: function(cookie) {
					return Roblox.CookieUpgrader.getExpirationFromCookieValue("rbx_acquisition_time", cookie);
				}
			});
			Roblox.CookieUpgrader.upgrade("RBXViralAcquisition", {
				expires: function(cookie) {
					return Roblox.CookieUpgrader.getExpirationFromCookieValue("time", cookie);
				}
			});
			Roblox.CookieUpgrader.upgrade("RBXMarketing", {
				expires: Roblox.CookieUpgrader.thirtyYearsFromNow
			});
			Roblox.CookieUpgrader.upgrade("RBXSessionTracker", {
				expires: Roblox.CookieUpgrader.fourHoursFromNow
			});
			Roblox.CookieUpgrader.upgrade("RBXEventTrackerV2", {
				expires: Roblox.CookieUpgrader.thirtyYearsFromNow
			});
		});
		</script>
		<script>
		var _comscore = _comscore || [];
		_comscore.push({
			c1: "2",
			c2: "6035605",
			c3: "",
			c4: "",
			c15: "Over13"
		});
		(function() {
			var s = document.createElement("script"),
				el = document.getElementsByTagName("script")[0];
			s.async = true;
			s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
			el.parentNode.insertBefore(s, el);
		})();
		</script>
		<noscript><img src="http://b.scorecardresearch.com/p?c1=2&amp;c2=&amp;c3=&amp;c4=&amp;c5=&amp;c6=&amp;c15=&amp;cv=2.0&amp;cj=1"></noscript>
		<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=serviceworkerregistrar src=https://js.rbxcdn.com/7dddf6fdb21fde44544221254d039501.js.gzip></script>
		<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=pushnotifications src=https://js.rbxcdn.com/e795d08fc25dc32f62c4d5959bef0edb.js.gzip></script>
		<div id=push-notification-registrar-settings data-notificationshost=https://notifications.roblox.com data-reregistrationinterval=0 data-registrationpath=register-chrome data-shoulddeliveryendpointbesentduringregistration=False data-platformtype=ChromeOnDesktop></div>
		<div id=push-notification-registration-ui-settings data-noncontextualpromptallowed=true data-promptonfriendrequestsentenabled=true data-promptonprivatemessagesentenabled=false data-promptintervals=[604800000,1209600000,2419200000] data-notificationsdomain=https://notifications.roblox.com data-userid=886284560></div>
		<script type=text/template id=push-notifications-initial-global-prompt-template>
			<div class="push-notifications-global-prompt">
				<div class="alert-info push-notifications-global-prompt-site-wide-body">
					<div class="push-notifications-prompt-content">
						<h5>
                    <span class="push-notifications-prompt-text">
                        Can we send you notifications on this computer?
                    </span>
                </h5> </div>
					<div class="push-notifications-prompt-actions">
						<button type="button" class="btn-min-width btn-control-xs push-notifications-prompt-accept">Notify Me</button> <span class="icon-close push-notifications-dismiss-prompt"></span> </div>
				</div>
			</div>
		</script>
		<script type=text/template id=push-notifications-permissions-prompt-template>
			<div class="modal fade" id="push-notifications-permissions-prompt-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog rbx-modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">
                            <span class="icon-close"></span> </span> <span class="sr-only">Close</span> </button>
							<h5>Enable Desktop Push Notifications</h5> </div>
						<div class="modal-body">
							<div> Now just click <strong>Allow</strong> in your browser, and we'll start sending you push notifications! </div>
							<div class="push-notifications-permissions-prompt-instructional-image"> <img width="380" height="250" src="https://static.rbxcdn.com/images/Notifications/push-permission-prompt-chrome-windows-20160701.png" /> </div>
						</div>
						<div class="modal-footer"> </div>
					</div>
				</div>
			</div>
		</script>
		<script type=text/template id=push-notifications-permissions-disabled-instruction-template>
			<div class="modal fade" id="push-notifications-permissions-disabled-instruction-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog rbx-modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">
                            <span class="icon-close"></span> </span> <span class="sr-only">Close</span> </button>
							<h5>Turn Push Notifications Back On</h5> </div>
						<div class="instructions-body">
							<div class="reenable-step reenable-step1-of3">
								<h1>1</h1>
								<p class="larger-font-size push-notifications-modal-step-instruction">Click the green lock next to the URL bar to open up your site permissions.</p> <img width="270" height="139" src="https://static.rbxcdn.com/images/Notifications/push-permission-unblock-step1-chrome-20160701.png"> </div>
							<div class="reenable-step reenable-step2-of3">
								<h1>2</h1>
								<p class="larger-font-size push-notifications-modal-step-instruction">Click the drop-down arrow next to Notifications in the <strong>Permissions</strong> tab.</p> <img width="270" height="229" src="https://static.rbxcdn.com/images/Notifications/push-permission-unblock-step2-chrome-20160701.png"> </div>
							<div class="reenable-step reenable-step3-of3">
								<h1>3</h1>
								<p class="larger-font-size push-notifications-modal-step-instruction">Select <strong>Always allow on this site</strong> to turn notifications back on.</p> <img width="270" height="229" src="https://static.rbxcdn.com/images/Notifications/push-permission-unblock-step3-chrome-20160701.png"> </div>
						</div>
						<div class="modal-footer"> </div>
					</div>
				</div>
			</div>
		</script>
		<script type=text/template id=push-notifications-successfully-enabled-template>
			<div class="push-notifications-global-prompt">
				<div class="alert-system-feedback">
					<div class="alert alert-success"> Push notifications have been enabled! </div>
				</div>
			</div>
		</script>
		<script type=text/template id=push-notifications-successfully-disabled-template>
			<div class="push-notifications-global-prompt">
				<div class="alert-system-feedback">
					<div class="alert alert-success"> Push notifications have been disabled. </div>
				</div>
			</div>
		</script>
		<script onerror=Roblox.BundleDetector&amp;&amp;Roblox.BundleDetector.reportBundleError(this) data-monitor=true data-bundlename=pageEnd src=https://js.rbxcdn.com/7e42bd8acc22cb6b98926ccd04832d9c.js.gzip></script>