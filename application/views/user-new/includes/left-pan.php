<div class="navbar-default sidebar" role="navigation">
			<div class="col-lg-12 gray-bg">
			<div align="center" class="col-lg-12 center-block user-img"> <?php if($USERQUERY[0]->picture != NULL) {?><img src="<?php echo $this->config->base_url()."public/bt-uploads/".$USERQUERY[0]->picture;?>"><?php } else {?><img src="<?php echo $this->config->base_url()."public/bt-uploads/".$USERQUERY[0]->picture;?>"><?php } ?></div>
			<h3 class="col-lg-12"><?php echo $USERQUERY[0]->fname." ".$USERQUERY[0]->lname;?></h3>
			<div id="file_upload"><a href="javascript:void(0);"><p class="col-lg-12" style="margin:0; color:#FFFFFF;"><i class="fa fa-edit fa-fw"></i>Edit</p></a></div>
			<div id="file_upload1" style="display:none;"><p class="col-lg-12" style="margin:0; color:#FFFFFF;"><input name="img" type="file" />
            <input name="save_img" type="button" value="Update Image" class="btn btn-xs btn-primary btn-block" onclick="javascript:frmsub();" />
            </p></div>
							</div>
							<h3 class="col-lg-12 black-bg" style="margin:0 0 12px 0;">Current View</h3>
							<span class="col-lg-12"><strong>Account Name:</strong> Deved Adrason</span>
							<span class="col-lg-12"><strong>Google ID: </strong>04356463</span>
							<span class="col-lg-12"><strong>Last Report Ran:</strong>12/25:10pm</span>
							<button class="report-btn1">Save Summary To Timeline</button>
							<button class="report-btn2">Select Another Account</button>
							<button class="report-btn3">RUN A REPORT</button>
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu" style="margin-top:20px;">
                        
                        <li><a href="dashboard.html"><i class="fa fa-dashboard fa-fw"></i>Account Dashboard</a></li>
                        <li><a href="summary.html"><i class="fa fa-bar-chart-o fa-fw"></i>Summary</a></li>
						<li><a href="keywords-Search.html"><i class="fa fa-dashboard fa-fw"></i> Keywords & Search Terms</a></li>
                        <li><a href="budget.html"><i class="fa fa-table fa-fw"></i> Budget  & Impression Share</a></li>
                        <li><a href="quality.html"><i class="fa fa-edit fa-fw"></i>Quality Score & Text Ads </a></li>
                        <li><a href="targeting.html"><i class="fa fa-wrench fa-fw"></i>Targeting</a></li>
                        <li><a href="CPL.html"><i class="fa fa-sitemap fa-fw"></i> CPL Trend & Ad Consistency</a></li>
                        <li><a href="Key-Campaign.html"><i class="fa fa-files-o fa-fw"></i>Key Campaign Insights<span class="fa arrow"></span></a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>