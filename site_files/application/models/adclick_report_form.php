<?php

	echo form_open('adclick/report/generate');
	echo form_label('Advertiser').nbs(2).form_dropdown('advertiser',$advertisers).br();
	echo form_label('Month').nbs(2).form_dropdown('month',$months).br();
	echo form_submit('submit','Submit');
	echo form_close();
