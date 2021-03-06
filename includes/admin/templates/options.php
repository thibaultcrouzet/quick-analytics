<div class="wrap">

	<?php settings_errors( 'quick_analytics' ); ?>

	<h2><?php esc_html_e( 'Analytics', 'quick-analytics' ); ?></h2>

	<form method="POST" action="options.php">

		<?php settings_fields( 'quick_analytics' ); ?>

		<table class="form-table">
		
			<h2 class="title"><?php esc_html_e( 'General', 'quick-analytics' ); ?></h2>					
			
			<tbody>
				
				<tr>
					<th scope="row">
						<label for="quick_analytics[position]"><?php esc_html_e( 'Analytics position', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<fieldset>
							<label>
								<input type="radio" name="quick_analytics[position]" value="head" <?php checked( 'head', $position ); ?>> <span><?php printf( esc_html__( 'Include within %s tag.', 'quick-analytics' ), '<code>&lt;head&gt;</code>' ); ?></span>
							</label><br>
							<label>
								<input type="radio" name="quick_analytics[position]" value="footer" <?php checked( 'footer', $position ); ?>> <span><?php printf( esc_html__( 'Include before closing %s tag.', 'quick-analytics' ), '<code>&lt;/body&gt;</code>' ); ?></span>
							</label><br>
						</fieldset>
					</td>
				</tr>

				<tr>
					<th scope="row">
						<label for="quick_analytics[exclude_admin]"><?php esc_html_e( 'Exclude Admin', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php esc_html_e( 'Exclude Admin', 'quick-analytics' ); ?></span>
							</legend>
							<label>
								<input name="quick_analytics[exclude_admin]" type="checkbox" value="1" <?php checked( true, $exclude_admin ); ?>>
								<?php esc_html_e( 'Exclude Admin of the statistics.', 'quick-analytics' ); ?>
							</label>
						</fieldset>
					</td>
				</tr>


			</tbody>
					
		</table>

		<hr>
		
		<table class="form-table">
			
			<h2 class="title"><?php esc_html_e( 'Google Analytics', 'quick-analytics' ); ?></h2>					
			
			<tbody>
				
				<tr>
					<th scope="row">
						<label for="quick_analytics[google_id]"><?php esc_html_e( 'Tracking ID', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<input type="text" name="quick_analytics[google_id]" class="regular-text" value="<?php echo esc_attr( $google_id ); ?>" />
						<p class="description"><?php echo esc_html__( 'Input your Google Analytics "Tracking ID."', 'quick-analytics' ) . ' ' . esc_html__( 'Example', 'quick-analytics' ); ?>: UA-12345678-9</p>
						<p class="description"><?php printf( esc_html__( 'Take your Tracking ID in %s.', 'quick-analytics' ), '<a target="_blank" href="https://www.google.com/webmasters/verification/home" rel="noopener noreferrer">Google Search Console</a>' ); ?></p>
					</td>
				</tr>

				<tr>
					<th scope="row">
						<label for="quick_analytics[google_anonymize]"><?php esc_html_e( 'Anonymization IP', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php esc_html_e( 'Anonymization IP', 'quick-analytics' ); ?></span>
							</legend>
							<label>
								<input name="quick_analytics[google_anonymize]" type="checkbox" value="1" <?php checked( true, $google_anonymize ); ?>>
								<?php esc_html_e( 'Anonymize IP addresses in tracking code.', 'quick-analytics' ); ?>
							</label>
						</fieldset>
					</td>
				</tr>
				
			</tbody>
					
		</table>
		
		<hr>
		
		<table class="form-table">
			
			<h2 class="title"><?php esc_html_e( 'Yandex Metrika', 'quick-analytics' ); ?></h2>					
			
			<tbody>

				<tr>
					<th scope="row">
						<label for="quick_analytics[yandex_id]"><?php esc_html_e( 'Tracking ID', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<input type="text" name="quick_analytics[yandex_id]" class="regular-text" value="<?php echo esc_attr( $yandex_id ); ?>" />
						<p class="description"><?php echo esc_html__( 'Input your Yandex Analytics "Tracking ID."', 'quick-analytics' ) . ' ' . esc_html__( 'Example', 'quick-analytics' ); ?>: UA-12345678-9</p>
						<p class="description"><?php printf( esc_html__( 'Take your Tracking ID in %s.', 'quick-analytics' ), '<a target="_blank" href="https://webmaster.yandex.com/sites/add/" rel="noopener noreferrer">Yandex Webmaster Tools</a>' ); ?></p>
					</td>
				</tr>						
				
				<tr>
					<th scope="row">
						<label for="quick_analytics[yandex_click_map]"><?php esc_html_e( 'Click Map', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php esc_html_e( 'Click Map', 'quick-analytics' ); ?></span>
							</legend>
							<label>
								<input name="quick_analytics[yandex_click_map]" type="checkbox" value="1" <?php checked( true, $yandex_click_map ); ?>>
								<?php esc_html_e( 'Click map in tracking code.', 'quick-analytics' ); ?>
							</label>
						</fieldset>
					</td>
				</tr>
		
				<tr>
					<th scope="row">
						<label for="quick_analytics[yandex_track_links]"><?php esc_html_e( 'Track Links', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php esc_html_e( 'Track Links', 'quick-analytics' ); ?></span>
							</legend>
							<label>
								<input name="quick_analytics[yandex_track_links]" type="checkbox" value="1" <?php checked( true, $yandex_track_links ); ?>>
								<?php esc_html_e( 'Track links in tracking code.', 'quick-analytics' ); ?>
							</label>
						</fieldset>
					</td>
				</tr>                    
	   
				<tr>
					<th scope="row">
						<label for="quick_analytics[yandex_accurate_track_bounce]"><?php esc_html_e( 'Accurate Track Bounce', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php esc_html_e( 'Accurate Track Bounce', 'quick-analytics' ); ?></span>
							</legend>
							<label>
								<input name="quick_analytics[yandex_accurate_track_bounce]" type="checkbox" value="1" <?php checked( true, $yandex_accurate_track_bounce ); ?>>
								<?php esc_html_e( 'Accurate Track Bounce in tracking code.', 'quick-analytics' ); ?>
							</label>
						</fieldset>
					</td>
				</tr>
	   
				<tr>
					<th scope="row">
						<label for="quick_analytics[yandex_webvisor]"><?php esc_html_e( 'Webvisor', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span><?php esc_html_e( 'Webvisor', 'quick-analytics' ); ?></span>
							</legend>
							<label>
								<input name="quick_analytics[yandex_webvisor]" type="checkbox" value="1" <?php checked( true, $yandex_webvisor ); ?>>
								<?php esc_html_e( 'Webvisor in tracking code.', 'quick-analytics' ); ?>
							</label>
						</fieldset>
					</td>
				</tr>

			</tbody>
					
		</table>			
	
		<hr>
		
		<table class="form-table">
			
			<h2 class="title"><?php esc_html_e( 'Mixpanel', 'quick-analytics' ); ?></h2>					
			
			<tbody>

				<tr>
					<th scope="row">
						<label for="quick_analytics[mixpanel_token]"><?php esc_html_e( 'Token', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<input type="text" name="quick_analytics[mixpanel_token]" class="regular-text" value="<?php echo esc_attr( $mixpanel_token ); ?>" />
						<p class="description"><?php echo esc_html__( 'Input your Mixpanel "Token."', 'quick-analytics' ) . ' ' . esc_html__( 'Example', 'quick-analytics' ); ?>: 917adc0cb191d78f605f316b79994092</p>
						<p class="description"><?php printf( esc_html__( 'Take your Token in %s.', 'quick-analytics' ), '<a target="_blank" href="https://mixpanel.com/" rel="noopener noreferrer">Mixpanel Project Settings</a>' ); ?></p>
					</td>
				</tr>						
			
			</tbody>
					
		</table>			
	
		<hr>
		
		<table class="form-table">
			
			<h2 class="title"><?php esc_html_e( 'Kissmetrics', 'quick-analytics' ); ?></h2>					
			
			<tbody>

				<tr>
					<th scope="row">
						<label for="quick_analytics[kissmetrics_key]"><?php esc_html_e( 'Key', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<input type="text" name="quick_analytics[kissmetrics_key]" class="regular-text" value="<?php echo esc_attr( $kissmetrics_key ); ?>" />
						<p class="description"><?php echo esc_html__( 'Input your Kissmetrics "Key."', 'quick-analytics' ) . ' ' . esc_html__( 'Example', 'quick-analytics' ); ?>: 3224a44c4028e5505c053e4ff3102b478dc8a4e9</p>
						<p class="description"><?php printf( esc_html__( 'Take your Key in %s.', 'quick-analytics' ), '<a target="_blank" href="https://app.kissmetrics.com/setup" rel="noopener noreferrer">Kissmetrics Setup</a>' ); ?></p>
					</td>
				</tr>						
			
			</tbody>
					
		</table>
	
		<hr>
		
		<table class="form-table">
			
			<h2 class="title"><?php esc_html_e( 'Woopra', 'quick-analytics' ); ?></h2>					
			
			<tbody>

				<tr>
					<th scope="row">
						<label for="quick_analytics[woopra_domain]"><?php esc_html_e( 'Domain', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<input type="text" name="quick_analytics[woopra_domain]" class="regular-text" value="<?php echo esc_attr( $woopra_domain ); ?>" />
						<p class="description"><?php echo esc_html__( 'Input your Woopra "Domain."', 'quick-analytics' ) . ' ' . esc_html__( 'Example', 'quick-analytics' ); ?>: mywebsite.com</p>
						<p class="description"><?php printf( esc_html__( 'Take your Domain in %s.', 'quick-analytics' ), '<a target="_blank" href="https://app.woopra.com/project/" rel="noopener noreferrer">Woopra Project</a>' ); ?></p>
					</td>
				</tr>						
			
			</tbody>
					
		</table>		
	
		<hr>
		
		<table class="form-table">
			
			<h2 class="title"><?php esc_html_e( 'Gauges', 'quick-analytics' ); ?></h2>					
			
			<tbody>

				<tr>
					<th scope="row">
						<label for="quick_analytics[gauges_site_id]"><?php esc_html_e( 'Site ID', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<input type="text" name="quick_analytics[gauges_site_id]" class="regular-text" value="<?php echo esc_attr( $gauges_site_id ); ?>" />					
						<p class="description"><?php echo esc_html__( 'Input your Gauges "Site ID."', 'quick-analytics' ) . ' ' . esc_html__( 'Example', 'quick-analytics' ); ?>: 5b9755d1e077291aa9bfdadb</p>
						<p class="description"><?php printf( esc_html__( 'Take your Site ID in %s.', 'quick-analytics' ), '<a target="_blank" href="https://secure.gaug.es/" rel="noopener noreferrer">Gauges Site ID</a>' ); ?></p>
					</td>
				</tr>						
			
			</tbody>
					
		</table>		
		
		<hr>
		
		<table class="form-table">
			
			<h2 class="title"><?php esc_html_e( 'Heap', 'quick-analytics' ); ?></h2>					
			
			<tbody>

				<tr>
					<th scope="row">
						<label for="quick_analytics[heap_app_id]"><?php esc_html_e( 'App ID', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<input type="text" name="quick_analytics[heap_app_id]" class="regular-text" value="<?php echo esc_attr( $heap_app_id ); ?>" />
						<p class="description"><?php echo esc_html__( 'Input your Heap "App ID."', 'quick-analytics' ) . ' ' . esc_html__( 'Example', 'quick-analytics' ); ?>: 1720413031</p>
						<p class="description"><?php printf( esc_html__( 'Take your App ID in %s.', 'quick-analytics' ), '<a target="_blank" href="https://heapanalytics.com/app/install" rel="noopener noreferrer">Heap Install</a>' ); ?></p>
					</td>
				</tr>						
			
			</tbody>
					
		</table>		
		
		<hr>
		
		<table class="form-table">
			
			<h2 class="title"><?php esc_html_e( 'GoSquared', 'quick-analytics' ); ?></h2>					
			
			<tbody>

				<tr>
					<th scope="row">
						<label for="quick_analytics[gosquared_token]"><?php esc_html_e( 'Token', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<input type="text" name="quick_analytics[gosquared_token]" class="regular-text" value="<?php echo esc_attr( $gosquared_token ); ?>" />
						<p class="description"><?php echo esc_html__( 'Input your GoSquared "Token."', 'quick-analytics' ) . ' ' . esc_html__( 'Example', 'quick-analytics' ); ?>: GSN-119934-K</p>
						<p class="description"><?php printf( esc_html__( 'Take your Token in %s.', 'quick-analytics' ), '<a target="_blank" href="https://www.gosquared.com/setup/" rel="noopener noreferrer">GoSquared Setup</a>' ); ?></p>					
					</td>
				</tr>						
			
			</tbody>
					
		</table>		
		
		<hr>
		
		<table class="form-table">
			
			<h2 class="title"><?php esc_html_e( 'Statcounter', 'quick-analytics' ); ?></h2>					
			
			<tbody>

				<tr>
					<th scope="row">
						<label for="quick_analytics[statcounter_project]"><?php esc_html_e( 'Project', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<input type="text" name="quick_analytics[statcounter_project]" class="regular-text" value="<?php echo esc_attr( $statcounter_project ); ?>" />
						<p class="description"><?php echo esc_html__( 'Input your Statcounter "Project."', 'quick-analytics' ) . ' ' . esc_html__( 'Example', 'quick-analytics' ); ?>: 11826937</p>
						<p class="description"><?php printf( esc_html__( 'Take your Project in %s.', 'quick-analytics' ), '<a target="_blank" href="https://statcounter.com/reinstall/" rel="noopener noreferrer">Statcounter Install</a>' ); ?></p>
					</td>
				</tr>						

				<tr>
					<th scope="row">
						<label for="quick_analytics[statcounter_security]"><?php esc_html_e( 'Security', 'quick-analytics' ); ?></label>
					</th>
					<td>
						<input type="text" name="quick_analytics[statcounter_security]" class="regular-text" value="<?php echo esc_attr( $statcounter_security ); ?>" />
						<p class="description"><?php echo esc_html__( 'Input your Statcounter "Security."', 'quick-analytics' ) . ' ' . esc_html__( 'Example', 'quick-analytics' ); ?>: d2a6973e</p>
						<p class="description"><?php printf( esc_html__( 'Take your Security in %s.', 'quick-analytics' ), '<a target="_blank" href="https://statcounter.com/reinstall/" rel="noopener noreferrer">Statcounter Install</a>' ); ?></p>
					
					</td>
				</tr>				
			
			</tbody>
					
		</table>
		
		<hr>
		<?php submit_button(); ?>

	</form>

</div>