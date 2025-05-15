<script type="text/javascript">
        Sys.WebForms.PageRequestManager.getInstance().add_endRequest(updateRolesetCount);
    </script>
    <div id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_GroupMembersUpdatePanel" Class="MembersUpdatePanel">
	
            <div>
                <div class="Members_DropDown">
                    <select name="ctl00$cphRoblox$rbxGroupRoleSetMembersPane$dlRolesetList" onchange="loading(&#39;members&#39;);changePage(1);" id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlRolesetList" class="MembersDropDownList" style="max-width: 100%">
		<?php 
		$x = 0;

		$roleNumber = ($_POST["current_role"] !== $_POST["changed_role"]) ? intval($_POST["changed_role"]) : $groupRoles[0]['roleId'];
		
		$stmt = $pdo->prepare("SELECT groupId FROM grouproles WHERE roleId = :roleId AND groupId = :groupId");
		$stmt->bindParam(':roleId', $roleNumber);
		$stmt->bindParam(':groupId', $groupId);
		$stmt->execute();
		
		if ($stmt->rowCount() == 0)
			$roleNumber = $groupRoles[0]['roleId'];
		
		$stmt = $pdo->prepare("SELECT * FROM groupmembers WHERE groupId = :groupId AND rankId = :rankId ORDER BY joinTime");
		$stmt->bindParam(':groupId', $groupId);
		$stmt->bindParam(':rankId', $roleNumber);
		$stmt->execute();
		$result = $stmt->rowCount();
		
		foreach ($groupRoles as $role){
			$x++;
			
			$extra = ($role['roleId'] == $roleNumber) ? 'selected="selected"' : "";
			$extra2 = ($role['roleId'] == $roleNumber && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["changed_role"])) ? ' (' . $result . ')' : "";
		
			echo'<option ' . $extra . ' value="' . $role["roleId"] . '">' . htmlspecialchars($role["rankName"]) . $extra2 . '</option>';
		}

		$pageNumber = $_POST["page"] ?? 1;
		
		if ($pageNumber === (int)$pageNumber)
			$pageNumber = 1;
		else
			$pageNumber = intval($pageNumber);
		
		$result2 = ceil($result / 12) * 12;
		$pages = $result2 / 12;
		
		if ($pageNumber * 12 > $result2)
			$pageNumber = 1;
		
		$endRow = $pageNumber * 12;
		$startRow = $endRow - 11;
		
		?>

	</select>
                    <input name="ctl00$cphRoblox$rbxGroupRoleSetMembersPane$RolesetCountHidden" type="text" value="<?= $result ?>" id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_RolesetCountHidden" class="RolesetCountHidden" style="display:none;" />
                    <div id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_AbuseReportButtonRoleSet_AbuseReportPanel" class="ReportAbuse">
		
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_AbuseReportButtonRoleSet_ReportAbuseIconHyperLink" href="https://www.<?= $domain ?>/abusereport/grouproleset?id=<?= $groupRoles[0]['roleId'] ?>&amp;RedirectUrl=<?= urlencode("https" . "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]) ?>"><img src="https://static.idk18.xyz/images/abuse.png" alt="Report Abuse" style="border-width:0px;" /></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_AbuseReportButtonRoleSet_ReportAbuseTextHyperLink" href="https://www.<?= $domain ?>/abusereport/grouproleset?id=<?= $groupRoles[0]['roleId'] ?>&amp;RedirectUrl=<?= urlencode("https" . "://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]) ?>">Report Abuse</a></span>

	</div>
                </div>
                <div>
				<?php if ($result == 0): ?>
					<div style="display:flex;justify-content:center;align-items:center;height:100%">No results found.</div>
				<?php endif; ?>
                    <div class="spacer" style="visibility:hidden;display:block;height:69px;width:1px;float:left;"></div>
                    <?php 
					$x = 0;
					
					foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $member){
						$x++;
						if ($x >= $startRow && $x <= $endRow ){
							$username = UserAuthentication::lookupNameById($member["userId"]);
							
							echo'<div class="GroupMember" >
									<div class="Avatar">
										<span class="OnlineStatus"><img id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl0_iOnlineStatus" src="https://static.idk18.xyz/images/offline.png" alt="' . htmlspecialchars($username) . ' is offline." style="border-width:0px;" /></span>
										<a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl0_hlAvatar" class=" notranslate" title="' . htmlspecialchars($username) . '" class=" notranslate" href="https://www.' . $domain . '/users/' . $member["userId"] . '/profile" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="' . ThumbnailService::requestAvatarThumbnail( $member['userId'], 100, 100 ) . '" height="100" width="100" border="0" alt="' . htmlspecialchars($username) . '" class=" notranslate" /></a>
									</div>
									<div class="Summary" >
										<span class="Name"><a id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_ctrl0_hlMember" title="' . htmlspecialchars($username) . '" class="NameText notranslate" href="https://www.' . $domain . '/users/' . $member["userId"] . '/profile">' . htmlspecialchars($username) . '</a></span>
									</div>
								</div>';
						}
					}
					?>
					
                        
                            <div style="clear:both;"></div>
                        
                    <div style="clear:both;"></div>
                  <div id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_div" class="FooterPager" onclick="handlePagerClick(event, &#39;members&#39;);">
				  <?php if ($x !== 0): ?>
	                    <span id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer">
						
						<?php
								$actionTag = ($pageNumber !== 1) ? "a" : "span";
						?>
						<<?= $actionTag ?> class="pagerbtns previous" onclick='changePage(<?= $pageNumber - 1 ?>)'></<?= $actionTag ?>>&nbsp;
                                 <div id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_ctl01_MembersPagerPanel" onkeypress="javascript:return WebForm_FireDefaultButton(event, &#39;ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_ctl01_HiddenInputButton&#39;)">
		
                                <div id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_ctl01_Div1" class="paging_wrapper">
                                    Page <input name="ctl00$cphRoblox$rbxGroupRoleSetMembersPane$dlUsers_Footer$ctl01$PageTextBox" type="text" value="<?= $pageNumber ?>" id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_ctl01_PageTextBox" class="paging_input" /> of 
                                    <div class="paging_pagenums_container" ><?= $pages ?></div>
                                    <input type="submit" name="ctl00$cphRoblox$rbxGroupRoleSetMembersPane$dlUsers_Footer$ctl01$HiddenInputButton" value="" onclick="loading(&#39;members&#39;);changePage();" id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_dlUsers_Footer_ctl01_HiddenInputButton" class="pagerbtns translate" style="display:none;" />
                                </div>
                                
	</div>						<?php
								$actionTag = ($pageNumber !== intval($pages)) ? "a" : "span";
								?>
									<<?= $actionTag ?> class="pagerbtns next" onclick='changePage(<?= $pageNumber + 1 ?>)'> </<?= $actionTag ?>>&nbsp;</span>
				<?php endif; ?>
					</div>
                </div>
            </div>
            <input name="ctl00$cphRoblox$rbxGroupRoleSetMembersPane$currentRoleSetID" type="hidden" id="ctl00_cphRoblox_rbxGroupRoleSetMembersPane_currentRoleSetID" value="<?= $roleNumber ?>" />
        
</div>
    <div style="clear: both"></div>