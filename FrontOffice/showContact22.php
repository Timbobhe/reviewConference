<div class="tail-middle">
	<div class="row-2">
		<div class="inside">
			<h3><?php echo OURCONTACT;?></h3>
			<div class="indent">
				<div class="box1">
					<div class="border-top">
						<div class="border-bot">
							<div class="left-top-corner">
								<div class="right-top-corner">
									<div class="right-bot-corner">
										<div class="left-bot-corner">
											<div class="inner">
												<div class="wrapper">
													<div class="address fleft"><b><?php echo ZIP;?></b><?php echo $conf->getCodepostale(); ?><br />
														<b><?php echo COUNTRY;?></b><?php echo $conf->getPays(); ?><br />
														<b><?php echo TEL;?></b><?php echo $conf->getTel(); ?><br />
														<b><?php echo FAX;?></b><?php echo $conf->getFax(); ?></div>
														<div class="extra-column"><b><?php echo DIVERS;?></b><br />
														<?php echo $conf->getNom(); ?><br />
														<?php echo $conf->getDescription(); ?><br />
														<?php echo PLACE;?> : <?php echo $conf->getLieu(); ?><br />
														<?php echo DATE;?> : <?php echo $conf->getDate(); ?><br />
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>